<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\KaryawanResource;
use App\Http\Resources\UserResource;
use App\Models\Postingan;
use App\Models\Karyawan;
use App\Models\User;

class KaryawanController extends Controller
{
    protected $storage;

    public function __construct()
    {
        $this->storage = Storage::disk('public');
    }

    public function store(Request $request)
    {
        $attachment = null;
        $attachment_sampul = null;
        
        try {
            DB::beginTransaction();
            $rules = [
                'attachment' => 'nullable|mimetypes:image/jpeg,image/jpg,image/png',
                'attachment_sampul' => 'nullable|mimetypes:image/jpeg,image/jpg,image/png',
                'jenis_jabatan' => 'required',
                'bio' => 'nullable'
            ];

            $messages = [
                'required' => ':attribute wajib diisi.',
                'mimetypes' => ':attribute yand diperbolehkan berupa file .jpeg, .jpg, .png'
            ];

            $attributes = [
                'attachment' => 'Foto Profil',
                'attachment_sampul' => 'Foto Sampul',
                'jenis_jabatan' => 'Jenis Jabatan',
                'bio' => 'Bio',
            ];

            $validator = Validator::make($request->all(), $rules, $messages, $attributes);

            if ($validator->fails()) {
                $this->responseCode = 422;
                $this->responseMessage = 'Form tidak valid.';
                $this->responseData['errors'] = $validator->errors();

                return response()->json($this->getResponse(), $this->responseCode);
            }

            if (!empty($request->attachment)) {
                if (!$request->attachment->isValid()) {
                    $this->responseCode = 422;
                    $this->responseMessage = 'Tidak dapat mengunggah lampiran.';

                    return response()->json($this->getResponse(), $this->responseCode);
                }
                
                $path = $this->uploadPath($request->attachment->getMimeType());

                if (!$this->storage->exists($path)) {
                    $this->storage->makeDirectory($path);
                }
                
                $attachment = $request->attachment->store($path, 'public');
            }

            if (!empty($request->attachment_sampul)) {
                if (!$request->attachment_sampul->isValid()) {
                    $this->responseCode = 422;
                    $this->responseMessage = 'Tidak dapat mengunggah lampiran.';

                    return response()->json($this->getResponse(), $this->responseCode);
                }
                
                $path_sampul = $this->uploadPathSampul($request->attachment_sampul->getMimeType());

                if (!$this->storage->exists($path_sampul)) {
                    $this->storage->makeDirectory($path_sampul);
                }
                
                $attachment_sampul = $request->attachment_sampul->store($path_sampul, 'public');
            }

            $userId = Auth::id();
            $dataKaryawan = Karyawan::where('created_by',$userId)->first();
            $userAuth = User::find(auth('api')->user()->id);

            if ($dataKaryawan) {
                $temp = $dataKaryawan->attachment;
                $temp_sampul = $dataKaryawan->attachment_sampul;
                $data = [
                    'jenis_jabatan' => $request->jenis_jabatan,
                    'bio' => $request->bio
                ];

                if (!empty($request->attachment)) {
                    $data['attachment'] = $attachment;
                    $this->storage->delete($temp);
                }

                if (!empty($request->attachment_sampul)) {
                    $data['attachment_sampul'] = $attachment_sampul;
                    $this->storage->delete($temp_sampul);
                }

                $update = $dataKaryawan->update($data);
                
                if (empty($request->name)) {
            
                }else {
                    $updateNama = $userAuth->update([
                        'name' => $request->name
                    ]);
                }
            } 
            else {
                $dataKaryawan = Karyawan::create([
                    'attachment' => $attachment,
                    'attachment_sampul' => $attachment_sampul,
                    'jenis_jabatan' => $request->jenis_jabatan,
                    'bio' => $request->bio
                ]);
            }
            
            $this->responseCode = 200;
            $this->responseMessage = 'Data karyawan berhasil disimpan.';
            $this->responseData['data_karyawan'] = $dataKaryawan;
            // $this->responseData['nama_karyawan'] = $userAuth;

            DB::commit();

            return response()->json($this->getResponse(), $this->responseCode);
        } catch (\Exception $ex) {
            $this->responseCode = 500;
            $this->responseMessage = $ex->getMessage();

            $this->storage->delete($attachment);
            $this->storage->delete($attachment_sampul);
            
            DB::rollBack();

            return response()->json($this->getResponse(), $this->responseCode);
        }
    }

    public function show()
    {
        try {
            $userId = Auth::id();
            $data_karyawan = Karyawan::where('created_by',$userId)->first();
            // $data_karyawan = Karyawan::find($id);
            
            if (empty($data_karyawan)) {
                $this->responseCode = 400;
                $this->responseMessage = 'Data karyawan tidak ditemukan';

                return response()->json($this->getResponse(), $this->responseCode);
            }

            $this->responseCode = 200;
            $this->responseMessage = 'Data karyawan ditemukan.';
            $this->responseData['data_karyawan'] = $data_karyawan;

            return response()->json($this->getResponse(), $this->responseCode);
        } catch (\Exception $ex) {
            $this->responseCode = 500;
            $this->responseMessage = $ex->getMessage();

            return response()->json($this->getResponse(), $this->responseCode);
        }
    }

    public function show_qr($id)
    {
        try {
            $data_karyawan = Karyawan::where('created_by',$id)->first();
            $userAuth = User::where('id',$id)->first();
            // $data = Postingan::where('created_by',$id)->first();
            $data_postingan = Postingan::where('created_by',$id)
                            ->orderBy('id','DESC')
                            ->get();
            
            if(!empty($userAuth)) {
                $this->responseCode = 200;
                $this->responseMessage = 'User berhasil ditampilkan';
                $this->responseData['user'] = new UserResource($userAuth);
            }
            else {
                $this->responseCode = 400;
                $this->responseMessage = 'User tidak ditemukan';
            }
            
            if (empty($data_karyawan)) {
                $this->responseCode = 400;
                $this->responseMessage = 'Data karyawan tidak ditemukan';

                return response()->json($this->getResponse(), $this->responseCode);
            }

            // if (empty($data)) {
            //     $this->responseCode = 400;
            //     $this->responseMessage = 'Postingan tidak ditemukan';

            //     return response()->json($this->getResponse(), $this->responseCode);
            // }

            $this->responseCode = 200;
            $this->responseMessage = 'Data karyawan ditemukan.';
            $this->responseData['data_karyawan'] = $data_karyawan;
            $this->responseData['data_postingan'] = $data_postingan;

            return response()->json($this->getResponse(), $this->responseCode);
        } catch (\Exception $ex) {
            $this->responseCode = 500;
            $this->responseMessage = $ex->getMessage();

            return response()->json($this->getResponse(), $this->responseCode);
        }
    }

    private function uploadPath($blob, $path = 'data-karyawan') {
        $data = [];

        if (!is_null($path)) {
            $data[] = $path;
        }

        switch ($blob) {
            case 'image/jpeg':
                $data[] = 'images';
                break;

            case 'image/jpg':
                $data[] = 'images';
                break;

            case 'image/png':
                $data[] = 'images';
                break;
            
            default:
                $data[] = 'others';
                break;
        }

        return implode('/', $data);
    }

    private function uploadPathSampul($blob, $path_sampul = 'foto-sampul') {
        $data = [];

        if (!is_null($path_sampul)) {
            $data[] = $path_sampul;
        }

        switch ($blob) {
            case 'image/jpeg':
                $data[] = 'images';
                break;

            case 'image/jpg':
                $data[] = 'images';
                break;

            case 'image/png':
                $data[] = 'images';
                break;
            
            default:
                $data[] = 'others';
                break;
        }

        return implode('/', $data);
    }
}
