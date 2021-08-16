<?php

require 'vendor/autoload.php';
require 'models/db.php';

require 'controllers/Home/HomeController.php';


use Phroute\Phroute\RouteCollector;
use Phroute\Phroute\Dispatcher;
$router = new RouteCollector();


/*Configuraciones de formato de fecha y hora*/
date_default_timezone_set("America/Cancun");
setlocale(LC_TIME,'es_MX.utf8'); //Server
setlocale(LC_MONETARY,'es_MX.utf8'); //Server
//setlocale(LC_TIME,'spanish'); //local
//setlocale(LC_MONETARY,"spanish");

/*
*  Si tu localhost está seccionada por carpetas dejar la variable $dominio con "oktrip" o como se llame la carpeta de tu proyecto oktrip. 
Ejemplo: http://localhost/oktrip/...

*  También necesitas cambiar las rutas de los assets en los Views y agregarle la ruta relativa: ya sea "/oktrip" o solo "/".
Ejemplo:  <link rel="stylesheet" type="text/css" href="/oktripv2.0/css/bootstrap.min.css">
<script type="text/javascript" src="/oktripv2.0/js/jquery-3.2.1.min.js"></script>

*  Pero si tienes tu localhost como un dominio local dejar la variable $dominio vacía, para ello necesitas tener
los VirtualHost activado en tu servidor apache, consulta el siguiente link y seguir el tutorial:
https://styde.net/creando-virtual-hosts-con-apache-en-windows-para-wamp-o-xampp/

API GOOGLE MAPS AIzaSyBFWlA8W2jx51jbdNGby-6DcjSBZOdrQdQ
*/
$dominio = ""; 

try {


   $router->controller($dominio.'/', 'HomeController');
   /*$router->controller($dominio.'/Seasons', 'SeasonsController');
   $router->controller($dominio.'/Reservas', 'EditController');
   $router->controller($dominio.'/Multimedia', 'multimediaController');*/

   $dispatcher = new Dispatcher($router->getData());
   $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
} 
catch (Phroute\Phroute\Exception\HttpRouteNotFoundException $e) 
{
   echo "ERROR 404: NOT FOUND";
   //var_dump($e);      
   die();
}
catch (Phroute\Phroute\Exception\HttpMethodNotAllowedException $e)
{
   echo "ERROR 404: NOT FOUND";
   //var_dump($e);       
   die();
}
