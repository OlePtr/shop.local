<div class="card card-default">
    <div class="card-header">
        Заполните форму
    </div>
    <div class="card-body">
        <form action="<?= $formAction?>" method="post" class="form">
            <div class="form-group">
                <label for="title">Заголовок новости <span class="text-danger">*</span></label>
                <input
                    type="text"
                    class="form-control"
                    id="title"
                    name="title"
                    value="<?= isset($formData["title"]) ? $formData["title"] : ""?>">
            </div>

            <div class="form-group mb-5">
                <label for="content">Текст новости <span class="text-danger">*</span></label>
                <textarea
                    name="content"
                    id="content"
                    rows="10"
                    class="form-control"><?= isset($formData["content"]) ? $formData["content"] : ""?></textarea>
            </div>

            <button class="btn btn-success btn-lg" type="submit">Сохранить</button>
            <p class="mt-2 text-danger d-inline">Поля, отмеченные звёздочкой (*) обязательны для заполнения!ы</p>
        </form>
    </div>
</div>
