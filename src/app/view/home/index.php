<?php $this->layout('template', ['title' => 'CMS']) ?>

<section id="posts">
<?php foreach ($posts as $post):?>
    <article class="post">
        <h2><a href="/post/view/<?= $post['id'] ?>"><?= $post['title'] ?></a></h2>
        <p><?= $post['content'] ?></p>

    </article>

<?php endforeach; ?>

</section>


