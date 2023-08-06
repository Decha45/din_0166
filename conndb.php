<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<meta http-equiv=Content-Type content="text/html; charset=windows-874">

<?

$hostname = "localhost";	//������ʵ�
$user = "pkorat_us";	//���ͼ����
$password = "sqdec298";	 //���ʼ�ҹ
$dbname = "pkorat_db";	//���Ͱҹ������
$tblname = "din_0166";

//$tblname = "d_pkorat";
//$tblname4 = "pdoc_index";
$conn = mysql_connect($hostname,$user,$password) or die ("ไม่สามารถติดต่อ Mysql ได้ในขณะนี้");
$db=mysql_select_db($dbname)or die("ไม่สามารถติดต่อ database ได้ในขณะนี้");
mysql_query("SET NAMES utf8");

//$conn = mysql_connect($host,$username,$password) or die ("�������ö�Դ��� Mysql ��㹢�й��");
//$db=mysql_select_db($dbname)or die("�������ö�Դ��� database ��㹢�й��");
//mysql_query("SET NAMES utf8");

//(4) ��駤�Ҩӹǹ�Ӷ�����˹��

?>
