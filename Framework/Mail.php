<?php
    class Mail{
        private $from;
        private $to;
        private $body;
        private $header;
        private $param;
        private $template;
        private $subject;

        public function __construct($template,$subject)
        {
            $this->param = [];
            $this->header = "Content-Type: text/html; charset=UTF-8 \r\n";
            $this->header .= "MIME-Version: 1.0 \r\n";
            $this->subject = $subject;
            if(file_exists('View/Mail/' . $template . '.php'))
            {
                $this->template = 'View/Mail/' . $template . '.php';
            }
            else
            {
                throw new ViewNotFoundException();
            }
        }

        public function addParam($name,$value)
        {
            $this->param[$name] = $value;
        }

        public function send($from,$to)
        {
            ob_start();
            extract($this->param);
            include($this->template);
            $this->body = ob_get_contents();
            ob_end_clean();
            $this->header .= 'From: ' . $from . "\r\n" .
                             'Reply-To: ' .$from. "\r\n" .
                             'X-Mailer: PHP/' . phpversion();
            return mail($to,$this->subject,$this->body,$this->header);
        }
    }