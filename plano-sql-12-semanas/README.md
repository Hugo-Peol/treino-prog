# Plano de SQL: 12 semanas

Uma trilha só de SQL, do `SELECT` às window functions, com 17 exercícios de nível pleno marcados. Todo exercício é um arquivo `.php` que **abre a própria conexão PDO, escrita à mão, sempre**. As tabelas e os dados já estão prontos em `dados/`. No fim de semana, uma prova de SQL no formato de entrevista.

## Subir o banco (uma vez)

Precisa de Docker. Na pasta `plano-sql-12-semanas`:

```powershell
docker compose up -d
docker compose exec -T db psql -U treino -d loja -f /dados/loja.sql
docker compose exec -T db psql -U treino -d clinica -f /dados/clinica.sql
docker compose exec -T db psql -U treino -d empresa -f /dados/empresa.sql
```

O banco `escola` você cria na semana 4. Se quiser pular essa parte:

```powershell
docker compose exec -T db psql -U treino -d escola -f /dados/escola-schema-gabarito.sql
docker compose exec -T db psql -U treino -d escola -f /dados/escola-dados.sql
```

Dados da conexão: host `localhost`, porta **5434** (para não brigar com outro Postgres na 5432), usuário `treino`, senha `treino`, bancos `loja`, `escola`, `clinica` e `empresa`. Senha fixa só porque é banco local de treino.

Estragou os dados? Rode de novo o `-f /dados/<banco>.sql`: ele apaga e recria tudo.

## Os bancos

| Banco | Semanas | Tabelas |
| --- | --- | --- |
| `loja` | 1 a 3 | clientes, categorias, produtos, pedidos, itens_pedido |
| `escola` | 4 a 6 | turmas, professores, disciplinas, aulas, alunos, notas, frequencias |
| `clinica` | 7 a 9 | profissionais, pacientes, consultas, pagamentos |
| `empresa` | 10 a 12 | departamentos, funcionarios, historico_salarios, projetos, alocacoes, vendas |

Dinheiro está sempre em centavos (`_centavos`). Datas da clínica em `TIMESTAMPTZ`, gravadas em UTC.

## As 12 semanas

| Semana | Tema | Banco | Nível | Desafio do fim de semana |
| --- | --- | --- | --- | --- |
| 01 | SELECT e filtros | `loja` | Base | Primeira triagem |
| 02 | JOINs | `loja` | Base | JOINs no editor |
| 03 | Agregação | `loja` | Base | Relatório de vendas |
| 04 | Criar tabelas e restrições | `escola` | Base | Modelagem de biblioteca |
| 05 | Inserir, alterar, apagar e transações | `escola` | Intermediário | Correção de dados em produção |
| 06 | Subconsultas | `escola` | Intermediário | Subconsultas no editor |
| 07 | Datas e horários | `clinica` | Intermediário | Agenda da clínica |
| 08 | Índices e desempenho | `clinica` | Intermediário | A consulta está lenta |
| 09 | CTE e window functions | `clinica` | Avançado | Window functions (nível pleno) |
| 10 | Views, hierarquia e upsert | `empresa` | Avançado | Hierarquia e histórico |
| 11 | Relatórios de negócio | `empresa` | Avançado | Pergunta de negócio aberta |
| 12 | Simulado | `todos` | Simulado | Prova final |

## Regras

1. **Conexão escrita à mão em todo arquivo.** DSN, usuário, senha, modo de exceção, fetch associativo. Nada de `include`.
2. **Prepared statement sempre** que um valor vier de fora (`$argv`, formulário).
3. **Rode e imprima o resultado.** Consulta que você não viu rodar não conta.
4. **Primeiro de memória**, depois consulte a aula ou a documentação do Postgres.
5. **Sem IA escrevendo SQL.**
6. **Cerca de 1h por dia.** Pode ser feito junto com o plano de PHP ou numa época separada.
