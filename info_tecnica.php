<?php
session_start();
require_once ("sistema/config/db.php");
require_once ("sistema/config/conexion.php");

$sql_familia=mysqli_query($con, "SELECT f.cod_familia, f.name FROM familia f INNER JOIN familia_sub fs ON (f.cod_familia=fs.cod_familia) INNER JOIN categories c ON (fs.cod_sub_familia=c.cod_sub_familia) WHERE f.status='1' GROUP BY f.cod_familia, f.name");
?>
<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Refermat::Información Técnica</title>
<link rel="icon" href="img/index/favicon.png" sizes="16x16">
<!--css-->
<link href="css/style-1.css" rel="stylesheet" type="text/css">
<!--BOOTSTRAP-->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<!--fonts-->
<link href="https://fonts.googleapis.com/css?family=Karla:400,700" rel="stylesheet">
<link href="fonts/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="fonts/font/flaticon.css" rel="stylesheet" type="text/css">
<!--slider-->
<link href="css/owl.carousel.min.css" rel="stylesheet">
<link href="css/theme.css" rel="stylesheet">
<!--testimonial-slider-->
<link href="css/testimonial.css" rel="stylesheet">
<!--Revolution-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.js"></script>
<script src="js/peticion.js"></script>
<script src="js/clave.js"></script>
<link rel="stylesheet" type="text/css" href="revolution/css/settings.css">
<script src="revolution/js/jquery.themepunch.tools.min.js"></script>
<script src="revolution/js/jquery.themepunch.revolution.min.js"></script>

</head>

<!-- Redes Sociales-->
<?php include 'redes_sociales.php' ?>

<body>

<a href="javascript:" id="return-to-top"><i class="fa fa-angle-up"></i></a>

<!--Top-bar-->
<div id="top" class="container-fluid top-bar border">
    <div class="container">
        <div class="col-md-4 top-bar-left">
        <p><i class="flaticon-phone-call"></i>&nbsp;Contáctanos al: <b>981 278 969 - 01 541 8979</b></p>
        </div>

        <div class="col-md-8 text-right">

            <div class="bor log">
                <?php
                    if(isset($_SESSION['user_name'])){ 
                ?>
                    <a href="#">
                        Usuario: <b><?php echo $_SESSION['user_name'] ?></b>
                        <a href="cerrar_sesion.php?url=index.php"><i class="fa fa-power-off"></i></a>
                    </a>
                <?php }else if (!isset($_SESSION['user_name'])){  ?>
                    <a href="login.php"><b>Inicia Sesión</b></a>
                <?php } ?>
            </div>

            <div class="cart-item detalle-producto">
                <?php if(isset($_SESSION['detalle'])){ ?>
                <div class="bor cart-det">
                    <i class="flaticon-shopping-bag"></i>&nbsp; <h2>Mi carrito</h2>
                </div> 

                <div class="cart-item-hover">                    
                    <?php
                        $total=0;
                        foreach($_SESSION['detalle'] as $k => $detalle) {
                            $img="sistema/".$detalle['imagen'];
                    ?>

                    <div class="cart-item-list text-left">
                        <img src="<?php echo $img; ?>" alt="" width="45%" />
                        <a href="#"><h3><?php echo $detalle['producto'];?></h3></a>
                        <a href="#"><h3>Cantidad: <?php echo $detalle['cantidad'];?></h3></a>
                        <b><button type="button" class="btn btn-xs btn-primary eliminar-producto" id="<?php echo $detalle['id'];?>">X</button></b>
                        <?php if(isset($_SESSION['user_name'])){ ?>
                        <p>Precio: S/. <?php echo $detalle['precio'];?></p>
                        <?php $total+=$detalle['precio']*$detalle['cantidad']; } ?>
                    </div>

                    <div style="padding-top: 30px"></div>
                    <?php } ?>
                    <div class="border"></div>

                    <div class="cart-total">
                        <?php if(isset($_SESSION['user_name'])){ ?>
                        <h6>Precio total:  </h6> <p><?php echo "S/. ".$total;?></p><div class="clearfix"></div>
                        <?php } ?>
                        <a href="check-out.php" class="cart-checkout">Verificar</a>
                    </div>
                </div>
                <?php } ?>
            </div>

        </div>
    </div>    
</div>

<!--Navbar-->
<nav class="navbar navbar-default">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><img src="img/index/logo.png" alt="" class="img-responsive" /></a>
        </div> 
      
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        
            <ul class="nav navbar-nav navbar-right" style="padding-top: 10px;">
                <li><a href="index.php">Inicio</a></li>
                <li><a href="nosotros.php">Nosotros</a></li>
                <li><a href="productos.php">Productos</a></li>
                <li><a href="info_tecnica.php">Información Técnica</a></li>
                <li><a href="#contacto">Contacto</a></li>        
            </ul>
      
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav> 	

<!--Search-bar-->
<div class="container-fluid search-bar">
    <div class="container">

        <div class="col-md-9"></div>
        
        <div class="col-md-3 soc text-right" style="padding-bottom: 10px;">
        	<ul>
            	<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
            </ul>
        </div>
    </div>
</div>

<!--Header
<div class="container-fluid checkout-info"></div>-->
    <!--Header-->
    <div class="container-fluid">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                <li data-target="#carousel-example-generic" data-slide-to="3"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img class="full" src="img/index/1.jpg" alt="...">
                </div>
                <div class="item">
                    <img class="full" src="img/index/2.jpg" alt="...">
                </div>
                <div class="item">
                    <img class="full" src="img/index/3.jpg" alt="...">
                </div>
                <div class="item">
                    <img class="full" src="img/index/4.jpg" alt="...">
                </div>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

<div style="margin-top: 60px"></div>

<!--Latest-product-->
<div class="container latest-product padd-80">
	<div class="col-md-12 sec-head text-center">
        <h3 style="font-size: 26px">Información Técnica</h3>
        <span></span><br>
    </div>

    <h3 style="font-weight: bold; font-style: italic;">CATALOGOS</h3>

    <ul>
    <!-- si se quiere mostrar pdf en un modal- no se activa para que en el tlf abra en una nueva pestaña
        <button type="button" data-toggle="modal" data-target="#ModalVideo " onclick="llenaPDF('info/Cerraduras082019.pdf')" 
                        style="border: none;background-color:transparent" ><i class="fa fa-search"></i></button>
    -->
        <li><p style="color: #1F487E; font-weight: bold; font-style: italic;">Catálogo de Cerraduras <a href="info/Cerraduras082019.pdf" target="_BLANK"><i class="fa fa-search"></i></a></p></li>
        <li><p style="color: #1F487E; font-weight: bold; font-style: italic;">Catálogo de Griferías <a href="info/griferiasV2.pdf" target="_BLANK"><i class="fa fa-search"></i></a></p></li>
        <li><p style="color: #1F487E; font-weight: bold; font-style: italic;">Catálogo de Lavaderos <a href="info/LavaderosV1.pdf" target="_BLANK"><i class="fa fa-search"></i></a></p></li>
        <li><p style="color: #1F487E; font-weight: bold; font-style: italic;">Catálogo de Herramientas <a href="info/HERRAMIENTAS2020.pdf" target="_BLANK"><i class="fa fa-search"></i></a></p></li>
    </ul>

    <hr>

    <h3 style="font-weight: bold; font-style: italic;">VIDEOS</h3>

    <ul>
        <li><p style="color: #1F487E; font-weight: bold; font-style: italic;">Instalación de Grifería Luna, Cascade, Slim de 8” 
                    <button type="button" data-toggle="modal" data-target="#ModalVideo" onclick="llenaVideo('Nw1HGqzHM8Q')" ><i class="fa fa-youtube"></i></button>
        <li><p style="color: #1F487E; font-weight: bold; font-style: italic;">Instalación Monomando Rio 
                    <button type="button" data-toggle="modal" data-target="#ModalVideo" onclick="llenaVideo('gJ6ijHLa_xs')" ><i class="fa fa-youtube"></i></button>
        <li><p style="color: #1F487E; font-weight: bold; font-style: italic;">Instalación Collage Joystick
                    <button type="button" data-toggle="modal" data-target="#ModalVideo" onclick="llenaVideo('8kDrrplVw5Y')" ><i class="fa fa-youtube"></i></button>
        <li><p style="color: #1F487E; font-weight: bold; font-style: italic;">Instalación Accesorios para Baños
                    <button type="button" data-toggle="modal" data-target="#ModalVideo" onclick="llenaVideo('3Yq12ZiWJPk')" ><i class="fa fa-youtube"></i></button>
    </ul>

     <hr>

    <h3 style="font-weight: bold; font-style: italic;">MAS INFORMACION TECNICA</h3>

    <ul>
        <li><p style="color: #1F487E; font-weight: bold; font-style: italic;">Flotante sin Bolla de Media pulgada <a href="info/otros/Flotante sin Bolla de Media pulgada 31010-0001_07FT07B.pdf" target="_BLANK"><i class="fa fa-search"></i></a></p></li>
        <li><p style="color: #1F487E; font-weight: bold; font-style: italic;">Flotante sin Bolla de Una pulgada <a href="info/otros/Flotante sin Bolla de Una pulgada 31010-0003_07FT10B.pdf" target="_BLANK"><i class="fa fa-search"></i></a></p></li>
        <li><p style="color: #1F487E; font-weight: bold; font-style: italic;">Valvula Check de Media pulgada <a href="info/otros/Valvula Check de Media pulgada 31060-0010_01K105.pdf" target="_BLANK"><i class="fa fa-search"></i></a></p></li>
        <li><p style="color: #1F487E; font-weight: bold; font-style: italic;">Valvula Check de Tres cuartos de pulgada <a href="info/otros/Valvula Check de Tres cuartos de pulgada 31060-0011_01K107.pdf" target="_BLANK"><i class="fa fa-search"></i></a></p></li>
        <li><p style="color: #1F487E; font-weight: bold; font-style: italic;">Valvula Check de Una pulgada <a href="info/otros/Valvula Check de Una pulgada 31060-0012_01K110.pdf" target="_BLANK"><i class="fa fa-search"></i></a></p></li>
        <li><p style="color: #1F487E; font-weight: bold; font-style: italic;">Valvula de Bola de Cuatro pulgadas <a href="info/otros/Valvula de Bola de Cuatro pulgadas 31060-0008_01B340.pdf" target="_BLANK"><i class="fa fa-search"></i></a></p></li>
        <li><p style="color: #1F487E; font-weight: bold; font-style: italic;">Valvula de Bola de Dos pulgada y media <a href="info/otros/Valvula de Bola de Dos pulgada y media 31060-0006_01B325.pdf" target="_BLANK"><i class="fa fa-search"></i></a></p></li>
        <li><p style="color: #1F487E; font-weight: bold; font-style: italic;">Valvula de Bola de Dos pulgadas <a href="info/otros/Valvula de Bola de Dos pulgadas 31060-0005_01B320.pdf" target="_BLANK"><i class="fa fa-search"></i></a></p></li>
        <li><p style="color: #1F487E; font-weight: bold; font-style: italic;">Valvula de Bola de Media pulgada <a href="info/otros/Valvula de Bola de Media pulgada 31060-0001_01B705.pdf" target="_BLANK"><i class="fa fa-search"></i></a></p></li>
        <li><p style="color: #1F487E; font-weight: bold; font-style: italic;">Valvula de Bola de Media pulgada para Gas <a href="info/otros/Valvula de Bola de Media pulgada para Gas 31060-0009_01B405.pdf" target="_BLANK"><i class="fa fa-search"></i></a></p></li>
        <li><p style="color: #1F487E; font-weight: bold; font-style: italic;">Valvula de Bola de Tres cuartos de pulgada <a href="info/otros/Valvula de Bola de Tres cuartos de pulgada 31060-0002_01B707.pdf" target="_BLANK"><i class="fa fa-search"></i></a></p></li>
        <li><p style="color: #1F487E; font-weight: bold; font-style: italic;">Valvula de Bola de Tres pulgadas <a href="info/otros/Valvula de Bola de Tres pulgadas 31060-0007_01B330.pdf" target="_BLANK"><i class="fa fa-search"></i></a></p></li>
        <li><p style="color: #1F487E; font-weight: bold; font-style: italic;">Valvula de Bola de Una pulgada <a href="info/otros/Valvula de Bola de Una pulgada 31060-0003_01B710.pdf" target="_BLANK"><i class="fa fa-search"></i></a></p></li>
        <li><p style="color: #1F487E; font-weight: bold; font-style: italic;">Valvula de Bola de Una pulgada y media <a href="info/otros/Valvula de Bola de Una pulgada y media 31060-0004_01B315.pdf" target="_BLANK"><i class="fa fa-search"></i></a></p></li>
    </ul>


    <div class="clearfix"></div>
</div>

<div class="modal fade bd-example-modal-lg" id="ModalVideo" tabindex="-1" role="dialog" aria-labelledby="ModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title col-sm-6" style="align-content: center;">Refermat</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                style="vertical-align: middle;" onclick="BorraVideo()">
                                <span aria-hidden="true">X</span>
                            </button>
                            <div class="row"> </div>
                        </div>
                        <div class="modal-body">
                            <div class="embed-responsive embed-responsive-16by9">
                                <div id="iframeVideos">  </div>
                                <div id="iframePDF">  </div>
                            </div>
                        </div>
                        <div class="modal-content">
                            <div>                            </div>
                        </div>
                    </div>

                </div>
            </div>


<div style="margin-top: 60px"></div>

<!--footer-->
<div class="container-fluid footer-sec" id="contacto">
    
    <div class="container">    
        <div class="col-sm-6 col-md-3 footer-about">
        	<a href="#"><img src="img/index/refermat_2.png" alt=""></a>
            <p>Obtenga los mejores precios visitandonos en nuestra web</p>
        </div>

        <div class="col-md-3 col-sm-6 contact-info use foot-a"></div>

        <div class="col-md-3 col-sm-6 contact-info use foot-a"></div>

        <div class="col-md-3 col-sm-6 contact-info contact-span">
    	    <h3>Información de contacto</h3>
            <div class="contact">
                <i class="flaticon-placeholder-1"></i>
                <p>Av. Maquinarias 1891, Cercado de Lima</p>
            </div>

            <div class="clearfix"></div>

            <div class="contact">
                <i class="flaticon-headphones"></i>
                <h2 class="phone-no"><b>981 278 969</b></h2>            
                <i class="flaticon-headphones"></i>
                <p class="phone-no">01 541 8979</p>
            </div>

            <div class="clearfix"></div>

            <div class="contact">
                <i class="flaticon-message"></i>
                <p>infoperu@refermat.com</p>
            </div>

            <div class="clearfix"></div>

            <div class="follow-us">
             	<h2>Redes Sociales</h2>
                <div class="follow">
                	<a href="https://www.facebook.com/RefermatPeru/" target="_blank"><i class="fa fa-facebook-f" aria-hidden="true"></i></a>
                    <a href="#" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    <a href="https://www.instagram.com/refermat.peru/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    <a href="https://www.youtube.com/channel/UCL1ELDEmobsXqojPNEvG97A" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </div>
    
    <!--newsletter-->
    <div class="container news-letter">
		<div class="letter-news">
			<div class="col-md-4 col-sm-6 letter">
				<i class="flaticon-newsletter"></i>
				<p>Suscríbete a nuestros</p>
				<h2>boletínes</h2>
			</div>
		</div>
    </div>
    
    <!--Copyright-->
    <div class="container copy-right">
		<div class="right-copy">
    	    <a href="#top" id="toper"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a>
        	<div class="col-md-12 col-sm-12 copy-text">
            	<p>© 2018 <a href="#">Refermat</a>. Todos los derechos reservados.</p>
            </div>
        </div>
    </div>
</div>

<!--js-->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<!--custom-->
<script src="js/custom.js"></script>
<!--count-down-->
<script src="js/countdown.js"></script>
<!-- JS Global-slider -->    
<script src="js/owl.carousel.min.js"></script> 
<script src="js/theme.js"></script>
<!--TESTIMONIAL-->  
<script>
setTimeout(function(){   
	$("#testimonial-slider").owlCarousel({
        items:1,
        itemsDesktop:[1000,1],
        itemsDesktopSmall:[979,1],
        itemsTablet:[768,1],
        pagination:true,
        navigation:false,
        navigationText:["",""],
        slideSpeed:1000,
        singleItem:true,
        autoPlay:true
    }); 
	}, 300);
</script>
<!--client-slider-->
<script src="js/jquery.flexisel.js"></script>

<!--Revolution-->	
<script language=JavaScript>
$(document).keydown(function (event) {
    if (event.keyCode == 123) { // Prevent F12
        return false;
    } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) { // Prevent Ctrl+Shift+I        
        return false;
    }
});

$(document).ready(function() {
    $('.modal').each(function() {
        $this = $(this);
        //al abrir play video
        $this.on('shown.bs.modal', function() {
            toggleVideo('playVideo', $(this));
        });
				//al cerrar modal pause video
        $this.on('hidden.bs.modal', function(){
           toggleVideo('pauseVideo', $(this));
        })
   });

    function toggleVideo(state, div) {
        var iframe = div.find("iframe")[0].contentWindow;
        iframe.postMessage('{"event":"command","func":"' + state + '","args":""}', '*');
    }
}); 

function llenaVideo(video) {
            var outputPDF = document.getElementById('iframePDF');
            var containerPDF = "";
            outputPDF.innerHTML = container;

            var output = document.getElementById('iframeVideos');
            var container = "<iframe width='560' height='315' src='https://www.youtube.com/embed/"+video+"' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>";
            output.innerHTML = container;
};
function llenaPDF(rutaPDF) {
            var outputPDF = document.getElementById('iframeVideos');
            var containerPDF = "";
            outputPDF.innerHTML = container;
            
            var output = document.getElementById('iframePDF');
            var container = "<embed src='info/Cerraduras082019.pdf#zoom=100' type='application/pdf' width='100%' height='600px' />";
            output.innerHTML = container;
};
function BorraVideo() {
            var output = document.getElementById('iframeVideos');
            var container = "";
            output.innerHTML = container;
            var outputPDF = document.getElementById('iframePDF');
            var containerPDF = "";
            outputPDF.innerHTML = container;
};


//$(document).on("contextmenu", function (e) {        
 //   e.preventDefault();
//});
</script>
<script src="js/contact_me.js"></script>
<script type="text/javascript" src="js/ajax.js"></script>
</body>

<!-- Mirrored from theme.innovatory.in/Loyal_shop/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 09 Nov 2018 17:49:35 GMT -->
</html>