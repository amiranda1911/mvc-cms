<?php $this->layout('template', ['title' => 'CMS - '.$post['title']]) ?>
<div>
    <article>
        <h2><?= $post['title'] ?></h2>
        <p>Por <a href="/user/view/<?= $user['id'] ?>"><?= $user['name'] ?></a></p>
        <p><?= $post['content'] ?></p>
    </article>
</div>