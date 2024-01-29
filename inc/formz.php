<?php
  
$errors = [
 'firstNameError'=>'',
 'lastNameError'=>'',
 'emailError'=>'',
 'boxError'=>'',
];
if (isset($_POST ['submit'])){


    
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email =    $_POST['email'];
   
    $boxs = isset($_POST['box']) ? $_POST['box'] : '';
  




//تحقق الاسم الاول
if(empty($firstName)){
    $errors['firstNameError'] ='يرجي ادخال الاسم الاول';

//تحقق الاسم الاخير
}if(empty($lastName)){
    $errors['lastNameError'] ='يرجي ادخال الاسم الاخير ';
 
 } if(empty($boxs)){
        $errors['boxError'] =' الرجاء الموافقه على الشروط   ';
        
    //تحقق الايميل
    }if(empty($email)){
        $errors['emailError'] ='يرجي ادخال الايميل ';
    }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $errors['emailError'] =' يرجي ادخال الايميل صحيح';
    
    }
 
    
       //تحقق لايوجد اخطاء
        if(!array_filter($errors)){
            $firstName =mysqli_real_escape_string($conn, $_POST['firstName']);
            $lastName =mysqli_real_escape_string($conn, $_POST['lastName']) ;
            $email =mysqli_real_escape_string($conn, $_POST['email']);
            $boxs =mysqli_real_escape_string($conn, $_POST['box']);

            $sql = "INSERT INTO users(firstName,lastName,email) VALUES('$firstName','$lastName','$email')";

        
            if(mysqli_query($conn,$sql)){
                header('Location'.$_SERVER ['PHP_SELF']);
                }else{
                echo ' Error:'. mysqli_error($conn);
                }
            }
}









