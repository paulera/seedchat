<?php

$CHATCREATOR_ROOT="/home/paulera/workspace/seedchat";

function listRooms() {
	$dir = new DirectoryIterator(getcwd());
	foreach ($dir as $fileinfo) {
		if ($fileinfo->isDir() && !$fileinfo->isDot()) {
			$dir = $fileinfo->getFilename();
			echo '<a href="/chat/'.$dir.'">'.$dir.'</a>&nbsp;<button type="submit" name="remove" value="'.$dir.'">x</button><br/>';
		}
	}
}

function filter($text) {
	$result = str_replace(" ", "_", $text);
	$result = preg_replace("/[^a-zA-Z0-9_]+/", "", $result);
	return $result;
}

function createRoom($roomName) {
	global $CHATCREATOR_ROOT;
	$roomName = filter($roomName);
	if (isset($roomName) && trim($roomName) != "") {
		echo shell_exec($CHATCREATOR_ROOT."/createroom ".$roomName);
	}
}

function removeRoom($roomName) {
	global $CHATCREATOR_ROOT;
	$roomName = filter($roomName);
	if (isset($roomName) && trim($roomName) != "") {
		echo shell_exec ($CHATCREATOR_ROOT."/removeroom ".$roomName);
	}
}

if (isset($_POST["create"])) {
	createRoom ($_POST["create"]);
}

if (isset($_POST["remove"])) {
	removeRoom ($_POST["remove"]);
}

?>

<html>

<body>

<form id="form" action="." method="POST">
<input type="text" name="create"><input type="submit" value="create">

<p>Open rooms:</p>
<?php listRooms(); ?>

</form>
