-- GABARITO da modelagem da semana 4. Só abra depois de fazer a sua.
-- Se a sua ficou diferente, tudo bem, desde que os dados de escola-dados.sql entrem.

DROP TABLE IF EXISTS frequencias, notas, alunos, aulas, disciplinas, professores, turmas CASCADE;

CREATE TABLE turmas (
    id SERIAL PRIMARY KEY,
    codigo TEXT NOT NULL,
    ano INTEGER NOT NULL,
    turno TEXT NOT NULL CHECK (turno IN ('manhã', 'tarde', 'noite')),
    UNIQUE (codigo, ano)
);

CREATE TABLE professores (
    id SERIAL PRIMARY KEY,
    nome TEXT NOT NULL,
    email TEXT NOT NULL UNIQUE
);

CREATE TABLE disciplinas (
    id SERIAL PRIMARY KEY,
    nome TEXT NOT NULL UNIQUE,
    carga_semanal INTEGER NOT NULL CHECK (carga_semanal > 0)
);

CREATE TABLE aulas (
    id SERIAL PRIMARY KEY,
    turma_id INTEGER NOT NULL REFERENCES turmas(id),
    disciplina_id INTEGER NOT NULL REFERENCES disciplinas(id),
    professor_id INTEGER NOT NULL REFERENCES professores(id),
    UNIQUE (turma_id, disciplina_id)
);

CREATE TABLE alunos (
    id SERIAL PRIMARY KEY,
    nome TEXT NOT NULL,
    data_nascimento DATE NOT NULL,
    turma_id INTEGER NOT NULL REFERENCES turmas(id),
    email_responsavel TEXT
);

CREATE TABLE notas (
    id SERIAL PRIMARY KEY,
    aluno_id INTEGER NOT NULL REFERENCES alunos(id) ON DELETE CASCADE,
    disciplina_id INTEGER NOT NULL REFERENCES disciplinas(id),
    avaliacao TEXT NOT NULL,
    valor NUMERIC(3, 1) NOT NULL CHECK (valor BETWEEN 0 AND 10),
    data_avaliacao DATE NOT NULL,
    UNIQUE (aluno_id, disciplina_id, avaliacao)
);

CREATE TABLE frequencias (
    aluno_id INTEGER NOT NULL REFERENCES alunos(id) ON DELETE CASCADE,
    disciplina_id INTEGER NOT NULL REFERENCES disciplinas(id),
    aulas_dadas INTEGER NOT NULL CHECK (aulas_dadas >= 0),
    presencas INTEGER NOT NULL CHECK (presencas >= 0),
    PRIMARY KEY (aluno_id, disciplina_id),
    CHECK (presencas <= aulas_dadas)
);
