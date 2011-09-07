<?php

class Validate {      // VALIDATE CLASS

// using this... example
// 	Validate::isName($_POST['first_name'], 0) 
// returns false if not a valid first name


/*  =============================================================
    METHOD SET 2:  OTHER FUNCTIONS	
    
    Note for all functions: 
    If $print == 1, then the message associated with the function 
    will be printed.  Otherwise no message will be echoed out. 
    =============================================================   */


// -----------------------
// FUNCTION: IS NOT NULL

public static function isNotNull()  {

/* This function checks to make sure the variable being passed
   is not null.  For strings, it simply tests to see if "" and 
   for radio buttons or check boxes, uses isset.  ($type in that
   case is set for "rb"         
   
   This function does NOT print to the errors_array.     */
   
   $args = func_get_args();
	switch (count($args)) {

		case 2:  
				$var = $args[0];
				$type = $args[1];
				$print = 0;
				break;

		case 3:  
				$var = $args[0];
				$type = $args[1];
				if ($args[2] == 1 || $args[2] == "print") { $print = 1; }
				else { $print = 0; }
				break;
    }

   if ($type == "rb") {  // radio button or check box or some other control
        if (isset($var)) { return TRUE; } 
        else { 
        	if ($print == 1) { echo "Please set a value for this control. "; }
        	return FALSE; 
        }
    }
    
    else {  // string value being passed, be sure it's not ""
        if ($var != "") { return TRUE; } 
        else { 
        	if ($print == 1) { echo "Please set a value for this field. "; }
        	return FALSE; 
        }
    }
    
}  // End of isNotNull()


// -----------------------
// FUNCTION: IS VALID

public static function isValid()  {

	$args = func_get_args();
	switch (count($args)) {

		case 2:  
				$value = $args[0];
				$pattern = $args[1];
				$msg = "";
				break;

		case 3:  
				$value = $args[0];
				$pattern = $args[1];
				$msg = $args[2];
				break;
    }

	$theresults = preg_match("/$pattern/", $value);
	if ($theresults) { return TRUE; } 
	else { 
		if ($msg != "") { echo $msg; }
		return FALSE; 
		}
}  //  end of isValid()


// -----------------------
// FUNCTION: IS NAME

public static function isName()  {

	$args = func_get_args();
	switch (count($args)) {

		case 1:  
				$value = $args[0];
				$print = 0;
				break;

		case 2:  
				$value = $args[0];
				if ($args[1] == 1 || $args[1] == "print") { $print = 1; }
				else { $print = 0; }
				break;
    }


	$pattern = "^[A-Za-z][A-Za-z.,' -]*$";
	$theresults = preg_match("/$pattern/", $value);
	if ($theresults) { return TRUE; } 
	else { 
		$msg = "This name has one or more invalid characters. ";
		if ($print == 1) { echo $msg; }
		return FALSE; 
		}
}  //  end of isName()


// -----------------------
// FUNCTION: IS ADDRESS

public static function isAddress()  {

	$args = func_get_args();
	switch (count($args)) {

		case 1:  
				$value = $args[0];
				$print = 0;
				break;

		case 2:  
				$value = $args[0];
				if ($args[1] == 1 || $args[1] == "print") { $print = 1; }
				else { $print = 0; }
				break;
    }

	$pattern = "^[0-9A-Za-z#][0-9A-Za-z.,#&' -]+$";
	$theresults = preg_match("/$pattern/", $value);
	if ($theresults) { return TRUE; } 
	else { 
		$msg = "This address has one or more invalid characters. ";
		if ($print == 1) { echo $msg; }
		return FALSE; 
		}
}  //  end of isAddress()


// -----------------------
// FUNCTION: IS CITY

public static function isCity()  {

	$args = func_get_args();
	switch (count($args)) {

		case 1:  
				$value = $args[0];
				$print = 0;
				break;

		case 2:  
				$value = $args[0];
				if ($args[1] == 1 || $args[1] == "print") { $print = 1; }
				else { $print = 0; }
				break;
    }

	$pattern = "^[A-Za-z][A-Za-z.&' -]+$";
	$theresults = preg_match("/$pattern/", $value);
	if ($theresults) { return TRUE; } 
	else { 
		$msg = "This city has one or more invalid characters. ";
		if ($print == 1) { echo $msg; }
		return FALSE; 
		}
}  //  end of isCity()


// -----------------------
// FUNCTION: IS ZIP

public static function isZip()  {

	$args = func_get_args();
	switch (count($args)) {

		case 1:  
				$value = $args[0];
				$print = 0;
				break;

		case 2:  
				$value = $args[0];
				if ($args[1] == 1 || $args[1] == "print") { $print = 1; }
				else { $print = 0; }
				break;
    }

	$pattern = "^[0-9]{5}(-[0-9]{4})?$";
	$theresults = preg_match("/$pattern/", $value);
	if ($theresults) { return TRUE; } 
	else { 
		$msg = "Zip codes must be 5 (or 9 if using +4 option) digits. ";
		if ($print == 1) { echo $msg; }
		return FALSE; 
		}
}  //  end of isZip()

                
// -----------------------
// FUNCTION: IS EMAIL

public static function isEmail()  {

	$args = func_get_args();
	switch (count($args)) {

		case 1:  
				$value = $args[0];
				$print = 0;
				break;

		case 2:  
				$value = $args[0];
				if ($args[1] == 1 || $args[1] == "print") { $print = 1; }
				else { $print = 0; }
				break;
    }

	$pattern = "^[A-Za-z0-9_%][A-Za-z0-9._%+-]*@[A-Za-z0-9_%][A-Za-z0-9._%-]+\.[A-Za-z]{2,4}$";
	$theresults = preg_match("/$pattern/", $value);
	if ($theresults) { return TRUE; } 
	else { 
		$msg = "This email address has one or more invalid characters. ";
		if ($print == 1) { echo $msg; }
		return FALSE; 
		}
}  //  end of isEmail()


// -----------------------
// FUNCTION: IS AGE

public static function isAge()  {

	$args = func_get_args();
	switch (count($args)) {

		case 1:  
				$value = $args[0];
				$print = 0;
				break;

		case 2:  
				$value = $args[0];
				if ($args[1] == 1 || $args[1] == "print") { $print = 1; }
				else { $print = 0; }
				break;
    }

	$pattern = "^[0-9]{1,3}$";
	$theresults = preg_match("/$pattern/", $value);
	if ($theresults) { return TRUE; } 
	else { 
		$msg = "This age does not appear to be valid. ";
		if ($print == 1) { echo $msg; }
		return FALSE; 
		}
}  //  end of isAge()


// -----------------------
// FUNCTION: IS SSN

public static function isSSN()  {

	$args = func_get_args();
	switch (count($args)) {

		case 1:  
				$value = $args[0];
				$print = 0;
				break;

		case 2:  
				$value = $args[0];
				if ($args[1] == 1 || $args[1] == "print") { $print = 1; }
				else { $print = 0; }
				break;
    }
	
	$pattern = "^([0-9]{9}|[0-9]{3}[-][0-9]{2}[-][0-9]{4})$";
	$theresults = preg_match("/$pattern/", $value);
	if ($theresults) { return TRUE; } 
	else { 
		$msg = "This social security number has one or more invalid characters. ";
		if ($print == 1) { echo $msg; }
		return FALSE; 
		}
}  //  end of isSSN()


// -----------------------
// FUNCTION: IS CCN

public static function isCCN()  {

	$args = func_get_args();
	switch (count($args)) {

		case 1:  
				$value = $args[0];
				$print = 0;
				break;

		case 2:  
				$value = $args[0];
				if ($args[1] == 1 || $args[1] == "print") { $print = 1; }
				else { $print = 0; }
				break;
    }
	
	$pattern = "^([0-9]{16}|[0-9]{4}[ -][0-9]{4}[ -][0-9]{4}[ -][0-9]{4})$";
	$theresults = preg_match("/$pattern/", $value);
	if ($theresults) { return TRUE; } 
	else { 
		$msg = "This credit card number has one or more invalid characters. ";
		if ($print == 1) { echo $msg; }
		return FALSE; 
		}
}  //  end of isCCN()


// -----------------------
// FUNCTION: IS PHONE

public static function isPhone()  {

	$args = func_get_args();
	switch (count($args)) {

		case 1:  
				$value = $args[0];
				$print = 0;
				break;

		case 2:  
				$value = $args[0];
				if ($args[1] == 1 || $args[1] == "print") { $print = 1; }
				else { $print = 0; }
				break;
    }

	$pattern = "^([0-9]{10}|([0-9]{3}\-[0-9]{3}\-[0-9]{4})|(\([0-9]{3}\)[ ]?[0-9]{3}\-[0-9]{4}))$";
	$theresults = preg_match("/$pattern/", $value);
	if ($theresults) { return TRUE; } 
	else { 
		$msg = "This phone number has one or more invalid characters. ";
		if ($print == 1) { echo $msg; }
		return FALSE; 
		}
}  //  end of isPhone()


// -----------------------
// FUNCTION: IS MONEY

public static function isMoney()  {

	$args = func_get_args();
	switch (count($args)) {

		case 1:  
				$value = $args[0];
				$print = 0;
				break;

		case 2:  
				$value = $args[0];
				if ($args[1] == 1 || $args[1] == "print") { $print = 1; }
				else { $print = 0; }
				break;
    }
	
	$pattern = "^([0-9]+|([0-9]{1,3}(,[0-9]{3})*)(.[0-9]{1,2}))?$";
	$theresults = preg_match("/$pattern/", $value);
	if ($theresults) { return TRUE; } 
	else { 
		$msg = "This input is not correct for US currency. ";
		if ($print == 1) { echo $msg; }
		return FALSE; 
		}
}  //  end of isMoney()


// -----------------------
// FUNCTION: IS NUMBER

public static function isNumber()  {

	$args = func_get_args();
	switch (count($args)) {

		case 1:  
				$value = $args[0];
				$print = 0;
				break;

		case 2:  
				$value = $args[0];
				if ($args[1] == 1 || $args[1] == "print") { $print = 1; }
				else { $print = 0; }
				break;
    }
	
	$pattern = "^(\-?[0-9]+(.[0-9]+)?|\-?[0-9]{1,3}(,[0-9]{3})*)(.[0-9]+)?$";
	$theresults = preg_match("/$pattern/", $value);
	if ($theresults) { return TRUE; } 
	else { 
		$msg = "This number does not appear to be valid. ";
		if ($print == 1) { echo $msg; }
		return FALSE; 
		}
}  //  end of isNumber()


// -----------------------
// FUNCTION: IS INTEGER

public static function isInteger()  {

	$args = func_get_args();
	switch (count($args)) {

		case 1:  
				$value = $args[0];
				$print = 0;
				break;

		case 2:  
				$value = $args[0];
				if ($args[1] == 1 || $args[1] == "print") { $print = 1; }
				else { $print = 0; }
				break;
    }
	
	if (is_numeric($value) && preg_match("/^\-?[0-9]+$/", $value)) { return TRUE; } 
	else { 
		$msg = "This number is not an integer. ";
		if ($print == 1) { echo $msg; }
		return FALSE; 
		}
}  //  end of isInteger()


// -----------------------
// FUNCTION: IS POS INTEGER

public static function isPosInteger()  {

	$args = func_get_args();
	switch (count($args)) {

		case 1:  
				$value = $args[0];
				$print = 0;
				break;

		case 2:  
				$value = $args[0];
				if ($args[1] == 1 || $args[1] == "print") { $print = 1; }
				else { $print = 0; }
				break;
    }
	
	if (is_numeric($value) && $value > 0 && preg_match("/^[0-9]+$/", $value)) { return TRUE; } 
	else { 
		$msg = "This number must be an integer greater than zero. ";
		if ($print == 1) { echo $msg; }
		return FALSE; 
		}
}  //  end of isPosInteger()


// -----------------------
// FUNCTION: IS NONNEG INTEGER

public static function isNonnegInteger()  {

	$args = func_get_args();
	switch (count($args)) {

		case 1:  
				$value = $args[0];
				$print = 0;
				break;

		case 2:  
				$value = $args[0];
				if ($args[1] == 1 || $args[1] == "print") { $print = 1; }
				else { $print = 0; }
				break;
    }
	
	if (is_numeric($value) && $value >= 0 && preg_match("/^[0-9]+$/", $value)) { return TRUE; } 
	else { 
		$msg = "This number is must be a non-negative integer. ";
		if ($print == 1) { echo $msg; }
		return FALSE; 
		}
}  //  end of isNonnegInteger()


// -----------------------
// FUNCTION: IN RANGE

public static function inRange()  {

	$args = func_get_args();
	switch (count($args)) {

		case 3:  
				$value = $args[0];
				if ($args[1] < $args[2])  {
					$min = $args[1];
					$max = $args[2];
				}
				else {
					$min = $args[2];
					$max = $args[1];
				}
				$print = 0;
				break;

		case 4:  
				$value = $args[0];
				if ($args[1] < $args[2])  {
					$min = $args[1];
					$max = $args[2];
				}
				else {
					$min = $args[2];
					$max = $args[1];
				}
				if ($args[3] == 1 || $args[3] == "print") { $print = 1; }
				else { $print = 0; }
				break;
    }
	
	if (is_numeric($value) && $value >= $min && $value <= $max) { return TRUE; } 
	else { 
		$msg = "This number is not between $min and $max. ";
		if ($print == 1) { echo $msg; }
		return FALSE; 
		}
}  //  end of inRange()




// -----------------------
// FUNCTION: IS VALID DATE

public static function isValidDate()  {

/* This function takes the month, day and year
   and checks to make sure these values constitute
   a valid date. */
   
    $args = func_get_args();
	switch (count($args)) {

		case 3:  
				$month = $args[0];
				$day = $args[1];
				$year = $args[2];
				$print = 0;
				break;

		case 4:  
				$month = $args[0];
				$day = $args[1];
				$year = $args[2];
				if ($args[3] == 1 || $args[3] == "print") { $print = 1; }
				else { $print = 0; }
				break;
    }
    
    $test = checkdate($month, $day, $year);
    if ($test) { return TRUE; } 
	else { 
		$msg = "This is not a valid date. ";
		if ($print == 1) { echo $msg; }
		return FALSE; 
		}
    
}  // End of isValidDate()


// -----------------------
// FUNCTION: IS VALID DATE MYSQL

public static function isValidDateMySQL()  {

/* This function takes a MySQL formatted date
   and checks to make sure it constitutes a
   valid date. */
   
    $args = func_get_args();
	switch (count($args)) {

		case 1:  
				$date = $args[0];
				$print = 0;
				break;

		case 2:  
				$date = $args[0];
				if ($args[1] == 1 || $args[1] == "print") { $print = 1; }
				else { $print = 0; }
				break;
    }
    
    $array_date = explode("-", $date);
    $year = $array_date[0];
    $month = $array_date[1];
    $day = $array_date[2];
    
    $test = checkdate($month, $day, $year);
    if ($test) { return TRUE; } 
	else { 
		$msg = "This is not a valid MySQL date. ";
		if ($print == 1) { echo $msg; }
		return FALSE; 
		}
    
}  // End of isValidDateMySQL()



// -----------------------
// FUNCTION: IS PAST DATE

public static function isPastDate() {

/* This function takes the month, day and year
   and checks to make sure these values constitute
   a valid date and one in the past.  Can be 
   useful, for example, when results can't be 
   reported for days that have yet to come. */
   
   $args = func_get_args();
	switch (count($args)) {

		case 3:  
				$month = $args[0];
				$day = $args[1];
				$year = $args[2];
				$print = 0;
				break;

		case 4:  
				$month = $args[0];
				$day = $args[1];
				$year = $args[2];
				if ($args[3] == 1 || $args[3] == "print") { $print = 1; }
				else { $print = 0; }
				break;
    }
   
   if (checkdate($month, $day, $year))  { // is a valid date
        $current = mktime();
        $userdate = mktime(0, 0, 0, $month, $day, $year);
        if ($userdate < $current) { return TRUE; } 
        else { 
        	$msg = "This date is in the future and therefore invalid here. ";
			if ($print == 1) { echo $msg; }
			return FALSE; 
		}
   }
   
   else { 
   		$msg = "This is not a valid date. ";
		if ($print == 1) { echo $msg; }
		return FALSE; 
	} // was not a valid date
    
}  // End of isPastDate()


// -----------------------
// FUNCTION: IS FUTURE DATE

public static function isFutureDate() {

/* This function takes the month, day and year
   and checks to make sure these values constitute
   a valid date and one in the future.  Can be 
   useful, for example, when you must post an event
   that is yet to come.  It sets at 11:59PM, so it 
   will allow you to post an event that is 
   supposed to occur today.  */
   $out = "";
   
   $args = func_get_args();
	switch (count($args)) {

		case 3:  
				$month = $args[0];
				$day = $args[1];
				$year = $args[2];
				$print = 0;
				break;

		case 4:  
				$month = $args[0];
				$day = $args[1];
				$year = $args[2];
				if ($args[3] == 1 || $args[3] == "print") { $print = 1; }
				else { $print = 0; }
				break;
    }
   
   if (checkdate($month, $day, $year))  { // is a valid date
        $current = mktime();
        $userdate = mktime(23, 59, 59, $month, $day, $year);
        if ($userdate > $current) { return TRUE; } 
        else { 
        	$msg = "This date is in the past and therefore invalid here. ";
			if ($print == 1) { echo $msg; }
			return FALSE; 
		}
   }
   
   else { 
   		$msg = "This is not a valid date. ";
		if ($print == 1) { echo $msg; }
		return FALSE; 
	} // was not a valid date
	
}  // End of isFutureDate()


// -----------------------
// FUNCTION: IS VALID EXPIRATION DATE

public static function isValidExpDate()  {

/* This function takes the month and year
   and checks to make sure this constitutes
   a date sometime in the future.  */
   
   $args = func_get_args();
	switch (count($args)) {

		case 2:  
				$month = $args[0];
				$year = $args[2];
				$print = 0;
				break;

		case 3:  
				$month = $args[0];
				$year = $args[1];
				if ($args[2] == 1 || $args[2] == "print") { $print = 1; }
				else { $print = 0; }
				break;
    }
   
   // Make sure something valid is passed (...not -1)
   if ($month == -1 || $year == -1) { 
   		$msg = "Please enter an appropriate month and/or year. ";
		if ($print == 1) { echo $msg; }
		return FALSE; 
	}
   
   // Find the next month...
   if ($month < 12) { $nextmonth = $month + 1; }
   else {$nextmonth = 1; $year += 1; }
   
   $expdate = mktime(23, 59, 59, $nextmonth, 0, $year); 
              // the 0 day of the month is the last day of the previous month
   $current = mktime();
   
   
   if ($expdate > $current) { return TRUE; }  // exp date hasn't yet passed
   else { 
   		$msg = "This is not a valid expiration date. ";
		if ($print == 1) { echo $msg; }
		return FALSE;
   }  // was not a valid exp date
    
}  // End of isValidExpDate()


}  //  END OF VALIDATE CLASS

/*  TESTING VALIDATE
$test = new Validate();
$phone = "(724) 935-0670";
echo "$phone<BR>";
$works = $test->isPhone($phone, 1);
*/
?>
