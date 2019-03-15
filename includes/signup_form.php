<?php

/*
Author: Jack Boddeke
Date: 10/03/2019
Purpose: Lab 4.2
Version: 0.1 
Contact: jackboddeke1@outlook.com 
*/
?>

<form action="" method="post">
    <h1>Sign Up</h1>
    
    <!--First Name -->
    <fieldset>
        <legend><span class="number">&nbsp;</span>Your Basic Info</legend>
        
        <label>
            First Name:
            <span class="error">
                <?=isset($errors['first_name'])? $errors['first_name']:"" ?>
            </span>
        </label>
        <input type="text" name="first_name" value="<?php echo $first_name; ?>" maxlength="30" />
    </fieldset>
    
    <!--last Name -->
    <fieldset>

        <label>
            Last Name:
            <span class="error">
                <?=isset($errors['last_name'])? $errors['last_name']:"" ?>
            </span>
        </label>
        <input type="text" name="last_name"value="<?php echo $last_name; ?>" maxlength="30" />
    </fieldset>
    
    <!--Email -->
    <fieldset>

        <label>
            Email:
            <span class="error">
                <?=isset($errors['email'])? $errors['email']:"" ?>
            </span>
        </label>
        <input type="text" name="email" value="<?php echo $email; ?>" />
    </fieldset>
    
    <!--Password -->
    <fieldset>

        <label>
            Password:
            <span class="error">
                <?=isset($errors['password'])? $errors['password']:"" ?>
            </span>
        </label>
        <input type="text" name="password" value="<?php echo $password; ?>" />
    </fieldset>
    
    <!--Mobile -->
    <fieldset>

        <label>
            Mobile:
            <span class="error">
                <?=isset($errors['mobile'])? $errors['mobile']:"" ?>
            </span>
        </label>
        <input type="text" name="mobile" value="<?php echo $mobile; ?>" maxlength="10" />
    </fieldset>
    
    <!--Date of Birth - Lab 4.2 specific-->
    <fieldset>

        <label>
            Date of Birth:
            <span class="error">
                <?=isset($errors['dob'])? $errors['dob']:"" ?>
            </span>
        </label>
        <input type="date" name="dob" value="<?php echo $dob; ?>" />
    </fieldset>
    
    <!--Submit-->
    <button type="submit" name="submit" value="">Sign Up</button>
    
</form>

