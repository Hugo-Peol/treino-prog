<?php

declare(strict_types=1);

require_once __DIR__ . '/03-CalculadoraFrete.php';

class FreteGratisAcimaDe implements CalculadoraFrete
{
    public function __construct(
        public readonly int $tetoFrete = 100,
        public readonly int $valorFrete = 10
    ) {}

    private function validarFreteGratis(int $valorTotal): bool
    {
        return $valorTotal > $this->tetoFrete;
    }

    public function calcularFrete(int $valorTotal): int
    {
        return $this->validarFreteGratis($valorTotal) ? 0 : $this->valorFrete;
    }
}
