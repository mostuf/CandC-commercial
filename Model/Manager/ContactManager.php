<?php
    class ContactManager extends ModelManager
    {
        public function __construct($dbSrc)
		{
			parent::__construct('contact','Contact',$dbSrc);
        }

        public function Add($contact)
        {
            $date = new DateTime();
            $contact->destinataire = $this->getTypeContactById($contact->typeId)->destinataire;
            $this->_bdd->PQuery("INSERT INTO contact(date,title,emeteur,destinataire,message,typeId) VALUES(?,?,?,?,?,?)",array(
                                                                                                                            $date->format("Y-m-d H:i:s"),
                                                                                                                            $contact->title,
                                                                                                                            $contact->emeteur,
                                                                                                                            $contact->destinataire,
                                                                                                                            nl2br($contact->message),
                                                                                                                            $contact->typeId
                                                                                                                        ));
        }

        public function getTypeContact()
        {

            $req = $this->_bdd->PQuery("SELECT * FROM category_contact",array());
            $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'stdClass');
            return $req->fetchAll();
        }

        public function getTypeContactById($id)
        {
            $req = $this->_bdd->PQuery("SELECT * FROM category_contact WHERE id = ?",array($id));
            $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'stdClass');
            return $req->fetch();
        }
    }