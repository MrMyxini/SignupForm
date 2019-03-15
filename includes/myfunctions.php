<?php

/*
 * To use these functions include this page in your PHP
 * 
 * How to use these functions:
 * 
 * $valid = validateDate($date);
 * 
 * $valid = validateMonthYearDate($date);
 * 
 * $valid = validateStreetAddress($street_address);
 * 
 * @author Stefan Batsas
 * @date 2017
 */


  /**
   * function validates date formats: dd/mm/yyyy, yyyy-mm-dd
   * @param type $date
   * @return boolean
   */
  function validateDate($date){
        
      $valid = false;
      // no support for HTML5 date picker user enters input for date 
      // any other date format will not pass 
      if(preg_match("/\d{4}\-\d{2}\-\d{2}/", $date)){
          // if we are here user has entered format of yyyy-mm-dd
          $day = $month = $year ="";
          // split up the pieces 
          list($year,$month,$day) = explode("-",$date);
          
          $day = intval($day);
          $month = intval($month);
          $year = intval($year);
          
          // now use PHP checkdate to verify it is a valid date 
          if(checkdate($month, $day, $year)){
             $valid = true;
              
          }
      
      // no support for HTML5 date picker user enters input for date 
      // any other date format will not pass 
      }else if (preg_match("/\d{2}\/\d{2}\/\d{4}/", $date)){
          // if we are here user has entered format of dd/mm/yyyy
          $day = $month = $year ="";
          // split up the pieces 
          list($day,$month,$year) = explode("/",$date);
          
          $day = intval($day);
          $month = intval($month);
          $year = intval($year);
          
          // now use PHP checkdate to verify it is a valid date 
          if(checkdate($month, $day, $year)){
             $valid = true;
              
          }
          
      } 
      return $valid;
    } // end function
    
    /**
   * function validates date formats: dd/yyyy, yyyy-mm
   * eg. card expiry date
   * @param type $date
   * @return boolean
   */
    
    
    function validateMonthYearDate($date){
        
      $valid = false;
      
      if(preg_match("/\d{4}\-\d{2}/", $date)){
        // if we are here user has ebtered format of mm/yyyy
          $month = $year ="";
          // split up the pieces 
          list($year,$month) = explode("-",$date);
          
         
          $month = intval($month);
           $year = intval($year);
          // now use PHP checkdate to verify it is a valid date - 1 is supplied for day
          if(checkdate($month, 1, $year)){
             $valid = true;
              
          }
      
      // no support for HTML5 date picker user enters input for date
      // any other date format will not pass 
      }else if (preg_match("/\d{2}\/\d{4}/", $date)){
          // if we are here user has ebtered format of mm/yyyy
          $month = $year ="";
          // split up the pieces 
          list($month,$year) = explode("/",$date);
          
         
          $month = intval($month);
           $year = intval($year);
          // now use PHP checkdate to verify it is a valid date - 1 is supplied for day
          if(checkdate($month, 1, $year)){
             $valid = true;
              
          }
          
      } 
      return $valid;
    } // end function
    
    /**
     * Street address example Unit 5/23-24 Page street
     * Can contain one forward slash and one dash
     * @param type $value
     * @return boolean
     */
    function validateStreetAddress($value){
            
           $valid = true;
           
                // check for forward slashes  - 1 is permitted
                $numSlashes = $numDashes = 0;
                
                // number of slashes replaced stored in $numSlashes
                $temp = str_replace("/","",$value,$numSlashes);
                // number of dashes replaced stored in $numSlashes
                $temp = str_replace("-", "", $value, $numDashes);
                
                if($numSlashes > 1 || $numDashes > 1){
                    
                    $valid = false;
                    
                } else {        
             
                        // remove spaces
                        $temp = str_replace(" ","",$value);
                        // remove slash
                        $temp = str_replace("/","",$temp);
                        // remove dashes
                        $temp = str_replace("-","",$temp);

                        // check for alpha numeric
                        if(!ctype_alnum($temp)){
                            $valid = false;
                        } // end if
                        
                } // end if
                
          return $valid;
         
    }  // end validation of street address
    
    /**
     * Complex names eg Jon-Palo Jnr. the 3rd
     * Allow alpha numeric, spaces, 1 hyphen, 1 period, 1 digit
     * @param type $value
     * @return boolean
     */
    function validate_complex_name($value) {

        $valid = true;
        // remove the spaces
        $temp = str_replace(' ', '', $value);
        // remove dashes and count them
        $temp = str_replace('-', '', $temp, $hyphen_count);
        // remove periods and count them
        $temp = str_replace('.', '', $temp, $fullstop_count);
        // count the number of digits
        $digit_count = preg_match_all("/[0-9]/", $temp);

        // rules are 1 dash, 1 period, 1 digit and alpha permitted
        if (!ctype_alnum($temp) || $hyphen_count > 1 ||
                $fullstop_count > 1 || $digit_count > 1) {
            $valid = false;
        }

        return $valid;
    }
    
    
    function validateDOB($value){
        $valid = false;
        
        if(validateDate($value)){
            
            $today = date('Y-m-d');
			$dob = date($value);
			$time1 = strtotime($today);
            $time2 = strtotime($dob);
			
            if($time2 < $time1){
                $valid = true;
            }
            
        }
        
        return $valid;
    }
    
    ?>

