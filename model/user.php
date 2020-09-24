<?php
    class User{
        protected $UserID;
        protected $Password;
        protected $Type;

        public function __construct($UserID, $Password, $Type){
            $this->UserID = $UserID;
            $this->Password = $Password;
            $this->Type = $Type;
        }

        public function getUserID(){
            return $this->UserID;
        }

        public function getPassword(){
            return $this->Password;
        }

        public function getType(){
            return $this->Type;
        }
    }
?>