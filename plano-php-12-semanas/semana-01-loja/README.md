# Semana 01 · Loja

**Nível:** Base

Uma loja com clientes, produtos e pedidos. Nível base: um conceito por exercício.

Cerca de 1h30 por dia. Os arquivos de cada exercício já estão criados e vazios. Os que estão em `laravel/` mostram onde a peça fica: crie no seu `treino-laravel` (com `php artisan make:...` quando fizer sentido) e use estes como lista de conferência.

## Segunda · PHP moderno e OOP

- [ ] **1.** Crie o enum `StatusPedido` (pendente, pago, enviado, cancelado) com um método `rotulo()` usando `match`. Pronto quando tudo tiver `strict_types` e tipos em parâmetros e retorno.
  Arquivos: `php/segunda/01-StatusPedido.php`
- [ ] **2.** Crie a classe `Pedido` com propriedades `readonly` e promoção no construtor. Pronto quando alterar o total depois de criado der erro.
  Arquivos: `php/segunda/02-Pedido.php`
- [ ] **3.** Crie a interface `CalculadoraFrete` com `FreteFixo` e `FreteGratisAcimaDe`. Pronto quando uma classe `Checkout` receber a calculadora pelo construtor.
  Arquivos: `php/segunda/03-CalculadoraFrete.php`, `php/segunda/03-FreteFixo.php`, `php/segunda/03-FreteGratisAcimaDe.php`, `php/segunda/03-Checkout.php`

## Terça · SQL e PDO

- [ ] **4.** Crie `clientes`, `produtos` e `pedidos` com PK, FK e índice em `pedidos.cliente_id`. Pronto quando um pedido de cliente inexistente der erro.
  Arquivos: `php/terca/04-schema.sql`
- [ ] **5.** Conecte com PDO (na mão, sem arquivo de conexão pronto) em modo de exceção e insira 3 clientes e 5 pedidos com prepared statement. Pronto quando nenhum valor for concatenado no SQL.
  Arquivos: `php/terca/05-inserir.php`
- [ ] **6.** Escreva a consulta de total gasto por cliente com `JOIN` e `GROUP BY`. Pronto quando rodar pelo PDO e imprimir o resultado.
  Arquivos: `php/terca/06-total-por-cliente.php`

## Quarta · HTTP e Laravel

- [ ] **7.** No `treino-laravel`, crie migration e model de `Produto` e as rotas de listar e criar. Pronto quando funcionar pelo navegador.
  Arquivos: `laravel/database/migrations/create_produtos_table.php`, `laravel/app/Models/Produto.php`, `laravel/app/Http/Controllers/ProdutoController.php`, `laravel/routes/web.php`
- [ ] **8.** Crie um Form Request para produto (nome obrigatório, preço maior que zero). Pronto quando preço zero mostrar o erro e não salvar.
  Arquivos: `laravel/app/Http/Requests/StoreProdutoRequest.php`
- [ ] **9.** Escreva numa nota: qual método e status HTTP cada rota sua usa, e por quê.
  Arquivos: `notas/quarta-http.md`

## Quinta · Segurança e testes

- [ ] **10.** Teste de feature: visitante não acessa a criação de produto. Pronto quando o teste falhar se você tirar o middleware `auth`.
  Arquivos: `laravel/tests/Feature/ProdutoAcessoTest.php`
- [ ] **11.** Cadastre um produto chamado `<b>teste</b>`. Pronto quando a página mostrar as tags como texto e você souber explicar o que é XSS.
  Arquivos: `notas/quinta-xss.md`
- [ ] **12.** Teste unitário da `FreteGratisAcimaDe` com o valor exato do limite. Pronto quando o caso de borda estiver coberto.
  Arquivos: `laravel/tests/Unit/FreteGratisAcimaDeTest.php`

## Sexta · Git, IA e revisão

- [ ] **13.** Confira seus PRs da semana. Pronto quando cada um tiver título claro e commits com mensagens que dizem o que mudou.
- [ ] **14.** Escreva um prompt de sistema para um assistente da loja que responde dúvidas sobre frete. Pronto quando ele disser o tom, o que pode responder e o que fazer quando não souber.
  Arquivos: `ia/prompt-assistente-frete.md`

## Revisão de sexta, em voz alta e sem olhar

- [ ] Diferença entre `==` e `===`
- [ ] O que é FK
- [ ] Por que prepared statement
- [ ] 401 vs 403
- [ ] O que é XSS

Errou alguma? Releia a seção correspondente em `aula-php/aula-php-junior.md`.

## Desafio do fim de semana

**Carrinho com cupons**: veja `desafio/README.md`. Não leia a última seção do desafio antes de fazer.
# treino-prog
