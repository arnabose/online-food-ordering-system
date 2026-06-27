<?php
    session_start();
    session_destroy();
?>
<script>
    alert('you are logged out');
    window.location.href="index.php";
</script>
