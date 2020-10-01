$(document).ready(function () {
    var forms  = document.querySelectorAll("div.wrapper");
    console.log();
    /* Forms Buttons */
    $("#register-btn").on('click', function () {
        // console.log($("div.row.wrapper")[0]);
        forms[0].style.display = "none";
        forms[1].style.display = "flex";
        forms[2].style.display = "none";
    });
    $("#registerback, #resetback").click(function () {
        // console.log($("div.row.wrapper")[0]);
        // console.log('hello this is Back Button');
        forms[2].style.display = "none";
        forms[1].style.display = "none";
        forms[0].style.display = "flex";
    });
    $("#forget-pass").on('click', function () {
        // console.log($("div.row.wrapper")[0]);
        forms[0].style.display = "none";
        forms[1].style.display = "none";
        forms[2].style.display = "flex";
    });

    
    /* ====== Register Form ====== */
    /*  form = $('#register-form'),
        firstName = $('#register-form #first-name'),
        lastName = $('#register-form #last-name'),
        email = $('#register-form #remail'),
        password = $('#register-form #rpassword'),
        password = $('#register-form #re-password');*/
    
     // Form Validation
    function formValidationText(selector) {
            if(!selector.value == "" || !selector.value == null) {
                 // valid
                selector.value = selector.value.trim();
                if(selector.checkValidity()) {
                    //valid
                    // console.log(selector.value);
                    selector.classList.add('is-valid');
                    selector.classList.remove('is-invalid');
                    return true;
                }else {
                    selector.classList.add('is-invalid');
                    selector.classList.remove('is-valid');
                }
            
            }else {
                selector.classList.add('is-invalid');
                selector.classList.remove('is-valid');
            }

    }
    function formValidationPass(selector) {
        if(!selector.value == "" || !selector.value == null) {
            //valid
            if(selector.value.length >= 7){
                // valid
                if(selector.checkValidity()) {
                    //valid
                    selector.classList.add('is-valid');
                    selector.classList.remove('is-invalid');
                    return true;
                }else {
                    // bad input
                    selector.classList.add('is-invalid');
                    selector.classList.remove('is-valid');
                }
            }else {
                // bad input
                selector.classList.add('is-invalid');
                selector.classList.remove('is-valid');
            }
        }else {
            // bad input
            selector.classList.add('is-invalid');
            selector.classList.remove('is-valid');


         }
    }
    function repassf(selector) {
        if(selector.value == $('#rpassword').val()){
            // valid
            selector.classList.add('is-valid');
            selector.classList.remove('is-invalid');
            return true;
        }else {
            // bad input
            selector.classList.add('is-invalid');
            selector.classList.remove('is-valid');
            return false;
        }
    }

    $('#first-name, #last-name, #remail').keyup(function () {
        formValidationText(this);
    });
   
    $('#rpassword').keyup(function () {
        formValidationPass(this);
     });
    $('#re-password').keyup(function () {
        repassf(this);
     });

    $('#register-form input[type="submit"]').click(function (e) {
        e.preventDefault();
        var isfirst = formValidationText(document.getElementById('first-name'));
        var islast = formValidationText(document.getElementById('last-name'));
        var isemail = formValidationText(document.getElementById('remail'));
        var pass = formValidationPass(document.getElementById('rpassword'));
        var repass = repassf(document.getElementById('re-password'));
        if(isfirst == true && islast == true && isemail == true && pass == true && repass == true) {
            $("#f-msg").css('display', "none");
            console.log('clicked');
            $.ajax({
                method: 'POST',
                url: "core/objects/index.object.php",
                async: true,
                data: {
                    'first-name': $("#first-name").val(),
                    'last-name': $("#last-name").val(),
                    'email': $("#remail").val(),
                    'password': $("#rpassword").val(),
                    're-password': $("#re-password").val(),
                    "action": "register",
                },
                success: function (rt, rs, xhr) {
                   console.log(rt);
                },
                error: function(xhr, rs, rt){
                    console.log(rs);
                },
            });
        }else {
         
            $("#f-msg").css('display', "block");
        }
    });


    // End Document Ready
});