<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
chdir(__DIR__);
ini_set('default_charset', 'UTF-8');
ini_set('display_errors', '1');
require_once 'vendor/autoload.php';
# set the url of the server
# $url = 'http://localhost/OrrCodeIgniter_3/index.php/RPCServer';
# $url = 'http://10.1.16.4/OrrCodeIgniter_3/index.php/RPCServer';
$url = 'http://10.1.99.19/OrrCodeIgniter_3/index.php/RPCServer';
# create our client object, passing it the server url
$Client = new JsonRpc\Client($url);
# set up our rpc call with a method and params
$method = 'divide';
$params = array(42, 0);
$success = false;
$success = $Client->call($method, $params);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>JSON-RPC Client</title>
    </head>
    <body>
        <?php
        echo '<form method="GET">';
        echo '<input type="submit" value="Run Example"> Last run: ' . date(DATE_RFC822);
        echo '</form>';
        echo '<pre>';

        echo '<b>return:</b> ';
        echo $success ? 'true' : 'false';
        echo '<br /><br />';

        echo '<b>result:</b> ', print_r($Client->result, 1);
        echo '<br /><br />';

        echo '<b>batch:</b> ', print_r($Client->batch, 1);
        echo '<br /><br />';

        echo '<b>error:</b> ', $Client->error;
        echo '<br /><br />';

        echo '<b>output:</b> ', $Client->output;
        ?>
    </body>
</html>
