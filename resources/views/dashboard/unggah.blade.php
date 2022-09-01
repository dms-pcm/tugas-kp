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
        <style>
            .form-floating:before {
                content: '';
                position: absolute;
                top: 1px;
                left: 1px;
                width: calc(100% - 2px);
                height: 22px;
                border-radius: 4px;
                background-color: #f1faff;
            }
            @media screen and (min-width: 320px) and (max-width: 428px) {
                #title-none{
                    display:none !important;
                }
                #kt_toolbar_container{
                    display:none !important;
                }
                #kt_toolbar{
                    display:none !important;
                }
                .space{
                    margin-top:3px;
                }
                .top-input{
                    margin-top:2rem;
                }
               
            }

            @media screen and (min-width: 429px) and (max-width: 889px) {
                #title-none{
                    display:none !important;
                }
                #kt_toolbar_container{
                    display:none !important;
                }
                #kt_toolbar{
                    display:none !important;
                }
                .space{
                    margin-top:3px;
                }
                .top-input{
                    margin-top:2rem;
                }
                
            }

            @media screen and (min-width: 890px) {
                .space{
                    margin-top:5px;
                }
                .top-input{
                    margin-top:0px;
                }
                .app-bar{
                    display:none !important;
                }
            }
        </style>
        <script type="text/javascript">
            var baseUrl = "{{url('/')}}/";
            var urlApi = "{{url('/api')}}/";
        </script>
	</head>
	<body class="bg-gray">
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
                                    <a href="{{url('/unggah')}}" class="text-muted text-hover-primary">Home</a>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <span class="mt-2 text-muted">Senin, 25 Juli 2022 | 17:00</span>
                        </div>
                        <div class="d-flex align-items-center py-1">
                            <button class="btn btn-sm btn-light-danger" onclick="logout()">Logout</button>
                        </div>
                    </div>
                </div>
                <div class="post d-flex flex-column-fluid mt-6">
                    <div id="kt_content_container" class="container-xxl">
                        <a id="back">
                            <div class="row">
                                <div class="col-1">
                                    <i class="fas fa-arrow-left float-end fs-3 space"></i>
                                </div>
                                <div class="col-11">
                                    <h1 class="m-0">Buat Postingan</h1>
                                </div>
                            </div>
                        </a>
                        <div class="d-flex flex-center flex-column text-center" style="margin-top:2rem;">
                            <div class="symbol symbol-100px symbol-circle mb-1" id="foto_profil">
                                <img src="{{asset('assets/img/blank.png')}}" alt="image" />
                            </div>
                            <a class="fs-4 text-gray-800 text-hover-dark fw-bolder" id="nama_karyawan">
                                {{--<span>
                                    Dimas Purbo
                                </span>--}}
                            </a>
                        </div>
                        <form class="form" method="post" enctype="multipart/form-data" id="form-unggah">
                            <div class="row" style="margin-top:2rem;">
                                <div class="col-md-6">
                                    <div class="dropzone" style="margin-top:2rem;" id="postingan">
                                        <div class="dz-message needsclick d-flex align-items-center justify-content-center">
                                            <i class="bi bi-file-earmark-arrow-up text-secondary fs-3x"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 top-input">
                                    <label class="fs-6 fw-bold mb-2">Input Text</label>
                                    <div class="form-floating">
                                        <textarea maxlength="999" class="form-control bg-light-primary fw-light" style="height:80px" placeholder="Masukan caption..." id="caption"></textarea>
                                        <label for="floatingTextarea" id="name-user"></label>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="row">
                            <div class="mt-4">
                                <!-- <button class="btn btn-success float-end" onclick="upload()">Upload</button> -->
                                <button type="button" id="btn-upload" class="btn btn-success float-end" onclick="upload()">
                                    <span class="indicator-label">Upload</span>
                                    <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		</div>
        <!-- MODAL QRCODE -->
        <div class="modal fade" id="qrcode" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <div class="modal-content">
                    <div class="modal-header" id="kt_modal_update_user_header">
                        <h2 class="fw-bolder">Scan me</h2>
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
                        <div class="d-flex align-items-center justify-content-center">
                            {!! QrCode::size(200)->generate(Request::url()); !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<script>var hostUrl = "assets/";</script>
        <script src="{{asset('assets/js/jquery.min.js')}}"></script>
		<script src="{{asset('assets/plugins/plugins.bundle.js')}}"></script>
		<script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
		<script src="{{asset('assets/plugins/fslightbox.bundle.js')}}"></script>
        <script src="{{asset('assets/extends/configuration.js')}}"></script>
		<script src="{{asset('assets/extends/login.js')}}"></script>
        <script src="{{asset('assets/extends/postingan.js')}}"></script>
	</body>
</html>