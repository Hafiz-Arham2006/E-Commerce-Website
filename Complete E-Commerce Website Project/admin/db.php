<?php

class Database
{

    public $conn;
    function Connection()
    {
        $this->conn = mysqli_connect("localhost", "root", "", "ecommerce_db");
    }
    function Show()
    {
        $sql = "SELECT * FROM products";
        $ans = mysqli_query($this->conn, $sql);
        return $ans;
    }
    function Add_Product($p_name, $p_price, $p_description, $p_img)
    {
        $sql = "INSERT INTO `products`(`p_name`, `p_price`, `p_description`, `p_img`) VALUES ('$p_name','$p_price','$p_description','$p_img')";
        $ans = mysqli_query($this->conn, $sql);
    }
    function Fetch_Id($id)
    {
        $sql = "SELECT * FROM products WHERE id=$id";
        $ans = mysqli_query($this->conn, $sql);
        return $ans;
    }

    function Update($id, $p_name, $p_price, $p_description, $p_img)
    {
        $sql = "UPDATE products set p_name='$p_name', p_price='$p_price', p_description='$p_description' , p_img='$p_img' WHERE id='$id'";
        $ans=mysqli_query($this->conn,$sql);
    }
                function Delete_Product($id){
                        $sql="DELETE from products WHERE id=$id";
                        $ans=mysqli_query($this->conn,$sql);
                }
            function Admin_Fetch(){
                $sql="SELECT * FROM admin";
                $ans=mysqli_query($this->conn,$sql);
                return $ans;
            }
                function Admin_Update($admin_name,$admin_password){
                    $sql="UPDATE `admin` SET `name`='$admin_name',`password`='$admin_password'";
                    $ans=mysqli_query($this->conn,$sql);
                }
                function Insert_Users($username,$email,$password){
                    $sql="INSERT INTO users (username , email , password ) VALUES ($username,$email,$password)";
                    $ans=mysqli_query($this->conn,$sql);
                }
                function Fetch_Users(){
                    $sql="SELECT * FROM users";
                    $ans=mysqli_query($this->conn,$sql);
                    return $ans;
                }
                        function Add_Recommend_Products($p_name,$p_price,$p_description,$p_img){
                            $sql="INSERT INTO `recommend_products` (`p_name` , `p_price` , `p_description` , `p_img`) VALUES ('$p_name','$p_price','$p_description','$p_img')";
                            $ans=mysqli_query($this->conn,$sql);
                        }
                        function Fetch_Recommend_Products(){
                                $sql="SELECT * FROM recommend_products";
                                $ans=mysqli_query($this->conn,$sql);
                                return $ans;
                        }
                        function Fetch_Recommend_Id($id){
                            $sql="SELECT * FROM recommend_products WHERE id=$id";
                            $ans=mysqli_query($this->conn,$sql);
                            return $ans;
                        }
                        function Update_Recommend($id,$p_name, $p_price, $p_description, $p_img) {
        $sql = "UPDATE recommend_products set p_name='$p_name', p_price='$p_price', p_description='$p_description' , p_img='$p_img' WHERE id='$id'";
        $ans=mysqli_query($this->conn,$sql);
    }
                    function Delete_Recommend($id){
                        $sql="DELETE from recommend_products WHERE id=$id";
                        $ans=mysqli_query($this->conn,$sql);
                    }
                    function Search_Products($search){

                        $sql="SELECT * from products WHERE p_name like '%$search%'";
                        $ans=mysqli_query($this->conn,$sql);
                        return $ans;
                    }
                   
};

$obj = new Database();
$obj->Connection();
