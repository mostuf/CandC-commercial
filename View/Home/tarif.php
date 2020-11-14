<h1 class="modal-title">Devenez membre gratuitement !</h5>
<div class="account-type">
    <div class="row">
        <div class="account-card col-sm-12 col-md-6 disabled">
            <div class="title">Visiteur</div>
            <div class="content">
                <ul>
                    <li><i class="fas fa-check"></i>Lecture des cours limitée à 20%</li>
                    <li><i class="fas fa-check"></i>Lecture des tuto illimitée</li>
                </ul>
            </div>
        </div>
        <div class="account-card col-sm-12 col-md-6">
            <input type="radio" name="account-type" value="Member" />
            <div class="title">Membre</div>
            <div class="content">
                <ul>
                    <li><i class="fas fa-check"></i>Lecture des cours illimitée</li>
                    <li><i class="fas fa-check"></i>Lecture des tuto illimitée</li>
                    <li><i class="fas fa-check"></i>Accès aux commentaires</li>
                    <li><i class="fas fa-check"></i>Accès à l'assistance<sup>1</sup></li>
                    <li><i class="fas fa-check"></i>Accès aux vidéos de cours</li>
                    <li><i class="fas fa-check"></i>Inscription aux conférences</li>
                    <li><i class="fas fa-check"></i>400 crédits<sup>2</sup> offerts à l'inscription</li>
                </ul>
            </div>
            <div class="footer">
                Gratuit
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="alert alert-dark col-sm-12">
        1: Necessite l'utilisation de crédits | 2: Environ 10min d'assistance
    </div>
</div>
</div>
<div class="modal-footer">
<div class="row">
    <div class="col-6">
        <a href="/Login<?= $this->httpRequest->url; ?>" class="btn btn-primary col-12" >Se connecter</a>
    </div>
    <div class="col-6">
        <a href="/Logon<?= $this->httpRequest->url; ?>" class="btn btn-success col-12">Créer un compte</a>
    </div>
</div>
</div>
