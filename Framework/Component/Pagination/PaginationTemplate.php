<div class="ml-auto mr-auto mt-5">
    <nav>
        <ul class="pagination mr-auto ml-auto text-center">
            <li class="page-item <?= ($pagination->previous == null)?"disabled":""; ?>" data-page="<?= $pagination->previous; ?>"><a class="page-link">Previous</a></li>
            <?php foreach($pagination->listPage as $page){ ?>
                <li class="page-item <?= ($pagination->current == $page)?"active":""; ?>" data-page="<?= $page; ?>"><a class="page-link"><?= $page; ?></a></li>
            <?php } ?>
            <li class="page-item <?= ($pagination->next == null)?"disabled":""; ?>" data-page="<?= $pagination->next; ?>"><a class="page-link">Next</a></li>
        </ul>
    </nav>
</div>