$(document).ready(function() {
    $('.filter_teacherId').select2();
});
$('.datepicker-1').datepicker();
$('.datepicker-2').datepicker();

const profileBtn = document.querySelector(".js-profileBtn");

if (profileBtn) {
    var status = "table";
    const renderBtn = () => {
        profileBtn.innerText = status === "table" ? "Chỉnh sửa thông tin" : "Hủy" 
        if (status == "table") {
            profileBtn.classList.replace("btn-danger", "btn-base");
        } else {
            profileBtn.classList.replace("btn-base", "btn-danger");
        }
    };

    const renderProfile = () => {
        var profileList = document.querySelectorAll(".profileActive");
        var indexActive = null;

        profileList.forEach((element, index) => {
            if (element.classList.contains("active")) {
                indexActive = index;
            }
        });

        profileList[indexActive].classList.remove("active");
    
        if (indexActive === 0) {
            profileList[1].classList.add("active");
        } else {
            profileList[0].classList.add("active");
        };
    };

    $(".js-profileBtn").click(function (e) {
        status = status === "table" ? "form" : "table";
        console.log(status);
        renderBtn();
        renderProfile();
        e.preventDefault();
    });
}



// XU LY UPDATE ACCOUNT
function updateAccount(formData , token) {
    const btnSubmit = document.querySelector('.btn-submit-prf')
    const defaultText = btnSubmit.innerText
    btnSubmit.innerText = 'Đang xử lý...'

    $.ajax({
        url: accountUpdateUrl,
        method: 'POST',
        data: formData,
        headers:{
             'X-CSRF-TOKEN': token
        },
        success: function(data){
        btnSubmit.innerText= defaultText
        const elStyle = document.querySelector('.messages')
        document.querySelector('.message-text').innerText = 'Cập nhật thành công'
        elStyle.style.display = 'block'
        },
        error: function(errors){
            btnSubmit.innerText= defaultText
            showErrors(errors.responseJSON)
        }
     });
  }

function showErrors(errors){
    const errorList = document.querySelectorAll('.error')
    errorList.forEach((error)=>{
        error.innerText= '';
    });
    Object.keys(errors['errors']).forEach((key) => {
       const errorEl = document.querySelector(`.error-${key}`)
       errorEl.innerText= errors['errors'][key][0]
    });
}

const form = document.querySelector('form.form-account')
if(form){   
    $('.form-account').submit(function (e) { 
        e.preventDefault();
        const formData = Object.fromEntries(new FormData(form))
        const csrf = document.head.querySelector(`[name="csrf-token"]`).content;
        updateAccount(formData, csrf);
    });
}

