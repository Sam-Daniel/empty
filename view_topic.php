<?php

$host="sql12.freesqldatabase.com"; // Host name 
$username="sql12218697"; // Mysql username 
$password="uJEXQMxpDw"; // Mysql password 
$db_name="sql12218697"; // Database name 
$tbl_name="forum_question"; // Table name 
// Connect to server and select databse.
$conn = mysqli_connect("$host", "$username", "$password")or die("cannot connect"); 
mysqli_select_db( $conn, $db_name)or die("cannot select DB");

// get value of id that sent from address bar 
$id=$_GET['id'];

$sql="SELECT * FROM $tbl_name WHERE id='$id'";
$result=mysqli_query($conn, $sql);
$rows=mysqli_fetch_array($result, MYSQLI_BOTH)
?>
<html>
<script src="https://www.w3schools.com/lib/w3.js"></script>

<body>

<div w3-include-html="head.html"></div> 

<script>
w3.includeHTML();
</script>

</body>
</html>
<BR>
<table width="1200" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td><table width="100%" border="0" cellpadding="3" cellspacing="1" bordercolor="1" bgcolor="#FFFFFF">
<tr>
<td bgcolor="#F8F7F1"><strong><? echo $rows['topic']; ?></strong></td>
</tr>

<tr>
<td bgcolor="#F8F7F1"><? echo $rows['detail']; ?></td>
</tr>

<tr>
<td bgcolor="#F8F7F1"><strong>By :</strong> <? echo $rows['name']; ?> <strong> </strong><? echo $rows['email'];?></td>
</tr>

<tr>
<td bgcolor="#F8F7F1"><strong> Date/time </strong><? echo $rows['datetime']; ?></td>
</tr>
</table></td>
</tr>
</table>
<BR>

<?php

$tbl_name2="forum_answer"; // Switch to table "forum_answer"

$sql2="SELECT * FROM $tbl_name2 WHERE question_id='$id'";
$result2=mysqli_query($conn, $sql2);

while($rows=mysqli_fetch_array($result2, MYSQLI_BOTH)){
?>

<table width="1200" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td><table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">

<tr>
<td bgcolor="#F8F7F1"><strong>Reply</strong></td>
<td bgcolor="#F8F7F1">:</td>
<td bgcolor="#F8F7F1"><? echo $rows['a_answer']; ?></td>
</tr>
<tr>
<td bgcolor="#F8F7F1"><strong>Date/Time</strong></td>
<td bgcolor="#F8F7F1">:</td>
<td bgcolor="#F8F7F1"><? echo $rows['a_datetime']; ?></td>
</tr>
</table></td>
</tr>
</table><br>

 

<?php
}

$sql3="SELECT view FROM $tbl_name WHERE id='$id'";
$result3=mysqli_query($conn, $sql3);

$rows=mysqli_fetch_array($result3, MYSQLI_BOTH);
$view=$rows['view'];

 

// if have no counter value set counter = 1
if(empty($view)){
$view=1;
$sql4="INSERT INTO $tbl_name(view) VALUES('$view') WHERE id='$id'";
$result4=mysqli_query($conn, $sql4);
}

 

// count more value*$addview=$view+1;
$sql5="update $tbl_name set view='$addview' WHERE id='$id'";
$result5=mysqli_query($conn, $sql5);

mysqli_close($conn);
?>


<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
</head>
<body>



  <div data-role="main" class="ui-content">
    <form>
      <fieldset data-role="collapsible">
        <legend>Reply to the post</legend>
          <BR>
<table width="1200" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form name="form1" method="post" action="add_answer.php">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">

<tr>
<td valign="top"><strong>Reply</strong></td>
<td valign="top">:</td>
<td><textarea name="a_answer" cols="120" rows="3" id="a_answer"></textarea></td>
</tr>
<tr>
<td>&nbsp;</td>
<td><input name="id" type="hidden" value="5"></td>
<td><input type="submit" name="Submit" value="Submit"> <input type="reset" name="Submit2" value="Reset"></td>
</tr>
</table>
</td>
</form>
</tr>
</table>

          
      
      </fieldset>
    </form>
  </div>
</div>

</body>
</html>

 <style>
 .button-1{
  right-padding: 5px;
  width:140px;
  height:40px;
  border:2px solid #34495e;
  background:#ffff;
  
  text-align:center;
  cursor:pointer;
  position:relative;
  box-sizing:border-box;
  overflow:hidden;
  margin:0 0 40px 0;
}

 </style>
