let file = '';
let file_sampul = '';
jQuery(document).ready(function () {
    loadStop();
    $('#back_2').on('click',function(){
        window.location.href = `${baseUrl}dashboard/${localStorage.getItem("userID")}`
    });
    if (!localStorage.getItem("token")) {
        $('.dropdown-navbar').addClass('d-none');
        $('#barshow').addClass('d-none');
        $('#logout').addClass('d-none');
        $('#buttonedit').addClass('d-none');
        $('#buttonupload').addClass('d-none');
    }else{
        $('#bar').addClass('d-none');
    }
    const downloadPNG = document.querySelector('#downloadPNG');
    downloadPNG.addEventListener('click', downloadSVGAsPNG);
    const downloadPNG2 = document.querySelector('#downloadPNG2');
    downloadPNG2.addEventListener('click', downloadSVGAsPNG2);
});

function loadStart(){
    //start
    $('#btn-simpan .indicator-label').css('display','none')
    $('#btn-simpan .indicator-progress').css('display','block')
}

function loadStop(){
    //finished
    $('#btn-simpan .indicator-label').css('display','block')
    $('#btn-simpan .indicator-progress').css('display','none')
}

function me(id) {
    $.ajax({
        url: `${urlApi}show-qrcode/`+id,
        type:'GET',
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            Authorization: "Bearer " + localStorage.getItem("token"),
        },
        success:function(response){
            let html = ``;
            let htmlName = '';
            let htmlCreatedBy = ``;
            let res_name = response?.data?.user?.name;
            html+=`<span id="color-name">${res_name}</span>`;
            $('#nama_karyawan').html(html);
            htmlName+=`<span>${res_name}</span>`;
            $('#name-user').html(htmlName);
            $('#edit_staff #kt_modal_update_user_scroll #kt_modal_update_user_user_info #nama').val(res_name);
            htmlCreatedBy = `
            <span> Work at</span>
            <span class="text-primary">${res_name}</span>
            `;
            $('#created_by').html(htmlCreatedBy);

            let res = response?.data?.data_karyawan;
            file = res?.attachment;
            file_sampul = res?.attachment_sampul;
            let htmlProfil = ``;
            let htmlSampul = ``;
            let htmlSampulWeb = ``;
            let htmlJenisJabatan = ``;
            let htmlBio = ``;
            if (res?.attachment == null) {
                htmlProfil+=`
                <img src="${baseUrl}/assets/img/blank.png" alt="image" />
                `;
            }else{
                htmlProfil+=`
                <img src="${baseUrl}storage/${res?.attachment}" style="object-fit: cover !important;" alt="image" />
                `;
            }
            $('#foto_profil').html(htmlProfil);
            
            if(res?.attachment_sampul == null){
                htmlSampul+=``;
                htmlSampulWeb+=``;
            }else{
                htmlSampul+=`
                <img id="pp" src="${baseUrl}storage/${res?.attachment_sampul}" alt="image" />
                `;
                htmlSampulWeb+=`
                <img src="${baseUrl}storage/${res?.attachment_sampul}" alt="image" />
                `;
            }
            $('#img').html(htmlSampul);
            $('.gambar-sampul').html(htmlSampulWeb);

            htmlJenisJabatan+=`
            <span class="text-light fw-light size-fs" id="color">${res?.jenis_jabatan}</span>
            `;
            $('#jns_jabatan').html(htmlJenisJabatan);
            
            if (res?.bio == null) {
                htmlBio+=`
                <span></span>
                `;
            }else{
                htmlBio+=`
                <span class="text-secondary fw-light bioooo" id="color">${res?.bio}</span>
                `;
            }
            $('#bio').html(htmlBio);

            if (!!res?.jenis_jabatan) {
                if (res?.attachment == null) {
                    $('#edit_staff #kt_modal_update_user_scroll #kt_modal_update_user_user_info #ada_data').css('background-image','url('+baseUrl+'assets/img/blank.png');
                }else{
                    $('#edit_staff #kt_modal_update_user_scroll #kt_modal_update_user_user_info #ada_data').css('background-image','url('+baseUrl+'storage/' + res?.attachment + ')');
                }
                if (res?.attachment_sampul == null) {
                    $('#edit_staff #kt_modal_update_user_scroll #kt_modal_update_user_user_info #sampul_data').css('background-image','url('+baseUrl+'assets/img/no-image.jpg');
                }else{
                    $('#edit_staff #kt_modal_update_user_scroll #kt_modal_update_user_user_info #sampul_data').css('background-image','url('+baseUrl+'storage/' + res?.attachment_sampul + ')');
                }
                $('#edit_staff #kt_modal_update_user_scroll #kt_modal_update_user_user_info #jenis_jabatan').val(res?.jenis_jabatan);
                $('#edit_staff #kt_modal_update_user_scroll #kt_modal_update_user_user_info #bio').val(res?.bio);
            }

            $('#add_post #postingan_gambar').css('background-image','url('+baseUrl+'assets/img/no-image.jpg');

            let htmlPostingan = ``;
            $.each(response?.data?.data_postingan,function (index, element) {
                let idpost = element?.id;
                htmlPostingan+=`
                <div class="post-foto">
                    <a href="${baseUrl}post/${id}#postingan-${idpost}">
                        <img src="${baseUrl}storage/${element?.attachment}" alt="image" class="img-fluid"/>
                    </a>
                </div>
                `;
            });
            $('#postingan').html(htmlPostingan);
        },
        error:function(xhr){
            handleErrorLogin(xhr);
            if (xhr?.status == 400) {
                handleErrorDetails(xhr);
            }
        }
    });
}

function simpan() {
    var formData = new FormData(document.getElementById('data_karyawan'));
    let a = `${baseUrl}storage/${file}`;
    let z = `${baseUrl}storage/${file_sampul}`;
    let b = $('#edit_staff #kt_modal_update_user_scroll #kt_modal_update_user_user_info #ada_data').css('background-image');
    let q = b.split('(');
    let w = q[1].split('\"');
    let cek = `${baseUrl}assets/img/blank.png`;

    let h = $('#edit_staff #kt_modal_update_user_scroll #kt_modal_update_user_user_info #sampul_data').css('background-image');
    let i = h.split('(');
    let j = i[1].split('\"');
    let k = `${baseUrl}assets/img/no-image.jpg`;
    
    if (w[1] == cek && j[1] == k) {//sampul&profile(kosong)
        formData.append('name', $('#edit_staff #kt_modal_update_user_scroll #kt_modal_update_user_user_info #nama').val());
        formData.append('jenis_jabatan', $('#edit_staff #kt_modal_update_user_scroll #kt_modal_update_user_user_info #jenis_jabatan').val());
        formData.append('bio', $('#edit_staff #kt_modal_update_user_scroll #kt_modal_update_user_user_info #bio').val());
    }else if(j[1] == k){//sampul(kosong)
        formData.append('attachment', $('#edit_staff #kt_modal_update_user_scroll #kt_modal_update_user_user_info #profile input[type="file"]')[0].files[0]);
        formData.append('name', $('#edit_staff #kt_modal_update_user_scroll #kt_modal_update_user_user_info #nama').val());
        formData.append('jenis_jabatan', $('#edit_staff #kt_modal_update_user_scroll #kt_modal_update_user_user_info #jenis_jabatan').val());
        formData.append('bio', $('#edit_staff #kt_modal_update_user_scroll #kt_modal_update_user_user_info #bio').val());
    }else if(w[1] == cek){//profil(kosong)
        formData.append('attachment_sampul', $('#edit_staff #kt_modal_update_user_scroll #kt_modal_update_user_user_info #sampul input[type="file"]')[0].files[0]);
        formData.append('name', $('#edit_staff #kt_modal_update_user_scroll #kt_modal_update_user_user_info #nama').val());
        formData.append('jenis_jabatan', $('#edit_staff #kt_modal_update_user_scroll #kt_modal_update_user_user_info #jenis_jabatan').val());
        formData.append('bio', $('#edit_staff #kt_modal_update_user_scroll #kt_modal_update_user_user_info #bio').val());
    }else if(w[1]==a && j[1]==z){
        formData.append('name', $('#edit_staff #kt_modal_update_user_scroll #kt_modal_update_user_user_info #nama').val());
        formData.append('jenis_jabatan', $('#edit_staff #kt_modal_update_user_scroll #kt_modal_update_user_user_info #jenis_jabatan').val());
        formData.append('bio', $('#edit_staff #kt_modal_update_user_scroll #kt_modal_update_user_user_info #bio').val());
    }else if(z == j[1]){//sampul tidak diganti
        formData.append('attachment', $('#edit_staff #kt_modal_update_user_scroll #kt_modal_update_user_user_info #profile input[type="file"]')[0].files[0]);
        formData.append('name', $('#edit_staff #kt_modal_update_user_scroll #kt_modal_update_user_user_info #nama').val());
        formData.append('jenis_jabatan', $('#edit_staff #kt_modal_update_user_scroll #kt_modal_update_user_user_info #jenis_jabatan').val());
        formData.append('bio', $('#edit_staff #kt_modal_update_user_scroll #kt_modal_update_user_user_info #bio').val());
    }else if(a == w[1]){//profile tidak diganti
        formData.append('attachment_sampul', $('#edit_staff #kt_modal_update_user_scroll #kt_modal_update_user_user_info #sampul input[type="file"]')[0].files[0]);
        formData.append('name', $('#edit_staff #kt_modal_update_user_scroll #kt_modal_update_user_user_info #nama').val());
        formData.append('jenis_jabatan', $('#edit_staff #kt_modal_update_user_scroll #kt_modal_update_user_user_info #jenis_jabatan').val());
        formData.append('bio', $('#edit_staff #kt_modal_update_user_scroll #kt_modal_update_user_user_info #bio').val());
    }else{
        formData.append('attachment', $('#edit_staff #kt_modal_update_user_scroll #kt_modal_update_user_user_info #profile input[type="file"]')[0].files[0]);
        formData.append('attachment_sampul', $('#edit_staff #kt_modal_update_user_scroll #kt_modal_update_user_user_info #sampul input[type="file"]')[0].files[0]);
        formData.append('name', $('#edit_staff #kt_modal_update_user_scroll #kt_modal_update_user_user_info #nama').val());
        formData.append('jenis_jabatan', $('#edit_staff #kt_modal_update_user_scroll #kt_modal_update_user_user_info #jenis_jabatan').val());
        formData.append('bio', $('#edit_staff #kt_modal_update_user_scroll #kt_modal_update_user_user_info #bio').val());
    }

    loadStart()
    $.ajax({
        url:`${urlApi}karyawan`,
        type:'POST',
        data: formData,
        processData: false,
        contentType: false,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            Authorization: "Bearer " + localStorage.getItem("token"),
        },
        success:function(response){
            loadStop();
            Swal.fire({
                title: "Berhasil!",
                text: response.status.message,
                icon: "success",
            }).then((result) => {
                window.location.reload();
                $("#edit_staff").modal("hide");
            });
        },
        error:function(xhr){
            loadStop();
            handleErrorSimpan(xhr);
        }
    });
}

function show(id) {
    window.location.href = `${baseUrl}post#${id}`;
}

function downloadSVGAsPNG(e){
    const canvas = document.createElement("canvas");
    const svg = document.querySelector('#Qrcode svg');
    const base64doc = btoa(unescape(encodeURIComponent(svg.outerHTML)));
    const w = 500;
    const h = 500;
    const img_to_download = document.createElement('img');
    img_to_download.src = 'data:image/svg+xml;base64,' + base64doc;
    // console.log(w, h);
    img_to_download.onload = function () {
    //   console.log('img loaded');
      canvas.setAttribute('width', w);
      canvas.setAttribute('height', h);
      const context = canvas.getContext("2d");
      //context.clearRect(0, 0, w, h);
      context.drawImage(img_to_download,0,0,w,h);
      const dataURL = canvas.toDataURL('image/jpeg');
      if (window.navigator.msSaveBlob) {
        window.navigator.msSaveBlob(canvas.msToBlob(), "Qrcode.jpeg");
        e.preventDefault();
      } else {
        const a = document.createElement('a');
        const my_evt = new MouseEvent('click');
        a.download = 'Qrcode.jpeg';
        a.href = dataURL;
        a.dispatchEvent(my_evt);
      }
      //canvas.parentNode.removeChild(canvas);
    }  
}

function downloadSVGAsPNG2(e){
    const canvas = document.createElement("canvas");
    const svg = document.querySelector('#qrcode #disini svg');
    const base64doc = btoa(unescape(encodeURIComponent(svg.outerHTML)));
    const w = 500;
    const h = 500;
    const img_to_download = document.createElement('img');
    img_to_download.src = 'data:image/svg+xml;base64,' + base64doc;
    // console.log(w, h);
    img_to_download.onload = function () {
    //   console.log('img loaded');
      canvas.setAttribute('width', w);
      canvas.setAttribute('height', h);
      const context = canvas.getContext("2d");
      //context.clearRect(0, 0, w, h);
      context.drawImage(img_to_download,0,0,w,h);
      const dataURL = canvas.toDataURL('image/jpeg');
      if (window.navigator.msSaveBlob) {
        window.navigator.msSaveBlob(canvas.msToBlob(), "Qrcode.jpeg");
        e.preventDefault();
      } else {
        const a = document.createElement('a');
        const my_evt = new MouseEvent('click');
        a.download = 'Qrcode.jpeg';
        a.href = dataURL;
        a.dispatchEvent(my_evt);
      }
      //canvas.parentNode.removeChild(canvas);
    }  
}

function simpan_postingan() {
    var formData = new FormData();
    formData.append('attachment', $('#add_post #gambar input[type="file"]')[0].files[0]);
    formData.append('caption', $('#add_post #caption').val());

    loadStart()
    $.ajax({
        url:`${urlApi}postingan`,
        type:'POST',
        data: formData,
        processData: false,
        contentType: false,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            Authorization: "Bearer " + localStorage.getItem("token"),
        },
        success:function(response){
            loadStop();
            Swal.fire({
                title: "Berhasil!",
                text: response.status.message,
                icon: "success",
            }).then((result) => {
                window.location.reload();
                $("#add_post").modal("hide");
            });
        },
        error:function(xhr){
            loadStop();
            handleErrorSimpan(xhr);
        }
    });
}