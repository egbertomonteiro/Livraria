<?php
require_once('../configs/configurations.inc.php');


Seguranca::estaConectado();
session_start();
session_destroy();

header('Location:login.php');


?>