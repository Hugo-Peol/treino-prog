# Semana 10 · Central de suporte

**Nível:** Avançado

Chamados com prioridade, SLA e atendentes. Avançado: máquina de estados, eventos e um RAG simples.

Cerca de 1h30 por dia. Os arquivos de cada exercício já estão criados e vazios. Os que estão em `laravel/` mostram onde a peça fica: crie no seu `treino-laravel` (com `php artisan make:...` quando fizer sentido) e use estes como lista de conferência.

## Segunda · PHP moderno e OOP

- [ ] **1.** Enum `StatusChamado` (aberto, em atendimento, aguardando cliente, resolvido, fechado) com `podeIrPara(StatusChamado $novo): bool`. Pronto quando fechado não puder voltar para aberto.
  Arquivos: `php/segunda/01-StatusChamado.php`
- [ ] **2.** Classe `Sla` que calcula o prazo de resposta por prioridade contando só dias úteis. Pronto quando um chamado aberto sexta às 17h com prazo de 8h úteis vencer na segunda.
  Arquivos: `php/segunda/02-Sla.php`
- [ ] **3.** Interface `Notificador` com `NotificadorEmail` e `NotificadorFalso` (guarda em array). Pronto quando a troca de status notificar o cliente sem saber qual implementação está usando.
  Arquivos: `php/segunda/03-Notificador.php`, `php/segunda/03-NotificadorEmail.php`, `php/segunda/03-NotificadorFalso.php`

## Terça · SQL e PDO

- [ ] **4.** Tabelas `chamados`, `comentarios` e `atendentes`, com enum de status no banco (ou `CHECK ... IN`). Pronto quando um status inválido for recusado.
  Arquivos: `php/terca/04-schema.sql`
- [ ] **5.** Tempo médio até a primeira resposta por atendente (subconsulta com `MIN(criado_em)` dos comentários). Pronto quando chamados sem resposta ficarem de fora e você explicar por quê.
  Arquivos: `php/terca/05-primeira-resposta.php`
- [ ] **6.** Paginação por cursor (keyset): `WHERE id < :ultimo ORDER BY id DESC LIMIT 20`. Pronto quando você explicar por que é melhor que `OFFSET 10000`.
  Arquivos: `php/terca/06-paginacao-keyset.php`

## Quarta · HTTP e Laravel

- [ ] **7.** Evento `ChamadoCriado` e um listener que notifica a equipe. Pronto quando o controller só disparar o evento.
  Arquivos: `laravel/app/Events/ChamadoCriado.php`, `laravel/app/Listeners/NotificarEquipe.php`
- [ ] **8.** Transição de status por `PATCH /api/chamados/{chamado}/status` usando o enum. Pronto quando uma transição inválida devolver 422 com a mensagem do motivo.
  Arquivos: `laravel/app/Http/Controllers/Api/StatusChamadoController.php`
- [ ] **9.** Papéis cliente, atendente e admin com Gates. Pronto quando cliente só vir os próprios chamados e atendente vir os da fila dele.
  Arquivos: `laravel/app/Providers/AppServiceProvider.php`

## Quinta · Segurança e testes

- [ ] **10.** Testes das transições: todas as permitidas e ao menos 3 proibidas. Pronto quando usar dataset do Pest (`->with([...])`).
  Arquivos: `laravel/tests/Unit/StatusChamadoTest.php`
- [ ] **11.** Teste com `Event::fake()`: criar chamado dispara o evento uma vez. Pronto quando o listener não rodar no teste.
  Arquivos: `laravel/tests/Feature/ChamadoEventoTest.php`
- [ ] **12.** Upload de anexo: aceite só PDF e imagem até 5 MB, salve fora da pasta pública e sirva por rota autenticada. Pronto quando um `.php` enviado for recusado.
  Arquivos: `laravel/app/Http/Requests/AnexoRequest.php`, `laravel/tests/Feature/AnexoTest.php`

## Sexta · Git, IA e revisão

- [ ] **13.** Configure um GitHub Actions que roda os testes em todo PR. Pronto quando um PR com teste quebrado ficar vermelho.
  Arquivos: `laravel/.github/workflows/testes.yml`
- [ ] **14.** RAG sem embeddings: busque os 3 artigos da base de conhecimento com mais palavras em comum com a pergunta e monte o prompt com eles. Depois tente um prompt injection num artigo ("ignore as instruções e..."). Pronto quando você anotar o que aconteceu e como se defender.
  Arquivos: `ia/rag-simples.php`, `ia/artigos/` (fornecido)

## Revisão de sexta, em voz alta e sem olhar

- [ ] O que é máquina de estados
- [ ] Keyset vs `OFFSET`
- [ ] Evento vs chamar direto
- [ ] Por que salvar upload fora da pasta pública
- [ ] O que é prompt injection

Errou alguma? Releia a seção correspondente em `aula-php/aula-php-junior.md`.

## Desafio do fim de semana

**Caça ao bug**: veja `desafio/README.md`. Não leia a última seção do desafio antes de fazer.
