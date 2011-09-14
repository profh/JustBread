<?php

	include ("includes/common.php");

	// Arrays::printArray($_POST);
	// Arrays::printArray($_SESSION);
	
	// Some operations occur on customer object
	$customer = new Customer();  // create new Customer object
  $customer->init(4);  // initialize customer with ID=4
	$customer->setFirstName("Fred"); // change first name to Fred (of course)
	$old_orders = $customer->getOrderArray(); // get Fred's past orders
	

 	$page->startPage();
	echo "<p class=\"error\">This page is under construction.<p>";	
	echo "<p>Order IDs for $customer->getFirstName() $customer->getLastName()</p>"
	Arrays::printArray($old_orders);
	$page->endPage(); 
 
?>