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
    <div class="card m-3">
        <div class="row no-gutters">
            <div class="col-4">
            <img src="/images/articles/logo-git.png" class="card-img" alt="...">
            </div>
            <div class="col-8">
                <div class="card-body d-flex flex-column justify-content-around h-100">
                    <h5 class="card-title">Highlights from Git 2.22</h5>
                    <p class="card-text align-self-stretch">The open source Git project just released Git 2.22 with features and bug fixes brought to you from over 74 contributors, 18 of them new. Here’s our look at some of the most exciting features and changes introduced since Git 2.21.</p>
                    <p class="card-text d-flex justify-content-between flex-row"><small class="text-muted text-right">Дата публикации: 18.08.2019</small><a href="/detail.php" class="">Читать далее...</a></p>
                </div>
            </div>
        </div>
    </div>
    <div class="card m-3">
        <div class="row no-gutters">
            <div class="col-4">
            <img src="/images/articles/logo-404.jpg" class="card-img" alt="...">
            </div>
            <div class="col-8">
                <div class="card-body d-flex flex-column justify-content-around h-100">
                    <h5 class="card-title">A 404 Page – Best Practices and Design Inspiration</h5>
                    <p class="card-text align-self-stretch">If you aren’t already familiar with the term, a 404 error page is a page that has a job of notifying the user that the link they’ve tried to access is broken or does not exist. Needless to say, getting a 404 error page result is irritating for every user that experiences it.</p>
                    <p class="card-text d-flex justify-content-between flex-row"><small class="text-muted text-right">Дата публикации: 18.08.2019</small><a href="/detail.php" class="">Читать далее...</a></p>
                </div>
            </div>
        </div>
    </div>
    <div class="card m-3">
        <div class="row no-gutters">
            <div class="col-4">
            <img src="/images/articles/logo-3.jpeg" class="card-img" alt="...">
            </div>
            <div class="col-8">
                <div class="card-body d-flex flex-column justify-content-around h-100">
                    <h5 class="card-title">Improve Your Conversion Rate and Increase Revenue With These User Experience Design Essentials</h5>
                    <p class="card-text align-self-stretch">User experience (UX) is the overall experience a visitor has on a website, in a program or in a mobile app. It's not any single design element or layout that defines the experience -- instead, it is a comprehensive compilation of many little interactions woven together, producing positive or negative feelings about the website and, by default, the parent company.</p>
                    <p class="card-text d-flex justify-content-between flex-row"><small class="text-muted text-right">Дата публикации: 18.08.2019</small><a href="/detail.php" class="">Читать далее...</a></p>
                </div>
            </div>
        </div>
    </div>
    <div class="card m-3">
        <div class="row no-gutters">
            <div class="col-4">
            <img src="/images/articles/logo-apple.jpeg" class="card-img" alt="...">
            </div>
            <div class="col-8">
                <div class="card-body d-flex flex-column justify-content-around h-100">
                    <h5 class="card-title">The Top 3 Ecommerce Sites of 2017 -- and What You Can Learn from Them</h5>
                    <p class="card-text align-self-stretch">There's no doubt about it -- we are living in the digital age, and we aren't going back. Truth be told, you're living decades in the past if your business doesn't have a solid online presence, particularly if you're a retail-based brand.</p>
                    <p class="card-text d-flex justify-content-between flex-row"><small class="text-muted text-right">Дата публикации: 18.08.2019</small><a href="/detail.php" class="">Читать далее...</a></p>
                </div>
            </div>
        </div>
    </div>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center m-5">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item active" aria-current="page">
                <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
            </li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav>
</div>
<?php
require_once "layout/footer.php";
?>