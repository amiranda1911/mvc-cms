<?php $this->layout('template', ['title' => 'Usuários']) ?>

<table>
    <tr>
        <th>Nome</th><th>Quantidade</th><th>Saldo</th>
    </tr>
    <?php foreach ($users as $user): ?>
        <tr>
            <td>
                <a href="/user/view/<?= $user['id']; ?>"><?= $user['name']; ?></a>   
            </td>
            <td>
                <?= $user['amount']; ?>
            </td>
            <td>
                <?= $user['wallet']; ?>
            </td>
            <td><a href="/transaction/create/<?= $user['id']; ?>">Realizar compra</a></td>
        </tr>
    <?php endforeach; ?>
</table>
<a href="/user/create">Adicionar usuário</a>