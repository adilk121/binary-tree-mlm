<?php 
class validate
{
	function is_empty($to_check)
	{
		
		if($to_check=='')
		{
			return true;
	    }
	 	else
	    {
	 		return false;
		}
	 }
	 function is_set($to_check)
	 {
		if(!isset($to_check))
		{
			return true;
	    }
	 	else
	    {
	 		return false;
		}
	 }
	 function is_exceeding_limit($to_check,$limit)
	 {
		 if(strlen($to_check)>$limit)
		 {
			 return true;
		 }
		 else
		 {
			 return false;
		 }
	 }
 	 function is_num($to_check)
	 {
		 if(!ctype_digit($to_check))
		 {
			 return true;
		 }
		 else
		 {
			 return false;
		 }
	 }
 	 function is_char($to_check)
	 {
		 if(!ctype_alpha($to_check))
		 {
			 return true;
		 }
		 else
		 {
			 return false;
		 }
	 }
	 function is_email($to_check)
	 {
		 if(!filter_var($to_check,FILTER_VALIDATE_EMAIL))
		 {
			 return true;
		 }
		 else
		 {
			 return false;
		 }
	 }
	 
	 function is_pan_card($to_check)
	 {
		  if (!preg_match("/^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/", $to_check))
		 {
			 return true;
		 }
		 else
		 {
			 return false;
		 }
	 
	
	 }

	 

}
?>