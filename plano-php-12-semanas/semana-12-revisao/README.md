# Semana 12 · Revisão e simulado

**Nível:** Simulado

Semana de fechamento. Cada dia mistura temas com tempo cronometrado, como num teste técnico. Sem consultar nada nos primeiros 20 minutos de cada exercício.

Cerca de 1h30 por dia. Os arquivos de cada exercício já estão criados e vazios. Os que estão em `laravel/` mostram onde a peça fica: crie no seu `treino-laravel` (com `php artisan make:...` quando fizer sentido) e use estes como lista de conferência.

## Segunda · PHP moderno e OOP, cronometrado

- [ ] **1.** 25 minutos: sem olhar código antigo, escreva um enum com `match`, uma classe `readonly` e uma interface com duas implementações injetadas. Tema livre.
  Arquivos: `php/segunda/01-relampago.php`
- [ ] **2.** 30 minutos: refatore o arquivo `php/segunda/02-legado.php` (fornecido) para PHP 8 com tipos, sem mudar o comportamento. Pronto quando você escrever antes um teste que prove que nada mudou.
  Arquivos: `php/segunda/02-legado.php` (fornecido), `php/segunda/02-legado-refatorado.php`

## Terça · SQL e PDO, cronometrado

- [ ] **3.** 40 minutos: resolva a prova da semana 12 do plano de SQL sem consultar.
- [ ] **4.** 20 minutos: do zero, arquivo PHP que conecta com PDO, faz um `SELECT` com prepared statement e uma transação com rollback forçado. Sem consultar.
  Arquivos: `php/terca/02-pdo-do-zero.php`

## Quarta · HTTP e Laravel, cronometrado

- [ ] **5.** 60 minutos: CRUD de `Tarefa` com API (listar, criar, concluir, apagar), validação e status HTTP certos. Pronto quando testar tudo pelo terminal com `curl`.
  Arquivos: `laravel/app/Http/Controllers/Api/TarefaController.php`, `notas/quarta-curl.md`

## Quinta · Segurança e testes, cronometrado

- [ ] **6.** 40 minutos: escreva os testes do CRUD de quarta, incluindo um de autorização. Pronto quando algum teste pegar um bug que você não tinha visto.
  Arquivos: `laravel/tests/Feature/TarefaApiTest.php`
- [ ] **7.** 20 minutos: leia o arquivo `laravel/codigo-inseguro.php` (fornecido) e liste todas as falhas de segurança com a correção de cada uma.
  Arquivos: `laravel/codigo-inseguro.php` (fornecido), `notas/quinta-falhas.md`

## Sexta · Simulado de entrevista

- [ ] **8.** Peça a alguém (ou a mim) para fazer as 20 perguntas da lista `perguntas-entrevista.md` em ordem aleatória. Grave e escute depois. Pronto quando você souber quais 3 respostas precisa melhorar.
  Arquivos: `perguntas-entrevista.md` (fornecido), `notas/sexta-autoavaliacao.md`
- [ ] **9.** Escreva sua resposta para "me conta um projeto seu" em 2 minutos falados, usando o Vínculo. Pronto quando couber no tempo e tiver uma decisão técnica e um erro que você corrigiu.
  Arquivos: `notas/sexta-pitch.md`

## Revisão de sexta, em voz alta e sem olhar

- [ ] Explique injeção de dependência com um exemplo seu
- [ ] Como você evita N+1
- [ ] Como você garante que um usuário não vê dado de outro
- [ ] O que você testa primeiro num código novo
- [ ] Como você usa IA para programar

Errou alguma? Releia a seção correspondente em `aula-php/aula-php-junior.md`.

## Desafio do fim de semana

**Simulado completo**: veja `desafio/README.md`. Não leia a última seção do desafio antes de fazer.
