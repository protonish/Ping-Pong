<?php
session_start();
$name="";
if(isset($_POST['name']))
{$_SESSION['name']=$_POST['name'];}

if($_SESSION['name']!="")
{$name=$_SESSION['name'];}


$prTOhr="";
$prTOhr=$_POST["htmlRequest"];
$con = mysql_connect("byethost9.com","b9_14505338","713331host");
mysql_select_db("b9_14505338_chat", $con);
$check = mysql_query("SELECT * FROM chat");
$info = mysql_fetch_array($check);
$sqlcText=$info['ctext'];
if($_POST["updateR"]==0)
{
echo json_encode(array("phpResponse"=>$sqlcText));
}
if ($_POST["updateR"]==1)
{
$prTOhr=$sqlcText.$name."/~$".$prTOhr;
mysql_query("update chat set ctext='$prTOhr'");
}
if ($_POST["updateR"]==2)
{
mysql_query("update chat set ctext=''");
}
?>
