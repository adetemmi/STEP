<?php
require_once 'dbconn.php';



//mixing js with php and to get back where you started
if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['reg']) ){

    if(empty($_POST['uname'])){
        echo"
        <script>
        alert('Username must be filled')
        window.history.back()
        </script>
         "; 
    }elseif(!preg_match("/^[a-zA-Z-' ]*$/", $_POST['uname'])){
        echo'
        <script>
        alert("Character only is allowed")
        window.history.back()
        </script>
         '; 
}else{
    //uname means fullname in the datbase
   $uname = cleanData($_POST['uname']);
 //  echo "<script> alert ('$uname') </script>";
   // echo '<span >' .$uname.'</span>';
};

if(empty($_POST['email'])){

    echo"
    <script>
    alert('Email must be filled')
    window.history.back()
    </script>
     "; 

}else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        echo'
        <script>
        alert("Please enter an email format")
        window.history.back()
        </script>
         '; 
}else{
    
    $email = cleanData($_POST['email']);
   // echo "<script> alert ('$email') </script>";
   //  echo '<span >' .$email.'</span>';
 };


 if(empty($_POST['phone'])){

    echo"
    <script>
    alert('phonr must be filled')
    window.history.back()
    </script>
     "; 

}elseif(!preg_match("/^[0-9 + ]*$/", $_POST['phone'])){
        echo'
        <script>
        alert("Please enter proper format")
        window.history.back()
        </script>
         '; 
}else{
    
    $phone = $_POST['phone'];
   
 };
 
 if(empty($_POST['budget'])){

    echo"
    <script>
    alert('Amount must be filled')
    window.history.back()
    </script>
     "; 

}elseif(!preg_match("/^[0-9 + ]*$/", $_POST['budget'])){
        echo'
        <script>
        alert("Please enter proper format")
        window.history.back()
        </script>
         '; 
}else{
    
    $budget = $_POST['budget'];
   
 };
 
if(isset($_POST['web'])){
   $web= $_POST['web'];
};

if(isset($_POST['comname'])){
    $comname = $_POST['comname'];
 };
 
 if(isset($_POST['mes'])){
    $mes = $_POST['mes'];
 };
 if(isset($_POST['how'])){
    $how = $_POST['how'];
 };

if(!empty($_POST['duration'])){
    $duration= $_POST['duration'];
}else{
    $duration = "others";
}


$sele = "SELECT `user_id` FROM `members` Where `email` = '$email'";
    $rele_sele = $conn->query($sele);
    if($rele_sele->num_rows > 0){

         echo "<script>
         alert('User with your email already exsist')</script>
         ";
    }else{


    $ins ="INSERT INTO `members`(`fullname`, `email`, `phone`, `companyname`, `webselect`, `message`, `duration`, `budget`) VALUES ('$uname','$email','$phone','$comname','$web','$mes','$duration','$budget')";
    

    if($conn->query($ins)){
        //echo "Submit sucessfully";
    
      echo "<script> alert ('Thank you for reaching out, we have recieved your information and we will contact you soon') </script>";
        
    }else{
        echo $conn->error;
        
    }

 


   }
}

function cleanData($data){
    $data = trim($data); //trim is to remove extra space at the beginning  and end of the file
    $data = stripslashes($data); //to take backslash away form a word
    $data = htmlspecialchars($data);//to kick out hackers and to keep website safe so it changes when a user input special html characters it  makes it useless
    $data = filter_var($data, FILTER_SANITIZE_STRING);

    return $data;

}

    
require_once 'index.html';


?>
