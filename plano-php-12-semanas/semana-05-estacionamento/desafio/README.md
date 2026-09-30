# Desafio da semana 05: Tarifa de estacionamento

**Formato:** Online, 45 minutos. PHP puro. Problema de lógica.

Antes de começar, releia as regras em `../REGRAS-DOS-DESAFIOS.md`. Cronometre. Fale em voz alta.

## Enunciado

Calcule o valor a pagar dado o horário de entrada e de saída. Regras: 15 minutos de tolerância grátis; primeira hora R$ 10; cada hora seguinte R$ 5, fração conta como hora cheia; teto de R$ 50 por dia (a cada 24h o teto reinicia).

## Requisitos

- [ ] `calcular(DateTimeImmutable $entrada, DateTimeImmutable $saida): int` em centavos.
- [ ] Saída antes da entrada lança exceção.
- [ ] Rode e mostre pelo menos: 10 min, 1h, 1h01, 5h30, 30h.

## O que o entrevistador observa neste desafio

- Pensar os casos de borda antes de codar
- Não misturar minutos e horas de um jeito confuso
- Código que o entrevistador consegue acompanhar

## Arquivos

- `src/Tarifa.php`
- `exemplo.php`
- `tests/TarifaTest.php`
- `NOTAS.md`

## Depois do desafio

Anote em `NOTAS.md`: onde travou, o que perguntou, o que faria com mais tempo. Me mande o código e as notas para revisão.



---

## SÓ PARA O ENTREVISTADOR (não leia antes)


























**Mudança de requisito:** No minuto 30: "das 22h às 6h a hora custa metade. Uma permanência pode cruzar esse horário." Não precisa terminar; explique como resolveria.
