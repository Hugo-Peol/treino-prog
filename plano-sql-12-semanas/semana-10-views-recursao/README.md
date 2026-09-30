# Semana 10 · Views, hierarquia e upsert

**Banco:** `empresa` · **Nível:** Avançado

Banco `empresa`. Estruturas que aparecem em sistema de verdade: hierarquia, histórico, views.

Cerca de 1h por dia. Todo `.php` começa vazio e abre a própria conexão PDO, escrita à mão. Exercícios marcados **(pleno)** são de nível pleno: tente, e se travar, siga e volte depois.

## Segunda

- [ ] **1.** Funcionários com o nome do gerente (self join com `LEFT JOIN`, para a diretora aparecer).
  Arquivos: `segunda/01-com-gerente.php`
- [ ] **2.** **(pleno)** Organograma inteiro com `WITH RECURSIVE`: nome, nível e o caminho ("Regina > Caio > ...").
  Arquivos: `segunda/02-organograma.php`
- [ ] **3.** Quantos subordinados diretos e indiretos cada gerente tem.
  Arquivos: `segunda/03-subordinados.php`

## Terça

- [ ] **4.** View `vw_funcionarios_ativos` (sem desligados) com departamento e gerente.
  Arquivos: `terca/01-view.sql`
- [ ] **5.** Salário vigente em uma data qualquer, usando `historico_salarios` (o último `vigente_desde` até a data).
  Arquivos: `terca/02-salario-na-data.php`
- [ ] **6.** **(pleno)** Reajuste médio por departamento: diferença entre o primeiro e o último salário de cada funcionário.
  Arquivos: `terca/03-reajuste-medio.php`

## Quarta

- [ ] **7.** Upsert de alocação: se já existe (funcionário, projeto), atualiza as horas; se não, insere.
  Arquivos: `quarta/01-upsert-alocacao.php`
- [ ] **8.** Funcionários com mais de 40 horas semanais somando todas as alocações.
  Arquivos: `quarta/02-sobrecarga.php`
- [ ] **9.** Projetos atrasados: não concluídos e com `fim_previsto` passado, ou concluídos depois do previsto, com os dias de atraso.
  Arquivos: `quarta/03-atrasados.php`

## Quinta

- [ ] **10.** View materializada do faturamento por vendedor por mês. Atualize com `REFRESH MATERIALIZED VIEW`. Explique numa nota quando vale a pena.
  Arquivos: `quinta/01-view-materializada.sql`, `quinta/01-quando-vale.md`
- [ ] **11.** Trigger que grava em `historico_salarios` sempre que o salário mudar em `funcionarios`.
  Arquivos: `quinta/02-trigger-historico.sql`
- [ ] **12.** Explique numa nota prós e contras de colocar regra de negócio em trigger.
  Arquivos: `quinta/03-trigger-pros-contras.md`

## Sexta

- [ ] **13.** De memória: conexão + `WITH RECURSIVE` simples.
  Arquivos: `sexta/01-de-memoria.php`
- [ ] **14.** Permissões: crie um usuário `relatorio` que só pode ler a view de ativos (`GRANT SELECT`), e teste conectando com ele pelo PDO.
  Arquivos: `sexta/02-usuario-somente-leitura.php`, `sexta/02-grant.sql`

## Revisão de sexta, em voz alta e sem olhar

- [ ] O que é `WITH RECURSIVE`
- [ ] View vs view materializada
- [ ] Como achar o valor vigente numa data
- [ ] Prós e contras de trigger
- [ ] Menor privilégio no banco

Errou alguma? Releia a seção correspondente em `aula-sql/aula-sql-junior.md`.

## Desafio do fim de semana

**Hierarquia e histórico**: veja `desafio/README.md`.
