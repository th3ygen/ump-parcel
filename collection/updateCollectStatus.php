<!-- 
    author: MUHAMMAD AMEERUL BIN JABARULLAH CB20027
    MODULE 3
 -->
 <?php

include('config2.php');

if (isset($_POST["save_status"])) {

    $studentName    = mysqli_real_escape_string($koneksi, $_POST["studentName"]);
    $statusOptions  = mysqli_real_escape_string($koneksi, $_POST["statusOptions"]);


    //ERROR HANDLING

    if ($statusOptions == "Empty") {
        echo '<script>alert("Please Select a Status"); document.location="index.php?page=showCollectList_mhs";</script>';
        exit();
    }

    $sql = "UPDATE collectlist SET Goods_Status = '$statusOptions' WHERE Student_Name = '$studentName'";

    if (!mysqli_query($koneksi, $sql)) {
        echo '<script>alert("Update Status Failed"); document.location="index.php?page=showCollectList_mhs";</script>';
        exit();
    } else {
        echo '<script>alert("Update Status Successfully."); document.location="index.php?page=showCollectList_mhs";</script>';
    }
}
