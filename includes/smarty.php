<?php 
define('SMARTY_DIR','./libs/');
define('TEMPL_DIR','./smarty/');
require(SMARTY_DIR.'Smarty.class.php');
$smarty = new Smarty;

$smarty->template_dir = TEMPL_DIR.'templates/';
$smarty->compile_dir = TEMPL_DIR.'templates_c/';
$smarty->config_dir = TEMPL_DIR.'configs/';
$smarty->cache_dir = TEMPL_DIR.'cache/';

$smarty->debugging = true;
$smarty->caching = true;
$smarty->cache_lifetime = 120;
?>