# Desafio da semana 08: Transferência simplificada

**Formato:** Online, 90 minutos. Laravel. Versão curta do desafio clássico de backend de fintech.

Antes de começar, releia as regras em `../REGRAS-DOS-DESAFIOS.md`. Cronometre. Fale em voz alta.

## Enunciado

Existem dois tipos de usuário: comum e lojista. Ambos têm carteira com saldo. Comum pode enviar dinheiro para comum ou lojista; lojista só recebe. Implemente `POST /api/transferencias` com `pagador`, `recebedor` e `valor`.

## Requisitos

- [ ] Validar saldo e tipo de usuário.
- [ ] A transferência é atômica: ou debita e credita, ou nada.
- [ ] Antes de concluir, consultar um autorizador externo (simule com uma classe que você injeta).
- [ ] Respostas de erro claras em JSON.
- [ ] Testes do caminho feliz e de dois erros.

## O que o entrevistador observa neste desafio

- Transação no banco
- Autorizador atrás de uma interface, falso no teste
- Dinheiro em centavos
- Não confiar no `pagador` vindo do corpo sem pensar em autenticação (fale sobre isso)

## Arquivos

- `app/Models/Carteira.php`
- `app/Services/Transferir.php`
- `app/Contracts/Autorizador.php`
- `app/Services/AutorizadorFalso.php`
- `app/Http/Controllers/Api/TransferenciaController.php`
- `tests/Feature/TransferenciaTest.php`
- `NOTAS.md`

## Depois do desafio

Anote em `NOTAS.md`: onde travou, o que perguntou, o que faria com mais tempo. Me mande o código e as notas para revisão.



---

## SÓ PARA O ENTREVISTADOR (não leia antes)


























**Mudança de requisito:** No minuto 60: "depois da transferência, o recebedor deve ser notificado por um serviço que às vezes fica fora do ar. A transferência não pode falhar por causa disso." (Resposta esperada: fila e retry.)
