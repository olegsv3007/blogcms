<div class="comment d-flex flex-row bg-light my-2 p-2">
    <div class="comment-avatar p-2">  
    <img src="<?= AVATARS_DIR . $comment->author->avatar ?>" height="100" alt=""> 
    </div>
    <div class="comment-content p-2 d-flex flex-column justify-content-between flex-fill">
        <div class="comment-author"><b><?= $comment->author->name ?></b></div>
        <div class="comment-text"><?= $comment->text ?></div>
        <?php if ($comment->is_published): ?>
        <div class="comment-moderation text-right text-success">Модерация пройдена</div>
        <?php else: ?>
        <div class="comment-moderation text-right text-danger">Модерация ожидается</div>
        <?php endif; ?>
        
        <div class="comment-date text-right text-muted">Опубликовано: <?= $comment->created_at ?></div>
    </div>
</div>