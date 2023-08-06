
 <?php
//กำหนดตัวแปรเพื่อนำไปใช้งาน
 include ("conndb.php"); 
//Include("../thai.inc");	//แทรกไฟล์เพื่อใช้อาร์เรย์ที่เกี่ยวกับภาษาไทย

// เริ่มติดต่อฐานข้อมูล
mysql_connect($hostname, $user, $password) or die("ติดต่อฐานข้อมูลไม่ได้");

// เลือกฐานข้อมูล
mysql_select_db($dbname) or die("เลือกฐานข้อมูลไม่ได้");

//setlocale("LC_TIME","th");	//ใช้เวลาแบบไทย (ดูตัวอย่างในบทที่ 7)


// คำสั่ง SQL และสั่งให้ทำงาน
$sql = "delete from  $tblname   where id = $id ";	// กำหนดคำสั่ง SQL เพื่อเพิ่มข้อมูล
$result = mysql_db_query($dbname, $sql);
if(!$result){
		echo “ไม่สามารถลบได้”;
}else{
 		echo “ลบได้สำเร็จ”;
}
// ปิดการติดต่อฐานข้อมูล

?>
<body>

		<center>
		<table width=60% border=1 bordercolor=#ff69b4 bgcolor=#f0ffff cellpadding=2 cellspacing=0>
		<tr><td align=center>
		<font size=2 face='MS Sans Serif'>
		<font size=3 color=red><b>ได้รับข้อมูลแล้วครับ</b></font><br><br>
        หากกลับไปหน้าแรกแล้วข้อมูลของคุณยังไม่ขึ้นให้ลองกดปุ่ม Refresh/Reload 
        ครับ </font></td>
    </tr></table>
		<br><hr color=FF1493 width=600>
	<META HTTP-EQUIV="Content-Type" content="text/html; charset=Windows-874">
	<META HTTP-EQUIV="REFRESH" CONTENT="3;URL=add_man.php">

		</center>
		
		
		</body>