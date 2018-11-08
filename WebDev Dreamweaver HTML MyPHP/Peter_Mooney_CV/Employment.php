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
<title>Employment</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<script src="SpryAssets/SpryAccordion.js" type="text/javascript"></script>
<link href="SpryAssets/SpryAccordion.css" rel="stylesheet" type="text/css" />
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
      <h1>Employment :</h1>
      <div id="Accordion1" class="Accordion" tabindex="0">
        <div class="AccordionPanel">
          <div class="AccordionPanelTab">The Hotel Imperial. </div>
          <div class="AccordionPanelContent"><strong id="internal-source-marker_0.9931473399046808">
            <p dir="ltr">The Imperial Hotel is located in Dundalk centre is a modern hotel with a restaurant, bar and nightclub. </p>
            </strong>
            <p dir="ltr"><strong id="internal-source-marker_0.">September 2005- Present: 	Night Porter/Reception/Bar Tender </strong></p>
            <p dir="ltr"><strong id="internal-source-marker_0.">Hotel Imperial &amp; Parkes Bar/Silence Nightclub, Dundalk, Co. Louth</strong></p>
            <strong><br />
            <p dir="ltr">Duties: </p>
            <ul>
              <li>
                <p dir="ltr">Liaising with colleagues to guarantee the effective provisions of customer service.</p>
              </li>
              <li>
                <p dir="ltr">Organising staff and delegating tasks, ensuring all requirements are completed effectively and efficiently. </p>
              </li>
              <li>
                <p dir="ltr">Stocking, replenishing and general upkeep of premises. </p>
              </li>
              <li>
                <p dir="ltr">Communicating regularly with customers, management and co-workers. </p>
              </li>
              <li>
                <p dir="ltr">Working in accordance with lawful, hygiene, health and safety legislation and hotel policies at all times. </p>
              </li>
              <li>
                <p dir="ltr">Establishing and maintaining a rapport with customers.</p>
              </li>
              <li>
                <p dir="ltr">Set up a variety of in house advertising displays. </p>
              </li>
              <li>
                <p dir="ltr">Compiling and presenting daily and weekly status reports using HotSoft. </p>
              </li>
              <li>
                <p dir="ltr">Completing nightly account, health &amp; safety audits for the hotel and nightclub. </p>
              </li>
              <li>
                <p dir="ltr"> Greeting customers, ensuring the delivery of exceptional customer service.</p></li>
              <li>
                <p dir="ltr">Dealing with cash and a variety of customer transactions.</p>
              </li>
              <li>
                <p dir="ltr">Training and assisting new employees.   </p>
              </li>
              <li>
                <p dir="ltr">Working as part of dynamic team to ensure the standards of the hotel/nightclub and the level of service offered are kept to its highest. </p>
              </li>
            </ul>
          </strong></div>
        </div>
        <div class="AccordionPanel">
          <div class="AccordionPanelTab">Xexox Europe Ltd</div>
          <div class="AccordionPanelContent"><strong id="internal-source-marker_0.2">
            <p dir="ltr">Xerox Technology Park located in Dundalk on the north east coast is a manufacturing site producing toner, electronic components and high end printing machines for the Xerox European market.</p>
            <p dir="ltr"><strong id="internal-source-marker_0.5">October 1999- September 2005: 	Quality Team Coach </strong></p>
</strong>
            <p><strong>            </strong></p>
            <p dir="ltr"><strong id="internal-source-marker_0.3">Achievements:</strong></p>
            <ul>
              <li>
                <p dir="ltr"><strong id="internal-source-marker_0.3">Successfully assisted in the introduction a new production line which was completely defect free. </strong></p>
              </li>
            </ul>
            <ul>
              <li>
                <p dir="ltr"><strong id="internal-source-marker_0.3">Participated in a variety of training courses throughout employment including; Team Leadership, Coaching Skills, Project Management, Quality Management, Yellow Belt in Lean Six Sigma, ISO 9000 and ISO 14001 Auditing. </strong></p>
              </li>
            </ul>
            <p dir="ltr"><strong id="internal-source-marker_0.4">Duties: </strong></p>
            <ul>
              <li>
                <p dir="ltr"><strong id="internal-source-marker_0.4">Supervising three production lines consisting of multifunctional teams of up to twenty five employees. </strong></p>
              </li>
              <li>
                <p dir="ltr"><strong id="internal-source-marker_0.4">Continiously working to improve value streams. </strong></p>
              </li>
              <li>
                <p dir="ltr"><strong id="internal-source-marker_0.4">Attending regular meetings with management.</strong></p>
              </li>
              <li>
                <p dir="ltr"><strong id="internal-source-marker_0.4">Delivering training to new and existing employees in a variety of areas including; quality, health and safety, waste streams, environmental awareness and computer literacy. </strong></p>
              </li>
              <li>
                <p dir="ltr"><strong id="internal-source-marker_0.4">Ordering stocks using OMAF, a computerised inventory system.</strong></p>
              </li>
              <li>
                <p dir="ltr"><strong id="internal-source-marker_0.4">Inspecting the quality of work produced by staff on production line. </strong></p>
              </li>
              <li>
                <p dir="ltr"><strong id="internal-source-marker_0.4">Communicating with staff targets expected and motivating each employee to achieve and surpass targets set.</strong></p>
              </li>
              <li>
                <p dir="ltr"><strong id="internal-source-marker_0.4">Conducting a variety of Health and Safety audits on a regular basis. </strong></p>
              </li>
              <li>
                <p dir="ltr"><strong id="internal-source-marker_0.4">Performing induction training with new members of staff and carrying out a tour of the factory and its various facilities. </strong></p>
              </li>
            </ul>
<p>&nbsp;</p>
<p>&nbsp;</p>
          </div>
        </div>
        <div class="AccordionPanel">
          <div class="AccordionPanelTab">H.J Heinz</div>
          <div class="AccordionPanelContent"><strong id="internal-source-marker_0.6">
            <p dir="ltr">May 1997- October 1999: 	Sanitation Operator </p>
            <p dir="ltr">HJ Heinz, Dundalk, Co. Louth</p>
            <br />
            <p dir="ltr">Established in Dundalk in 1992 The HJ Heinz facility produces a range of Fast Moving Consumer Goods (FMCG) including frozen ready meals. </p>
          </strong></div>
        </div>
</div>
      <p><br />
      </p>
      <script type="text/javascript">
var Accordion1 = new Spry.Widget.Accordion("Accordion1");
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
