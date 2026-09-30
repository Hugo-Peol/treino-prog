# Semana 03 · Academia

**Nível:** Base

Uma academia com alunos, planos e check-ins. Nível base, agora com relação muitos-para-muitos.

Cerca de 1h30 por dia. Os arquivos de cada exercício já estão criados e vazios. Os que estão em `laravel/` mostram onde a peça fica: crie no seu `treino-laravel` (com `php artisan make:...` quando fizer sentido) e use estes como lista de conferência.

## Segunda · PHP moderno e OOP

- [ ] **1.** Enum `Plano` (mensal, trimestral, anual) com um método que devolve a duração em meses e outro o preço em centavos. Pronto quando adicionar um plano novo quebrar o `match` até você tratá-lo.
  Arquivos: `php/segunda/01-Plano.php`
- [ ] **2.** Classe `Matricula` que calcula a data de vencimento. Pronto quando matrícula anual feita em 29/02 tiver um vencimento que você consegue justificar.
  Arquivos: `php/segunda/02-Matricula.php`
- [ ] **3.** Interface `PoliticaDesconto` com `SemDesconto` e `DescontoEstudante`. Pronto quando o cálculo da mensalidade não tiver nenhum `if` sobre o tipo de desconto.
  Arquivos: `php/segunda/03-PoliticaDesconto.php`, `php/segunda/03-SemDesconto.php`, `php/segunda/03-DescontoEstudante.php`

## Terça · SQL e PDO

- [ ] **4.** Tabelas `alunos`, `modalidades` e a tabela pivô `aluno_modalidade`, com PK composta. Pronto quando matricular o mesmo aluno duas vezes na mesma modalidade der erro.
  Arquivos: `php/terca/04-schema.sql`
- [ ] **5.** Tabela `checkins` e a consulta de quantos check-ins cada aluno fez no mês, só quem fez mais de 8 (`HAVING`). Pronto quando você explicar por que não dá para usar `WHERE` ali.
  Arquivos: `php/terca/05-checkins-mes.php`
- [ ] **6.** Pelo PDO, busque os alunos de uma modalidade passada por parâmetro. Pronto quando rodar com `:modalidade` nomeado.
  Arquivos: `php/terca/06-alunos-por-modalidade.php`

## Quarta · HTTP e Laravel

- [ ] **7.** Models `Aluno` e `Modalidade` com `belongsToMany`. Pronto quando `$aluno->modalidades()->attach($id)` funcionar.
  Arquivos: `laravel/app/Models/Aluno.php`, `laravel/app/Models/Modalidade.php`, `laravel/database/migrations/create_academia_tables.php`
- [ ] **8.** Tela do aluno listando suas modalidades. Pronto quando o Debugbar mostrar que não há N+1 (use `with`).
  Arquivos: `laravel/app/Http/Controllers/AlunoController.php`, `laravel/resources/views/alunos/show.blade.php`
- [ ] **9.** Rota `POST /alunos/{aluno}/checkins`. Pronto quando devolver redirect com mensagem de sucesso.
  Arquivos: `laravel/app/Http/Controllers/CheckinController.php`, `laravel/routes/web.php`

## Quinta · Segurança e testes

- [ ] **10.** Teste: fazer check-in cria exatamente um registro. Pronto quando usar `assertDatabaseCount`.
  Arquivos: `laravel/tests/Feature/CheckinTest.php`
- [ ] **11.** Teste: o formulário de check-in sem token CSRF é recusado. Pronto quando você souber explicar o ataque que isso impede.
  Arquivos: `laravel/tests/Feature/CheckinCsrfTest.php`
- [ ] **12.** Teste unitário da `DescontoEstudante`. Pronto quando cobrir valor zero.
  Arquivos: `laravel/tests/Unit/DescontoEstudanteTest.php`

## Sexta · Git, IA e revisão

- [ ] **13.** Crie um conflito de propósito: duas branches mudam o mesmo preço de plano. Pronto quando resolver e fazer o merge.
- [ ] **14.** Liste as ferramentas (nome, parâmetros, o que devolve) que um assistente da academia precisaria para responder "quantas vezes eu treinei este mês?". Pronto quando nenhuma receber o id do aluno como parâmetro.
  Arquivos: `ia/ferramentas-academia.md`

## Revisão de sexta, em voz alta e sem olhar

- [ ] `WHERE` vs `HAVING`
- [ ] O que é tabela pivô
- [ ] Composição vs herança
- [ ] O que é CSRF
- [ ] O que é N+1

Errou alguma? Releia a seção correspondente em `aula-php/aula-php-junior.md`.

## Desafio do fim de semana

**API de tarefas**: veja `desafio/README.md`. Não leia a última seção do desafio antes de fazer.
