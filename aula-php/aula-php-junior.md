# Aula de revisão: dev PHP júnior

O que um dev PHP júnior precisa saber para trabalhar e passar em entrevista, em formato de revisão rápida. Os exercícios ficam no plano de 12 semanas (pasta `plano-php-12-semanas`).

## A regra de ouro

Ninguém decora boilerplate, nem sênior. O que se cobra de um júnior é saber o que existe, por que existe e reconhecer quando está errado.

| Tipo | Exemplos | Em entrevista |
| --- | --- | --- |
| Saber de cabeça | SQL básico, PK e FK, por que usar prepared statement, o que é transação, verbos HTTP, git básico | Esquecer isso pesa contra |
| Entender o conceito | Migrations, injeção de dependência, índice, autenticação vs autorização, RAG | Explicar com suas palavras basta |
| Pode consultar | String de conexão do PDO, sintaxe exata de migration, flags de comando, nomes de função de array | Dizer "eu consultaria a doc" é normal |

Quando esquecer algo ao vivo, fale o que você sabe em volta: "não lembro a ordem exata do DSN, mas é o tipo do banco, o host e o nome". Travar em silêncio ou inventar com confiança é o que pega mal.

## PHP moderno

PHP 8 mudou muito. Vaga pede PHP 8+, então código com cara de PHP 5 (sem tipos, arrays soltos para tudo) chama atenção negativa.

- **`declare(strict_types=1);`** no topo do arquivo: o PHP para de converter tipos sozinho. Passar `"10"` onde se espera `int` vira erro, em vez de funcionar por acaso.
- **Tipos em tudo:** parâmetros, retorno e propriedades. `?string` aceita null; `int|string` aceita os dois; `void` não retorna nada.
- **`match`:** um `switch` que devolve valor, compara com `===` e dá erro se nenhum caso bater.
- **Enums (8.1):** um conjunto fechado de valores, em vez de strings soltas como `'ativo'`.
- **`readonly` (8.1):** a propriedade só recebe valor uma vez. Bom para objetos que não devem mudar.
- **Promoção no construtor:** declara e atribui a propriedade direto nos parâmetros.
- **Nullsafe `?->`:** para a cadeia se algo for null, sem precisar de vários `if`.
- **Arrays:** `array_map` transforma, `array_filter` filtra, `array_reduce` acumula. Saber que existem e para que servem; a ordem dos parâmetros pode consultar.

```php
<?php

declare(strict_types=1);

enum StatusPedido: string
{
    case Pendente = 'pendente';
    case Pago = 'pago';
    case Enviado = 'enviado';
}

final class Pedido
{
    public function __construct(
        public readonly int $id,
        public readonly StatusPedido $status,
        public readonly float $total,
    ) {}

    public function rotulo(): string
    {
        return match ($this->status) {
            StatusPedido::Pendente => 'Aguardando pagamento',
            StatusPedido::Pago => 'Pagamento confirmado',
            StatusPedido::Enviado => 'A caminho',
        };
    }
}

$pedidos = [new Pedido(1, StatusPedido::Pago, 120.0), new Pedido(2, StatusPedido::Pendente, 80.0)];
$pagos = array_filter($pedidos, fn (Pedido $p) => $p->status === StatusPedido::Pago);
$total = array_reduce($pagos, fn (float $soma, Pedido $p) => $soma + $p->total, 0.0);
```

**Pergunta comum:** qual a diferença entre `==` e `===`? O primeiro converte tipos antes de comparar (`"1" == 1` é true); o segundo compara valor e tipo (`"1" === 1` é false). Use `===` por padrão.

## Orientação a objetos

A ideia central para júnior: uma classe faz uma coisa, e depende de contratos (interfaces), não de implementações concretas.

- **Classe e objeto:** a classe é o molde; o objeto é o que sai dele com `new`.
- **Visibilidade:** `public` qualquer um acessa; `protected` a classe e as filhas; `private` só a própria classe. Comece tudo `private` e abra só o necessário.
- **Interface:** um contrato que diz o que a classe faz, sem dizer como. Várias classes podem cumprir o mesmo contrato.
- **Herança vs composição:** herança é "é um" (`Gerente extends Funcionario`); composição é "tem um" (a classe recebe outra e usa). Na dúvida, prefira composição: é mais fácil de trocar e de testar.
- **Injeção de dependência:** a classe recebe o que precisa pelo construtor, em vez de criar com `new` lá dentro. É isso que deixa você trocar o envio real de e-mail por um falso no teste.
- **`final`:** impede que alguém herde da classe. Muitos projetos usam por padrão.

```php
interface Notificador
{
    public function enviar(string $para, string $mensagem): void;
}

final class NotificadorEmail implements Notificador
{
    public function enviar(string $para, string $mensagem): void
    {
        // envia e-mail de verdade
    }
}

final class ConfirmarPedido
{
    // recebe o contrato, não a classe concreta
    public function __construct(private Notificador $notificador) {}

    public function executar(Pedido $pedido, string $email): void
    {
        // ... confirma o pedido
        $this->notificador->enviar($email, "Pedido {$pedido->id} confirmado");
    }
}
```

No teste, você passa um `NotificadorFalso` que só guarda as mensagens num array. O `ConfirmarPedido` nem percebe a diferença.

**SOLID em uma frase cada** (só precisa reconhecer os nomes):

1. **S**ingle responsibility: uma classe, um motivo para mudar.
2. **O**pen/closed: estender sem editar o que já funciona.
3. **L**iskov: a classe filha pode substituir a mãe sem quebrar nada.
4. **I**nterface segregation: várias interfaces pequenas em vez de uma gigante.
5. **D**ependency inversion: dependa de interfaces, não de classes concretas (o exemplo acima).

## SQL e banco de dados

SQL é a parte que mais reprova júnior em teste técnico, porque o framework esconde tudo no dia a dia. Esta seção é para saber de cabeça. Para aprofundar, use a aula de SQL (pasta `aula-sql`).

- **Chave primária (PK):** identifica cada linha, única e nunca nula.
- **Chave estrangeira (FK):** aponta para a PK de outra tabela. O banco recusa um pedido de um cliente que não existe.
- **JOIN:** `INNER JOIN` traz só o que tem par nos dois lados; `LEFT JOIN` traz tudo da esquerda, com `NULL` onde não tem par.
- **GROUP BY:** agrupa linhas para somar ou contar. Todo campo no `SELECT` que não está numa função (`COUNT`, `SUM`) precisa estar no `GROUP BY`.
- **WHERE vs HAVING:** `WHERE` filtra linhas antes de agrupar; `HAVING` filtra os grupos depois.
- **Índice:** deixa a busca rápida numa coluna, como o índice de um livro. Custa espaço e deixa a escrita um pouco mais lenta. Crie nas colunas que aparecem muito em `WHERE`, `JOIN` e `ORDER BY`.
- **Transação:** um grupo de operações que acontece inteiro ou não acontece. Exemplo clássico: tirar dinheiro de uma conta e colocar em outra.
- **N+1:** buscar 50 pedidos e depois fazer uma consulta por pedido para buscar o cliente, ou seja, 51 consultas. A solução é buscar tudo junto (JOIN, ou `with()` no Eloquent).

```sql
CREATE TABLE clientes (
    id SERIAL PRIMARY KEY,
    nome TEXT NOT NULL,
    email TEXT NOT NULL UNIQUE
);

CREATE TABLE pedidos (
    id SERIAL PRIMARY KEY,
    cliente_id INTEGER NOT NULL REFERENCES clientes(id),
    total NUMERIC(10, 2) NOT NULL,
    criado_em TIMESTAMP NOT NULL DEFAULT NOW()
);

CREATE INDEX pedidos_cliente_idx ON pedidos (cliente_id);

-- clientes que gastaram mais de 500, do maior para o menor
SELECT c.nome, COUNT(p.id) AS qtd_pedidos, SUM(p.total) AS gasto
FROM clientes c
INNER JOIN pedidos p ON p.cliente_id = c.id
GROUP BY c.id, c.nome
HAVING SUM(p.total) > 500
ORDER BY gasto DESC;
```

**Pergunta comum:** por que dinheiro em `NUMERIC` e não em `FLOAT`? Porque `FLOAT` tem erro de arredondamento (`0.1 + 0.2` não dá exatamente `0.3`). Outra opção comum é guardar em centavos, como inteiro.

## PDO na mão

PDO é a forma nativa do PHP de falar com banco de dados, sem framework. O Eloquent usa PDO por baixo.

- **DSN:** a string que diz qual banco e onde. `pgsql:host=localhost;dbname=loja` ou `sqlite:loja.db`. Pode consultar a sintaxe.
- **Modo de erro por exceção:** faz o erro de SQL virar exceção, e o código para na hora. É o padrão desde o PHP 8.0, mas deixe explícito. No modo silencioso, a consulta falha e o código segue como se tivesse dado certo.
- **Prepared statement:** a consulta vai com marcadores (`?` ou `:nome`) e os valores vão separados. O banco nunca trata o valor como código SQL. **Isso você precisa saber de cabeça**: é a defesa contra SQL injection.
- **Fetch:** `fetch()` pega uma linha, `fetchAll()` pega todas. `FETCH_ASSOC` devolve arrays com o nome da coluna como chave.

```php
$pdo = new PDO('pgsql:host=localhost;dbname=loja', 'usuario', 'senha', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
]);

// ERRADO: o valor entra no SQL. Se $id for "1 OR 1=1", devolve todos os pedidos
$pdo->query("SELECT * FROM pedidos WHERE id = $id");

// CERTO: prepared statement
$stmt = $pdo->prepare('SELECT * FROM pedidos WHERE id = :id AND cliente_id = :cliente');
$stmt->execute(['id' => $id, 'cliente' => $clienteLogado]);
$pedido = $stmt->fetch(); // array ou false se não achar

// Transação: tudo ou nada
try {
    $pdo->beginTransaction();
    $pdo->prepare('UPDATE estoque SET qtd = qtd - 1 WHERE produto_id = ?')->execute([$produtoId]);
    $pdo->prepare('INSERT INTO pedidos (cliente_id, total) VALUES (?, ?)')->execute([$clienteId, $total]);
    $pdo->commit();
} catch (PDOException $e) {
    $pdo->rollBack();
    throw $e;
}
```

**Pergunta comum:** "prepared statement protege de tudo?" Não. Ele protege os **valores**. Nome de tabela, nome de coluna e direção de `ORDER BY` não podem ser marcadores. Se vierem do usuário, valide contra uma lista fixa de opções permitidas.

## HTTP e APIs REST

Toda aplicação web é um servidor respondendo requisições HTTP. Uma requisição tem método, URL, cabeçalhos e às vezes um corpo; a resposta tem status, cabeçalhos e corpo.

| Método | Para quê | Exemplo | Idempotente |
| --- | --- | --- | --- |
| GET | Ler | `GET /pedidos/42` | Sim |
| POST | Criar | `POST /pedidos` | Não |
| PUT | Substituir inteiro | `PUT /pedidos/42` | Sim |
| PATCH | Alterar parte | `PATCH /pedidos/42` | Não garantido |
| DELETE | Apagar | `DELETE /pedidos/42` | Sim |

**Idempotente** = repetir a mesma requisição dá o mesmo resultado. Apagar o pedido 42 duas vezes deixa ele apagado; criar um pedido duas vezes cria dois.

| Status | Quando |
| --- | --- |
| 200 OK | Deu certo, com corpo |
| 201 Created | Criou algo (resposta de POST) |
| 204 No Content | Deu certo, sem corpo (comum em DELETE) |
| 400 Bad Request | Requisição mal formada |
| 401 Unauthorized | Não sei quem você é (falta login) |
| 403 Forbidden | Sei quem você é, mas você não pode |
| 404 Not Found | Não existe |
| 422 Unprocessable Entity | Dados inválidos (erro de validação no Laravel) |
| 500 Internal Server Error | Erro no servidor |

- **Regra dos grupos:** 2xx deu certo, 4xx o cliente errou, 5xx o servidor errou.
- **REST:** URLs são substantivos (`/pedidos`), o verbo é o método HTTP. Nada de `/criarPedido`.
- **Stateless:** cada requisição carrega tudo que o servidor precisa para responder. O servidor não lembra da anterior.
- **Autenticação vs autorização:** autenticação é quem você é (login); autorização é o que você pode fazer (permissão). 401 é falha da primeira; 403 da segunda.
- **Sessão vs token:** no site, o login costuma ficar numa sessão com cookie. Numa API, o cliente manda um token no cabeçalho `Authorization: Bearer ...` a cada requisição.

**Pergunta comum:** "o que acontece quando digito uma URL no navegador?" Resposta curta: o DNS descobre o IP, o navegador abre uma conexão (com TLS, se for HTTPS), manda a requisição, o servidor processa e devolve a resposta, e o navegador desenha a página.

## Laravel essencial

O caminho de uma requisição no Laravel, na ordem:

1. **`public/index.php`** recebe tudo e sobe a aplicação.
2. **Middleware** roda antes: autenticação, CSRF, sessão. Pode barrar a requisição ali mesmo.
3. **Rota** (`routes/web.php` ou `api.php`) decide qual controller chamar.
4. **Form Request** valida os dados. Se falhar, o Laravel devolve o erro (422 na API, redirect com erros no site) e o controller nem roda.
5. **Controller** coordena: chama o model ou uma classe de serviço.
6. **Model (Eloquent)** fala com o banco.
7. **Resposta** volta como view Blade, JSON ou redirect.

- **Eloquent:** cada model é uma tabela. Relações: `hasMany` (cliente tem muitos pedidos), `belongsTo` (pedido pertence a um cliente), `belongsToMany` (com tabela pivô).
- **`with()`:** carrega a relação junto e evita o N+1.
- **Mass assignment:** `$fillable` diz quais campos podem vir de `create($request->all())`. Sem isso, alguém manda `is_admin=1` no formulário.
- **Migrations:** mudanças de schema versionadas, com `up()` para aplicar e `down()` para desfazer. A tabela `migrations` registra quais já rodaram.
- **Service container:** é quem faz a injeção de dependência. Você pede uma interface no construtor e ele entrega a implementação registrada.
- **Filas (queues):** tarefa demorada (e-mail, relatório) vai para um job e roda em segundo plano, sem travar a resposta.
- **`.env`:** configuração que muda por ambiente. Nunca vai para o git.

```php
// routes/web.php
Route::middleware('auth')->group(function () {
    Route::get('/pedidos', [PedidoController::class, 'index']);
    Route::post('/pedidos', [PedidoController::class, 'store']);
});

// app/Http/Requests/StorePedidoRequest.php
final class StorePedidoRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'produto_id' => ['required', 'integer', 'exists:produtos,id'],
            'quantidade' => ['required', 'integer', 'min:1'],
        ];
    }
}

// app/Http/Controllers/PedidoController.php
final class PedidoController extends Controller
{
    public function index(Request $request)
    {
        // só os pedidos do usuário logado, com o produto junto (sem N+1)
        $pedidos = $request->user()->pedidos()->with('produto')->latest()->get();

        return view('pedidos.index', compact('pedidos'));
    }

    public function store(StorePedidoRequest $request)
    {
        $request->user()->pedidos()->create($request->validated());

        return redirect('/pedidos')->with('status', 'Pedido criado.');
    }
}
```

**Pergunta comum:** "por que `$request->validated()` e não `$request->all()`?" Porque `validated()` devolve só os campos que passaram pelas regras. `all()` devolve tudo que o usuário mandou, inclusive o que você não esperava.

## Segurança básica

Para cada ataque, saiba explicar em uma frase o que é e qual é a defesa. É exatamente assim que perguntam.

| Ataque | O que é | Defesa | No Laravel |
| --- | --- | --- | --- |
| SQL injection | O valor do usuário vira parte do comando SQL | Prepared statement | Eloquent e Query Builder já fazem; cuidado com `DB::raw` e `whereRaw` |
| XSS | O usuário salva um `<script>` que roda no navegador dos outros | Escapar a saída (HTML) | `{{ }}` escapa; `{!! !!}` não escapa, use só com conteúdo confiável |
| CSRF | Um site malicioso faz o navegador da vítima enviar um formulário para o seu site, com o login dela | Token secreto em cada formulário | `@csrf` no formulário; o middleware confere |
| Mass assignment | O usuário manda um campo a mais (`is_admin=1`) | Lista do que pode ser preenchido | `$fillable` e `$request->validated()` |
| IDOR | Trocar `/pedidos/42` por `/pedidos/43` e ver o pedido de outra pessoa | Checar se o recurso é do usuário | Policies, ou buscar a partir de `$request->user()` |

- **Senha:** nunca guardar em texto, nunca usar MD5 ou SHA1. Usar `password_hash()` e `password_verify()`. No Laravel, `Hash::make()`.
- **Segredos:** chaves e senhas ficam no `.env`, que nunca vai para o git. Se um segredo vazou num commit, trocar o segredo, não só apagar o commit.
- **Menor privilégio:** cada parte do sistema com o mínimo de permissão que precisa. O usuário de banco da aplicação não precisa poder apagar tabelas.
- **Nunca confie no front-end:** validação no navegador é conforto para o usuário; a validação de verdade é no servidor.

**Pergunta comum:** "qual a diferença entre hash e criptografia?" Criptografia tem volta: com a chave, você recupera o valor original. Hash não tem volta: só dá para comparar. Senha é hash, porque ninguém precisa ler a senha de volta.

## Testes

Júnior que escreve teste se destaca, porque a maioria não escreve. Não precisa saber tudo: precisa saber os dois tipos, o formato e o que testar.

- **Unitário:** testa uma peça sozinha, sem banco e sem HTTP. Rápido. Ex.: a função que calcula o frete.
- **Feature (integração):** testa o caminho inteiro, com rota, banco e resposta. Ex.: "um cliente logado cria um pedido e ele aparece na lista".
- **Padrão AAA:** Arrange (prepara os dados), Act (faz a ação), Assert (confere o resultado). Um teste, um comportamento.
- **O que testar primeiro:** regra de negócio, casos de borda (zero, vazio, negativo, data no futuro) e o que é perigoso errar (quem pode ver o quê).
- **Veja o teste falhar primeiro:** se ele passa antes de você escrever o código, ele não está testando nada.
- **Banco limpo:** no Laravel, `RefreshDatabase` roda cada teste dentro de uma transação e desfaz tudo no final.
- **Factory:** gera dados falsos para o teste (`Pedido::factory()->create()`), sem você montar tudo na mão.

```php
// tests/Feature/PedidoTest.php (Pest)
uses(RefreshDatabase::class);

it('cliente vê só os próprios pedidos', function () {
    // Arrange
    $ana = User::factory()->create();
    $beto = User::factory()->create();
    Pedido::factory()->for($ana)->create(['total' => 100]);
    Pedido::factory()->for($beto)->create(['total' => 999]);

    // Act
    $resposta = $this->actingAs($ana)->get('/pedidos');

    // Assert
    $resposta->assertOk();
    $resposta->assertSee('100');
    $resposta->assertDontSee('999');
});

it('visitante não acessa a lista de pedidos', function () {
    $this->get('/pedidos')->assertRedirect('/login');
});
```

**Pergunta comum:** "o que é mock?" Um objeto falso que substitui uma dependência real no teste, como o envio de e-mail ou uma API externa. Serve para testar sem efeitos colaterais e para conferir se a dependência foi chamada.

## Git no dia a dia

O fluxo de quase toda empresa:

1. Atualizar a `main`: `git checkout main` e `git pull`.
2. Criar uma branch para a tarefa: `git checkout -b feat/lista-de-pedidos`.
3. Trabalhar e fazer commits pequenos: `git add arquivo.php` e `git commit -m "Lista pedidos do cliente logado"`.
4. Mandar para o GitHub: `git push -u origin feat/lista-de-pedidos`.
5. Abrir um Pull Request, esperar o CI e a revisão de alguém.
6. Depois de aprovado, o merge entra na `main`.

- **Commit bom:** pequeno, faz uma coisa, mensagem diz o que muda ("Corrige cálculo de frete para CEP de SP"), não "ajustes".
- **`git status` e `git diff`:** rode antes de todo commit para ver o que vai entrar.
- **Conflito:** duas pessoas mudaram as mesmas linhas. O git marca o trecho com `<<<<<<<`, `=======` e `>>>>>>>`. Você escolhe o que fica, apaga as marcas, faz `git add` e continua.
- **Merge vs rebase:** merge junta as histórias e cria um commit de junção; rebase reaplica seus commits em cima da `main`, deixando a história reta. Nunca faça rebase de branch que outra pessoa já está usando.
- **Desfazer:** `git restore arquivo` descarta mudança não commitada; `git revert <commit>` cria um commit que desfaz outro, sem apagar história. `reset --hard` e `push --force` apagam coisa: só use sabendo o que faz.

**Pergunta comum:** "o que é o `.gitignore`?" A lista de arquivos que o git nunca deve versionar: `.env`, `vendor/`, `node_modules/`, arquivos de log.

## IA para júnior

Vagas com IA esperam que você saiba explicar estes conceitos com suas palavras e saiba onde cada um se encaixa. Os projetos Balcão e Três Jeitos cobrem todos.

| Conceito | O que é | Quando usar |
| --- | --- | --- |
| Prompt engineering | Escrever bem as instruções e o contexto que vão para o modelo | Sempre; é o primeiro passo e o mais barato |
| RAG | Buscar trechos relevantes (de documentos, de um banco) e mandar junto com a pergunta | Quando a resposta depende de conhecimento que o modelo não tem ou que muda |
| Tool calling | O modelo pede para chamar uma função sua (consultar pedido, calcular frete); seu código executa e devolve o resultado | Quando precisa de dado ao vivo ou de uma ação |
| Agente | Um loop: o modelo decide, chama ferramentas, vê o resultado e decide de novo, até responder | Tarefas de vários passos |
| Fine-tuning | Treinar mais um modelo com seus exemplos | Para ensinar estilo e formato; ruim para ensinar fatos |
| Embedding | Transformar texto em uma lista de números, de forma que textos parecidos fiquem próximos | É o que faz a busca do RAG funcionar |
| MCP | Um padrão para expor ferramentas e dados a modelos de IA, para qualquer cliente compatível usar | Quando quer que várias IAs usem as mesmas ferramentas |

- **Alucinação:** o modelo inventa com confiança. Defesas: RAG, mandar responder só com o que as ferramentas devolveram, e permitir "não sei".
- **Segurança:** quem é o usuário vem da sessão, nunca do modelo. O modelo pode ser manipulado pelo texto do usuário (prompt injection), então toda ferramenta filtra os dados no servidor.
- **Dados sensíveis:** pense antes de mandar dado pessoal para uma API externa. Em saúde e finanças, isso tem regra (LGPD).
- **Custo:** você paga por token, tanto do que manda quanto do que recebe. Contexto enorme em toda chamada fica caro rápido.

**Pergunta comum:** "como você usa IA para programar?" Responda com o que é verdade no seu caso: você usa IA para escrever e revisar código, mas escreve os testes antes, revisa o que é crítico linha por linha e entende cada decisão. Mostre que você controla a ferramenta.
