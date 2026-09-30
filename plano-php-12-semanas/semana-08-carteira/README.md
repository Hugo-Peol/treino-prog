# Semana 08 · Carteira digital

**Nível:** Intermediário

Uma carteira com contas e transferências. Fecha o intermediário: dinheiro, atomicidade, token de API e idempotência.

Cerca de 1h30 por dia. Os arquivos de cada exercício já estão criados e vazios. Os que estão em `laravel/` mostram onde a peça fica: crie no seu `treino-laravel` (com `php artisan make:...` quando fizer sentido) e use estes como lista de conferência.

## Segunda · PHP moderno e OOP

- [ ] **1.** Value object `Dinheiro` em centavos, imutável, com `somar`, `subtrair` e `formatar()` em reais. Pronto quando `Dinheiro::deReais('10,50')` funcionar e subtrair para negativo lançar exceção.
  Arquivos: `php/segunda/01-Dinheiro.php`
- [ ] **2.** Classe `Conta` com `debitar` e `creditar`, e a exceção `SaldoInsuficiente`. Pronto quando o saldo só mudar por esses dois métodos.
  Arquivos: `php/segunda/02-Conta.php`
- [ ] **3.** Classe `Transferir` que recebe duas contas e um valor. Pronto quando transferir para a mesma conta lançar exceção e uma falha no crédito não deixar o débito feito.
  Arquivos: `php/segunda/03-Transferir.php`

## Terça · SQL e PDO

- [ ] **4.** Tabelas `contas` (saldo em centavos com `CHECK (saldo >= 0)`) e `movimentacoes` (extrato). Pronto quando o banco recusar saldo negativo.
  Arquivos: `php/terca/04-schema.sql`
- [ ] **5.** Transferência pelo PDO numa transação: debita, credita e grava as duas movimentações. Trave as duas contas sempre na mesma ordem (menor id primeiro). Pronto quando você explicar que problema a ordem fixa evita (deadlock).
  Arquivos: `php/terca/05-transferir.php`
- [ ] **6.** Consulta que confere se o saldo de cada conta bate com a soma do extrato. Pronto quando mostrar só as contas com diferença.
  Arquivos: `php/terca/06-conciliar.php`

## Quarta · HTTP e Laravel

- [ ] **7.** API autenticada com Sanctum: `GET /api/saldo` e `POST /api/transferencias`. Pronto quando sem token devolver 401.
  Arquivos: `laravel/app/Http/Controllers/Api/TransferenciaController.php`, `laravel/routes/api.php`
- [ ] **8.** Idempotência: o `POST` aceita o cabeçalho `Idempotency-Key`. A mesma chave repetida devolve a mesma resposta sem transferir de novo. Pronto quando dois envios iguais gerarem uma só transferência.
  Arquivos: `laravel/app/Http/Middleware/Idempotencia.php`, `laravel/database/migrations/create_chaves_idempotencia_table.php`
- [ ] **9.** Resposta de erro padronizada em JSON para saldo insuficiente (422) e conta inexistente (404). Pronto quando o front conseguir mostrar a mensagem sem adivinhar o formato.
  Arquivos: `laravel/bootstrap/app.php`

## Quinta · Segurança e testes

- [ ] **10.** Testes de feature: sem token (401), saldo insuficiente (422), para si mesmo (422), sucesso (201). Pronto quando o sucesso conferir os dois saldos no banco.
  Arquivos: `laravel/tests/Feature/TransferenciaTest.php`
- [ ] **11.** Teste da idempotência: mesma chave duas vezes, uma transferência. Pronto quando conferir o extrato.
  Arquivos: `laravel/tests/Feature/IdempotenciaTest.php`
- [ ] **12.** Teste de IDOR: não dá para transferir a partir da conta de outro usuário passando o id dela no corpo. Pronto quando a conta de origem vier sempre do usuário autenticado.
  Arquivos: `laravel/tests/Feature/TransferenciaIdorTest.php`

## Sexta · Git, IA e revisão

- [ ] **13.** Escreva uma descrição de PR completa para a transferência: o que muda, como testar, riscos. Pronto quando alguém que não viu o código entender o que revisar.
  Arquivos: `notas/sexta-descricao-pr.md`
- [ ] **14.** Tool calling em PHP: exponha `consultar_saldo` (sem parâmetros; o usuário vem da sessão) e faça o modelo responder "quanto eu tenho?". Pronto quando você imprimir o JSON de ida e volta e entender cada parte.
  Arquivos: `ia/tool-calling-saldo.php`

## Revisão de sexta, em voz alta e sem olhar

- [ ] Por que centavos e não float
- [ ] O que é deadlock e como a ordem fixa evita
- [ ] O que é idempotência numa API de pagamento
- [ ] O que é IDOR
- [ ] Como funciona tool calling

Errou alguma? Releia a seção correspondente em `aula-php/aula-php-junior.md`.

## Desafio do fim de semana

**Transferência simplificada**: veja `desafio/README.md`. Não leia a última seção do desafio antes de fazer.
