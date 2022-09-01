<!DOCTYPE html>
<html lang="en">
	<head><base href="">
		<title>Beranda</title>
		<meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<link rel="shortcut icon" href="{{asset('assets/img/logo.png')}}" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<link href="{{asset('assets/plugins/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/dark-mode.css')}}" rel="stylesheet" type="text/css" />
        <script type="text/javascript">
            var baseUrl = "{{url('/')}}/";
            var urlApi = "{{url('/api')}}/";
        </script>
	</head>
	<body class="bg-gray" data-bs-spy="scroll" onload="document.body.style.opacity='1'">
		<div class="d-flex flex-column flex-root">
            <div class="d-flex flex-column flex-column-fluid">
                <!-- TOOLBAR TOP -->
                <div class="toolbar" id="kt_toolbar">
                    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                        <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0" id="title-none">
                            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Infa Info</h1>
                            <span class="h-20px border-gray-300 border-start mx-4"></span>
                            <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                                <li class="breadcrumb-item text-muted">
                                    <a href="{{url('#')}}" class="text-muted text-hover-primary">Home</a>
                                </li>
                            </ul>
                        </div>
                        <div id="date_time" class="mt-2 text-muted">
                            <!-- <span class="mt-2 text-muted">Senin, 25 Juli 2022 | 17:00</span> -->
                        </div>
                        <div class="d-flex align-items-center py-1">
                            <button class="btn btn-sm btn-light-danger" id="logout" onclick="logout()">Logout</button>
                        </div>
                    </div>
                </div>
                <!-- NAVBAR BOTTOM -->
                <nav class="navbar fixed-bottom app-bar" id="barshow">
                    <div class="container-fluid">
                        <div class="col-4">
                            <div class="text-center">
                                <a data-bs-toggle="modal" data-bs-target="#qrcode">
                                    <i class="fas fa-qrcode text-dark" style="font-size:25px;"></i><br>
                                    <span class="text-muted" style="font-size:12px;">Lihat QR</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="text-center">
                                <a href="{{url('/unggah')}}">
                                    <i class="fas text-danger fa-plus"style="font-size:25px;"></i><br>
                                    <span class="text-danger" style="font-size:12px;">Unggah</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="text-center">
                                <div class="form-switch d-flex justify-content-center mt-2 mb-1">
                                    <input class="form-check-input w-46px h-20px" type="checkbox" id="darkSwitch" />
                                </div>
                                <span class="text-muted" style="font-size:12px;">Night Mode</span>
                            </div>
                        </div>
                    </div>
                </nav>
                <!-- NAVBAR BOTTOM SCAN -->
                <nav class="navbar fixed-bottom navbar-light app-bar" id="bar">
                    <div class="container-fluid">
                        <div class="col-4"></div>
                        <div class="col-4">
                            <div class="text-center">
                                <div class="form-switch d-flex justify-content-center mt-2 mb-1">
                                    <input class="form-check-input w-46px h-20px" type="checkbox" id="darkSwitch2" />
                                </div>
                                <span class="text-muted" style="font-size:12px;">Night Mode</span>
                            </div>
                        </div>
                        <div class="col-4"></div>
                    </div>
                </nav>
                <div class="post d-flex flex-column-fluid mt-6">
                    <div id="kt_content_container" class="container-xxl" style="max-width:100% !important">
                        <div class="d-flex flex-column flex-lg-row">
                            <!-- SIDEBAR -->
                            <div class="flex-column flex-lg-row-auto w-lg-250px w-xl-350px ">
                                <div class="card mb-5 mb-xl-8" id="card">
                                    <div id="img" style="height:100% !important;">
                                        <!-- <img id="pp" src="{{asset('assets/img/no-image.jpg')}}" alt=""> -->
                                    </div>
                                    <div class="card-body" id="card-body">
                                        <div class="row" id="edit">
                                            <div class="col-md-6"></div>
                                            <div class="col-md-6" id="buttonedit">
                                                <span class="float-end" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="Edit staff details">
                                                    <a href="#" class="float-end btn btn-sm btn-light-primary" onclick="modalEdit()">
                                                        <span class="svg-icon svg-icon-muted svg-icon-2" style="margin-right: 0px !important;">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black"/>
                                                                <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black"/>
                                                            </svg>
                                                        </span>
                                                    </a>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="row" id="dots">
                                            <div class="col-md-6"></div>
                                            <div class="col-md-6">
                                                <div class="dropdown-navbar float-end">
                                                    <i class="fas fa-ellipsis-v text-light fs-2"></i>
                                                    <div class="dropdown-isi">
                                                        <div onclick="modalEdit()" class="d-flex align-items-center text-muted fw-bold">
                                                            <span class="svg-icon svg-icon-warning svg-icon-2 me-3" id="color-svg1">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black"/>
                                                                    <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black"/>
                                                                </svg>
                                                            </span>
                                                            Edit profile
                                                        </div>
                                                        <div class="separator my-2"></div>
                                                        <div onclick="logout()" class="d-flex align-items-center text-muted fw-bold">
                                                            <span class="svg-icon svg-icon-danger svg-icon-2 me-3" id="color-svg2">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                    <rect opacity="0.3" x="4" y="11" width="12" height="2" rx="1" fill="black"/>
                                                                    <path d="M5.86875 11.6927L7.62435 10.2297C8.09457 9.83785 8.12683 9.12683 7.69401 8.69401C7.3043 8.3043 6.67836 8.28591 6.26643 8.65206L3.34084 11.2526C2.89332 11.6504 2.89332 12.3496 3.34084 12.7474L6.26643 15.3479C6.67836 15.7141 7.3043 15.6957 7.69401 15.306C8.12683 14.8732 8.09458 14.1621 7.62435 13.7703L5.86875 12.3073C5.67684 12.1474 5.67684 11.8526 5.86875 11.6927Z" fill="black"/>
                                                                    <path d="M8 5V6C8 6.55228 8.44772 7 9 7C9.55228 7 10 6.55228 10 6C10 5.44772 10.4477 5 11 5H18C18.5523 5 19 5.44772 19 6V18C19 18.5523 18.5523 19 18 19H11C10.4477 19 10 18.5523 10 18C10 17.4477 9.55228 17 9 17C8.44772 17 8 17.4477 8 18V19C8 20.1046 8.89543 21 10 21H19C20.1046 21 21 20.1046 21 19V5C21 3.89543 20.1046 3 19 3H10C8.89543 3 8 3.89543 8 5Z" fill="#C4C4C4"/>
                                                                </svg>
                                                            </span>
                                                            Logout
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-center flex-column text-center">
                                            <div class="symbol symbol-100px symbol-circle mb-4" id="foto_profil">
                                                <img src="{{asset('assets/img/blank.png')}}" alt="image" loading="lazy"/>
                                            </div>
                                            <!-- CARD PROFILE -->
                                            <a class="fs-4 text-gray-800 text-hover-dark fw-bolder" id="nama_karyawan"></a>
                                            <div class="d-inline" id="jns_jabatan"></div>
                                            <div class="mt-3" id="bio"></div>
                                        </div>
                                        <br>
                                        <center id="button-web">
                                            <span id="Qrcode">
                                                {!! QrCode::size(100)->generate(Request::url()); !!}
                                            </span><br><br>
                                            <button class="btn btn-primary btn-sm" id="downloadPNG">Download Barcode</button>
                                        </center><br>
                                    </div>
                                </div>
                            </div>

                            <!-- POSTINGAN -->
                            <div class="flex-lg-row-fluid ms-lg-15">
                                <section class="sampul gambar-sampul" id="button-web">
                                    <!-- <img src="{{asset('assets/img/4.jpg')}}" alt=""> -->
                                </section>
                                <div class="mb-6" id="button-web">
                                    <div class="row">
                                        <div class="col-md-6"></div>
                                        <div class="col-md-6">
                                            <div class="float-end" style="margin-right:26px !important;">
                                                <!-- <button type="button" class="btn btn-sm btn-primary" id="buttonupload" data-bs-toggle="modal" data-bs-target="#add_post">Upload</button> -->
                                                <button type="button" class="btn btn-sm btn-primary" id="buttonupload" onclick="upload_post()">Upload</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div>
                                    <div class="container-fluid main-box">
                                        <ul class="row nav nav-tabs nav-line-tabs mb-5 fs-6 ms-5 me-5">
                                            <li class="nav-item col-6">
                                                <a class="nav-link active text-center" data-bs-toggle="tab" href="#kt_tab_pane_1"><i class="fas fa-th fs-2"></i></a>
                                            </li>
                                            <li class="nav-item col-6">
                                                <a class="nav-link text-center" data-bs-toggle="tab" href="#kt_tab_pane_2"><i class="fas fa-play fs-2"></i></a>
                                            </li>
                                        </ul>
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-responsive">
                                                <div class="card" style="background:transparent !important;" id="scrollSpy">
                                                    <div class="card-body main-page">
                                                        <div class="tab-content">
                                                            <div class="tab-pane fade show active" id="kt_tab_pane_1">
                                                                <!-- CARD POSTINGAN -->
                                                                <div class="body-post flex-wrap" id="postingan"></div>
                                                            </div>
                                                            <div class="tab-pane fade show" id="kt_tab_pane_2">
                                                                <p class="ps-5 pe-5" style="text-align: justify;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis voluptates eius sint voluptatem totam expedita, minima dolore. Accusamus dolorem magnam, cum reiciendis officiis voluptate doloribus tempora corporis ullam porro perferendis?</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		</div>
        <!-- MODAL EDIT-->
        <div class="modal fade" id="edit_staff" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <div class="modal-content">
                    <input type="hidden" id="id_user">
                    <form class="form" enctype="multipart/form-data" id="data_karyawan">
                        @csrf
                        <div class="modal-header" id="kt_modal_update_user_header">
                            <h2 class="fw-bolder">Update Profile</h2>
                            <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                                <span class="svg-icon svg-icon-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                        <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                        <div class="modal-body py-10 px-lg-17">
                            <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_update_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_update_user_header" data-kt-scroll-wrappers="#kt_modal_update_user_scroll" data-kt-scroll-offset="300px">
                                <div id="kt_modal_update_user_user_info" class="collapse show">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-7" id="profile">
                                                <label class="fs-6 fw-bold mb-2">
                                                    <span>Foto profile</span>
                                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Tipe file yang diizinkan: png, jpg, jpeg."></i>
                                                </label>
                                                <div class="mt-1">
                                                    <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('{{asset('assets/img/blank.png')}}');">
                                                        <div class="image-input-wrapper w-125px h-125px" style="background-image: url('{{asset('assets/img/blank.png')}}');" id="ada_data"></div>
                                                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow circle" data-kt-image-input-action="change">
                                                            <i class="bi bi-pencil-fill fs-7"></i>
                                                            <input type="file" name="file" accept=".png, .jpg, .jpeg"/>
                                                        </label>
                                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow circle" data-kt-image-input-action="cancel">
                                                            <i class="bi bi-x fs-2"></i>
                                                        </span>
                                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow circle" id="del_profile" data-kt-image-input-action="remove">
                                                            <i class="bi bi-x fs-2"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-7" id="sampul">
                                                <label class="fs-6 fw-bold mb-2">
                                                    <span>Foto sampul</span>
                                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Tipe file yang diizinkan: png, jpg, jpeg."></i>
                                                </label>
                                                <div class="mt-1">
                                                    <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('{{asset('assets/img/no-image.jpg')}}');">
                                                        <div class="image-input-wrapper w-125px h-125px" style="background-image: url('{{asset('assets/img/no-image.jpg')}}');" id="sampul_data"></div>
                                                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow circle" data-kt-image-input-action="change">
                                                            <i class="bi bi-pencil-fill fs-7"></i>
                                                            <input type="file" name="file" accept=".png, .jpg, .jpeg"/>
                                                        </label>
                                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow circle" data-kt-image-input-action="cancel">
                                                            <i class="bi bi-x fs-2"></i>
                                                        </span>
                                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow circle" id="del_sampul" data-kt-image-input-action="remove">
                                                            <i class="bi bi-x fs-2"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fv-row mb-7">
                                        <label class="fs-6 fw-bold mb-2">Nama</label>
                                        <input type="text" class="form-control form-control-solid" placeholder="" name="name" id="nama"/>
                                    </div>
                                    <div class="fv-row mb-7">
                                        <label class="fs-6 fw-bold mb-2">Jabatan</label>
                                        <input type="text" class="form-control form-control-solid" placeholder="" name="jenis_jabatan" id="jenis_jabatan"/>
                                    </div>
                                    <div class="fv-row mb-7">
                                        <label class="fs-6 fw-bold mb-2">Bio</label>
                                        <textarea maxlength="80" class="form-control form-control form-control-solid" data-kt-autosize="true" id="bio"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer flex-center">
                            <button type="button" class="btn btn-light me-3" id="batal" data-bs-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-primary" id="btn-simpan" onclick="simpan()">
                                <span class="indicator-label">Simpan</span>
                                <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- MODAL POSTINGAN -->
        <div class="modal fade" id="add_post" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <div class="modal-content">
                    <form class="form" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header" id="kt_modal_update_user_header">
                            <h2 class="fw-bolder">Upload Postingan</h2>
                            <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                                <span class="svg-icon svg-icon-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                        <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                        <div class="modal-body py-10 px-lg-17">
                            <div class="row">
                                <div class="col-md-3" id="gambar">
                                    <label class="fs-6 fw-bold mb-2">
                                        <span>Upload Foto</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Tipe file yang diizinkan: png, jpg, jpeg."></i>
                                    </label>
                                    <div class="mt-1">
                                        <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('{{asset('assets/img/no-image.jpg')}}');">
                                            <div class="image-input-wrapper w-125px h-125px" style="background-image: url('{{asset('assets/img/no-image.jpg')}}');" id="postingan_gambar"></div>
                                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change">
                                                <i class="bi bi-pencil-fill fs-7"></i>
                                                <input type="file" name="postingan" accept=".png, .jpg, .jpeg" />
                                                <input type="hidden" name="avatar_remove" />
                                            </label>
                                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel">
                                                <i class="bi bi-x fs-2"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-floating col-md-9" style="margin-top:2.25rem">
                                    <textarea maxlength="999" class="form-control fw-light" style="height:130px" placeholder="Masukan caption..." id="caption"></textarea>
                                    <label style="width:100%" for="floatingTextarea" class="ms-2 fw-bolder text-uppercase" id="name-user"></label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer flex-center">
                            <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Batal</button>
                            <button type="button" id="btn-postingan" class="btn btn-primary" onclick="simpan_postingan()">
                                <span class="indicator-label">Upload</span>
                                <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- MODAL QRCODE -->
        <div class="modal fade" id="qrcode" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered mw-650px" style="margin-left:0.4rem !important;">
                <div class="modal-content">
                    <div class="modal-header justify-content-center" style="border-bottom: none;">
                        <h2 class="fw-bolder text-uppercase">Scan me</h2>
                    </div>
                    <div class="modal-body p-0">
                        <div class="d-flex align-items-center justify-content-center" id="disini">
                            {!! QrCode::size(200)->generate(Request::url()); !!}
                        </div>
                        <div class="d-flex align-items-center justify-content-center mb-3" style="margin-top:1.75rem">
                            <button class="btn btn-primary btn-sm" id="downloadPNG2">Download Barcode</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<script>var hostUrl = "assets/";</script>
        <script src="{{asset('assets/js/jquery.min.js')}}"></script>
        <script src="{{asset('assets/js/dark-mode-switch.min.js')}}"></script>
		<script src="{{asset('assets/plugins/plugins.bundle.js')}}"></script>
		<script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
		<script src="{{asset('assets/plugins/fslightbox.bundle.js')}}"></script>
        <script src="{{asset('assets/extends/configuration.js')}}"></script>
		<script src="{{asset('assets/extends/login.js')}}"></script>
        <script src="{{asset('assets/extends/dashboard.js')}}"></script>
        <script>
            jQuery(document).ready(function () {
                me("{{$user_id}}");
                date_time();
            });

            function date_time()
            {
                date    = new Date;
                tahun   = date.getFullYear();
                bulan   = date.getMonth();
                tanggal = date.getDate();
                hari    = date.getDay();

                namabulan = new Array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
                namahari  = new Array('Minggu','Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu');

                h = date.getHours();
                if(h<10) { h = "0"+h; }
                m = date.getMinutes();
                if(m<10) { m = "0"+m; }
                s = date.getSeconds();
                if(s<10) { s = "0"+s; }

                result = namahari[hari]+', '+tanggal+' '+namabulan[bulan]+' '+tahun+' | '+h+':'+m+':'+s;
                $('#date_time').html(result)
                setTimeout('date_time("date_time")','1000');
                return true;
            }
        </script>
	</body>
</html>