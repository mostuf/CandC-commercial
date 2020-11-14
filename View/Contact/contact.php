<div class="block block-light col-12 mr-auto ml-auto">
    <h1>Nous contacter</h1>
    <form method="post" action="/Contact">
        <div class="form-group col-12">
            <label class="form-label">Titre</label>
            <input type="text" class="form-control" name="contact.title" placeholder="Titre" required />
        </div>
        <div class="form-group col-12">
            <label class="form-label">Adresse email</label>
            <input type="email" class="form-control"name="contact.emeteur" placeholder="Adresse mail" required value="<?php if(!empty($profil)){ echo $profil->mail; } ?>" <?php if(!empty($profil)){ echo "readonly"; }?> />
        </div>
        <div class="form-group col-12">
            <label class="form-label">Type de demande</label>
            <select class="form-control"name="contact.typeId" required>
                <?php if(empty($typeContactValue)){ ?>
                    <option disabled selected value=""></option>
                <?php } ?>
                <?php foreach($typeContact as $type){ ?>
                    <option value="<?= $type->id; ?>" <?php if(!empty($typeContactValue) && $typeContactValue == $type->id){ echo 'selected';} ?>><?= $type->title; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group col-12">
            <label class="form-label"></label>
            <textarea class="form-control" rows="5" name="contact.message" placeholder="Ton message" required></textarea>
        </div>
        <div class="form-group col-12">
            <input type="submit" id="sendContact" class="btn btn-success" value="Envoyer" />
        </div>
    </form>
    <div class="col-12">
        <div class="row">
            <div class="col-lg-6 col-12">
                <img class="w-100" src="/Img/Company/position.png">
            </div>
            <div class="col-lg-6 col-12">
                <div class="ml-lg-4 mt-lg-0 mt-4">
                    <div class="company-title"><?= $clientConfig->company->name; ?></div>
                    <div class="company-adress">
                        <div class="street"><?= $clientConfig->company->adress->number . " " . $clientConfig->company->adress->street; ?></div>
                        <div class="city"><?= $clientConfig->company->adress->zipcode . " " . $clientConfig->company->adress->city; ?>, <span class="country"><?= $clientConfig->company->adress->country ?></span></div>
                    </div>
                    <?php if(!empty($clientConfig->company->contactList->phone)){ ?>
                        <div class="company-adress">Tel : <a href="tel:<?= $clientConfig->company->contactList->phone; ?>"><?= $clientConfig->company->contactList->phone; ?></a></div>
                    <?php } ?>
                    <?php if(!empty($clientConfig->company->contactList->mobile)){ ?>
                        <div class="company-adress">Mob : <a href="tel:<?= $clientConfig->company->contactList->mobile; ?>"><?= $clientConfig->company->contactList->mobile; ?></a></div>
                    <?php } ?>
                    <?php if(!empty($clientConfig->company->contactList->fax)){ ?>
                        <div class="company-adress">Fax : <?= $clientConfig->company->contactList->fax; ?></div>
                    <?php } ?>
                    <?php if(!empty($clientConfig->company->contactList->mail)){ ?>
                        <div class="company-adress">Email : <a href="mailto:<?= $clientConfig->company->contactList->mail; ?>"><?= $clientConfig->company->contactList->mail; ?></a></div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>