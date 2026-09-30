<?php
// legado.php - relatório de pedidos de um cliente, com desconto VIP
// Funciona. Foi escrito em 2014. Refatore sem mudar o comportamento.

$con = mysqli_connect("localhost", "root", "root", "loja");

$cliente = $_GET['cliente'];
$res = mysqli_query($con, "SELECT * FROM clientes WHERE id = " . $cliente);
$c = mysqli_fetch_assoc($res);

$pedidos = mysqli_query($con, "SELECT * FROM pedidos WHERE cliente_id = " . $cliente . " ORDER BY data DESC");

$total = 0;
echo "<h1>Pedidos de " . $c['nome'] . "</h1>";
echo "<table>";
while ($p = mysqli_fetch_assoc($pedidos)) {
    $valor = $p['valor'];
    if ($c['vip'] == "1") {
        $valor = $valor - ($valor * 0.10);
    }
    if ($p['status'] == 0) {
        $st = "pendente";
    } else if ($p['status'] == 1) {
        $st = "pago";
    } else {
        $st = "cancelado";
    }
    if ($st != "cancelado") {
        $total = $total + $valor;
    }
    echo "<tr><td>" . $p['id'] . "</td><td>" . $p['data'] . "</td><td>" . $st . "</td><td>R$ " . number_format($valor, 2, ',', '.') . "</td></tr>";
}
echo "</table>";
echo "<p>Total: R$ " . number_format($total, 2, ',', '.') . "</p>";

if ($c['vip'] == "1") {
    echo "<p>Cliente VIP: 10% de desconto aplicado</p>";
}
