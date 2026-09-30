# Desafio da semana 02: Validador de CPF

**Formato:** Online, 45 minutos. PHP puro. Pedem ao menos um teste.

Antes de começar, releia as regras em `../REGRAS-DOS-DESAFIOS.md`. Cronometre. Fale em voz alta.

## Enunciado

Escreva uma classe que valida CPF. A entrada pode vir com ou sem máscara (`123.456.789-09` ou `12345678909`). CPFs com todos os dígitos iguais (`111.111.111-11`) são inválidos mesmo passando na conta. Também escreva um método que formata um CPF válido com máscara.

## Requisitos

- [ ] `valido(string $cpf): bool`
- [ ] `formatar(string $cpf): string` (lança exceção se inválido)
- [ ] Pelo menos 5 casos de teste: válido com máscara, válido sem máscara, dígito errado, todos iguais, tamanho errado.

## O que o entrevistador observa neste desafio

- Pesquisar o algoritmo dos dígitos verificadores é permitido; entender e explicar a conta é o que avaliam
- Limpar a entrada antes de validar
- Testes com nomes que dizem o caso

## Arquivos

- `src/Cpf.php`
- `tests/CpfTest.php`
- `NOTAS.md`

## Depois do desafio

Anote em `NOTAS.md`: onde travou, o que perguntou, o que faria com mais tempo. Me mande o código e as notas para revisão.



---

## SÓ PARA O ENTREVISTADOR (não leia antes)


























**Mudança de requisito:** No minuto 30: "agora também precisa aceitar CNPJ. Como você organizaria isso sem duplicar código?" Não precisa terminar o CNPJ; o que contam é o desenho que você propõe (interface `Documento`, por exemplo).
