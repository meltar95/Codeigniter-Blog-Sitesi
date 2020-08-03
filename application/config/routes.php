<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Front';
$route['detay'] = 'Front/blog_content';

/* ADMIN ROUTE */
$route['admin/anasayfa'] = 'Back';
$route['admin/icerik/ekle'] = 'Back/icerikEkle';
$route['admin/icerik/listele'] = 'Back/icerikListe';
/* ADMIN ROUTE */

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
