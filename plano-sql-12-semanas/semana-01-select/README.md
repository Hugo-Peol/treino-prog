# Semana 01 · SELECT e filtros

**Banco:** `loja` · **Nível:** Base

Banco `loja`. Buscar, filtrar e ordenar. Todo arquivo `.php` abre a própria conexão PDO, escrita à mão.

Cerca de 1h por dia. Todo `.php` começa vazio e abre a própria conexão PDO, escrita à mão. Exercícios marcados **(pleno)** são de nível pleno: tente, e se travar, siga e volte depois.

## Segunda

- [ ] **1.** Conecte no banco `loja` e liste todos os clientes com nome, cidade e UF, em ordem alfabética.
  Arquivos: `segunda/01-clientes.php`
- [ ] **2.** Clientes de Santa Catarina (`uf = 'SC'`), só nome e e-mail.
  Arquivos: `segunda/02-clientes-sc.php`
- [ ] **3.** Clientes sem telefone. Pronto quando você explicar por que `telefone = NULL` não funciona.
  Arquivos: `segunda/03-sem-telefone.php`

## Terça

- [ ] **4.** Produtos com preço entre R$ 50 e R$ 150 (lembre que está em centavos), mostrando o preço em reais com duas casas.
  Arquivos: `terca/01-faixa-preco.php`
- [ ] **5.** Produtos cujo nome contém "livro", sem diferenciar maiúscula (`ILIKE`).
  Arquivos: `terca/02-busca-nome.php`
- [ ] **6.** Os 5 produtos mais caros que estão ativos e com estoque.
  Arquivos: `terca/03-top5-caros.php`

## Quarta

- [ ] **7.** Pedidos com status `pago` ou `enviado` usando `IN`.
  Arquivos: `quarta/01-status-in.php`
- [ ] **8.** Pedidos de março de 2026. Faça com `BETWEEN` e depois com `>=` e `<`. Pronto quando explicar por que a segunda forma é mais segura com `TIMESTAMP`.
  Arquivos: `quarta/02-pedidos-marco.php`
- [ ] **9.** Receba a UF por parâmetro (`$argv[1]`) e busque os clientes com prepared statement. Pronto quando `"SC' OR '1'='1"` não trouxer todo mundo.
  Arquivos: `quarta/03-uf-parametro.php`

## Quinta

- [ ] **10.** Lista das cidades distintas com cliente, em ordem.
  Arquivos: `quinta/01-cidades.php`
- [ ] **11.** Pedidos que usaram cupom, mostrando `COALESCE(cupom, 'sem cupom')` para todos os pedidos.
  Arquivos: `quinta/02-cupom.php`
- [ ] **12.** Paginação: página 2 de clientes com 5 por página (`LIMIT` e `OFFSET`), com o número da página vindo por parâmetro.
  Arquivos: `quinta/03-paginacao.php`

## Sexta

- [ ] **13.** Revisão: reescreva de memória a conexão PDO completa (DSN, usuário, senha, modo de exceção, fetch associativo) sem olhar os arquivos da semana.
  Arquivos: `sexta/01-conexao-de-memoria.php`
- [ ] **14.** Explique numa nota a ordem em que o banco executa: `FROM`, `WHERE`, `SELECT`, `ORDER BY`, `LIMIT`. Por que não dá para usar no `WHERE` um alias criado no `SELECT`?
  Arquivos: `sexta/02-ordem-execucao.md`

## Revisão de sexta, em voz alta e sem olhar

- [ ] Por que `= NULL` não funciona
- [ ] `LIKE` vs `ILIKE`
- [ ] Por que `>=` e `<` com datas
- [ ] O que `OFFSET` faz
- [ ] Para que serve `COALESCE`

Errou alguma? Releia a seção correspondente em `aula-sql/aula-sql-junior.md`.

## Desafio do fim de semana

**Primeira triagem**: veja `desafio/README.md`.
