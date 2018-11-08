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

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_sql_home_php = 10;
$pageNum_sql_home_php = 0;
if (isset($_GET['pageNum_sql_home_php'])) {
  $pageNum_sql_home_php = $_GET['pageNum_sql_home_php'];
}
$startRow_sql_home_php = $pageNum_sql_home_php * $maxRows_sql_home_php;

mysql_select_db($database_test, $test);
$query_sql_home_php = "SELECT ID, Name, Subject FROM feedback ORDER BY Name ASC";
$query_limit_sql_home_php = sprintf("%s LIMIT %d, %d", $query_sql_home_php, $startRow_sql_home_php, $maxRows_sql_home_php);
$sql_home_php = mysql_query($query_limit_sql_home_php, $test) or die(mysql_error());
$row_sql_home_php = mysql_fetch_assoc($sql_home_php);

if (isset($_GET['totalRows_sql_home_php'])) {
  $totalRows_sql_home_php = $_GET['totalRows_sql_home_php'];
} else {
  $all_sql_home_php = mysql_query($query_sql_home_php);
  $totalRows_sql_home_php = mysql_num_rows($all_sql_home_php);
}
$totalPages_sql_home_php = ceil($totalRows_sql_home_php/$maxRows_sql_home_php)-1;

$queryString_sql_home_php = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_sql_home_php") == false && 
        stristr($param, "totalRows_sql_home_php") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_sql_home_php = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_sql_home_php = sprintf("&totalRows_sql_home_php=%d%s", $totalRows_sql_home_php, $queryString_sql_home_php);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/index.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>sql_home</title>
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
      <h2 align="center">SQL Home Page</h2>
      <p align="center">&nbsp;</p>
      <div align="center">
        <table border="1">
          <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Subject</td>
            <td>Update</td>
            <td>Delete</td>
          </tr>
          <?php do { ?>
            <tr>
              <td><?php echo $row_sql_home_php['ID']; ?></td>
              <td><?php echo $row_sql_home_php['Name']; ?></td>
              <td><?php echo $row_sql_home_php['Subject']; ?></td>
              <td><a href="update.php?ID=<?php echo $row_sql_home_php['ID']; ?>">Approve</a></td>
              <td><a href="delete.php?ID=<?php echo $row_sql_home_php['ID']; ?>">Delete</a></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <?php } while ($row_sql_home_php = mysql_fetch_assoc($sql_home_php)); ?>
        </table>
      </div>
      <p>&nbsp;</p>
      <p id="sql_home">&nbsp;      
      </p><div align="center">
        <table border="0">
          <tr>
            <td><?php if ($pageNum_sql_home_php > 0) { // Show if not first page ?>
                <a href="<?php printf("%s?pageNum_sql_home_php=%d%s", $currentPage, 0, $queryString_sql_home_php); ?>">First</a>
              <?php } // Show if not first page ?></td>
            <td><?php if ($pageNum_sql_home_php > 0) { // Show if not first page ?>
                <a href="<?php printf("%s?pageNum_sql_home_php=%d%s", $currentPage, max(0, $pageNum_sql_home_php - 1), $queryString_sql_home_php); ?>">Previous</a>
              <?php } // Show if not first page ?></td>
            <td><?php if ($pageNum_sql_home_php < $totalPages_sql_home_php) { // Show if not last page ?>
                <a href="<?php printf("%s?pageNum_sql_home_php=%d%s", $currentPage, min($totalPages_sql_home_php, $pageNum_sql_home_php + 1), $queryString_sql_home_php); ?>">Next</a>
              <?php } // Show if not last page ?></td>
            <td><?php if ($pageNum_sql_home_php < $totalPages_sql_home_php) { // Show if not last page ?>
                <a href="<?php printf("%s?pageNum_sql_home_php=%d%s", $currentPage, $totalPages_sql_home_php, $queryString_sql_home_php); ?>">Last</a>
              <?php } // Show if not last page ?></td>
          </tr>
        </table>
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
mysql_free_result($sql_home_php);
?>
