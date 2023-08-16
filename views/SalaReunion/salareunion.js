var tabla;
function init() {
    $("#ticket_form").on("submit", function (e) {
        guardaryeditar(e);
    });
}

$(document).ready(function () {
    $('#tick_descrip').summernote({
        height: 150,
        lang: "es-ES",
        callbacks: {
            onImageUpload: function (image) {
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
    $.post("../../controllers/requerimiento.php?op=combo", function (data, status) {
        $('#req_id').html(data);
        //console.log(data);
    });

    //SELECT ANIDADO
    $("#req_id").change(function () {
        req_id = $(this).val();

        $.post("../../controllers/categoria.php?op=combo", { req_id: req_id }, function (data, status) {
            //console.log(data); --> Imprimir en consola
            $('#cat_id').html(data);
        });
    });

    //SELECT DE LA PRIORIDAD
    /*$.post("../../controllers/prioridad.php?op=combo",function(data, status){
        $('#prio_id').html(data);
    });*/
    tabla=$('#ticket_data').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        "searching": true,
        lengthChange: false,
        colReorder: true,
        buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
                ],
        "ajax":{
            url: '../../controllers/reuniones.php?op=listar',
            type : "post",
            data : {tick_id:"1"},
            dataType : "json",
            error: function(e){
                console.log(e.responseText);
            }
        },
        "bDestroy": true,
        "responsive": true,
        "bInfo":true,
        "iDisplayLength": 10,
        "autoWidth": false,
        "language": {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
    }).DataTable();
});

function guardaryeditar(e) {
    e.preventDefault();
    var formData = new FormData($("#reunion_form")[0]);
    if ($('#coment_reunion').summernote('isEmpty') || $('#obser_reunion').summernote('isEmpty') || $('#fecha_inicio').val() == '' || $('#fecha_final').val() == 0 || $('#cat_id').val() == 0) {
        swal("Advertencia!", "Campos Vacios", "warning");
    } else {
        var totalfiles = $('#fileElem').val().length;
        for (var i = 0; i < totalfiles; i++) {
            formData.append("files[]", $('#fileElem')[0].files[i]);
        }

        $.ajax({
            url: "../../controllers/reunion.php?op=insert",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
                //console.log(data); //imprime el html
                data = JSON.parse(data); //aqui viene el error porque no esta en formato JSON
                //console.log(data[0].tick_id); //si todo funciona registra el ticket

                $.post("../../controllers/email.php?op=ticket_abierto", { tick_id: data[0].tick_id }, function (data) {

                });

                /*$.post("../../controllers/whatsapp.php?op=w_ticket_abierto", {tick_id : data[0].tick_id}, function (data) {
  
                });*/

                $('#fecha_inicio').val('');
                $('#fecha_final').val('');
                $('#coment_reunion').summernote('reset');
                $('#obser_reunion').summernote('reset');
                swal("Ticket Registrado",
                    "Su ticket va a pasar a cola y esperar a que sistema asigne a un soporte",
                    "success"
                );
            }
        });
    }
}

init();