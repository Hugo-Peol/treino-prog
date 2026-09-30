# Desafio da semana 07: Venda de ingressos

**Formato:** Online, 60 minutos. PHP puro com PDO e Postgres local. Metade código, metade conversa.

Antes de começar, releia as regras em `../REGRAS-DOS-DESAFIOS.md`. Cronometre. Fale em voz alta.

## Enunciado

Um show tem 3 setores com capacidade limitada. Implemente a venda de um ingresso para um setor. O foco da conversa vai ser: e se duas pessoas comprarem o último ingresso ao mesmo tempo?

## Requisitos

- [ ] Tabelas mínimas para setores e ingressos.
- [ ] Função `vender(int $setorId, int $clienteId): int` que devolve o id do ingresso ou lança exceção.
- [ ] Garantia de que nunca vende acima da capacidade, mesmo com duas requisições simultâneas.
- [ ] Explicar a solução escolhida e uma alternativa.

## O que o entrevistador observa neste desafio

- Saber que "SELECT e depois UPDATE" tem corrida
- Usar UPDATE condicional ou `FOR UPDATE`
- Transação com rollback em caso de erro

## Arquivos

- `schema.sql`
- `src/VendaIngresso.php`
- `exemplo.php`
- `NOTAS.md`

## Depois do desafio

Anote em `NOTAS.md`: onde travou, o que perguntou, o que faria com mais tempo. Me mande o código e as notas para revisão.



---

## SÓ PARA O ENTREVISTADOR (não leia antes)


























**Mudança de requisito:** No minuto 40: "meia-entrada é limitada a 40% da capacidade de cada setor. Como você garante isso também sob concorrência?"
