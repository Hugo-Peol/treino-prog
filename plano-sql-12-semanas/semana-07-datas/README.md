# Semana 07 · Datas e horários

**Banco:** `clinica` · **Nível:** Intermediário

Banco `clinica`. As datas estão em `TIMESTAMPTZ`, gravadas em UTC. Quase todo bug de relatório em produção é de data.

Cerca de 1h por dia. Todo `.php` começa vazio e abre a própria conexão PDO, escrita à mão. Exercícios marcados **(pleno)** são de nível pleno: tente, e se travar, siga e volte depois.

## Segunda

- [ ] **1.** Consultas de hoje no horário de São Paulo (`AT TIME ZONE 'America/Sao_Paulo'`). Rode `SET TIME ZONE` diferente e veja o que muda.
  Arquivos: `segunda/01-hoje-sp.php`
- [ ] **2.** Idade de cada paciente (`AGE` e `EXTRACT(YEAR FROM ...)`).
  Arquivos: `segunda/02-idade.php`
- [ ] **3.** Consultas por dia da semana (`EXTRACT(ISODOW ...)`), mostrando o nome do dia.
  Arquivos: `segunda/03-dia-da-semana.php`

## Terça

- [ ] **4.** Consultas dos últimos 30 dias (`NOW() - INTERVAL '30 days'`).
  Arquivos: `terca/01-ultimos-30.php`
- [ ] **5.** Faturamento por mês de 2026 no fuso de São Paulo. Pronto quando uma consulta de 31/03 às 22h (horário local) contar em março, não em abril.
  Arquivos: `terca/02-faturamento-mes.php`
- [ ] **6.** Tempo entre o fim da consulta e o pagamento, em horas, por forma de pagamento.
  Arquivos: `terca/03-tempo-pagamento.php`

## Quarta

- [ ] **7.** `generate_series`: todos os dias de fevereiro de 2026 com a quantidade de consultas, inclusive os dias com zero.
  Arquivos: `quarta/01-dias-com-zero.php`
- [ ] **8.** Cancelamentos em cima da hora: canceladas menos de 24h antes do início.
  Arquivos: `quarta/02-cancelamento-em-cima.php`
- [ ] **9.** Pacientes sem consulta há mais de 60 dias (última consulta realizada).
  Arquivos: `quarta/03-sumidos.php`

## Quinta

- [ ] **10.** Filtro por período vindo por parâmetro (`$argv`) com prepared statement, fim exclusivo.
  Arquivos: `quinta/01-periodo-parametro.php`
- [ ] **11.** **(pleno)** Conflitos de agenda: pares de consultas do mesmo profissional que se sobrepõem (`a.inicio < b.fim AND b.inicio < a.fim`), sem repetir o par. Os dados atuais não têm conflito: insira dois para testar.
  Arquivos: `quinta/02-conflitos.php`
- [ ] **12.** Explique numa nota a diferença entre `TIMESTAMP` e `TIMESTAMPTZ` e por que guardar em UTC.
  Arquivos: `quinta/03-timestamptz.md`

## Sexta

- [ ] **13.** De memória: conexão + consulta por intervalo de datas com parâmetros.
  Arquivos: `sexta/01-de-memoria.php`
- [ ] **14.** **(pleno)** Horários livres de um profissional num dia: com `generate_series` gere os horários de 50 em 50 minutos do expediente e tire os ocupados.
  Arquivos: `sexta/02-horarios-livres.php`

## Revisão de sexta, em voz alta e sem olhar

- [ ] `TIMESTAMP` vs `TIMESTAMPTZ`
- [ ] Como montar a condição de sobreposição
- [ ] Para que serve `generate_series`
- [ ] Por que fim exclusivo
- [ ] `AGE` vs subtrair datas

Errou alguma? Releia a seção correspondente em `aula-sql/aula-sql-junior.md`.

## Desafio do fim de semana

**Agenda da clínica**: veja `desafio/README.md`.
