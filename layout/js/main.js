$(document).ready(function () {
    var forms  = document.querySelectorAll("div.wrapper");
    console.log();
    /* Forms Buttons */
    $("#register-btn").on('click', function () {
        // console.log($("div.row.wrapper")[0]);
        $("div.row.wrapper")[0].style.display = "none";
        $("div.row.wrapper")[1].style.display = "flex";
        $("div.row.wrapper")[2].style.display = "none";
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
        $("div.row.wrapper")[0].style.display = "none";
        $("div.row.wrapper")[1].style.display = "none";
        $("div.row.wrapper")[2].style.display = "flex";
    });

    
    /* ====== Register Form ====== */
    /*  form = $('#register-form'),
        firstName = $('#register-form #first-name'),
        lastName = $('#register-form #last-name'),
        email = $('#register-form #remail'),
        password = $('#register-form #rpassword'),
        password = $('#register-form #re-password');*/
    
     // Form Validation
     var $errors = 0;
    $('#register-form #first-name, #register-form #last-name, #register-form #remail').keyup(function () {
          if(!this.value == "" || !this.value == null) {
             // valid
             this.value = this.value.trim();

            if(this.checkValidity()) {
                //valid
                console.log(this.value);
                this.classList.add('is-valid');
                this.classList.remove('is-invalid');
            }else {
                // bad input
                this.classList.add('is-invalid');
                this.classList.remove('is-valid');
                $errors++;
            }
         }else {
            // bad input
            this.classList.add('is-invalid');
            this.classList.remove('is-valid');
            $errors++;
         }
     });
    $('#register-form #rpassword').keyup(function () {
         if(!this.value == "" || !this.value == null) {
            //valid
            if(this.value.length >= 7){
                // valid
                if(this.checkValidity()) {
                    //valid
                    this.classList.add('is-valid');
                    this.classList.remove('is-invalid');
                }else {
                    // bad input
                    this.classList.add('is-invalid');
                    this.classList.remove('is-valid');
                    $errors++;
                }
            }else {
                // bad input
                this.classList.add('is-invalid');
                this.classList.remove('is-valid');
                $errors++;
             }
        }else {
            // bad input
            this.classList.add('is-invalid');
            this.classList.remove('is-valid');
            $errors++;
         }
     });
    $('#register-form #re-password').keyup(function () {
        if(this.value == $('#register-form #rpassword').val()){
            // valid
            this.classList.add('is-valid');
            this.classList.remove('is-invalid');
        }else {
            // bad input
            this.classList.add('is-invalid');
            this.classList.remove('is-valid');
            $errors++;
        }
     });
    $('#register-form input[type="submit"]').click(function (e) {
        // e.preventDefault();
        console.log('clicked');
    });
});