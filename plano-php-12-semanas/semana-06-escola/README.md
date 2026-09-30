# Semana 06 · Escola

**Nível:** Intermediário

Uma escola com turmas, disciplinas e notas. Intermediário: médias, relatórios e permissão por papel.

Cerca de 1h30 por dia. Os arquivos de cada exercício já estão criados e vazios. Os que estão em `laravel/` mostram onde a peça fica: crie no seu `treino-laravel` (com `php artisan make:...` quando fizer sentido) e use estes como lista de conferência.

## Segunda · PHP moderno e OOP

- [ ] **1.** Value object `Nota` que só aceita de 0 a 10, com uma casa decimal. Pronto quando `new Nota(10.5)` lançar exceção.
  Arquivos: `php/segunda/01-Nota.php`
- [ ] **2.** Interface `CalculoMedia` com `MediaAritmetica` e `MediaPonderada` (pesos por avaliação). Pronto quando o boletim trocar de cálculo sem mudar uma linha.
  Arquivos: `php/segunda/02-CalculoMedia.php`, `php/segunda/02-MediaAritmetica.php`, `php/segunda/02-MediaPonderada.php`
- [ ] **3.** Com funções de array, a partir das notas da turma, calcule média, maior nota, menor nota e quantos passaram (média maior ou igual a 6). Pronto quando nenhum `foreach` for usado.
  Arquivos: `php/segunda/03-estatisticas.php`

## Terça · SQL e PDO

- [ ] **4.** Tabelas `turmas`, `alunos`, `disciplinas` e `notas`, com `CHECK (valor BETWEEN 0 AND 10)`. Pronto quando uma nota 11 for recusada pelo banco.
  Arquivos: `php/terca/04-schema.sql`
- [ ] **5.** Consultas: média por aluno por disciplina; alunos reprovados em alguma disciplina (`HAVING AVG(...) < 6`); os 3 melhores de cada turma (dica: dá para fazer sem window function ainda, com `ORDER BY` e `LIMIT` por turma no PHP). Pronto quando as três rodarem.
  Arquivos: `php/terca/05-relatorios.php`
- [ ] **6.** Importe um CSV de 30 notas com um único prepared statement reutilizado dentro de uma transação. Pronto quando uma linha inválida no meio desfizer tudo.
  Arquivos: `php/terca/06-importar-csv.php`, `php/terca/notas.csv` (fornecido)

## Quarta · HTTP e Laravel

- [ ] **7.** Tela de boletim do aluno com as médias por disciplina. Pronto quando a média vier de um método do model ou de uma classe, não da view.
  Arquivos: `laravel/app/Http/Controllers/BoletimController.php`, `laravel/resources/views/boletim/show.blade.php`
- [ ] **8.** Papéis: aluno, professor e coordenação. Crie uma Policy: aluno vê só o próprio boletim, professor vê as turmas dele, coordenação vê tudo. Pronto quando a regra estar só na Policy.
  Arquivos: `laravel/app/Policies/BoletimPolicy.php`
- [ ] **9.** Rota para o professor lançar nota, com Form Request. Pronto quando professor de outra turma receber 403.
  Arquivos: `laravel/app/Http/Requests/LancarNotaRequest.php`, `laravel/app/Http/Controllers/NotaController.php`

## Quinta · Segurança e testes

- [ ] **10.** Testes da Policy com os três papéis. Pronto quando cada combinação permitida e proibida tiver um teste.
  Arquivos: `laravel/tests/Feature/BoletimPolicyTest.php`
- [ ] **11.** O professor pode deixar um comentário no boletim. Pronto quando um comentário com `<script>` aparecer como texto e existir um teste disso.
  Arquivos: `laravel/tests/Feature/ComentarioXssTest.php`
- [ ] **12.** Teste unitário da `MediaPonderada` com pesos que não somam 1. Pronto quando você decidir o comportamento e o teste documentar a decisão.
  Arquivos: `laravel/tests/Unit/MediaPonderadaTest.php`

## Sexta · Git, IA e revisão

- [ ] **13.** Crie uma tag `v0.6` no `treino-laravel` e escreva as notas do que mudou. Pronto quando a tag aparecer no GitHub.
- [ ] **14.** Sem API: em PHP puro, calcule a similaridade de cosseno entre vetores pequenos que representam frases (invente os números). Pronto quando você explicar como isso vira a busca do RAG.
  Arquivos: `ia/similaridade-cosseno.php`

## Revisão de sexta, em voz alta e sem olhar

- [ ] O que é value object
- [ ] `CHECK` no banco vs validação no PHP
- [ ] Policy vs Gate
- [ ] 403 vs 404 para recurso de outro usuário
- [ ] O que é embedding

Errou alguma? Releia a seção correspondente em `aula-php/aula-php-junior.md`.

## Desafio do fim de semana

**Modelagem no quadro**: veja `desafio/README.md`. Não leia a última seção do desafio antes de fazer.
