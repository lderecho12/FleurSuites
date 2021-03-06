<?php include "../../models/DBConnection.php"; ?>


<?php
	class Users extends DBConnection{
		
		function insert_user($registeremail, $registerpass, $registertitle, $registerfirst, 
                $registerlast, $registergender, $birthdate, $registerline1, $registercity, $registercountry, 
				$registerline2, $registerpostalcode, $registercountrycode, $registerphonenum){
			$query = "INSERT INTO user (useremail, userpassword, usertitle, userfirstname, 
                userlastname, usergender, userbirthdate, useraddressline1, usercity, usercountry, 
				useraddressline2, userpostalcode, usercountrycode, userphonenumber)
				VALUES (\"".$registeremail."\", \"".$registerpass."\", \"".$registertitle."\", 
					\"".$registerfirst."\", \"".$registerlast."\", \"".$registergender."\", \"".$birthdate."\", 
					\"".$registerline1."\", \"".$registercity."\", \"".$registercountry."\", \"".$registerline2."\", 
					\"".$registerpostalcode."\", \"".$registercountrycode."\", \"".$registerphonenum."\")";

			$result = mysqli_query($this->conn, $query);

			return (($result)? TRUE:FALSE);

			exit;
		}

		function update_user($firstname, $lastname, $email, $gender, $birthdate, $addressline, 
                        $city, $country, $countrycode, $phonenumber, $curid) {
			   	$query = "UPDATE user SET userfirstname =\"".$firstname."\",
						userlastname =\"".$lastname."\", useremail =\"".$email."\", 
						usergender =\"".$gender."\", userbirthdate =\"".$birthdate."\", 
						useraddressline1 =\"".$addressline."\", usercity =\"".$city."\", 
						usercountry =\"".$country."\", usercountrycode =\"".$countrycode."\", 
						userphonenumber =\"".$phonenumber."\"
						WHERE userid = \"".$curid."\" ";

			  	$result = mysqli_query($this->conn,$query);
		 		return(($result)?TRUE:FALSE);

			   if(!$result)
			   {
			       echo 'Data Not Updated';
			   }
		}

		function select_all_user(){
			$query = "SELECT * FROM user";
			$result = mysqli_query($this->conn, $query);			
			
			$res = array();
			while($rows = mysqli_fetch_array($result)){
				
				array_push($res, $rows);
			}
			return($result->num_rows>0)? $res: FALSE;
		}

		function select_all_admin(){
			$query = "SELECT * FROM admin";
			$result = mysqli_query($this->conn, $query);			
			
			$res = array();
			while($rows = mysqli_fetch_array($result)){
				
				array_push($res, $rows);
			}
			return($result->num_rows>0)? $res: FALSE;
		}

		function update_admin($Member_num,$Tin,$FirstName,$LastName,$Email,$Username,$MobileNum,$Password) {
			   	$query = "UPDATE admin SET 
			   			Tin =\"".$Tin."\",
						FirstName =\"".$FirstName."\",
						LastName =\"".$LastName."\",
						Email =\"".$Email."\",
						Username =\"".$Username."\",
						MobileNum =\"".$MobileNum."\",
						Password =\"".$Password."\"
						WHERE Member_num = \"".$Member_num."\" ";

			  	$result = mysqli_query($this->conn,$query);
		 		return(($result)?TRUE:FALSE);

			   if(!$result)
			   {
			       echo 'Data Not Updated';
			   }
		}

		function delete_admin($Member_num){
			$query = "DELETE FROM admin WHERE Member_num=$Member_num";
			$result = mysqli_query($this->conn, $query);
			return(($result)?TRUE:FALSE);

			exit;
			
		}	

		function insert_product($ProductName, $Price) {
			$query = "INSERT INTO products(ProductName, Price) VALUES(\"".$ProductName."\",\"".$Price."\")";

			$result = mysqli_query($this->conn, $query);

			return (($result)? TRUE:FALSE);

			exit;
		}

		function select_all_products(){
			$query = "SELECT * FROM products";
			$result = mysqli_query($this->conn, $query);			
			
			$res = array();
			while($rows = mysqli_fetch_array($result)){
				
				array_push($res, $rows);
			}		

			return($result->num_rows>0)? $res: FALSE;
			// if($result['num_rows'] > 0 ){
				// return $result->fetch_object();
			// }
			// else{
				// return FALSE;
			// }

		}

		function update_products($ProductNum, $ProductName, $Price) {
			   	$query = "UPDATE products SET ProductName =\"".$ProductName."\",
						Price =\"".$Price."\"WHERE ProductNum = \"".$ProductNum."\" ";

			  	$result = mysqli_query($this->conn,$query);
		 		return(($result)?TRUE:FALSE);

			   if(!$result)
			   {
			       echo 'Data Not Updated';
			   }
		}
		function delete_product($ProductNum){
			$query = "DELETE FROM products WHERE ProductNum=$ProductNum";
			$result = mysqli_query($this->conn, $query);
			return(($result)?TRUE:FALSE);

			exit;
			
		}


		function select_all_purchases(){
			$query = "SELECT * FROM purchase";
			$result = mysqli_query($this->conn, $query);			
			
			$res = array();
			while($rows = mysqli_fetch_array($result)){
				
				array_push($res, $rows);
			}		

			return($result->num_rows>0)? $res: FALSE;
			// if($result['num_rows'] > 0 ){
				// return $result->fetch_object();
			// }
			// else{
				// return FALSE;
			// }

		}
		function insert_toPurchase($ProductNum, $ProductName, $Quantity, $Price, $Total) {
			$Quantity = 1;
			$Total = $Price;
			$query = "INSERT INTO purchase (ProductNum, ProductName, Quantity, Price, Total) VALUES(\"".$ProductNum."\",\"".$ProductName."\",\"".$Quantity."\",\"".$Price."\",\"".$Total."\")";
			$result = mysqli_query($this->conn, $query);
			
			return (($result)? TRUE:FALSE);

			exit;
		}

		function update_purchase($ProductNum, $Quantity, $Price ,$Total) {

		   	$query = "UPDATE purchase SET Quantity =\"".$Quantity."\", Price = \"".$Price."\", Total = \"".$Total."\"
		   	WHERE ProductNum = \"".$ProductNum."\" ";

		  	$result = mysqli_query($this->conn,$query);
	 		return(($result)?TRUE:FALSE);

		   if(!$result)
		   {
		       echo 'Data Not Updated';
		   }
		}

		function delete_purchase($ProductNum){
			$query = "DELETE FROM purchase WHERE ProductNum=$ProductNum";
			$result = mysqli_query($this->conn, $query);
			return(($result)?TRUE:FALSE);

			exit;
			
		}


		function insert_toTransaction($SubTotal, $Cash, $Total, $CashChange) {
			$query = "INSERT INTO transaction (SubTotal, Cash, Total, CashChange) VALUES(\"".$SubTotal."\",\"".$Cash."\",\"".$Total."\",\"".$CashChange."\")";
			$result = mysqli_query($this->conn, $query);
			
			return (($result)? TRUE:FALSE);

			exit;

		}

		function select_Transaction() {
			$query = "SELECT * FROM transaction";
			$result = mysqli_query($this->conn, $query);			
			
			$res = array();
			while($rows = mysqli_fetch_array($result)){
				
				array_push($res, $rows);
			}		

			return($result->num_rows>0)? $res: FALSE;

			exit;

		}

		function void_purchase(){
			$query = "TRUNCATE TABLE purchase";
			$result = mysqli_query($this->conn, $query);
			return(($result)?TRUE:FALSE);

			exit;
			
		}



	}

?>