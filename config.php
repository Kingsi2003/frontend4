<?php

    
     $localhost = 'localhost';
     $user = 'root';
     $password = '';
     $dbname = 'tail';
    try{
         $conn = mysqli_connect($localhost,$user,$password,$dbname);
    }
    catch(mysqli_sql_exception){

    }


   
  
  