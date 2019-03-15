<!DOCTYPE html>
<!--
Author: Jack Boddeke
Date: 10/03/2019
Purpose: Lab 4.2
Version: 0.1 
Contact: jackboddeke1@outlook.com 
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php

        /*
        Author: Jack Boddeke
        Date: 10/03/2019
        Purpose: Lab 4.1
        Version: 0.1 
        Contact: jackboddeke1@outlook.com 
        */
        
        // Include the 'myfunctions.php' file - Lab 4.2 Specific
        include 'includes/myfunctions.php';
        
        // Declare Variables
        $first_name = '';
        $last_name = '';
        $email = '';
        $password = '';
        $mobile = '';
        $dob = ''; // Lab 4.2 specific

        //Error Array
        $errors = [];

        //Header Page
        include 'includes/header.php';

        //Check if user has submitted form.
        if(isset($_POST['submit'])){

            //If they have, validation and assign variables.
            if(isset($_POST['first_name'])){
                $first_name = $_POST['first_name'];
                if(strlen($first_name) == 0){
                    $errors['first_name'] = 'Please enter your name!' ;
                }elseif (!ctype_alpha($first_name)) {
                    $errors['first_name'] = 'Names can only contain letters!' ;
                }
            }
            
            if(isset($_POST['last_name'])){
                $last_name = $_POST['last_name'];
                if(strlen($last_name) == 0){
                    $errors['last_name'] = 'Please enter your last name!' ;
                }elseif (!ctype_alpha($last_name)) {
                    $errors['last_name'] = 'Names can only contain letters!' ;
                }
            }
            
            if(isset($_POST['email'])){
                $email = $_POST['email'];
                if(strlen($email) == 0){
                    $errors['email'] = 'Please enter your email!' ;
                }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errors['email'] = 'Please enter a valid email!' ;
                }
            }
            
            if(isset($_POST['password'])){
                $password = $_POST['password'];
                if(strlen($password) == 0){
                    $errors['password'] = 'Please enter your password!' ;
                }elseif (!ctype_alnum($password)) {
                    $errors['password'] = 'Names can only contain letters and numbers!' ;
                }
            }
            
            if(isset($_POST['mobile'])){
                $mobile = $_POST['mobile'];
                if(strlen($mobile) == 0){
                    $errors['mobile'] = 'Please enter your mobile number!' ;
                }elseif (!ctype_digit($mobile)) {
                    $errors['mobile'] = 'Mobile numbers can only contain numbers!' ;
                }
            }
            
            //Date of Birth Validation. - Lab 4.2 specific
            if(isset($_POST['dob'])){
                $dob = $_POST['dob'];
                if(strlen($dob) == 0){
                    $errors['dob'] = 'Please enter your date of birth!' ;
                }elseif (!validateDOB($dob)) {
                    $errors['dob'] = 'Date of birth is not valid!' ;
                }
            }
            
            //If no errors, display data page
            if(count($errors) == 0){
                include 'includes/display_data.php';

            } else {
                //Else show sign up form again.
                //TO DO: Show previous data.
                include 'includes/signup_form.php';

            }
        } else {
            //User hasn't submitted form, show form.
            include 'includes/signup_form.php';
        }

        //Footer
        include 'includes/footer.php';

        //End PHP
        ?> 
        
    </body>
</html>
