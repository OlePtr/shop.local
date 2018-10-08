<?php
    foreach ($catalog as $item) {
        //print_r($item);
        ?>
            <article style="border-bottom: 1px dashed;">

                <h2><?= $item["title"]?></h2>
                <p><?= $item["description"]?></p>
                <a href="/catalog/<?= $item["id"]?>">Подробнее о продукте</a>
            </article>
        <?php
    }
?>