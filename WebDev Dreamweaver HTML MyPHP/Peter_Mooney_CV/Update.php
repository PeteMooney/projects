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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE feedback SET Name=%s, Email=%s, Subject=%s, Message=%s, `Date`=%s WHERE ID=%s",
                       GetSQLValueString($_POST['Name'], "text"),
                       GetSQLValueString($_POST['Email'], "text"),
                       GetSQLValueString($_POST['Subject'], "text"),
                       GetSQLValueString($_POST['Message'], "text"),
                       GetSQLValueString($_POST['Date'], "date"),
                       GetSQLValueString($_POST['ID'], "int"));

  mysql_select_db($database_test, $test);
  $Result1 = mysql_query($updateSQL, $test) or die(mysql_error());

  $updateGoTo = "sql_home.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_update = "-1";
if (isset($_GET['ID'])) {
  $colname_update = $_GET['ID'];
}
mysql_select_db($database_test, $test);
$query_update = sprintf("SELECT * FROM feedback WHERE ID = %s", GetSQLValueString($colname_update, "int"));
$update = mysql_query($query_update, $test) or die(mysql_error());
$row_update = mysql_fetch_assoc($update);
$totalRows_update = mysql_num_rows($update);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/index.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Approved</title>
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
      <h2 align="center" id="Approved">Update  Page.</h2>
      <p align="center" id="approved">&nbsp;</p>
      <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
        <table align="center">
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">ID:</td>
            <td><?php echo $row_update['ID']; ?></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">Name:</td>
            <td><input type="text" name="Name" value="<?php echo htmlentities($row_update['Name'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">Email:</td>
            <td><input type="text" name="Email" value="<?php echo htmlentities($row_update['Email'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">Subject:</td>
            <td><input type="text" name="Subject" value="<?php echo htmlentities($row_update['Subject'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">Message:</td>
            <td><input type="text" name="Message" value="<?php echo htmlentities($row_update['Message'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">Date:</td>
            <td><input type="text" name="Date" value="<?php echo htmlentities($row_update['Date'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">&nbsp;</td>
            <td><input type="submit" value="Update record" /></td>
          </tr>
        </table>
        <input type="hidden" name="MM_update" value="form1" />
        <input type="hidden" name="ID" value="<?php echo $row_update['ID']; ?>" />
      </form>
      <p>&nbsp;</p>
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
mysql_free_result($update);
?>
