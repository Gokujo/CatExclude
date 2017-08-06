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

function showRow($title = "", $description = "", $field = "") {
	echo "<tr><td class=\"col-xs-10 col-sm-6 col-md-7\"><h6>{$title}</h6><span class=\"note large\">{$description}</span></td><td class=\"col-xs-2 col-md-5 settingstd\">{$field}</td></tr>";
}
function showRowID($title = "", $description = "", $field = "", $id = "") {
	echo "<tr id=\"{$id}\"><td class=\"col-xs-10 col-sm-6 col-md-7\"><h6>{$title}</h6><span class=\"note large\">{$description}</span></td><td class=\"col-xs-2 col-md-5 settingstd\">{$field}</td></tr>";
}
function showRow2($title = "", $description = "", $field = "") {
	echo "<tr><td colspan=\"2\" class=\"col-xs-10 col-sm-6 col-md-7\"><h6>{$title}</h6><span class=\"note large\">{$description}</span></td></tr>";
}
function showInput($name, $value) {
	return "<input type=text style=\"width: 400px;text-align: center;\" name=\"save_con[{$name}]\" value=\"{$value}\" size=20>";
}
function showTextArea($name, $value) {
	return "<textarea style=\"width:100%;height:100px;\" name=\"save_con[{$name}]\">{$value}</textarea>";
}
function makeCheckBox($name, $selected, $flag = true, $id = "") {
	$selected = $selected ? "checked" : "";
	if($flag)
		echo "<input id=\"{$id}\" class=\"iButton-icons-tab\" type=\"checkbox\" name=\"$name\" value=\"1\" {$selected}>";
	else
		return "<input id=\"{$id}\" class=\"iButton-icons-tab\" type=\"checkbox\" name=\"$name\" value=\"1\" {$selected}>";
}
function DeleteBox($name) {
	echo "<input type=\"checkbox\" name=\"{$name}\" value=\"0\">";
	}
function showForm($title = "", $field = "") {
	echo "<div class=\"form-group\"><label class=\"control-label col-xs-2\">{$title}</label><div class=\"col-xs-10\">{$field}</div></div>";
}
function makeDropDown($value, $name, $selected) {
	$output = "<select class=\"uniform\" name=\"save_con[$name]\">\r\n";
	foreach ( $value as $values => $description ) {
		$output .= "<option value=\"{$values}\"";
		if( $selected == $values ) {
			$output .= " selected ";
		}
		$output .= ">$description</option>\n";
	}
	$output .= "</select>";
	return $output;
}
function makeDropDownID($value, $name, $selected) {
	$output = "<select id=\"{$name}\" class=\"uniform\" name=\"save_con[$name]\">\r\n";
	foreach ( $value as $values => $description ) {
		$output .= "<option value=\"{$values}\"";
		if( $selected == $values ) {
			$output .= " selected ";
		}
		$output .= ">$description</option>\n";
	}
	$output .= "</select>";
	return $output;
}
function boxInfo($title, $text, $link = "") {
echo "
<div class=\"container padded-right\">
	<div class=\"box\">
		<div class=\"box-header\">
			<div class=\"title\">{$title}</div>
		</div>
		<div class=\"box-content\">
			<div class=\"row box-section\">
				<table width=\"100%\">
					<tbody>
						<tr>
							<td height=\"100\" class=\"text-center settingstd\">{$text}</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class=\"row box-section\">
				<div class=\"col-md-12 text-center\">
					{$link}
				</div>
			</div>
		</div>
	</div>
</div>";
}
function boxItem($id, $title, $icon, $name){
	echo "<li style=\"min-width:90px;\"><a href=\"javascript:ChangeOption('{$id}');\" class=\"tip\" title=\"{$title}\" data-original-title=\"{$title}\"><i class=\"{$icon}\"></i><span>{$name}</span></a></li>";
}
function boxButton($link, $title, $icon, $name){
	echo "<li style=\"min-width:90px;\"><a href=\"{$link}\" class=\"tip\" title=\"{$title}\" data-original-title=\"{$title}\"><i class=\"{$icon}\"></i><span>{$name}</span></a></li>";
}
function boxHeader($title){
	echo "<div class=\"box-header\"><div class=\"title\">{$title}</div></div>";
}
function li($inhalt){
	return "<li>{$inhalt}</li>";
}
?>