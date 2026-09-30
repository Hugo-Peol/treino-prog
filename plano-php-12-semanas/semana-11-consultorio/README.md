# Semana 11 · Agenda de consultório

**Nível:** Avançado

Agenda de profissionais de saúde. Avançado: horários livres, isolamento entre profissionais e dado sensível.

Cerca de 1h30 por dia. Os arquivos de cada exercício já estão criados e vazios. Os que estão em `laravel/` mostram onde a peça fica: crie no seu `treino-laravel` (com `php artisan make:...` quando fizer sentido) e use estes como lista de conferência.

## Segunda · PHP moderno e OOP

- [ ] **1.** Função que gera os horários livres de um dia: recebe o expediente (ex.: 8h às 18h, almoço 12h às 13h), a duração da consulta e as consultas marcadas. Pronto quando uma consulta de 50 minutos não deixar sobrar um buraco inútil de 10.
  Arquivos: `php/segunda/01-horarios-livres.php`
- [ ] **2.** Fuso horário: guarde em UTC e mostre em `America/Sao_Paulo`. Pronto quando você explicar o que dá errado se guardar a hora local.
  Arquivos: `php/segunda/02-fuso.php`
- [ ] **3.** Enum `SituacaoConsulta` e uma regra: falta conta só se não cancelou até 24h antes. Pronto quando a regra estiver num método com nome claro.
  Arquivos: `php/segunda/03-SituacaoConsulta.php`

## Terça · SQL e PDO

- [ ] **4.** Tabelas `profissionais`, `pacientes` (cada paciente pertence a um profissional) e `consultas`. Pronto quando um paciente não puder ter consulta com profissional que não é o dele (dica: FK composta ou checagem na transação).
  Arquivos: `php/terca/04-schema.sql`
- [ ] **5.** Taxa de faltas por paciente nos últimos 90 dias, só quem teve 3 ou mais consultas. Pronto quando usar `COUNT(*) FILTER (WHERE ...)` ou `SUM(CASE ...)`.
  Arquivos: `php/terca/05-taxa-faltas.php`
- [ ] **6.** Pelo PDO, marcar consulta checando conflito dentro da transação. Pronto quando toda consulta SQL do arquivo filtrar pelo profissional.
  Arquivos: `php/terca/06-marcar.php`

## Quarta · HTTP e Laravel

- [ ] **7.** Global scope: todo model de paciente e consulta filtra pelo profissional logado automaticamente. Pronto quando `Paciente::all()` só trouxer os dele.
  Arquivos: `laravel/app/Models/Scopes/DoProfissional.php`, `laravel/app/Models/Paciente.php`, `laravel/app/Models/Consulta.php`
- [ ] **8.** CPF do paciente guardado com o cast `encrypted`. Pronto quando o banco mostrar o CPF ilegível e a tela mostrar normal.
  Arquivos: `laravel/database/migrations/create_pacientes_table.php`
- [ ] **9.** Tela da agenda do dia com os horários livres. Pronto quando reaproveitar a função da segunda.
  Arquivos: `laravel/app/Http/Controllers/AgendaController.php`, `laravel/resources/views/agenda/dia.blade.php`

## Quinta · Segurança e testes

- [ ] **10.** Teste de isolamento: profissional A não vê, não edita e não marca consulta para paciente de B, nem pela URL. Pronto quando apagar o global scope fizer o teste falhar.
  Arquivos: `laravel/tests/Feature/IsolamentoProfissionalTest.php`
- [ ] **11.** Revise os logs: nenhum nome, CPF ou telefone de paciente aparece em log ou mensagem de erro. Pronto quando você forçar um erro e conferir o `laravel.log`.
  Arquivos: `notas/quinta-dados-sensiveis.md`
- [ ] **12.** Teste unitário dos horários livres com dia lotado, dia vazio e consulta encostada no almoço. Pronto quando os três passarem.
  Arquivos: `laravel/tests/Unit/HorariosLivresTest.php`

## Sexta · Git, IA e revisão

- [ ] **13.** Pratique revisão: abra um PR antigo seu e deixe 5 comentários como se fosse de outra pessoa. Pronto quando cada comentário disser o problema e uma sugestão.
- [ ] **14.** Antes de mandar um texto para um modelo, troque nome, CPF e telefone por marcadores (`[PACIENTE]`, `[CPF]`). Pronto quando você explicar por que isso ainda não torna o texto anônimo.
  Arquivos: `ia/pseudonimizar.php`

## Revisão de sexta, em voz alta e sem olhar

- [ ] Por que guardar data em UTC
- [ ] O que é global scope
- [ ] Criptografia de campo vs hash
- [ ] O que a LGPD chama de dado sensível
- [ ] Pseudonimizar vs anonimizar

Errou alguma? Releia a seção correspondente em `aula-php/aula-php-junior.md`.

## Desafio do fim de semana

**Horários livres (pair programming)**: veja `desafio/README.md`. Não leia a última seção do desafio antes de fazer.
