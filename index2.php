<?php

    $title = "Welcome to Just Bread";
    $pagecode = "home";
    include ("includes/lib/arrays.php");
    include ("includes/lib/validate.php");
    include ("includes/lib/forms.php");
    include ("includes/lib/form_controls/textbox.php");
    include ("includes/data.php");
    include ("includes/header.php");
    
    
    if (isset($_POST["Submit"]) && $_POST["Submit"] == "Place Order") {
    	
    	//	Print out $_POST array (demo purposes only)
    	echo '$_POST Array<BR>';
    	Arrays::printArray($_POST);
    	echo "<BR>";
    	
    	//  Collect what was ordered into an array
    	$temp = Arrays::getPostVars("^B[0-9]+$");
    		
    	//  Test to make sure values are all numeric and sum > 0
    	//  First step is to unset all null values
    	$quantities = Arrays::clearEmptyValues($temp);
    		
    	//	Print out $quantities array (demo purposes only)
    	echo '<BR>$quantities Array<BR>';
    	Arrays::printArray($quantities);
    	echo "<BR>";
    		
    	//  Now, get the values of $quantities and be sure are all valid and sum > 0
    	$quant = array_values($quantities);
    	
		$sum = 0; $test = "good";  // initialize values for $sum and $test
		foreach ($quant as $value) {
			if (Validate::isNonnegInteger($value, 0)) { $sum += $value; }
			else {
   				echo "<B><FONT COLOR=\"RED\">Please enter integers in the quantity fields. </FONT></B><BR>";
   				$test = "failed";
   				break;
   			}
   		}  // end of foreach loop
   		
   		//  everything good; give receipt
    	if ($test != "failed" && $sum > 0) { include ("includes/receipt.php"); } 
    	else { include ("includes/order_form.php"); } 
    	
    }  // end of if submit

    else {  // no submission, so give the form
    	include ("includes/order_form.php");
    }


	echo "<P>&nbsp;</P>";
    include ("includes/footer.php");
?>