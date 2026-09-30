# Desafio da semana 08: A consulta está lenta

**Formato:** Conversa técnica, 30 minutos. Te mostram uma consulta e o plano de execução.

**Banco:** `clinica`

Antes de começar, releia as regras em `../REGRAS-DOS-DESAFIOS-SQL.md`. Cronometre. Fale em voz alta.

## Perguntas

1. Rode, com o volume da semana 8: `SELECT * FROM consultas WHERE DATE(inicio) = '2026-03-10' AND profissional_id = 2 ORDER BY inicio`. Explique o plano.
2. O que você mudaria na consulta?
3. Que índice criaria, e em que ordem de colunas?
4. Mostre o plano depois da mudança e compare o tempo.

## Arquivos

- `respostas.php`: conexão PDO escrita à mão e uma consulta por pergunta.
- `respostas-papel.sql`: quando o formato for papel ou quadro, escreva aqui antes de rodar.
- `NOTAS.md`: o que travou, o que faria diferente.

## Depois do desafio

Anote em `NOTAS.md`: onde travou, o que perguntou, o que faria com mais tempo. Me mande o código e as notas para revisão.



---

## SÓ PARA O ENTREVISTADOR (não leia antes)


























**Mudança de requisito:** No minuto 20: "essa tabela recebe 5 mil inserções por minuto. Isso muda sua decisão de índice?"
