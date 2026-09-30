<?php
// bugs.php - relatório de vendas e consulta de pedido
// Relato: "às vezes o relatório mostra total errado, e um cliente disse que viu pedido de outra pessoa".
// Existem 3 bugs. Encontre, reproduza, corrija e prove.

declare(strict_types=1);

function conectar(): PDO
{
    return new PDO('pgsql:host=localhost;dbname=loja', 'treino', 'treino', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
}

/** Total vendido no mês, em reais. Pedidos cancelados não contam. */
function totalDoMes(PDO $pdo, int $ano, int $mes): float
{
    $stmt = $pdo->prepare(
        "SELECT valor, status FROM pedidos
         WHERE criado_em >= :inicio AND criado_em <= :fim"
    );
    $inicio = sprintf('%04d-%02d-01', $ano, $mes);
    $fim = date('Y-m-t', strtotime($inicio)); // último dia do mês
    $stmt->execute(['inicio' => $inicio, 'fim' => $fim]);

    $total = 0.0;
    foreach ($stmt->fetchAll() as $pedido) {
        if ($pedido['status'] !== 'cancelado') {
            $total += (float) $pedido['valor'];
        }
    }

    return $total;
}

/** Média por pedido no mês. */
function ticketMedio(PDO $pdo, int $ano, int $mes, int $quantidadePedidos): float
{
    return totalDoMes($pdo, $ano, $mes) / $quantidadePedidos;
}

/** Mostra um pedido para o cliente logado. */
function verPedido(PDO $pdo, int $clienteLogadoId, int $pedidoId): ?array
{
    $stmt = $pdo->prepare('SELECT * FROM pedidos WHERE id = :id');
    $stmt->execute(['id' => $pedidoId]);
    $pedido = $stmt->fetch();

    return $pedido === false ? null : $pedido;
}

// Uso
$pdo = conectar();
echo 'Total de março: ' . totalDoMes($pdo, 2026, 3) . PHP_EOL;
echo 'Ticket médio: ' . ticketMedio($pdo, 2026, 3, 0) . PHP_EOL;
print_r(verPedido($pdo, 1, 42));
