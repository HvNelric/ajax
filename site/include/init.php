<?php
// initialise la session
session_start();

define('RACINE_WEB', '/ajax/site/');
define('PHOTO_WEB', RACINE_WEB . 'photo/');
// sous xampp, $_SERVER['DOCUMENT_ROOT'] vaut C:\xampp\htdocs
define('PHOTO_DIR', $_SERVER['DOCUMENT_ROOT'] . '/ajax/site/photo/');
define('PHOTO_DEFAULT', 'https://dummyimage.com/600x400/ccc/ffffff&text=Pas+d\'image');
define('JS_WEB', RACINE_WEB . 'assets/js/');

require_once __DIR__ . '/cnx.php';
require_once __DIR__ . '/fonctions.php';