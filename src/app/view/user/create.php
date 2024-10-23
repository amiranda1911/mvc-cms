<?php $this->layout('template', ['title' => 'User Profile']) ?>
<form method="post">
    <div class="mb-3">
        <label for="" class="form-label">Nome:</label>
        <input type="text" name="name" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Email:</label>
        <input type="email" name="email" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Senha:</label>
        <input type="password" name="password" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Criar Novo Usuário</button>
    <input type="hidden" name="csrf" value="<?=$this->e($csrf)?>">
</form>