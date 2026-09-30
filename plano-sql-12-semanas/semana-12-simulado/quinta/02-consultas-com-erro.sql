-- Cada consulta tem um erro. Encontre e corrija os 5 (banco loja).

-- 1) Clientes sem telefone
SELECT nome FROM clientes WHERE telefone = NULL;

-- 2) Total gasto por cliente
SELECT c.nome, SUM(i.quantidade * i.preco_unitario_centavos) AS total
FROM clientes c
JOIN pedidos p ON p.cliente_id = c.id
JOIN itens_pedido i ON i.pedido_id = p.id;

-- 3) Categorias com mais de 3 produtos
SELECT categoria_id, COUNT(*) FROM produtos
WHERE COUNT(*) > 3
GROUP BY categoria_id;

-- 4) Todos os clientes e seus pedidos entregues, inclusive quem não tem nenhum
SELECT c.nome, p.id
FROM clientes c
LEFT JOIN pedidos p ON p.cliente_id = c.id
WHERE p.status = 'entregue';

-- 5) Percentual de pedidos cancelados
SELECT COUNT(*) FILTER (WHERE status = 'cancelado') / COUNT(*) * 100 AS percentual
FROM pedidos;
