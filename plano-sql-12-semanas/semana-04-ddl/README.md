# Semana 04 · Criar tabelas e restrições

**Banco:** `escola` · **Nível:** Base

Banco `escola`. Esta semana você CRIA as tabelas a partir da descrição abaixo e depois carrega os dados de `dados/escola-dados.sql`. Se os dados entrarem, sua modelagem está compatível. O gabarito está em `dados/escola-schema-gabarito.sql`: só abra na sexta.

**Descrição do banco:**

- `turmas`: `id`, `codigo` (ex.: 1A), `ano`, `turno` (manhã, tarde ou noite). Não pode repetir código no mesmo ano.
- `professores`: `id`, `nome`, `email` (único).
- `disciplinas`: `id`, `nome` (único), `carga_semanal` (maior que zero).
- `aulas`: `id`, `turma_id`, `disciplina_id`, `professor_id`. Uma disciplina tem um só professor por turma.
- `alunos`: `id`, `nome`, `data_nascimento`, `turma_id`, `email_responsavel` (opcional).
- `notas`: `id`, `aluno_id`, `disciplina_id`, `avaliacao` (ex.: P1), `valor` de 0 a 10 com uma casa decimal, `data_avaliacao`. Não pode ter duas notas da mesma avaliação para o mesmo aluno e disciplina. Apagar o aluno apaga as notas.
- `frequencias`: `aluno_id`, `disciplina_id`, `aulas_dadas`, `presencas`. Chave primária composta. Presenças nunca maiores que aulas dadas.

Cerca de 1h por dia. Todo `.php` começa vazio e abre a própria conexão PDO, escrita à mão. Exercícios marcados **(pleno)** são de nível pleno: tente, e se travar, siga e volte depois.

## Segunda

- [ ] **1.** Escreva o `CREATE TABLE` de `turmas`, `professores` e `disciplinas` com PK, `NOT NULL`, `UNIQUE` e `CHECK`.
  Arquivos: `segunda/01-schema-parte1.sql`
- [ ] **2.** Um PHP que conecta e roda o seu arquivo `.sql` (`$pdo->exec(file_get_contents(...))`).
  Arquivos: `segunda/02-rodar-schema.php`
- [ ] **3.** Teste suas restrições: tente inserir turno "madrugada" e disciplina com carga zero. Pronto quando o banco recusar os dois.
  Arquivos: `segunda/03-testar-restricoes.php`

## Terça

- [ ] **4.** `CREATE TABLE` de `aulas` e `alunos` com as FKs.
  Arquivos: `terca/01-schema-parte2.sql`
- [ ] **5.** `CREATE TABLE` de `notas` e `frequencias`, com `ON DELETE CASCADE` onde a descrição pede e `CHECK` entre colunas.
  Arquivos: `terca/02-schema-parte3.sql`
- [ ] **6.** Rode `escola-dados.sql`. Pronto quando todos os dados entrarem sem erro.
  Arquivos: `terca/03-carregar-dados.php`

## Quarta

- [ ] **7.** `ALTER TABLE`: adicione `telefone` em `professores` e depois torne `email_responsavel` obrigatório. O segundo vai falhar: explique por quê e resolva.
  Arquivos: `quarta/01-alter.sql`
- [ ] **8.** Crie índices nas colunas de FK de `notas` e `alunos`. Explique numa nota por que o Postgres não cria índice em FK sozinho.
  Arquivos: `quarta/02-indices.sql`, `quarta/02-por-que-indice.md`
- [ ] **9.** Tipos: explique numa nota a escolha entre `TEXT` e `VARCHAR(n)`, `NUMERIC` e `REAL`, `DATE` e `TIMESTAMP` no seu schema.
  Arquivos: `quarta/03-tipos.md`

## Quinta

- [ ] **10.** Tente apagar uma turma que tem alunos. Pronto quando explicar a diferença entre o comportamento padrão, `CASCADE`, `SET NULL` e `RESTRICT`.
  Arquivos: `quinta/01-apagar-turma.php`
- [ ] **11.** Crie uma migration "na mão": arquivo `001_add_apelido.sql` com um `up` e um `down` comentados, e uma tabela `migracoes` que registra o que já rodou. Pronto quando rodar duas vezes não aplicar duas vezes.
  Arquivos: `quinta/02-migracao-manual.php`, `quinta/001_add_apelido.sql`
- [ ] **12.** **(pleno)** Crie uma restrição que impeça um aluno de ter nota numa disciplina que a turma dele não tem. Dica: não dá com `CHECK` simples; pesquise FK composta ou trigger e escolha.
  Arquivos: `quinta/03-restricao-disciplina-turma.sql`

## Sexta

- [ ] **13.** Compare sua modelagem com o gabarito. Anote cada diferença e se a sua escolha também é válida.
  Arquivos: `sexta/01-comparar-gabarito.md`
- [ ] **14.** De memória: `CREATE TABLE` de pedidos com PK, FK, `CHECK` e `DEFAULT`, e a conexão PDO que roda ele.
  Arquivos: `sexta/02-de-memoria.php`

## Revisão de sexta, em voz alta e sem olhar

- [ ] PK vs `UNIQUE`
- [ ] Para que serve `CHECK`
- [ ] `CASCADE` vs `RESTRICT`
- [ ] Por que indexar FK
- [ ] O que uma migration resolve

Errou alguma? Releia a seção correspondente em `aula-sql/aula-sql-junior.md`.

## Desafio do fim de semana

**Modelagem de biblioteca**: veja `desafio/README.md`.
