# Semana 03 · Agregação

**Banco:** `loja` · **Nível:** Base

Banco `loja`. Somar, contar, agrupar e fazer relatório.

Cerca de 1h por dia. Todo `.php` começa vazio e abre a própria conexão PDO, escrita à mão. Exercícios marcados **(pleno)** são de nível pleno: tente, e se travar, siga e volte depois.

## Segunda

- [ ] **1.** Quantidade de pedidos por status.
  Arquivos: `segunda/01-por-status.php`
- [ ] **2.** Valor total vendido (soma de quantidade vezes preço unitário), sem contar pedidos cancelados, em reais.
  Arquivos: `segunda/02-total-vendido.php`
- [ ] **3.** Ticket médio por pedido (sem cancelados). Pronto quando você calcular o total por pedido antes de fazer a média.
  Arquivos: `segunda/03-ticket-medio.php`

## Terça

- [ ] **4.** Total vendido por categoria, do maior para o menor.
  Arquivos: `terca/01-por-categoria.php`
- [ ] **5.** Clientes que gastaram mais de R$ 500 (`HAVING`).
  Arquivos: `terca/02-mais-de-500.php`
- [ ] **6.** Os 3 produtos mais vendidos em quantidade.
  Arquivos: `terca/03-top3-quantidade.php`

## Quarta

- [ ] **7.** Vendas por mês de 2026 (`DATE_TRUNC('month', criado_em)`).
  Arquivos: `quarta/01-por-mes.php`
- [ ] **8.** Classifique os produtos com `CASE`: "barato" até R$ 50, "médio" até R$ 150, "caro" acima; conte quantos em cada faixa.
  Arquivos: `quarta/02-faixas-case.php`
- [ ] **9.** Numa linha só: total de pedidos, quantos pagos, quantos cancelados (`COUNT(*) FILTER (WHERE ...)`).
  Arquivos: `quarta/03-filter.php`

## Quinta

- [ ] **10.** Por UF: número de clientes, número de pedidos e valor total. Pronto quando UF sem pedido aparecer com zero.
  Arquivos: `quinta/01-por-uf.php`
- [ ] **11.** Taxa de cancelamento em porcentagem, com uma casa decimal. Pronto quando não der divisão inteira (dica: `100.0 *`).
  Arquivos: `quinta/02-taxa-cancelamento.php`
- [ ] **12.** Explique numa nota a regra: todo campo no `SELECT` que não está numa função de agregação precisa estar no `GROUP BY`. Dê um exemplo que dá erro.
  Arquivos: `quinta/03-regra-group-by.md`

## Sexta

- [ ] **13.** De memória: conexão + relatório de total por categoria com `HAVING`.
  Arquivos: `sexta/01-de-memoria.php`
- [ ] **14.** Exporte o relatório de vendas por mês para um arquivo CSV com `fputcsv`.
  Arquivos: `sexta/02-exportar-csv.php`

## Revisão de sexta, em voz alta e sem olhar

- [ ] `WHERE` vs `HAVING`
- [ ] Regra do `GROUP BY`
- [ ] O que é `FILTER`
- [ ] Divisão inteira no SQL
- [ ] Como calcular ticket médio certo

Errou alguma? Releia a seção correspondente em `aula-sql/aula-sql-junior.md`.

## Desafio do fim de semana

**Relatório de vendas**: veja `desafio/README.md`.
