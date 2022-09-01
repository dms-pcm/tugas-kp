let idUser = '';
jQuery(document).ready(function ($) {
    loadStop();
    me();
    detail();
    dzUpload();
    $('#back').on('click',function(){
        window.location.href = `${baseUrl}dashboard/${localStorage.getItem("userID")}`
    });
});

function loadStart(){
    //start
    $('#btn-upload .indicator-label').css('display','none')
    $('#btn-upload .indicator-progress').css('display','block')
}

function loadStop(){
    //finished
    $('#btn-upload .indicator-label').css('display','block')
    $('#btn-upload .indicator-progress').css('display','none')
}

function me() {
    $.ajax({
        url:`${urlApi}check-status`,
        type:'GET',
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            Authorization: "Bearer " + localStorage.getItem("token"),
        },
        success:function(response){
            let html = ``;
            let htmlName = ``;
            let res = response?.data?.user?.name;
            idUser = response?.data?.user?.id;
            html+=`<span>${res}</span>`;
            $('#nama_karyawan').html(html);
            htmlName+=`<span class="fw-bolder text-uppercase">${res}</span>`;
            $('#name-user').html(htmlName);
        },
        error:function(xhr){
            handleErrorLogin(xhr);
        }
    });
}

function detail() {
    $.ajax({
        url:`${urlApi}karyawan/view`,
        type:'GET',
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            Authorization: "Bearer " + localStorage.getItem("token"),
        },
        success:function(response){
            let res = response?.data?.data_karyawan;
            file = res?.attachment;
            let htmlProfil = ``;
            if (res?.attachment == null) {
                htmlProfil+=`
                <img src="assets/img/blank.png" alt="image" />
                `;
            }else{
                htmlProfil+=`
                <img src="storage/${res?.attachment}" style="object-fit: cover !important;" alt="image" />
                `;
            }
            $('#foto_profil').html(htmlProfil);
        },
        error:function(xhr){
            handleErrorDetails(xhr);
        }
    });
}

let dzPosturl = `${urlApi}postingan`;
function dzUpload() {
    dropzone = new Dropzone("#postingan", {
        url: dzPosturl,
        maxFiles: 1,
        dictCancelUpload: "Cancel",
        parallelUploads: 1,
        uploadMultiple: false,
        addRemoveLinks: true,
        acceptedFiles: ".jpg,.jpeg,.png",
        autoProcessQueue: false,
        paramName: "attachment",
        maxfilesexceeded: function(file) {
            this.removeAllFiles();
            this.addFile(file);
        },
        init: function () {
            this.on("error", function (file, response) {
                loadStop();
                Swal.fire("Oppss..", response.status.message, "error");
            });
            this.on("resetFiles", function (file) {
                loadStop();
                this.removeAllFiles();
            });
        },
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            Authorization: "Bearer " + localStorage.getItem("token"),
        },
    });
}

function upload() {
    var dropzoneUpload=Dropzone.forElement('#postingan');
    dropzoneUpload.on("sending", function (file, xhr, formData) {
        loadStart();
        formData.append("caption", $('#form-unggah #caption').val());
    });
    dropzoneUpload.processQueue();
    dropzoneUpload.on("success", function (file, res, formData) {
        loadStop();
        Swal.fire({
            title: "Berhasil!",
            text: res.status.message,
            icon: "success",
        }).then((result) => {
            window.location.href = `${baseUrl}dashboard/${idUser}`;
        });
        this.removeAllFiles();
    });
    dropzoneUpload.on("error", function (file, res, formData) {
        loadStop();
        Swal.fire({
            title: "Oppss..",
            text: res.status.message+" Gambar Postingan failed to upload.",
            icon: "error",
        });
        this.removeAllFiles();
    });
}