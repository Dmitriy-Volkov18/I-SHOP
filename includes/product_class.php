<?php
    class Product extends Database
    {
        public function getBestsellerProduct()
        {
            $sql = "SELECT * FROM product WHERE bestseller = 1 LIMIT 1";
            $result = $this->connect()->query($sql);
            $numRows = $result->num_rows;

            if($numRows > 0)
            {
                while($row = $result->fetch_assoc())
                {
                    $data[] = $row;
                }

                return $data;
            }
        }

        public function getProductOfDay()
        {
            $sql = "SELECT * FROM product WHERE id = 36";
            $result = $this->connect()->query($sql);
            $numRows = $result->num_rows;

            if($numRows > 0)
            {
                while($row = $result->fetch_assoc())
                {
                    $data[] = $row;
                }

                return $data;
            }
        }

        public function getSpecialPrice()
        {
            $sql = "SELECT * FROM product WHERE id = 8";
            $result = $this->connect()->query($sql);
            $numRows = $result->num_rows;

            if($numRows > 0)
            {
                while($row = $result->fetch_assoc())
                {
                    $data[] = $row;
                }

                return $data;
            }
        }

        public function getShowcaseProduct()
        {
            $sql = "SELECT * FROM product WHERE id = 4";
            $result = $this->connect()->query($sql);
            $numRows = $result->num_rows;

            if($numRows > 0)
            {
                while($row = $result->fetch_assoc())
                {
                    $data[] = $row;
                }

                return $data;
            }
        }

        public function getNewProduct()
        {
            $sql = "SELECT * FROM product WHERE new = 1 LIMIT 5";
            $result = $this->connect()->query($sql);
            $numRows = $result->num_rows;

            if($numRows > 0)
            {
                while($row = $result->fetch_assoc())
                {
                    $data[] = $row;
                }

                return $data;
            }
        }

        public function getBestSellersProductFive()
        {
            $sql = "SELECT * FROM product WHERE bestseller = 1 LIMIT 5";
            $result = $this->connect()->query($sql);
            $numRows = $result->num_rows;

            if($numRows > 0)
            {
                while($row = $result->fetch_assoc())
                {
                    $data[] = $row;
                }

                return $data;
            }
        }

        public function getSelloutProducts()
        {
            $sql = "SELECT * FROM product WHERE sellout = 1 LIMIT 5";
            $result = $this->connect()->query($sql);
            $numRows = $result->num_rows;

            if($numRows > 0)
            {
                while($row = $result->fetch_assoc())
                {
                    $data[] = $row;
                }

                return $data;
            }
        }

        public function selectByOneParameter($category, $sortType, $additionalSql, $items_per_page, $offset)
        {
            $sql = "SELECT * FROM product WHERE category_title = '$category' $additionalSql ORDER BY $sortType LIMIT $items_per_page OFFSET $offset";
            $result = $this->connect()->query($sql);
            $numRows = $result->num_rows;

            if($numRows > 0)
            {
                while($row = $result->fetch_assoc())
                {
                    $data[] = $row;
                }

                return $data;
            }
        }

        public function selectByTwoParameters($category, $type_product_title, $sortType, $additionalSql, $items_per_page, $offset)
        {
            $sql = "SELECT * FROM product WHERE category_title = '$category' AND type_product_title = '$type_product_title' $additionalSql ORDER BY $sortType LIMIT $items_per_page OFFSET $offset";
            $result = $this->connect()->query($sql);
            $numRows = $result->num_rows;

            if($numRows > 0)
            {
                while($row = $result->fetch_assoc())
                {
                    $data[] = $row;
                }

                return $data;
            }
        }

        public function selectByThreeParameters($category, $type_product_title, $concrete_product_title, $sortType, $additionalSql, $items_per_page, $offset)
        {
            $sql = "SELECT * FROM product WHERE category_title = '$category' AND type_product_title = '$type_product_title' AND concrete_product_title = '$concrete_product_title' $additionalSql ORDER BY $sortType LIMIT $items_per_page OFFSET $offset";
            $result = $this->connect()->query($sql);
            $numRows = $result->num_rows;

            if($numRows > 0)
            {
                while($row = $result->fetch_assoc())
                {
                    $data[] = $row;
                }

                return $data;
            }
        }

        public function getCountOfProduct($category)
        {
           /* if(!empty($category_title) && empty($type_product_title) && empty($concrete_type_product))
            {
                $sql = "SELECT COUNT(*) FROM product WHERE category_title='$category'";
            }
            elseif(!empty($category_title) && !empty($type_product_title) && empty($concrete_type_product))
            {
                $sql = "SELECT COUNT(*) FROM product WHERE category_title='$category' AND type_product_title = '$type_product_title'";
            }
            else
            {
                $sql = "SELECT COUNT(*) FROM product WHERE category_title='$category' AND type_product_title = '$type_product_title' AND concrete_product_title = '$concrete_type_product'";
            }*/
            if(!empty($category))
            {
                $sql = "SELECT COUNT(*) FROM product WHERE category_title='$category'";
            }

            $result = $this->connect()->query($sql);
            $row = $result->fetch_row();
            //echo $row[0];
            return $row[0];
        }

        public function getCountOfProduct2($category, $type_product_title)
        {
            $sql = "SELECT COUNT(*) FROM product WHERE category_title='$category' AND type_product_title = '$type_product_title'";

            $result = $this->connect()->query($sql);
            $row = $result->fetch_row();
   
            return $row[0];
        }

        public function getCountOfProduct3($category, $type_product_title, $concrete_type_product)
        {
            $sql = "SELECT COUNT(*) FROM product WHERE category_title='$category' AND type_product_title = '$type_product_title' AND concrete_product_title = '$concrete_type_product'";

            $result = $this->connect()->query($sql);
            $row = $result->fetch_row();
            //echo $row[0];
            return $row[0];
        }

        public function searchProduct($search, $additionalSql, $sortType, $items_per_page, $offset)
        {
            $sql = "SELECT * FROM product WHERE title LIKE '%$search%' $additionalSql ORDER BY $sortType LIMIT $items_per_page OFFSET $offset";
            $result = $this->connect()->query($sql);
            $numRows = $result->num_rows;

            if($numRows > 0)
            {
                while($row = $result->fetch_assoc())
                {
                    $data[] = $row;
                }

                return $data;
            }
        }

        public function getCountOfProductBySearch($search)
        {
            $sql = "SELECT COUNT(*) FROM product WHERE title LIKE '%$search%' OR category_title LIKE '%$search%'";

            $result = $this->connect()->query($sql);
            $row = $result->fetch_row();
            //echo $row[0];
            return $row[0];
        }

        public function getById($id)
        {
            $sql = "SELECT * FROM product WHERE id = '$id' LIMIT 1";
            $result = $this->connect()->query($sql);
            $numRows = $result->num_rows;

            if($numRows > 0)
            {
                while($row = $result->fetch_assoc())
                {
                    $data[] = $row;
                }

                return $data;
            }
        }
    }

    $product = new Product();
?>