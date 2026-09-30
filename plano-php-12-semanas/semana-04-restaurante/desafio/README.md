# Desafio da semana 04: Refatorar código legado

**Formato:** Presencial, no notebook da empresa, 60 minutos. O entrevistador fica ao lado.

Antes de começar, releia as regras em `../REGRAS-DOS-DESAFIOS.md`. Cronometre. Fale em voz alta.

## Enunciado

O arquivo `legado.php` (já fornecido nesta pasta) funciona, mas foi escrito há anos. Refatore para PHP moderno sem mudar o comportamento. Explique cada mudança enquanto faz.

## Requisitos

- [ ] Antes de mudar qualquer coisa, diga como vai garantir que o comportamento não mudou.
- [ ] Separe acesso ao banco, regra de negócio e saída.
- [ ] Tipos e `strict_types`.
- [ ] Aponte tudo que for problema de segurança.

## O que o entrevistador observa neste desafio

- Achar a SQL injection e o `==` perigoso sozinho, sem dica
- Mudanças pequenas e seguras, uma por vez
- Não reescrever tudo do zero

## Arquivos

- `legado.php` (fornecido)
- `refatorado/PedidoRepository.php`
- `refatorado/CalculadoraDesconto.php`
- `refatorado/index.php`
- `NOTAS.md`

## Depois do desafio

Anote em `NOTAS.md`: onde travou, o que perguntou, o que faria com mais tempo. Me mande o código e as notas para revisão.



---

## SÓ PARA O ENTREVISTADOR (não leia antes)


























**Mudança de requisito:** No minuto 40: "a gerente pediu para o desconto de cliente VIP subir de 10% para 15%. Quantos lugares você precisa mudar agora, depois da sua refatoração?" A resposta boa é: um.
