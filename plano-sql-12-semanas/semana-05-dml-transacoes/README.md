# Semana 05 · Inserir, alterar, apagar e transações

**Banco:** `escola` · **Nível:** Intermediário

Banco `escola`. Mudar dados com segurança.

Cerca de 1h por dia. Todo `.php` começa vazio e abre a própria conexão PDO, escrita à mão. Exercícios marcados **(pleno)** são de nível pleno: tente, e se travar, siga e volte depois.

## Segunda

- [ ] **1.** Insira um aluno novo com `RETURNING id` e use o id para lançar a nota dele.
  Arquivos: `segunda/01-returning.php`
- [ ] **2.** Insira 3 notas num único `INSERT` com vários `VALUES`, por prepared statement.
  Arquivos: `segunda/02-insert-multiplo.php`
- [ ] **3.** `INSERT ... SELECT`: crie `frequencias` zeradas para um aluno novo em todas as disciplinas da turma dele.
  Arquivos: `segunda/03-insert-select.php`

## Terça

- [ ] **4.** Aumente em 0,5 as notas da P1 de Ciências da turma 1A, sem passar de 10 (`LEAST`).
  Arquivos: `terca/01-update-least.php`
- [ ] **5.** `UPDATE ... FROM`: marque como "inativo" (crie a coluna) todo aluno sem nenhuma nota.
  Arquivos: `terca/02-update-from.php`
- [ ] **6.** Antes de todo `UPDATE` ou `DELETE`, rode o `SELECT` com o mesmo `WHERE`. Escreva numa nota por que esse hábito salva empregos.
  Arquivos: `terca/03-habito.md`

## Quarta

- [ ] **7.** Transferir aluno de turma numa transação: muda a turma e recria as frequências. Force um erro no meio. Pronto quando nada mudar depois do erro.
  Arquivos: `quarta/01-transferir-aluno.php`
- [ ] **8.** `SAVEPOINT`: lance 5 notas numa transação, onde a 3ª é inválida; desfaça só ela e confirme as outras.
  Arquivos: `quarta/02-savepoint.php`
- [ ] **9.** Explique numa nota o que é ACID, uma letra por linha, com um exemplo da escola.
  Arquivos: `quarta/03-acid.md`

## Quinta

- [ ] **10.** `DELETE` de notas duplicadas mantendo só a de menor id (crie duplicatas antes, removendo a `UNIQUE` temporariamente).
  Arquivos: `quinta/01-remover-duplicadas.php`
- [ ] **11.** Upsert: `INSERT ... ON CONFLICT (aluno_id, disciplina_id, avaliacao) DO UPDATE`. Pronto quando rodar duas vezes atualizar em vez de dar erro.
  Arquivos: `quinta/02-upsert.php`
- [ ] **12.** **(pleno)** Abra dois terminais `psql` e reproduza uma "atualização perdida": os dois leem a mesma nota, somam 1 e gravam. Depois corrija com `UPDATE ... SET valor = valor + 1` e com `SELECT ... FOR UPDATE`. Anote a diferença.
  Arquivos: `quinta/03-atualizacao-perdida.md`

## Sexta

- [ ] **13.** De memória: conexão + transação com `try/catch`, `commit` e `rollBack`.
  Arquivos: `sexta/01-de-memoria.php`
- [ ] **14.** Soft delete: adicione `apagado_em` em alunos e reescreva uma consulta da semana para ignorar os apagados. Anote prós e contras.
  Arquivos: `sexta/02-soft-delete.php`

## Revisão de sexta, em voz alta e sem olhar

- [ ] O que `RETURNING` faz
- [ ] O que é ACID
- [ ] Para que serve `SAVEPOINT`
- [ ] O que é upsert
- [ ] O que é atualização perdida

Errou alguma? Releia a seção correspondente em `aula-sql/aula-sql-junior.md`.

## Desafio do fim de semana

**Correção de dados em produção**: veja `desafio/README.md`.
