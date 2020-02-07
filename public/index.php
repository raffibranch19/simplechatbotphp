<?php

require __DIR__ . '/../vendor/autoload.php';
 
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
 
use \LINE\LINEBot;
use \LINE\LINEBot\HTTPClient\CurlHTTPClient;
use \LINE\LINEBot\MessageBuilder\MultiMessageBuilder;
use \LINE\LINEBot\MessageBuilder\TextMessageBuilder;
use \LINE\LINEBot\MessageBuilder\StickerMessageBuilder;
use \LINE\LINEBot\SignatureValidator as SignatureValidator;

$pass_signature = true;

// set LINE channel_access_token and channel_secret
$channel_access_token = "SAQVWnKjOSsmwCv/u6uJRocdCqQrKUHWNR7JC4DxjjLchPWxHFK1NJmobBvFW7wluZlrqMk3dzPqo2VV2Jzf74LuU52zFBWxsPmtcZ4o/mOb4/vbFUyglzT0txpv1pl9e0ebG/PU8vcgij8Mnr76nQdB04t89/1O/w1cDnyilFU=";
$channel_secret = "fedf1a18e521ddc967a1f808c9c8302f";

// inisiasi objek bot
$httpClient = new CurlHTTPClient($channel_access_token);
$bot = new LINEBot($httpClient, ['channelSecret' => $channel_secret]);
 
$app = AppFactory::create();
$app->setBasePath("/public");
 
$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello World!");
    return $response;
});