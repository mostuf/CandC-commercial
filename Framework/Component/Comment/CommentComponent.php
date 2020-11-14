<?php
    class CommentComponent extends Component
    {
        public $listComment;
        public $type;
        public $idAttachement;

        public function __construct($listComment,$type,$idAttachement)
        {
            $this->listComment = $listComment;
            $this->type = $type;
            $this->idAttachement = $idAttachement;
            $this->componentName = "Comment";
        }
    }