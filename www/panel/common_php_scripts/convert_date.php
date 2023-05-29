<?php
function convert_date_for_db($date_to_check)
{
	if($date_to_check=="")
	{
		$date_to_check="0000-00-00";
	}
	else
	{
		$date_to_check_array=explode("-",$date_to_check);
		if(count($date_to_check_array)!=3)
		{
			$date_to_check="0000-00-00";
		}
		if((strlen($date_to_check_array[0])!=2)||($date_to_check_array[0]=="")||($date_to_check_array[0]=="00"))
		{
			$date_to_check="0000-00-00";
		}
		if((filter_var($date_to_check_array[0], FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/[^0-9]+/")))))
		{
			$date_to_check="0000-00-00";
		}
		switch($date_to_check_array[1])
		{
			case 'Jan':$date_to_check_array[1]="01";break;
			case 'Feb':$date_to_check_array[1]="02";break;
			case 'Mar':$date_to_check_array[1]="03";break;
			case 'Apr':$date_to_check_array[1]="04";break;
			case 'May':$date_to_check_array[1]="05";break;
			case 'Jun':$date_to_check_array[1]="06";break;
			case 'Jul':$date_to_check_array[1]="07";break;
			case 'Aug':$date_to_check_array[1]="08";break;
			case 'Sep':$date_to_check_array[1]="09";break;
			case 'Oct':$date_to_check_array[1]="10";break;
			case 'Nov':$date_to_check_array[1]="11";break;
			case 'Dec':$date_to_check_array[1]="12";break;
		}
		if((strlen($date_to_check_array[1])!=2)||($date_to_check_array[1]=="")||($date_to_check_array[1]=="00"))
		{
			$date_to_check="0000-00-00";
		}
		if((filter_var($date_to_check_array[1], FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/[^0-9]+/")))))
		{
			$date_to_check="0000-00-00";
		}
		if((strlen($date_to_check_array[2])!=4)||($date_to_check_array[2]=="")||($date_to_check_array[2]=="0000"))
		{
			$date_to_check="0000-00-00";
		}
		if((filter_var($date_to_check_array[2], FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/[^0-9]+/")))))
		{
			$date_to_check="0000-00-00";
		}
		$date_to_check=$date_to_check_array[2]."-".$date_to_check_array[1]."-".$date_to_check_array[0];
	}
	return $date_to_check;
}
?>