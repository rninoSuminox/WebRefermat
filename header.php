<?php 
session_start();
require_once ("controller/conexion.php");
require_once ("controller/producto.php");

$objProducto = new Producto();
$json = array();
$json['msj'] = 'Producto Agregado';
$json['success'] = true;

if (isset($_POST['cod']) && $_POST['cod']!='' && isset($_POST['cant']) && $_POST['cant']!='') {
	if($_POST['cant']<=10000 && $_POST['cant']>0){
		try {
			$cantidad = $_POST['cant'];
			$id = $_POST['cod'];
			$stock = $_POST['stk'];
			
			$resultado_producto = $objProducto->getById($id);
			$producto = $resultado_producto->fetchObject();
			$descripcion = $producto->product_name;
			//$precio = $producto->buying_price;
			$precio = $_POST['pre'];
			$imagen = $producto->image_path;
			$pcodigo=$producto->product_code;
			$modelo=$producto->model;
			$subtotal = $cantidad * $precio;
			
			$_SESSION['detalle'][$id] = array('id'=>$id, 'producto'=>$descripcion, 'cantidad'=>$cantidad, 'precio'=>$precio, 'subtotal'=>$subtotal
			                                 ,'imagen'=>$imagen,'pcodigo'=>$pcodigo,'modelo'=>$modelo,'stock'=>$stock);

			$json['success'] = true;

			echo json_encode($json);
		} catch (PDOException $e) {
			$json['msj'] = $e->getMessage();
			$json['success'] = false;
			echo json_encode($json);
		}
	}else{
		$json['msj'] = 'Solo se permite cotizar hasta 10 mil productos';
		$json['success'] = false;
		echo json_encode($json);
	}
}else{
	$json['msj'] = 'Ingrese un producto y/o ingrese cantidad';
	$json['success'] = false;
	echo json_encode($json);
}

?>