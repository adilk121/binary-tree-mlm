<?php require("../../common/check_user.php");?>
<?php require("../../common/connection.php"); 
//header?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
#welcomeContainer
{
	font-family:Arial, Helvetica, sans-serif;
 position:relative;
}
#welcome
{
position:relative;
margin:auto;
width:800px;
border:1px solid #000000;
}
</style>
<title>My Invoice</title>
</head>
<body>
  <div id="welcomeContainer">
    <div id="welcome" style="padding:20px;font-size:12px;border:none;">
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td colspan="3" align="center" style="font-size:18px;">RETAIL INVOICE</td>
        </tr>
        <tr>
          <td>
            <table width="100%" cellpadding="3px" cellspacing="0" border="1">
              <tr valign="top">
                <td>
                <strong>Relation AtoZ Group</strong><br />
               B-291 J.J. Colony<br />
                New Delhi - 110059<br /><br />
                Phone : 1800-425-425<br />
                Email : support@relationatozgroup.com<br />
                Website : www.relationatozgroup.com
                </td>
                <td rowspan="2">
                <strong>Invoice No*</strong><br />
                GH-16-10001
                </td>
                <td rowspan="2"><strong>Dated*</strong><br>15-Mar-2016</td>
              </tr>
              <tr valign="top">
                <td>
                <strong>Customer</strong><br />
                Akash<br />
                18, Marble Building,<br />
                Sec-10, Dwarka,<br />
                New Delhi - 110059
                </td>
              </tr>
              <tr style="font-weight:bold;line-height:25px;text-align:center;">
                <td>Description of Goods</td>
                <td>Quantity</td>
                <td>Amount</td>
              </tr>
              <tr valign="top" style="text-align:center;">
                <td>
                Standard Holiday Package
                <div style="position:relative;height:200px;"></div>
                </td>
                <td>1</td>
                <td>
                &#8377; 7960/-
                </td>
              </tr>
              <tr style="font-weight:bold;line-height:25px;text-align:center;">
                <td style="padding-right:2px;text-align:right;">Grand Total</td>
                <td style="padding-right:2px;">1</td>
                <td style="padding-right:2px; width:150px;">&#8377; 7960/-</td>
              </tr>
              <tr>
                <td colspan="5">
                <div style="position:relative;">
                  <strong>Amount Chargeable(in Words)</strong><br />
                  Seven Thousand Nine Hundred Sixty Only<br /><br />
                  <table cellpadding="0" cellspacing="0">
                    <tr>
                      <td>Company's VAT TIN Number</td>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                      <td>07356909153</td>
                    </tr>
                  </table><br /><br /><br /><br />
                  <strong>Declaration</strong><br />
                  We declare that this invoice shows the actual Price<br />
                  of the goods described and that all particulars are true and correct.
                  <div style="position:absolute;top:0;right:10px;">
                  E. & O. E.
                  </div>
                </div>
                </td>
              </tr>
            </table><br>
<div style="position:relative;text-align:center;line-height:30px;">This is a computer generated invoice, hence, need not be signed.</div>
          </td>
        </tr>
     </table> 
      
     
    </div>
  </div>
</body>
</html>
