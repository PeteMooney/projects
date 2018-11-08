<?php require_once('Connections/test.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$maxRows_users_sql = 10;
$pageNum_users_sql = 0;
if (isset($_GET['pageNum_users_sql'])) {
  $pageNum_users_sql = $_GET['pageNum_users_sql'];
}
$startRow_users_sql = $pageNum_users_sql * $maxRows_users_sql;

mysql_select_db($database_test, $test);
$query_users_sql = "SELECT * FROM users";
$query_limit_users_sql = sprintf("%s LIMIT %d, %d", $query_users_sql, $startRow_users_sql, $maxRows_users_sql);
$users_sql = mysql_query($query_limit_users_sql, $test) or die(mysql_error());
$row_users_sql = mysql_fetch_assoc($users_sql);

if (isset($_GET['totalRows_users_sql'])) {
  $totalRows_users_sql = $_GET['totalRows_users_sql'];
} else {
  $all_users_sql = mysql_query($query_users_sql);
  $totalRows_users_sql = mysql_num_rows($all_users_sql);
}
$totalPages_users_sql = ceil($totalRows_users_sql/$maxRows_users_sql)-1;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/index.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Untitled Document</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
<link href="/Indes.dwt" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div class="container">
  <div class="header">
    <h1 align="center"><img src="Images/mooney.jpg" alt="" width="217" height="158" align="left" />Peter Mooney</h1>
    <h2 align="center">Curriculam Vitae</h2>
<p>&nbsp;</p>
<p>&nbsp;</p>
<h2>Virtue Alone Enobles.</h2>
  </div>
  <div class="sidebar1">
    <ul id="MenuBar1" class="MenuBarVertical">
<li><a href="Education.php">Education</a></li>
<li><a href="Employment.php">Employment</a></li>
<li><a href="Contact.php">Contact</a></li>
<li><a href="Attend_Interview.php">Interview</a></li>
<li><a href="About Me.php">About Me</a></li>
<li><a href="view_feedback.php">View Feedback</a></li>
    </ul>
  <!-- end .sidebar1 --> </div>
  <div class="content">
    
   

      <!-- end .content --><!-- InstanceBeginEditable name="EditRegion3" -->
      <h2 align="center">Show of Users.</h2>
      <form id="form1" name="form1" method="post" action="">
        <table border="1" class="MenuBarVertical">
          <tr>
            <td>ID</td>
            <td>Username</td>
            <td>Password</td>
            <td>Level</td>
            <td>First</td>
            <td>Last</td>
            <td>email</td>
          </tr>
          <?php do { ?>
            <tr>
              <td><?php echo $row_users_sql['ID']; ?></td>
              <td><?php echo $row_users_sql['Username']; ?></td>
              <td><?php echo $row_users_sql['Password']; ?></td>
              <td><?php echo $row_users_sql['Level']; ?></td>
              <td><?php echo $row_users_sql['First']; ?></td>
              <td><?php echo $row_users_sql['Last']; ?></td>
              <td><?php echo $row_users_sql['email']; ?></td>
            </tr>
            <?php } while ($row_users_sql = mysql_fetch_assoc($users_sql)); ?>
        </table>
<?php echo $row_users_sql['']; ?>
      </form>
      <p align="center">&nbsp;</p>
      <p align="center">&nbsp;</p>
      <p align="center">&nbsp;</p>
      <p align="center">&nbsp;</p>
      <div align="center"></div>
      <p>&nbsp;</p>
      <p>&nbsp;</p><div align="center"></div>
      </p>
      <!-- InstanceEndEditable -->
  </div>
  <div class="footer">
    <p>&nbsp;</p>
    <!-- end .footer --></div>
  <!-- end .container --></div>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgRight:"/SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($users_sql);
?>
