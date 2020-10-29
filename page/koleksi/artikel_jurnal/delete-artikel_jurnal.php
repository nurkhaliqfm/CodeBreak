<?php

    include("config.php");

    $id = $_GET['id'];
    $sql = "DELETE FROM artikel_jurnal WHERE id = '$id'";
    $query = mysqli_query($db, $sql);
?>

<script type="text/javascript">
    window.location.href="?page=artikel_jurnal";
</script>