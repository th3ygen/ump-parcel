<!-- 
    author: NURAIN FITRI BINTI MADZLAN CD19045
    MODULE 5
 -->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Complaints</title>
    <link rel="shortcut icon" href="files/img/ico.ico">
    <link rel="stylesheet" href="files/css/bootstrap.css">
    <link rel="stylesheet" href="files/css/custom.css">
    <style media="screen">
    table{border: 0px;}
    td{
      padding:10px;
      border-top: 0px solid #eee;
      border-bottom: 0px solid #eee!important;
      padding-left: 0px;
      color:#0ea798;
    }
    input,button.log{width: 450px;}
    </style>
  </head>
  <body>
    <div class="cover user text-center" style="height:120px;">
      <br>
      <h2>Add Complaints</h2>
    </div>
    <div class="animated fadeIn">
      <div class="padd">
        <div class="col-lg-12 text-center">
                  </div>
              </div>
              <table>
                <tr>
                  <td class="text-left">Your Refference no</td>
                  <<td><input type="text" name = "refno" placeholder = "e.g:AA12568"></td>
                </tr>
                <tr>
                  <td class="text-left">Your Username</td>
                  <<td><input type="text" name = "username" placeholder = "username"></td>
                </tr>
                <tr>
                  <td class="text-left">Your User ID</td>
                  <td><input type="text" name = "id" placeholder = "user ID"></td>
                </tr>
                <tr>
                  <td class="text-left">Your Your Email ID</td>
                  <td><input type="text" name = "email" placeholder = "ain@gmail.com"></td>
                </tr>
                <tr>
                  <td class="text-left">Your Contact Number *</td>
                  <td><input type = "text" name = "phoneno" maxlength=10 placeholder = "Your Phone number">  </td>
                </tr>
                <tr>
                  <td class="text-left">Your Subject *</td>
                  <td><input type="text" name = "subject" placeholder = "Subject"></td>
                </tr>
				<tr>
                  <td class="text-left">Complaint Type *</td>
                  <td><input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                     <label for="vehicle1"> Damaged parcels</label><br>
                     <input type="checkbox" id="vehicle2" name="vehicle2" value="Car">
                     <label for="vehicle2"> Lost parcels</label><br>
                     <input type="checkbox" id="vehicle3" name="vehicle3" value="Boat">
                     <label for="vehicle3"> Others (state in description)</label></td>
                </tr>
                <tr>
                  <td class="text-left">Complaint Description *</td>
                  <td><textarea name="describe your complaint" rows="8" cols="80" placeholder="Your complain"></textarea></td>
                </tr>
                <tr><td></td><td></td></tr>
                <tr>
                  <td></td>
                  <td><button type="submit" class="log">Submit</button></td>
                </tr>
              </table>
            </div>
          </form>
        </div>
      </div>
    </div>
    <script src="files/js/jquery.js"></script>
    <script src="files/js/bootstrap.min.js"></script>
    <script src="files/js/script.js"></script>
  </body>
</html>
