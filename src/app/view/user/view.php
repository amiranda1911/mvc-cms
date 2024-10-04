<?php $this->layout('template', ['title' => 'User Profile']) ?>
<div>
    
    <h1>Nome:<?= $this->e($name)?></h1>
    <h2>Quantidade:<?= $this->e($weigth)?></h2>
</div>