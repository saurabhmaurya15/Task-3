<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class DB{
    private $server = 'localhost';
    private $user = 'root';
    private $password = 'root';
    private $dbname = 'CD';
    private $MySQLHandle ;
    
    public function __construct() {
        //echo "Executing<br>";
        $server = $this->server;
        $user = $this->user;
        $password = $this->password;
        $dbname = $this->dbname;
        $this->MySQLHandle = mysqli_connect($server,$user,$password,$dbname);
        if($MySQLHandle===false){
            echo "Cannot create connection.";
            exit(0);
        }
    }
    public function __destruct() {
        mysqli_close($MySQLHandle);
        
    }
    public function GetData() {
        //echo "getdata";
        $query = "SELECT * from coupons";
        //$MySQLHandle = $this->MySQLHandle;
        $result = mysqli_query($this->MySQLHandle, $query);
        echo "<table><tr><th>ID</th><th>Brand</th><th>Category</th><th>Code</th></tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td>".$row['id']."</td>"."<td>".$row['brand']."</td><td>".$row['category']."</td><td>".$row[code]."</td></tr>";
            
        }
         echo "</table>";
    }
    
    public function SearchCoupon($var1,$var2) {
        //echo "getdata";
        //echo $var1,$var2;
        //echo empty($var1);
        //echo $var1,$var2;
        $var1 = mysql_real_escape_string($var1);
        $var2 = mysql_real_escape_string($var2);
        //echo $var1,$var2;
        if(!empty($var1) && !empty($var2))
            $query = "SELECT * from coupons where brand LIKE '%$var1%' and category LIKE '%$var2'";
        elseif(!empty($var1) && empty($var2))
            $query = "SELECT * from coupons where brand LIKE '%$var1%'";
        elseif(empty($var1) && !empty($var2))
             $query = "SELECT * from coupons where category LIKE '%$var1%'";
        else{
             echo "Empty Search string!!";
             return ;
        }
        //echo "<br>$query";   
        //$MySQLHandle = $this->MySQLHandle;
        $result = mysqli_query($this->MySQLHandle, $query);
        
        if(mysqli_num_rows($result)==0){
            echo "<h2>No result.!!!</h2><br>";
            return;
        }
        echo "<table><tr><th>ID</th><th>Brand</th><th>Category</th><th>Code</th></tr>";
        
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td>".$row['id']."</td>"."<td>".$row['brand']."</td><td>".$row['category']."</td><td>".$row[code]."</td></tr>";
            
        }
        echo "</table>";
    }
    
    public function InsertData($var2,$var3,$var4) {
        //echo "getdata";
        //echo $var1,$var2,$var3,$var4;
        $query = "INSERT INTO coupons VALUES('','$var2','$var3','$var4')";
        //$MySQLHandle = $this->MySQLHandle;
        $result = mysqli_query($this->MySQLHandle, $query);
        
        if($result)
            echo "<h2>Your data is inserted in the table.</h2><a href='insertdata.php'>Add More</a>";
        else {
            echo "<h2>Error data not inserted.</h2><a href='insertdata.php'>Try Again</a>";
        }
        
    }
    
    public function SearchCouponNoSecurity($var1,$var2) {
        //echo "getdata";
        //echo $var1,$var2;
        //echo empty($var1);
        //echo $var1,$var2;
        //$var1 = mysql_real_escape_string($var1);
        //$var2 = mysql_real_escape_string($var2);
        //echo $var1,$var2;
        if(!empty($var1) && !empty($var2))
            $query = "SELECT * from coupons where brand LIKE '%$var1%' and category LIKE '%$var2'";
        elseif(!empty($var1) && empty($var2))
            $query = "SELECT * from coupons where brand LIKE '%$var1%'";
        elseif(empty($var1) && !empty($var2))
             $query = "SELECT * from coupons where category LIKE '%$var1%'";
        else{
             echo "Empty Search string!!";
             return ;
        }
        //echo "<br>$query";   
        //$MySQLHandle = $this->MySQLHandle;
        $result = mysqli_query($this->MySQLHandle, $query);
        
        if(mysqli_num_rows($result)==0){
            echo "<h2>No result.!!!</h2><br>";
            return;
        }
        echo "<table><tr><th>ID</th><th>Brand</th><th>Category</th><th>Code</th></tr>";
        
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td>".$row['id']."</td>"."<td>".$row['brand']."</td><td>".$row['category']."</td><td>".$row[code]."</td></tr>";
            
        }
        echo "</table>";
    }

}