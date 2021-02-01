<?php 
@session_start();
setlocale(LC_MONETARY, 'en_US');
?>
<?php if(isset($_SESSION['detalle'])){ ?>
<div class="bor cart-det">
    <i class="flaticon-shopping-bag"></i>&nbsp; <h2>Mi carrito</h2>
</div> 

<div class="cart-item-hover">                    
    <?php
        $total=0;

        foreach($_SESSION['detalle'] as $k => $detalle) {
            echo '<script>console.log(' . json_encode($detalle) . ')</script>';
            $img="sistema/".$detalle['imagen'];
    ?>
    
    <form>
        <div class="cart-item-list text-left">
        <img src="<?php echo $img; ?>" style="width: 120px; height: 120px" alt=""  />
        <a href="#"><h3><?php  if (strlen($detalle['producto'])>42)  {echo substr($detalle['producto'],0,42),'...';}else {echo $detalle['producto'];}; ?></h3>

            <a href="#"><h3>Cantidad: <?php echo $detalle['cantidad'];?></h3></a>
            <b><button type="button" class="btn btn-xs btn-primary eliminar-producto" id="<?php echo $detalle['id'];?>">X</button></b>
            <p>Precio: S/. <?php echo $detalle['precio'];?></p>
            <?php $total+=$detalle['precio']*$detalle['cantidad'];  ?>
        </div>
    </form>

    <div style="padding-top: 30px"></div>
    <?php } ?>
    <div class="border"></div>

    <div class="cart-total">
        <?php if(isset($_SESSION['user_name'])){ ?>
        <h6>Precio total:  </h6> <p><?php echo "S/. ".number_format($total,2,".",",");?></p><div class="clearfix"></div>
        <?php } ?>
        <a href="check-out.php" class="cart-checkout">Verificar</a>
    </div>
</div>
<?php } ?>

<script type="text/javascript" src="js/ajax.js"></script>