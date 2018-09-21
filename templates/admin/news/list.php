<div class="card card-default my-3">
    <div class="card-body">
        <a href="/admin/news/add" class="btn btn-success">Добавить новость</a>
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
    foreach ($news as $item) {
        ?>
            <tr>
                <td>
                    <?= $item["title"]?>
                </td>
                <td>
                    <a class="btn btn-sm btn-primary" href="/news/<?= $item["id"]?>">Изменить</a>
                    <a class="btn btn-sm btn-danger" href="/news/<?= $item["id"]?>">Удалить</a>
                </td>
            </tr>
        <?php
    }
?>

</table>
