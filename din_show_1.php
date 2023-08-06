<HTML><HEAD><TITLE></TITLE>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<meta http-equiv=Content-Type content="text/html; charset=windows-874">

<!-- Bootstrap CSS -->
<script type="text/javascript" src ="../bootstrap4_4_1/js/bootstrap.bundle.min.js"></script>

<link rel="stylesheet" href="../bootstrap4_4_1/css/bootstrap.min.css"  crossorigin="anonymous">

<?
include ("../bootstrap4_4_1/css/decha.css");

?>
			 <meta charset="utf-8">
			 <meta http-equiv="X-UA-Compatible" content="IE=edge">
			 <meta name="viewport" content="width=device-width, initial-scale=1">
			 <title>ข้อมูลการลงทะเบียน</title>

			 <!-- Bootstrap -->
			 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">


<link rel="stylesheet" href="../bootstrap4_4_1/css/bootstrap-4-hover-navbar.css"  crossorigin="anonymous">


			 <!--Demo purpose css-->
			 <style>
					 body {
							 padding-top: 50px;
					 }
					 .navbar {
							 margin:  40px 0;
					 }
					 .jumbotron{background-color: #1f1f1f;color: #fff;}

			 </style>

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200;400;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:wght@300&family=Kanit:wght@600&display=swap" rel="stylesheet">

<style>
		 .kanitdec {
			font-family: 'Kanit', sans-serif;
		 }
	 .prompt  {
			font-family: 'Prompt', sans-serif;
		 }

	 </style>
<?php

function fullDateTimes(){
		$thDay = array('อาทิตย์', 'จันทร์' ,'อังคาร' ,'พุธ' ,'พฤหัสบดี' ,'ศุกร์' ,'เสาร์' );
		$thMon = array('มกราคม', 'กุมภาพันธ์' ,'มีนาคม' ,'เมษายน','พฤษภาคม' ,'มิถุนายน',
									 'กรกฎาคม' ,'สิงหาคม' ,'กันยานยน' ,'ตุลาคม' ,'พฤศจิกายน' ,'ธันวาคม' );
		$w = $thDay[date('w')];
		$d = date('d');
		$m = $thMon[date('n')-1];
		$y = date('y')+2543;
		return 'วัน ' .$w. 'ที่ '.$d. ' เดือน ' .$m. ' ปี ' .$y. ' เวลา :' .date('H:i:s');
			 }

?>

	 </head>
<body background="images/bg2.gif">
<?php
 include ("conndb.php");

if ($list_page == "")
	{
	$list_page = 50;}
	/*** Connect ***/
	$objConnect = mysql_connect($hostname, $user, $password)or die("Error Connect to Database");
	$objDB = mysql_select_db($dbname);
	mysql_query("SET NAMES UTF8");
if ($order == "" )
	{ 	$order = "asc" ;}
//else
	//{ 	$order = "DESC" ;}

if ($search == "")
	{
		$type = "name";
		$search = "";
	}
if ($sort == "")
	{
		$sort = "id";
	}
if ($type == "")
	{
		$type = "name";
		$search = "";
	}
// ติดต่อ database เพื่ออ่านข้อมูล
// หาจำนวนหน้าทั้งหมด
	$chk_date = date("j M Y",mktime( date("H")+$p_hour, date("i")+$p_min ));
	if (empty($page)){
		$page=1;
	}

$sql = "select id from din_0166 where $type like '%$search%' ";
	$result = mysql_query($sql);
	$NRow = mysql_num_rows($result);
	$rt = $NRow%$list_page;
	if($rt!=0) {
		$totalpage = floor($NRow/$list_page)+1;
	}
	else {
		$totalpage = floor($NRow/$list_page);
	}
	$goto = ($page-1)*$list_page;
//    if ($list_page == $goto) {
//	     $list_page = $goto + $list_page; }

	// Query ข้อมูลตามจำนวนที่กำหนด
//	$sql = "select * from webboard_data where Category='$Category' order by No DESC limit $goto,$list_page";
//	$result = mysql_query($sql);
//	$NRow = mysql_num_rows($result);

// กำหนดคำสั่ง SQL เพื่อแสดงข้อมูล
$strSQL2 = "select * from din_0166 where  $type like '%$search%' order by $sort $order limit $goto,$list_page";
$objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
$NRow = mysql_num_rows($objQuery2);

 $id = $goto;

?>


<div class="container md alert alert-primary  " >
 <h6 class = "prompt text-center">

รายชื่อผู้ลงทะเบียน <br>

 <font class = "prompt text-secondary " size="1">
 เข้ารับการอบรมสัมมนา ปี 2566 <br>
วันที่ 13-15 กันยายน 2566 <br>  ณ โรงแรมสบายโฮเทล ตำบลหมื่นไวย อำเภอเมือง จังหวัดนครราชสีมา
</font>
 </h6>
</div>




<div class="container-md">



<?
include ("conndb.php");
$tblname4 = "amper";	//ชื่อตาราง
	/*** Connect ***/
	$objConnect = mysql_connect($hostname, $user, $password)or die("Error Connect to Database");
	$objDB = mysql_select_db($dbname);
     mysql_query("SET NAMES UTF8");
// คำสั่ง SQL และสั่งให้ทำงาน

$strSQL4 = "select * from $tblname4 order by name asc";	// กำหนดคำสั่ง SQL เพื่อแสดงข้อมูล
$objQuery4= mysql_query($strSQL4) or die ("Error Query [".$strSQL4."]");


    $i=1;

	while($objResult4 = mysql_fetch_array($objQuery4))
	{
	?> <button type='button' class='btn btn-outline-warning btn-rounded btn-sm my-0 prompt'>

	  <a href = "din_show_1.php?type=amper&search=<?=$objResult4["name"];?>"  >
	  <font class = "prompt text-primary " size="1">
	  <?=$objResult4["name"];?>
	  </font>
	  </a></button>

  <?
  	$i++;
	}
//end While


?>
</div>

<div class ="container-md text-center">
<a href = "din_show_1.php" class="btn btn-primary btn-sm prompt" role = "button" >ท้ังหมด</a>  &nbsp;
</div>



<div class="container-md">

<div class="btn-group btn-group-sm">
		<?
		// สร้าง link <<BACK เพื่อไปหน้าก่อน-หน้าถัดไป
		// ถ้าหน้าปัจจุบัน($page)มากกว่า 1 และ(&&) หน้าปัจจุบัน น้อยกว่าหรือเท่า จำนวนหน้าทั้งหมด($totalpage)
		//ให้แสดง Link <<BACK
		 if($page>1 && $page<=$totalpage) {
		 $prevpage = $page-1;
		 echo
		 "<button type='button' class='btn btn-outline-warning btn-rounded btn-sm my-0 prompt'>
		 <a href ='din_show_1.php?search=$search&sort=$sort&type=$type&order=$order&page=$prevpage'>
			<< BACK
		 </a></button>";
	 }
	 else {
		 echo
	 // ปุ่ม <<BACK  btn-outline-secondary
	 //"<button type='button' class='btn btn-outline-warning btn-rounded btn-sm my-0 prompt'>
		 "<button type='button' class='btn btn-outline-secondary  btn-sm  prompt'>
		 << BACK
		 </button>";
	 }
 // ถ้าจำนวนหน้าทั้งหมดมากกว่า  5 ให้แสดงหน้าที่ 1-3
 if ($totalpage>=1){
	 // สำหรับ $lowpage น้อยกว่าหน้าปัจจุบัน และ $lowpage น้อยกว่า 3 ให้แสดง
			for ($lowpage=1 ; $lowpage<$page && $lowpage<=3 ; $lowpage++){
			 echo "\t<button type='button' class='btn btn-outline-warning btn-rounded btn-sm my-0 prompt'><a href ='din_show_1.php?search=$search&sort=$sort&type=$type&order=$order&page=$lowpage'>$lowpage</a></button> \n";
			}
			if ($page<=5){
			 echo "\t<button type='button' class='btn  btn-outline-danger  btn-sm my-0 prompt'>$page</button> \n";
			}

			//&&$totalpage>=$page+3
			if ($page>=6){
				echo "...";
				for ($lowpage= $page-2 ; $lowpage<$page ; $lowpage++){
				 echo "\t<button type='button' class='btn btn-outline-warning btn-rounded btn-sm my-0 prompt'><a href ='din_show_1.php?search=$search&sort=$sort&type=$type&order=$order&page=$lowpage'>$lowpage</a></button> \n";
			 }
				echo "\t<button type='button' class='btn  btn-outline-danger  btn-sm my-0 prompt'>$page</button> \n";
						}
		for ($lowpage=$page+1 ; $lowpage<=$page+3 &&$lowpage<=$totalpage ; $lowpage++){
			 echo "\t<button type='button' class='btn btn-outline-warning btn-rounded btn-sm my-0 prompt'><a href ='din_show_1.php?search=$search&sort=$sort&type=$type&order=$order&page=$lowpage'>$lowpage</a></button> \n";
			}
			if($totalpage>$page+3){
		 echo "...";}
			}
/* link สามหน้าสุดท้าย หายไปเมื่อหน้าปัจจุบันใกล้เข้ามา  */
	 $M = $totalpage -3;
	 if ($totalpage>=$page+5){
	 for($l=$M+1 ; $l<=$totalpage ; $l++) {
		 echo "\t<button type='button' class='btn btn-outline-warning btn-rounded btn-sm my-0 prompt'><a href ='din_show_1.php?search=$search&sort=$sort&type=$type&order=$order&page=$l'>$l</a></button>\n ";
	 }
	 }
	 if($page!=$totalpage) {
		 $nextpage = $page+1;
		 echo "\t<button type='button' class='btn btn-outline-warning btn-rounded btn-sm my-0 prompt'><a href ='din_show_1.php?search=$search&sort=$sort&type=$type&order=$order&page=$nextpage'>NEXT >> </a></button>\n";
	 }
			 else {
			echo " <button type='button' class='btn btn-outline-secondary btn-rounded btn-sm my-0 prompt'>NEXT >> </button> ";
				}

	 ?>

</div>

<!--เรื่มต้นคำสั่งสร้างตาราง วน Loop <div class="container-md">-->

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">ชื่อ/ตำแหน่ง</th>
      <th scope="col">
	<a href ="din_show_1.php?search=<?=$search;?>&sort=genelation&type=<?=$type;?>&order=DESC&page=<?=$page;?>">
	  หน่วยงาน
	</a>
	  </th>

    </tr>
  </thead>


<?
		$k=1;

		while($objResult = mysql_fetch_array($objQuery2))
		{

	    $id++;
		//
		?>

<tbody>
    <tr class = "table">
      <th scope="row"> <? echo "$id.";  ?></th>
	  <td class = "prompt text-primary " size="3">
	  <font class = "prompt text-primary " size="3">
	  <? echo $objResult["name"];?> </font><br>
	  <font class = "prompt text-secondary " size="1">
	  <? echo $objResult["abt_admin"];?></font>
	  <br> <font class = "prompt text-danger " size="1">
	  <? echo $objResult["genelation"];?> </font>
	  </td>
 	  <td >
	  <font class ="prompt text-primary " size="1">
	  <? echo $objResult["abt"];?>
	  </font><br>
	  <font class = "prompt text-secondary " size="1">

	  อ.<? echo $objResult["amper"];?>

	  </font>

	  </td>

    </tr>


</div>


  </div>

  <?
  	$k++;

	}
	?>
 </tbody>
</table>



</BODY>
</HTML>
