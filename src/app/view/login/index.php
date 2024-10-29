<?php $this->layout('template', ['title' => 'Novo Post']) ?>

<div class="col">  
<form method="post" action="/login">
  <input type="hidden" name="csrf" value="<?=$this->e($csrf)?>">
  <div class="mb-3">
    <label for="inputEmail" class="form-label">Email</label>
    <input type="email" name="email" class="form-control" id="inputEmail" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="inputPassword" class="form-label">Senha</label>
    <input type="password" name="password" class="form-control" id="inputPassword">
  </div>
  <button type="submit" class="btn btn-primary">Login</button>
</form>
</div>