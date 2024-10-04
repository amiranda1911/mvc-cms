<?php $this->layout('template', ['title' => 'Nova Transação']) ?>

<div>
    <h2>Nova Compra</h2>
    <form action="" method="post">
        <label for="">Peso (em gramas)</label>
        <input type="number" name="amount" id=""/>
        <label for="">Valor em R$</label>
        <input type="number" step="0.01" name="buy-value" id=""/>
        <input type="submit" value="Criar Usuário">
        <input type="hidden" name="csrf" value="<?=$this->e($csrf)?>">
    </form>
</div>