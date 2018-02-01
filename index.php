<?php
 
$host="sql12.freesqldatabase.com"; // Host name 
$username="sql12218697"; // Mysql username 
$password="uJEXQMxpDw"; // Mysql password 
$db_name="sql12218697"; // Database name 
$tbl_name="forum_question"; // Table name 

// Connect to server and select databse.
$conn = mysqli_connect("$host", "$username", "$password")or die("cannot connect"); 
mysqli_select_db( $conn, $db_name)or die("cannot select DB");

$sql="SELECT * FROM $tbl_name ORDER BY id DESC";
// OREDER BY id DESC is order result by descending

$result=mysqli_query($conn, $sql);
?>

<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
  <header id="#top">
    <div class="row">
      <div class="large-4 column lpad">
        <div class="logo">
         <img src="http://www.t4consulting.uk/images/2016/05/06/zoho-crm.png" width="128" height="128"> 
          <span>Discussion </span>
         
        </div>
      </div>
      <div class="large-8 column ar lpad">
        <nav class="menu">
          <a href="#" class="current">Forum</a>
          <a href="#">Members</a>
          <a href="create_topic.php">New Post</a>
          <a href="#">Forum Actions</a>
          <a href="#">Calendar</a>
          <a href="#">My Profile</a>
          <a href="#">FAQ</a>
          <a href="#">Contact</a>
        </nav>     
      </div>
    </div>
  </header>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td width="6%" align="center" bgcolor="#E6E6E6"><strong>#</strong></td>
<td width="53%" align="center" bgcolor="#E6E6E6"><strong>Topic</strong></td>
<td width="15%" align="center" bgcolor="#E6E6E6"><strong>Views</strong></td>
<td width="13%" align="center" bgcolor="#E6E6E6"><strong>Replies</strong></td>
<td width="13%" align="center" bgcolor="#E6E6E6"><strong>Date/Time</strong></td>
</tr>

<?php



// Start looping table row
while($rows=mysqli_fetch_array($result, MYSQLI_BOTH)){
?>
<tr>
<td bgcolor="#FFFFFF"><? echo $rows['id']; ?></td>
<td bgcolor="#FFFFFF"><a href="view_topic.php?id=<? echo $rows['id']; ?>"><? echo $rows['topic']; ?></a><BR></td>
<td align="center" bgcolor="#FFFFFF"><? echo $rows['view']; ?></td>
<td align="center" bgcolor="#FFFFFF"><? echo $rows['reply']; ?></td>
<td align="center" bgcolor="#FFFFFF"><? echo $rows['datetime']; ?></td>
</tr>


<style>
@import url(https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Open+Sans+Condensed:300,700);
body {
  font-family: 'Open Sans', sans-serif;
}
header {
  background-image: url('https://image.ibb.co/ktRvzR/grey_wash_wall_2_X.png');
  margin: 0;
  border-bottom: 3px solid hsl(195, 73%, 58%);
}
a {
  display: inline-block;
  
  color: inherit;
  text-decoration: none;
}
.row.mt { margin-top: 1.25em; }
.row.mb { margin-bottom: 1.25em; }
.pad { padding: 15px; }
.spad { padding: 5px; }
.lpad { padding: 2px;}
.ar { text-align: right; }
.logo {
  color: hsl(0, 0%, 100%);
  font-size: 30px; 
  text-transform: ;
}
.logo span:first-child {
  font-weight: 400;
}
.logo span:last-child {
  color: hsl(0, 0%, 70%);
  font-weight: 300;
}
nav.menu a {
  margin: 0 19px 10px 10px;
  
  color: hsl(0, 0%, 70%);
  font-size: 12px;
  font-weight: 600;
  text-decoration: none;
}
nav.menu a:last-child {
    margin: px 0px 7px 70px;
    
}
nav.menu a.current {
  color: hsl(0, 0%, 100%);
}
.top-msg {
  border-bottom: 5px solid hsla(0, 0%, 90%, .3);
  
  color: hsl(0, 0%, 40%);
  font-size: 13px;
  font-weight: 300;
}

<?php
// Exit looping and close connection 
}
mysqli_close($conn);
?>

<tr>
<td colspan="5" align="right" bgcolor="#E6E6E6"><a href="create_topic.php"><strong>Create New Topic</strong> </a></td>
</tr>
</table>
