<?php
// Refatore para PHP 8 com tipos, sem mudar o comportamento.
// Escreva primeiro um teste que prove que o resultado é o mesmo.

function calc($itens, $cupom, $cliente)
{
    $t = 0;
    foreach ($itens as $i) {
        $t = $t + $i['preco'] * $i['qtd'];
    }
    if ($cupom != null) {
        if ($cupom['tipo'] == 'p') {
            $t = $t - $t * $cupom['valor'] / 100;
        } else {
            $t = $t - $cupom['valor'];
        }
    }
    if ($cliente['tipo'] == 'vip') {
        $t = $t * 0.95;
    }
    if ($t < 0) $t = 0;
    if ($t > 200) {
        $frete = 0;
    } else {
        $frete = 15;
    }
    return array('total' => round($t + $frete, 2), 'frete' => $frete);
}
