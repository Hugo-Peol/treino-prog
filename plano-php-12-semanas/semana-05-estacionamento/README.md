# Semana 05 · Estacionamento

**Nível:** Intermediário

Um estacionamento com vagas, tickets e cobrança por tempo. Nível intermediário: datas, frações de hora e regras que se cruzam.

Cerca de 1h30 por dia. Os arquivos de cada exercício já estão criados e vazios. Os que estão em `laravel/` mostram onde a peça fica: crie no seu `treino-laravel` (com `php artisan make:...` quando fizer sentido) e use estes como lista de conferência.

## Segunda · PHP moderno e OOP

- [ ] **1.** Enum `TipoVeiculo` (moto, carro, utilitário) com o valor da hora em centavos. Pronto quando não houver nenhum número solto fora do enum.
  Arquivos: `php/segunda/01-TipoVeiculo.php`
- [ ] **2.** Classe `Ticket` com entrada e saída (`DateTimeImmutable`) e um método `minutosPermanencia()`. Pronto quando saída antes da entrada lançar exceção.
  Arquivos: `php/segunda/02-Ticket.php`
- [ ] **3.** Interface `Tarifa` com `TarifaPorHora` (fração de hora conta como hora cheia, 15 minutos de tolerância) e `TarifaDiaria`. Pronto quando 1h14 cobrar 1 hora e 1h16 cobrar 2.
  Arquivos: `php/segunda/03-Tarifa.php`, `php/segunda/03-TarifaPorHora.php`, `php/segunda/03-TarifaDiaria.php`

## Terça · SQL e PDO

- [ ] **4.** Tabelas `vagas` e `tickets` (entrada `TIMESTAMP NOT NULL`, saída pode ser nula). Pronto quando uma placa não puder ter dois tickets abertos ao mesmo tempo (dica: índice único parcial `WHERE saida IS NULL`).
  Arquivos: `php/terca/04-schema.sql`
- [ ] **5.** Consulta da ocupação atual por tipo de veículo e do faturamento por dia dos últimos 7 dias (`DATE_TRUNC` ou `DATE()`). Pronto quando rodar pelo PDO.
  Arquivos: `php/terca/05-ocupacao-faturamento.php`
- [ ] **6.** Pelo PDO, registre a saída com `UPDATE ... WHERE placa = ? AND saida IS NULL`. Pronto quando usar `rowCount()` para avisar que não havia ticket aberto.
  Arquivos: `php/terca/06-registrar-saida.php`

## Quarta · HTTP e Laravel

- [ ] **7.** Model `Ticket` com um local scope `abertos()` e um cast de datas. Pronto quando `Ticket::abertos()->count()` funcionar.
  Arquivos: `laravel/app/Models/Ticket.php`, `laravel/database/migrations/create_tickets_table.php`
- [ ] **8.** API `POST /api/tickets` (entrada) e `PATCH /api/tickets/{ticket}/saida` (saída, devolve o valor). Pronto quando saída repetida devolver 409.
  Arquivos: `laravel/app/Http/Controllers/Api/TicketController.php`, `laravel/routes/api.php`
- [ ] **9.** Coloque a regra de cobrança numa classe de serviço injetada no controller. Pronto quando o controller não tiver nenhuma conta de dinheiro.
  Arquivos: `laravel/app/Services/CalculadoraEstacionamento.php`

## Quinta · Segurança e testes

- [ ] **10.** Testes unitários da `TarifaPorHora` com 14, 15, 16, 74 e 76 minutos. Pronto quando cada borda tiver um teste.
  Arquivos: `laravel/tests/Unit/TarifaPorHoraTest.php`
- [ ] **11.** Teste de feature da saída usando `$this->travel(2)->hours()` para simular o tempo. Pronto quando o teste não depender do relógio real.
  Arquivos: `laravel/tests/Feature/TicketSaidaTest.php`
- [ ] **12.** Escreva numa nota: por que 409 e não 422 para saída repetida.
  Arquivos: `notas/quinta-status-409.md`

## Sexta · Git, IA e revisão

- [ ] **13.** Atualize uma branch antiga com a `main` usando `git rebase main`. Pronto quando o histórico ficar reto e você souber quando não usar rebase.
- [ ] **14.** Primeira chamada a uma API de modelo em PHP puro (`curl` ou Guzzle): mande o valor e a permanência de um ticket e peça uma explicação curta para o cliente. Pronto quando a chave vier de variável de ambiente, nunca do código.
  Arquivos: `ia/primeira-chamada.php`

## Revisão de sexta, em voz alta e sem olhar

- [ ] Por que `DateTimeImmutable`
- [ ] O que é índice único parcial
- [ ] O que `rowCount()` devolve
- [ ] 409 vs 422
- [ ] Quando não usar rebase

Errou alguma? Releia a seção correspondente em `aula-php/aula-php-junior.md`.

## Desafio do fim de semana

**Tarifa de estacionamento**: veja `desafio/README.md`. Não leia a última seção do desafio antes de fazer.
