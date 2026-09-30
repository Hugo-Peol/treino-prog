# Semana 04 · Restaurante

**Nível:** Base

Um restaurante com cardápio, mesas e comandas. Fecha o nível base, com transação e a primeira API.

Cerca de 1h30 por dia. Os arquivos de cada exercício já estão criados e vazios. Os que estão em `laravel/` mostram onde a peça fica: crie no seu `treino-laravel` (com `php artisan make:...` quando fizer sentido) e use estes como lista de conferência.

## Segunda · PHP moderno e OOP

- [ ] **1.** Classe `Comanda` com uma lista de itens e um método `total()` feito com `array_reduce`. Pronto quando o total for calculado em centavos (`int`), sem `float`.
  Arquivos: `php/segunda/01-Comanda.php`
- [ ] **2.** Interface `TaxaServico` com `DezPorCento` e `SemTaxa`. Pronto quando a comanda receber a taxa pelo construtor.
  Arquivos: `php/segunda/02-TaxaServico.php`, `php/segunda/02-DezPorCento.php`, `php/segunda/02-SemTaxa.php`
- [ ] **3.** Nullsafe: uma `Mesa` pode ter ou não um `Garcom`. Pronto quando `$mesa->garcom()?->nome()` não precisar de `if`.
  Arquivos: `php/segunda/03-Mesa.php`

## Terça · SQL e PDO

- [ ] **4.** Tabelas `pratos`, `comandas` e `itens_comanda` (com quantidade e preço no momento do pedido). Pronto quando você souber explicar por que o preço é copiado para o item.
  Arquivos: `php/terca/04-schema.sql`
- [ ] **5.** Pelo PDO, feche uma comanda: insira o pagamento e marque a comanda como paga numa transação. Pronto quando um erro forçado no meio não deixar nada gravado.
  Arquivos: `php/terca/05-fechar-comanda.php`
- [ ] **6.** Consulta dos 5 pratos mais vendidos no mês. Pronto quando usar `SUM(quantidade)`, `GROUP BY` e `LIMIT`.
  Arquivos: `php/terca/06-mais-vendidos.php`

## Quarta · HTTP e Laravel

- [ ] **7.** API `GET /api/pratos` devolvendo JSON com um API Resource. Pronto quando o JSON não expuser `created_at` nem `updated_at`.
  Arquivos: `laravel/app/Http/Resources/PratoResource.php`, `laravel/app/Http/Controllers/Api/PratoController.php`, `laravel/routes/api.php`
- [ ] **8.** API `POST /api/comandas/{comanda}/itens`. Pronto quando devolver 201 no sucesso e 422 com item inválido.
  Arquivos: `laravel/app/Http/Controllers/Api/ItemComandaController.php`, `laravel/app/Http/Requests/StoreItemComandaRequest.php`
- [ ] **9.** Escreva numa nota: por que `POST` não é idempotente e o que acontece se o garçom clicar duas vezes.
  Arquivos: `notas/quarta-idempotencia.md`

## Quinta · Segurança e testes

- [ ] **10.** Teste de feature da API: `postJson` com dados válidos e inválidos. Pronto quando conferir o status e a estrutura do JSON.
  Arquivos: `laravel/tests/Feature/ItemComandaApiTest.php`
- [ ] **11.** Teste unitário da `Comanda` com e sem taxa de serviço. Pronto quando usar valores em centavos.
  Arquivos: `laravel/tests/Unit/ComandaTest.php`
- [ ] **12.** Procure no seu código qualquer `DB::raw` ou `whereRaw`. Pronto quando nenhum receber valor do usuário concatenado.
  Arquivos: `notas/quinta-raw.md`

## Sexta · Git, IA e revisão

- [ ] **13.** Use `git revert` para desfazer um commit já enviado. Pronto quando você explicar a diferença para `reset --hard`.
- [ ] **14.** Escreva 5 perguntas de clientes do restaurante e marque qual precisa de RAG, qual precisa de ferramenta e qual só de prompt. Pronto quando justificar cada uma.
  Arquivos: `ia/classificar-perguntas.md`

## Revisão de sexta, em voz alta e sem olhar

- [ ] Por que dinheiro em centavos
- [ ] O que é transação
- [ ] Idempotência
- [ ] 201 vs 200
- [ ] `revert` vs `reset`

Errou alguma? Releia a seção correspondente em `aula-php/aula-php-junior.md`.

## Desafio do fim de semana

**Refatorar código legado**: veja `desafio/README.md`. Não leia a última seção do desafio antes de fazer.
