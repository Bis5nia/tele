<?php
require_once __DIR__.'/src/PHPTelebot.php';
require_once __DIR__.'/src/xc.php';
require_once __DIR__.'/src/func.php';

function readToken($input){
    $TOKENr = file_get_contents("Xppai.WRT");
    $raw = explode("\n",$TOKENr);
    $TOKEN = $raw[0];
    $USERNAME = $raw[1];
    if ($input == "token") {
        return $TOKEN;
    }elseif($input == "username"){
        return $USERNAME;
    }
}

$bot = new PHPTelebot(readToken("token"), readToken("username"));

$bot->cmd('/ping','pong');

$bot->cmd('/start', function () {
    return Bot::sendMessage("Users : ".cek_jumlah_pengguna()." /users\nGroups : ".cek_jumlah_group()." /groups\nLogin Log : ".cek_jumlah_login()." /log");
});

$bot->cmd('/users', function () {
    return Bot::sendMessage(user());
});

$bot->cmd('/id', function ($id) {
    return Bot::sendMessage(id($id));
});

$bot->cmd('/buatvoucher', function ($grup) {
    return Bot::sendMessage(buat($grup));
});

$bot->cmd('/log', function () {
    return Bot::sendMessage(login());
});

$bot->run();
