<?php
$host="sql12.freesqldatabase.com"; // Host name 
$username="sql12218697"; // Mysql username 
$password="uJEXQMxpDw"; // Mysql password 
$db_name="sql12218697"; // Database name 
$tbl_name="forum_answer"; // Table name 
// Connect to server and select databse.
$conn = mysqli_connect("$host", "$username", "$password")or die("cannot connect"); 
mysqli_select_db( $conn, $db_name)or die("cannot select DB");

// Get value of id that sent from hidden field 
$id=$_POST['id'];

// Find highest answer number. 
$sql="SELECT MAX(a_id) AS Maxa_id FROM $tbl_name WHERE question_id='$id'";
$result=mysqli_query($conn, $sql);
$rows=mysqli_fetch_array($result,MYSQLI_BOTH) or die("Error description: " . mysqli_error($conn));; 


// add + 1 to highest answer number and keep it in variable name "$Max_id". if there no answer yet set it = 1 
if ($rows) {
$Max_id = $rows['Maxa_id']+1;
}
else {
$Max_id = 1;
}


// get values that sent from form 
$a_name=$_POST['a_name'];
$a_email=$_POST['a_email'];
$a_answer=$_POST['a_answer']; 

$datetime=date("d/m/y H:i:s"); // create date and time


// Insert answer 
$sql2="INSERT INTO $tbl_name(question_id, a_id, a_name, a_email, a_answer, a_datetime)VALUES('$id', '$Max_id', '$a_name', '$a_email', '$a_answer', '$datetime')";
$result2=mysqli_query($conn, $sql2);

if($result2){
echo "Successful<BR>";
echo "<a href='view_topic.php?id=".$id."'>View your answer</a>";


// If added new answer, add value +1 in reply column 
$tbl_name2="forum_question";
$sql3="UPDATE $tbl_name2 SET reply='$Max_id' WHERE id='$id'";
$result3=mysqli_query($conn, $sql3);

}
else {
echo "ERROR";
}

// Close connection
mysqli_close($conn);
?>
