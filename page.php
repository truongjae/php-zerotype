<?php
    class PageAble{
        public $current_page,$limit,$total;
        function __construct($total) {
            $this->current_page = isset($_GET['page']) ? $_GET['page'] : 1;
            $this->limit = 5;
            $this->total = $total;
        }
        public function getTotalPage(){
            return ceil($this->total / $this->limit);
        }
        public function getCurrentPage(){
            if ($this->current_page > $this->getTotalPage()){
                $this->current_page = $this->getTotalPage();
            }
            else if ($this->current_page < 1){
                $this->current_page = 1;
            }
            return $this->current_page;
        }

        public function getStart(){
            return ($this->current_page - 1) * $this->limit;
        }
    }
?>