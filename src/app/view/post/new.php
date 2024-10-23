<?php $this->layout('template', ['title' => 'Novo Post']) ?>

<form action="" method="post">
    <input type="hidden" name="csrf" value="<?=$this->e($csrf)?>">
    <div class="mb3">
        <label for="">Titulo</label>
        <input type="text" class="form-control" name="title">
    </div>
    <div class="mb-3">
        <label for="">Conteúdo</label>
        <textarea name="content" id="" class="form-control"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Publicar</button>
</form>