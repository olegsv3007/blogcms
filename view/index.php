<?php
require_once VIEW_DIR . '/layout/header.php';
?>
<?php if (!is_subscriber()): ?>
<form class="mt-5" method="post" action="/subscribe">
    <div class="form-row justify-content-center align-items-center">
    <?php if (!isset($_SESSION['email'])): ?>
        <div class="col-sm-3 my-1">
            <label class="sr-only" for="inlineFormInputName">E-mail</label>
            <input required type="email" name="email" class="form-control" id="inlineFormInputName" placeholder="E-mail">
        </div>
    <?php else: ?>
        <input type="hidden" name="email" value="<?= $_SESSION['email'] ?>">
    <?php endif; ?>
        <div class="col-auto my-1">
            <button type="submit" class="btn btn-primary">Подписаться на обновления</button> 
        </div>
    </div>
</form>
<?php endif; ?>
<div class="container">
    <h1 class="display-4 text-center">Статьи</h1>
    <?php foreach ($this->data['articles'] as $article) {
        require TEMPLATES_DIR . "article_card.php";
    }
    $this->data['paginator']->render();
    ?>
    
</div>
<?php
require_once VIEW_DIR . '/layout/footer.php';
?>