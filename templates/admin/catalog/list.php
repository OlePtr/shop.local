<div class="card card-default my-3">
    <div class="card-body">
        <a href="/admin/catalog/add" class="btn btn-success">Добавить товар</a>
    </div>
</div>
<table class="table table-bordered table-hover">
    <colgroup>
        <col>
        <col width="200">
    </colgroup>
    <tr>
        <th>Название</th>
        <th>Действия</th>
    </tr>
<?php
    foreach ($catalog as $item) {
        ?>
            <tr>
                <td>
                    <?= $item["title"]?>
                </td>
                <td>
                    <a class="btn btn-sm btn-primary" href="/admin/catalog/edit/<?= $item["id"]?>">Изменить</a>
                    <a class="btn btn-sm btn-danger" href="/admin/catalog/delete/<?= $item["id"]?>">Удалить</a>
                </td>
            </tr>
        <?php
    }
?>

</table>
