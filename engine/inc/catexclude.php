<?php
//////////////////////////////////////
//									//
//	Исключаем категории из списков	//
//	Автор хака: Максим Гардер		//
//	URL: http://maxim-harder.de/	//
//	email: info@maxim-harder.de 	//
//	Telegram: @MaHarder 			//
//									//
//////////////////////////////////////

if( !defined( 'DATALIFEENGINE' ) ) die( "Oh! You little bastard!" );

$codename = "catexclude";

@include (ENGINE_DIR . '/data/'.$codename.'.php');
require_once (ENGINE_DIR . '/inc/'.$codename.'/functions.php');
require_once (ENGINE_DIR . '/inc/'.$codename.'/version.php');
	
$_for = $_REQUEST['action'];

if($_for == "save"){
	$save_con = $_REQUEST['save_con'];
	$handler = fopen(ENGINE_DIR . '/data/'.$codename.'.php', "w");

	$save_con['catid'] = str_replace(array(" ", ", "), "", $save_con['catid']);

	fwrite($handler, "<?PHP \n\n//	{$name} v{$version} by Maxim Harder\n\n\$catexcl = array (\n");
	foreach ($save_con as $name => $value) {
		fwrite($handler, "'{$name}' => \"{$value}\",\n");
	}
	fwrite($handler, ");\n\n?>");
	fclose($handler);

	msg( "info", "Сохранение настроек", "Настройки успешно сохранены", "?mod={$codename}" );

	clear_cache();
echo <<<HTML
	<script language = 'javascript'>
		var delay = 0;
		setTimeout("document.location.replace('{$PHP_SELF}?mod={$codename}')", delay);
	</script>
HTML;
} else {

echoheader( "<i class=\"icon-cogs\"></i> {$name} v".$version, $descr );

echo <<<HTML
	<form action="{$PHP_SELF}?mod={$codename}&action=save" method="post" class="box">
		<div class="box-header">
			<div class="title">Настройка модуля</div>
		</div>
		<div class="box-content">
			<table class="table table-normal">
HTML;
				showRow("Включить модуль?", "Включаем-выключаем.", makeCheckBox( "save_con[onof]", ($catexcl['onof'] == 1) ? true : false, false ));
				showRow("ID Категорий", "Указываем категории, которые не хотим видеть в выпадающем списке", showInput("catid", $catexcl['catid']));
echo <<<HTML
			</table>
		</div>
		<div class="box-footer padded">
			<input type="submit" class="btn btn-lg btn-green" value="{$lang['user_save']}">
		</div>
	</form>
	<div class="text-center">Copyright 2017 &copy; <a href="http://adf.ly/1n3mRK" target="_blank"><b>Maxim Harder</b></a>. All rights reserved.</div>
HTML;
}

echofooter();

?>