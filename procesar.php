<?php
	require_once ("sistema/config_pw/db.php");
	require_once ("sistema/config_pw/conexion.php");
	require_once ("sistema/libraries/password_compatibility_library.php");

	$modo = isset($_GET['modo']) ? $_GET['modo'] : 'default';

	switch ($modo) {

		case 'login':
			if (isset($_POST['login'])) {
				if (!empty($_POST['user']) && !empty($_POST['passw'])) {

					session_start();
					session_destroy();

					include('controller/class.Acceso.php');
					$login = new Acceso($_POST['user'],$_POST['passw']);
					$login -> Login();
				}else{
					header("Location: procesar.php?error=campos_vacios");
				}
			}else{
				header("Location: procesar.php");
			}
		break;

	default:
			if (isset($_GET['error']) and $_GET['error']=='datos_incorrectos') {
				session_start();
				$_SESSION['error'] = 'Error: Usuario o contraseña incorrectos';
				header("Location: login.php");
			}elseif (isset($_GET['error']) and $_GET['error']=='campos_vacios') {
				session_start();
				$_SESSION['error'] = 'Error: Debes llenar los campos';
				header("Location: login.php");
			}elseif (isset($_GET['error']) and $_GET['error']=='acceso') {
				session_start();
				$_SESSION['error'] = 'Error: La sesión a caducado o no has iniciado sesión';
				header("Location: login.php");
			}else{
				header("Location: login.php");
			}
		break;
	}
?>