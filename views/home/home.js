function init(){
   
}

$(document).ready(function(){
    var usu_id = $('#user_idx').val();

    if ( $('#rol_idx').val() == 1){
        $.post("../../controllers/usuario.php?op=total", {usu_id:usu_id}, function (data) {
            data = JSON.parse(data);
            $('#lbltotal').html(data.TOTAL);
        }); 
    
        $.post("../../controllers/usuario.php?op=totalabierto", {usu_id:usu_id}, function (data) {
            data = JSON.parse(data);
            $('#lbltotalabierto').html(data.TOTAL);
        });
    
        $.post("../../controllers/usuario.php?op=totalcerrado", {usu_id:usu_id}, function (data) {
            data = JSON.parse(data);
            $('#lbltotalcerrado').html(data.TOTAL);
        });

        $.post("../../controllers/usuario.php?op=grafico", {usu_id:usu_id},function (data) {
            data = JSON.parse(data);
    
            new Morris.Bar({
                element: 'divgrafico',
                data: data,
                xkey: 'nom',
                ykeys: ['total'],
                labels: ['Value'],
                barColors: ["#1AB244"], 
            });
        }); 

    }else{
        $.post("../../controllers/ticket.php?op=total",function (data) {
            data = JSON.parse(data);
            $('#lbltotal').html(data.TOTAL);
        }); 
    
        $.post("../../controllers/ticket.php?op=totalabierto",function (data) {
            data = JSON.parse(data);
            $('#lbltotalabierto').html(data.TOTAL);
        });
    
        $.post("../../controllers/ticket.php?op=totalcerrado", function (data) {
            data = JSON.parse(data);
            $('#lbltotalcerrado').html(data.TOTAL);
        });  

        $.post("../../controllers/ticket.php?op=grafico",function (data) {
            data = JSON.parse(data);
    
            new Morris.Bar({
                element: 'divgrafico',
                data: data,
                xkey: 'nom',
                ykeys: ['total'],
                labels: ['Value']
            });
        }); 

    }
});

init();