
function init(){
    $("#ticket_form").on("submit",function(e){
        guardaryeditar(e);
    });
}

$(document).ready(function() {
    $('#tick_descrip').summernote({
        height: 150,
        lang: "es-ES",
        callbacks: {
            onImageUpload: function(image) {
                console.log("Image detect...");
                myimagetreat(image[0]);
            },
            onPaste: function (e) {
                console.log("Text detect...");
            }
        },
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']]
        ]
    });

    //SELECT DE LA CATEGORIA
    /*$.post("../../controllers/categoria.php?op=combo",function(data, status){
        $('#cat_id').html(data);
    });*/

    //SELECT DE LOS TITULOS DEL REQUERIMIENTO
    $.post("../../controllers/requerimiento.php?op=combo",function(data, status){
        $('#req_id').html(data);
        //console.log(data);
    });

    //SELECT ANIDADO
    $("#req_id").change(function(){
        req_id = $(this).val();
        $('#opci_id').html("");
        $.post("../../controllers/categoria.php?op=combo",{req_id : req_id},function(data, status){
            //console.log(data); --> Imprimir en consola
            $('#cat_id').html(data);
        });
    });

    //SELECT ANIDADO PARA LA OPCION
    $("#cat_id").change(function(){
        cat_id = $(this).val();

        $.post("../../controllers/subcategoria.php?op=combo",{cat_id : cat_id},function(data, status){
            //console.log(data); --> Imprimir en consola
            $('#opci_id').html(data);
        });
    });

    //SELECT DE LA PRIORIDAD
    /*$.post("../../controllers/prioridad.php?op=combo",function(data, status){
        $('#prio_id').html(data);
    });*/

});

function guardaryeditar(e){
    e.preventDefault();
    var formData = new FormData($("#ticket_form")[0]);
    if ($('#tick_descrip').summernote('isEmpty') || $('#tick_titulo').val()=='' || $('#req_id').val() == 0 || $('#cat_id').val() == 0){
        swal("Advertencia!", "Campos Vacios", "warning");
    }else{
        var totalfiles = $('#fileElem').val().length;
        for (var i = 0; i < totalfiles; i++) {
            formData.append("files[]", $('#fileElem')[0].files[i]);
        }

        $.ajax({
            url: "../../controllers/ticket.php?op=insert",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data){
                //console.log(data); //imprime el html
                data = JSON.parse(data); //aqui viene el error porque no esta en formato JSON
                //console.log(data[0].tick_id); //si todo funciona registra el ticket

                $.post("../../controllers/email.php?op=ticket_abierto", {tick_id : data[0].tick_id}, function (data) {

                });

                /*$.post("../../controllers/whatsapp.php?op=w_ticket_abierto", {tick_id : data[0].tick_id}, function (data) {

                });*/

                $('#tick_titulo').val('');
                $('#tick_descrip').summernote('reset');
                swal("Ticket Registrado", 
                    "Su ticket va a pasar a cola y esperar a que sistema asigne a un soporte", 
                    "success"
                );
            }
        });
    }
}

init();