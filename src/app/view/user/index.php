<?php $this->layout('template', ['title' => 'Usuários']) ?>

<table class="table">
    <tr>
        <th>Nome</th><th>Email</th>
    </tr>
    <?php foreach ($users as $user): ?>
        <tr>
            <td>
                <a href="/user/view/<?= $user['id']; ?>"><?= $user['name']; ?></a>   
            </td>
            <td>
                <?= $user['email']; ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<a href="/user/create">Adicionar usuário</a>