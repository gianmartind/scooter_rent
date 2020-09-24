<?php
    class Transaction{
        protected $TransactionID;
        protected $UserID;
        protected $ScooterID;
        protected $NoKTP;
        protected $Nama;
        protected $NamaKel;
        protected $RentTime;
        protected $hargaAwal;
        protected $ReturnTime;
        protected $hargaTambahan;

        public function __construct($TransactionID, $UserID, $ScooterID, $NoKTP, $Nama, $NamaKel, $RentTime, $hargaAwal, $ReturnTime, $hargaTambahan){
            $this->TransactionID = $TransactionID;
            $this->UserID = $UserID;
            $this->ScooterID = $ScooterID;
            $this->NoKTP = $NoKTP;
            $this->Nama = $Nama;
            $this->NamaKel = $NamaKel;
            $this->RentTime = $RentTime;
            $this->hargaAwal = $hargaAwal;
            $this->ReturnTime = $ReturnTime;
            $this->hargaTambahan = $hargaTambahan;
        }

        public function getTransactionID(){
            return $this->TransactionID;
        }

        public function getUserID(){
            return $this->UserID;
        }

        public function getScooterID(){
            return $this->ScooterID;
        }

        public function getNoKTP(){
            return $this->NoKTP;
        }

        public function getNama(){
            return $this->Nama;
        }

        public function getNamaKel(){
            return $this->NamaKel;
        }

        public function getRentTime(){
            return $this->RentTime;
        }

        public function getHargaAwal(){
            return $this->hargaAwal;
        }

        public function getReturnTime(){
            return $this->ReturnTime;
        }
        
        public function getHargaTambahan(){
            return $this->hargaTambahan;
        }
    }
?>