<div class="card m-3">
    <div class="row no-gutters">
        <div class="col-4">
        <?php if ($article->image): ?>
        <img src="<?= ARTICLE_IMAGE_DIR . $article->image ?>" class="card-img" alt="...">
        <?php endif; ?>
        </div>
        <div class="col-8">
            <div class="card-body d-flex flex-column justify-content-around h-100">
                <h5 class="card-title"><?= $article->header ?></h5> 
                <?= mb_substr($article->content, 0, \App\Helpers\Settings::getInstance()->get("short_text")) ?>            
                <p class="card-text d-flex justify-content-between flex-row"><small class="text-muted text-right">Дата публикации: <?= date('d.m.y', strtotime($article->created_at)) ?></small><a href="/news/<?= $article->id ?>" class="">Читать далее...</a></p>
            </div>
        </div>
    </div>
</div>