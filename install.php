<?php

$codename = "catexclude";

define('DATALIFEENGINE', true);
define('ROOT_DIR', dirname (__FILE__));
define('ENGINE_DIR', ROOT_DIR.'/engine');
define('INC_DIR', ENGINE_DIR.'/inc');

require_once ENGINE_DIR.'/classes/mysql.php';
require_once INC_DIR.'/include/functions.inc.php';
include ENGINE_DIR.'/data/dbconfig.php';
include ENGINE_DIR.'/data/config.php';
require_once (ENGINE_DIR . '/inc/'.$codename.'/version.php');

if ($_REQUEST['do'] == 'install') {

	$db->query("INSERT INTO " .PREFIX . "_admin_sections (`name`, `title`, `descr`, `icon`, `allow_groups`) VALUES ('{$codename}', '{$name} v{$version}', '{$descr}', '{$codename}.png', '1')");

$content = <<<HTML
Установка завершена


	<script>
		setTimeout(function() { 
			window.close();
		}, 600);
	</script>
HTML;

} else {

$content = <<<HTML
<!DOCTYPE html>
	<!--[if lt IE 7 ]><html class="ie ie6 lte9 lte8 lte7" lang="ru"><![endif]-->
	<!--[if IE 7 ]><html class="ie ie7 lte9 lte8 lte7" lang="ru"><![endif]-->
	<!--[if IE 8 ]><html class="ie ie8 lte9 lte8" lang="ru"><![endif]-->
	<!--[if IE 9 ]><html class="ie ie9 lte9" lang="ru"><![endif]-->
	<!--[if gt IE 9]><!--><html class="" lang="ru"><!--<![endif]-->
	<head>
		<meta name='copyright' content='Copyright 2017. Maxim Harder. All rights reserved'>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta http-equiv="Cache-Control" content="no-cache">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Установка хака: {$name}</title>
		<link rel="stylesheet" href="http://static.maxim-harder.de/extra/jquery-ui/jquery-ui.min.css">
		<link href="http://static.maxim-harder.de/css/bootstrap-flat-green.min.css" rel="stylesheet">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="http://static.maxim-harder.de/docs/js/html5shiv.js"></script>
			<script src="http://static.maxim-harder.de/docs/js/respond.min.js"></script>
		<![endif]-->
		<style>
			a {border-bottom:1px dotted black;}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="jumbotron">
				<h1>Установка</h1>
				<p>
					<ul class="list-group">
						<li class="list-group-item"><a href="/install.php?do=install" target="_blank">Устанавливаем модуль <i class="fa fa-external-link" aria-hidden="true"></i></a></li>
						<li class="list-group-item">Открываем <b>engine/inc/include/functions.inc.php</b>, после <pre><code>if( ! defined( 'DATALIFEENGINE' ) ) {
	die( "Hacking attempt!" );
}</code></pre><br>добавляем <pre><code>require_once ENGINE_DIR . '/data/catexclude.php';</code></pre><br></li>
						<li class="list-group-item">После <pre><code>global \$cat, \$cat_parentid, \$member_id, \$user_group, \$mod</code></pre> добавляем <pre><code>, \$catexcl</code></pre></li>
						<li class="list-group-item">Ищем <pre><code>if( \$mod != "usergroup" ) {
			
			\$not_allow_list = explode( ',', \$user_group[\$member_id['user_group']]['not_allow_cats'] );
			
		} else \$not_allow_list = array();</code></pre> и меняем его на <pre><code>	if (\$catexcl['onof']) {
		\$mhnc = explode(",",\$catexcl['catid']);
		foreach(\$mhnc as \$cid) \$nc[] = \$cid;
		\$not_allow_list = \$nc;
	} else {
		if( \$mod != "usergroup" ) {
			
			\$not_allow_list = explode( ',', \$user_group[\$member_id['user_group']]['not_allow_cats'] );
			
		} else \$not_allow_list = array();
	}</code></pre></li>
						<li class="list-group-item"><a href="{$config['http_home_url']}{$config['admin_path']}?mod={$codename}" target="_blank">Открываем админку <i class="fa fa-external-link" aria-hidden="true"></i></a> и настраиваем.</li>
					</ul>
				</p>
			</div>
		</div>

		<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
		<script src="http://static.maxim-harder.de/extra/jquery-ui/jquery-ui.min.js"></script>
		<script src="http://static.maxim-harder.de/js/bootstrap.min.js"></script>
		<script src="http://static.maxim-harder.de/extra/bootstrap-switch/bootstrap-switch.js"></script>
		<script>$("input.bs-switch").bootstrapSwitch();</script>
	</body>
</html>
HTML;
}
echo $content;
?>