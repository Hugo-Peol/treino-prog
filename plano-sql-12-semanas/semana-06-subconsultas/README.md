# Semana 06 · Subconsultas

**Banco:** `escola` · **Nível:** Intermediário

Banco `escola`. Consultas dentro de consultas.

Cerca de 1h por dia. Todo `.php` começa vazio e abre a própria conexão PDO, escrita à mão. Exercícios marcados **(pleno)** são de nível pleno: tente, e se travar, siga e volte depois.

## Segunda

- [ ] **1.** Alunos com alguma nota abaixo de 5 (`IN` com subconsulta).
  Arquivos: `segunda/01-in.php`
- [ ] **2.** Alunos com nota acima da média geral da escola (subconsulta escalar).
  Arquivos: `segunda/02-acima-media.php`
- [ ] **3.** Disciplinas em que ninguém tirou 10 (`NOT EXISTS`).
  Arquivos: `segunda/03-not-exists.php`

## Terça

- [ ] **4.** Para cada aluno, a média dele e a média da turma dele, lado a lado (subconsulta correlacionada).
  Arquivos: `terca/01-correlacionada.php`
- [ ] **5.** Alunos acima da média da própria turma.
  Arquivos: `terca/02-acima-da-turma.php`
- [ ] **6.** Subconsulta no `FROM` (tabela derivada): média por aluno e depois quantos alunos em cada faixa (0-5, 5-7, 7-10).
  Arquivos: `terca/03-tabela-derivada.php`

## Quarta

- [ ] **7.** Reprovados: média abaixo de 6 **ou** frequência abaixo de 75% em alguma disciplina.
  Arquivos: `quarta/01-reprovados.php`
- [ ] **8.** O professor com mais alunos (considerando as aulas que ele dá).
  Arquivos: `quarta/02-professor-mais-alunos.php`
- [ ] **9.** Alunos que têm todas as notas lançadas (2 avaliações em cada uma das 5 disciplinas). Pronto quando o aluno com notas faltando ficar de fora.
  Arquivos: `quarta/03-notas-completas.php`

## Quinta

- [ ] **10.** Reescreva a consulta de segunda (`IN`) com `EXISTS` e com `JOIN` + `DISTINCT`. Compare os resultados.
  Arquivos: `quinta/01-tres-formas.php`
- [ ] **11.** Cuidado com `NOT IN` e `NULL`: monte um exemplo em que `NOT IN` devolve zero linhas por causa de um `NULL`. Explique numa nota.
  Arquivos: `quinta/02-not-in-null.php`, `quinta/02-not-in-null.md`
- [ ] **12.** **(pleno)** Boletim completo de um aluno numa só consulta: disciplina, P1, P2, média, frequência e situação (aprovado, recuperação, reprovado). Dica: `FILTER` ou `CASE` para virar as avaliações em colunas.
  Arquivos: `quinta/03-boletim.php`

## Sexta

- [ ] **13.** De memória: conexão + uma consulta com `NOT EXISTS` e parâmetro.
  Arquivos: `sexta/01-de-memoria.php`
- [ ] **14.** Escreva numa nota quando você prefere subconsulta e quando prefere `JOIN`.
  Arquivos: `sexta/02-subconsulta-vs-join.md`

## Revisão de sexta, em voz alta e sem olhar

- [ ] `IN` vs `EXISTS`
- [ ] O perigo do `NOT IN` com `NULL`
- [ ] O que é subconsulta correlacionada
- [ ] O que é tabela derivada
- [ ] Como virar linhas em colunas

Errou alguma? Releia a seção correspondente em `aula-sql/aula-sql-junior.md`.

## Desafio do fim de semana

**Subconsultas no editor**: veja `desafio/README.md`.
