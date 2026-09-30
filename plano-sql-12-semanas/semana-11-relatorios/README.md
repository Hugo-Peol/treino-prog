# Semana 11 · Relatórios de negócio

**Banco:** `empresa` · **Nível:** Avançado

Banco `empresa`. Perguntas do jeito que o gestor faz, sem dizer qual SQL usar. Metade dos exercícios é de nível pleno.

Cerca de 1h por dia. Todo `.php` começa vazio e abre a própria conexão PDO, escrita à mão. Exercícios marcados **(pleno)** são de nível pleno: tente, e se travar, siga e volte depois.

## Segunda

- [ ] **1.** "Quanto cada departamento gasta de folha por mês, e quanto isso representa do orçamento anual?"
  Arquivos: `segunda/01-folha-orcamento.php`
- [ ] **2.** "Quem ganha acima da média do próprio cargo?"
  Arquivos: `segunda/02-acima-media-cargo.php`
- [ ] **3.** **(pleno)** "Tabela de vendas: uma linha por vendedor, uma coluna por trimestre de 2025, e o total."
  Arquivos: `segunda/03-pivot-trimestre.php`

## Terça

- [ ] **4.** "Qual cliente comprou mais em 2025, e qual a participação dele no total?"
  Arquivos: `terca/01-maior-cliente.php`
- [ ] **5.** **(pleno)** "Curva ABC dos clientes: quem soma os primeiros 80% do faturamento é A, os próximos 15% é B, o resto é C."
  Arquivos: `terca/02-curva-abc.php`
- [ ] **6.** "Vendedores que não venderam nada em algum mês de 2025."
  Arquivos: `terca/03-mes-sem-venda.php`

## Quarta

- [ ] **7.** **(pleno)** "Tempo médio de casa dos desligados e dos ativos, por departamento."
  Arquivos: `quarta/01-tempo-de-casa.php`
- [ ] **8.** "Turnover do ano: desligados sobre a média de funcionários." Explique numa nota a fórmula que você usou.
  Arquivos: `quarta/02-turnover.php`, `quarta/02-formula.md`
- [ ] **9.** "Custo mensal de cada projeto, proporcional às horas alocadas de cada pessoa."
  Arquivos: `quarta/03-custo-projeto.php`

## Quinta

- [ ] **10.** **(pleno)** "Vendedor do mês: o que mais vendeu em cada mês de 2025, com empate aparecendo os dois."
  Arquivos: `quinta/01-vendedor-do-mes.php`
- [ ] **11.** Exporte o relatório de terça (curva ABC) para CSV com cabeçalho.
  Arquivos: `quinta/02-exportar.php`
- [ ] **12.** Revise suas consultas da semana procurando: divisão inteira, `NULL` em soma, data sem fuso, `JOIN` que duplica linha. Anote o que achou.
  Arquivos: `quinta/03-revisao-armadilhas.md`

## Sexta

- [ ] **13.** De memória: conexão + um relatório com CTE, `FILTER` e window function.
  Arquivos: `sexta/01-de-memoria.php`
- [ ] **14.** Escreva cada relatório da semana numa frase para um gestor, com o número principal. Pronto quando quem não sabe SQL entender.
  Arquivos: `sexta/02-para-o-gestor.md`

## Revisão de sexta, em voz alta e sem olhar

- [ ] Como virar linhas em colunas
- [ ] O que é curva ABC em SQL
- [ ] Por que `JOIN` pode duplicar soma
- [ ] Como tratar empate em top 1
- [ ] Como explicar número para quem não é técnico

Errou alguma? Releia a seção correspondente em `aula-sql/aula-sql-junior.md`.

## Desafio do fim de semana

**Pergunta de negócio aberta**: veja `desafio/README.md`.
