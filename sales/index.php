<!doctype html>
<html>

<head lang="en">
    <meta charset="utf-8">
    <title>Sales</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="style.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
    <header>
        <h1>SALES INVOICE</h1>
    </header>
    <div align="center">
    <form action="submit.php" method="post" enctype="mulipart/form-data">
        
        <label class="a">Customer Name:</label>
        <input type="text" name="customer_name" id="name" class="form_control"> <br>

        <label class="a">Sales:</label>
        <input type="text" name="" id="form_control"><br>

        <div class="form-group">
        <label for="country">Country</label>
        <select class="form-control" id="country-dropdown">
        <option value="">Select Country</option>
        <?php
        require_once "db.php";
        $result = mysqli_query($conn,"SELECT * FROM countries");
        while($row = mysqli_fetch_array($result)) {
        ?>
        <option value="<?php echo $row['id'];?>"><?php echo $row["name"];?></option>
        <?php
        }
        ?>
        </select>
        </div>

        <div class="form-group">
        <label for="state">State</label>
        <select class="form-control" id="state-dropdown">
        </select>
        </div>  

        <div class="form-group">
        <label for="city">City</label>
        <select class="form-control" id="city-dropdown">
        </select>
        </div> <br>

        <label>Invoice:</label>
        <input type="file" name="file_pdf" id="file_pdf" class="form-control" accept=".pdf" multiple><br>

        <label>Customer_Image:</label>
        <input type="file" name="file_img" id="file_img" class="form-control" accept=".png" width="64" height="64"><br>

        <label>Invoice_data</label>
        <input type="date" name="invoice_name" max="2022-11-15"> <br>
        
        <input type="submit" name="submit" value="submit" class="btn btn-success">

    </form>
    </div>
    
    <script type="text/javascript">
$(document).ready(function() {
$('#country-dropdown').on('change', function() {
var country_id = this.value;
$.ajax({
url: "states-by-country.php",
type: "POST",
data: {
country_id: country_id
},
cache: false,
success: function(result){
$("#state-dropdown").html(result);
$('#city-dropdown').html('<option value="">Select State First</option>'); 
}
});
});    
$('#state-dropdown').on('change', function() {
var state_id = this.value;
$.ajax({
url: "cities-by-state.php",
type: "POST",
data: {
state_id: state_id
},
cache: false,
success: function(result){
$("#city-dropdown").html(result);
}
});
});
});
</script>


</body>

</html>