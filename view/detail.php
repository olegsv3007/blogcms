<?php
require_once VIEW_DIR . '/layout/header.php';
?>
<div class="container col-6">
    <h1 class="display-4 text-center my-4">Highlights from Git 2.22</h1> 
    <div class="text-right text-muted">Дата публикации: 18.08.2019</div>
    <hr>
    <img src="/images/articles/logo-git.png" class="col-6 float-left img-thumbnail m-3" alt="Адаптивные изображения">
    <div class="col-12 m-3 text-justify">
       <p>The open source Git project just released Git 2.22 with features and bug fixes brought to you from over 74 contributors, 18 of them new. Here’s our look at some of the most exciting features and changes introduced since Git 2.21.</p>
       <p>You might have used git rebase before to alter the history of your repository.  If you haven’t, here’s a quick primer: git rebase replays a series of commits on a new initial commit. For example, you might have used git rebase to make sure that your feature branch was based on the latest changes from upstream. Say that you have a repository structure that looks like:</p>
       <p>How do you make sure that your branch my-feature merges into master cleanly? You could just merge it, but the end result might be hard for others to understand if you have to resolve conflicts. If you haven’t yet shared the branch with reviewers, they might prefer to see your commits as if they had been written directly on top of the current master.</p>
       <p>Now, what if your example is more complicated? Let’s say that my-feature has its own branching structure that you want to preserve while replaying the commits. To further complicate things, let’s also assume that you want to use some of rebase‘s interactive features, like dropping, reordering, and renaming commits.</p>
       <p>If you didn’t mind giving up those interactive features, you could have used --preserve-merges. You can use git rebase -i --preserve-merges and edit the history interactively, but some of your repository’s structure might not remain intact.</p>
       <p>Git has a new option --rebase-merges, since 2.18, but in 2.22 the old option is officially deprecated in favor of --rebase-merges. Using --rebase-merges allows you to preserve the structure of your changes, while also giving you the full power of interactivity.</p>
       <p>Here’s an example. Let’s say that you have a branching structure based on master, but upstream (say, origin/master) has changed since you created your branch. You want to replay your commits on the latest from upstream, preserve the branching structure, and make a few modifications to a commit message along the way (we’ll simulate this by fixing a typo).</p>
       <p>Given some set of two or more branches, how can you tell what history they have in common? As it turns out, Git has a precise way to answer this question. Git calls this a merge base: the most recent common ancestor among a set of commits.</p>
       <p>When might you want to compute a merge base in practice? The obvious answer is: when you’re merging! Git computes this common ancestor as the base for a three-way merge of the content (hence the name “merge base”). But you might also want to use this common ancestor as a cutoff point for listing commits. Running git log A...B will show all of the commits in A and B down to their common ancestor; in other words, what happened since the two diverged (you can also use --left-right to see which commit is on which side).</p>
       <p>This “triple-dot” notation is associated with merge bases in other contexts, too. Running git diff A...B will show the differences between B and the merge base of A and B. That’s another way of showing what has happened on B.</p>
    </div>
    <hr>
    <h3 class="">Комментарии</h1>
    <div class="comments-container mb-5">
        <div class="comment d-flex flex-row bg-light my-2 p-2">
            <div class="comment-avatar p-2">
                <img src="/images/avatars/01.PNG" height="100" alt="">
            </div>
            <div class="comment-content p-2 d-flex flex-column justify-content-between flex-fill">
                <div class="comment-author"><b>Ivan Ivanov</b></div>
                <div class="comment-text">Аффтар ЖЖеТ</div>
                <div class="comment-moderation text-right text-success">Модерация пройдена</div>
                <div class="comment-date text-right text-muted">Опубликовано: 23.08.2019</div>
            </div>
        </div>
        <div class="comment d-flex flex-row bg-light my-2 p-2">
            <div class="comment-avatar p-2">
                <img src="/images/avatars/02.PNG" height="100" alt="">
            </div>
            <div class="comment-content p-2 d-flex flex-column justify-content-between flex-fill">
                <div class="comment-author"><b>Ivan Ivanov</b></div>
                <div class="comment-text">Аффтар ЖЖеТ</div>
                <div class="comment-moderation text-right text-success">Модерация пройдена</div>
                <div class="comment-date text-right text-muted">Опубликовано: 23.08.2019</div>
            </div>
        </div>
        <div class="comment d-flex flex-row bg-light my-2 p-2">
            <div class="comment-avatar p-2">
                <img src="/images/avatars/01.PNG" height="100" alt="">
            </div>
            <div class="comment-content p-2 d-flex flex-column justify-content-between flex-fill">
                <div class="comment-author"><b>Ivan Ivanov</b></div>
                <div class="comment-text">Аффтар ЖЖеТ</div>
                <div class="comment-moderation text-right text-success">Модерация пройдена</div>
                <div class="comment-date text-right text-muted">Опубликовано: 23.08.2019</div>
            </div>
        </div>
        <div class="comment d-flex flex-row bg-light my-2 p-2">
            <div class="comment-avatar p-2">
                <img src="/images/avatars/02.PNG" height="100" alt="">
            </div>
            <div class="comment-content p-2 d-flex flex-column justify-content-between flex-fill">
                <div class="comment-author"><b>Ivan Ivanov</b></div>
                <div class="comment-text">Аффтар ЖЖеТ</div>
                <div class="comment-moderation text-right text-success">Модерация пройдена</div>
                <div class="comment-date text-right text-muted">Опубликовано: 23.08.2019</div>
            </div>
        </div>
        <div class="comment d-flex flex-row bg-light my-2 p-2">
            <div class="comment-avatar p-2">
                <img src="/images/avatars/03.PNG" height="100" alt="">
            </div>
            <div class="comment-content p-2 d-flex flex-column justify-content-between flex-fill">
                <div class="comment-author"><b>Ivan Ivanov</b></div>
                <div class="comment-text">Аффтар ЖЖеТ</div>
                <div class="comment-moderation text-right text-success">Модерация пройдена</div>
                <div class="comment-date text-right text-muted">Опубликовано: 23.08.2019</div>
            </div>
        </div>
    </div>
    <hr>
    <div class="comment-form mb-5">
        <form action="" method="post">
            <h3 class="text-left">Добавить комментарий</h3>
            <textarea name="" id="" class="form-control" rows="7"></textarea>
            <button type="submit" class="btn btn-primary mt-3 float-right">Опубликовать комментарий</button>
            <div class="clearfix"></div>
        </form>
    </div>

</div>
<?php
require_once VIEW_DIR . '/layout/footer.php';
?>