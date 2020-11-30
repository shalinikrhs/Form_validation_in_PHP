
<?php
 //error_reporting = E_ALL & ~E_NOTICE
 error_reporting (E_ALL ^ E_NOTICE);
 
?>

<?php
   $name_error="";
   $email_error="";
   $gender_error="";
   $contact_error="";
   
   if(isset($_POST["submit"])){
       $uname=$_POST["uname"];
       $email=$_POST["email"];
       $gender=$_POST["gender"];
       $contact=$_POST["contact"];
       $comment=$_POST["comment"];
   
       if(empty($uname)){
           $name_error="Name is required";
       }else{
           $name=user_input($uname);
           if(!preg_match("/^[A-Za-z. ]*$/",$name)){
           $name_error="Only letters and White space are allowed";   
           }
       }
       //email
       if(empty($email)){
           $email_error="Email is required";
       }else{
           $emailEr=user_input($email);
           if(!preg_match("/[A-za-z0-9._ ]{3,}@[A-za-z0-9._ ]{3,}[.]{1}[A-za-z0-9._ ]{3,}/",$emailEr)){
               $email_error="Invalid email Id:";   
               }
       }
       //gender
       if(empty($gender)){
           $gender_error="Gender is required";
       }else{
           $genderEr=user_input($gender);
       }
       //contact
       if(empty($contact)){
           $contact_error="Contact no is required";
       }else{
           $contactEr=user_input($contact);
       }
   
       //display of output
       if(!empty($uname) && !empty($email) && !empty($gender) && !empty($contact)){
           if((preg_match("/^[A-Za-z. ]*$/",$name)==true) &&
           (preg_match("/[a-zA-z0-9._-]{3,}@[a-zA-z0-9._-]{3,}[.]{1}[a-zA-z0-9._ ]{2,}/",$emailEr))==true){
       echo "<h2>". "The Information Which submited" ."</h2>";
       echo "NAME: $uname"."<br>";
       echo "EMAIL: $email"."<br>";
       echo "GENDER: $gender"."<br>";
       echo "CONTACT: $contact"."<br>";
       echo "COMMENT: $comment"."<br>";
       }else{
           echo'<span> plese enter the correct details.</span>';
       }
     }
   }
   function user_input($data){
       return $data;
   }
   
   ?>

  <!--Html start--> 
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <!--CSS here--> 
      <link rel="stylesheet" href="form.css">
      <title>Form validation in PHP</title>
   </head>
   <body>
      <h1>Form validation in PHP</h1>
      <div class="form">
         <!--Form submission--> 
         <form action="index.php" method="post">
            <h3>*please fill out the following fields</h3>
            Name :<br>
            <input type="text" name="uname" value="" >*<br>
            <span><?php echo $name_error; ?></span><br>
            Email :<br>
            <input type="text" name="email" value="">*<br>
            <span><?php echo $email_error; ?></span><br>
            Gender :<br>
            <input type="radio" class="radio" name="gender" value="Male">Male
            <input type="radio" class="radio"name="gender" value="Female">Female <br>
            <span><?php echo $gender_error; ?></span><br>
            contact no:<br>
            <input type="number" name="contact" value="">*<br>
            <span><?php echo $contact_error; ?></span><br>
            comment:<br>
            <textarea name="comment"  rows="5" cols="25"></textarea>
            <br>
            <button class="save" name="submit" >submit</button>
         </form>
      </div>
   </body>
</html>