# Desafio da semana 11: Horários livres (pair programming)

**Formato:** Online, 45 minutos, em dupla com o entrevistador: ele também digita e dá sugestões. Avaliam colaboração.

Antes de começar, releia as regras em `../REGRAS-DOS-DESAFIOS.md`. Cronometre. Fale em voz alta.

## Enunciado

Dado o expediente de um profissional (ex.: 08:00 às 18:00, almoço 12:00 às 13:00), a duração das consultas (ex.: 50 min) e a lista de consultas já marcadas, devolva os horários em que dá para marcar uma consulta nova.

## Requisitos

- [ ] Função `horariosLivres(...): array` de strings `HH:MM`.
- [ ] Consultas marcadas podem vir fora de ordem.
- [ ] Nenhum horário pode invadir almoço, outra consulta ou o fim do expediente.
- [ ] Casos de teste combinados com o entrevistador.

## O que o entrevistador observa neste desafio

- Ouvir e aceitar sugestões sem perder o rumo
- Discordar com educação e argumento quando a sugestão é pior
- Dividir o problema: primeiro intervalos ocupados, depois os buracos

## Arquivos

- `src/Agenda.php`
- `tests/AgendaTest.php`
- `NOTAS.md`

## Depois do desafio

Anote em `NOTAS.md`: onde travou, o que perguntou, o que faria com mais tempo. Me mande o código e as notas para revisão.



---

## SÓ PARA O ENTREVISTADOR (não leia antes)


























**Mudança de requisito:** No minuto 30: o entrevistador sugere uma solução que ignora o almoço de propósito. Veja se você percebe e como fala isso.
