<?php $this->layout('template', ['title' => 'User Profile']) ?>
<form method="post">
    <label for="">Nome:</label>
    <input type="text" name="name">
    <label>Saldo:</label>
    <input type="number" step="0.01" name="wallet">
    <input type="submit" value="Criar Usuário">
    <input type="hidden" name="csrf" value="<?=$this->e($csrf)?>">
</form>