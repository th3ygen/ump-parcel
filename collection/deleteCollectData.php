<!-- 
    author: MUHAMMAD AMEERUL BIN JABARULLAH CB20027
    MODULE 3
 -->
 <?php
//include file config.php
include('config2.php');

//jika benar mendapatkan GET id dari URL
if (isset($_GET['Student_Name'])) {
    //membuat variabel $id yang menyimpan nilai dari $_GET['id']
    $Student_Name = $_GET['Student_Name'];

    //melakukan query ke database, dengan cara SELECT data yang memiliki id yang sama dengan variabel $id
    $cek = mysqli_query($koneksi, "SELECT * FROM collectlist WHERE Student_Name='$Student_Name'") or die(mysqli_error($koneksi));

    //jika query menghasilkan nilai > 0 maka eksekusi script di bawah
    if (mysqli_num_rows($cek) > 0) {
        //query ke database DELETE untuk menghapus data dengan kondisi id=$id
        $del = mysqli_query($koneksi, "DELETE FROM collectlist WHERE Student_Name='$Student_Name'") or die(mysqli_error($koneksi));
        if ($del) {
            echo '<script>alert("Data has been deleted successfully."); document.location="index.php?page=showCollectList_mhs";</script>';
        } else {
            echo '<script>alert("Failed to delete data."); document.location="index.php?page=showCollectList_mhs";</script>';
        }
    } else {
        echo '<script>alert("ID not found in database."); document.location="index.php?page=showCollectList_mhs";</script>';
    }
} else {
    echo '<script>alert("ID not found database."); document.location="index.php?page=showCollectList_mhs";</script>';
}
