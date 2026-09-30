# Desafio da semana 09: Encurtador de URL com IA permitida

**Formato:** Online, 60 minutos. IA PERMITIDA (ChatGPT, Claude ou Copilot), com a tela compartilhada o tempo todo. Formato que algumas empresas já usam.

Antes de começar, releia as regras em `../REGRAS-DOS-DESAFIOS.md`. Cronometre. Fale em voz alta.

## Enunciado

Construa um encurtador de URL: recebe uma URL longa, devolve um código curto; acessar o código redireciona para a URL. Conte quantos acessos cada link teve.

## Requisitos

- [ ] `POST /encurtar` devolve o código.
- [ ] `GET /{codigo}` redireciona com 302 ou devolve 404.
- [ ] Validar que a entrada é uma URL `http` ou `https`.
- [ ] Contador de acessos.
- [ ] Você explica cada linha que a IA gerou, se perguntarem.

## O que o entrevistador observa neste desafio

- Os prompts que você escreve: claros, com contexto e restrições
- Você lê e questiona o que a IA gerou, em vez de colar
- Você pega erros da IA (ex.: código curto que pode colidir, URL `javascript:` aceita)
- Você continua no controle do desenho

## Arquivos

- `NOTAS.md`
- `prompts-usados.md`

## Depois do desafio

Anote em `NOTAS.md`: onde travou, o que perguntou, o que faria com mais tempo. Me mande o código e as notas para revisão.



---

## SÓ PARA O ENTREVISTADOR (não leia antes)


























**Mudança de requisito:** No minuto 40: o entrevistador aponta uma linha gerada pela IA e pergunta "por que isso está aqui? o que acontece se eu tirar?". Depois: "dois usuários podem receber o mesmo código?"
