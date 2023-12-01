<?php
include('config.php');
include('session.php');



 if(isset($_POST['email']) AND isset($_POST['password'])){
    if($_POST['email'] =="" AND $_POST['password'] ==""){

        exit('empty values');

    }
    else{
 
        $email = htmlspecialchars(filter_input(INPUT_POST,'email',FILTER_SANITIZE_SPECIAL_CHARS));
        $password = htmlspecialchars(filter_input(INPUT_POST,'password',FILTER_SANITIZE_SPECIAL_CHARS));
        $query = "SELECT * FROM users WHERE email = '$email' AND `password` = '$password'";
        $send = $conn->query($query);
        $querynum = mysqli_num_rows($send);
        $result = mysqli_fetch_assoc($send);
        if($querynum>0){
          $_SESSION['email'] = $result['email'];
          $_SESSION['firstname'] = $result['firstname'];
          $_SESSION['lastname'] = $result['lastname'];
        
            exit('move');
        }
        else{
            exit('user does not exist');
        }
    }
  
 }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="res/framework/bootstrap-5.0.2/dist/css/bootstrap.css">
    <link rel="stylesheet" href="css/signin.css">
    <script defer src="res/framework/jquery.js"></script>
    <script defer src="javascript/main.js"></script>
  
    
    <title>sign in</title>
</head>
<body>
    <div class="container-fluid box d-flex align-items-center justify-content-center">
          <div class="col-12 col-md-5 h-75 p-3 ">
           
          
          <form action="" class="form-control" method="" id="signin">


            <h3 class="text-capitalize p-2 signinheading ">tail realtime chat</h3>


            <div class="col12   text-denger errorm text-center"><small class="errm"></small></div>


            <div class="formbox mt-2">
                <label for="email"> Email Address</label>
                <input type="text" placeholder="Enter your email" class="form-control " name="email">
            </div>

            <div class="formbox mt-2">
                <label for="passsword">password</label>
                <input type="password" placeholder="Enter your password" class="form-control" name="password" class="password">
            </div>
            <div class="formbox mt-4">
               <input type="submit" value="continue to chat" class="form-control bg-dark text-light siin" name="submit" >
            </div>
            <div class="formbox mt-4 mb-4 d-flex justify-content-center">
             <label for="" class="">Not yet signed up? <a href="signup.php" class="text-decoration-none">Signup now</a></label>
            </div>


          </form>
          </div>
    </div>
    
</body>
</html>