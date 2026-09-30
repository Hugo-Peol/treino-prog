# Semana 08 · Índices e desempenho

**Banco:** `clinica` · **Nível:** Intermediário

Banco `clinica`, turbinado. Com 250 consultas tudo é rápido; esta semana você gera volume para ver índice fazendo diferença.

Cerca de 1h por dia. Todo `.php` começa vazio e abre a própria conexão PDO, escrita à mão. Exercícios marcados **(pleno)** são de nível pleno: tente, e se travar, siga e volte depois.

## Segunda

- [ ] **1.** **(pleno)** Gere 300 mil consultas falsas com `INSERT ... SELECT` e `generate_series`, distribuídas entre os profissionais e pacientes existentes. Rode `ANALYZE` no fim.
  Arquivos: `segunda/01-gerar-volume.sql`, `segunda/01-rodar.php`
- [ ] **2.** `EXPLAIN ANALYZE` de "consultas de um paciente". Anote o tipo de busca (Seq Scan) e o tempo.
  Arquivos: `segunda/02-explain-sem-indice.md`
- [ ] **3.** Crie o índice e rode de novo. Anote o novo plano e o tempo.
  Arquivos: `segunda/03-indice-paciente.sql`

## Terça

- [ ] **4.** Índice composto `(profissional_id, inicio)`. Teste uma consulta que filtra só por `profissional_id` e outra só por `inicio`. Pronto quando explicar por que a ordem das colunas importa.
  Arquivos: `terca/01-composto.md`
- [ ] **5.** Índice parcial só das consultas `agendada`. Compare o tamanho dele com um índice completo (`pg_relation_size`).
  Arquivos: `terca/02-parcial.sql`
- [ ] **6.** `ILIKE '%silva%'` no nome do paciente não usa índice comum. Explique por quê e pesquise `pg_trgm`.
  Arquivos: `terca/03-like-e-indice.md`

## Quarta

- [ ] **7.** Função no `WHERE` mata o índice: compare `WHERE DATE(inicio) = '2026-03-10'` com `WHERE inicio >= ... AND inicio < ...`.
  Arquivos: `quarta/01-funcao-no-where.md`
- [ ] **8.** Índice deixa escrita mais lenta: meça o tempo de inserir 50 mil linhas com e sem 3 índices extras.
  Arquivos: `quarta/02-custo-escrita.php`
- [ ] **9.** Paginação: compare `OFFSET 250000` com paginação por cursor (`WHERE id < :ultimo`).
  Arquivos: `quarta/03-offset-vs-cursor.md`

## Quinta

- [ ] **10.** **(pleno)** N+1 visto do banco: em PHP, liste 200 consultas e, dentro do laço, busque o nome do paciente (201 queries). Depois faça com `JOIN` (1 query). Meça o tempo dos dois.
  Arquivos: `quinta/01-n-mais-um.php`
- [ ] **11.** Encontre índices que não são usados (`pg_stat_user_indexes`, `idx_scan = 0`).
  Arquivos: `quinta/02-indices-sem-uso.php`
- [ ] **12.** Escreva numa nota o seu checklist de "consulta lenta": o que olha primeiro, segundo e terceiro.
  Arquivos: `quinta/03-checklist-lentidao.md`

## Sexta

- [ ] **13.** De memória: conexão + `EXPLAIN ANALYZE` de uma consulta, imprimindo o plano pelo PHP.
  Arquivos: `sexta/01-de-memoria.php`
- [ ] **14.** Apague o volume gerado (`DELETE` + `VACUUM`) ou recarregue `clinica.sql`.
  Arquivos: `sexta/02-limpar.sql`

## Revisão de sexta, em voz alta e sem olhar

- [ ] O que é Seq Scan vs Index Scan
- [ ] Por que a ordem do índice composto importa
- [ ] Por que função no `WHERE` atrapalha
- [ ] Custo do índice na escrita
- [ ] O que é N+1

Errou alguma? Releia a seção correspondente em `aula-sql/aula-sql-junior.md`.

## Desafio do fim de semana

**A consulta está lenta**: veja `desafio/README.md`.
