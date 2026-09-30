# Semana 09 · CTE e window functions

**Banco:** `clinica` · **Nível:** Avançado

Banco `clinica`. O que separa júnior de pleno em SQL. Semana com mais exercícios de nível pleno.

Cerca de 1h por dia. Todo `.php` começa vazio e abre a própria conexão PDO, escrita à mão. Exercícios marcados **(pleno)** são de nível pleno: tente, e se travar, siga e volte depois.

## Segunda

- [ ] **1.** Reescreva uma consulta grande da semana 7 usando `WITH` em etapas nomeadas.
  Arquivos: `segunda/01-with.php`
- [ ] **2.** `ROW_NUMBER()`: numere as consultas de cada paciente em ordem de data (`PARTITION BY paciente_id`).
  Arquivos: `segunda/02-row-number.php`
- [ ] **3.** Primeira consulta de cada paciente (`ROW_NUMBER` = 1 numa CTE).
  Arquivos: `segunda/03-primeira-consulta.php`

## Terça

- [ ] **4.** `RANK` vs `DENSE_RANK`: ranking dos profissionais por faturamento no ano.
  Arquivos: `terca/01-rank.php`
- [ ] **5.** **(pleno)** Top 3 pacientes que mais pagaram, por profissional.
  Arquivos: `terca/02-top3-por-profissional.php`
- [ ] **6.** Faturamento acumulado mês a mês (`SUM(...) OVER (ORDER BY mes)`).
  Arquivos: `terca/03-acumulado.php`

## Quarta

- [ ] **7.** `LAG`: dias entre uma consulta e a anterior do mesmo paciente.
  Arquivos: `quarta/01-lag.php`
- [ ] **8.** **(pleno)** Crescimento percentual do faturamento mês contra mês anterior.
  Arquivos: `quarta/02-mes-contra-mes.php`
- [ ] **9.** Média móvel de 3 meses do número de consultas (`ROWS BETWEEN 2 PRECEDING AND CURRENT ROW`).
  Arquivos: `quarta/03-media-movel.php`

## Quinta

- [ ] **10.** **(pleno)** Sequência de faltas: pacientes que faltaram duas consultas seguidas.
  Arquivos: `quinta/01-faltas-seguidas.php`
- [ ] **11.** **(pleno)** Retenção: dos pacientes que começaram em cada mês, quantos ainda tiveram consulta 3 meses depois.
  Arquivos: `quinta/02-retencao.php`
- [ ] **12.** Explique numa nota a diferença entre `GROUP BY` (junta linhas) e window function (mantém as linhas).
  Arquivos: `quinta/03-group-vs-janela.md`

## Sexta

- [ ] **13.** De memória: conexão + `ROW_NUMBER` com `PARTITION BY` numa CTE.
  Arquivos: `sexta/01-de-memoria.php`
- [ ] **14.** Resolva o "top 1 por grupo" de três jeitos: `ROW_NUMBER`, `DISTINCT ON` e subconsulta correlacionada. Compare com `EXPLAIN`.
  Arquivos: `sexta/02-top1-tres-jeitos.php`

## Revisão de sexta, em voz alta e sem olhar

- [ ] `ROW_NUMBER` vs `RANK` vs `DENSE_RANK`
- [ ] O que `PARTITION BY` faz
- [ ] Para que servem `LAG` e `LEAD`
- [ ] Window function vs `GROUP BY`
- [ ] Quando usar CTE

Errou alguma? Releia a seção correspondente em `aula-sql/aula-sql-junior.md`.

## Desafio do fim de semana

**Window functions (nível pleno)**: veja `desafio/README.md`.
