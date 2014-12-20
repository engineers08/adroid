<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lek Property 1.0</title>
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="stylesheet" href="css/jquery.mobile-1.4.5.min.css">
	<script src="js/jquery-2.1.3.min.js"></script>
	<script src="js/jquery.mobile-1.4.5.min.js"></script>
</head>
<body>
<section id="calculate" data-role="page">
	<header data-role="header"><center>คำนวณราคาซื้ออสังหาริมทรัพย์<br>บ้าน คอนโด อาคารพาณิชย์ เพื่อปล่อยเช่า<br>Property calculate cost</center></header>
<?php
require_once('validate.php');
if($_POST['offer']!=''){
	if($_POST['income']!=''){
		if($_POST['expenses']!=''){
			if($_POST['profit']!=''){
				if(fnValidateNumber($_POST['profit'])){
					$income_y = $_POST['income']*12;
					$expenses_y = $_POST['expenses']*12;
					$purchase = (($income_y-$expenses_y)*100)/$_POST['profit'];
					$offset = ($purchase*10)/100;
					$offset_minus = number_format(($purchase-$offset),2);
					$offset_plus = number_format(($purchase+$offset),2);
					$total=0;
					$str='';
					if($expenses_y>=$income_y){
						echo "<u><b>ผลการคำนวณ (Result)</b></u> : <br>";
						echo "ข้อเสนอแนะ (Suggestion) : <br><span style='color:red;'>ราคาแพง ไม่สมควรซื้อ ...That is expensive!!</span><br>";
						echo "<a href='index.html' data-role='button'>Back to home</a>";
					}
					else{
						if($_POST['offer']>$purchase){
							$total = (($_POST['offer']-$purchase)*$purchase)/100;
							if($total>=10){
								$str="<span style='color:red;'>ราคาแพง ไม่สมควรซื้อ...That is expensive!!</span>";
							}
						}
						if($_POST['offer']<$purchase){
							$str="<span style='color:green;'>ราคาถูก สมควรซื้อ...That is cheap!!</span>";
						}
						echo "<u><b>ผลการคำนวณ (Result)</b></u> : <br>ราคาที่ควรซื้อ (Suitable Cost)  : <span style='color:blue;'>".number_format( $purchase , 2 )." baht</span><br>";
						echo "ช่วงราคาที่เหมาะสม (Range of suitable Cost) : <span style='color:orange;'>".$offset_minus." - ".$offset_plus." baht</span><br>";
						echo "ข้อเสนอแนะ (Suggestion) : <br>".$str."<br>";
						echo "<a href='index.html' data-role='button'>Back to home</a>";
					}
				}
				else{
					echo "<span style='color:red;'>กำไรที่ต้องการ หรือ อัตราดอกเบี้ยธนาคาร ต้องเป็นตัวเลขหรือทศนิยมเท่านั้น!!</span><br>";
					echo "<a href='index.html' data-role='button'>Back to home</a>";
				}
			}
			else{
				echo "<span style='color:red;'>กำไรที่ต้องการ หรือ อัตราดอกเบี้ยธนาคาร ต้องไม่เป็นค่าว่าง!!</span><br>";
				echo "<a href='index.html' data-role='button'>Back to home</a>";
			}
		}
		else{
			echo "<span style='color:red;'>รายจ่าย/เดือน ต้องไม่เป็นค่าว่าง!!</span><br>";
			echo "<a href='index.html' data-role='button'>Back to home</a>";
		}
	}
	else{
		echo "<span style='color:red;'>รายรับ/เดือน ต้องไม่เป็นค่าว่าง!!</span><br>";
		echo "<a href='index.html' data-role='button'>Back to home</a>";
	}
}
else{
	echo "<span style='color:red;'>ราคาขาย ต้องไม่เป็นค่าว่าง!!</span><br>";
	echo "<a href='index.html' data-role='button'>Back to home</a>";
}
?>
</section><!-- /page -->
</body>
</html>
