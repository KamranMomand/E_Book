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
      
       <center> <H1 class="mt-5">Registration Form</H1></center>
        <br>
        <br>
        <form class="w-50 bg-light text-dark rounded mx-auto mt-5 mr-0" method="POST" action="datainsert.php">
          <input type="text" name="name" id="name" placeholder="Enter your Name" class="form-control"><br><br>
          <input type="text" name="lastname" id="lastname" placeholder="Enter your Last Name" class="form-control"><br><br>
          <input type="text" name="email" id="email" placeholder="Enter your Email" class="form-control"><br><br>
          <input type="password" name="Pssword" id="Pssword" placeholder="Enter your Password" class="form-control"><br><br>

          <input type="submit" value="Submit" name="submit" class="btn btn-success mx-auto w-30 mb-5">
          <!-- <a href="index.php" class="btn btn-info w-30 mx-auto  mb-5">Index</a> -->

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
// userid: "required",
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
// userid: {
// required: true,
// minlength: 1,
// maxlength: 11,
// number: true
// },
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
// 'userid: {
// required: "Please provide a phone number",
// },'
}
})
}); 
</script>
</body>
    
    <?php include "footer.php" ?>
     <?php include "script.php" ?>

     

</body>
</html>