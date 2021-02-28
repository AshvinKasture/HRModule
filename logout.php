<?php
session_start();
include("connect.php");
$_SESSION['login']=="";
 
session_unset();

?>
<script language="javascript">
document.location="login.html";
</script>
