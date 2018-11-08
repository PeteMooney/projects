<?php require_once('Connections/test.php'); ?>
<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "About Me.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
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

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_see_feedback = 5;
$pageNum_see_feedback = 0;
if (isset($_GET['pageNum_see_feedback'])) {
  $pageNum_see_feedback = $_GET['pageNum_see_feedback'];
}
$startRow_see_feedback = $pageNum_see_feedback * $maxRows_see_feedback;

mysql_select_db($database_test, $test);
$query_see_feedback = "SELECT * FROM feedback ORDER BY Subject DESC";
$query_limit_see_feedback = sprintf("%s LIMIT %d, %d", $query_see_feedback, $startRow_see_feedback, $maxRows_see_feedback);
$see_feedback = mysql_query($query_limit_see_feedback, $test) or die(mysql_error());
$row_see_feedback = mysql_fetch_assoc($see_feedback);

if (isset($_GET['totalRows_see_feedback'])) {
  $totalRows_see_feedback = $_GET['totalRows_see_feedback'];
} else {
  $all_see_feedback = mysql_query($query_see_feedback);
  $totalRows_see_feedback = mysql_num_rows($all_see_feedback);
}
$totalPages_see_feedback = ceil($totalRows_see_feedback/$maxRows_see_feedback)-1;

$queryString_see_feedback = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_see_feedback") == false && 
        stristr($param, "totalRows_see_feedback") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_see_feedback = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_see_feedback = sprintf("&totalRows_see_feedback=%d%s", $totalRows_see_feedback, $queryString_see_feedback);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/index.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>View_Feedback</title>
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
      <h1 align="center" id="View_Feedback">View Feedback</h1>
      <p align="center">&nbsp;</p>
      <table border="1">
        <tr>
          <td>ID</td>
          <td>Name</td>
          <td>Email</td>
          <td>Subject</td>
          <td>Message</td>
          <td>Date</td>
        </tr>
        <?php do { ?>
          <tr>
            <td><?php echo $row_see_feedback['ID']; ?></td>
            <td><?php echo $row_see_feedback['Name']; ?></td>
            <td><?php echo $row_see_feedback['Email']; ?></td>
            <td><?php echo $row_see_feedback['Subject']; ?></td>
            <td><?php echo $row_see_feedback['Message']; ?></td>
            <td><?php echo $row_see_feedback['Date']; ?></td>
          </tr>
          <?php } while ($row_see_feedback = mysql_fetch_assoc($see_feedback)); ?>
      </table>
<p>&nbsp;</p>
<p>&nbsp;
<div align="center">
  <table border="0">
    <tr>
      <td><?php if ($pageNum_see_feedback > 0) { // Show if not first page ?>
          <a href="<?php printf("%s?pageNum_see_feedback=%d%s", $currentPage, 0, $queryString_see_feedback); ?>">First</a>
          <?php } // Show if not first page ?></td>
      <td><?php if ($pageNum_see_feedback > 0) { // Show if not first page ?>
          <a href="<?php printf("%s?pageNum_see_feedback=%d%s", $currentPage, max(0, $pageNum_see_feedback - 1), $queryString_see_feedback); ?>">Previous</a>
          <?php } // Show if not first page ?></td>
      <td><?php if ($pageNum_see_feedback < $totalPages_see_feedback) { // Show if not last page ?>
          <a href="<?php printf("%s?pageNum_see_feedback=%d%s", $currentPage, min($totalPages_see_feedback, $pageNum_see_feedback + 1), $queryString_see_feedback); ?>">Next</a>
          <?php } // Show if not last page ?></td>
      <td><?php if ($pageNum_see_feedback < $totalPages_see_feedback) { // Show if not last page ?>
          <a href="<?php printf("%s?pageNum_see_feedback=%d%s", $currentPage, $totalPages_see_feedback, $queryString_see_feedback); ?>">Last</a>
          <?php } // Show if not last page ?></td>
      </tr>
  </table>
  <form id="form1" name="form1" method="post" action="">
    <a href="<?php echo $logoutAction ?>">Logout</a>
  </form>
  <p>&nbsp;</p>
</div>
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
mysql_free_result($see_feedback);
?>
