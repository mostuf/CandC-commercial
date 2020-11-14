<h1>Nous contacter</h1>
<div class="col-12">
    <div class="row">
        <div class="col-lg-4 col-12 mt-4">
            <div class="company-title"><?= $contact->company->name; ?></div>
            <div class="company-adress">
                <div class="street"><?= $contact->company->adress->number . " " . $contact->company->adress->street; ?></div>
                <div class="city"><?= $contact->company->adress->zipcode . " " . $contact->company->adress->city; ?>, <span class="country"><?= $contact->company->adress->country ?></span></div>
            </div>
            <div class="company-contact">
                <?php if(!empty($contact->company->contactList->phone)){ ?>
                    <div class="company-phone">Tel : <a href="tel:<?= $contact->company->contactList->phone; ?>"><?= $contact->company->contactList->phone; ?></a></div>
                <?php } ?>
                <?php if(!empty($contact->company->contactList->mobile)){ ?>
                    <div class="company-mobile">Mob : <a href="tel:<?= $contact->company->contactList->mobile; ?>"><?= $contact->company->contactList->mobile; ?></a></div>
                <?php } ?>
                <?php if(!empty($contact->company->contactList->fax)){ ?>
                    <div class="company-fax">Fax : <?= $contact->company->contactList->fax; ?></div>
                <?php } ?>
                <?php if(!empty($contact->company->contactList->mail)){ ?>
                    <div class="company-mail">Email : <a href="mailto:<?= $contact->company->contactList->mail; ?>"><?= $contact->company->contactList->mail; ?></a></div>
                <?php } ?>
            </div>
        </div>
        <div class="col-lg-8 col-12 mt-4">
            <img class="w-100" src="/Img/Company/position.png">
        </div>
    </div>
</div>
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
        <select class="form-control"name="contact.type" required>
            <option disabled selected value="">---Choisissez dans la liste---</option>
            <?php foreach($contact->listType as $type){ ?>
                <option value="<?= $type->id; ?>" <?php if(!empty($typeContactValue) && $typeContactValue == $type->id){ echo 'selected';} ?>><?= $type->title; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group col-12">
        <label class="form-label"></label>
        <textarea class="form-control" rows="5" name="contact.message" placeholder="Votre message" required></textarea>
    </div>
    <div class="form-group col-12">
        <input type="submit" id="sendContact" class="btn btn-success col-12" value="Envoyer" />
    </div>
</form>

