<!-- 
    author: MUHAMMAD AMEERUL BIN JABARULLAH CB20027
    MODULE 3
 -->
 <?php include('config2.php'); ?>


<div class="container" style="margin-top:20px">
    <center>
        <font size="6">Edit Data</font>
    </center>

    <hr>

    <?php
    //jika sudah mendapatkan parameter GET id dari URL
    if (isset($_GET['Student_Name'])) {
        //membuat variabel $id untuk menyimpan id dari GET id di URL
        $Student_Name = $_GET['Student_Name'];

        //query ke database SELECT tabel mahasiswa berdasarkan id = $id
        $select = mysqli_query($koneksi, "SELECT * FROM collectlist WHERE Student_Name='$Student_Name'") or die(mysqli_error($koneksi));

        //jika hasil query = 0 maka muncul pesan error
        if (mysqli_num_rows($select) == 0) {
            echo '<div class="alert alert-warning">Student Name is not in the database.</div>';
            exit();
            //jika hasil query > 0
        } else {
            //membuat variabel $data dan menyimpan data row dari query
            $data = mysqli_fetch_assoc($select);
        }
    }
    ?>

    <?php
    //jika tombol simpan di tekan/klik
    if (isset($_POST['submit'])) {
        $Phone_Number    = $_POST['Phone_Number'];
        $Tracking_Number    = $_POST['Tracking_Number'];
        $Arrival_Date   = $_POST['Arrival_Date'];
        $Parcel_Type    = $_POST['Parcel_Type'];
        $Collect_Date   = $_POST['Collect_Date'];

        $sql = mysqli_query($koneksi, "UPDATE collectlist SET Phone_Number='$Phone_Number', Tracking_Number='$Tracking_Number', Arrival_Date='$Arrival_Date', Parcel_Type='$Parcel_Type', Collect_Date='$Collect_Date' WHERE Student_Name='$Student_Name'") or die(mysqli_error($koneksi));

        if ($sql) {
            echo '<script>alert("Data has been added successfully."); document.location="index.php?page=showCollectList_mhs";</script>';
        } else {
            echo '<div class="alert alert-warning">Fail to process to edit data.</div>';
        }
    }
    ?>

    <form action="index.php?page=editCollectData_mhs&Student_Name=<?php echo $Student_Name; ?>" method="post">
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Student Name</label>
            <div class="col-md-6 col-sm-6">
                <input type="text" name="Student_Name" class="form-control" size="4" value="<?php echo $data['Student_Name']; ?>" readonly required>
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Phone Number</label>
            <div class="col-md-6 col-sm-6">
                <input type="number" name="Phone_Number" class="form-control" value="<?php echo $data['Phone_Number']; ?>" required>
            </div>
        </div>

        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Tracking Number</label>
            <div class="col-md-6 col-sm-6">
                <input type="text" name="Tracking_Number" class="form-control" value="<?php echo $data['Tracking_Number']; ?>" required>
            </div>
        </div>

        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Date Goods Arrive</label>
            <div class="col-md-6 col-sm-6">
                <input type="date" name="Arrival_Date" class="form-control" value="<?php echo $data['Arrival_Date']; ?>" required id="from-datepicker" />
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Type of Goods</label>
            <div class="col-md-6 col-sm-6">
                <select name="Parcel_Type" class="form-control" required>
                    <option value="">Choose Type of Goods</option>
                    <option value="Parcel" <?php if ($data['Parcel_Type'] == 'Parcel') {
                                                echo 'selected';
                                            } ?>>Parcel</option>
                    <option value="Mail" <?php if ($data['Parcel_Type'] == 'Mail') {
                                                echo 'selected';
                                            } ?>>Mail</option>
                </select>
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Date Goods Collected</label>
            <div class="col-md-6 col-sm-6">
                <input type="date" name="Collect_Date" class="form-control" value="<?php echo $data['Collect_Date']; ?>" required id="from-datepicker" />
            </div>
        </div>

</div>
<div class="item form-group">
    <div class="col-md-6 col-sm-6 offset-md-3">
        <input type="submit" name="submit" class="btn btn-primary" value="Save">
        <a href="index.php?page=showCollectList_mhs" class="btn btn-warning">Go back to report</a>
    </div>
</div>
</form>
</div>