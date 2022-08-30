<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\PostinganResource;
use App\Models\Postingan;
use App\Models\User;

class PostinganController extends Controller
{
    protected $storage;

    public function __construct()
    {
        $this->storage = Storage::disk('public');
    }

    public function store(Request $request)
    {
        $attachment = null;
        
        try {
            DB::beginTransaction();

            $rules = [
                'attachment' => 'required|mimetypes:image/jpeg,image/jpg,image/png',
                'caption' => 'nullable'
            ];

            $messages = [
                'required' => ':attribute wajib diisi.',
                'mimetypes' => ':attribute wajib diisi dan yang diperbolehkan berupa file .jpeg, .jpg, .png'
            ];

            $attributes = [
                'attachment' => 'Gambar Postingan',
                'caption' => 'Caption'
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

            $userId = Auth::id();
            $data_postingan = Postingan::where('created_by',$userId)->first();

            $input = $request->caption;
            $pecah = explode("<br>", $input);
            $text = "";
            for ($i=0; $i<=count($pecah)-1; $i++)
            {
                $part = str_replace($pecah[$i], $pecah[$i], $pecah[$i]);
                $text = $part;
            }

            $data_postingan = Postingan::create([
                'attachment' => $attachment,
                'caption' => $text
            ]);
            // dd($text);
            
            $this->responseCode = 200;
            $this->responseMessage = 'Postingan berhasil disimpan.';
            $this->responseData['postingan'] = $data_postingan;

            DB::commit();

            return response()->json($this->getResponse(), $this->responseCode);
        } catch (\Exception $ex) {
            $this->responseCode = 500;
            $this->responseMessage = $ex->getMessage();

            $this->storage->delete($attachment);
            
            DB::rollBack();

            return response()->json($this->getResponse(), $this->responseCode);
        }
    }
    
    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            $update_postingan = Postingan::find($id);
            $rules = [
                'attachment' => 'mimetypes:image/jpeg,image/jpg,image/png',
                'caption' => 'nullable'
            ];

            $messages = [
                'required' => ':attribute wajib diisi.',
                'mimetypes' => ':attribute wajib diisi dan yang diperbolehkan berupa file .jpeg, .jpg, .png'
            ];

            $attributes = [
                'attachment' => 'Gambar Postingan',
                'caption' => 'Caption'
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

            $temp = $update_postingan->attachment;

            $input = $request->caption;
            $pecah = explode("<br>", $input);
            $text = "";
            
            for ($i=0; $i<=count($pecah)-1; $i++)
            {
                $part = str_replace($pecah[$i], $pecah[$i], $pecah[$i]);
                $text = $part;
            }
                
            $data = [
                // 'attachment' => $attachment,
                'caption' => $text
            ];
            
            if (!empty($request->attachment)) {
                $data['attachment'] = $attachment;
                $this->storage->delete($temp);
            }
            
            $update = $update_postingan->update($data);
            // dd($update_postingan);
            
            $this->responseCode = 200;
            $this->responseMessage = 'Postingan berhasil diubah.';
            $this->responseData['postingan'] = $update_postingan;

            DB::commit();

            return response()->json($this->getResponse(), $this->responseCode);
        } catch (\Exception $ex) {
            $this->responseCode = 500;
            $this->responseMessage = $ex->getMessage();

            $this->storage->delete($attachment);
            
            DB::rollBack();

            return response()->json($this->getResponse(), $this->responseCode);
        }
    }

    public function destroy($id)
    {
        $delete_postingan = Postingan::find($id);

        if (empty($delete_postingan)) {
            $this->responseCode = 404;
            $this->responseMessage = 'Data postingan tidak ditemukan.';

            return response()->json($this->getResponse(), $this->responseCode);
        }

        $delete_postingan->delete();

        $this->responseCode = 200;
        $this->responseMessage = 'Data postingan telah dihapus.';
        $this->responseData['postingan'] = $delete_postingan;

        return response()->json($this->getResponse(), $this->responseCode);
    }

    public function show()
    {
        try {
            $userId = Auth::id();
            $data = Postingan::where('created_by',$userId)->first();
            $data_postingan = Postingan::where('created_by',$userId)
                            ->orderBy('id','DESC')
                            ->get();
            $nama = User::select('name')->where('id',$userId)->first();
            
            if (empty($data)) {
                $this->responseCode = 400;
                $this->responseMessage = 'Postingan tidak ditemukan';

                return response()->json($this->getResponse(), $this->responseCode);
            }

            $this->responseCode = 200;
            $this->responseMessage = 'Postingan ditemukan.';
            $this->responseData['data_postingan'] = $data_postingan;
            $this->responseData['nama_user'] = $nama;

            return response()->json($this->getResponse(), $this->responseCode);
        } catch (\Exception $ex) {
            $this->responseCode = 500;
            $this->responseMessage = $ex->getMessage();

            return response()->json($this->getResponse(), $this->responseCode);
        }
    }

    public function show_id($id)
    {
        try {
            $data = Postingan::find($id);
            
            if (empty($data)) {
                $this->responseCode = 400;
                $this->responseMessage = 'Data postingan tidak ditemukan';

                return response()->json($this->getResponse(), $this->responseCode);
            }

            $this->responseCode = 200;
            $this->responseMessage = 'Data postingan ditemukan.';
            $this->responseData['data_postingan'] = $data;

            return response()->json($this->getResponse(), $this->responseCode);
        } catch (\Exception $ex) {
            $this->responseCode = 500;
            $this->responseMessage = $ex->getMessage();

            return response()->json($this->getResponse(), $this->responseCode);
        }
    }

    private function uploadPath($blob, $path = 'postingan') {
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
}
