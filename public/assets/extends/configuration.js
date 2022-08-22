var handleErrorLogin = function(response) {
	let res = response.responseJSON
	let code = response.status

	if(code == 422) {
        Swal.fire(
            "Oopss...",
            res.status.message +
            `</div>`,
            "error"
        );
	} else if(code == 401){
        localStorage.clear();
        localStorage.setItem("token", "");
        localStorage.setItem("userID", "");
        localStorage.setItem("userName", "");
        localStorage.setItem("NameUser", "");
        Swal.fire(
            "Oopss...",
            res.status.message +
            `</div>`,
            "error"
        ).then((result) => {
            window.location = baseUrl;
        });
    }
}

var handleErrorDetails = function(response) {
	let res = response.responseJSON
	let code = response.status

	if(code == 400) {
        Swal.fire({
            title: "Oopss...",
            icon: "warning",
            text: "Silahkan isi data diri terlebih dahulu",
            showCancelButton: false,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Siap",
        })
    }
}

var handleErrorSimpan = function(response) {
	let res = response.responseJSON
	let code = response.status

	if(code == 422) {
        let resOther = "";
        if(res.data.errors!==undefined){
            const entries = Object.entries(res.data.errors);

            for (const [name, errMsg] of entries) {
            resOther += `<br>. ${errMsg}`;
            }
        }else{
            const entries = Object.entries(res.data);

            for (const [name, errMsg] of entries) {
            resOther += `<br>. ${errMsg}`;
            }
        }
        Swal.fire(
            "Oopss...",
            res.status.message +
            `<div class="text-left text-muted p-2">` +
            resOther +
            `</div>`,
            "error"
        );
	} else{
        handleErrorLogin(response)
    }
}