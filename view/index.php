<?php
require_once 'layout/header.php';
?>
<form class="mt-5">
    <div class="form-row justify-content-center align-items-center">
        <div class="col-sm-3 my-1">
            <label class="sr-only" for="inlineFormInputName">E-mail</label>
            <input type="email" class="form-control" id="inlineFormInputName" placeholder="E-mail">
        </div>
        <div class="col-auto my-1">
            <button type="submit" class="btn btn-primary">Подписаться на обновления</button>
        </div>
    </div>
</form>
<div class="container">
    <h1 class="display-4 text-center">Статьи</h1>
    <?php foreach ($this->data['articles'] as $article) {
        require TEMPLATES_DIR . "article_card.php";
    }
    $this->data['paginator']->render();
    ?>
    
</div>
<?php
require_once "layout/footer.php";
?>