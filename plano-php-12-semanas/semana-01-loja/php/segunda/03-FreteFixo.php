<?php

declare(strict_types=1);

require_once __DIR__ . '/03-CalculadoraFrete.php';

class FreteFixo implements CalculadoraFrete
{
    public function __construct(
        private readonly int $valorFrete = 10
    ) {}

    public function calcularFrete(int $valorTotal): int
    {
        return $this->valorFrete;
    }
}
