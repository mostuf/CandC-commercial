<div class="errorBlock">
    
    <span class="errorTitle"><h2><u>Erreur:</u> Une erreur s'est produite durant l'execution</h2></span>
    <span class="errorMessage"><label>Detail: </label><?php echo $error->getMessage(); ?></span>
    <?php if($debug && !empty($profil) && $profil->checkRole("Admin")){ ?>
        <div class="errorStack">
            <label>StackTrace: </label>
            <pre><?php echo $error->getTraceAsString(); ?></pre>
        </div>
        <?php if(method_exists($error,"getMoreDetail")){ ?>
            <div class="moreDetail">
                <label>Details supplémentaires: </label>
                <pre><?php echo $error->getMoreDetail(); ?></pre>
            </div>
        <?php } ?>
    <?php } ?>
</div>