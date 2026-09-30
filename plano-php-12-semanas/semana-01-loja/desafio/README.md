# Desafio da semana 01: Carrinho com cupons

**Formato:** Online, câmera ligada e tela compartilhada. 60 minutos. PHP puro, sem framework.

Antes de começar, releia as regras em `../REGRAS-DOS-DESAFIOS.md`. Cronometre. Fale em voz alta.

## Enunciado

Implemente um carrinho de compras. O carrinho tem itens (produto, preço unitário em centavos, quantidade) e pode receber um cupom. Existem dois tipos de cupom: percentual (ex.: 10% de desconto) e valor fixo (ex.: R$ 20 de desconto). O frete é R$ 15, grátis acima de R$ 200 (depois do desconto).

## Requisitos

- [ ] Adicionar item, remover item e alterar quantidade.
- [ ] Aplicar um cupom (só um por vez).
- [ ] Calcular subtotal, desconto, frete e total.
- [ ] O total nunca fica negativo.
- [ ] Um script que monta um carrinho de exemplo e imprime o resumo.

## O que o entrevistador observa neste desafio

- Uso de centavos em vez de float
- Cupons como classes com a mesma interface
- Casos de borda: carrinho vazio, cupom maior que o subtotal, exatamente R$ 200

## Arquivos

- `src/Carrinho.php`
- `src/Item.php`
- `src/Cupom.php`
- `src/CupomPercentual.php`
- `src/CupomValorFixo.php`
- `exemplo.php`
- `tests/CarrinhoTest.php`
- `NOTAS.md`

## Depois do desafio

Anote em `NOTAS.md`: onde travou, o que perguntou, o que faria com mais tempo. Me mande o código e as notas para revisão.



---

## SÓ PARA O ENTREVISTADOR (não leia antes)


























**Mudança de requisito:** No minuto 35: "o cliente mudou a regra. Cupom de valor fixo não vale junto com frete grátis: se usar cupom de valor fixo, o frete é sempre cobrado."
