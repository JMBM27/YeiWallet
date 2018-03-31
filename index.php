<pre><?php

require __DIR__ . '/vendor/autoload.php';

$api_code = 'b0a536e6-56ee-440e-944b-c6a2d7edc3ef';

$Blockchain = new \Blockchain\Blockchain($api_code);
$Blockchain->setServiceUrl('http://localhost:3000/');

$wallet = $Blockchain->Create->create('weakPassword01!','enyelb.gnzlz@gmail.com','Mi Primera Wallet');

var_dump($wallet);

print_r($Blockchain->log);

?></pre>
