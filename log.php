<?php
        session_start();
        include "config.php";
        if(isset($_POST["login"]))
        {
            $useremail = $_POST["email"];
            $pass = $_POST["Password"];

            $mysql = "SELECT * from `user_detail` where `user_email` = '$useremail' AND `user_password` = '$pass'";
            $result = mysqli_query($conn,$mysql);
            $row = mysqli_fetch_assoc($result);
            if(mysqli_num_rows($result)>0)
            {
                $_SESSION["u_id"] = $row["user_id"];
                $_SESSION["u_name"] = $row["user_name"];
                header("Location:index.php");
            }
            else{
                echo "<p class='text-danger'>Login denied</p>";
            }
        }

    ?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php include "links.php"; ?>
    <link rel="stylesheet" href="assets/css/nav.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorig in="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body id="top-header" data-background="dark" class="dark-theme">
<?php 
  include "header.php"; 
?>
<br>
<hr class="mt-3 h-5 w-80">
<br>
<br>

<div class="container">
      
       <center> <H1 class="mt-5">Log In</H1></center>
        <br>
        <br>
        <form class="w-50 bg-light text-dark rounded mx-auto mt-5 mr-0" method="POST" >
          <input type="text" name="email" id="email" placeholder="Enter your Email" class="form-control"><br><br>
          <input type="password" name="Password" id="Pssword" placeholder="Enter your Password" class="form-control"><br><br>

          <input type="submit" value="Log in" name="login" class="btn btn-success mx-auto w-30 mb-5">

        </form>
        </div>
    </div>
    

<script >
 $(document).ready(function () {
$.validator.addMethod("nm",function(e){
    return /^([a-zA-Z0-9]{0,20})$/.test(e);
},"Fllow the Pattern");
$('Form').validate({
rules: {
name: "required",
Pssword: "required",
email: "required",
userid: "required",
name: {
required: true,
nm:true
},
email: {
required: true,
email: true
},
Pssword: {
required: true
},
userid: {
required: true,
minlength: 1,
maxlength: 11,
number: true
},
},
messages: {
name:{
   required:"Please enter a valid name."
     },
email: {
required: "Please enter your email",
minlength: "Please enter a valid email address"
},
Pssword: {
required: "Enter Password"
},
userid: {
required: "Please provide a phone number",
},
}
})
}); 
</script>
</body>
    
    <?php include "footer.php" ?>
     <?php include "script.php" ?>

   

</body>
</html>