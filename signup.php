<?php
include('config.php');
if(isset($_POST['firstname']) AND isset($_POST['lastname']) AND isset($_POST['email']) AND isset($_POST['password'])){
    if( $_POST['firstname'] == '' OR $_POST['lastname'] == '' OR $_POST['email'] == '' OR $_POST['password'] == ''){
        exit('user empty');
    }
    else{
    $firstname = htmlspecialchars(filter_input(INPUT_POST,'firstname',FILTER_SANITIZE_SPECIAL_CHARS));
    $lastname = htmlspecialchars(filter_input(INPUT_POST,'lastname',FILTER_SANITIZE_SPECIAL_CHARS));
    $email = htmlspecialchars(filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL));
    $password = htmlspecialchars(filter_input(INPUT_POST,'password',FILTER_SANITIZE_SPECIAL_CHARS));
    $query ="SELECT * FROM users WHERE email ='$email'";
    $send = $conn->query($query);
    $resultnum = mysqli_num_rows($send);
    if($resultnum > 0 ){
        exit('user already registered');
       
    }
    else{
        $query = "INSERT INTO users (firstname ,lastname , email , `password`) VALUES ('$firstname','$lastname','$email','$password')";
        $send = $conn->query($query);
        exit('move');

        
      
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
           
          
          <form action="" class="form-control" id="signup">


            <h3 class="text-capitalize p-2 signinheading ">tail realtime chat</h3>


            <div class="col12   text-denger errorm text-center"><small class="erm"></small></div>


            <div class="d-flex gap-2 align-items-center w-100 justify-content-center mt-4 mb-4 flex-wrap">
                <div class="col-12 col-md-5 ">

                    <div class="formbox mt-2">
                        <label for="firstname">firstname</label>
                        <input type="text" placeholder="Enter your firstname" class="form-control r" name="firstname" >
                    </div>
                </div>
                <div class="col-12 col-md-5">
                    <div class="formbox mt-2">
                        <label for="lastname">lastname</label>
                        <input type="text" placeholder="Enter your lastname" class="form-control r" name="lastname">
                    </div>
                </div>
            </div>


            <div class="formbox mt-2">
                <label for="email"> Email Address</label>
                <input type="email" placeholder="Enter your email" class="form-control r" name="email" >
            </div>

            <div class="formbox mt-2">
                <label for="passsword">password</label>
                <input type="password" placeholder="Enter your password" class="form-control r" name="password">
            </div>
            <div class="formbox mt-4">
               <input type="submit" value="continue to chat" class="form-control bg-dark text-light supp ">
            </div>
            <div class="formbox mt-4 mb-4 d-flex justify-content-center">
             <label for="" class="">have an account? <a href="index.php" class="text-decoration-none">Sign in</a></label>
            </div>


          </form>
          </div>
    </div>
    
</body>
</html>