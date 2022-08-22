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
            .dropdown-isi{
                display: none;
                font-size: 14px;
                position: absolute;
                background-color: #fff;
                min-width: 100px;
                box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                padding: 12px 16px;
                z-index: 1;
                right: 12px;
                border-radius: 6px;
            }
            .dropdown-navbar:hover .dropdown-isi {
                display: block;
            }
            @media screen and (min-width: 320px) and (max-width: 428px) {
                #title-none{
                    display:none !important;
                }
                .href:last-child{
                    margin-bottom: 70px !important;
                }
                #edit{
                    display:none !important;
                }
                #kt_toolbar_container{
                    display:none !important;
                }
                #kt_toolbar{
                    display:none !important;
                }
                .post{
                    margin-top:0px !important;
                }
                .mobile{
                    width:100px !important;
                    height:75px !important;
                    object-fit: cover !important;
                }

                .post .container-xxl{
                    overflow-x:hidden;
                    padding-left: 0px !important;
                    padding-right: 0px !important;
                }

                div.gallery{
                padding:0 !important;
                margin:0 !important;
                flex: none;
                }

                div.gallery img {
                    width: 100px;
                    margin:5px 2px 5px 7px;
                    height: 100px;
                }

                #card{
                    position: relative;
                    overflow:hidden;
                    background:transparent;
                    height: 250px !important;
                    border-radius: 0 0 10% 10% !important;
                    max-width: 100% !important;
                }
                #card #pp{
                    width: 100% !important;
                    height: 100% !important;
                    object-fit: cover;
                    border-radius: 0 0 10% 10% !important;
                }

                #card #card-body{
                    position: absolute;
                    top: 0px !important;
                    width: 100% !important;
                    height: 100% !important;
                    overflow: hidden !important;
                    background: rgba(9, 14 , 20, 0.45);
                }
            }

            @media screen and (min-width: 429px) and (max-width: 889px) {
                #title-none{
                    display:none !important;
                }
                .href:last-child{
                    margin-bottom: 70px !important;
                }
                #edit{
                    display:none !important;
                }
                #kt_toolbar_container{
                    display:none !important;
                }
                #kt_toolbar{
                    display:none !important;
                }
                .post{
                    margin-top:0px !important;
                }
                .mobile{
                    width:100px !important;
                    height:75px !important;
                    object-fit: cover !important;
                }

                .post .container-xxl{
                    overflow-x:hidden;
                    padding-left: 0px !important;
                    padding-right: 0px !important;
                }

                div.gallery{
                padding:0 !important;
                margin:0 !important;
                flex: none;
                }

                div.gallery img {
                    width: 100px;
                    border: 1px solid #fff;
                    margin:0px 1px 0px -1px;
                    height: 100px;
                }

                #card{
                    position: relative;
                    overflow:hidden;
                    background:transparent;
                    height: 250px !important;
                    border-radius: 0 0 10% 10% !important;
                    max-width: 100% !important;
                }
                #card #pp{
                    width: 100% !important;
                    height: 100% !important;
                    object-fit: cover;
                    border-radius: 0 0 10% 10% !important;
                }

                #card #card-body{
                    position: absolute;
                    top: 0px !important;
                    width: 100% !important;
                    height: 100% !important;
                    overflow: hidden !important;
                    background: rgba(9, 14 , 20, 0.45);
                }
            }

            @media screen and (min-width: 890px) {
                .mobile{
                    width:100px !important;
                    height:95px !important;
                    object-fit: cover !important;
                }
                #dots{
                    display:none !important;
                }
                #hidden{
                    display:none !important;
                }
                #web{
                    width:14% !important;
                }
                #color{
                    color:#000 !important;
                }
                div.gallery{
                padding:0 !important;
                margin:0 !important;
                flex: none;
                }
                
                div.gallery img {
                    width: 100px;
                    margin:5px 1px 5px 6px;
                    height: 100px;
                }
                .app-bar{
                    display:none !important;
                }
                #card #pp{
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
                                    <a href="{{url('/dashboard')}}" class="text-muted text-hover-primary">Home</a>
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
                <!-- NAVBAR BOTTOM -->
                <nav class="navbar fixed-bottom navbar-light bg-light app-bar">
                    <div class="container-fluid">
                        <div class="col-4">
                            <div class="text-center">
                                <i class="fas fa-qrcode text-dark" style="font-size:25px;"></i><br>
                                <span class="text-muted" style="font-size:12px;">Lihat QR</span>
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
                                <div class="form-switch d-flex justify-content-center mb-2">
                                    <input class="form-check-input w-46px h-25px" type="checkbox" id="night" checked="checked" />
                                </div>
                                <span class="text-muted" style="font-size:12px;">Night Mode</span>
                            </div>
                        </div>
                    </div>
                </nav>
                <div class="post d-flex flex-column-fluid mt-6">
                    <div id="kt_content_container" class="container-xxl">
                        <div class="d-flex flex-column flex-lg-row">
                            <!-- SIDEBAR -->
                            @foreach ($data as $data)
                            <div class="flex-column flex-lg-row-auto w-lg-250px w-xl-350px mb-10 ">
                                <div class="card mb-5 mb-xl-8" id="card">
                                    <div id="img" style="height:100% !important;">
                                        <img id="pp" src="{{asset('assets/img/no-image.jpg')}}" alt="">
                                    </div>
                                    <div class="card-body" id="card-body">
                                        <div class="row" id="edit">
                                            <div class="col-md-6"></div>
                                            <div class="col-md-6">
                                                <span class="float-end" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="Edit staff details">
                                                    <a href="#" class="float-end btn btn-sm btn-light-primary" data-bs-toggle="modal" data-bs-target="#edit_staff">
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
                                                        <div data-bs-toggle="modal" data-bs-target="#edit_staff" class="d-flex align-items-center text-muted fw-bold">
                                                            <span class="svg-icon svg-icon-muted svg-icon-2 me-3">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black"/>
                                                                    <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black"/>
                                                                </svg>
                                                            </span>
                                                            Edit profile
                                                        </div>
                                                        <div class="separator my-2"></div>
                                                        <div onclick="logout()" class="d-flex align-items-center text-muted fw-bold">
                                                            <span class="svg-icon svg-icon-muted svg-icon-2 me-3">
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
                                                <img src="{{asset('assets/img/blank.png')}}" alt="image" />
                                            </div>
                                            <a class="fs-4 text-gray-800 text-hover-dark fw-bolder" id="nama_karyawan">
                                               <span>
                                               {{ $data->name }}
                                               </span>
                                            </a>
                                            <div class="d-inline" id="jns_jabatan">
                                                {{--<span>Fullstack Proggrammer</span>--}}
                                            </div>
                                            <div class="mb-9 mt-6" id="bio">
                                                {{--<span>bio aja</span>--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            <!-- POSTINGAN -->
                            <div class="flex-lg-row-fluid ms-lg-15">
                                <div class="mb-6">
                                    <h3 class="text-muted text-decoration-underline text-center">My Gallery</h3>
                                    <div class="row">
                                        <div class="col-md-6"></div>
                                        <div class="col-md-6">
                                            <div class="float-end" style="margin-right:26px !important;">
                                                <a href="{{url('/unggah')}}" class="btn btn-sm btn-primary">Buat Post</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div>
                                    <div class="row" id="postingan">
                                    {{--<div class="col-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    aaaaa
                                                </div>
                                            </div>
                                        </div>--}}
                                    </div>
                                </div>
                            </div>
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
	</body>
</html>