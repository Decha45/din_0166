<?
session_start() ;
if ($logout == 'tologout'){
session_start() ;
session_destroy();
echo "<meta http-equiv=refresh content=0;URL=index_4.php>";
}
$login_payname = $_SESSION["login_payname"] ;
if($login_payname !='')
    {
	$whoname 			    = $_SESSION["whoname"] ;
	$whosurname 		  = $_SESSION["whosurname"] ;
	$who   				    = 'คุณ '.$whoname.' '.$whosurname ;
	$mem_username2  	= $_SESSION["who_mem_username"] ;
	$mem_password2  	= $_SESSION["who_mem_password"] ;

//	echo $mem_username2."<br>";
//	echo $mem_username2."<br>";
    }

include("conndb.php");
include ("../bootstrap4_4_1/css/decha.css");


$mem_username = $_POST['mem_username'];
if ($mem_username ==''){ $mem_username = $mem_username2;}

$mem_password1 = $_POST['mem_password'];
if ($mem_password1 ==''){ $mem_password1 = $mem_password2;}
$mem_username = htmlspecialchars($mem_username) ;
$mem_password = htmlspecialchars($mem_password1) ;

$mem_password = md5($mem_password) ;
echo '<meta http-equiv=Content-Type content="text/html; charset=utf-8">' ;
echo '<meta http-equiv=Content-Type content="text/html; charset=windows-874">' ;
echo '<script type="text/javascript" src ="../bootstrap4_4_1/js/bootstrap.bundle.min.js"></script>';

echo '<link rel="stylesheet" href="../bootstrap4_4_1/css/bootstrap.min.css"  crossorigin="anonymous">';


if(isset($mem_username) and isset($mem_password)) {
	$sql = "select * from d_pkorat_login_log where mem_username='$mem_username' AND mem_password='$mem_password' " ;

	$result = mysql_query($sql) or die ("ไม่สามารถสั่งให้ database ทำงานได้ในขณะนี้");
	$marr = mysql_fetch_array($result) ;
	$num = mysql_num_rows($result) ;

	$mem_code = $marr["mem_code"] ;

	if($num<=0) {
		$merror = erMessage('400','ชื่อเข้าสู่ระบบหรือ รหัสผ่านผิด <br>ตรวจเช็คชื่อ รหัสผ่านให้ถูกต้อง <br>ระบบจะกลับไปหน้าเข้าสู่ระบบโดยอัตโนมัติ') ;
		echo $merror ;
		echo "<meta http-equiv=refresh content=10;URL=index_4.php>";
		echo "<BR><BR>" ;
        echo "<BR>" ;
        echo '<div class="d-flex justify-content-center">' ;
        echo '<div class="cleaner">&nbsp;</div>' ;
        echo '<div class="col-md-4 col-md-offset-3">' ;
        echo '<div class="container md alert alert-primary  " >' ;

        echo '<h5 class = "prompt text-center">เข้าสู่ระบบบันทึกข้อมูลผู้ลงทะเบียน</h5>' ;
        echo '<form id="login-form" action="index_4.php" method="post" id="form1" role="form" style="display: block;" name="loginform"  onsubmit="return check()">' ;
        echo '<div class="form-group">' ;
        echo '<input type="text" name="mem_username" id="username" tabindex="1" class="form-control prompt" placeholder="User" size="8"  value="">' ;
        echo '</div>' ;
        echo '<div class="form-group">' ;
        echo '<input type="password" size="8" name="mem_password" id="password" tabindex="2" class="form-control prompt" placeholder="Password">' ;
        echo '</div>' ;
        echo '<button type="submit" class="btn btn-primary btn-lg text-center Prompt" >เข้าสู่ระบบ</button>' ;
        echo '</form></div></div>' ;


     exit() ;
	} else {

			$login_payname = $mem_username  ;
			$whoname = $marr["mem_name"] ;
			$whosurname = $marr["mem_surname"] ;
			$memid = $marr["mem_id"] ;
			$who = 'คุณ '.$whoname.' '.$whosurname ;
			$_SESSION['login_payname'] 	= $login_payname ;
			$_SESSION['whoname'] 		= $whoname ;
			$_SESSION['whosurname'] 	= $whosurname ;
			$_SESSION['memid'] 			= $memid ;
			$_SESSION['who_mem_username'] 	= $mem_username ;
			$_SESSION['who_mem_password'] 	= $mem_password1 ;

			//echo "<meta http-equiv='refresh' content='0 ;url=index_2.php'>" ;
			// ถ้ารหัสผ่านถูกต้อง ให้ไปที่ไฟล์
			//echo '<div class="cleaner">&nbsp;</div></div>' ;
	}


}


function erMessage($Size,$Comment){
    $temp = "<br><center>\n";
    $temp .= "<div class='cleaner'>&nbsp;</div>\n";
    $temp .= "<div class='col-md-4 col-md-offset-3'>\n";
    $temp .= "<div class='container md alert alert-danger  ' >\n";
    $temp .= "<h5 class = 'prompt text-center'>กรุณาเข้าสู่ระบบ บันทึกข้อมูลการลงทะเบียนอบรม ปี 2566</h5>\n";
    $temp .= "</div>\n";
    $temp .= "</div>\n";
    $temp .= "<a href =# class='btn btn-dark btn-sm prompt' role = 'button'>[ ระบบหยุดทำงาน ]</a>\n";
    $temp .= "</center>\n";
    return ( $temp ) ;
}
?>

<HTML><HEAD>

	<!-- Bootstrap CSS -->
    <script type="text/javascript" src ="../bootstrap4_4_1/js/bootstrap.bundle.min.js"></script>
		<link rel="stylesheet" href="../bootstrap4_4_1/css/bootstrap.min.css"  crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
		<link rel="stylesheet" href="../bootstrap4_4_1/css/bootstrap-4-hover-navbar.css"  crossorigin="anonymous">
		<link href="../font-awesome-4.7.0/css/font-awesome470.css" rel="stylesheet">


			<?
			     include ("../bootstrap4_4_1/css/decha.css");
			//เรียกค่าต่างๆ ที่บันทึกไว้ในไฟล์ decha.css มาใช้งาน

			?>
			 <meta charset="utf-8">
			 <meta http-equiv="X-UA-Compatible" content="IE=edge">
			 <meta name="viewport" content="width=device-width, initial-scale=1">
			 <title>เอกสารเผยแพร่ สมาคมข้าราชการท้องถิ่น</title>

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

<title>ระบบจัดเก็บเอกสาร DECHA</title>

<!-- Bootstrap -->

<?php
       $m = array(
            "",
            "มกราคม",
            "กุมภาพันธ์",
            "มีนาคม",
            "เมษายน",
            "พฤษภาคม",
            "มิถุนายน",
            "กรกฎาคม",
            "สิงหาคม",
            "กันยายน",
            "ตุลาคม",
            "พฤศจิกายน",
            "ธันวาคม"
        );
?>

</head>
<body background="images/bg2.gif">
   <?php
 include ("conndb.php");

if ($list_page == "")
	{
	$list_page = 10;}
	//ให้แสดงหน้าละ 20 ฉบับ
	/*** Connect ***/
	$objConnect = mysql_connect($hostname, $user, $password)or die("Error Connect to Database");
	$objDB = mysql_select_db($dbname);
	mysql_query("SET NAMES UTF8");
if ($order == "" )
	{ 	$order = "DESC" ;}
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

$sql = "select id from $tblname where $type like '%$search%' ";
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
$strSQL2 = "select * from $tblname where  $type like '%$search%' order by $sort $order limit $goto,$list_page";
$objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
$NRow = mysql_num_rows($objQuery2);

 $id = $goto;

?>


<div class="container md alert alert-primary  " >
 <h6 class = "prompt text-center">รายชื่อผู้ลงทะเบียน สมาคมข้าราชการท้องถิ่น <br>จังหวัดนครราชสีมา จังหวัดนครราชสีมา </h6>
</div>

			<!-- Main component for a primary marketing message or call to action -->
<div class="container">

  <div class= "row alert bg-dark" >


 &nbsp;&nbsp;&nbsp;

 <form id = "loginform" class="form-inline mb-1" method="post"  action="index_4.php" ">
<div class="input-group">
<input type="hidden" name="type" value ="name">
  <input type="text" class="form-control prompt" placeholder="ใส่คำค้นหา"  name="search" size="10" arial-describedby ="button-addon4" value =<?php echo $search	;?> >
  <div class="input-group-append" id="button-addon4">
        <button class="btn btn-outline-secondary" type="submit"><i class="fa fa-search" arial-hidden="true"></i></button>

  </div>
</div>
</form>

	 &nbsp;&nbsp;&nbsp;
  <a href = "#" class="badge badge-dark badge-sm prompt" role = "badge" >Hi :  <?echo  $who ;	?></a> &nbsp;

  <a href = "index_4.php?add_data=add" class="badge badge-success badge-sm  prompt" role = "badge" >เพิ่มไฟล์</a>&nbsp;

  <a href = "to_logout.php" class="badge badge-warning badge-sm  prompt" role = "badge" >Logout</a>

</div>

<?
// link สร้างฟรอม เพื่อบันทึกข้อมูลผู้ลงทะเบียนใหม่
 if ($add_data == 'add'){

$day_regis = ($end_y."".$end_m."".$end_d."".$end_h."".$end_M);

?>



<form name="form1" method="post" action="post_add_index_4.php">
<table class="table table-dark table-striped">
    <tr align="center">
      <td ><div align="right">
      <font class = "prompt text-secondary" size="2">

	  อปท.
	  </font></div></td>
      <td width="70%" ><div align="left"><font color="red" face="Arial, Helvetica, sans-serif">
        <input type="text" class = "prompt fform-control form-control-sm" name="abt"
		 size="20" >
      </font></div></td>
    </tr>
    <tr align="center">
      <td ><div align="right">
      <font class = "prompt text-secondary" size="2">
	  อำเภอ</font></div></td>
      <td width="60%" ><div align="left">
      <font class = "prompt text-secondary" size="1">
         <select class="prompt custom-select my-1 mr-sm-2"
		 name="amper"  id="amper">
          <option value="เมืองนครราชสีมา">เมืองนครราชสีมา</option>
          <option value="ครบุรี">ครบุรี</option>
          <option value="เสิงสาง">เสิงสาง</option>
          <option value="คง">คง</option>
          <option value="บ้านเหลื่อม">บ้านเหลื่อม</option>
          <option value="จักราช">จักราช</option>
          <option value="โชคชัย">โชคชัย</option>
          <option value="หนองบุญมาก">หนองบุญมาก</option>
          <option value="ด่านขุนทด">ด่านขุนทด</option>
          <option value="เทพารักษ์">เทพารักษ์</option>
          <option value="โนนไทย">โนนไทย</option>
          <option value="พระทองคำ">พระทองคำ</option>
          <option value="ขามสะแกแสง">ขามสะแกแสง</option>
          <option value="โนนสูง">โนนสูง</option>
          <option value="บัวใหญ่">บัวใหญ่</option>
          <option value="สีดา">สีดา</option>
          <option value="บัวลาย">บัวลาย</option>
          <option value="แก้งสนามนาง">แก้งสนามนาง</option>
          <option value="ประทาย">ประทาย</option>
          <option value="โนนแดง">โนนแดง</option>
          <option value="ปักธงชัย">ปักธงชัย</option>
          <option value="วังน้ำเขียว">วังน้ำเขียว</option>
          <option value="พิมาย">พิมาย</option>
          <option value="ห้วยแถลง">ห้วยแถลง</option>
          <option value="สูงเนิน">สูงเนิน</option>
          <option value="ขามทะเลสอ">ขามทะเลสอ</option>
          <option value="สีคิ้ว">สีคิ้ว</option>
          <option value="ปากช่อง">ปากช่อง</option>
          <option value="ชุมพวง">ชุมพวง</option>
          <option value="เมืองยาง">เมืองยาง</option>
          <option value="ลำทะเมนชัย">ลำทะเมนชัย</option>
          <option value="เฉลิมพระเกียรติ">เฉลิมพระเกียรติ</option>
        </select>
      </font></div></td>
    </tr>
    <tr align="center">
      <td width="30%" ><div align="right">
	  <font class = "prompt text-secondary" size="2">
	  ชื่อ-นามสกุล</font></div></td>
      <td ><div align="left">
      <font class = "prompt text-secondary" size="1">
        <input type="text" class = "prompt fform-control form-control-sm" name="name"  size="20">
      </font></div></td>
    </tr>
    <tr align="center">
      <td width="30%" ><div align="right">
      <font class = "prompt text-secondary" size="2">
        ตำแหน่ง
    </font></div></td>
      <td >
	  <div align="left">
	  <input type="text" class = "prompt fform-control form-control-sm" name="abt_admin"  size="20">
       </div></td>
    </tr>
    <tr>
      <td height="24" ><div align="right">
      <font class = "prompt text-secondary" size="2">
	            เบอร์โทร :
				</font></div></td>
      <td align="center" >
        <div align="left">
          <input name="t_per" type="text" class = "prompt fform-control form-control-sm" value="&nbsp;"  size="10" maxlength="15">

        </div></td>
    </tr>
    <tr>
      <td height="24" ><div align="right">
      <font class = "prompt text-secondary" size="2">
		ศาสนา</font></div></td>
      <td align="left" >
    <input name="religious" type="text" class = "prompt fform-control form-control-sm" value="พุทธ"  size="10">


	</td>
    </tr>


      </tr>
    <tr align="center">
      <td height="15" >&nbsp;</td>
      <td ><div align="left">
	  <button class="btn btn-outline-warning btn-rounded btn-sm my-0 prompt" type="submit">บันทึกข้อมูล</button>

        </div></td>
    </tr>
  </table>
</form>






<?
// end if_add_data
}

?>



<?
include ("conndb.php");
//$tblname4 = "mr_index";	//ชื่อตาราง
	/*** Connect ***/
	$objConnect = mysql_connect($hostname, $user, $password)or die("Error Connect to Database");
	$objDB = mysql_select_db($dbname);
     mysql_query("SET NAMES UTF8");
// คำสั่ง SQL และสั่งให้ทำงาน

$strSQL4 = "select * from $tblname order by id ";	// กำหนดคำสั่ง SQL เพื่อแสดงข้อมูล
$objQuery4= mysql_query($strSQL4) or die ("Error Query [".$strSQL4."]");


?>

<div class="container">
<!-- Static navbar -->
<nav class="navbar navbar-expand-md navbar-light bg-light btco-hover-menu">

<a class='nav-link prompt' href ='index_4.php'>ทั้งหมด</a>


<a class="navbar-brand prompt" href="#">

 รายอำเภอ
</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>
<div class="collapse navbar-collapse" id="navbarNavDropdown">
    	<ul class="navbar-nav">

<li class="nav-item active">

<a class='nav-link prompt' href ='index_4.php'>ทั้งหมด</a>

</li>


<li class="nav-item">
					 <a class="nav-link dropdown-toggle prompt" href="https://bootstrapthemes.co" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

				อำเภอ ที่ 1-12

       </a>
					<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
				<?php
        //เรียกข้อมูล 12 อำเภอแรก
				$strSQL4 = "select * from amper order by id
        limit 12 ";

        // กำหนดคำสั่ง SQL เพื่อแสดงข้อมูล
				$objQuery4= mysql_query($strSQL4) or die ("Error Query [".$strSQL4."]");

				         $i=1;
				        	while($objResult4 = mysql_fetch_array($objQuery4))

							{

							echo "\t <li>
              <a class='dropdown-item prompt' href='index_4.php?type=amper&search=$objResult4[name]'
							>
									 $objResult4[name]</a></li> \n";
						$i++;
							}
				?>

				 </ul>
</li>

<li class="nav-item">
			<a class="nav-link dropdown-toggle prompt" href="https://bootstrapthemes.co" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

      อำเภอ ที่ 13-24

    </a>
			<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
				<?php

				$strSQL4 = "select * from amper order by id
        limit 12,12 ";
				// กำหนดคำสั่ง SQL เพื่อแสดงข้อมูล  ทีละ 10 record
				$objQuery4= mysql_query($strSQL4) or die ("Error Query [".$strSQL4."]");

				            $i=1;
				        	while($objResult4 = mysql_fetch_array($objQuery4))

							{

							echo "\t <li>
              <a class='dropdown-item prompt' href='index_4.php?type=amper&search=$objResult4[name]'
							>
									 $objResult4[name]</a></li> \n";
						    $i++;
							}
				?>

			</ul>
</li>


<li class="nav-item">
			<a class="nav-link dropdown-toggle prompt" href="https://bootstrapthemes.co" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			อำเภอ ที่ 25-32

    </a>
			<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
				<?php

				$strSQL4 = "select * from amper order by id
        limit 24,10 ";
				// กำหนดคำสั่ง SQL เพื่อแสดงข้อมูล  ทีละ 10 record
				$objQuery4= mysql_query($strSQL4) or die ("Error Query [".$strSQL4."]");

				            $i=1;
				        	while($objResult4 = mysql_fetch_array($objQuery4))

							{

							echo "\t <li>
              <a class='dropdown-item prompt' href='index_4.php?type=amper&search=$objResult4[name]'
							>
									 $objResult4[name]</a></li> \n";
						    $i++;
              }
				?>

			</ul>
		</li>




	</ul>

	</ul>
  </div>
	</nav>
</div>



<div class="btn-group btn-group-sm">
<?
		// สร้าง link <<BACK เพื่อไปหน้าก่อน-หน้าถัดไป
		// ถ้าหน้าปัจจุบัน($page)มากกว่า 1 และ(&&) หน้าปัจจุบัน น้อยกว่าหรือเท่า จำนวนหน้าทั้งหมด($totalpage) ให้แสดง Link <<BACK
		 if($page>1 && $page<=$totalpage) {
		 $prevpage = $page-1;
		 echo
		 "<button type='button' class='btn btn-outline-warning btn-rounded btn-sm my-0 prompt'>
		 <a href ='index_4.php?search=$search&sort=$sort&type=$type&order=$order&page=$prevpage'>
			<< BACK
		 </a></button>";
	 }
	 else {
		 echo
	 // ปุ่ม <<BACK  Disable
		 "<button type='button' class='btn btn-outline-warning btn-rounded btn-sm my-0 prompt'>
		 << BACK
		 </button>";
	 }
 // ถ้าจำนวนหน้าทั้งหมดมากกว่า  5 ให้แสดงหน้าที่ 1-3
 if ($totalpage>=1){
	 // สำหรับ $lowpage น้อยกว่าหน้าปัจจุบัน และ $lowpage น้อยกว่า 4 ให้แสดง
			for ($lowpage=1 ; $lowpage<$page && $lowpage<=4 ; $lowpage++){
			 echo "\t<button type='button' class='btn btn-outline-warning btn-rounded btn-sm my-0 prompt'><a href ='index_4.php?search=$search&sort=$sort&type=$type&order=$order&page=$lowpage'>$lowpage</a></button> \n";
			}
			if ($page<=5){
			 echo "\t<button type='button' class='btn  btn-outline-danger  btn-sm my-0 prompt'>$page</button> \n";
			}

			//&&$totalpage>=$page+3
			if ($page>=6){
				echo "...";
				for ($lowpage= $page-2 ; $lowpage<$page ; $lowpage++){
				 echo "\t<button type='button' class='btn btn-outline-warning btn-rounded btn-sm my-0 prompt'><a href ='index_4.php?search=$search&sort=$sort&type=$type&order=$order&page=$lowpage'>$lowpage</a></button> \n";
			 }
				echo "\t<button type='button' class='btn  btn-outline-danger  btn-sm my-0 prompt'>$page</button> \n";
						}
		for ($lowpage=$page+1 ; $lowpage<=$page+3 &&$lowpage<=$totalpage ; $lowpage++){
			 echo "\t<button type='button' class='btn btn-outline-warning btn-rounded btn-sm my-0 prompt'><a href ='index_4.php?search=$search&sort=$sort&type=$type&order=$order&page=$lowpage'>$lowpage</a></button> \n";
			}
			if($totalpage>$page+3){
		 echo "...";}
			}
/* link สามหน้าสุดท้าย หายไปเมื่อหน้าปัจจุบันใกล้เข้ามา  */
	 $M = $totalpage -3;
	 if ($totalpage>=$page+5){
	 for($l=$M+1 ; $l<=$totalpage ; $l++) {
		 echo "\t<button type='button' class='btn btn-outline-warning btn-rounded btn-sm my-0 prompt'><a href ='index_4.php?search=$search&sort=$sort&type=$type&order=$order&page=$l'>$l</button>\n ";
	 }
	 }
	 if($page!=$totalpage) {
		 $nextpage = $page+1;
		 echo "\t<button type='button' class='btn btn-outline-warning btn-rounded btn-sm my-0 prompt'><a href ='index_4.php?search=$search&sort=$sort&type=$type&order=$order&page=$nextpage'>NEXT >> </a></button>\n";
	 }
			 else {
			echo " <button type='button' class='btn btn-outline-warning btn-rounded btn-sm my-0 prompt'>NEXT >> </button> ";
				}

	 ?>

</div>




<table class="table table-dark table-striped prompt">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">ชื่อ/ตำแหน่ง</th>
      <th scope="col">
	<a href ="index_4.php?search=<?=$search;?>&sort=genelation&type=<?=$type;?>&order=DESC&page=<?=$page;?>">
	  หน่วยงาน
	</a>
	  </th>

    </tr>
  </thead>

<?
//แสดงเอกสารเป็นรายการพร้อม Link ไปยังไฟล์ pdf
		$k=1;

		while($objResult = mysql_fetch_array($objQuery2))
		{
// ทำ Background colour สลับสี
		$bgc = ($bgc=="row alert alert-dark prompt") ? "row alert alert-success prompt" : "row alert alert-dark prompt";
	    $id++;
		//
		?>


<tbody>
    <tr class = "table prompt text-primary">
      <th scope="row"> <? echo "$id.";  ?></th>
	  <td class = "prompt text-primary " size="3">
	  <font class = "prompt text-primary " size="3">
	  <? echo $objResult["name"];?> </font><br>
	  <font class = "prompt text-secondary " size="1">
	  <? echo $objResult["abt_admin"];?></font>
	  <br> <font class = "prompt text-danger " size="1">
	  <? echo $objResult["genelation"];?> </font>
	  </td>

<td>

<a href =
    	"index_4.php?edit_id=<?=$objResult["id"];?>&to_edit=1&search=<?echo $search;?>&sort=<?echo $sort;?>&type=<?echo $type ;?>&order=<?echo$order;?>&page=<?echo$page; ?>"
    	class="badge badge-warning badge-sm prompt" role = "badge" >

แก้ไข

      </a>
    &nbsp;&nbsp;

<a href =
	"delete_index_4.php?id=<?=$objResult["id"];?>&delpdf=del&delpic=del&search=<? echo $search;?>"
	class="badge badge-danger badge-sm prompt" role = "badge" >

ลบ

  </a>


</td>



<? if ($edit_id == $objResult["id"])

	{

?>
<tr>
    <th colspan="2">

<div class="container-fluid  ">
	<div class="row ">
		<div class="col-md-10  ">


    <?
      $objConnect = mysql_connect($hostname, $user, $password)
      or die("Error Connect to Database");
    $objDB = mysql_select_db($dbname);
	$strSQL_edit = "SELECT * FROM $tblname where id = '$objResult[id]'";
	mysql_query("SET NAMES UTF8");
	// กำหนดคำสั่ง SQL เพื่อแสดงข้อมูล
    $objQuery_edit = mysql_query($strSQL_edit)
    or die ("Error Query [".$strSQL_edit."]");

	$k=1;

	while($objResult_edit = mysql_fetch_array($objQuery_edit))
	{


	?>


<form name="form1" method="post"
    enctype="multipart/form-data"
    action="post_login_edit_index_4.php"
    <div class="form-group">
<input type="hidden" name="id" value ="<?=$objResult_edit["id"];?>">

<table class = "tabel-dark kanitdec text-primary"  >
    <tr>
      <td  ><div align="right">
	  	  <font class = "kanitdec text-primary" >
	 	  ชื่อ
          </font></div>
	  </td>
      <td  >
	  <div align="left">
	  <input type="text" class = "prompt fform-control form-control-sm" name="name"
	   value="<? echo $objResult_edit["name"] ;?>

       "size="20">

       </div>
	</td>
    </tr>
 <tr align="center">
      <td  >
	  <div align="right">
      <font class = "kanitdec text-primary" >
	 	  ตำแหน่ง
     </font>
	  </div>
	  </td>
      <td >
        <div align="left">

        <input type="text" class = "prompt fform-control form-control-sm" name="abt_admin"
	   value="<? echo $objResult_edit["abt_admin"] ;?>

       "size="20">


          </div>
	</td>
 </tr>

 <tr align="center">
      <td  >
	  <div align="right">
	  	  <font class = "kanitdec text-primary" >
	 	 อปท.
	  </font>
	  </div>
	  </td>
      <td ><div align="left">
	  <font color="red" face="Arial, Helvetica, sans-serif">

      <input type="text" class = "prompt fform-control form-control-sm" name="abt"
	   value="<? echo $objResult_edit["abt"] ;?>

       "size="20">



      </font>
          </div>
	</td>
 </tr>


 <tr align="center">
      <td  >
	  <div align="right">
	  	  <font class = "kanitdec text-primary" >
	 	อำเภอ :
	  </font>
	  </div>
	  </td>
      <td  ><div align="left">
	  <font color="red" face="Arial, Helvetica, sans-serif">

      <input type="text" class = "prompt fform-control form-control-sm" name="amper"
	   value="<? echo $objResult_edit["amper"] ;?>

       "size="20">



      </font>
          </div>
	</td>
 </tr>


 <tr align="center">
      <td >
	  <div align="right">
	  	  <font class = "kanitdec text-primary" >
	 	มือถือ
	  </font>
	  </div>
	  </td>
      <td ><div align="left">
	  <font color="red" face="Arial, Helvetica, sans-serif">

      <input type="text" class = "prompt fform-control form-control-sm" name="t_per"
	   value="<? echo $objResult_edit["t_per"] ;?>

       "size="10">



       </font>
          </div>
	</td>
 </tr>


    <tr align="center">
      <td  ><div align="right"></div></td>
      <td ><div align="left">
        <button class="btn btn-outline-warning btn-rounded btn-sm my-0 prompt" type="submit">แก้ไขข้อมูล</button>
        </div>
		</td>
    </tr>
  </table>



</form>

  <?
  	$k++;

	}
	?>

</div>
</th>
<?
   //end if สำหรับแสดงแก้ไขข้อมูลรายบุคคล
    }
?>

 <?
  	$k++;

	}
	?>
</div>
</div>
</div>

</table>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

        <script src="../bootstrap4_4_1/js/bootstrap-4-hover-navbar.js"></script>


</body>
</html>
