# Aula de SQL para júnior (com PDO na mão)

Tudo que um júnior precisa de SQL para trabalhar e passar em teste técnico, com as partes de nível pleno marcadas. Os exemplos usam PostgreSQL e os bancos de treino da pasta `plano-sql-12-semanas/dados`. Os exercícios ficam no plano de 12 semanas.

## A conexão, escrita à mão toda vez

No plano, todo arquivo de exercício abre a própria conexão, sem `include` de arquivo pronto. É repetitivo de propósito: em entrevista você vai precisar escrever isso sem consultar.

```php
<?php

declare(strict_types=1);

$pdo = new PDO(
    'pgsql:host=localhost;port=5434;dbname=loja', // tipo:host;porta;banco
    'treino',                                     // usuário
    'treino',                                     // senha (só porque é banco local de treino)
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,        // erro vira exceção
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,   // linhas como array associativo
        PDO::ATTR_EMULATE_PREPARES => false,                // prepared statement de verdade no banco
    ]
);

$stmt = $pdo->prepare('SELECT nome, cidade FROM clientes WHERE uf = :uf ORDER BY nome');
$stmt->execute(['uf' => $argv[1] ?? 'SC']);

foreach ($stmt->fetchAll() as $linha) {
    echo "{$linha['nome']} ({$linha['cidade']})" . PHP_EOL;
}
```

Em projeto real, usuário e senha vêm de variável de ambiente (`getenv('DB_PASSWORD')`), nunca escritos no código.

## Como o banco lê um SELECT

Você escreve numa ordem, o banco executa em outra. Saber isso explica metade dos erros.

1. `FROM` e `JOIN`: monta as linhas.
2. `WHERE`: filtra linhas.
3. `GROUP BY`: agrupa.
4. `HAVING`: filtra grupos.
5. `SELECT`: calcula as colunas (e os apelidos nascem aqui).
6. `ORDER BY`: ordena (aqui o apelido já existe).
7. `LIMIT` e `OFFSET`: corta.

Por isso um apelido criado no `SELECT` não funciona no `WHERE`, mas funciona no `ORDER BY`.

## Filtros e o NULL

- `WHERE uf = 'SC' AND ativo`, `OR`, `NOT`, e parênteses quando misturar `AND` com `OR`.
- `IN ('pago', 'enviado')`, `BETWEEN 10 AND 20` (inclui as duas pontas).
- `LIKE 'Ana%'` diferencia maiúscula; `ILIKE` (Postgres) não diferencia. `%` é qualquer sequência, `_` é um caractere.
- **NULL é "não sei"**. Qualquer comparação com NULL dá NULL, que o `WHERE` trata como falso. Use `IS NULL` e `IS NOT NULL`. `COALESCE(telefone, 'sem telefone')` troca NULL por um valor.
- Datas: prefira `criado_em >= '2026-03-01' AND criado_em < '2026-04-01'`. Com `BETWEEN` e `TIMESTAMP`, o último dia fica só até meia-noite.

## JOINs

| Tipo | Devolve |
| --- | --- |
| `INNER JOIN` | Só as linhas que têm par dos dois lados |
| `LEFT JOIN` | Todas da esquerda; da direita vem NULL quando não tem par |
| `RIGHT JOIN` | O espelho do LEFT (quase ninguém usa: inverta as tabelas) |
| `FULL JOIN` | Todas dos dois lados |

```sql
-- clientes que nunca compraram (anti-join)
SELECT c.nome
FROM clientes c
LEFT JOIN pedidos p ON p.cliente_id = c.id
WHERE p.id IS NULL;
```

Armadilha clássica: condição da tabela da direita no `WHERE` transforma o `LEFT` em `INNER`, porque as linhas com NULL são descartadas. Se a intenção é filtrar só o que vem da direita, coloque a condição no `ON`:

```sql
SELECT c.nome, p.id
FROM clientes c
LEFT JOIN pedidos p ON p.cliente_id = c.id AND p.status = 'entregue';
```

Outra armadilha: `JOIN` com tabela "de muitos" multiplica linhas. Somar o total do pedido depois de juntar com os itens E com outra tabela de muitos soma em dobro.

## Agregação

- `COUNT(*)` conta linhas; `COUNT(coluna)` conta só as não nulas. Depois de um `LEFT JOIN`, use `COUNT(p.id)` para quem não tem par dar zero.
- `SUM`, `AVG`, `MIN`, `MAX` ignoram NULL.
- **Regra do GROUP BY:** toda coluna do `SELECT` fora de função de agregação precisa estar no `GROUP BY`.
- `WHERE` filtra antes de agrupar; `HAVING` filtra depois (`HAVING SUM(total) > 500`).
- `CASE WHEN ... THEN ... ELSE ... END` cria categorias.
- `COUNT(*) FILTER (WHERE status = 'pago')` conta só uma parte, na mesma linha.
- Divisão de inteiros dá inteiro: `3 / 4` é `0`. Use `100.0 * a / b` ou `::numeric`. E `NULLIF(b, 0)` evita divisão por zero.

```sql
SELECT DATE_TRUNC('month', p.criado_em) AS mes,
       COUNT(DISTINCT p.id) AS pedidos,
       SUM(i.quantidade * i.preco_unitario_centavos) / 100.0 AS faturamento_reais
FROM pedidos p
JOIN itens_pedido i ON i.pedido_id = p.id
WHERE p.status <> 'cancelado'
GROUP BY mes
ORDER BY mes;
```

## Subconsultas

- **Escalar** (devolve um valor): `WHERE valor > (SELECT AVG(valor) FROM notas)`.
- **Com `IN`**: `WHERE id IN (SELECT aluno_id FROM notas WHERE valor < 5)`.
- **Com `EXISTS`**: pergunta "existe pelo menos um?". Costuma ser a forma mais clara de anti-join com `NOT EXISTS`.
- **Correlacionada**: a subconsulta usa uma coluna da consulta de fora e roda "para cada linha".
- **Tabela derivada**: subconsulta no `FROM`, com apelido obrigatório.
- **Cuidado:** `NOT IN (subconsulta)` devolve zero linhas se a subconsulta tiver um NULL. Prefira `NOT EXISTS`.

## Criar tabelas e restrições

```sql
CREATE TABLE pedidos (
    id SERIAL PRIMARY KEY,
    cliente_id INTEGER NOT NULL REFERENCES clientes(id),
    status TEXT NOT NULL DEFAULT 'pendente' CHECK (status IN ('pendente', 'pago', 'cancelado')),
    total_centavos INTEGER NOT NULL CHECK (total_centavos >= 0),
    criado_em TIMESTAMPTZ NOT NULL DEFAULT NOW()
);

CREATE INDEX pedidos_cliente_idx ON pedidos (cliente_id);
```

- **PK**: única e não nula. **UNIQUE**: única, pode ser nula. Pode ser composta: `UNIQUE (codigo, ano)`.
- **FK** e o que acontece ao apagar o pai: padrão (`NO ACTION`/`RESTRICT`) recusa; `CASCADE` apaga os filhos; `SET NULL` deixa o filho órfão com NULL.
- **CHECK** garante regra no banco, mesmo que o código esqueça.
- O Postgres **não cria índice em FK sozinho**. Crie, porque quase toda FK é usada em `JOIN`.
- Tipos: `TEXT` para texto; `INTEGER`/`BIGINT`; dinheiro em centavos (`INTEGER`) ou `NUMERIC(12,2)`, nunca `REAL`/`FLOAT`; `DATE` para data; `TIMESTAMPTZ` para momento no tempo.
- `ALTER TABLE ... ADD COLUMN`, `ALTER COLUMN ... SET NOT NULL` (falha se já houver NULL), `DROP COLUMN`.

## Inserir, alterar, apagar

- `INSERT ... RETURNING id` devolve o id criado na mesma ida ao banco.
- `INSERT ... SELECT` copia de uma consulta.
- `UPDATE tabela SET ... FROM outra WHERE ...` atualiza usando outra tabela.
- `INSERT ... ON CONFLICT (colunas) DO UPDATE SET ...` é o upsert.
- **Hábito que salva empregos:** antes de todo `UPDATE` ou `DELETE`, rode o `SELECT` com o mesmo `WHERE` e confira quantas linhas vêm. Em produção, dentro de uma transação, e só dê `COMMIT` se o número bater.

## Transações

Um grupo de comandos que acontece inteiro ou não acontece.

- **A**tomicidade: tudo ou nada.
- **C**onsistência: as restrições continuam valendo no fim.
- **I**solamento: transações ao mesmo tempo não enxergam o que a outra ainda não confirmou.
- **D**urabilidade: confirmou, está gravado, mesmo se o servidor cair.

```php
try {
    $pdo->beginTransaction();
    $pdo->prepare('UPDATE contas SET saldo = saldo - :v WHERE id = :de')->execute(['v' => 5000, 'de' => 1]);
    $pdo->prepare('UPDATE contas SET saldo = saldo + :v WHERE id = :para')->execute(['v' => 5000, 'para' => 2]);
    $pdo->commit();
} catch (Throwable $e) {
    $pdo->rollBack();
    throw $e;
}
```

**Concorrência** (vale ouro em entrevista): "ler, calcular no PHP e gravar" perde atualização quando duas pessoas fazem ao mesmo tempo. Soluções: fazer a conta no próprio `UPDATE` (`SET estoque = estoque - 1 WHERE id = ? AND estoque > 0`) e conferir `rowCount()`, ou travar a linha com `SELECT ... FOR UPDATE` dentro da transação.

## Índices e desempenho

- Índice é como o índice de um livro: acha rápido sem ler tudo. Custa espaço e deixa a escrita mais lenta.
- `EXPLAIN ANALYZE consulta` mostra o plano. `Seq Scan` lê a tabela inteira; `Index Scan` usa índice.
- **Índice composto** `(a, b)` serve para filtro em `a` e em `a e b`, mas não só em `b`.
- **Função na coluna mata o índice:** `WHERE DATE(criado_em) = ...` não usa o índice de `criado_em`; use intervalo.
- `LIKE 'abc%'` pode usar índice; `LIKE '%abc%'` não (precisa de `pg_trgm`).
- **Índice parcial** (`WHERE status = 'agendada'`) é menor e mais rápido quando você sempre filtra por aquilo.
- **N+1**: uma consulta para a lista e mais uma para cada item. Resolva com `JOIN` ou buscando tudo de uma vez com `IN`.

## Datas

- `TIMESTAMPTZ` guarda um momento absoluto (em UTC por dentro); `TIMESTAMP` guarda "data e hora de parede" sem fuso. Para eventos, use `TIMESTAMPTZ`.
- `NOW()`, `INTERVAL '30 days'`, `AGE(data)`, `EXTRACT(YEAR FROM data)`, `DATE_TRUNC('month', data)`.
- `data AT TIME ZONE 'America/Sao_Paulo'` converte para o horário local.
- `generate_series('2026-02-01'::date, '2026-02-28', '1 day')` cria uma linha por dia, útil para mostrar dias com zero.
- Sobreposição de períodos: `a.inicio < b.fim AND b.inicio < a.fim`.

## Nível pleno: CTE e window functions

**CTE** (`WITH`) dá nome a etapas e deixa a consulta legível. `WITH RECURSIVE` percorre hierarquias (organograma, categorias dentro de categorias).

**Window functions** calculam algo olhando outras linhas **sem juntar** as linhas como o `GROUP BY` faz.

```sql
-- consulta mais recente de cada paciente
WITH numeradas AS (
    SELECT c.*,
           ROW_NUMBER() OVER (PARTITION BY paciente_id ORDER BY inicio DESC) AS n
    FROM consultas c
)
SELECT * FROM numeradas WHERE n = 1;
```

- `ROW_NUMBER()` numera sem empate; `RANK()` dá empate e pula (1, 1, 3); `DENSE_RANK()` dá empate sem pular (1, 1, 2).
- `SUM(x) OVER (ORDER BY mes)` é acumulado; `AVG(x) OVER (ORDER BY mes ROWS BETWEEN 2 PRECEDING AND CURRENT ROW)` é média móvel.
- `LAG(x)` pega o valor da linha anterior; `LEAD(x)`, da próxima.
- No Postgres, `DISTINCT ON (paciente_id) ... ORDER BY paciente_id, inicio DESC` é um atalho para "o primeiro de cada grupo".

## Segurança no SQL

- **Prepared statement sempre** para valores que vêm de fora. Nunca concatene.
- Nome de coluna ou direção de ordenação não podem ser parâmetro: valide contra uma lista fixa (`in_array($ordem, ['nome', 'criado_em'], true)`).
- Usuário de banco da aplicação com o mínimo de permissão; usuário de relatório só com `SELECT`.
- Não logue consultas com dados pessoais.

## Perguntas que mais caem

1. Ordem de execução do `SELECT`.
2. `INNER` vs `LEFT JOIN`, e como achar quem não tem par.
3. `WHERE` vs `HAVING`.
4. Por que `= NULL` não funciona.
5. O que é transação e ACID.
6. O que é índice, quando criar, qual o custo.
7. Como pegar o registro mais recente de cada grupo.
8. O que é SQL injection e como evitar.
9. Como investigar uma consulta lenta.
10. O que é N+1.
