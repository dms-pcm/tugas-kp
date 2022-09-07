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
            html{
                scroll-behavior:smooth;
                box-sizing:border-box;
            }
            body{
                position: relative;
                transition: opacity 0.5s;
                opacity: 0;
            }
            .dropdown-toggle::after{
                border:0px !important;
                content: none;
            }
            .garis{
                overflow-x:hidden;
                border-top:1px solid #ccc;
                position: relative;
                padding-top:30px;
            }
            .garis:first-child{
                border-top:0px;
                margin-top:10px
            }
            .dots{
                width:100%;
                height:100%;
                position: absolute;
                top: 0;
            }
            .asasa{
                margin-top:2.5rem;
            }
            .dropdown-menu.show{
                margin-right: 7px !important;
            }
            .form-floating:before {
                content: '';
                position: absolute;
                top: 1px;
                left: 11px;
                width: calc(100% - 22px);
                height: 22px;
                border-radius: 4px;
                background-color: #ffffff;
            }
            @media screen and (min-width: 320px) and (max-width: 428px) {
                #title-none{
                    display:none !important;
                }
                #nav-color{
                    background-color:#ffffff;
                }
                #work{
                    font-size: 8.6px !important;
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
               
            }

            @media screen and (min-width: 429px) and (max-width: 889px) {
                #title-none{
                    display:none !important;
                }
                #nav-color{
                    background-color:#ffffff;
                }
                #work{
                    font-size: 10px !important;
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
                
            }

            @media screen and (min-width: 890px) {
                #work{
                    font-size: 11px !important;
                }
                .space{
                    margin-top:5px;
                }
                #web{
                    display: flex;
                    justify-content: center;
                }
                #card-web{
                    width: 45rem;
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
	<body class="bg-gray" data-bs-spy="scroll" onload="document.body.style.opacity='1'">
		<div class="d-flex flex-column flex-root">
            <div class="d-flex flex-column flex-column-fluid">
                <div class="post d-flex flex-column-fluid fixed-top bg-light" style="padding:0.8rem;" id="nav-color">
                    <div id="kt_content_container" class="container-xxl">
                        <a id="back_2">
                            <div class="row">
                                <div class="col-1">
                                    <i class="fas fa-arrow-left float-end fs-3 space"></i>
                                </div>
                                <div class="col-11">
                                    <h1 class="m-0">Photos</h1>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="mt-4 last" id="web">
                    <div class="card align-content-center" id="card-web" style="background:transparent !important;" >
                        
                    </div>
                </div>
            </div>
		</div>
        <!-- <div id="modal-generate">

        </div> -->
        <div class="modal fade" id="update" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <div class="modal-content">
                    <input type="hidden" id="id_postingan">
                    <form class="form" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h2 class="fw-bolder">Update Postingan</h2>
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
                                        <span>Update Foto</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" id="tooltip" data-bs-toggle="tooltip" title="Tipe file yang diizinkan: png, jpg, jpeg."></i>
                                    </label>
                                    <div class="mt-1">
                                        <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('{{asset('assets/img/no-image.jpg')}}');">
                                            <div class="image-input-wrapper w-125px h-125px" style="background-image: url('{{asset('assets/img/no-image.jpg')}}');" id="postingan_gambar"></div>
                                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change">
                                                <i class="bi bi-pencil-fill fs-7"></i>
                                                <input type="file" name="file" accept=".png, .jpg, .jpeg" />
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-floating col-md-9" style="margin-top:2.25rem">
                                    <textarea maxlength="999" class="form-control fw-light" style="height:130px" placeholder="Masukan caption..." id="caption"></textarea>
                                    <label style="width:100%" for="floatingTextarea" class="ms-2 fw-bolder text-uppercase" id="user_name"></label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer flex-center">
                            <button type="button" class="btn btn-light me-3" data-bs-dismiss="modal">Batal</button>
                            <button type="button" id="btn-update" class="btn btn-primary">
                                <span class="indicator-label">Update</span>
                                <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
		<script>var hostUrl = "assets/";</script>
        <script src="{{asset('assets/js/jquery.min.js')}}"></script>
		<script src="{{asset('assets/plugins/plugins.bundle.js')}}"></script>
		<script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
		<script src="{{asset('assets/plugins/fslightbox.bundle.js')}}"></script>
        <script src="{{asset('assets/extends/configuration.js')}}"></script>
        <script src="{{asset('assets/extends/dashboard.js')}}"></script>
        <script>
            jQuery(document).ready(function () {
                show_detail();
            });

            function show_detail() {
                let cekUrl = $(location).attr('href');
                let sp1 = cekUrl.split('/');
                let sp2 = sp1[4].split('#');
                let id = sp2[0];
                $.ajax({
                    url:`${urlApi}show/${id}`,
                    type:'GET',
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                        Authorization: "Bearer " + localStorage.getItem("token"),
                    },
                    success:function(response){
                        let htmlPost = ``;
                        let htmlName = '';
                        let data = response?.data?.data_postingan;
                        let name = response?.data?.nama_user?.name;
                        htmlName+=`<span>${name}</span>`;
                        $('#user_name').html(htmlName);
                        $.each(data,function (index,elements) {
                            let idPost = elements?.id;
                            let ConvertStringToHTML = function (str) {
                                let parser = new DOMParser();
                                let doc = parser.parseFromString(str, 'text/html');
                                return doc.body;
                            };
                            let aasasa = elements?.caption;
                            let gelo = ConvertStringToHTML(aasasa);
                            let cobaae = gelo.innerHTML;
                            let erer = cobaae.split('\n');

                            let tanggal = elements?.created_at;
                            let a = tanggal.split(':');
                            let b = a[0].split('T');
                            var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
                            var today  = new Date(b[0]);
                            let format = today.toLocaleDateString("en-US", options);
                            if (elements?.caption == null) {
                                htmlPost+=`
                                <div id="postingan-${elements?.id}" class="garis">
                                    <img src="${baseUrl}/storage/${elements?.attachment}" style="width:100%;height:auto;" alt="..." loading="lazy">
                                    <div class="card-body" style="padding:7px !important; padding-top:0px !important; margin-top:4px;">
                                        <div class="row" id="work">
                                            <div class="col-7">
                                                <span> Work at</span>
                                                <span class="text-uppercase fw-bolder" style="color:#6610f2;">Burningroom Technology</span>
                                            </div>
                                            <div class="col-5">
                                                <span class="float-end"> ${format}</span>
                                            </div>
                                        </div>
                                        <div class="caption mt-4">
                                            <p style="word-break: break-all;"><span class="text-uppercase fw-bolder me-2">${name}</span> </p>
                                        </div>
                                    </div>
                                </div>
                                `;
                            }else{
                                let htmlan = '';
                                let htmlButton = '';
                                for (let index = 0; index < erer.length; index++) {
                                    const element = erer[index] + '<br>';
                                    htmlan+=`
                                        ${element}
                                    `;
                                }
                                if (!localStorage.getItem("token")) {
                                    console.log('masuk ga');
                                    htmlButton+=`
                                    <div class="dropdown dots d-none">
                                        <button class="btn dropdown-toggle float-end asasa" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fs-2 text-danger"></i>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li><a class="dropdown-item" onclick="showModal(${idPost})"><i class="fas fa-pencil-alt me-2 text-warning"></i> Edit</a></li>
                                            <li><a class="dropdown-item" onclick="hapus(${idPost})"><i class="fas fa-trash me-2 text-danger"></i> Delete</a></li>
                                        </ul>
                                    </div>
                                    `;
                                }else {
                                    htmlButton+=`
                                    <div class="dropdown dots">
                                        <button class="btn dropdown-toggle float-end asasa" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fs-2 text-danger"></i>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li><a class="dropdown-item" onclick="showModal(${idPost})"><i class="fas fa-pencil-alt me-2 text-warning"></i> Edit</a></li>
                                            <li><a class="dropdown-item" onclick="hapus(${idPost})"><i class="fas fa-trash me-2 text-danger"></i> Delete</a></li>
                                        </ul>
                                    </div>
                                    `;
                                }
                                htmlPost+=`
                                <div id="postingan-${elements?.id}" class="garis">
                                    <img src="${baseUrl}/storage/${elements?.attachment}" style="width:100%;height:auto;" alt="..." loading="lazy">
                                    `+htmlButton+`
                                    <div class="card-body" style="padding:7px !important; padding-top:0px !important; margin-top:4px;">
                                        <div class="row" id="work">
                                            <div class="col-7">
                                                <span> Work at</span>
                                                <span class="text-uppercase fw-bolder" style="color:#6610f2;">Burningroom Technology</span>
                                            </div>
                                            <div class="col-5">
                                                <span class="float-end"> ${format}</span>
                                            </div>
                                        </div>
                                        <div class="caption mt-4">
                                            <p style="word-break: break-all;"><span class="text-uppercase fw-bolder me-2">${name}</span>`+htmlan+`</p>
                                        </div>
                                    </div>
                                </div>
                                `;
                            }
                        })
                        $('#card-web').html(htmlPost);
                        window.location.href=window.location.href;
                        setTimeout(function(){window.location.href=window.location.href} , 1000);
                    },
                    error:function(xhr){
                        if (!localStorage.getItem("token")) {
                            console.log('gapapa');
                        } else {
                            handleErrorLogin(xhr);
                        }
                    }
                });
            }
        </script>
	</body>
</html>