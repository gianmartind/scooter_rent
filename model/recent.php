<?php
    class Recent{
        protected $RecentID;
        protected $Berita;
        protected $BeritaID;
        protected $Time;

        public function __construct($RecentID, $Berita, $BeritaID, $Time){
            $this->RecentID = $RecentID;
            $this->Berita = $Berita;
            $this->BeritaID = $BeritaID;
            $this->Time = $Time;
        }

        public function getRecentID(){
            return $this->RecentID;
        }

        public function getBerita(){
            return $this->Berita;
        }

        public function getBeritaID(){
            return $this->BeritaID;
        }

        public function getTime(){
            return $this->Time;
        }
    }
?>