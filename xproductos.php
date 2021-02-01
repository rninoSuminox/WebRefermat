<?php
session_start();
require_once("sistema/config_pw/db.php");
require_once("sistema/config_pw/conexion.php");
if (!$_GET) {
    header("Location: productos.php?pagina=1");
}
?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Refermat::Productos</title>
    <link rel="icon" href="img/index/favicon.png" sizes="16x16">
    <!--BOOTSTRAP-->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <!--css-->
    <link href="css/style-1.css" rel="stylesheet" type="text/css">
    <link href="css/style-carga.css" rel="stylesheet" type="text/css">

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
                <p><i class="flaticon-phone-call"></i>&nbsp;Contáctanos llamando al: <b>981 278 969 - 01 541 8979</b></p>
            </div>

            <div class="col-md-8 text-right">
                <div class="bor log">
                    <?php
                    if (isset($_SESSION['user_name'])) {
                    ?>
                        <a href="#">
                            Usuario: <b><?php echo $_SESSION['user_name'] ?></b>
                            <a href="cerrar_sesion.php?url=index.php"><i class="fa fa-power-off"></i></a>
                        </a>
                    <?php } else if (!isset($_SESSION['user_name'])) {  ?>
                        <a href="login.php"><b>Inicia Sesión</b></a>
                    <?php } ?>
                </div>

                <div class="cart-item detalle-producto">
                    <?php if (isset($_SESSION['detalle']) && count($_SESSION['detalle']) > 0) { ?>
                        <div class="bor cart-det">
                            <i class="flaticon-shopping-bag"></i>&nbsp; <h2>Mi carrito</h2>
                        </div>

                        <div class="cart-item-hover">
                            <?php
                            $total = 0;
                            foreach ($_SESSION['detalle'] as $k => $detalle) {
                                $img = "sistema/" . $detalle['imagen'];
                            ?>

                                <div class="cart-item-list text-left">
                                <img src="<?php echo $img; ?>" style="width: 120px; height: 120px" alt=""  />
                                    <a href="#">
                                        <h3><?php  if (strlen($detalle['producto'])>42)  {echo substr($detalle['producto'],0,42),'...';}else {echo $detalle['producto'];}; ?></h3>
                                    </a>
                                    <a href="#">
                                        <h3>Cantidad: <?php echo $detalle['cantidad']; ?></h3>
                                    </a>
                                    <b><button type="button" class="btn btn-xs btn-primary eliminar-producto" id="<?php echo $detalle['id']; ?>">X</button></b>

                                    <p>Precio: S/. <?php echo $detalle['precio']; ?></p>
                                    <?php $total += $detalle['precio'] * $detalle['cantidad']; ?>
                                </div>

                                <div style="padding-top: 30px"></div>
                            <?php } ?>
                            <div class="border"></div>

                            <div class="cart-total">
                                <?php if (isset($_SESSION['user_name'])) { ?>
                                    <h6>Precio total: </h6>
                                    <p><?php echo "S/. " . $total; ?></p>
                                    <div class="clearfix"></div>
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
                            $sql_familia = mysqli_query($con, "SELECT f.cod_familia, f.name FROM familia f INNER JOIN familia_sub fs ON (f.cod_familia=fs.cod_familia) INNER JOIN categories c ON (fs.cod_sub_familia=c.cod_sub_familia) WHERE f.status='1' GROUP BY f.cod_familia, f.name");
                            while ($row_fam = mysqli_fetch_array($sql_familia)) {
                                $cod_familia = $row_fam["cod_familia"];
                                $sql_sub_familia = mysqli_query($con, "SELECT fs.cod_sub_familia, fs.name FROM familia f INNER JOIN familia_sub fs ON (f.cod_familia=fs.cod_familia) INNER JOIN categories c ON (fs.cod_sub_familia=c.cod_sub_familia) WHERE fs.status='1'  AND fs.cod_familia=$cod_familia GROUP BY fs.cod_sub_familia, fs.name");
                            ?>
                                <li>
                                    <a href="productos.php?pagina=1&fam=<?php echo $row_fam["name"]; ?>">
                                        </i><?php echo $row_fam["name"]; ?>
                                    </a>
                                    <div class="categories-mega-menu">
                                        <div class="categories-main-menu">
                                            <?php
                                            while ($row_sub_fam = mysqli_fetch_array($sql_sub_familia)) {
                                                $cod_sub_familia = $row_sub_fam["cod_sub_familia"];
                                                $sql_categ = mysqli_query($con, "SELECT c.id, c.name FROM familia f INNER JOIN familia_sub fs ON (f.cod_familia=fs.cod_familia) INNER JOIN categories c ON (fs.cod_sub_familia=c.cod_sub_familia) WHERE c.status='1'  AND c.cod_sub_familia=$cod_sub_familia GROUP BY c.id, c.name");
                                            ?>
                                                <span>
                                                    <a href="productos.php?pagina=1&sub_fam=<?php echo $row_sub_fam["name"]; ?>" class="title"><?php echo $row_sub_fam["name"]; ?></a>
                                                    <?php while ($row_categ = mysqli_fetch_array($sql_categ)) { ?>
                                                        <a href="productos.php?pagina=1&categ=<?php echo $row_categ["name"]; ?>"><?php echo $row_categ["name"]; ?></a>
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
                <form action=<?php echo "productos.php?pagina=1"?> method="post">
                    <input type="text" name="search" placeholder="Busqueda..." />
                    <div class="round search-round">
                        <button type='submit' class="btn btn-primary" value="Buscar"><span class="fa fa-search"></button>
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
                    <img class = "full" src="img/index/1.jpg" alt="...">
                </div>
                <div class="item">
                    <img class = "full" src="img/index/2.jpg" alt="...">
                </div>
                <div class="item">
                    <img class = "full" src="img/index/3.jpg" alt="...">
                </div>
                <div class="item">
                    <img class = "full" src="img/index/4.jpg" alt="...">
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
            <h3 style="font-size: 26px">Nuestros Productos</h3>
            <span></span><br>
            <p>Obtén los productos con la mejor calidad del mercado, de una manera fácil y con la seguridad que te brindámos</p>
        </div>

        <div class="clearfix"></div>
  
        <div class="col-md-4 col-sm-12 mt-30">
        <div id="MainMenu">
            <div class="filters">
            <?php
   
                if (isset($_GET['categ'])) {?>
                 <?php
                    if (isset($_POST['search']) or isset($_GET['search'])) {
                                ?>
                <span>
                <a href="productos.php?pagina=1&search=<?php if (isset($_POST['search'])){ echo $_POST['search'];}else {echo $_GET['search'];} ?>"><i class="fa fa-times" aria-hidden="true">
                <?php echo $_GET['categ']; ?></i>
                </a>
                </span>   
                      
                        <?php
                        }else{   ?>
                     <span>
                <a href="productos.php?pagina=1"><i class="fa fa-times" aria-hidden="true">
                <?php echo $_GET['categ']; ?></i>
                </a>
                </span>  
                       <?php } ?>
                  
                         
                     <?php } ?>
                    
            </div>
        <div class="list-group panel filter-categories">
        <a class="main-a" href="javascript:void(0)">CATEGORIAS</a>
                <?php
                    $i = 0;
                    $ids_categorias = "";
                  if (isset($_POST['search']) or isset($_GET['search'])) {
                    if (isset($_POST['search'])) { $searchFilter=$_POST['search'];}
                    else {$searchFilter =  $_GET['search'];}           
   
             
                                      
                    $categoriasFilter= mysqli_query($con, "SELECT DISTINCT category_id 
                    FROM products 
                    WHERE product_name LIKE '%" . $searchFilter . "%'  
                    AND status='1'");              
                    $numResults = mysqli_num_rows($categoriasFilter);
                }else{

                    $categoriasFilter= mysqli_query($con, "SELECT DISTINCT category_id 
                    FROM products 
                    WHERE status='1'");              
                    $numResults = mysqli_num_rows($categoriasFilter);


                }
                    while ($array_categorias = mysqli_fetch_array($categoriasFilter)){   
                        $category_id =  $array_categorias["category_id"];  
                 
                        $i++;
                        if($i== $numResults){
                        $ids_categorias = $ids_categorias . $category_id ;
                        }else if($i== 1){
                        $ids_categorias = $category_id . ",";
                        }else{
                        $ids_categorias = $ids_categorias . $category_id . ",";
                        }              
                    }    
                    echo '<script>';
                    echo 'console.log('. json_encode( $ids_categorias ) .')';
                    echo '</script>';                   
        

                    $sql_familia = mysqli_query($con, "SELECT f.cod_familia, f.name 
                    FROM familia f 
                    INNER JOIN familia_sub fs ON (f.cod_familia=fs.cod_familia) 
                    INNER JOIN categories c ON (fs.cod_sub_familia=c.cod_sub_familia)
                    WHERE f.status='1' AND c.id IN ($ids_categorias)
                    GROUP BY f.cod_familia, f.name");
               
                      
                 
                     if (isset($_POST['search']) or isset($_GET['search'])) {

                     }
                            while ($row_fam = mysqli_fetch_array($sql_familia)) {
                                echo '<script>';
                                echo 'console.log('. json_encode( $row_fam ) .')';
                                echo '</script>';
                                $cod_familia = $row_fam["cod_familia"];
                                $sql_sub_familia = mysqli_query($con, "SELECT fs.cod_sub_familia, fs.name 
                                FROM familia f 
                                INNER JOIN familia_sub fs ON (f.cod_familia=fs.cod_familia) 
                                INNER JOIN categories c ON (fs.cod_sub_familia=c.cod_sub_familia AND c.id IN ($ids_categorias))  
                                WHERE fs.status='1'  
                                AND fs.cod_familia=$cod_familia                                
                                GROUP BY fs.cod_sub_familia, fs.name");

                                
                            ?>
                             <a class="list-group-item list-group-item active" data-toggle="collapse" data-parent="#MainMenu" href="#<?php echo $row_fam['cod_familia']; ?>">
                            <?php echo $row_fam["name"]; ?>
                             </a>
                        <div class="collapse" id="<?php echo $row_fam['cod_familia']; ?>">                     
                            <?php
                                            while ($row_sub_fam = mysqli_fetch_array($sql_sub_familia)) {
                                                echo '<script>';
                                                echo 'console.log('. json_encode( $row_sub_fam ) .')';
                                                echo '</script>';
                                                $cod_sub_familia = $row_sub_fam["cod_sub_familia"];

                                       
                                                    $sql_categ = mysqli_query($con, "SELECT c.id, c.name 
                                                    FROM familia f 
                                                    INNER JOIN familia_sub fs ON (f.cod_familia=fs.cod_familia) 
                                                    INNER JOIN categories c ON (fs.cod_sub_familia=c.cod_sub_familia AND c.id IN ($ids_categorias))                            
                                                    WHERE c.status='1'
                                                    AND c.cod_sub_familia=$cod_sub_familia 
                                                   -- AND c.id IN ('$ids_categorias')
                                                    GROUP BY c.id, c.name");
                                                
                                            ?>
                                                <span>                                                   
                                                    <?php while ($row_categ = mysqli_fetch_array($sql_categ)) {                                                        
                                                        
                                                        ?>
                                                        
                                                        <?php if (isset($_POST['search']) or isset($_GET['search'])) { 
                                                            if(isset($_GET['categ'])){
                                                        if(isset($_GET['categ']) == $row_categ["name"]){
                                                        ?>
                                                            <a class="list-group-item" href="productos.php?pagina=1&categ=<?php echo $row_categ["name"];?>&search=<?php if (isset($_POST['search'])){ echo $_POST['search'];}else {echo $_GET['search'];} ?>"><?php echo $row_categ["name"]; ?> </a>
                                                            <?php
                                                           }else{   ?>
                                                             <a class="list-group-item" href="productos.php?pagina=1&categ=<?php echo $row_categ["name"];?>&search=<?php if (isset($_POST['search'])){ echo $_POST['search'];}else {echo $_GET['search'];} ?>"><?php echo $row_categ["name"]; ?> </a>
                                                             <?php }
                                                            }else{?>
                                                                <a class="list-group-item" href="productos.php?pagina=1&categ=<?php echo $row_categ["name"];?>&search=<?php if (isset($_POST['search'])){ echo $_POST['search'];}else {echo $_GET['search'];} ?>"><?php echo $row_categ["name"]; ?> </a> 
                                                                <?php } ?>
                                                       
                                                        <?php
                                                           }else{   ?>
                                                        <a class="list-group-item" href="productos.php?pagina=1&categ=<?php echo $row_categ["name"]; ?>"><?php echo $row_categ["name"]; ?> </a>
                                                            <?php } ?>
                                              
                                                    <?php } ?>
                                                </span>
                                            <?php } ?>
                        </div>
                        <?php } ?>
        </div>
        </div>
        </div>
        <div class="col-md-8 col-sm-12 mt-30">
            <div class="row">
                <?php
                $articulos_x_pagina = 6;
                $link = 5;
                $search = '';
                $searchFilter = '';
                if (isset($_GET['fam'])) {
                    $search = $_GET['fam'];
                    $count_query = mysqli_query($con, "SELECT count(*) AS numrows FROM products p INNER JOIN categories c ON (p.category_id=c.id) INNER JOIN familia_sub fs ON (c.cod_sub_familia=fs.cod_sub_familia) INNER JOIN familia f ON (fs.cod_familia=f.cod_familia) WHERE p.status='1' AND f.name='$search' ");
                    if ($row = mysqli_fetch_array($count_query)) {
                        $numrows_fam = $row['numrows'];
                    }
                    //Obtener el total de páginas o última página
                    $paginas = ceil($numrows_fam / $articulos_x_pagina);
                   
                    //Calcular inicio de paginación
                    $start =(($_GET['pagina'] - $link)>0)? $_GET['pagina'] - $link:1;
                    //Calcular fin de paginación
                    $end =  (($_GET['pagina'] + $link)<$paginas)? $_GET['pagina'] + $link: $paginas;

                    $inciar = ($_GET['pagina'] - 1) * $articulos_x_pagina;
                    $sql_proudcts_all = mysqli_query($con, "SELECT p.product_id,p.product_name,p.buying_price,p.selling_price,p.profit,p.note,p.image_path,p.product_code,p.model
                                                              FROM products p INNER JOIN categories c ON (p.category_id=c.id) INNER JOIN familia_sub fs ON (c.cod_sub_familia=fs.cod_sub_familia) INNER JOIN familia f ON (fs.cod_familia=f.cod_familia) WHERE p.status='1' AND f.name='$search' order by Orden LIMIT $inciar, $articulos_x_pagina");
                } else if (isset($_GET['sub_fam'])) {
                    $search = $_GET['sub_fam'];
                    $count_query = mysqli_query($con, "SELECT count(*) AS numrows FROM products p INNER JOIN categories c ON (p.category_id=c.id) INNER JOIN familia_sub fs ON (c.cod_sub_familia=fs.cod_sub_familia) WHERE p.status='1' AND fs.name='$search'");
                    if ($row = mysqli_fetch_array($count_query)) {
                        $numrows_sub = $row['numrows'];
                    }
                    $paginas = ceil($numrows_sub / $articulos_x_pagina);
              //Calcular inicio de paginación
              $start =(($_GET['pagina'] - $link)>0)? $_GET['pagina'] - $link:1;
              //Calcular fin de paginación
              $end =  (($_GET['pagina'] + $link)<$paginas)? $_GET['pagina'] + $link: $paginas;
                    $inciar = ($_GET['pagina'] - 1) * $articulos_x_pagina;
                    $sql_proudcts_all = mysqli_query($con, "SELECT p.product_id,p.product_name,p.buying_price,p.selling_price,p.profit,p.note,p.image_path,p.product_code,p.model
                                                              FROM products p INNER JOIN categories c ON (p.category_id=c.id) INNER JOIN familia_sub fs ON (c.cod_sub_familia=fs.cod_sub_familia) WHERE p.status='1' AND fs.name='$search' order by Orden LIMIT $inciar, $articulos_x_pagina");
                
                }else if (isset($_GET['categ']) && (isset($_POST['search']) or isset($_GET['search']))) {//NUEVO FILTRO DE CATEGORIA CON BUSQUEDA
                    //Capturar string de busqueda
                
                    if (isset($_POST['search'])) { $searchFilter=$_POST['search'];}
                    else {$searchFilter =  $_GET['search'];}

                    $search = $_GET['categ'];
                    $count_query = mysqli_query($con, "SELECT count(*) AS numrows FROM products p INNER JOIN categories c ON (p.category_id=c.id) WHERE p.status='1' AND c.name='$search'
                    AND (product_name LIKE '%" . $searchFilter . "%' or product_code  LIKE '%" . $searchFilter . "%')");
                    if ($row = mysqli_fetch_array($count_query)) {
                        $numrows_cat = $row['numrows'];
                    }
                    $paginas = ceil($numrows_cat / $articulos_x_pagina);
                    //Calcular inicio de paginación
                    $start =(($_GET['pagina'] - $link)>0)? $_GET['pagina'] - $link:1;
                    //Calcular fin de paginación
                    $end =  (($_GET['pagina'] + $link)<$paginas)? $_GET['pagina'] + $link: $paginas;
                    $inciar = ($_GET['pagina'] - 1) * $articulos_x_pagina;
                    $sql_proudcts_all = mysqli_query($con, "SELECT product_id,product_name,buying_price,selling_price,profit,note,image_path,product_code,model 
                                                              FROM products p INNER JOIN categories c ON (p.category_id=c.id) WHERE p.status='1' AND c.name='$search'
                                                              AND (product_name LIKE '%" . $searchFilter . "%') order by Orden LIMIT $inciar, $articulos_x_pagina");
            
            } else if (isset($_GET['categ'])) {
                    $search = $_GET['categ'];
                    $count_query = mysqli_query($con, "SELECT count(*) AS numrows FROM products p INNER JOIN categories c ON (p.category_id=c.id) WHERE p.status='1' AND c.name='$search'");
                    if ($row = mysqli_fetch_array($count_query)) {
                        $numrows_cat = $row['numrows'];
                    }
                    $paginas = ceil($numrows_cat / $articulos_x_pagina);
                    //Calcular inicio de paginación
                    $start =(($_GET['pagina'] - $link)>0)? $_GET['pagina'] - $link:1;
                    //Calcular fin de paginación
                    $end =  (($_GET['pagina'] + $link)<$paginas)? $_GET['pagina'] + $link: $paginas;
                    $inciar = ($_GET['pagina'] - 1) * $articulos_x_pagina;
                    $sql_proudcts_all = mysqli_query($con, "SELECT product_id,product_name,buying_price,selling_price,profit,note,image_path,product_code,model 
                                                              FROM products p INNER JOIN categories c ON (p.category_id=c.id) WHERE p.status='1' AND c.name='$search' LIMIT $inciar, $articulos_x_pagina");


             
                } else if (isset($_POST['search']) or isset($_GET['search'])) {
                    // $search = $_POST['search'];
                    if (isset($_POST['search'])) { $search=$_POST['search'];}
                        else {$search =  $_GET['search'];}
                    $count_query = mysqli_query($con, "SELECT count(*) AS numrows FROM products WHERE status='1' AND product_name LIKE '%" . $search . "%' ");
                    if ($row = mysqli_fetch_array($count_query)) {
                        $numrows_sear = $row['numrows'];
                    }
                    $paginas = ceil($numrows_sear / $articulos_x_pagina);
               //Calcular inicio de paginación
               $start =(($_GET['pagina'] - $link)>0)? $_GET['pagina'] - $link:1;
               //Calcular fin de paginación
               $end =  (($_GET['pagina'] + $link)<$paginas)? $_GET['pagina'] + $link: $paginas;
                    $inciar = ($_GET['pagina'] - 1) * $articulos_x_pagina;
                    $sql_proudcts_all = mysqli_query($con, "SELECT product_id,product_name,buying_price,selling_price,profit,note,image_path,product_code,model 
                                                              FROM products WHERE status='1' AND (product_name LIKE '%" . $search . "%' or product_code  LIKE '%" . $search . "%') order by Orden LIMIT $inciar, $articulos_x_pagina");
                } else {
                    $count_query = mysqli_query($con, "SELECT count(*) AS numrows FROM products WHERE status='1' ");
                    if ($row = mysqli_fetch_array($count_query)) {
                        $numrows = $row['numrows'];
                    }
                    $paginas = ceil($numrows / $articulos_x_pagina);
                       //Calcular inicio de paginación
                       $start =(($_GET['pagina'] - $link)>0)? $_GET['pagina'] - $link:1;
                       //Calcular fin de paginación
                       $end =  (($_GET['pagina'] + $link)<$paginas)? $_GET['pagina'] + $link: $paginas;
                    if ($_GET['pagina'] > $paginas || $_GET['pagina'] <= 0) {
                        header("Location: productos.php?pagina=1");
                    }
                   // $product_id2 = 220350034;
                    $inciar = ($_GET['pagina'] - 1) * $articulos_x_pagina;
                   // $test = "SELECT product_id,product_name,buying_price,selling_price,profit,note,image_path,product_code,model FROM products WHERE status='1' AND product_code = '220500006'   order by Orden LIMIT $inciar, $articulos_x_pagina";
                    $sql_proudcts_all = mysqli_query($con, "SELECT product_id,product_name,buying_price,selling_price,profit,note,image_path,product_code,model FROM products WHERE status='1'  order by Orden LIMIT $inciar, $articulos_x_pagina");
               
               
                }
        
                if (mysqli_num_rows($sql_proudcts_all) > 0) {
                  
                    while ($row = mysqli_fetch_array($sql_proudcts_all)) {
                        $image_path = "sistema/" . $row['image_path'];
            

                ?>
                        <div class="col-md-4 col-sm-4 text-left">

                            <div class="product">
                                <div class="product-img">
                                    <a href="" data-toggle="modal" data-target="#quick-modal<?php echo $row['product_id']; ?>">
                                        <img src="<?php echo $image_path; ?>" style="width: 220px; height: 220px" alt="" class="img-home" />
                                    </a>
                                    <div class="new-discount offer-discount">Nuevo</div>
                                </div>
                                <div class="product-body">
                                    <div style="height: 40px;">
                                        <p><a href="#"><?php echo $row["product_name"]; ?></a></p>
                                    </div>

                                    <h4 style="font-size: 16px;">Precio: S/. <?php
                                                        if (isset($_SESSION['user_name'])) 
                                                        { echo $row["buying_price"];   }                                 
                                                            else {echo $row["selling_price"];}  
                                    ?></h4>

                                    <div class="product-body">
                                        <form action="">
                                            <div class="detail-row quantity-box">
                                                <div id="field1" class="input--filled" style="padding-left: 20px;">
                                                    <input type="number" name="cantidad" id="cantidad<?php echo $row['product_id']; ?>" min="1" max="10000" step="1" value="1">
                                                    <div class="clearfix"></div>
                                                </div>
                                                <input type="hidden" id="producto<?php echo $row['product_id']; ?>" value="<?php echo $row["product_name"]; ?>">
                                                <input type="hidden" id="precio<?php echo $row2['product_id']; ?>" value="<?php if(isset($_SESSION['user_name'])){ echo $row["buying_price"];}else{echo $row["selling_price"];} ?>">
                                                <input type="hidden" id="id<?php echo $row['product_id']; ?>" value="<?php echo $row['product_id']; ?>">

                                                <input type="hidden" id="product_code<?php echo $row['product_id']; ?>" value="<?php echo $row["product_code"]; ?>">
                                                <input type="hidden" id="model<?php echo $row['product_id']; ?>" value="<?php echo $row["model"]; ?>">

                                                <button type="button" id="agregar<?php echo $row['product_id']; ?>" style="background-color: #1F487E; color: white; width: 120px; height: 50px; border-radius: 16px;">AGREGAR.</button>
                                                <div class="clearfix"></div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script type="text/javascript">
                            $('#agregar<?php echo $row['product_id']; ?>').click(function() {
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
                                var cantidad = document.getElementById('cantidad<?php echo $row['product_id']; ?>').value;
                                var id = document.getElementById('id<?php echo $row['product_id']; ?>').value;
                                
                                var product_code = document.getElementById('product_code<?php echo $row['product_id']; ?>').value;
                                var model = document.getElementById('model<?php echo $row['product_id']; ?>').value;


                                var ruta = "prod=" + producto + "&pre=" + precio + "&cant=" + cantidad + "&cod=" + id
                                        + "&pcod="+ product_code + "&model=" + model;

                                $.ajax({
                                    url: 'header.php',
                                    type: 'POST',
                                    data: ruta,
                                    dataType: 'json',
                                    success: function(data) {
                                        if (data.success == true) {
                                            $(".detalle-producto").load('detalle.php');
                                        } else {
                                            alertify.error(data.msj);
                                        }
                                        $(".detalle-producto").load('detalle.php');
                                    },
                                    error: function(jqXHR, textStatus, error) {
                                        alertify.error(error);
                                    }
                                })
                            });
                        </script>

                        <!--modal-->

                        <?php
                        $product_id = $row['product_id'];            
                        $sql_proudcts_one = mysqli_query($con, "SELECT p.*, c.name categoria FROM products p INNER JOIN categories c ON (p.category_id=c.id) WHERE p.status='1' AND p.product_id='$product_id'");
                        $row2 = mysqli_fetch_array($sql_proudcts_one);
                        $image2 = ($row2['image_path2'] == 'null' || $row2['image_path2'] == 'NULL') ? "" : $row2['image_path2'] ;                
                        $image3 = ($row2['image_path3'] == 'null' || $row2['image_path3'] == 'NULL') ? "" : $row2['image_path3'] ;
                        $video = ($row2['video_path'] == 'null'  || $row2['video_path'] == 'NULL') ? "" : $row2['video_path'] ;
                     
                        $image_path_2 = "sistema/" . $row2['image_path2'];
                        $image_path_3 = "sistema/" . $row2['image_path3'];
                        $image_path_4 = "sistema/img/productos/product.png";
                        $video_path = $row2['video_path'];
                        
                        $sql_hijos = mysqli_query($con, "SELECT h.* , c.name categoria FROM products h INNER JOIN products p ON (h.code_padre=p.product_code) INNER JOIN categories c ON (p.category_id=c.id) WHERE h.status='1' AND p.product_id='$product_id'");
                        $hijos= mysqli_fetch_array($sql_hijos);
                       echo '<script>';
            
                       echo 'console.log('. json_encode( $hijos ) .')';
                       echo '</script>';
                        ?>

                        <div class="modal fade quick-modal in" id="quick-modal<?php echo $row2['product_id']; ?>" tabindex="-1" role="dialog">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <div class="col-md-5">



                                            <div id="carousel<?php echo $row2['product_id']; ?>" class="carousel slide" data-ride="carousel">

                                                <ol class="carousel-indicators">
                                                    <li data-target="#carousel<?php echo $row2['product_id']; ?>" class = "slide0" data-slide-to="0" class="active"></li>
                                                    <?php

                                               
                                              
                                                    if (!empty($image2))  {                                               
                                                    
                                                          echo ' <li data-target="#carousel' .$row2['product_id'].'" class = "slide1" data-slide-to="1" ></li>';
                                                   
                                                    }
                                               
                                                    if (!empty($image3))  {                                               
                                                    
                                                        echo ' <li data-target="#carousel' .$row2['product_id'].'" class = "slide2" data-slide-to="2"></li>';
                                                 
                                                    }
                                                  
                                                    if (!empty($video))  {                                               
                                                    
                                                    echo ' <li data-target="#carousel' .$row2['product_id'].'" class = "slide3" data-slide-to="3"></li>';
                                             
                                                    }
                                                  
                                                   
                                               
                                                    ?>
                                                </ol>

                                                <div class="carousel-inner" role="listbox">
                                                    <div class="item active" data-thumb="0">
                                                        <img  id= "imgP<?php echo $row2["product_id"]; ?>" src="<?php echo $image_path; ?>" alt="" style="width: 380px; height: 380px; cursor:pointer" data-toggle="modal" data-target="#myModal_img<?php echo $row2['product_id']; ?>" data-myvalue="<?php echo $image_path; ?>" class="open-Dialog">
                                                    </div>
                                                    <?php
                                           
                                                    if (!empty($image2))  {                                               
                                                    
                                                        echo '<div class="item" data-thumb="1"> <img src="'. $image_path_2.'" alt="" style="width: 380px; height: 380px; cursor:pointer" data-toggle="modal" data-target="#myModal_img' . $row2['product_id'] . '" data-myvalue2="' . $image_path_2 . '" class="open-Dialog3"> </div>';
                                                   
                                                    }
                                               
                                                    if (!empty($image3))  {                                               
                                                    
                                                        echo '<div class="item" data-thumb="2"> <img src="'. $image_path_3.'" alt="" style="width: 380px; height: 380px; cursor:pointer" data-toggle="modal" data-target="#myModal_img' . $row2['product_id'] . '" data-myvalue3="' . $image_path_3 . '" class="open-Dialog3"> </div>';
                                                 
                                                    }
                                                  
                                                    if (!empty($video))  { 
                                                        echo '<div class="item" data-thumb="3"> <img src="'. $image_path_4.'" alt="" style="width: 380px; height: 380px; cursor:pointer" data-toggle="modal" data-target="#myModal_vid' . $row2['product_id'] . '" data-myvalue4="' . $video_path . '" class="open-Vid"> </div>';
                                                        //echo '<div class="item" data-thumb="3">    <iframe src="'.$video_path .'" style="width:100%; height: 380px;" allowFullScreen data-toggle="modal" data-target="#myModal_vid' . $row2['product_id'] . '" data-myvalue4=' . $video_path. '" class="open-Vid"></iframe> </div>';
                                             
                                                    }
                                                    ?>
                                                </div>
                                            </div>

                                            <a class="left carousel-control" href="#carousel<?php echo $row2['product_id']; ?>" role="button" data-slide="prev">
                                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="right carousel-control" href="#carousel<?php echo $row2['product_id']; ?>" role="button" data-slide="next">
                                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div>

                                        <div class="col-md-7 detail-right">
                                            <div class="detail-top">
                                                <h1 id= "nombreP<?php echo $row2["product_id"]; ?>"><?php echo $row2["product_name"]; ?></h1>
                                                <div class="rating">
                                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="rate">

                                                    <h2 id= "precioP<?php echo $row2["product_id"]; ?>">Precio: S/. <?php 
                                                                                        if (isset($_SESSION['user_name'])) 
                                                                                        { echo $row["buying_price"];   }                                 
                                                                                            else {echo $row["selling_price"];}                                                    
                                                    ?> </h2>
                                                    <label class="offer-label">-<?php echo $row2["profit"]; ?> %</label>

                                                    <span><i class="fa fa-check-circle"></i> En stock</span>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                            <div class="detail">
                                                <div class="sub-menu">
                                                    <a href="">Descripción</a>
                                                    <p id= "descripcionP<?php echo $row2["product_id"]; ?>"><?php echo $row2["note"]; ?></p>
                                                </div>
                                            </div>
                                            <div class="slider-product">
                                        
                                                    <?php 
                                                    $precio= 0;
                                                   if(isset($_SESSION['user_name'])){
                                                        $precio = $row2['buying_price'];
                                                   }else{
                                                    $precio = $row["selling_price"];
                                                   }
                                                    $row2['product_name'] = str_replace('"', '&quot', $row2['product_name']);
                                                     echo '<span class="item" data-thumb="1"> <img src="'."sistema/" . $row2['image_path'].'" alt="" style="width: 30px; height: 30px; padding: 5px; cursor:pointer"  onclick = "dataHijos(' .  "'". $row2['product_id'] . 
                                                        "','" . $row2['product_name']  .
                                                        "','" . $row2['buying_price'] .
                                                        "','" . $row2['selling_price'] .
                                                        "','" . $row2['model'] .
                                                        "','" . $row2['categoria'] .
                                                        "','" ."sistema/" . $row2['image_path'] .
                                                        "','" . $row2['image_path2'] .
                                                        "','" . $row2['image_path3'] .
                                                        "','" . $row2['video_path'] .
                                                        "','" . $row2["product_id"] .
                                                        "','" . $row2['note'] . "'" . ');" class="data-hijos"> </span>';
                                                                                                          
                                                        
                                                    while ($hijos = mysqli_fetch_array($sql_hijos)) {
                                                        $hijos['product_name'] = str_replace('"', '&quot', $hijos['product_name']);
                                                        if(isset($_SESSION['user_name'])){
                                                            $precio = $hijos['buying_price'];
                                                       }else{
                                                        $precio = $hijos["selling_price"];
                                                       }
                                                        echo '<span class="item" data-thumb="1"> <img src="'."sistema/". $hijos['image_path'].'" alt="" style="width: 30px; height: 30px; padding: 5px; cursor:pointer"  onclick = "dataHijos(' .  "'". $hijos['product_id'] . 
                                                        "','" . $hijos['product_name'] .
                                                        "','" . $hijos['buying_price'] .
                                                        "','" . $hijos['selling_price'] .
                                                        "','" . $hijos['model'] .
                                                        "','" . $hijos['categoria'] .
                                                        "','" ."sistema/" . $hijos['image_path'] .
                                                        "','" . $hijos['image_path2'] .
                                                        "','" . $hijos['image_path3'] .
                                                        "','" . $hijos['video_path'] .
                                                        "','" . $row2["product_id"] .
                                                        "','" . $hijos['note'] . "'" . ');" class="data-hijos"> </span>';
                                                        }                                                    
                                                        ?> 
                                            </div>
                                            
                                            <div class="detail feature">
                                                <div class="sub-menu">
                                                    <div class="detail-btm">

                                                        <form action="">
                                                            <div class="detail-row quantity-box">
                                                                <p class="text-uppercase">Cantidad</p>
                                                                <div class="clearfix"></div>
                                                                <div id="field1" class="input--filled">
                                                                    <input type="number" name="cantidad" id="cant<?php echo $row2['product_id']; ?>" min="1" max="10000" step="1" value="1" class="field">
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                                <input type="hidden" id="producto<?php echo $row2['product_id']; ?>" value="<?php echo $row2["product_name"]; ?>">
                                                                <input type="hidden" id="precio<?php echo $row2['product_id']; ?>" value="<?php if(isset($_SESSION['user_name'])){ echo $row["buying_price"];}else{echo $row["selling_price"];} ?>">
                                                                <input type="hidden" id="id<?php echo $row2['product_id']; ?>" value="<?php echo $row2['product_id']; ?>">

                                                                <input type="hidden" id="product_code<?php echo $row['product_id']; ?>" value="<?php echo $row["product_code"]; ?>">
                                                                <input type="hidden" id="model<?php echo $row['product_id']; ?>" value="<?php echo $row["model"]; ?>">


                                                                <button type="button" id="add2<?php echo $row2['product_id']; ?>" style="background-color: #1F487E; color: white; width: 120px; height: 50px; border-radius: 16px;" data-dismiss="modal">
                                                                    AGREGAR
                                                                </button>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                        </form>

                                                        <div class="detail-row">
                                                            <p ><span id= "codigoSpan<?php echo $row2["product_id"]; ?>">Codigo:</span> <span id= "codigoP<?php echo $row2["product_id"]; ?>"><?php echo $row2["model"]; ?></span></p>
                                                        </div>

                                                        <div class="detail-row">
                                                            <p ><span id= "categoriaSpan<?php echo $row2["product_id"]; ?>" >Categoría:</span> <span id= "categoriaP<?php echo $row2["product_id"]; ?>"><?php echo $row2["categoria"]; ?></span></p>
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
                            $('#add2<?php echo $row2['product_id']; ?>').click(function() {
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

                                var product_code2 = document.getElementById('product_code<?php echo $row['product_id']; ?>').value;
                                var model2 = document.getElementById('model<?php echo $row['product_id']; ?>').value;                                

                                var ruta = "prod=" + producto2 + "&pre=" + precio2 + "&cant=" + cantidad2 + "&cod=" + id2 
                                         + "&pcod="+ product_code2 + "&model=" + model2;

                                $.ajax({
                                    url: 'header.php',
                                    type: 'POST',
                                    data: ruta,
                                    dataType: 'json',
                                    success: function(data) {
                                        if (data.success == true) {
                                            $(".detalle-producto").load('detalle.php');
                                        } else {
                                            alertify.error(data.msj);
                                        }
                                        $(".detalle-producto").load('detalle.php');
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
                                        <img src="<?php echo $image_path_2; ?>" class="img-responsive" name="imgID" id="imgID" style="width: 100%">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="myModal_vid<?php echo $row2['product_id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">&nbsp;</h4>
                                    </div>
                                    <div class="modal-body">
                                        <iframe width="100%" height="380" name="vidID" id="vidID"  allowFullScreen>
                                        </iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php  }
                } else {
                    if ((isset($_POST['search']) or isset($_GET['search'])) && (isset($_GET['categ']))) {
                    echo '<h3 style="text-align:center">No se encontraron resultados para <span style="color:#1F487E">"' . $searchFilter . ' "</span> en la categoría <span style="color:#1F487E">"' . $search . ' "</span></h3>';
                    echo '<script>$("#titulo").css("display", "none");</script>';
                    }else{
                        echo '<h3 style="text-align:center">No se encontraron resultados para <span style="color:#1F487E">"' . $search . '"</span></h3>';
                        echo '<script>$("#titulo").css("display", "none");</script>'; 
                    }
                }
                ?>
                <div class="col-md-12 col-xs-12">
                    <center>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination" >
                                <?php
                             //   echo $start;
                             //   echo $end;
                                $pagina_actual= $_GET['pagina'];
                                $class = ($pagina_actual == 1) ? "disabled" : ""; //desactivar boton previo
                               // $pagina_previa = ($pagina_actual == 1) 
                            
                                
                                if (isset($_GET['fam'])) {
                                ?>
                                    <li class="page-item <?php echo $_GET['pagina'] <= 1 ? 'disabled' : ''; ?>">
                                        <a class="page-link" href="productos.php?pagina=<?php echo $_GET['pagina'] - 1; ?>&fam=<?php echo $_GET['fam']; ?>">Anterior</a>
                                    </li>
                                <?php
                                } else if (isset($_GET['sub_fam'])) {
                                ?>
                                    <li class="page-item <?php echo $_GET['pagina'] <= 1 ? 'disabled' : ''; ?>">
                                        <a class="page-link" href="productos.php?pagina=<?php echo $_GET['pagina'] - 1; ?>&sub_fam=<?php echo $_GET['sub_fam']; ?>">Anterior</a>
                                    </li>
                                <?php
                                } else if (isset($_GET['categ']) && (isset($_POST['search']) or isset($_GET['search']))) {//nuevo filtro de categorias
                                    ?>
                                        <li class="page-item <?php echo $_GET['pagina'] <= 1 ? 'disabled' : ''; ?>">
                                            <a class="page-link" href="productos.php?pagina=<?php echo $_GET['pagina'] - 1; ?>&categ=<?php echo $_GET['categ']; ?>&search=<?php if (isset($_POST['search'])){ echo $_POST['search'];}else {echo $_GET['search'];} ?>">Anterior</a>
                                        </li>
                                    <?php                                    
                                } else if (isset($_GET['categ'])) {
                                ?>
                                    <li class="page-item <?php echo $_GET['pagina'] <= 1 ? 'disabled' : ''; ?>">
                                        <a class="page-link" href="productos.php?pagina=<?php echo $_GET['pagina'] - 1; ?>&categ=<?php echo $_GET['categ']; ?>">Anterior</a>
                                    </li>
                                <?php
                                } else if (isset($_POST['search']) or isset($_GET['search'])) {
                                ?>
                                    <li class="page-item <?php echo $_GET['pagina'] <= 1 ? 'disabled' : ''; ?>">
                                        <a class="page-link" href="productos.php?pagina=<?php echo ($_GET['pagina'] - 1);?>&search=<?php if (isset($_POST['search'])){ echo $_POST['search'];}else {echo $_GET['search'];} ?>">Anterior</a>
                                    </li>
                                <?php
                                } else {
                                ?>
                                    <li class="page-item <?php echo $_GET['pagina'] <= 1 ? 'disabled' : ''; ?>">
                                        <a class="page-link" href="productos.php?pagina=<?php echo $_GET['pagina'] - 1; ?>">Anterior</a>
                                    </li>
                                    <?php
                                }
                                if($start > 1){                                 
                                    ?>
                                         <li class="page-item ">
                                             <a class="page-link" href="productos.php?pagina=1">1</a>
                                        </li>
                                        <li class="disabled">
                                          <span>...</span>
                                        </li>
                                    <?php
                                   
                            }
                               // for ($i = 0; $i < $paginas; $i++) {

                                
                                for ($i = $start-1; $i < $end ; $i++) {
                                    if (isset($_GET['fam'])) {
                                    ?>
                                        <li class="page-item <?php echo $_GET['pagina'] == $i + 1 ? 'active' : ''; ?>">
                                            <a class="page-link" href="productos.php?pagina=<?php echo $i + 1; ?>&fam=<?php echo $_GET['fam']; ?>"><?php echo $i + 1; ?></a>
                                        </li>
                                    <?php
                                    } else if (isset($_GET['sub_fam'])) {
                                    ?>
                                        <li class="page-item <?php echo $_GET['pagina'] == $i + 1 ? 'active' : ''; ?>">
                                            <a class="page-link" href="productos.php?pagina=<?php echo $i + 1; ?>&sub_fam=<?php echo $_GET['sub_fam']; ?>"><?php echo $i + 1; ?></a>
                                        </li>
                                    <?php
                                     } else if (isset($_GET['categ']) && (isset($_POST['search']) or isset($_GET['search']))) {//nuevo filtro de categorias
                                        ?>
                                            <li class="page-item <?php echo $_GET['pagina'] == $i + 1 ? 'active' : ''; ?>">
                                            <a class="page-link" href="productos.php?pagina=<?php echo $i + 1; ?>&categ=<?php echo $_GET['categ']; ?>&search=<?php if (isset($_POST['search'])){ echo $_POST['search'];}else {echo $_GET['search'];} ?>"><?php echo $i + 1; ?></a>
                                            </li>
                                        <?php                                                                   
                                    } else if (isset($_GET['categ'])) {
                                    ?>
                                        <li class="page-item <?php echo $_GET['pagina'] == $i + 1 ? 'active' : ''; ?>">
                                            <a class="page-link" href="productos.php?pagina=<?php echo $i + 1; ?>&categ=<?php echo $_GET['categ']; ?>"><?php echo $i + 1; ?></a>
                                        </li>
                                    <?php
                                    } else if (isset($_POST['search']) or isset($_GET['search'])) {
                                    ?>
                                        <li class="page-item <?php echo $_GET['pagina'] == $i + 1 ? 'active' : ''; ?>">
                                            <a class="page-link" href="productos.php?pagina=<?php echo ($i + 1) ;?>&search=<?php if (isset($_POST['search'])){ echo $_POST['search'];}else{echo $_GET['search'];} ?>"><?php echo $i + 1; ?></a>
                                        </li>
                                    <?php
                                    } else {
                                    ?>
                                        <li class="page-item <?php echo $_GET['pagina'] == $i + 1 ? 'active' : ''; ?>">
                                            <a class="page-link" href="productos.php?pagina=<?php echo $i + 1; ?>"><?php echo $i + 1; ?></a>
                                        </li>
                                    <?php
                                    }
                                }
                                if($end < $paginas){                                 
                                    ?>
                                     <li class="disabled">
                                          <span>...</span>
                                        </li>
                                        <!-- rafael, para tomar filtro de busqueda -->
                                        <?php 
                                        if (isset($_POST['search']) or isset($_GET['search'])) { ?>
                                            <li class="page-item ">
                                              <a class="page-link" href="productos.php?pagina=<?php echo $paginas ; ?>&search=<?php if (isset($_POST['search'])){ echo $_POST['search'];}else{echo $_GET['search'];} ?>"><?php echo $paginas ; ?></a>
                                            </li>
                                        <?php } else { ?>
                                         <li class="page-item ">
                                             <a class="page-link" href="productos.php?pagina=<?php echo $paginas ; ?>"><?php echo $paginas ; ?></a>
                                        </li>
                                        <?php }?>
                                       
                                    <?php
                                   
                                }
                                if (isset($_GET['fam'])) {
                                    ?>
                                    <li class="page-item <?php echo $_GET['pagina'] >= $paginas ? 'disabled' : ''; ?>">
                                        <a class="page-link" href="productos.php?pagina=<?php echo $_GET['pagina'] + 1; ?>&fam=<?php echo $_GET['fam']; ?>">Siguiente</a>
                                    </li>
                                <?php
                                } else if (isset($_GET['sub_fam'])) {
                                ?>
                                    <li class="page-item <?php echo $_GET['pagina'] >= $paginas ? 'disabled' : ''; ?>">
                                        <a class="page-link" href="productos.php?pagina=<?php echo $_GET['pagina'] + 1; ?>&sub_fam=<?php echo $_GET['sub_fam']; ?>">Siguiente</a>
                                    </li>
                                <?php
                                }else if (isset($_GET['categ']) && (isset($_POST['search']) or isset($_GET['search']))) {//nuevos filtros
                                    ?>
                                        <li class="page-item <?php echo $_GET['pagina'] >= $paginas ? 'disabled' : ''; ?>">
                                            <a class="page-link" href="productos.php?pagina=<?php echo ($_GET['pagina'] + 1) ;?>&search=<?php if (isset($_POST['search'])){ echo $_POST['search'];}else {echo $_GET['search'];} ?>&categ=<?php echo $_GET['categ']; ?>">Siguiente</a>
                                        </li>
                                    <?php
                                    
                                } else if (isset($_GET['categ'])) {
                                ?>
                                    <li class="page-item <?php echo $_GET['pagina'] >= $paginas ? 'disabled' : ''; ?>">
                                        <a class="page-link" href="productos.php?pagina=<?php echo $_GET['pagina'] + 1; ?>&categ=<?php echo $_GET['categ']; ?>">Siguiente</a>
                                    </li>
                                <?php
                                } else if (isset($_POST['search']) or isset($_GET['search'])) {
                                ?>
                                    <li class="page-item <?php echo $_GET['pagina'] >= $paginas ? 'disabled' : ''; ?>">
                                        <a class="page-link" href="productos.php?pagina=<?php echo ($_GET['pagina'] + 1) ;?>&search=<?php if (isset($_POST['search'])){ echo $_POST['search'];}else {echo $_GET['search'];} ?>">Siguiente</a>
                                    </li>
                                <?php
                                } else {
                                ?>
                                    <li class="page-item <?php echo $_GET['pagina'] >= $paginas ? 'disabled' : ''; ?>">
                                        <a class="page-link" href="productos.php?pagina=<?php echo $_GET['pagina'] + 1; ?>">Siguiente</a>
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

<!--service-->
<div class="container services-sec padd-60" id="informacion">
    <div class="col-sm-6 col-md-4" style="text-align: center;">
        <div class="service-body">
            <div class="service-inner">
                <i class="flaticon-1-transport"></i>
                <h2>Envio Gratuito en Lima</h2>
                <h3>Por pedidos mayores a S./250<br> de lo contrario S./9.9 en Lima Metropolitano.<br> Otro destino te estaran contactando</h3>
            </div>
        </div>
    </div>
    <a href="#" data-toggle="modal" data-target="#myModal"><div class="col-sm-6 col-md-4" style="text-align: center;">
        <div class="service-body">
            <div class="service-inner">
                <i class="flaticon-1-like"></i>
                <h2>100% Satisfaccion</h2>
                <h3>Ofrecemos productos con garantía</h3>
            </div>
        </div>
    </div></a>
    <a href="info_tecnica.php">   
        <div class="col-sm-6  col-sm-offset-3 col-md-offset-0 col-md-4">
            <div class="service-body">
                <div class="service-inner">
                    <i class="flaticon-1-previous"></i>
                    <h2>Información Técnica</h2>
                    <h3>Fichas técnicas de productos, videos técnicos.</h3>
                </div>
            </div>
        </div>
    </a>
</div>


<!--modal-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">

        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <div class="col-sm-12 modal-text">
            
                    <div class="form-sec">
                  
                        <div class="tab-content"> 
                            <h1>POLITICA DE GARANTIA</h1>

                            
                            <div class="modal-acc">
                                <p>Todos los productos que comercializamos en REFERMAT manejan excelentes estándares de calidad ajustado a la exigencia y requerimiento para el cual fueron diseñados.</p>
                            </div>

                            <div class="modal-acc">
                                <p>Los productos bajo las marcas Fundicion Pacifico, Cisa, Visalock</p>
                            </div>

                            <div class="modal-acc">
                                <p>La garantía para devolución incluye:</p>
                                <ul>
                                    <li>Falla técnica</li>
                                    <li>Estética y acabado de nuestros productos</li>
                                    <li>Falta de accesorios</li>
                                    <li>Llaves que no coinciden</li>
                                </ul>
                            </div>

                            <div class="modal-acc">
                                <img src="img/index/imp_empresas.png">
                            </div>
                            <div class="modal-acc">
                                <p>Si se llegara a presentar alguna falla técnica de uso, esto nos motivaría a realizar el cambio del producto identificado con el mal funcionamiento, y queda excepto de cambio productos con las siguientes características:</p>
                                <ul>
                                    <li>Cuando la avería se produzca como consecuencia de un uso inadecuado o por causas de fuerza mayor. Circunstancias que habrán de ser aprobadas por el prestador del servicio.</li>
                                    <li>Desgaste de pintura o acabados.</li>
                                    <li>Uso indebido, maltrato del producto o aplicación de químicos inadecuados.</li>
                                    <li>Mala instalación o posterior a un proceso de soldadura, o aplicación térmica elevada.</li>
                                </ul>
                            </div>

                            <div class="swiss-right">
                                <p>Para las demás marcas que comercializamos nuestro catalogo o producto tiene una identificación que hace referencia al tiempo de su garantía preservándose las excepciones mencionadas anteriormente.</p>
                            </div>
                        </div>
                
                    </div>
            
                </div>
        
                <div class="clearfix"></div>
            
            </div>
        </div>
    </div>
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
        setTimeout(function() {
            $("#testimonial-slider").owlCarousel({
                items: 1,
                itemsDesktop: [1000, 1],
                itemsDesktopSmall: [979, 1],
                itemsTablet: [768, 1],
                pagination: true,
                navigation: false,
                navigationText: ["", ""],
                slideSpeed: 1000,
                singleItem: true,
                autoPlay: true
            });
        }, 300);
    </script>
    <!--client-slider-->
    <script src="js/jquery.flexisel.js"></script>
    <!--Revolution-->
    <script language=JavaScript>
        /*  $(document).keydown(function (event) {
        if (event.keyCode == 123) { // Prevent F12
            return false;
        } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) { // Prevent Ctrl+Shift+I        
            return false;
        }
    });

    $(document).on("contextmenu", function (e) {        
        e.preventDefault();
    });*/
     
        $(document).on("click", ".open-Dialog", function() {
            var myValue = $(this).data('myvalue');
            $(".modal-body #imgID").val(myValue);
            $(".modal-body #imgID").attr('src', myValue);

        }); 
        $(document).on("click", ".open-Dialog2", function() {
            var myValue = $(this).data('myvalue2');
            $(".modal-body #imgID").val(myValue);
            $(".modal-body #imgID").attr('src', myValue);

        }); 
        $(document).on("click", ".open-Dialog3", function() {
            var myValue = $(this).data('myvalue3');
            $(".modal-body #imgID").val(myValue);
            $(".modal-body #imgID").attr('src', myValue);

        });    
       
        $(document).on("click", ".img-home", function() {           
            var myValue1 = $('.open-Dialog').data('myvalue');
            var myValue2=  $('.open-Dialog2').data('myvalue2');
            var myValue3 = $('.open-Dialog3').data('myvalue3');
            var myValue4 = $('.open-Vid').data('myvalue4');
   


        });
        $(document).on("click", ".open-Vid", function() {
            var myValue = $(this).data('myvalue4');
            $(".modal-body #vidID").val(myValue);
            $(".modal-body #vidID").attr('src', myValue);

        });
        $('.close').on('click', function() {

            var video = $(".modal-body #vidID").attr("src");
            $(".modal-body #vidID").attr("src", "");
            $(".modal-body #vidID").attr("src", video);

        });
        window.onclick = function(event) {
            var target = event.target;
            if (target.classList.contains('modal')) {
                target.style.display = "none";
                stopVideo(target);
    
            }
        }
        function dataHijos(id, nombre, precio1,precio2, model,categoria , img1, img2, img3, video,idPadre,note) {

          
        var nombreID = 'nombreP' + idPadre;
        var precioID = 'precioP' + idPadre;
        var descripcionID = 'descripcionP' + idPadre;
        var codigoID = 'codigoP' + idPadre;
        var categoriaID = 'categoriaP' + idPadre;
        var codigoSpanID = 'codigoSpan' + idPadre;
        var categoriaSpanID = 'categoriaSpan' + idPadre;
        var imgID = 'imgP' + idPadre;
        var productoCarritoID = 'producto' + idPadre;
        var precioCarritoID = 'precio' + idPadre;
        var CarritoID = 'id' + idPadre;
        console.log(nombreID);    
        document.getElementById(nombreID).innerHTML  = nombre;
        document.getElementById(precioID).innerHTML  = "Precio: S/. " + precio1;
        document.getElementById(descripcionID).innerHTML  = note;
        document.getElementById(codigoID).innerHTML  = model;
        document.getElementById(categoriaID).innerHTML  = categoria;
        document.getElementById(codigoSpanID).innerHTML  = "Codigo: ";
        document.getElementById(categoriaSpanID).innerHTML  = "Categoria: ";
        document.getElementById(imgID).src  = img1;
        document.getElementById(productoCarritoID).value  = nombre;
        document.getElementById(precioCarritoID).value  = precio1;
        document.getElementById(CarritoID).value  = id;
            }
        function stopVideo(modal) {
        var currentIframe = modal.querySelector('.modal-body > iframe');
        currentIframe.src = currentIframe.src;
            }
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