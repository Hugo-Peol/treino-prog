<?php

declare(strict_types=1);

require_once __DIR__ . '/01-StatusPedido.php';

class Pedido
{
    public function __construct(
        public readonly int $id,
        public readonly int $total,
        public readonly StatusPedido $status
    ) {}
}

$pedido = new Pedido(1, 100, StatusPedido::Pago);

try {
    $pedido->total = 10;
    echo 'ERRO: conseguiu alterar o total' . PHP_EOL;
} catch (Error $e) {
    echo 'OK, bloqueou: ' . $e->getMessage() . PHP_EOL;
}
