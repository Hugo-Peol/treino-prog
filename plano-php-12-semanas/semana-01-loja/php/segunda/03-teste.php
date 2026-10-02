<?php

declare(strict_types=1);

require_once __DIR__ . '/03-Checkout.php';
require_once __DIR__ . '/03-FreteGratisAcimaDe.php';
require_once __DIR__ . '/03-CalculadoraFrete.php';
require_once __DIR__ . '/03-FreteFixo.php';

$freteFixo = new FreteFixo(10);
$calculadoraFrete = new FreteGratisAcimaDe();
$teste01 = new Checkout($calculadoraFrete);
$teste02 = new Checkout($freteFixo);

echo $teste02->fecharCarrinho(150);
