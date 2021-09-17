<?php
    include 'config.php';

    if(isset($_POST['add'])){
        $name=$_POST['name'];
        $info=$_POST['info'];
        $date = date('Y-m-d H:i:s');
        $type=$_POST['type'];
        
        $query="INSERT INTO pets(name,info,date,type)VALUES(?,?,?,?)";
        $stmt=$conn->prepare($query);
        $stmt->bind_param("ssss", $name,$info,$date,$type);
        $stmt->execute();

        header('location:index.php');
    }
?>