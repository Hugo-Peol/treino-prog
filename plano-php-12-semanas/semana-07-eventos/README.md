# Semana 07 · Eventos

**Nível:** Intermediário

Venda de ingressos com lotação. Intermediário: concorrência, exceções e tarefas em segundo plano.

Cerca de 1h30 por dia. Os arquivos de cada exercício já estão criados e vazios. Os que estão em `laravel/` mostram onde a peça fica: crie no seu `treino-laravel` (com `php artisan make:...` quando fizer sentido) e use estes como lista de conferência.

## Segunda · PHP moderno e OOP

- [ ] **1.** Exceções próprias: `EventoLotadoException` e `VendaEncerradaException`, com mensagens úteis. Pronto quando o código que chama puder tratar cada uma de forma diferente.
  Arquivos: `php/segunda/01-Excecoes.php`
- [ ] **2.** Enum `Setor` (pista, camarote, arquibancada) com preço e capacidade. Classe `Evento` que vende ingresso e lança a exceção certa. Pronto quando vender o último ingresso funcionar e o seguinte falhar.
  Arquivos: `php/segunda/02-Setor.php`, `php/segunda/02-Evento.php`
- [ ] **3.** Um `readonly class` (PHP 8.2) `Ingresso` com código gerado por `bin2hex(random_bytes(8))`. Pronto quando você explicar por que não usar `rand()` para isso.
  Arquivos: `php/segunda/03-Ingresso.php`

## Terça · SQL e PDO

- [ ] **4.** Tabelas `eventos`, `setores` (com `capacidade` e `vendidos`) e `ingressos`, com `UNIQUE (setor_id, assento)` e `CHECK (vendidos <= capacidade)`. Pronto quando o banco recusar venda acima da capacidade.
  Arquivos: `php/terca/04-schema.sql`
- [ ] **5.** Pelo PDO, venda com um `UPDATE setores SET vendidos = vendidos + 1 WHERE id = ? AND vendidos < capacidade` e confira `rowCount()`. Pronto quando você explicar por que isso é seguro com dois compradores ao mesmo tempo, e "SELECT, depois UPDATE" não é.
  Arquivos: `php/terca/05-vender.php`
- [ ] **6.** Abra dois terminais `psql`, comece uma transação em cada e reproduza a corrida. Pronto quando anotar o que o segundo terminal fica esperando.
  Arquivos: `notas/terca-concorrencia.md`

## Quarta · HTTP e Laravel

- [ ] **7.** Venda no Laravel com `DB::transaction` e `lockForUpdate()`. Pronto quando o setor lotado devolver 409.
  Arquivos: `laravel/app/Services/VenderIngresso.php`, `laravel/app/Http/Controllers/Api/IngressoController.php`
- [ ] **8.** Depois da venda, disparar um job na fila que envia o e-mail de confirmação. Pronto quando a resposta HTTP não esperar o e-mail.
  Arquivos: `laravel/app/Jobs/EnviarConfirmacaoIngresso.php`, `laravel/app/Mail/IngressoConfirmado.php`
- [ ] **9.** Rate limit de 10 compras por minuto por usuário. Pronto quando a 11ª devolver 429.
  Arquivos: `laravel/routes/api.php`

## Quinta · Segurança e testes

- [ ] **10.** Teste com `Queue::fake()`: vender despacha o job uma vez. Pronto quando o teste não enviar e-mail de verdade.
  Arquivos: `laravel/tests/Feature/VendaDespachaJobTest.php`
- [ ] **11.** Teste: com capacidade 1, a segunda venda falha e `vendidos` continua 1. Pronto quando você conferir o banco, não só a resposta.
  Arquivos: `laravel/tests/Feature/VendaLotacaoTest.php`
- [ ] **12.** Escreva numa nota: o que o rate limit protege e o que ele não protege.
  Arquivos: `notas/quinta-rate-limit.md`

## Sexta · Git, IA e revisão

- [ ] **13.** Use `git bisect` para achar o commit que quebrou um teste (quebre de propósito uns commits atrás). Pronto quando o bisect apontar o commit certo.
- [ ] **14.** Escreva a definição de uma ferramenta `listar_eventos` no formato JSON de tool calling (nome, descrição, parâmetros com tipos). Pronto quando a descrição deixar claro para o modelo quando usar a ferramenta.
  Arquivos: `ia/tool-listar-eventos.json`

## Revisão de sexta, em voz alta e sem olhar

- [ ] Por que "SELECT depois UPDATE" falha com concorrência
- [ ] O que faz `lockForUpdate`
- [ ] Para que serve fila
- [ ] O que é 429
- [ ] Como funciona o `git bisect`

Errou alguma? Releia a seção correspondente em `aula-php/aula-php-junior.md`.

## Desafio do fim de semana

**Venda de ingressos**: veja `desafio/README.md`. Não leia a última seção do desafio antes de fazer.
