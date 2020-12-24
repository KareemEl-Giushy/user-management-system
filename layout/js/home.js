$(document).ready(function () {
    // Make the table features
    $('#datatable').DataTable();

    // add new note request
    /*
        #add-note-form
        input name=title
        textarea name=note
        button[type=submit]
    */
   // Form Validation
   function formValidationText(selector) {
        if(!selector.value == "" || !selector.value == null) {
            // valid
            // selector.value = selector.value.trim();
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
   
   // Validaing
    $("#add-note-form input[name='title']").on('keyup', function () {
       formValidationText(this);
       console.log("writing");
   });

    // make the Ajax Request
    $("#add-note-form button").click(function (){

            console.log("Done");
            $.ajax({
                method: 'POST',
                url: '',
                async: true,
                data: {
                    'title': $("#add-note-form input[name='title']").val(),
                    'note':$("#add-note-form textarea"),
                    'action': 'add_note'
                },
                success: function (rs,rt,xhr) {
                    conosole.log(rs);
                    conosole.log(rt);
                    conosole.log(xhr);
                },
                error: function (rs,rt,xhr) {
                    conosole.log(rs);
                    conosole.log(rt);
                    conosole.log(xhr);
                }
            });

    });
});