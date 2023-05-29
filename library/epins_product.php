<?php
ob_start();
require_once("database.php"); ?>
<?php 
class epins_product extends database
{
	function epins_select_products()
	{
		$fields = "*";
		$table_name = "ps";
		$condition = " where status='active' ";
		$result1 = "";
		$result2 = "";
		$result=$this->select_simple($fields,$table_name,$condition);
		while($detail=$result->fetch_assoc())
		{
			$result1.="<option value='{$detail['product_id']}'>{$detail['name']}</option>";
			if($result2 == "")
			{
				$result2 = "[{$detail['product_id']},{$detail['price']}";
			}
			else
			{
				$result2.= "!@!@[{$detail['product_id']},{$detail['price']}";
			}
		}
		return $result1."!@!@!@!@".$result2;
	}
}

?>