<?php

$requestUri = $_SERVER['REQUEST_URI'];
$requestUriParts = parse_url($requestUri);
$path = $requestUriParts['path']; // Obtiene la ruta sin los parámetros de consulta

switch ($path) {
    case '/':
        include __DIR__ . '/../public/home.php'; // Asegúrate de que esta sea la ruta correcta
        break;
    case '/cursos':
        include __DIR__ . '/../Registro/client.php'; // Esta debe ser la ruta correcta
        break;
    case '/logeo':
        include __DIR__ . '/../public/editar.html';
        break;
    case '/validacion':
        include __DIR__ . '/../validacion.php';
        break;
    case '/up':
        include __DIR__ . '/../BD/Procesarsubir.php';
        break;
    case '/editar':
        include __DIR__ . '/../BD/editar.php'; // Ruta correcta a editar.php
        break;
	case '/conexion':
		include __DIR__ . '/../BD/Conexion.php'; // Ruta correcta a editar.php
		break;
	case '/subir':
		include __DIR__ . '/../BD/subir.php'; // Ruta correcta a subir.php
		break;
    case '/borrar':
        include __DIR__ . '/../BD/borrar.php'; // Ruta correcta a borrar.php
        break;
    case '/admin':
        include __DIR__ . '/../admin/editartabla.php';
        break;    
    case '/ingresar':
        include __DIR__ . '/../cliente/ingresar.php';
        break;
	default:
        include __DIR__ . '/../public/home.php'; // Cambiado a home.php en caso de ruta no encontrada
}