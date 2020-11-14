<form method="post" action="/Login"  id="login-form" class="col-md-8 offset-md-2 col-sm-12">
    <div class="card card-dark card-large-padding">
        <div class="alert alert-dismissible fade show alert-danger" role="alert">
            Le mot de passe que vous avez saisi est incorrect.
        </div>
        <div class="form-group">
            <label class="form-label">E-mail</label>
            <input type="email" class="form-control" name="login" />
        </div>
        <div class="form-group">
            <label class="form-label">Mot de passe</label>
            <input type="password" class="form-control" name="password" />
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary col-12" value="Se connecter" />
        </div>
        <div class="form-group">
            <a href="/Logon" class="btn btn-success col-12">Créer un compte</a>
        </div>
        <div class="form-group">
            <a href="/ResetPassword" class="btn btn-secondary col-12">Mot de passe perdu</a>
        </div>
    </div>
</form>
