<?php
@session_start();  
setlocale(LC_MONETARY, 'en_US');     
if(isset($_SESSION['detalle'])){
    $carrito = $_SESSION['detalle'];
    $total=0;
?>
<div class="row">
    <table>
    <tr>
        <th>Productos</th>
        <th style="padding-left: 20px;">Cant.</th>
        <th style="padding-left: 20px;">Precio</th>
        <th style="padding-left: 20px;" class="text-right">Total</th>
        <th></th>
    </tr>

    <?php    
        foreach ($carrito as $p) {
            $total_uni=$p['cantidad']*$p['precio'];
    ?>
    
    <tr>
        <td><?php echo $p['producto'];?></td>
        <td class="text-right">
          <input type="number" class="cambia-cantidad" style="width: 60px" min="1" max="10000" step="1" 
                 name="txtCantidad" product_id="<?php echo $p['id'];?>" stock="<?php echo $p['stock'];?>" value="<?php echo $p['cantidad'];?>" />
          <input type="hidden" name="txtStock" product_id="<?php echo $p['id'];?>" value="<?php echo $p['stock'];?>" />
        </td>
        <td class="text-right"><?php echo "S/".number_format($p['precio'],2,".",",");?></td>
        <td class="text-right"><?php echo "S/".number_format($total_uni  ,2,".",",");?></td>
        <td> <button type="button" class="btn eliminar-detalle" id="<?php echo $p['id'];?>"><i class="fa fa-trash fa-2"></i></button></td>
    </tr>
    <?php
            $total+=$total_uni;
        }
    ?>
    <tr>                        
        <td class="text-uppercase"><b>Total</b></td>
        <td colspan="3" class="total text-right"><?php echo "S/ ".number_format($total,2,".",",");?></td>
    </tr>
    
    </table>
</div>
<?php } ?>

<script type="text/javascript" src="js/ajax.js"></script>