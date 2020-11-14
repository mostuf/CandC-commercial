<?php
    global $controller;
    $controller->addJs('Framework/Component/Comment/CommentComponent.js');
    $controller->addCss('Framework/Component/Comment/CommentComponent.css');
?>
<div class="block block-light">
    <h3>Commentaires</h3>
    <div class="comment">
        <?php if(!empty($controller->profil) && $controller->profil->checkRole("Member")){ ?>
            <div class="form">
                <input type="hidden" class="idAttachement" value="<?= $comment->idAttachement; ?>" />
                <input type="hidden" class="idUser" value="<?= $controller->profil->id ?>" />
                <input type="hidden" class="typeComment" value="<?= $comment->type ?>" />
                <div class="form-group">
                    <label class="form-label">Message</label>
                    <textarea class="form-control message auto-size"  placeholder="Saisissez votre message"></textarea>
                </div>
                <button class="btn btn-success col-12 send">Envoyer</textarea>
            </div>
        <?php }else{ ?>
            <div class="form-group">
                <textarea class="form-control" class="message" placeholder="Saisissez votre message" disabled></textarea>
            </div>
            <div class="form-group">
                <label class="form-label">Connectez vous pour poster des commentaires</label>
                <button class="btn btn-primay col-12" class="connexion">Connexion</textarea>
            </div>
        <?php } ?>
        <div class="list">
            <?php foreach($comment->listComment as $comment){ ?>
                <hr>
                <div class="detail">
                    <div class="title">
                        <span class="author">
                            <?= $comment->author->getFullName(); ?> - 
                        </span>
                        <span class="author">
                            <?= $comment->date->format("d/m/Y"); ?> 
                        </span>
                    </div>
                    <div class="message">
                        <?= $comment->message; ?> 
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>