<?php
    include("includes/db_connect.php");

    class Cart extends Database
    {
        public $id;
        public $title_product;
        public $image_product;
        public $quantity;
        public $sum_product;
        public $total_sum_products;
        public $total_count_of_product;

        function __construct($title_product = "", $image_product = "", $quantity = 0, $sum_product = 0, $total_sum_products = 0, $total_count_of_product = 0)
        {
            $this->title_product = $title_product;
            $this->image_product = $image_product;
            $this->quantity = $quantity;
            $this->sum_product = $sum_product;
            $this->total_sum_products = $total_sum_products;
            $this->total_count_of_product = $total_count_of_product;
        }

        public function SumProduct()
        {
            $sum = $this->sum_product * $this->quantity;
            return $sum;
        }

        public function TotalSumProduct()
        {
            $total_sum_products = $total_sum_products + ($this->sum_product * $this->quantity);
            return $total_sum_products;
        }

        public function SelectProduct()
        {
            $sql = "SELECT * FROM product";
            $result = $this->connect()->query($sql);
            $numRows = $result->num_rows;

            if($numRows > 0)
            {
                while($row = $result->fetch_assoc())
                {
                    
                }
            }
        }
    }