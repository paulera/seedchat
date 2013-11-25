<?php
$username = filter($_GET["username"]);
$message = filter($_GET["message"]);

if (false) {
	$message = "mensagens temporariamente desabilitadas, ate que os usuarios se comportem";
}

$chatTag = formatChatTag($username, $message);


$fh = fopen('chat.html', 'a');
fwrite($fh, $chatTag);
fclose($fh);


function formatChatTag($username, $message) {
	/* stamp antigo: "Y-m-d H:i:s" */
	$stamp = date("H:i:s");
	$result = '<p class="chattag"><span class="timestamp">'.$stamp.'</span> <span class="username">'.$username.'</span><span class="2p">: </span><span class="message">'.$message.'</span></p>'."\n";
	return $result;
}

function filter($value) {
	$result = htmlentities($value);
	return $result;
}
