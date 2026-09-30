# Semana 02 · JOINs

**Banco:** `loja` · **Nível:** Base

Banco `loja`. Juntar tabelas: o assunto que mais cai em teste.

Cerca de 1h por dia. Todo `.php` começa vazio e abre a própria conexão PDO, escrita à mão. Exercícios marcados **(pleno)** são de nível pleno: tente, e se travar, siga e volte depois.

## Segunda

- [ ] **1.** Pedidos com o nome do cliente (`INNER JOIN`).
  Arquivos: `segunda/01-pedidos-clientes.php`
- [ ] **2.** Produtos com o nome da categoria.
  Arquivos: `segunda/02-produtos-categoria.php`
- [ ] **3.** Itens de um pedido (id por parâmetro) com nome do produto, quantidade, preço unitário e subtotal.
  Arquivos: `segunda/03-itens-pedido.php`

## Terça

- [ ] **4.** Todos os clientes e seus pedidos, inclusive quem nunca comprou (`LEFT JOIN`).
  Arquivos: `terca/01-clientes-left.php`
- [ ] **5.** Só os clientes que nunca compraram (`LEFT JOIN ... WHERE p.id IS NULL`). Pronto quando der 3 clientes.
  Arquivos: `terca/02-nunca-compraram.php`
- [ ] **6.** Produtos que nunca foram vendidos.
  Arquivos: `terca/03-nunca-vendidos.php`

## Quarta

- [ ] **7.** Junte as 5 tabelas: cliente, pedido, item, produto e categoria, numa linha por item.
  Arquivos: `quarta/01-cinco-tabelas.php`
- [ ] **8.** Clientes que compraram algum livro (categoria "Livros"), sem repetir cliente.
  Arquivos: `quarta/02-compraram-livro.php`
- [ ] **9.** Explique numa nota por que o `LEFT JOIN` vira `INNER JOIN` quando você coloca uma condição da tabela da direita no `WHERE`, e como resolver colocando no `ON`.
  Arquivos: `quarta/03-left-where-vs-on.md`

## Quinta

- [ ] **10.** Pedidos de clientes de SC com status `entregue`, mostrando cliente, data e cidade.
  Arquivos: `quinta/01-entregues-sc.php`
- [ ] **11.** Clientes e quantos pedidos cada um fez, incluindo zero. Pronto quando usar `COUNT(p.id)` e explicar por que `COUNT(*)` daria 1 para quem não comprou.
  Arquivos: `quinta/02-contagem-com-zero.php`
- [ ] **12.** Pares de clientes da mesma cidade (self join), sem repetir o par invertido.
  Arquivos: `quinta/03-mesma-cidade.php`

## Sexta

- [ ] **13.** De memória, sem consultar: conexão PDO + um `LEFT JOIN` com prepared statement.
  Arquivos: `sexta/01-de-memoria.php`
- [ ] **14.** Desenhe (pode ser em texto) o que `INNER`, `LEFT`, `RIGHT` e `FULL JOIN` devolvem com duas tabelas pequenas inventadas.
  Arquivos: `sexta/02-desenho-joins.md`

## Revisão de sexta, em voz alta e sem olhar

- [ ] `INNER` vs `LEFT JOIN`
- [ ] Como achar registros sem par
- [ ] `COUNT(*)` vs `COUNT(coluna)`
- [ ] Condição no `ON` vs no `WHERE`
- [ ] O que é self join

Errou alguma? Releia a seção correspondente em `aula-sql/aula-sql-junior.md`.

## Desafio do fim de semana

**JOINs no editor**: veja `desafio/README.md`.
