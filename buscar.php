<?php
  // include("sistema/config_pw/db.php");
  // include("sistema/config_pw/conexion.php");
  
 /*  if(!isset($_POST['productos'])){
    
    $sql_proudcts=mysqli_query($con, "SELECT p.*, c.name categoria FROM products p INNER JOIN categories c ON (p.category_id=c.id) WHERE p.status='1' ");

    $contar = @mysqli_num_rows($sql_proudcts);
      
    if($contar == 0){
          echo "No se han encontrado resultados para '<b>".$buscar."</b>'.";
    }else{

      while($row=mysqli_fetch_array($sql_proudcts)){
        $image_path="sistema/".$row['image_path'];
        echo '<div class="row">
          <div class="col-md-4 col-sm-4">
            <div class="product">
              <div class="product-img">  
                <img src="'.$image_path.'" style="width: 250px; height: 250px"  alt="" class="img-responsive" />
                <div class="new-discount offer-discount">Nuevo</div>
              </div>
              <div class="product-body">
                <p><a href="#">'.$row["product_name"].'</a></p>
              </div>
            </div>
          </div>

          <div class="col-md-8 col-sm-8">
              <div class="detail-top">
                  <h1>'.$row["product_name"].'</h1>
                  <div class="rating">
                      <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                      <div class="clearfix"></div>
                  </div>
                  <div class="rate">
                      <h2>'.$row["buying_price"].'<del>'.$row["selling_price"].'</del></h2>
                      <label class="offer-label">-'.$row["profit"].'</label>
                      <span><i class="fa fa-check-circle"></i> In stock</span>
                      <div class="clearfix"></div>
                  </div>            
              </div>
              <div class="detail">
                  <div class="sub-menu">
                      <a href="">Descripción</a>
                      <p>'.$row["note"].'</p>
                  </div>
              </div>
              <div class="detail feature">
                  <div class="sub-menu">
                      <div class="detail-btm">
                          <div class="detail-row">
                              <p><span>Stock:</span> '.$row["stock_min"].'</p>
                          </div>
                          <div class="detail-row">
                              <p><span>Modelo:</span> '.$row["model"].'</p>
                          </div>
                          <div class="detail-row">
                              <p><span>Categoría:</span> '.$row["categoria"].'</p>
                          </div>
                      </div>
                  </div>
                  <div class="clearfix"></div>
              </div>
          </div> 
        <div class="clearfix"></div>
        </div>';
      }
    }

  }else{

    $buscar = $_POST['productos'];
        
    $sql_proudcts=mysqli_query($con, "SELECT p.*, c.name categoria FROM products p INNER JOIN categories c ON (p.category_id=c.id) WHERE p.status='1' AND p.product_name LIKE '%".$buscar."%' ");
      
    $contar = @mysqli_num_rows($sql_proudcts);
      
    if($contar == 0){
          echo "No se han encontrado resultados para '<b>".$buscar."</b>'.";
    }else{

      while($row=mysqli_fetch_array($sql_proudcts)){
        $image_path="sistema/".$row['image_path'];
        echo '<div class="row">
          <div class="col-md-4 col-sm-4">
            <div class="product">
              <div class="product-img">  
                <img src="'.$image_path.'" style="width: 250px; height: 250px"  alt="" class="img-responsive" />
                <div class="new-discount offer-discount">Nuevo</div>
              </div>
              <div class="product-body">
                <p><a href="#">'.$row["product_name"].'</a></p>
              </div>
            </div>
          </div>

          <div class="col-md-8 col-sm-8">
              <div class="detail-top">
                  <h1>'.$row["product_name"].'</h1>
                  <div class="rating">
                      <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                      <div class="clearfix"></div>
                  </div>
                  <div class="rate">
                      <h2>'.$row["buying_price"].'<del>'.$row["selling_price"].'</del></h2>
                      <label class="offer-label">-'.$row["profit"].'</label>
                      <span><i class="fa fa-check-circle"></i> In stock</span>
                      <div class="clearfix"></div>
                  </div>            
              </div>
              <div class="detail">
                  <div class="sub-menu">
                      <a href="">Descripción</a>
                      <p>'.$row["note"].'</p>
                  </div>
              </div>
              <div class="detail feature">
                  <div class="sub-menu">
                      <div class="detail-btm">
                          <div class="detail-row">
                              <p><span>Stock:</span> '.$row["stock_min"].'</p>
                          </div>
                          <div class="detail-row">
                              <p><span>Modelo:</span> '.$row["model"].'</p>
                          </div>
                          <div class="detail-row">
                              <p><span>Categoría:</span> '.$row["categoria"].'</p>
                          </div>
                      </div>
                  </div>
                  <div class="clearfix"></div>
              </div>
          </div> 
        <div class="clearfix"></div>
        </div>';
      }
    }
  } */
        
?>