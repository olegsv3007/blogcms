<?php
require_once VIEW_DIR . '/layout/header.php';
?>
<div class="container col-6">
    <h1 class="display-4 text-center my-4"><?= $this->data['article']->header ?></h1> 
    <div class="text-right text-muted">Дата публикации: <?= date('d.m.Y', strtotime($this->data['article']->created_at)) ?></div>
    <hr>
    <?php if ($this->data['article']->image): ?>
    <img src="<?= ARTICLE_IMAGE_DIR . $this->data['article']->image ?>" class="col-6 float-left img-thumbnail m-3" alt="Адаптивные изображения">
    <?php endif; ?>
    <div class="col-12 m-3 text-justify">
       <p><?= str_replace(array("\r\n", "\r", "\n"), '</p><p>', $this->data['article']->content) ?></p>
    </div>
    <div class="clearfix"></div>
    <hr>
    <h3 class="">Комментарии</h1>
    <div class="comments-container mb-5">
        <?php 
            foreach ($this->data['article']->comments as $comment) {
            if ($comment->is_published || userHasRole("Администратор|Контент менеджер") || (isset($_SESSION['email']) && $comment->author->email->email == $_SESSION['email'])) {
                require TEMPLATES_DIR . 'comment_card.php';
            }
        }
        ?>
    </div>
    <hr>
    <div class="comment-form mb-5">
    <?php if (isset($_SESSION['email'])): ?>
        <form action="/news/addcomment" method="post">
        <input type="hidden" name="article_id" value="<?= $this->data['article']->id ?>">
        <input type="hidden" name="author_id" value="<?= getUser($_SESSION['email'])->id ?>">
            <h3 class="text-left">Добавить комментарий</h3>
            <textarea name="comment" id="" class="form-control" rows="7"></textarea>
            <button type="submit" class="btn btn-primary mt-3 float-right">Опубликовать комментарий</button>
            <div class="clearfix"></div>
        </form>
    <?php else: ?>
    <div class="text-center">
        <p>Оставлять комментарии могут только авторизованные пользователи.</p>
        <a href="/authorization" class="btn btn-primary">Авторизоваться</a>
    </div>
    <?php endif; ?>
    </div>

</div>
<?php
require_once VIEW_DIR . '/layout/footer.php';
?>