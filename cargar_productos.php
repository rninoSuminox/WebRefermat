<!doctype html>
<html lang="es">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Refermat::Inicio</title>
<!--Revolution-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
</head>

<body>
    <form action="">
        <div class="detail-row quantity-box">
            <input type="text" id="cant">
            <input type="text" id="producto"> 
            <input type="text" id="precio"> 
            <button type="button" id="agregar" style="background-color: #1F487E; color: white; width: 120px; height: 50px; border-radius: 16px;">AGREGAR</button>
            <div class="clearfix"></div>
        </div>
    </form>

    <div id="respuesta"></div>
</body>

<script>
    $('#agregar').click(function(){
        
        var producto = document.getElementById('producto').value;
        var precio = document.getElementById('precio').value;
        var cantidad= document.getElementById('cant').value;

        var ruta="prod="+producto+"&pre="+precio+"&cant="+cantidad;

        $.ajax({
            url : 'header.php',
            type : 'POST',
            data : ruta,
        })

        .done(function(res){
            $("#respuesta").html(res);
        })
    });
</script>

</html>