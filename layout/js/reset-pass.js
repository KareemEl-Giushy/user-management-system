$(document).ready(function () {

    // Form Validation
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
        if(selector.value == $('#password').val() && selector.value != ""){
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
    // validate
    $("#password").on('keyup', function () {
        formValidationPass(this);
    });

    $("#rpassword").on('keyup', function () {
        repassf(this);
    });

    // send request
    $('input[type="submit"]').click(function(e) {
        e.preventDefault();
        var p = formValidationPass(document.getElementById("password"));
        var r = formValidationPass(document.getElementById("rpassword"));
        if(p == true && r == true) {
            e.preventDefault();
            $.ajax({
                method: 'POST',
                url: 'd',
                async: true,
                data: '',
                success: function(rt, rs, xhr) {
                    console.log(rt);
                    console.log(rs);
                    console.log(xhr);
                },
                error: function(xhr, rs, rt) {
                    console.log(xhr);
                    console.log(rs);
                    console.log(rt);
                    
                }
            });    
        
        }
    });
});