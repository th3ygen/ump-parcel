<!-- 
    author: MUHAMMAD AMEERUL BIN JABARULLAH CB20027
    MODULE 3
 -->
 <?php
//koneksi ke database mysql,
$koneksi = mysqli_connect("localhost","root","","ump_parcel");

//cek jika koneksi ke mysql gagal, maka akan tampil pesan berikut
if (mysqli_connect_errno()){
	echo "Fail to connect MySQL: " . mysqli_connect_error();
}
