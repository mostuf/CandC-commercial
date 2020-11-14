
<div class="col-12 text-center mb-4">
    <span class="placement-product-title"><?= $productPlacement->getTitle(); ?></span>
</div>
<div class="row">
    <?php foreach ($productPlacement->listProduct  as $product) { ?>
        <div class="col-xl-4 col-lg-6 col-md-6 col-12">
            <a class="card placement-product mb-4" href="/Produit/<?= $product->id; ?>">
                <img class="card-img-top" src="/<?= $product->photo ?>" title="<?= $product->nom; ?>">
                <div class="card-body nopadding">
                    <div class="col-12 mt-2 mb-2">
                        <div class="row">
                            <div class="col-8">
                                <span class="placement-product-product"><?= $product->getShortName(12); ?></span><br>
                                <span class="placement-product-category font-italic"><?= $product->category->name; ?></span>
                            </div>
                            <div class="col-4 text-right mt-auto">
                                <div class="placement-product-price "><?= $product->prix ?>€</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <button class="add-quantity col-12 btn btn-primary btn-lg" data-product-id="<?= $product->id; ?>">
                                    <i class="fas fa-cart-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </a>  
        </div>      
    <?php } ?>
 </div>
