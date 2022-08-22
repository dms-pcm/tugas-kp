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
            .garis{
                overflow-x:hidden;
                border-top:1px solid #ccc;
            }
            .garis:first-child{
                border-top:0px;
            }
            html{
                scroll-behavior:smooth;
                box-sizing:border-box;
            }
            body{
                position: relative;
                transition: opacity 0.5s;
                opacity: 0;
            }
            .last:last-child{
                    margin-bottom: 70px !important;
                }
            @media screen and (min-width: 320px) and (max-width: 428px) {
                #title-none{
                    display:none !important;
                }
                #nav-color{
                    background-color:#ffffff;
                }
                #work{
                    font-size: 10px !important;
                }
                .last:last-child{
                    margin-bottom: 70px !important;
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
                .last:last-child{
                    margin-bottom: 70px !important;
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
                <div class="post d-flex flex-column-fluid fixed-top bg-light p-2" id="nav-color">
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
                $.ajax({
                    url:`${urlApi}postingan/show`,
                    type:'GET',
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                        Authorization: "Bearer " + localStorage.getItem("token"),
                    },
                    success:function(response){
                        let htmlPost = ``;
                        let data = response?.data?.data_postingan;
                        let name = response?.data?.nama_user?.name;
                        $.each(data,function (index,elements) {
                            let tanggal = elements?.created_at;
                            let a = tanggal.split(':');
                            let b = a[0].split('T');
                            var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
                            var today  = new Date(b[0]);
                            let format = today.toLocaleDateString("en-US", options);
                            htmlPost+=`
                            <div id="postingan-${elements?.id}" class="garis">
                                <img src="${baseUrl}/storage/${elements?.attachment}" style="padding-top:20px;max-width:100%;height:auto;" alt="...">
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
                                        <p style="text-align: justify;"><span class="text-uppercase fw-bolder me-2">${name}</span>${elements?.caption}</p>
                                    </div>
                                </div>
                            </div>
                            `;
                        })
                        $('#card-web').html(htmlPost);
                        window.location.href=window.location.href;
                        setTimeout(function(){window.location.href=window.location.href} , 500);
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