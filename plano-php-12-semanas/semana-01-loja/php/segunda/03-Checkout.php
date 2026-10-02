<?php

declare(strict_types=1);

require_once __DIR__ . "/03-CalculadoraFrete.php";

class Checkout
{
    public function __construct(
        private readonly CalculadoraFrete $calculadoraFrete
    ) {}

    public function fecharCarrinho(int $valorTotal): int
    {
        return $valorTotal + $this->calculadoraFrete->calcularFrete($valorTotal);
    }
}
