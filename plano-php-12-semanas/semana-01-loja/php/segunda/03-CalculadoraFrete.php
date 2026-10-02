<?php

declare(strict_types=1);

interface CalculadoraFrete
{
    public function calcularFrete(int $valorTotal): int;
}
