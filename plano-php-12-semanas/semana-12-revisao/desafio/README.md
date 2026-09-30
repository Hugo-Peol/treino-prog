# Desafio da semana 12: Simulado completo

**Formato:** Online, 90 minutos em três blocos, como um processo seletivo real de júnior.

Antes de começar, releia as regras em `../REGRAS-DOS-DESAFIOS.md`. Cronometre. Fale em voz alta.

## Enunciado

Bloco 1 (20 min): perguntas técnicas da lista `perguntas-entrevista.md` da semana 12. Bloco 2 (60 min): live coding de uma API de reserva de salas de reunião em Laravel. Bloco 3 (10 min): suas perguntas para a empresa.

## Requisitos

- [ ] Salas têm nome e capacidade.
- [ ] Reserva tem sala, início, fim e responsável.
- [ ] Não pode haver duas reservas da mesma sala no mesmo horário.
- [ ] Listar reservas de uma sala num dia.
- [ ] Pelo menos um teste do conflito de horário.
- [ ] Bloco 3: tenha 3 perguntas prontas sobre o time, o código e como avaliam júnior.

## O que o entrevistador observa neste desafio

- Tudo que foi treinado nas 12 semanas
- Postura: calma, clareza, honestidade sobre o que não sabe

## Arquivos

- `app/Models/Sala.php`
- `app/Models/Reserva.php`
- `app/Http/Controllers/Api/ReservaController.php`
- `app/Http/Requests/StoreReservaRequest.php`
- `tests/Feature/ReservaConflitoTest.php`
- `perguntas-para-a-empresa.md`
- `NOTAS.md`

## Depois do desafio

Anote em `NOTAS.md`: onde travou, o que perguntou, o que faria com mais tempo. Me mande o código e as notas para revisão.



---

## SÓ PARA O ENTREVISTADOR (não leia antes)


























**Mudança de requisito:** No minuto 45 do bloco 2: "reservas agora podem se repetir toda semana. Não implemente; desenhe como ficaria no banco."
