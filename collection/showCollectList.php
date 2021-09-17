<!-- 
    author: MUHAMMAD AMEERUL BIN JABARULLAH CB20027
    MODULE 3
 -->
 <?php
//memasukkan file config.php
include('config2.php');
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>

<div class="container" style="margin-top:20px">
    <center>
        <font size="6">Goods Collection List Table</font>
    </center>
    <hr><br>
    <a href="index.php?page=addCollectData_mhs"><button class="btn btn-dark right">Add Data</button></a>
    <br><input id="myInput" type="text" placeholder="Track Your Parcel">
    <div class="table-responsive">
        <table class="table table-striped jambo_table bulk_action" id="myTable">
            <thead>
                <tr>
                    <th>NO.</th>
                    <th>Student Name</th>
                    <th>Phone Number</th>
                    <th>Tracking Number</th>
                    <th>Arrival Date</th>
                    <th>Parcel Type</th>
                    <th>Collect Date</th>
                    <th>Action</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //query ke database SELECT tabel active list urut berdasarkan alphabet yang paling besar
                $sql = mysqli_query($koneksi, "SELECT * FROM collectlist ORDER BY Student_Name DESC") or die(mysqli_error($koneksi));
                //jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
                if (mysqli_num_rows($sql) > 0) {
                    //membuat variabel $no untuk menyimpan nomor urut
                    $no = 1;
                    //melakukan perulangan while dengan dari dari query $sql
                    while ($data = mysqli_fetch_assoc($sql)) {
                        //menampilkan data perulangan
                        echo '
						<tr>
							<td>' . $no . '</td>
							<td>' . $data['Student_Name'] . '</td>
							<td>' . $data['Phone_Number'] . '</td>
							<td>' . $data['Tracking_Number'] . '</td>
							<td>' . $data['Arrival_Date'] . '</td>
							<td>' . $data['Parcel_Type'] . '</td>
							<td>' . $data['Collect_Date'] . '</td>
							<td>
								<a href="index.php?page=editCollectData_mhs&Student_Name=' . $data['Student_Name'] . '" class="btn btn-secondary btn-sm">Edit</a>
								<a href="deleteCollectData.php?Student_Name=' . $data['Student_Name'] . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Confirm to delete this data?\')">Delete</a>
							</td>
							<td>
							    <form action="updateCollectStatus.php" method="POST">
							        <div class="form-group">
										<select id="statusOptions" name="statusOptions">
											<option value="Empty">Select a Status</option>
											<option value="Received">Received</option>
											<option value="Collected">Collected</option>
										</select>
							        </div>
							        <div class="form-group">
								         <button type="submit" name="save_status" class="btn btn-primary">Save Status</button>
										 <input type="hidden" name="studentName" value="' . $data['Student_Name'] . '"/>
							        </div>
							    </form>
							</td>
						</tr>
						';
                        $no++;
                    }
                    //jika query menghasilkan nilai 0
                } else {
                    echo '
					<tr>
						<td colspan="6">No data.</td>
					</tr>
					';
                }
                ?>
            <tbody>
        </table>
    </div>
</div>