# Desafio da semana 03: API de tarefas

**Formato:** Online, 90 minutos. Laravel já instalado pela empresa (você recebe o projeto vazio). Pode usar `php artisan make:*`.

Antes de começar, releia as regras em `../REGRAS-DOS-DESAFIOS.md`. Cronometre. Fale em voz alta.

## Enunciado

Crie uma API REST de tarefas. Cada tarefa tem título, descrição opcional e se está concluída. Não precisa de login.

## Requisitos

- [ ] `GET /api/tarefas` lista, com filtro opcional `?concluida=true|false`.
- [ ] `POST /api/tarefas` cria (título obrigatório, até 120 caracteres).
- [ ] `PATCH /api/tarefas/{id}` atualiza.
- [ ] `DELETE /api/tarefas/{id}` apaga.
- [ ] Status HTTP corretos (200, 201, 204, 404, 422).
- [ ] Pelo menos 3 testes de feature.

## O que o entrevistador observa neste desafio

- Form Request em vez de validar no controller
- API Resource ou resposta consistente
- Status certos
- Testes cobrindo erro, não só sucesso

## Arquivos

- `app/Models/Tarefa.php`
- `app/Http/Controllers/Api/TarefaController.php`
- `app/Http/Requests/StoreTarefaRequest.php`
- `app/Http/Requests/UpdateTarefaRequest.php`
- `app/Http/Resources/TarefaResource.php`
- `database/migrations/create_tarefas_table.php`
- `routes/api.php`
- `tests/Feature/TarefaApiTest.php`
- `NOTAS.md`

## Depois do desafio

Anote em `NOTAS.md`: onde travou, o que perguntou, o que faria com mais tempo. Me mande o código e as notas para revisão.



---

## SÓ PARA O ENTREVISTADOR (não leia antes)


























**Mudança de requisito:** No minuto 55: "tarefas agora têm prazo (data opcional). Adicione o filtro `?atrasadas=true`, que traz as não concluídas com prazo vencido."
