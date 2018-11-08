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
<title>Education</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<script src="SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
<link href="SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />
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
      <h1>Education : </h1>
      <div id="TabbedPanels1" class="TabbedPanels">
        <ul class="TabbedPanelsTabGroup">
          <li class="TabbedPanelsTab" tabindex="0">H.Dip</li>
          <li class="TabbedPanelsTab" tabindex="0">Management</li>
          <li class="TabbedPanelsTab" tabindex="0">Additional</li>
        </ul>
        <div class="TabbedPanelsContentGroup">
          <div class="TabbedPanelsContent">
            <h1>H. Dip In Computer Science</h1>
            <h2>Software Development</h2>
            <h3>School of Creative Arts &amp; Media.</h3>
            <p>Dundalk Institute of Technology.</p>
            <h2>Core Computing. <span class="smaller">(Java)</span></h2>
            <h2>Web Development. <span class="smaller">(Dreamweaver CSS 5.5)</span></h2>
            <h2>Database Management Systems. <span class="smaller">(MySql)</span></h2>
            <h2>Software Engineering <span class="smaller">(Traditional &amp; Agile Methods)</span></h2>
            <h2>Software Project Management.<span class="smaller"> (Computer Mediated Communications)</span></h2>
            <h2>&nbsp;</h2>
          </div>
          <div class="TabbedPanelsContent">
            <p>&nbsp;</p>
            <h1 dir="ltr" id="internal-source-marker_0.27883480127935656">1998-1999 – Bachelor of Arts (Honours) in Management </h1>
            <h2 dir="ltr">Irish Management Institute, Dublin (Affiliated with Trinity College)</h2>
            <h3 dir="ltr">Dundalk Institute of Technology (DKIT)</h3>
<h2 dir="ltr">1996-1998 – Nat Diploma in Business Management Studies (Irish Management Institute) </h2>
            <br />
            <h2 dir="ltr">1994-1996 – Certificate in Supervisory Management (Irish Management Institute)</h2>
            <p dir="ltr">Dundalk Institute of Technology (DKIT)</p>
<p dir="ltr">&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
          </div>
          <div class="TabbedPanelsContent">
            <h2 dir="ltr" id="internal-source-marker_0.6887645750840992">October 2011- Present – Greenbelt in Lean Six Sigma </h2>
            <p dir="ltr">Fás Training Centre, Dundalk, Co. Louth</p>
            <br />
            <h2 dir="ltr">October 2011- Present – Social Media &amp; Internet Marketing</h2>
            <p dir="ltr">Dundalk Institute of Technology (DKIT)</p>
            <br />
            <h2 dir="ltr">2008 – Certified Payroll Technician- Irish Payroll Association (IPASS)</h2>
            <p dir="ltr">Dundalk Institute of Technology (DKIT)</p>
            <br />
            <h2 dir="ltr">2008 – Certified Bookkeeper- Irish Bookkeepers Association (IBA)</h2>
            <p dir="ltr">Dundalk Institute of Technology (DKIT)</p>
            <br />
            <h2 dir="ltr">2000 – Certificate in Personnel Practice- Chartered Institute of Personnel Development (CIPD)</h2>
            <p dir="ltr">Dundalk Institute of Technology (DKIT)</p>
            <p>&nbsp;</p>
          </div>
        </div>
      </div>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <script type="text/javascript">
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
      </script>
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
