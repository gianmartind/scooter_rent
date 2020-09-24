<?php
    class Scooter{
        protected $ScooterID;
        protected $Warna;
        protected $Harga;
        protected $Status;

        public function __construct($ScooterID, $Warna, $Harga, $Status){
            $this->ScooterID = $ScooterID;
            $this->Warna = $Warna;
            $this->Harga = $Harga;
            $this->Status = $Status;
        }

        public function getScooterID(){
            return $this->ScooterID;
        }

        public function getWarna(){
            return $this->Warna;
        }

        public function getHarga(){
            return $this->Harga;
        }

        public function getStatus(){
            if(isset($this->Status)){
                return "Rented since $this->Status";
            }
            else{
                return "Available";
            }
        }
    }
?>