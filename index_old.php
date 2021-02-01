<?php
session_start();
require_once ("sistema/config_pw/db.php");
require_once ("sistema/config_pw/conexion.php");
if(!$_GET){
    header("Location: index.php?pagina=1");
}
?>
<!doctype html>
<html lang="es">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Refermat::Inicio</title>
<link rel="icon" href="img/index/favicon.png" sizes="16x16">
<!--css-->
<link href="css/style-1.css" rel="stylesheet" type="text/css">
<link href="css/style-carga.css" rel="stylesheet" type="text/css">
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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="js/peticion.js"></script>
<link rel="stylesheet" type="text/css" href="revolution/css/settings.css">
<script src="revolution/js/jquery.themepunch.tools.min.js"></script>
<script src="revolution/js/jquery.themepunch.revolution.min.js"></script>

<link rel="stylesheet" href="Toast/toastr.min.css">

</head>

<!-- Redes Sociales-->
<?php include 'redes_sociales.php' ?>

<body>

<script src="js/jquery.js"></script>
<script src="Toast/toastr.min.js"></script>
<script src="js/bootstrap.min.js"></script>


<div class="preloader-wrapper">
    <div class="preloader">
        <img src="img/index/preloader.gif" alt="">
    </div>
</div>

<a href="javascript:" id="return-to-top"><i class="fa fa-angle-up"></i></a>

<!--Top-bar-->
<div id="top" class="container-fluid top-bar border">
    <div class="container">
        <div class="col-md-4 top-bar-left">
            <p><i class="flaticon-phone-call"></i>&nbsp;Contáctanos llamando al: <b>01 541 8979</b></p>
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
                <?php if(isset($_SESSION['detalle']) && count($_SESSION['detalle'])>0){ ?>
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
                        
                        <p>Precio: S/. <?php echo $detalle['precio'];?></p>
                        <?php $total+=$detalle['precio']*$detalle['cantidad']; ?>
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

        <div class="col-md-3 col-xs-8 categories">
        	<ul>
           		<li class="sub-menu">
                    <a class="main-a" href="javascript:void(0)">TODAS LAS CATEGORIAS<i class='fa fa-angle-down'></i></a>
                	<ul>
                        <?php
                        $sql_familia=mysqli_query($con, "SELECT f.cod_familia, f.name FROM familia f INNER JOIN familia_sub fs ON (f.cod_familia=fs.cod_familia) INNER JOIN categories c ON (fs.cod_sub_familia=c.cod_sub_familia) WHERE f.status='1' GROUP BY f.cod_familia, f.name");
                        while($row_fam=mysqli_fetch_array($sql_familia)){
                            $cod_familia=$row_fam["cod_familia"];
                            $sql_sub_familia=mysqli_query($con, "SELECT fs.cod_sub_familia, fs.name FROM familia f INNER JOIN familia_sub fs ON (f.cod_familia=fs.cod_familia) INNER JOIN categories c ON (fs.cod_sub_familia=c.cod_sub_familia) WHERE fs.status='1'  AND fs.cod_familia=$cod_familia GROUP BY fs.cod_sub_familia, fs.name");
                        ?>
                    	<li>
                            <a href="index.php?pagina=1&fam=<?php echo $row_fam["name"]; ?>">
                                </i><?php echo $row_fam["name"]; ?>
                            </a>
                        	<div class="categories-mega-menu">
    							<div class="categories-main-menu">
                                    <?php
                                    while($row_sub_fam=mysqli_fetch_array($sql_sub_familia)){
                                        $cod_sub_familia=$row_sub_fam["cod_sub_familia"];
                                        $sql_categ=mysqli_query($con, "SELECT c.id, c.name FROM familia f INNER JOIN familia_sub fs ON (f.cod_familia=fs.cod_familia) INNER JOIN categories c ON (fs.cod_sub_familia=c.cod_sub_familia) WHERE c.status='1'  AND c.cod_sub_familia=$cod_sub_familia GROUP BY c.id, c.name");
                                    ?>
    								<span>
    									<a href="index.php?pagina=1&sub_fam=<?php echo $row_sub_fam["name"]; ?>" class="title"><?php echo $row_sub_fam["name"]; ?></a>
                                        <?php while($row_categ=mysqli_fetch_array($sql_categ)){ ?>
                                            <a href="index.php?pagina=1&categ=<?php echo $row_categ["name"]; ?>"><?php echo $row_categ["name"]; ?></a>
                                        <?php } ?>
    								</span>
                                    <?php } ?>
    							</div>
    						</div>
                        </li>
                        <?php } ?>
                    </ul>
                </li>
           </ul>
        </div>

        <div class="col-md-6 col-xs-12 search">
            <form action="index.php?pagina=1" method="post">
            	<input type="text" name="search" placeholder="Busqueda" />
                <div class="round search-round">
                    <button type='submit' class="btn btn-primary" value="Buscar"><span class="fa fa-search" /></button>
                </div>
            </form>
        </div>
        
        <div class="col-md-3 col-xs-12 soc text-right">
        	<ul>
            	<li><a href="https://www.facebook.com/RefermatPeru/" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="#" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="https://www.instagram.com/refermat.peru/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                <li><a href="https://www.youtube.com/channel/UCL1ELDEmobsXqojPNEvG97A" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
            </ul>
        </div>
        
    </div>
</div>

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
              <img src="img/index/1.jpg" alt="...">
            </div>
            <div class="item">
              <img src="img/index/2.jpg" alt="...">
            </div>
            <div class="item">
              <img src="img/index/3.jpg" alt="...">
            </div>
            <div class="item">
              <img src="img/index/4.jpg" alt="...">
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

<div style="margin-top: 20px"></div>
<!--Latest-product-->
<div class="container latest-product padd-80">
	<div id="titulo" class="col-md-12 sec-head text-center">
        <h3 style="font-size: 26px">Los mejores productos al mejor precio!</h3>
        <span></span>
    </div>

    <div class="clearfix"></div>

    <div class="col-md-12 col-sm-12 mt-30">
        <div class="row">
            <?php
            $articulos_x_pagina=6;
            $search='';
            if(isset($_GET['fam'])){
                $search=$_GET['fam'];
                $count_query=mysqli_query($con,"SELECT count(*) AS numrows FROM products p INNER JOIN categories c ON (p.category_id=c.id) INNER JOIN familia_sub fs ON (c.cod_sub_familia=fs.cod_sub_familia) INNER JOIN familia f ON (fs.cod_familia=f.cod_familia) WHERE p.status='1' AND f.name='$search' ");
                if ($row= mysqli_fetch_array($count_query)){$numrows_fam = $row['numrows'];}
                $paginas=ceil($numrows_fam/$articulos_x_pagina);
                $inciar=($_GET['pagina']-1)*$articulos_x_pagina;
                $sql_proudcts_all=mysqli_query($con, "SELECT p.* FROM products p INNER JOIN categories c ON (p.category_id=c.id) INNER JOIN familia_sub fs ON (c.cod_sub_familia=fs.cod_sub_familia) INNER JOIN familia f ON (fs.cod_familia=f.cod_familia) WHERE p.status='1' AND f.name='$search' LIMIT $inciar, $articulos_x_pagina");

            }else if(isset($_GET['sub_fam'])){
                $search=$_GET['sub_fam'];
                $count_query=mysqli_query($con,"SELECT count(*) AS numrows FROM products p INNER JOIN categories c ON (p.category_id=c.id) INNER JOIN familia_sub fs ON (c.cod_sub_familia=fs.cod_sub_familia) WHERE p.status='1' AND fs.name='$search'");
                if ($row= mysqli_fetch_array($count_query)){$numrows_sub = $row['numrows'];}
                $paginas=ceil($numrows_sub/$articulos_x_pagina);
                $inciar=($_GET['pagina']-1)*$articulos_x_pagina;
                $sql_proudcts_all=mysqli_query($con, "SELECT p.* FROM products p INNER JOIN categories c ON (p.category_id=c.id) INNER JOIN familia_sub fs ON (c.cod_sub_familia=fs.cod_sub_familia) WHERE p.status='1' AND fs.name='$search' LIMIT $inciar, $articulos_x_pagina");

            }else if(isset($_GET['categ'])){
                $search=$_GET['categ'];
                $count_query=mysqli_query($con,"SELECT count(*) AS numrows FROM products p INNER JOIN categories c ON (p.category_id=c.id) WHERE p.status='1' AND c.name='$search'");
                if ($row= mysqli_fetch_array($count_query)){$numrows_cat = $row['numrows'];}
                $paginas=ceil($numrows_cat/$articulos_x_pagina);
                $inciar=($_GET['pagina']-1)*$articulos_x_pagina;
                $sql_proudcts_all=mysqli_query($con, "SELECT * FROM products p INNER JOIN categories c ON (p.category_id=c.id) WHERE p.status='1' AND c.name='$search' LIMIT $inciar, $articulos_x_pagina");

            }else if(isset($_POST['search'])){
                $search=$_POST['search'];
                $count_query=mysqli_query($con,"SELECT count(*) AS numrows FROM products WHERE status='1' AND product_name LIKE '%".$search."%' ");
                if ($row= mysqli_fetch_array($count_query)){$numrows_sear = $row['numrows'];}
                $paginas=ceil($numrows_sear/$articulos_x_pagina);
                $inciar=($_GET['pagina']-1)*$articulos_x_pagina;
                $sql_proudcts_all=mysqli_query($con, "SELECT product_id,product_name,buying_price,selling_price,profit,note,image_path FROM products WHERE status='1' AND (product_name LIKE '%".$search."%' or product_code  LIKE '%".$search."%') LIMIT $inciar, $articulos_x_pagina");

            }else{
                $count_query=mysqli_query($con,"SELECT count(*) AS numrows FROM products WHERE status='1' ");
                if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}
                $paginas=ceil($numrows/$articulos_x_pagina);
                if($_GET['pagina']>$paginas || $_GET['pagina']<=0){
                     header("Location: index.php?pagina=1");
                }
                $inciar=($_GET['pagina']-1)*$articulos_x_pagina;
                $sql_proudcts_all=mysqli_query($con, "SELECT product_id,product_name,buying_price,selling_price,profit,note,image_path FROM products WHERE status='1' LIMIT $inciar, $articulos_x_pagina");
            }

            if(mysqli_num_rows($sql_proudcts_all)>0){
                while($row=mysqli_fetch_array($sql_proudcts_all)){
                    $image_path="sistema/".$row['image_path'];

            ?>
            <div class="col-md-4 col-sm-4 text-left">
                
                <div class="product">
                    <div class="product-img">
                        <a href="" data-toggle="modal" data-target="#quick-modal<?php echo $row['product_id']; ?>">
                           <img src="<?php echo $image_path; ?>" style="width: 220px; height: 220px"  alt="" class="img-responsive" />
                        </a>
                        <div class="new-discount offer-discount">Nuevo</div>
                    </div>
                    <div class="product-body">
                        <div style="height: 40px;"><p><a href="#"><?php echo $row["product_name"]; ?></a></p></div>

                        <h4 style="font-size: 16px;">Precio: S/. <?php echo $row["selling_price"]; ?></h4>


                        <div class="product-body">
                            <form action="">
                                <div class="detail-row quantity-box">
                                    <div id="field1" class="input--filled" style="padding-left: 20px;">
                                        <input type="number" name="cantidad" id="cantidad<?php echo $row['product_id']; ?>" min="1" max="10000" step="1" value="1">
                                        <div class="clearfix"></div>
                                    </div>
                                    <input type="hidden" id="producto<?php echo $row['product_id']; ?>" value="<?php echo $row["product_name"]; ?>"> 
                                    <input type="hidden" id="precio<?php echo $row['product_id']; ?>" value="<?php echo $row["buying_price"]; ?>">
                                    <input type="hidden" id="id<?php echo $row['product_id']; ?>" value="<?php echo $row['product_id']; ?>">
                                    <button type="button" id="agregar<?php echo $row['product_id']; ?>" style="background-color: #1F487E; color: white; width: 120px; height: 50px; border-radius: 16px;">AGREGAR.</button>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
            $('#agregar<?php echo $row['product_id']; ?>').click(function()
            {
              toastr.options = {
                                "closeButton": false,
                                "debug": false,
                                "newestOnTop": false,
                                "progressBar": false,
                                "positionClass": "toast-top-right",
                                "preventDuplicates": false,
                                "onclick": null,
                                "showDuration": "300",
                                "hideDuration": "800",
                                "timeOut": "800",
                                "extendedTimeOut": "1000",
                                "showEasing": "swing",
                                "hideEasing": "linear",
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut"
                                }
                                toastr["success"]("Articulo Agregado.", "Refermat");
                var producto = document.getElementById('producto<?php echo $row['product_id']; ?>').value;
                var precio = document.getElementById('precio<?php echo $row['product_id']; ?>').value;
                var cantidad= document.getElementById('cantidad<?php echo $row['product_id']; ?>').value;
                var id= document.getElementById('id<?php echo $row['product_id']; ?>').value;

                var ruta="prod="+producto+"&pre="+precio+"&cant="+cantidad+"&cod="+id;

                $.ajax({
                    url : 'header.php',
                    type : 'POST',
                    data : ruta,
                    dataType: 'json',
                    success: function(data) {
                        if(data.success==true){
                            $(".detalle-producto").load('detalle.php');                                                
                        }else{
                            alertify.error(data.msj);
                        }
                    },
                    error: function(jqXHR, textStatus, error) {
                        alertify.error(error);
                    }
                })
            });
            </script>

            <!--modal-->

            <?php 
                $product_id=$row['product_id'];
                $sql_proudcts_one=mysqli_query($con, "SELECT p.*, c.name categoria FROM products p INNER JOIN categories c ON (p.category_id=c.id) WHERE p.status='1' AND p.product_id='$product_id'");
                $row2=mysqli_fetch_array($sql_proudcts_one);
                $image_path_2="sistema/".$row2['image_path'];
            ?>

            <div class="modal fade quick-modal in" id="quick-modal<?php echo $row2['product_id']; ?>" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <div class="col-md-5 detail-left text-center">
                                <div id="carousel" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="item active" data-thumb="0">
                                            <img src="<?php echo $image_path_2; ?>" alt="" style="width: 380px; height: 380px; cursor:pointer" data-toggle="modal" data-target="#myModal_img<?php echo $row2['product_id']; ?>" >
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                            <div class="col-md-7 detail-right">
                                <div class="detail-top">
                                    <h1><?php echo $row2["product_name"]; ?></h1>
                                    <div class="rating">
                                        <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="rate">
                                       
                                        <h2>Precio: S/. <?php echo $row2["selling_price"]; ?> </h2>
                                        <label class="offer-label">-<?php echo $row2["profit"]; ?> %</label>
                                   
                                        <span><i class="fa fa-check-circle"></i> En stock</span>
                                        <div class="clearfix"></div>
                                    </div>            
                                </div>
                                <div class="detail">
                                    <div class="sub-menu">
                                        <a href="">Descripción</a>
                                        <p><?php echo $row2["note"]; ?></p>
                                    </div>
                                </div>
                                <div class="detail feature">
                                    <div class="sub-menu">
                                        <div class="detail-btm">

                                            <form action="">
                                                <div class="detail-row quantity-box">
                                                    <p class="text-uppercase">Cantidad</p><div class="clearfix"></div>
                                                    <div id="field1" class="input--filled">
                                                        <input type="number" name="cantidad" id="cant<?php echo $row2['product_id']; ?>" min="1" max="10000" step="1" value="1" class="field">
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <input type="hidden" id="producto<?php echo $row2['product_id']; ?>" value="<?php echo $row2["product_name"]; ?>"> 
                                                    <input type="hidden" id="precio<?php echo $row2['product_id']; ?>" value="<?php echo $row2["buying_price"]; ?>">
                                                    <input type="hidden" id="id<?php echo $row2['product_id']; ?>" value="<?php echo $row2['product_id']; ?>">
                                                    <button type="button" id="add2<?php echo $row2['product_id']; ?>" style="background-color: #1F487E; color: white; width: 120px; height: 50px; border-radius: 16px;" data-dismiss="modal">
                                                        AGREGAR
                                                    </button>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </form>

                                            <div class="detail-row">
                                                <p><span>Codigo:</span> <?php echo $row2["model"]; ?></p>
                                            </div>

                                            <div class="detail-row">
                                                <p><span>Categoría:</span> <?php echo $row2["categoria"]; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>     
                </div>
            </div>

            <script type="text/javascript">
            $('#add2<?php echo $row2['product_id']; ?>').click(function()
            {
                toastr.options = {
                                "closeButton": false,
                                "debug": false,
                                "newestOnTop": false,
                                "progressBar": false,
                                "positionClass": "toast-top-right",
                                "preventDuplicates": false,
                                "onclick": null,
                                "showDuration": "300",
                                "hideDuration": "800",
                                "timeOut": "800",
                                "extendedTimeOut": "1000",
                                "showEasing": "swing",
                                "hideEasing": "linear",
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut"
                                }
                                toastr["success"]("Articulo Agregado.", "Refermat");
                var producto2 = document.getElementById('producto<?php echo $row2['product_id']; ?>').value;
                var precio2 = document.getElementById('precio<?php echo $row2['product_id']; ?>').value;
                var cantidad2 = document.getElementById('cant<?php echo $row2['product_id']; ?>').value;
                var id2 = document.getElementById('id<?php echo $row2['product_id']; ?>').value;

                var ruta="prod="+producto2+"&pre="+precio2+"&cant="+cantidad2+"&cod="+id2;

                $.ajax({
                    url : 'header.php',
                    type : 'POST',
                    data : ruta,
                    dataType: 'json',
                    success: function(data) {
                        if(data.success==true){
                            $(".detalle-producto").load('detalle.php');
                        }else{
                            alertify.error(data.msj);
                        }
                    },
                    error: function(jqXHR, textStatus, error) {
                        alertify.error(error);
                    }
                })
                this.close();
            });
            </script>

            <!--modal_img-->

            <div id="myModal_img<?php echo $row2['product_id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">&nbsp;</h4>
                        </div>
                        <div class="modal-body">
                            <img src="<?php echo $image_path_2;?>" class="img-responsive" style="width: 100%">
                        </div>
                    </div>
                </div>
            </div>
            <?php  }
            }else{
                echo '<h3 style="text-align:center">No se encontraron resultados para <span style="color:#1F487E">"'.$search.'"</span></h3>';
                echo '<script>$("#titulo").css("display", "none");</script>';
            }
            ?>
            <div class="col-md-12 col-xs-12">
                <center>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <?php  
                            if(isset($_GET['fam'])){
                            ?>
                                <li class="page-item <?php echo $_GET['pagina']<=1? 'disabled' : ''; ?>">
                                    <a class="page-link" href="index.php?pagina=<?php echo $_GET['pagina']-1; ?>&fam=<?php echo $_GET['fam']; ?>">Anterior</a>
                                </li>
                            <?php 
                            }else if(isset($_GET['sub_fam'])){
                            ?>
                                <li class="page-item <?php echo $_GET['pagina']<=1? 'disabled' : ''; ?>">
                                    <a class="page-link" href="index.php?pagina=<?php echo $_GET['pagina']-1; ?>&sub_fam=<?php echo $_GET['sub_fam']; ?>">Anterior</a>
                                </li>
                            <?php 
                            }else if(isset($_GET['categ'])){
                            ?>
                                <li class="page-item <?php echo $_GET['pagina']<=1? 'disabled' : ''; ?>">
                                    <a class="page-link" href="index.php?pagina=<?php echo $_GET['pagina']-1; ?>&categ=<?php echo $_GET['categ']; ?>">Anterior</a>
                                </li>
                            <?php 
                            }else if(isset($_POST['search'])){
                            ?>
                                <li class="page-item <?php echo $_GET['pagina']<=1? 'disabled' : ''; ?>">
                                    <a class="page-link" href="index.php?pagina=<?php echo $_GET['pagina']-1; ?>">Anterior</a>
                                </li>
                            <?php 
                            }else{
                            ?>
                                <li class="page-item <?php echo $_GET['pagina']<=1? 'disabled' : ''; ?>">
                                    <a class="page-link" href="index.php?pagina=<?php echo $_GET['pagina']-1; ?>">Anterior</a>
                                </li>
                            <?php
                            }

                            for($i=0;$i<$paginas;$i++){ 
                                if(isset($_GET['fam'])){
                            ?>
                                <li class="page-item <?php echo $_GET['pagina']==$i+1? 'active' : ''; ?>">
                                    <a class="page-link" href="index.php?pagina=<?php echo $i+1; ?>&fam=<?php echo $_GET['fam']; ?>"><?php echo $i+1; ?></a>
                                </li>
                            <?php 
                                }else if(isset($_GET['sub_fam'])){
                            ?>
                                <li class="page-item <?php echo $_GET['pagina']==$i+1? 'active' : ''; ?>">
                                    <a class="page-link" href="index.php?pagina=<?php echo $i+1; ?>&sub_fam=<?php echo $_GET['sub_fam']; ?>"><?php echo $i+1; ?></a>
                                </li>
                            <?php 
                                }else if(isset($_GET['categ'])){
                            ?>
                                <li class="page-item <?php echo $_GET['pagina']==$i+1? 'active' : ''; ?>">
                                    <a class="page-link" href="index.php?pagina=<?php echo $i+1; ?>&categ=<?php echo $_GET['categ']; ?>"><?php echo $i+1; ?></a>
                                </li>
                            <?php 
                                }else if(isset($_POST['search'])){
                            ?>
                                <li class="page-item <?php echo $_GET['pagina']==$i+1? 'active' : ''; ?>">
                                    <a class="page-link" href="index.php?pagina=<?php echo $i+1; ?>"><?php echo $i+1; ?></a>
                                </li>
                            <?php 
                                }else{
                            ?>
                                <li class="page-item <?php echo $_GET['pagina']==$i+1? 'active' : ''; ?>">
                                    <a class="page-link" href="index.php?pagina=<?php echo $i+1; ?>"><?php echo $i+1; ?></a>
                                </li>
                            <?php
                                } 
                            }
                            if(isset($_GET['fam'])){
                            ?>
                                <li class="page-item <?php echo $_GET['pagina']>=$paginas? 'disabled' : ''; ?>">
                                    <a class="page-link" href="index.php?pagina=<?php echo $_GET['pagina']+1; ?>&fam=<?php echo $_GET['fam']; ?>">Siguiente</a>
                                </li>
                            <?php 
                            }else if(isset($_GET['sub_fam'])){
                            ?>
                                <li class="page-item <?php echo $_GET['pagina']>=$paginas? 'disabled' : ''; ?>">
                                    <a class="page-link" href="index.php?pagina=<?php echo $_GET['pagina']+1; ?>&sub_fam=<?php echo $_GET['sub_fam']; ?>">Siguiente</a>
                                </li>
                            <?php 
                            }else if(isset($_GET['categ'])){
                            ?>
                                <li class="page-item <?php echo $_GET['pagina']>=$paginas? 'disabled' : ''; ?>">
                                    <a class="page-link" href="index.php?pagina=<?php echo $_GET['pagina']+1; ?>&categ=<?php echo $_GET['categ']; ?>">Siguiente</a>
                                </li>
                            <?php 
                            }else if(isset($_POST['search'])){
                            ?>
                                <li class="page-item <?php echo $_GET['pagina']>=$paginas? 'disabled' : ''; ?>">
                                    <a class="page-link" href="index.php?pagina=<?php echo $_GET['pagina']+1; ?>">Siguiente</a>
                                </li>
                            <?php 
                            }else{
                            ?>
                                <li class="page-item <?php echo $_GET['pagina']>=$paginas? 'disabled' : ''; ?>">
                                    <a class="page-link" href="index.php?pagina=<?php echo $_GET['pagina']+1; ?>">Siguiente</a>
                                </li>
                            <?php
                            }
                            ?>
                        </ul>
                    </nav>
                </center>
            </div>
        <div class="clearfix"></div>
        </div>
    </div>
    <div class="clearfix"></div>

</div>


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
                <p>Av. Maquinarias 1891, Cercado de Lima.</p>
            </div>

            <div class="clearfix"></div>

            <div class="contact">
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
            	<p>© 2019 <a href="#">Refermat</a>. Todos los derechos reservados.</p>
            </div>
        </div>
    </div>
</div>

<!--js-->

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

    $(document).on("contextmenu", function (e) {        
        e.preventDefault();
    });
</script>

<script type="text/javascript" src="js/ajax.js"></script>

<script>
    $(document).ready(function($) {
        var Body = $('body');
        Body.addClass('preloader-site');
    });
    $(window).load(function() {
        $('.preloader-wrapper').fadeOut();
        $('body').removeClass('preloader-site');
    });
</script>

</body>

</html>