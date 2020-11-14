<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <?php for($i=0;$i<count($breadCrumb->listCrumb);$i++){ ?>
            <?php if($i == count($breadCrumb->listCrumb) -1){ ?>
                <li class="breadcrumb-item"><?= $breadCrumb->listCrumb[$i]->title; ?></li>
            <?php }else{ ?>
                <li class="breadcrumb-item active"><a href="<?= $breadCrumb->listCrumb[$i]->link; ?>"><?= $breadCrumb->listCrumb[$i]->title; ?></a></li>
            <?php } ?>
        <?php } ?>
    </ol>
</nav>