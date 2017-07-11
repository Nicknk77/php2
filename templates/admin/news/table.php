<table class="admin">
    <tr>
        <th>ID</th>
        <th>Дата</th>
        <th>Заголовок</th>
        <th>Текст</th>
        <th>Автор</th>
        <th colspan="2">Действие</th>
    </tr>

    <?php foreach ($this->models as $model): ?>

    <tr>
        <?php foreach ($this->functions as $function): ?>
            <td><?php echo $function($model); ?></td>
        <?php endforeach; ?>

        <td><a href="/admin/news/edit/?id=<?php echo $model->id; ?>">Редактировать</a></td>
        <td><a href="/admin/news/delete/?id=<?php echo $model->id; ?>">Удалить</a></td>
    </tr>

    <?php endforeach;  ?>

</table>
