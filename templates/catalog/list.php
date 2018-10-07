<?php
    foreach ($news as $item) {
        ?>
            <article style="border-bottom: 1px dashed;">
                <h2><?= $item["title"]?></h2>
                <p><?= $item["content"]?></p>
                <a href="/news/<?= $item["id"]?>">Подробнее о продукте</a>
            </article>
        <?php
    }
?>