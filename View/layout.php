<html>
    <head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
        <?php 
            global $controller;
            echo $fileManager->generateJs();
            echo $fileManager->generateCss();
        ?>
        <title><?= $controller->title . " - click-n-collect.site"; ?></title>
        <script src="https://kit.fontawesome.com/b39885ee1d.js" crossorigin="anonymous"></script>
        <link rel="icon" href="/Img/Shared/favicon.png" />
        <script  type="application/ld+json">
            <?php /*$structuredData->serialize();*/ ?>
        </script>
    </head>
    <body>
        <nav class="navbar navbar-dark bg-dark fixed-top navbar-expand-sm">
            <a class="navbar-brand mr-5" href="/"><img src="/Img/logo.png" width="110" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item mr-5">
                        <a class="nav-link" href="/Equipe">Équipe</a>
                    </li>
                    <li class="nav-item mr-5">
                        <a class="nav-link" href="/Fonctionnalites">Fonctionnalités</a>
                    </li>
                    <li class="nav-item mr-5">
                        <a class="nav-link" href="/Tutoriels">Tutoriels</a>
                    </li>
                    <li class="nav-item mr-5">
                        <a class="nav-link" href="/Tarifs">Tarifs</a>
                    </li>
                    <li class="nav-item mr-5">
                        <a class="nav-link" href="/Contact">Contact</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="scroll-content">
            <?php if($httpRequest->construct && ($profil == null || !$profil->checkRole("Admin"))){ ?>
                <div class="alert alert-dark text-center"><h4 class="alert-heading">Travail en cours : </h4> Page en cours de construction.</div>
            <?php }else{ ?>
                <?php if($httpRequest->route->isFluid()){ ?>
                    <div class="container-fluid">
                        <?php foreach($listeAlert as $alert){ ?>
                            <div class="alert mt-4 alert-dismissible fade show alert-<?= $alert->type?>" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <?= $alert->message ?>
                            </div>
                        <?php } ?>
                        <div class="row">
                            <?php echo $content; ?>
                        </div>
                    </div>
                <?php }else{ ?>
                    <div class="container">
                        <?php foreach($listeAlert as $alert){ ?>
                            <div class="alert mt-4 alert-<?= $alert->type?>" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <?= $alert->message ?>
                            </div>
                        <?php } ?>
                        <div class="col-12">
                            <?php echo $content; ?>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
            <footer>
                
            </footer>
        </div>
        <div class="modal fade" id="alertModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-labl="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                            
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="cancelButton" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="confirmModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-labl="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="cancelButton" data-dismiss="modal">Annuler</button>
                        <button type="button" class="btn btn-primary" id="confirmButton" data-dismiss="modal">Valider</button>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>