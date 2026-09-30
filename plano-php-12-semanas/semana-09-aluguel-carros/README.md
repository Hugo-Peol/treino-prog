# Semana 09 · Aluguel de carros

**Nível:** Avançado

Reservas de carros por período. Avançado: sobreposição de datas, disponibilidade e um agente de IA.

Cerca de 1h30 por dia. Os arquivos de cada exercício já estão criados e vazios. Os que estão em `laravel/` mostram onde a peça fica: crie no seu `treino-laravel` (com `php artisan make:...` quando fizer sentido) e use estes como lista de conferência.

## Segunda · PHP moderno e OOP

- [ ] **1.** Value object `Periodo` (início e fim) com `dias()` e `sobrepoe(Periodo $outro): bool`. Pronto quando um período que termina no dia em que o outro começa NÃO for considerado conflito (devolução de manhã, retirada à tarde).
  Arquivos: `php/segunda/01-Periodo.php`
- [ ] **2.** Interface `RegraPreco` com `Diaria`, `PacoteSemanal` (7 dias saem por 6) e `AdicionalFimDeSemana`. Uma `CalculadoraReserva` aplica várias regras em sequência. Pronto quando a ordem das regras estiver explícita e testável.
  Arquivos: `php/segunda/02-RegraPreco.php`, `php/segunda/02-Diaria.php`, `php/segunda/02-PacoteSemanal.php`, `php/segunda/02-AdicionalFimDeSemana.php`, `php/segunda/02-CalculadoraReserva.php`
- [ ] **3.** Com funções de array, dada uma lista de reservas de um carro, devolva os buracos livres do mês. Pronto quando reservas fora de ordem funcionarem (ordene antes).
  Arquivos: `php/segunda/03-periodos-livres.php`

## Terça · SQL e PDO

- [ ] **4.** Tabelas `carros`, `clientes` e `reservas` (inicio, fim, `CHECK (fim > inicio)`). Pronto quando uma reserva invertida for recusada.
  Arquivos: `php/terca/04-schema.sql`
- [ ] **5.** Consulta dos carros disponíveis entre duas datas com `NOT EXISTS` e a condição de sobreposição (`r.inicio < :fim AND :inicio < r.fim`). Pronto quando você desenhar num papel os 4 casos de sobreposição e todos passarem.
  Arquivos: `php/terca/05-disponiveis.php`
- [ ] **6.** Pelo PDO, crie a reserva só se não houver conflito, na mesma transação e com `SELECT ... FOR UPDATE` no carro. Pronto quando duas reservas iguais ao mesmo tempo não passarem as duas.
  Arquivos: `php/terca/06-reservar.php`

## Quarta · HTTP e Laravel

- [ ] **7.** Regra de validação própria `CarroDisponivel`. Pronto quando o Form Request da reserva usar a regra e devolver mensagem clara.
  Arquivos: `laravel/app/Rules/CarroDisponivel.php`, `laravel/app/Http/Requests/StoreReservaRequest.php`
- [ ] **8.** API `GET /api/carros?inicio=...&fim=...&categoria=...` com paginação e filtros opcionais. Pronto quando filtros ausentes não quebrarem a consulta (use `when()`).
  Arquivos: `laravel/app/Http/Controllers/Api/CarroController.php`
- [ ] **9.** Cancelamento `DELETE /api/reservas/{reserva}` com regra: só até 24h antes. Pronto quando devolver 204 no sucesso e 409 se estiver em cima da hora.
  Arquivos: `laravel/app/Http/Controllers/Api/ReservaController.php`

## Quinta · Segurança e testes

- [ ] **10.** Testes unitários do `Periodo::sobrepoe` com os 4 casos de sobreposição e os 2 de encostar. Pronto quando cada caso tiver nome descritivo.
  Arquivos: `laravel/tests/Unit/PeriodoTest.php`
- [ ] **11.** Teste de feature: reserva conflitante devolve 422 e não grava nada. Pronto quando usar `assertDatabaseCount`.
  Arquivos: `laravel/tests/Feature/ReservaConflitoTest.php`
- [ ] **12.** Teste: cliente não cancela reserva de outro cliente. Pronto quando a Policy for a única responsável pela regra.
  Arquivos: `laravel/tests/Feature/ReservaPolicyTest.php`

## Sexta · Git, IA e revisão

- [ ] **13.** Faça um PR com um só commit de propósito (squash). Pronto quando explicar quando squash ajuda e quando atrapalha a revisão.
- [ ] **14.** Agente com duas ferramentas somente leitura: `buscar_carros_disponiveis(inicio, fim)` e `calcular_preco(carro_id, inicio, fim)`. Pergunte "qual o carro mais barato de sexta a domingo?". Pronto quando o loop tiver limite de 5 voltas e você imprimir cada passo.
  Arquivos: `ia/agente-reservas.php`

## Revisão de sexta, em voz alta e sem olhar

- [ ] A condição de sobreposição de datas
- [ ] `NOT EXISTS` vs `LEFT JOIN ... IS NULL`
- [ ] Por que `FOR UPDATE` na reserva
- [ ] Por que limitar as voltas do agente
- [ ] 204 vs 200

Errou alguma? Releia a seção correspondente em `aula-php/aula-php-junior.md`.

## Desafio do fim de semana

**Encurtador de URL com IA permitida**: veja `desafio/README.md`. Não leia a última seção do desafio antes de fazer.
