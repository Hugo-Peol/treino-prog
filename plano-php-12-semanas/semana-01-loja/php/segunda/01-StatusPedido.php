<?php

declare(strict_types=1);

enum StatusPedido: string
{
    case Pendente = 'pendente';
    case Pago = 'pago';
    case Enviado = 'enviado';
    case Cancelado = 'cancelado';

    public function rotulo(): string
    {
        return match($this){
            StatusPedido::Pendente => 'Seu pedido não esta pronto.',
            StatusPedido::Pago => 'O valor do produto já foi pago.',
            StatusPedido::Enviado => 'Seu pedido já foi enviado.',
            StatusPedido::Cancelado => 'Seu pedido foi cancelado.'
        };
    }
}