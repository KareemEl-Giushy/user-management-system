$(document).ready(function () {

    // Dispaly all notes from the database
    function displayallnotes() {
        $.ajax({
            method: "POST",
            url: "core/objects/home.object.php",
            async: true,
            data: "action=get_notes",
            success: function (rt, rs, xhr) {
                // console.log(rt);
                // console.log(rs);
                // console.log(xhr);
                if(rt != ""){
                    $("#datatable tbody").html(rt);
                    // Make the table features
                    $('#datatable').DataTable();
                }
            },
            error: function (xhr, rs, rt) {
                // console.log(rt);
                // console.log(rs);
                // console.log(xhr);
            }
        });
    }
    // Desplay Existing Notes
    displayallnotes();

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
    $("#add-note-form button").click(function (e){
            e.preventDefault();
            var text = this.innerHTML;
            if(formValidationText(document.getElementsByName("title")[0])) {
                $("#add-note-form button").empty().append('<i class="fas fa-spinner fa-spin"></i>' + " Please Wait ...");
                console.log("Done");
                $.ajax({
                    method: 'POST',
                    url: 'core/objects/home.object.php',
                    async: true,
                    data: {
                        'title': $("#add-note-form input[type='text']").val(),
                        'note': $("#add-note-form textarea").val(),
                        'action': 'add_note'
                    },
                    success: function (rt,rs,xhr) {
                        console.log(rt);
                        console.log(rs);
                        console.log(xhr);
                        $("#add-note-form button").empty().html(text);
                        if(rt != "") {
                            $("#addnote .modal-footer").append("<div class='alert alert-danger alert-dismissable w-100'><i class='fas fa-exclamation-triangle'></i><strong> " + rt + "</strong><button data-dismiss='alert' class='close'>&times;</button</div>");
                        }else {
                            $("#add-note-form")[0].reset()
                            $("#addnote").modal("hide");
                            Swal.fire({
                                icon: "success",
                                title: "Note Added Successfuly !"
                            });
                            
                            displayallnotes();
                        }
                    },
                    error: function (xhr,rs,rt) {
                        console.log(xhr);
                        console.log(rs);
                        console.log(rt);
                    }
                });
            }
    });

});