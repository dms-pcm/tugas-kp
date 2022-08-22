jQuery(document).ready(function ($) {
    loadStop();
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

function login() {
    loadStart();
    $.ajax({
        url:`${urlApi}login`,
        type:'POST',
        data:{
            username: $('#xa-username').val(), 
            password: $('#xa-password').val()
        },
        success:function(response){
            // console.log(response);
            loadStop();
            let res = response?.data;
            window.location = `${baseUrl}dashboard/${res?.user?.id}`;
            localStorage.setItem("token", res?.token?.access_token);
            localStorage.setItem("userID", res?.user?.id);
            localStorage.setItem("userName", res?.user?.username);
            localStorage.setItem("NameUser", res?.user?.name);
        },
        error:function(xhr){
            loadStop();
            handleErrorLogin(xhr);
        }
    });
}

function logout() {
    $.ajax({
        url:`${urlApi}logout`,
        type:'POST',
        beforeSend: function (xhr) {
            xhr.setRequestHeader("Authorization","Bearer " + localStorage.getItem("token"));
        },
        success:function(response){
            localStorage.clear();
            localStorage.setItem("token", "");
            localStorage.setItem("userID", "");
            localStorage.setItem("userName", "");
            localStorage.setItem("NameUser", "");
            window.location = baseUrl;
        },
        error:function(msg, status, error){
            localStorage.clear();
            let code= msg.responseJSON.status.code
            if(code==401){
                window.location.href=baseUrl;
            }
        }
    });
}