<?php
require_once("database.php"); ?>
<?php 
//header
class user extends database
{
	
	private $name_araays = array();
	private $username_araays = array();
	private $did_araays = array();
	private $tag_araays = array();
	private $created_date_araays = array();
	private $status_araays = array();
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
	
	
	function Update_all()
	{
		extract($_POST);
		$set = "ok";
		try
		{
			$validate_obj=new validate;
			if($validate_obj->is_set($alternate_contact_no)){ $set = "notok";throw new Exception("Invalid Request Alternate Mobile !");}
			if($validate_obj->is_empty($alternate_contact_no)){ $set = "notok";throw new Exception("Please Enter Alternate Mobile No. !");}
			if($validate_obj->is_num($alternate_contact_no)){$set = "notok";throw new Exception("Please Enter Only Numbers in Alternate Mobile!");}
			if($validate_obj->is_exceeding_limit($alternate_contact_no,10)){$set = "notok";throw new Exception("Please Enter less than 10 digit Alternate Mobile No.!");}
					
			$this->open_connection();
			$std_dob = $dob_day."-".$dob_month."-".$dob_year;
			$prep="UPDATE login SET pan='$pan',alternate_contact_no='$alternate_contact_no',p_local='$p_local',p_city='$p_city',p_state='$p_state',p_pincode='$p_pincode',c_local='$c_local',c_city='$c_city',c_state='$c_state',c_pincode='$c_pincode',nominee_name='$nominee_name',nominee_relation='$nominee_relation',
									nominee_age='$nominee_age',bank_name='$bank_name',bank_branch='$bank_branch',bank_account_no='$bank_account_no',bank_ifsc_code='$bank_ifsc_code',dob='$std_dob',gender='$gender',father_name='$father_name',mother_name='$mother_name' WHERE table_id='{$_SESSION['log_id']}'";
			if(!$res = $this->simply_run_statement_passed($prep))
			{
				$set = "notok";
				$this->close_connection();
				throw new Exception('Error : Profile Could not Updated ...Please Contcat to your administrator...!!!');		
			}
			$this->close_connection();
			return $set;		 			
		}
		catch(Exception $e) 
		{
			return $e->getMessage();
		}
	}
	function edit_profile()
	{	
		  $fields="*";
		  $table_name="login";
		  $condition="WHERE table_id=$_SESSION[log_id]";
		  $sql=$this->select_simple($fields,$table_name,$condition);
		  return $sql;
			
	}

	function request_new_epin($no_of_epin,$epin_product_code,$mode,$dd_no,$dd_date,$dd_bank,$dd_branch,$cheque_no,$cheque_date,$cheque_bank,$cheque_branch)
	{
		global $_POST;
		extract($_POST);
		try
		{
			$validate_obj=new validate;
			if($validate_obj->is_empty($epin_product_code)){throw new Exception("Please Choose a product name !");}
			if($validate_obj->is_set($epin_product_code)){throw new Exception("Invalid product name !");}
			if($validate_obj->is_empty($mode)){throw new Exception("Please Choose a Payment Mode !");}
			if($validate_obj->is_set($mode)){throw new Exception("Invalid Request Payment Mode !");}
			if($mode=='cheque')
			{
			  if($validate_obj->is_empty($cheque_no)){throw new Exception("Please Enter Cheque No. !");}
			  if($validate_obj->is_set($cheque_no)){throw new Exception("Invalid Cheque No. !");}
			  if($validate_obj->is_empty($cheque_bank)){throw new Exception("Please Enter Cheque Bank !");}
			  if($validate_obj->is_set($cheque_bank)){throw new Exception("Invalid Cheque Bank !");}
			  if($validate_obj->is_empty($cheque_date)){throw new Exception("Please Enter Cheque Date !");}
			  if($validate_obj->is_set($cheque_date)){throw new Exception("Invalid Cheque date !");}
			  if($validate_obj->is_empty($cheque_branch)){throw new Exception("Please Enter Cheque Branch !");}
			  if($validate_obj->is_set($cheque_branch)){throw new Exception("Invalid Cheque Branch !");}
			}
			elseif($mode=='dd')
			{
			
			  if($validate_obj->is_empty($dd_no)){throw new Exception("Please Enter DD No. !");}
			  if($validate_obj->is_set($dd_no)){throw new Exception("Invalid DD No. !");}
			  if($validate_obj->is_empty($dd_date)){throw new Exception("Please Choose a date !");}
			  if($validate_obj->is_set($dd_date)){throw new Exception("Invalid date !");}
			  if($validate_obj->is_empty($dd_bank)){throw new Exception("Please Enter DD Bank !");}
			  if($validate_obj->is_set($dd_bank)){throw new Exception("Invalid DD Bank !");}
			  if($validate_obj->is_empty($dd_branch)){throw new Exception("Please Enter DD Bank !");}
			  if($validate_obj->is_set($dd_branch)){throw new Exception("Invalid date !");}
				
			}

			$this->open_connection();
			foreach($_POST as $value)
			{
				$value = $this->real_escape($value);
			}
			$fields="req_no";
			$table_name="epins";
			$condition=" order by req_no desc limit 0,1 ";
			$sql=$this->select_simple($fields,$table_name,$condition);
			if($sql->num_rows==1)
			{
 				//echo mysql_affected_rows($sql);
				 $DATA=$sql->fetch_assoc();
				 $req_no = $DATA['req_no'];
				 $req_no++;
			}
			else
			{
				$req_no = "101";
			}
			
		 	$this->START_TRANSATION();
			
		 	for($x=0;$x<$no_of_epin;$x++)
		 	{
				$fields = "epin_product_code,mode,dd_no,dd_date,dd_bank,dd_branch,cheque_no,cheque_date,cheque_bank,cheque_branch,req_no,created_by,created_ip,created_browser";
				$value = "'$epin_product_code','$mode','$dd_no','$dd_date','$dd_bank','$dd_branch','$cheque_no','$cheque_date','$cheque_bank','$cheque_branch','$req_no','{$_SESSION['log_id']}','{$_SERVER['REMOTE_ADDR']}','{$_SERVER['HTTP_USER_AGENT']}'";
				$table_name = "epins";
			if(!($result=$this->insert_simple($table_name,$fields,$value)))
			{
				$this->rollback();
				$this->close_connection();
				throw new Exception('Error : Could not create new sale...Please contact your administrator...!!!');		
			}
				
		 	}
				$this->commit();
				header("location:request_new_epins.php");
		}
		catch(Exception $e) 
		{
			echo $e->getMessage();
		}
		//header("location:request_new_epins.php");

	}
	function fetch_remaining_epins()
	{	
		  $fields="*";
		  $table_name="epins INNER JOIN ps";
		  $condition=" ON epins.epin_product_code=ps.product_id  WHERE epins.status='Issued' AND epins.created_by='{$_SESSION['log_id']}' order by epins.req_no asc ";
		  $sql=$this->select_simple($fields,$table_name,$condition);
		  return $sql;
			
	}
	function pending_epins()
	{	
		  $fields="*,COUNT(*) as total_epins";
		  $table_name="epins INNER JOIN ps ";
		  $condition=" ON epins.epin_product_code=ps.product_id  WHERE epins.status='Pending' AND epins.created_by='{$_SESSION['log_id']}' group by req_no ";
		  $sql=$this->select_simple($fields,$table_name,$condition);
		  return $sql;
			
	}
	function used_epins()
	{	
		  $fields="*,ps.name as prd_name";
		  $table_name="epins INNER JOIN ps ON epins.epin_product_code=ps.product_id INNER JOIN login ON epins.used_by=login.table_id";
		  $condition="  WHERE epins.status='Used' AND epins.created_by='{$_SESSION['log_id']}' ";
		  $sql=$this->select_simple($fields,$table_name,$condition);
		  return $sql;
			
	}
	function check_epin_get_product($epin_no)
	{	
			 
		  $fields="*";
		  $table_name="epins INNER JOIN ps";
		  $condition=" ON epins.epin_product_code=ps.product_id WHERE epins.epin='$epin_no' AND epins.status='Issued' AND epins.created_by='{$_SESSION['log_id']}'";
		  $sql=$this->select_simple($fields,$table_name,$condition);
		  return $sql;
			  
	}		
			
	/*function show_epin_and_product()
	{	
		  $fields="*";
		  $table_name="epins INNER JOIN ps";
		  $condition=" ON epins.epin_product_code=ps.product_id  WHERE epins.status='Issued' ";
		  $sql=$this->select_simple($fields,$table_name,$condition);
		  return $sql;
			
	}*/		
	function show_income_details()
	{	
		  $fields="*";
		  $table_name="cheque";
		  $condition=" ";
		  $sql=$this->select_simple($fields,$table_name,$condition);
		  return $sql;
			
	}
	function achievers()
	{	
		$fields="*";
		$table_name="highest_achiever";
		$condition=" WHERE 1 ORDER BY session DESC LIMIT 0,1 ";
		$sql1=$this->select_simple($fields,$table_name,$condition);	
		if($sql1->num_rows==1)
		{
			$fetch = $sql1->fetch_assoc();
			$session = $fetch['session'];
		}
		$fields="*";
		$table_name="highest_achiever a INNER JOIN  login b ON a.user_id=b.table_id";
		$condition=" WHERE 1 AND a.session='$session' ORDER BY a.income DESC ";
		$sql=$this->select_simple($fields,$table_name,$condition);		  
	    return $sql;
			
	}
	function get_validity($date_str, $months)
	{
   		 $date = new DateTime($date_str);
   		 $start_day = $date->format('j');

   		 $date->modify("+{$months} month");
   		 $end_day = $date->format('j');
		 
   		 if ($start_day != $end_day)
		 {
         $date->modify('last day of last month');
		 }
		 $date->modify("-1 day");
		 $date = $date->format('Y-m-d');
  		 return $date;
	}
	
	function generateRandomString($length = 8)
	{
		$characters = DID_NO;
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++)
		{
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
	
	function calculate_linking_id($to_check,$side,&$imm_sponsor_ref)
	{
		if($side==LEFT_SIDE)
		{
			$fields="table_id,fso";
			$table_name = "login";
			$condition = "WHERE table_id='$to_check'";
			$res=$this->select_simple($fields,$table_name,$condition);
			if($res->num_rows==1)
			{
				$detail=$res->fetch_assoc();
				$to_return=$detail['table_id'];
				$fso=$detail['fso'];
				if($fso!="")
				{
					$this->calculate_linking_id($fso,$side,$imm_sponsor_ref);
				}
				else
				{
				    $imm_sponsor_ref=$to_return;
				}
			}
			else
			{
				$this->close_connection();
				echo("Error : Cannot calculate sponsor...Please contact your administratorhello...!!!");
				exit();
			}
		}
		if($side==RIGHT_SIDE)
		{
			$fields="table_id,sso";
			$table_name = "login";
			$condition = "WHERE table_id='$to_check'";
			$res=$this->select_simple($fields,$table_name,$condition);
			if($res->num_rows==1)
			{
				$detail=$res->fetch_assoc();
				$to_return=$detail['table_id'];
				$sso=$detail['sso'];
				if($sso!="")
				{
				$this->calculate_linking_id($sso,$side,$imm_sponsor_ref);
				}
				else
				{
					$imm_sponsor_ref=$to_return;
				
				}
			}
			else
			{
				$this->close_connection();
				echo("Error : Cannot calculate sponsor...Please contact your administrator...!!!");
				exit();
			}
		}
	}
	
	function register_using_by_epin()
	{
		global $_POST;
		extract($_POST);
		try
		{
			$validate_obj=new validate;
			if($validate_obj->is_empty($username)){throw new Exception("Please enter username..!");}
			if($validate_obj->is_set($username)){throw new Exception("Invalid username..!");}
			if($validate_obj->is_exceeding_limit($username,50)){throw new Exception("Please enter below 50 character in  username..!");}
			if(filter_var($username,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>USERNAME_VALIDATE)))){throw new Exception("Invalid username only numbers and alphabets or '.' '_' are allowed!");}


			if($validate_obj->is_empty($password)){throw new Exception("Please enter password..!");}
			if($validate_obj->is_set($password)){throw new Exception("Invalid password..!");}
			
			if($validate_obj->is_empty($name)){throw new Exception("Please enter name...!");}
			if($validate_obj->is_set($name)){throw new Exception("Invalid Cheque No. !");}
			if($validate_obj->is_exceeding_limit($username,100)){throw new Exception("Please enter below 100 character in  cheque no..!");}


			if($validate_obj->is_empty($dob)){throw new Exception("Please enter dob..!");}
			if($validate_obj->is_set($dob)){throw new Exception("Invalid dob.. !");}
			if($validate_obj->is_exceeding_limit($dob,50)){throw new Exception("Please enter below 50 character in  dob..!");}


			if($validate_obj->is_empty($gender)){throw new Exception("Please choose gender..!");}
			if($validate_obj->is_set($gender)){throw new Exception("Invalid gender !");}
			if(($gender!='Male')&&($gender!='Female')){throw new Exception("Gender Must be selected..!");}
			
			if($validate_obj->is_empty($father_name)){throw new Exception("Please enter father name..!");}
			if($validate_obj->is_set($father_name)){throw new Exception("Invalid father name..!");}
			if($validate_obj->is_exceeding_limit($father_name,150)){throw new Exception("Please enter below 150 character in  father name..!");}

			if($validate_obj->is_empty($nationality)){throw new Exception("Please enter nationality..!");}
			if($validate_obj->is_set($nationality)){throw new Exception("Invalid nationality..!");}
			if($validate_obj->is_exceeding_limit($nationality,150)){throw new Exception("Please enter below 150 character in  nationality..!");}

			if($validate_obj->is_empty($educational_qualification)){throw new Exception("Please enter educational qualification..!");}
			if($validate_obj->is_set($educational_qualification)){throw new Exception("Invalid educational qualification..!");}
			if($validate_obj->is_exceeding_limit($educational_qualification,150)){throw new Exception("Please enter below 150 character in  educational_qualification..!");}

			if($validate_obj->is_empty($proffession)){throw new Exception("Please enter proffession..!");}
			if($validate_obj->is_set($proffession)){throw new Exception("Invalid profession!");}
			if($validate_obj->is_exceeding_limit($proffession,150)){throw new Exception("Please enter below 150 character in  proffession..!");}


			if($validate_obj->is_empty($organization)){throw new Exception("Please choose organization..!");}
			if($validate_obj->is_set($organization)){throw new Exception("Invalid organization!");}
			if(($organization!=LEFT_SIDE)&&($organization!=RIGHT_SIDE)){throw new Exception("organization must be selected!");}
			
			if($validate_obj->is_empty($contact_no)){throw new Exception("Please enter contact no..!");}
			if($validate_obj->is_num($contact_no)){throw new Exception("Please enter only numbers in contact no..!");}
			if($validate_obj->is_exceeding_limit($contact_no,15)){throw new Exception("Please enter only 15 digit in  contact no..!");}
			if($validate_obj->is_set($contact_no)){throw new Exception("Invalid contact no..!");}

			if($validate_obj->is_empty($alternate_contact_no)){throw new Exception("Please alternate no..!");}
			if($validate_obj->is_num($alternate_contact_no)){throw new Exception("Please enter only numbers in alternate contact no..!");}
			if($validate_obj->is_exceeding_limit($alternate_contact_no,15)){throw new Exception("Please enter only 15 digit in alternate contact no..!");}
			if($validate_obj->is_set($alternate_contact_no)){throw new Exception("Invalid alternate no..!");}

				
			if($validate_obj->is_empty($email_id)){throw new Exception("Please enter email id..!");}
			if($validate_obj->is_email($email_id)){throw new Exception("Invalid email id..!");}
			if($validate_obj->is_set($email_id)){throw new Exception("Invalid email id..!");}
			if($validate_obj->is_exceeding_limit($email_id,200)){throw new Exception("Please enter below 200 character in  email_id..!");}
				
			if($validate_obj->is_empty($c_address)){throw new Exception("Please enter correspondence address..!");}
			if($validate_obj->is_set($c_address)){throw new Exception("Invalid correspondence address..!");}
			if($validate_obj->is_exceeding_limit($c_address,500)){throw new Exception("Please enter below 500 character in  corresponding address..!");}


			if($validate_obj->is_empty($p_address)){throw new Exception("Please enter permanent address..!");}
			if($validate_obj->is_set($p_address)){throw new Exception("Invalid permanent address..!");}				
			if($validate_obj->is_exceeding_limit($p_address,500)){throw new Exception("Please enter below 500 character in  permanent address..!");}

			$this->open_connection();
			foreach($_POST as $item)
			{
				$item = $this->real_escape($item);
			}
			
			$fields="table_id";
			$table_name = "login";
			$condition = " WHERE username='$username' ";
			$res=$this->select_simple($fields,$table_name,$condition);
			if($res->num_rows>0)
			{
				$this->close_connection();
				throw new Exception("Username Already taken..!");
			}
			$fields="table_id";
			$table_name = "login";
			$condition = " WHERE username='$sponsor_username' AND did='$sponsor_did' AND status='active' ";
			$res=$this->select_simple($fields,$table_name,$condition);
			if($res->num_rows!=1)
			{
				$this->close_connection();
				throw new Exception("Sponsor not found..!");
			}
			$detail= $res->fetch_assoc();
			$sponsor_table_id=$detail['table_id'];
			$imm_sponsor_ref =$sponsor_table_id;
			$this->calculate_linking_id($sponsor_table_id,$organization,$imm_sponsor_ref);
			$imm_sponsor=$imm_sponsor_ref;
			$passed="no";
			while($passed=="no")
			{
				$new_did=$this->generateRandomString();
				$fields="table_id";
				$table_name = "login";
				$condition = " WHERE did='$new_did' ";
				$res=$this->select_simple($fields,$table_name,$condition);
				if($res->num_rows==0)
				{
					$passed="yes";
				}
			}
			
			$start_date_new=date("Y-m-d");
			$validity=12;
			$end_date=$this->get_validity($start_date_new,$validity);
			if($end_date=="0000-00-00")
			{
				echo("Error : Cannot calculate end date...");
				exit();
			}



		 	$this->START_TRANSATION();

			$fields="username,did,password,name,dob,gender,father_name,nationality,educational_qualification,proffession,contact_no,alternate_contact_no,email_id,c_address,p_address,start_date,end_date,created_by,created_ip,created_browser";
			$value ="'$username','$new_did','$password','$name','$dob','$gender','$father_name','$nationality','$educational_qualification','$proffession','$contact_no','$alternate_contact_no','$email_id','$c_address',
					 '$p_address','$start_date_new','$end_date','{$_SESSION['log_id']}','{$_SERVER['REMOTE_ADDR']}','{$_SERVER['HTTP_USER_AGENT']}'";			
			$table_name = "login";
			if(!($result=$this->insert_simple($table_name,$fields,$value)))
			{
				$this->close_connection();
				throw new Exception('Error : Could not create new sale...Please contact your administrator...!!!');		
			}
			else
			{
				 $generated_table_id=$this->insert_id();
			}
			//START---SHOW EPINS AND PRODUCT DETAILS---
			$epin_no=$_GET['epin_no'];
			$show_epin=$this->check_epin_get_product($epin_no);
			$DATA = $show_epin->fetch_assoc();
			$bv=$DATA['bv'];
			$epin_code=$DATA['epin'];
			//END---SHOW EPINS AND PRODUCT DETAILS---

			$fields="my_bv_new";	
			$value ="'$bv'";
			$table_name = "bv";
			if(!($result=$this->insert_simple($table_name,$fields,$value)))
			{
				$this->rollback();
				$this->close_connection();
				throw new Exception('Error : Could not save bv details...Please contact your administrator...!!!');		
			}
			
			$fields="user_id,epin_code";	
			$value ="'$generated_table_id','$epin_code'";
			$table_name = "invoice";
			if(!($result=$this->insert_simple($table_name,$fields,$value)))
			{
				$this->rollback();
				$this->close_connection();
				throw new Exception('Error : Could not save invoice details...Please contact your administrator...!!!');		
			}
			
			if($organization==LEFT_SIDE)
			{
				
			  $fields=array("fso");	
			  $value =array($generated_table_id);
			  $table_name = "login";
			  $condtion = " WHERE table_id='$imm_sponsor' AND fso='' ";
              $update_fso_sso=$this->update_simple($table_name,$fields,$value,$condtion);
				
			}
			else if($organization==RIGHT_SIDE)
			{
			  $fields=array("sso");	
			  $value =array($generated_table_id);
			  $table_name = "login";
			  $condtion = " WHERE table_id='$imm_sponsor' AND sso='' ";
              $update_fso_sso=$this->update_simple($table_name,$fields,$value,$condtion);
			}
			if($this->affected_rows()!=1)
			{
				$this->rollback();
				$this->close_connection();
				throw new Exception('Error : Could not use linking code...Please contact your administrator...!!!');	
			}
  			  $fields=array("status","used_by");	
			  $value =array("Used",$generated_table_id);
			  $table_name = "epins";
			  $condtion = " WHERE epin='$epin_no' ";
              $update_epin_tale=$this->update_simple($table_name,$fields,$value,$condtion);
		   if($this->affected_rows()!=1)
		   {
				$this->rollback();
				$this->close_connection();
			  throw new Exception('Error : Could not link new sale in the chart...Please contact your administrator...!!!');	
		   }
		   
			
			$this->commit();
			header("location:remaining_epins.php");
		}
		catch(Exception $e) 
		{
			return $e->getMessage();
		}

	}
	function get_table_id_username($uname)
	{
  		 $fields="*";	
		 $table_name = "login";
		 $condition = " WHERE username='$uname' ";
		 $res=$this->select_simple($fields,$table_name,$condition);
		 return $res;

	}
	function check_in_downline($to_check,$proceed_id,&$found_id)
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
				 if($fso==$to_check)
				 {
				 	$found_id="Yes"; return true;
				 }
				 else
				 {
					$this->check_in_downline($to_check,$fso,$found_id);
				}
			 }		
			 if($sso!="")
			 {
				 if($sso==$to_check)
				 {
				 	$found_id="Yes"; return true;
				 }
				 else
				 {
					$this->check_in_downline($to_check,$sso,$found_id);
				}
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
	function parse_in_downline_org_list($first_id,&$fso_downline_array,&$sso_downline_array,$organisation)
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
	function compose_message()
	{
		global $_POST;
		extract($_POST);
		try
		{
			$validate_obj=new validate;
			if($validate_obj->is_empty($subject)){throw new Exception("Please enter subject..!");}
			if($validate_obj->is_set($subject)){throw new Exception("Invalid subject..!");}

			if($validate_obj->is_empty($message)){throw new Exception("Please enter message..!");}
			if($validate_obj->is_set($message)){throw new Exception("Invalid message...!");}				

			$fields="from,to,subject,message,created_ip,created_browser";
			$table_name = "messages";
			$value = "'{$_SESSION['log_id']}','Hello','$subject','$message','{$_SERVER['REMOTE_ADDR']}','{$_SERVER['HTTP_USER_AGENT']}'";
			$res=$this->insert_simple($table_name,$fields,$value);
			return $res;
		}
		catch(Exception $e) 
		{
			return $e->getMessage();
		}

	}
	function support_center()
	{	
		  $fields="*";
		  $table_name="messages";
		  $condition="WHERE table_id='{$_SESSION['log_id']}'";
		  $sql=$this->select_simple($fields,$table_name,$condition);
		  return $sql;
			
	}
	function get_detail_by_table_id($mesg_id)
	{
  		 $fields="*";	
		 $table_name = "messages";
		 $condition = " WHERE from='$mesg_id' ";
		 $res=$this->select_simple($fields,$table_name,$condition);
		 return $res;

	}


	
	

}

?>
