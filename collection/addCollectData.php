<!-- 
    author: MUHAMMAD AMEERUL BIN JABARULLAH CB20027
    MODULE 3
 -->
<?php include('config2.php'); ?>

<center>
    <font size="6">Form Input Goods Collection List</font>
</center>
<hr>
<?php
if (isset($_POST['submit'])) {
    $Student_Name    = $_POST['Student_Name'];
    $Phone_Number    = $_POST['Phone_Number'];
    $Tracking_Number    = $_POST['Tracking_Number'];
    $Arrival_Date   = $_POST['Arrival_Date'];
    $Parcel_Type    = $_POST['Parcel_Type'];
    $Collect_Date   = $_POST['Collect_Date'];

    $cek = mysqli_query($koneksi, "SELECT * FROM collectlist WHERE Student_Name='$Student_Name'") or die(mysqli_error($koneksi));

    if (mysqli_num_rows($cek) == 0) {
        $sql = mysqli_query($koneksi, "INSERT INTO collectlist(Student_Name, Phone_Number, Tracking_Number, Arrival_Date, Parcel_Type, Collect_Date) VALUES('$Student_Name', '$Phone_Number', '$Tracking_Number', '$Arrival_Date', '$Parcel_Type', '$Collect_Date')") or die(mysqli_error($koneksi));
        if ($sql) {
            echo '<script>alert("Data has been added successfully."); document.location="index.php?page=showCollectList_mhs";</script>';
        } else {
            echo '<div class="alert alert-warning">Failed to add data.</div>';
        }
    } else {
        echo '<div class="alert alert-warning">Fail, Student Active List has already been registered.</div>';
    }
}
?>

<form action="index.php?page=addCollectData_mhs" method="post">
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Student Name</label>
        <div class="col-md-6 col-sm-6 ">
            <input type="text" name="Student_Name" class="form-control" size="4" required>
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Phone Number</label>
        <div class="col-md-6 col-sm-6">
            <input type="text" name="Phone_Number" class="form-control" required>
        </div>
    </div>

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Tracking Number</label>
        <div class="col-md-6 col-sm-6">
            <input type="text" name="Tracking_Number" class="form-control" required>
        </div>
    </div>

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Date Goods Arrive</label>
        <div class="col-md-6 col-sm-6">
            <input type="date" name="Arrival_Date" class="form-control">
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Type of Goods</label>
        <div class="col-md-6 col-sm-6">
            <select name="Parcel_Type" class="form-control" required>
                <option value="">Choose Type of Goods</option>
                <option value="Parcel">Parcel</option>
                <option value="Mail">Mail</option>
            </select>
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Date Goods Collected</label>
        <div class="col-md-6 col-sm-6">
            <input type="date" name="Collect_Date" class="form-control">
        </div>
    </div>

    <div class="item form-group">
        <div class="col-md-6 col-sm-6 offset-md-3">
            <input type="submit" name="submit" class="btn btn-primary" value="Save">
        </div>
</form>
</div>