# Semana 02 · Biblioteca

**Nível:** Base

Uma biblioteca com livros, leitores e empréstimos. Nível base, agora com datas de devolução.

Cerca de 1h30 por dia. Os arquivos de cada exercício já estão criados e vazios. Os que estão em `laravel/` mostram onde a peça fica: crie no seu `treino-laravel` (com `php artisan make:...` quando fizer sentido) e use estes como lista de conferência.

## Segunda · PHP moderno e OOP

- [ ] **1.** Enum `SituacaoEmprestimo` (ativo, devolvido, atrasado). Pronto quando um método `podeRenovar()` usar `match` e devolver `bool`.
  Arquivos: `php/segunda/01-SituacaoEmprestimo.php`
- [ ] **2.** Classe `Emprestimo` com data de retirada e prazo em dias, e um método `dataDevolucao()` usando `DateTimeImmutable`. Pronto quando chamar o método não alterar a data original.
  Arquivos: `php/segunda/02-Emprestimo.php`
- [ ] **3.** Com `array_filter` e `array_map`, a partir de uma lista de empréstimos, gere os nomes dos leitores com livro atrasado. Pronto quando nenhum `foreach` for usado.
  Arquivos: `php/segunda/03-atrasados.php`

## Terça · SQL e PDO

- [ ] **4.** Tabelas `livros`, `leitores` e `emprestimos`, com FK e `NOT NULL` onde fizer sentido. Pronto quando um leitor não puder ser apagado com empréstimo ativo (FK sem cascade).
  Arquivos: `php/terca/04-schema.sql`
- [ ] **5.** Consulta com `LEFT JOIN`: livros que nunca foram emprestados. Pronto quando você souber explicar por que `INNER JOIN` não serviria.
  Arquivos: `php/terca/05-nunca-emprestados.php`
- [ ] **6.** Pelo PDO, uma função `emprestar(int $livroId, int $leitorId)` com prepared statement. Pronto quando devolver o id gerado com `lastInsertId()`.
  Arquivos: `php/terca/06-emprestar.php`

## Quarta · HTTP e Laravel

- [ ] **7.** Módulo de livros no `treino-laravel`: migration, model, factory e seeder com 20 livros. Pronto quando `migrate:fresh --seed` montar tudo.
  Arquivos: `laravel/database/migrations/create_livros_table.php`, `laravel/app/Models/Livro.php`, `laravel/database/factories/LivroFactory.php`, `laravel/database/seeders/LivroSeeder.php`
- [ ] **8.** Rotas `GET /livros` e `GET /livros/{livro}` com route model binding. Pronto quando um id inexistente devolver 404 sem você escrever `if`.
  Arquivos: `laravel/app/Http/Controllers/LivroController.php`, `laravel/routes/web.php`
- [ ] **9.** Paginação na listagem. Pronto quando `?page=2` funcionar.
  Arquivos: `laravel/resources/views/livros/index.blade.php`

## Quinta · Segurança e testes

- [ ] **10.** Teste de feature: a listagem mostra o título do livro criado pela factory. Pronto quando usar `RefreshDatabase`.
  Arquivos: `laravel/tests/Feature/LivroListagemTest.php`
- [ ] **11.** Teste: pedir um livro inexistente dá 404. Pronto quando passar sem mexer no controller.
  Arquivos: `laravel/tests/Feature/LivroNaoEncontradoTest.php`
- [ ] **12.** Escreva numa nota: o que é mass assignment e como o `$fillable` do seu model protege.
  Arquivos: `notas/quinta-mass-assignment.md`

## Sexta · Git, IA e revisão

- [ ] **13.** Revise o `.gitignore` dos dois repositórios. Pronto quando `git status` não mostrar `.env`, `vendor/` nem `node_modules/`.
- [ ] **14.** Escreva, em 5 linhas, como um RAG ajudaria um assistente da biblioteca a responder "qual o prazo de empréstimo?". Pronto quando citar o que vai no índice e o que vai no prompt.
  Arquivos: `ia/rag-biblioteca.md`

## Revisão de sexta, em voz alta e sem olhar

- [ ] `LEFT` vs `INNER JOIN`
- [ ] O que é `readonly`
- [ ] O que o route model binding faz
- [ ] O que é `RefreshDatabase`
- [ ] Por que `.env` não vai para o git

Errou alguma? Releia a seção correspondente em `aula-php/aula-php-junior.md`.

## Desafio do fim de semana

**Validador de CPF**: veja `desafio/README.md`. Não leia a última seção do desafio antes de fazer.
