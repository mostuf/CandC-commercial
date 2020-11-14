<h1><?= $company->name; ?></h1>
<div class="row">
    <div class="col-lg-4 col-12 mt-2">
        <img src="<?= $company->picture; ?>" class="w-100"> 
    </div>
    <div class="col-lg-8 col-12 mt-2 text-justify">
        <?= $company->description; ?>
    </div>
</div>