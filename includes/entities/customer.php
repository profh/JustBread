<?php

#  CUSTOMER CLASS

class Customer
{
	private $customer_id;
	private $first_name;
	private $last_name;
	private $active;
	private $past_orders_array;
	
	#  Constructor
	
	function __construct()
	{
		$this->customer_id = -1; #  No customer id
		$this->first_name = "";
		$this->last_name = "";
		$this->active = 1;
		$this->past_orders_array = array();
	}
	
	#  Get methods
	
	public function getCustomerID() {return $this->customer_id;}
	public function getFirstName() {return $this->first_name;}
	public function getLastName() {return $this->last_name;}
	public function getActive() {return $this->active;}
	public function getOrderArray() {return $this->past_orders_array;}
	
	#  Set methods
	
	public function setCustomerID($int) {$this->customer_id = $int;}
	public function setFirstName($varchar) {$this->first_name = $varchar;}
	public function setLastName($varchar) {$this->last_name = $varchar;}
	public function setActive($int) {$this->active = $int;}
	
	
	#  ------------------------------------
	#  FUNCTION: INITIALIZE FROM DB
	
	public function init()
	{
		$args = func_get_args();
		
		switch(count($args)) 
		{
			case 0:
				$customer_id = "tbd";
				break;
			
			case 1:
				$customer_id = $args[0];
				$this->customer_id = $customer_id;
				break;
		}
		
		if ($customer_id == "tbd") { $customer_id = $this->getCustomerID(); }
		if ($customer_id == -1 || $customer_id == "tbd" || $customer_id == "")  { return FALSE; }

		$db = new DB();
		if (!$db->Open()) { return FALSE; }
		
		$safe_id = $db->makeSafe($customer_id);
		
		$condition = "WHERE customer_id = $safe_id";
		
		
		$customerData = $db->getOneRecord("customers", $condition);
		
		if (!$customerData) #  No results were found
		{ 
			# echo "error: could not initialize from DB<br>";
			return FALSE;
		}
		else
		{
			# set class properties
			$this->customer_id = $customerData["customer_id"];
			$this->first_name = $customerData["first_name"];
			$this->last_name = $customerData["last_name"];
			$this->active = $customerData["active"];
			
			# get array of past order ids
			$customer_id = $customerData["customer_id"];
			$query = "SELECT order_id FROM orders WHERE customer_id = '$customer_id'";
			$past_orders_array = $db->getArray($query);
			if (!$past_orders_array) { $this->past_orders_array = array();}
			else { $this->past_orders_array = $past_orders_array; }  
		}	
	} #  End of init()
		
		
	#  -----------------------------------
	#  FUNCTION: UPDATE RECORDS
		
	public function updateDB()
	{ 
		#  Create and open database connection
		$db = new DB();
		if (!$db->Open()) { return FALSE; }
	
		
		#  Get info needed to update database
		
		$customer_id = $db->makeSafe($this->getCustomerID());
		$first_name = $db->makeSafe($this->getFirstName());
		$last_name = $db->makeSafe($this->getLastName());
		
		if ($customer_id == "" || $customer_id == -1) 
		{  
			echo "error: could not update customer DB because customer ID is not set<br>";
			return FALSE;
		}
		
		#  Update database
		
		$query = "UPDATE customers
							SET first_name = $first_name, last_name = $last_name
							WHERE customer_id = $customer_id";
							
		#  Execute the query and return the result
		$result = $db->updateRecord($query);
	
		if ($result) { return TRUE; }
		else { return FALSE; }
		
	} #  End of updateDB()


	#  ---------------------------
	#    FUNCTION: INSERT NEW RECORD
	
	public function insertNewRecord()
	{
		#  Create and open database connection
		$db = new DB();
		if (!$db->Open()) { return FALSE; }
	
		
		#  Get info needed to update database
		
		$first_name = $db->makeSafe($this->getFirstName());
		$last_name = $db->makeSafe($this->getLastName());
		$active = 1;
		
		#  Insert into database
		
		$query = "INSERT INTO customers (customer_id, first_name, last_name, active) VALUES (NULL, $first_name, $last_name, $active)";
										
		$result = $db->insertRecord($query);
		
		if(is_numeric($result)) {
			$this->customer_id = $result;
			return TRUE; 
		}
		else { return FALSE; }
	
	} #  End of insertNewRecord()
	
	
	#  ---------------------------
	#    FUNCTION: DELETE CUSTOMER
	
	public function deleteCustomer()
	{
		$db_stu = new DB();
		if (!$db_stu->Open()) { return FALSE; }

		#  Get info to make changes
		$customer_id = $db_stu->makeSafe($this->getCustomerID());
		$today = $db_stu->makeSafe(date("Y-m-d"));

		if ($customer_id == "" || $customer_id == -1) {  return FALSE; }
			
		#  now deactivate
			$deactivate_query = "UPDATE customers SET active = 0 WHERE customer_id = $customer_id"; 
			$test_deactivate = $db_stu->updateRecord($deactivate_query);
			if (!$test_deactivate) {return FALSE;}
			else { return TRUE; }

	} #  End of deleteCustomer()
	
	
} #  END OF CUSTOMER CLASS
?>