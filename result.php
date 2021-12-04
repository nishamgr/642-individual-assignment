<!DOCTYPE HTML>  
<html>
<head>

    <title>Verification</title>
    <!-- Bootstrap -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Nunito' rel='stylesheet' type='text/css'>
    <!-- Custom Stylesheet -->
    <link href="stylesheet.css" rel="stylesheet" type="text/css">

</head>
<body>  
	<center><h1>Verification Page</h1></center>
	<br>
<div class="container center-div">
    <div class="container jumbotron jumbotron-fluid" id="main-container">
        <div class="container center-div">
	<h2>Hello <?php echo $_POST["firstName"]; ?>,</h2><h3> Information you have entered are as follows: </h3><br>
	<div class="row">
		<div class="col-md">
	<div class="row"><b>Full Name:</b> <?php echo $_POST["firstName"]; ?> <?php echo $_POST["lastName"]; ?></div><br>
	<div class="row"><b>Address:</b> <?php echo $_POST["address"]; ?></div><br>
	<div class="row"><b>Phone:</b> <?php echo $_POST["phoneNumber"]; ?></div><br>
	<div class="row"><b>Email</b> <?php echo $_POST["email"]; ?></div><br>
	<div class="row"><b>Title:</b> <?php echo $_POST["title"]; ?></div><br>
	<div class="row"><b>Budget:</b> <?php echo $_POST["monthlyBudget"]; ?></div><br>
	<div class="row"><b>Height:</b> <?php echo $_POST["inches"]; ?></div></div>
    <div class="row"><b>Password:</b> <?php echo $_POST["password"]; ?></div></div>

<div id="gmap_canvas">Loading map...</div>
		</div>
	</div><br><br><br><br>
</div></div>
<?php 
// function to geocode address, it will return false if unable to geocode address
function geocode($address){
 
    // url encode the address
    $address = urlencode($address);
     
    // google map geocode api url
    $url = "https://maps.googleapis.com/maps/api/geocode/json?address={$address}&key=AIzaSyCq07b_Vr7f_XiOLd2aev-rq33E_2i2ItI";
 
    // get the json response
    $resp_json = file_get_contents($url);
     
    // decode the json
    $resp = json_decode($resp_json, true);
 
    // response status will be 'OK', if able to geocode given address 
    if($resp['status']=='OK'){
 
        // get the important data
        $lati = isset($resp['results'][0]['geometry']['location']['lat']) ? $resp['results'][0]['geometry']['location']['lat'] : "";
        $longi = isset($resp['results'][0]['geometry']['location']['lng']) ? $resp['results'][0]['geometry']['location']['lng'] : "";
        $formatted_address = isset($resp['results'][0]['formatted_address']) ? $resp['results'][0]['formatted_address'] : "";
         
        // verify if data is complete
        if($lati && $longi && $formatted_address){
         
            // put the data in the array
            $data_arr = array();            
             
            array_push(
                $data_arr, 
                    $lati, 
                    $longi, 
                    $formatted_address
                );
             
            return $data_arr;
             
        }else{
            return false;
        }
         
    }
 
    else{
        echo "<strong>ERROR: {$resp['status']}</strong>";
        return false;
    }
}
?>
</body>
<?php
if($_POST){
 
    // get latitude, longitude and formatted address
    $data_arr = geocode($_POST['address']);
 
    // if able to geocode the address
    if($data_arr){
         
        $latitude = $data_arr[0];
        $longitude = $data_arr[1];
        $formatted_address = $data_arr[2];
                     
    ?>
    <?php
// See the password_hash() example to see where this came from.
$hash = '$2y$07$BCryptRequires22Chrcte/VlQH0piJtjXl.0t1XkA8pw9dMXTpOq';

if (password_verify('rasmuslerdorf', $hash)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}
?>
 
    <!-- google map will be shown here -->
    <!-- <div id="gmap_canvas">Loading map...</div>
    <div id='map-label'>Map shows approximate location.</div> -->
 
    <!-- JavaScript to show google map -->
    <script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyCq07b_Vr7f_XiOLd2aev-rq33E_2i2ItI"></script>  

    <script type="text/javascript">
        function init_map() {
            var myOptions = {
                zoom: 14,
                center: new google.maps.LatLng(<?php echo $latitude; ?>, <?php echo $longitude; ?>),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);
            marker = new google.maps.Marker({
                map: map,
                position: new google.maps.LatLng(<?php echo $latitude; ?>, <?php echo $longitude; ?>)
            });
            infowindow = new google.maps.InfoWindow({
                content: "<?php echo $formatted_address; ?>"
            });
            google.maps.event.addListener(marker, "click", function () {
                infowindow.open(map, marker);
            });
            infowindow.open(map, marker);
        }
        google.maps.event.addDomListener(window, 'load', init_map);
    </script>
 
    <?php
 
    // if unable to geocode the address
    }else{
        echo "No map found.";
    }
}
?>
</html>