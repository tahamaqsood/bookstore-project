<?php 
    class connect
    {
        function conn()
        {
            $host = "localhost";
            $username = "root";
            $pass = "";
            $db = "bookstore";
            $cc = mysqli_connect($host,$username,$pass,$db);
            return $cc;
        }
        function admin_login($username , $password)
        {
            $query = mysqli_query($this->conn(),"select * from tbl_admin where username = '$username' and password='$password'");
            $count = mysqli_num_rows($query);
            if($count>0)
            {
                session_start();
                $fetch = mysqli_fetch_array($query);
                $_SESSION['id']=$fetch[0];
                $_SESSION['username']=$fetch[1];
                header("Location:../dashboard.php");
            }
            else
            {
            
               header("Location:../login.php?msg=InvalidLogin");
            }
        }
        function user_login($email , $password)
        {
            $query = mysqli_query($this->conn(),"select * from tbl_user where email = '$email' and password='$password' and status='Active'");
            $count = mysqli_num_rows($query);
            if($count>0)
            {
                session_start();
                $fetch = mysqli_fetch_array($query);
                $_SESSION['user_id']=$fetch[0];
                $_SESSION['user_name']=$fetch[1];
                $_SESSION['email']=$fetch[3];
                header("Location:../Index.php");
            }
            else
            {
            
               header("Location:../Accounts.php?msg=InvalidLogin");
            }
        }
        function db_insert($q)
        {
            $insert = mysqli_query($this->conn(),$q);
            if($insert>0)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        function db_select($table)
        {
            $select = mysqli_query($this->conn(),"select * from $table");
            return $select; 
        }
        
        function db_select1($table)
        {
            $select = mysqli_query($this->conn(),$table);
            return $select; 
        }
        function db_update($table)
        {
            $update = mysqli_query($this->conn(),$table);
            return $update; 
        }

        function image($a,$b)
        {
            $query = mysqli_query($this->conn(),"insert into tbl_image (name,product_id) values ('$a','$b')");
            return $query;
        }

        function subcat_pro($a)
        {
            $query=mysqli_query($this->conn(),"select * from tbl_product where subcat_id =$a and status='Active'");
            return $query;
        }
        
        function getimg($a)
        {
            $query = mysqli_query($this->conn(),"select * from tbl_image where product_id = $a");
            return $query;
        }
         function getimg1($a)
        {
            $query = mysqli_query($this->conn(),"select * from tbl_image where product_id = $a limit 1");
            return $query;
        }
        function getsignlepro($a)
        {
            $query = mysqli_query($this->conn(),"select * from vproduct where id=$a");
            return $query;
        }
        function getreviews($a)
        {
            $query = mysqli_query($this->conn(),"select * from tbl_review where product_id = $a");
            return $query;
        }
         function count($a)
        {
            $query = mysqli_query($this->conn(),"select count(*) from tbl_review where product_id=$a");
            return $query;
        }
        function tbl_count($a)
        {
            $query = mysqli_query($this->conn(),"select count(*) from $a");
            return $query;
        }
         function tbl_unactivecount($a)
        {
            $query = mysqli_query($this->conn(),"select count(*) from $a where status='Un-Active'");
            return $query;
        }
         function tbl_activecount($a)
        {
            $query = mysqli_query($this->conn(),"select count(*) from $a where status='Active'");
            return $query;
        }
        
         function getsignlepro1($a)
        {
            $query = mysqli_query($this->conn(),"select * from vproduct where id=$a");
            return $query;
        }
         function getfaq($a)
        {
            $query = mysqli_query($this->conn(),"select * from tbl_faq where id=$a");
            return $query;
        }
         function getorder($a)
        {
            $query = mysqli_query($this->conn(),"select * from tbl_order where id=$a");
            return $query;
        }
        function deletepro($a)
        {
            $query = mysqli_query($this->conn(),$a);
            return $query;
        }
        /*check values of wishlist*/
        function check($a,$b)
        {
            $query = mysqli_query($this->conn(),"select * from tbl_wishlist where product_id =$a and user_id =$b");
            return $query;
        }

        /*Get Last Order Summary In Ordersummary.php page*/
         function get_max_id($id)
        {
            $query = mysqli_query($this->conn(),"select MAX($id) from tbl_order");
            return $query;
        }
        function select_order($id)
        {
            $order = mysqli_query($this->conn(),"select * from tbl_order where id = $id");
            return $order;
        }

        function track_order($order_id)
        {
            $select = mysqli_query($this->conn(),"select * from tbl_order where order_id = '$order_id'");
            return $select;
        }





    }
?>