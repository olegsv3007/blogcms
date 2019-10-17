<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center m-5">
        <li class="page-item <?= $this->currentPage == 1 ? 'disabled' : ''?>">
            <a class="page-link" href="<?=$this->currentPage - 1?>">Previous</a>
        </li>
        <?php for ($i = 1; $i <= $this->getQuantityPages(); $i++):?>
            <li class="page-item <?= $i == $this->currentPage ? 'active' : ''?>"><a class="page-link" href="<?=$i?>"><?=$i?></a></li>
        <?php endfor;?>
        <li class="page-item <?= $this->getQuantityPages() == $this->currentPage ? 'disabled' : ''?>">
            <a class="page-link" href="<?=$this->currentPage + 1?>">Next</a>
        </li>
    </ul>
</nav>