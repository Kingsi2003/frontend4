<?php
//client



$client = new WebSocket\Client("ws://echo.websocket.org/");
$client->text("Hello WebSocket.org!");
echo $client->receive();
$client->close();



//server


$server = new WebSocket\Server();
$server->accept();
$message = $server->receive();
$server->text($message);
$server->close();