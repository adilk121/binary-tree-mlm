<?php require_once("database.php"); ?>
<?php require_once("user.php"); ?>
<?php require_once("validate.php"); ?>
<?php 
class admin extends database 
{
	//allClasses
	private $database_obj,$validate_obj;
	function __construct()
	{	
		$validate_obj = new validate;
		$database_obj = new database;
		$this->database_obj= $database_obj;
		$this->validate_obj= $validate_obj;
	}
	private $name_araays = array();
	private $username_araays = array();
	private $did_araays = array();
	private $tag_araays = array();
	private $created_date_araays = array();
	private $status_araays = array();
	function generateRandomStringEpins($length = 16)
	{
		$characters = EPIN_NO;
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++)
		{
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
	
	function get_table_id_username($uname)
	{
  		 $fields="*";	
		 $table_name = "login";
		 $condition = " WHERE username='$uname' ";
		 $res=$this->select_simple($fields,$table_name,$condition);
		 return $res;

	}
		function oraganisation_chart($UID)
	{
		try
		{

			
			$name_araays = array("","","","","","","","","","","","","","","");
			$username_araays = array("","","","","","","","","","","","","","","");
			$did_araays = array("","","","","","","","","","","","","","","");
			$tag_araays = array("","","","","","","","","","","","","","","");
			$created_date_araays = array("","","","","","","","","","","","","","","");
			$status_araays = array("","","","","","","","","","","","","","","");
			$fields="*";
			$table_name = "login";
			$condition = " WHERE table_id='$UID' ";
			$res=$this->select_simple($fields,$table_name,$condition);
			if($res->num_rows==1)
			{
				$detail = $res->fetch_assoc();
				$name_araays[0] = $detail['name'];
				$username_araays[0] = $detail['username'];
				$did_araays[0] = $detail['did'];
				$status_araays[0] = $detail['status'];
				$tag_araays[0] = $detail['tag'];
				$created_date_araays[0] = $detail['created_date'];
				
				if($detail['fso']!='')
				{
					$fields="*";
					$table_name = "login";
					$condition = " WHERE table_id='{$detail['fso']}' ";
					$res=$this->select_simple($fields,$table_name,$condition);
					if($res->num_rows==1)
					{
						$detail1 = $res->fetch_assoc();
						$name_araays[1] = $detail1['name'];
						$username_araays[1] = $detail1['username'];
						$did_araays[1] = $detail1['did'];
						$status_araays[1] = $detail1['status'];
						$tag_araays[1] = $detail1['tag'];
						$created_date_araays[1] = $detail1['created_date'];
					  	if($detail1['fso']!='')
					  	{
							$fields="*";
						  	$table_name = "login";
						  	$condition = " WHERE table_id='{$detail1['fso']}' ";
						  	$res=$this->select_simple($fields,$table_name,$condition);
						  	if($res->num_rows==1)
						  	{
								$detail2 = $res->fetch_assoc();
							  	$name_araays[3] = $detail2['name'];
							  	$username_araays[3] = $detail2['username'];
							  	$did_araays[3] = $detail2['did'];
							  	$status_araays[3] = $detail2['status'];
							  	$tag_araays[3] = $detail2['tag'];
								$created_date_araays[3] = $detail2['created_date'];
							    if($detail2['fso']!='')
							    {
								   $fields="*";
								   $table_name = "login";
								   $condition = " WHERE table_id='{$detail2['fso']}' ";
								   $res=$this->select_simple($fields,$table_name,$condition);
								   if($res->num_rows==1)
								   {
								 	   $detail3 = $res->fetch_assoc();
								  	   $name_araays[7] = $detail3['name'];
									   $username_araays[7] = $detail3['username'];
									   $did_araays[7] = $detail3['did'];
									   $status_araays[7] = $detail3['status'];
									   $tag_araays[7] = $detail3['tag'];
									   $created_date_araays[7] = $detail3['created_date'];
								   }
								   else
								   {
									   throw new Exception('Error : Invalid Request...Please contact your administrator...!!!');	
			  
								   }
								   
							   	 }
							   	 if($detail2['sso']!='')
							     {
								  	$fields="*";
								  	$table_name = "login";
								   	$condition = " WHERE table_id='{$detail2['sso']}' ";
								   	$res=$this->select_simple($fields,$table_name,$condition);
								   	if($res->num_rows==1)
								   	{
								    	$detail3 = $res->fetch_assoc();
								  	   	$name_araays[8] = $detail3['name'];
									   	$username_araays[8] = $detail3['username'];
									   	$did_araays[8] = $detail3['did'];
									   	$status_araays[8] = $detail3['status'];
									   	$tag_araays[8] = $detail3['tag'];
									   	$created_date_araays[8] = $detail3['created_date'];
									  
								   	}
								   	else
								   	{
									   throw new Exception('Error : Invalid Request...Please contact your administrator...!!!');	
			  
				               	    }
			  
							   }
													  
						   }
						   else
						   {	
						    	throw new Exception('Error : Invalid Request...Please contact your administrator...!!!');	
	  
	                       }
	  
					   }
					   if($detail1['sso']!='')
					   {
					   		$fields="*";
						  	$table_name = "login";
						  	$condition = " WHERE table_id='{$detail1['sso']}' ";
						  	$res=$this->select_simple($fields,$table_name,$condition);
						  	if($res->num_rows==1)
						  	{
								$detail2 = $res->fetch_assoc();
							  	$name_araays[4] = $detail2['name'];
							  	$username_araays[4] = $detail2['username'];
							  	$did_araays[4] = $detail2['did'];
							  	$status_araays[4] = $detail2['status'];
							  	$tag_araays[4] = $detail2['tag'];
								$created_date_araays[4] = $detail2['created_date'];
							    if($detail2['fso']!='')
							    {
								   $fields="*";
								   $table_name = "login";
								   $condition = " WHERE table_id='{$detail2['fso']}' ";
								   $res=$this->select_simple($fields,$table_name,$condition);
								   if($res->num_rows==1)
								   {
								 	   $detail3 = $res->fetch_assoc();
								  	   $name_araays[9] = $detail3['name'];
									   $username_araays[9] = $detail3['username'];
									   $did_araays[9] = $detail3['did'];
									   $status_araays[9] = $detail3['status'];
									   $tag_araays[9] = $detail3['tag'];
									   $created_date_araays[9] = $detail3['created_date'];
									  
								   }
								   else
								   {
									   throw new Exception('Error : Invalid Request...Please contact your administrator...!!!');	
			  
								   }
			  
							   }
							   if($detail2['sso']!='')
							    {
								   $fields="*";
								   $table_name = "login";
								   $condition = " WHERE table_id='{$detail2['sso']}' ";
								   $res=$this->select_simple($fields,$table_name,$condition);
								   if($res->num_rows==1)
								   {
								 	   $detail3 = $res->fetch_assoc();
								  	   $name_araays[10] = $detail3['name'];
									   $username_araays[10] = $detail3['username'];
									   $did_araays[10] = $detail3['did'];
									   $status_araays[10] = $detail3['status'];
									   $tag_araays[10] = $detail3['tag'];
									   $created_date_araays[10] = $detail3['created_date'];
									  
								   }
								   else
								   {
									   throw new Exception('Error : Invalid Request...Please contact your administrator...!!!');	
			  
								   }
			  
							   }
													  
						   }
						   else
						   {	
						    	throw new Exception('Error : Invalid Request...Please contact your administrator...!!!');	
	  
	                       }
	  
					   }

					}
					else
					{
					  	throw new Exception('Error : Invalid Request...Please contact your administrator...!!!');	

					}

				}

				if($detail['sso']!='')
				{
					$fields="*";
					$table_name = "login";
					$condition = " WHERE table_id='{$detail['sso']}' ";
					$res=$this->select_simple($fields,$table_name,$condition);
					if($res->num_rows==1)
					{
						$detail1 = $res->fetch_assoc();
						$name_araays[2] = $detail1['name'];
						$username_araays[2] = $detail1['username'];
						$did_araays[2] = $detail1['did'];
						$status_araays[2] = $detail1['status'];
						$tag_araays[2] = $detail1['tag'];
						$created_date_araays[2] = $detail1['created_date'];
					  	if($detail1['sso']!='')
					  	{
							$fields="*";
						  	$table_name = "login";
						  	$condition = " WHERE table_id='{$detail1['sso']}' ";
						  	$res=$this->select_simple($fields,$table_name,$condition);
						  	if($res->num_rows==1)
						  	{
								$detail2 = $res->fetch_assoc();
							  	$name_araays[6] = $detail2['name'];
							  	$username_araays[6] = $detail2['username'];
							  	$did_araays[6] = $detail2['did'];
							  	$status_araays[6] = $detail2['status'];
							  	$tag_araays[6] = $detail2['tag'];
								$created_date_araays[6] = $detail2['created_date'];
							    if($detail2['sso']!='')
							    {
								   $fields="*";
								   $table_name = "login";
								   $condition = " WHERE table_id='{$detail2['sso']}' ";
								   $res=$this->select_simple($fields,$table_name,$condition);
								   if($res->num_rows==1)
								   {
								 	   $detail3 = $res->fetch_assoc();
								  	   $name_araays[14] = $detail3['name'];
									   $username_araays[14] = $detail3['username'];
									   $did_araays[14] = $detail3['did'];
									   $status_araays[14] = $detail3['status'];
									   $tag_araays[14] = $detail3['tag'];
									   $created_date_araays[14] = $detail3['created_date'];

								   }
								   else
								   {
									   throw new Exception('Error : Invalid Request...Please contact your administrator...!!!');	
			  
								   }
			  
							   }
							   if($detail2['fso']!='')
							   {
								   $fields="*";
								   $table_name = "login";
								   $condition = " WHERE table_id='{$detail2['fso']}' ";
								   $res=$this->select_simple($fields,$table_name,$condition);
								   if($res->num_rows==1)
								   {
								 	   $detail3 = $res->fetch_assoc();
								  	   $name_araays[13] = $detail3['name'];
									   $username_araays[13] = $detail3['username'];
									   $did_araays[13] = $detail3['did'];
									   $status_araays[13] = $detail3['status'];
									   $tag_araays[13] = $detail3['tag'];
									   $created_date_araays[13] = $detail3['created_date'];
									  
								   }
								   else
								   {
									   throw new Exception('Error : Invalid Request...Please contact your administrator...!!!');	
			  
								   }
			  
							   }
													  
						   }
						   else
						   {	
						    	throw new Exception('Error : Invalid Request...Please contact your administrator...!!!');	
	  
	                       }
	  
					   }
					   if($detail1['fso']!='')
					   {
					   		$fields="*";
						  	$table_name = "login";
						  	$condition = " WHERE table_id='{$detail1['fso']}' ";
						  	$res=$this->select_simple($fields,$table_name,$condition);
						  	if($res->num_rows==1)
						  	{
								$detail2 = $res->fetch_assoc();
							  	$name_araays[5] = $detail2['name'];
							  	$username_araays[5] = $detail2['username'];
							  	$did_araays[5] = $detail2['did'];
							  	$status_araays[5] = $detail2['status'];
							  	$tag_araays[5] = $detail2['tag'];
								$created_date_araays[5] = $detail2['created_date'];
							    if($detail2['sso']!='')
							    {
								   $fields="*";
								   $table_name = "login";
								   $condition = " WHERE table_id='{$detail2['sso']}' ";
								   $res=$this->select_simple($fields,$table_name,$condition);
								   if($res->num_rows==1)
								   {
								 	   $detail3 = $res->fetch_assoc();
								  	   $name_araays[12] = $detail3['name'];
									   $username_araays[12] = $detail3['username'];
									   $did_araays[12] = $detail3['did'];
									   $status_araays[12] = $detail3['status'];
									   $tag_araays[12] = $detail3['tag'];
									   $created_date_araays[12] = $detail3['created_date'];
									  
									  
								   }
								   else
								   {
									   throw new Exception('Error : Invalid Request...Please contact your administrator...!!!');	
			  
								   }
			  
							   }
							   if($detail2['fso']!='')
							    {
								   $fields="*";
								   $table_name = "login";
								   $condition = " WHERE table_id='{$detail2['fso']}' ";
								   $res=$this->select_simple($fields,$table_name,$condition);
								   if($res->num_rows==1)
								   {
								 	   $detail3 = $res->fetch_assoc();
								  	   $name_araays[11] = $detail3['name'];
									   $username_araays[11] = $detail3['username'];
									   $did_araays[11] = $detail3['did'];
									   $status_araays[11] = $detail3['status'];
									   $tag_araays[11] = $detail3['tag'];
									   $created_date_araays[11] = $detail3['created_date'];

								   }
								   else
								   {
									   throw new Exception('Error : Invalid Request...Please contact your administrator...!!!');	
			  
								   }
			  
							   }
													  
						   }
						   else
						   {	
						    	throw new Exception('Error : Invalid Request...Please contact your administrator...!!!');	
	  
	                       }
	  
					   }

					}
					else
					{
					  	throw new Exception('Error : Invalid Request...Please contact your administrator...!!!');	

					}

				}
				
			}
			else
			{
			  	throw new Exception('Error : Invalid Request...Please contact your administrator...!!!');	

			}
			
			$this->name_araays=$name_araays;
			$this->username_araays=$username_araays;
			$this->did_araays=$did_araays;
			$this->tag_araays=$tag_araays;
			$this->created_date_araays=$created_date_araays;
			$this->status_araays=$status_araays;
		}
		catch(Exception $e) 
		{
			echo $e->getMessage();
		}
			
	}
	function get_chart_data($all_data)
	{
		$to_return = "not return";
		switch($all_data) 
		{
			case "name_array":$to_return=$this->name_araays;break;
			case "username_array":$to_return=$this->username_araays;break;
			case "did_array":$to_return=$this->did_araays;break;
			case "tag_araay":$to_return=$this->tag_araays;break;
			case "created_date_araay":$to_return=$this->created_date_araays;break;
			case "status_araay":$to_return=$this->status_araays;break;
		}
		return $to_return;
	}
	function recieved_epins()
	{	
		  $fields="*,COUNT(*) as total_epins ,ps.name as prd_name,epins.table_id as epin_table_id,epins.created_date as epin_add_date";
		  $table_name="epins INNER JOIN ps ON epins.epin_product_code=ps.product_id INNER JOIN login ON epins.created_by=login.table_id";
		  $condition="  WHERE epins.status='Pending' group by req_no ";
		  $sql=$this->database_obj->select_simple($fields,$table_name,$condition);
		  return $sql;
	}
		function parse_in_downline($proceed_id,&$downline_array)
	{
		 $fields="*";	
		 $table_name = "login";
		 $condition = " WHERE table_id='$proceed_id' ";
		 $res=$this->select_simple($fields,$table_name,$condition);
		 if($res->num_rows==1)
		 {
			 $detail = $res->fetch_assoc();
			 $fso = $detail['fso'];
			 $sso = $detail['sso'];
			
			 if(($fso=="")&&($sso==""))
			 {
			 return false;
			 }
			 if($fso!="")
			 {
				 $downline_array[] = $fso; 
				 $this->parse_in_downline($fso,$downline_array);
			 }		
			 if($sso!="")
			 {
				 $downline_array[] = $sso; 
				 $this->parse_in_downline($sso,$downline_array);
			 }
		 }
		 else
		 {
			 return false;
		 }
	}
	function downline_list($fso_downline_array,$sso_downline_array,$sort_by,$order_by)
	{
		$statement = "SELECT *,'".LEFT_SIDE."' as org FROM login WHERE table_id IN ('0'";
		for($i=0;$i<count($fso_downline_array);$i++)
		{
			 $statement.=",'".$fso_downline_array[$i]."'";
		}
		$statement.=") UNION ALL  SELECT *,'".RIGHT_SIDE."' as org FROM login WHERE table_id IN('0'";
		for($i=0;$i<count($sso_downline_array);$i++)
		{
			 $statement.=",'".$sso_downline_array[$i]."'";
		}
	 	$statement.=")order by $sort_by $order_by ";
		$sql = $this->simply_run_statement_passed($statement);
		
		return $sql;

	}

	function delete_epins($Del_ID)
	{
		try
		{
			$validate_obj=new validate;
			if($this->validate_obj->is_set($Del_ID)){throw new Exception("Invalid Request.. !");}
			if($this->validate_obj->is_empty($Del_ID)){throw new Exception("Please Contact Your Administrator... !");}
			//if($this->validate_obj->is_num($Del_ID)){throw new Exception("Only Numbers Can be entered..!");}
			$table_name="epins";
			$condition=" WHERE req_no='$Del_ID' AND status='Pending' ";
			$sql=$this->database_obj->delete_simple($table_name,$condition);
			return $sql;
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
	function issue_epins($Issue_ID)
	{
		try
		{
			$validate_obj=new validate;
			if($this->validate_obj->is_set($Issue_ID)){throw new Exception("Invalid Request.. !");}
			if($this->validate_obj->is_empty($Issue_ID)){throw new Exception("Please Contact Your Administrator... !");}
			if($this->validate_obj->is_num($Issue_ID)){throw new Exception("Only Numbers avalaible..!");}
			if($this->validate_obj->is_exceeding_limit($Issue_ID,16)){throw new Exception("Please Enter less than 16 digit..!");}
			$fields = "table_id";		
			$table_name="epins";
			$condition=" WHERE req_no='$Issue_ID' AND status='Pending' ";
			$sql=$this->database_obj->select_simple($fields,$table_name,$condition);
			while($detail = $sql->fetch_assoc())
			{
				$passed="No";
				while($passed=="No")
				{
					$epin_generate=$this->generateRandomStringEpins(16); 
					$fields = "epin";		
					$table_name="epins";
					$condition=" WHERE epin='$epin_generate' ";
					$sql1=$this->database_obj->select_simple($fields,$table_name,$condition);
					if($sql1->num_rows<1)
					{
						$passed="Yes";			  
					}
				}
					$fields = array("epin","status","updated_date","updated_ip","updated_browser","updated_by");
					$value = array($epin_generate,"Issued",date("Y-m-d H:i:s"),$_SERVER['REMOTE_ADDR'],$_SERVER['HTTP_USER_AGENT'],$_SESSION['log_id']);		
					$table_name="epins";
					$condtion=" WHERE table_id='{$detail['table_id']}' AND status='Pending' ";
				for($i=0;$i<count($value);$i++)
				{
					$value[$i]=$this->database_obj->real_escape($value[$i]);
				
				}

					$sql2=$this->database_obj->update_simple($table_name,$fields,$value,$condtion);
			}
		}
		catch (Exception $e)
		{
			echo $e->getMessage();
		}
		  
	 }
	function unused_epins()
	{	
		  $fields="*,ps.name as prd_name,epins.table_id as epin_table_id,epins.created_date as epin_add_date,epins.status as epin_status";
		  $table_name="epins INNER JOIN ps ON epins.epin_product_code=ps.product_id INNER JOIN login ON epins.created_by=login.table_id";
		  $condition="  WHERE epins.status='Issued' ";
		  $sql=$this->database_obj->select_simple($fields,$table_name,$condition);
		  return $sql;
	}
	function delete_unused_epins($Del_ID)
	{
		try
		{
			$validate_obj=new validate;
			if($this->validate_obj->is_set($Del_ID)){throw new Exception("Invalid Request.. !");}
			if($this->validate_obj->is_empty($Del_ID)){throw new Exception("Please Contact Your Administrator... !");}
			//if($this->validate_obj->is_num($Del_ID)){throw new Exception("Only Numbers Can be entered..!");}
			$table_name="epins";
			$condition=" WHERE table_id='$Del_ID' AND status='Issued' ";
			$sql=$this->database_obj->delete_simple($table_name,$condition);
			return $sql;
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
	
	function used_epins_admin()
	{	
		  $fields="*,b.name as prd_name,a.table_id as epin_table_id,a.created_date as epin_add_date,a.status as epin_status,c.username as issued_to_username,c.did as isseud_to_did,d.username as used_by_username,d.did as used_by_did";
		  $table_name="epins a INNER JOIN ps b ON a.epin_product_code=b.product_id INNER JOIN login c ON a.created_by=c.table_id INNER JOIN login d ON a.used_by=d.table_id";
		  $condition="  WHERE a.status='Used' ";
		  $sql=$this->database_obj->select_simple($fields,$table_name,$condition);
		  return $sql;
	}
	function fetch_password($username)
	{	
		  $fields="password";
		  $table_name="login";
		  $condition="  WHERE username='$username' ";
		  $sql=$this->database_obj->select_simple($fields,$table_name,$condition);
		  return $sql;
	}
	function change_paasword($username,$password)
	{
		try
		{
			$validate_obj=new validate;
			if($this->validate_obj->is_set($password)){throw new Exception("Invalid Request.. !");}
			if($this->validate_obj->is_empty($password)){throw new Exception("Please Enter Passoword... !");}
			
			$fields = array("password");
			$value = array($password);		
			$table_name="login";
			$condtion=" WHERE username='$username'";
			$this->database_obj->open_connection();
			for($i=0;$i<count($value);$i++)
			{
				$value[$i]=$this->database_obj->real_escape($value[$i]);
			
			}
				$sql2=$this->database_obj->update_simple($table_name,$fields,$value,$condtion);
			$this->database_obj->close_connection();
		}
		catch (Exception $e)
		{
			echo $e->getMessage();
		}
	  
   }

	function edit_profile_admin($UID)
   {		
		  $fields="*";
		  $table_name="login";
		  $condition="WHERE table_id='$UID'";
		  $sql=$this->database_obj->select_simple($fields,$table_name,$condition);
		  return $sql;
			
	}
	function update_all_profile_admin($UID)
	{
		global $_POST;
		extract($_POST);
		try
		{
			$validate_obj=new validate;
			if($this->validate_obj->is_empty($username)){throw new Exception("Please enter username..!");}
			if($this->validate_obj->is_set($username)){throw new Exception("Invalid username..!");}
			if($this->validate_obj->is_exceeding_limit($username,50)){throw new Exception("Please enter below 50 character in  username..!");}
			if(filter_var($username,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>USERNAME_VALIDATE)))){throw new Exception("Invalid username only numbers and alphabets or '.' '_' are allowed!");}

   			if($this->validate_obj->is_empty($name)){throw new Exception("Please enter name...!");}
			if($this->validate_obj->is_set($name)){throw new Exception("Invalid Cheque No. !");}
			if($this->validate_obj->is_exceeding_limit($username,100)){throw new Exception("Please enter below 100 character in  cheque no..!");}


			if($this->validate_obj->is_empty($dob)){throw new Exception("Please enter dob..!");}
			if($this->validate_obj->is_set($dob)){throw new Exception("Invalid dob.. !");}
			if($this->validate_obj->is_exceeding_limit($dob,50)){throw new Exception("Please enter below 50 character in  dob..!");}


			if($this->validate_obj->is_empty($gender)){throw new Exception("Please choose gender..!");}
			if($this->validate_obj->is_set($gender)){throw new Exception("Invalid gender !");}
			if(($gender!='Male')&&($gender!='Female')){throw new Exception("Gender Must be selected..!");}
			
			if($this->validate_obj->is_empty($father_name)){throw new Exception("Please enter father name..!");}
			if($this->validate_obj->is_set($father_name)){throw new Exception("Invalid father name..!");}
			if($this->validate_obj->is_exceeding_limit($father_name,150)){throw new Exception("Please enter below 150 character in  father name..!");}

			if($this->validate_obj->is_empty($nationality)){throw new Exception("Please enter nationality..!");}
			if($this->validate_obj->is_set($nationality)){throw new Exception("Invalid nationality..!");}
			if($this->validate_obj->is_exceeding_limit($nationality,150)){throw new Exception("Please enter below 150 character in  nationality..!");}

			if($this->validate_obj->is_empty($educational_qualification)){throw new Exception("Please enter educational qualification..!");}
			if($this->validate_obj->is_set($educational_qualification)){throw new Exception("Invalid educational qualification..!");}
			if($this->validate_obj->is_exceeding_limit($educational_qualification,150)){throw new Exception("Please enter below 150 character in  educational_qualification..!");}

			if($this->validate_obj->is_empty($proffession)){throw new Exception("Please enter proffession..!");}
			if($this->validate_obj->is_set($proffession)){throw new Exception("Invalid profession!");}
			if($this->validate_obj->is_exceeding_limit($proffession,150)){throw new Exception("Please enter below 150 character in  proffession..!");}


//			if($this->validate_obj->is_empty($organization)){throw new Exception("Please choose organization..!");}
//			if($this->validate_obj->is_set($organization)){throw new Exception("Invalid organization!");}
//			if(($organization!=LEFT_SIDE)&&($organization!=RIGHT_SIDE)){throw new Exception("organization must be selected!");}
			
			if($this->validate_obj->is_empty($contact_no)){throw new Exception("Please enter contact no..!");}
			if($this->validate_obj->is_num($contact_no)){throw new Exception("Please enter only numbers in contact no..!");}
			if($this->validate_obj->is_exceeding_limit($contact_no,15)){throw new Exception("Please enter only 15 digit in  contact no..!");}
			if($this->validate_obj->is_set($contact_no)){throw new Exception("Invalid contact no..!");}

			if($this->validate_obj->is_empty($alternate_contact_no)){throw new Exception("Please alternate no..!");}
			if($this->validate_obj->is_num($alternate_contact_no)){throw new Exception("Please enter only numbers in alternate contact no..!");}
			if($this->validate_obj->is_exceeding_limit($alternate_contact_no,15)){throw new Exception("Please enter only 15 digit in alternate contact no..!");}
			if($this->validate_obj->is_set($alternate_contact_no)){throw new Exception("Invalid alternate no..!");}

				
			if($this->validate_obj->is_empty($email_id)){throw new Exception("Please enter email id..!");}
			if($this->validate_obj->is_email($email_id)){throw new Exception("Invalid email id..!");}
			if($this->validate_obj->is_set($email_id)){throw new Exception("Invalid email id..!");}
			if($this->validate_obj->is_exceeding_limit($email_id,200)){throw new Exception("Please enter below 200 character in  email_id..!");}
				
			if($this->validate_obj->is_empty($c_address)){throw new Exception("Please enter correspondence address..!");}
			if($this->validate_obj->is_set($c_address)){throw new Exception("Invalid correspondence address..!");}
			if($this->validate_obj->is_exceeding_limit($c_address,500)){throw new Exception("Please enter below 500 character in  corresponding address..!");}


			if($this->validate_obj->is_empty($p_address)){throw new Exception("Please enter permanent address..!");}
			if($this->validate_obj->is_set($p_address)){throw new Exception("Invalid permanent address..!");}				
			if($this->validate_obj->is_exceeding_limit($p_address,500)){throw new Exception("Please enter below 500 character in  permanent address..!");}

			$this->database_obj->open_connection();
    		$file_name = $_FILES['profile_pic']['name'];
			if($file_name!='')
			{
				$fields="*";
				$table_name="login";
				$condition="WHERE table_id='$UID'";
				$sql=$this->select_simple($fields,$table_name,$condition);
				$DATA=$sql->fetch_assoc();
				$DelImage = $DATA['profile_pic'];
	    		@unlink("../uploads/$DelImage");
				 $counter_name="../uploads/counter.txt";
				// Check if a text file exists. If not create one AND initialize it to zero.
				if (!file_exists($counter_name))
				{
					throw new Exception('Error : Some files missing...Please contact customer care...2');
				}
				// Read the current value of our counter file
				$f = fopen($counter_name,"r");
				$counterVal = fread($f, filesize($counter_name));
				$counterVal++;
				fclose($f);
				$f = fopen($counter_name, "w");
				if(!fwrite($f, $counterVal))
				{
					throw new Exception('Error : Unable to upload...');
				}
				fclose($f);
			 	$type=array("png","gif","jpg");
				$str_shuffle =str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789');
       		$file_name =$counterVal ."-".$str_shuffle ."-" . basename($_FILES['profile_pic']['name']);
			 	$target_dir = "../uploads/";
			 	$target_file=$target_dir . $file_name;
	     	 	$file_size =$_FILES['profile_pic']['size'];
		  	 	$file_tmp =$_FILES['profile_pic']['tmp_name'];
			 
				if($file_size > 1000000)
				{
					$errors='File size must be less than 2 MB';
       			}		
		   	 	elseif (file_exists($target_file))
				{
       			 $errors='Sorry, file already exists.';
        		}
				elseif(!in_array(pathinfo($target_file,PATHINFO_EXTENSION),$type))
				{
    				 $errors= "Sorry, only jpg PNG & GIF files are allowed.";
				}
				if(empty($errors)==true)
				{
          			move_uploaded_file($file_tmp,$target_file);
		  		   	
	 			}
				if(!empty($errors))
				{
					echo $errors;
				}
				else
				{
					echo "Succsees";
				}
			}
				foreach($_POST as $item)
				{
					$item = $this->database_obj->real_escape($item);
				}

				$condtion="WHERE table_id='$UID'";
				$table_name="login";
				$fields_array=array("username","did","name","dob","gender","father_name","nationality","educational_qualification","proffession","contact_no","alternate_contact_no","email_id","c_address","p_address");
				if($file_name!='')
				{
					$fields_array[]="profile_pic";
				}
				$values_array=array($username,$did,$name,$dob,$gender,$father_name,$nationality,$educational_qualification,$proffession,$contact_no,$alternate_contact_no,$email_id,$c_address,$p_address);
				if($file_name!='')
				{
					$values_array[]="$file_name";
				}
				for($i=0;$i<count($values_array);$i++)
				{
					$values_array[$i]=$this->database_obj->real_escape($values_array[$i]);
				
				}
				$result=$this->database_obj->update_simple($table_name,$fields_array,$values_array,$condtion);
				header("location:select_user_detail.php?action=edit_profile");
				exit(EXIT_ERROR);		
			 			
		}
		catch(Exception $e) 
		{
			return $e->getMessage();
		}
	}
	function check_in_downline($to_check)
	{
		 $fields="*";	
		 $table_name = "login";
		 $condition = " WHERE table_id='$to_check' ";
		 $res=$this->select_simple($fields,$table_name,$condition);
		 if($res->num_rows==1)
		 {
			 $detail = $res->fetch_assoc();
			 $fso = $detail['fso'];
			 $sso = $detail['sso'];
			
			 if(($fso=="")&&($sso==""))
			 {
			 return false;
			 }
		 }
		 else
		 {
			 return false;
		 }
	}

	function parse_in_downline_org_list_admin($first_id,&$fso_downline_array,&$sso_downline_array,$organisation)
	{
		 $fields="*";	
		 $table_name = "login";
		 $condition = " WHERE table_id='$first_id' ";
		 $res=$this->select_simple($fields,$table_name,$condition);
		 if($res->num_rows==1)
		 {
			 $detail = $res->fetch_assoc();
			 $fso = $detail['fso'];
			 $sso = $detail['sso'];
			 if($organisation==LEFT_SIDE)
			 {
				 if($fso!="")
				 {
					 $fso_downline_array[]=$fso;
					 $this->parse_in_downline($fso,$fso_downline_array);
				 }	
			 }
			 elseif($organisation==RIGHT_SIDE)
			 {
				 if($sso!="")
				 {
					 $sso_downline_array[]=$sso;
					 $this->parse_in_downline($sso,$sso_downline_array);
				 }
			 }
			 else
			 {
				 if($fso!="")
				 {
					 $fso_downline_array[]=$fso;
					 $this->parse_in_downline($fso,$fso_downline_array);
				 }	
				 if($sso!="")
				 {
					 $sso_downline_array[]=$sso;
					 $this->parse_in_downline($sso,$sso_downline_array);
				 }
			 }
		 }
		 else
		 {
			 return false;
		 }
	}

	function delete_achievers($Del_ID)
	{
		try
		{
			$validate_obj=new validate;
			if($this->validate_obj->is_set($Del_ID)){throw new Exception("Invalid Request.. !");}
			if($this->validate_obj->is_empty($Del_ID)){throw new Exception("Please Contact Your Administrator... !");}
			//if($this->validate_obj->is_num($Del_ID)){throw new Exception("Only Numbers Can be entered..!");}
			$table_name="highest_achiever";
			$condition=" WHERE achiever_id='$Del_ID' AND status='active' ";
			$sql=$this->database_obj->delete_simple($table_name,$condition);
			return $sql;
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}












}
