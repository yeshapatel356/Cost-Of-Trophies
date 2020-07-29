<!DOCTYPE html>
<html>
<header>
		<title>Trophy Manufacturer</title>
		<link rel="stylesheet" type="text/css" href="trophyStyle.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    	<meta name="name" content="Trophy Calculator">
    	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
			
   		
</header>

<div class="company">
		<div class="trophyIcon">
			<i class="fa fa-trophy" style="font-size:50px;color:#cd7f32; text-shadow: 2px -2px 4px #000000;"></i>
			<i class="fa fa-trophy" style="font-size:50px;color:#aaa9ad; text-shadow: 2px -2px 4px #000000;"></i>
			<i class="fa fa-trophy" style="font-size:50px;color:#d4af37; text-shadow: 2px -2px 4px #000000;"></i>
		</div>TROPHY MANUFACTURER
		<div class="trophyIcon">
			<i class="fa fa-trophy" style="font-size:50px;color:#d4af37; text-shadow: 2px -2px 4px #000000;"></i>
			<i class="fa fa-trophy" style="font-size:50px;color:#aaa9ad; text-shadow: 2px -2px 4px #000000;"></i>
			<i class="fa fa-trophy" style="font-size:50px;color:#cd7f32; text-shadow: 2px -2px 4px #000000;"></i>
		</div>
	</div>
	<hr class ="head">
	<div class="menu" id="menu" >

    	<li ><a href="index.html#aboutus" class="a_color">ABOUT US</a></li>
    	<li ><a href="index.html#calculate" class="a_color">CALCULATE COST</a></li>

	</div>
	<hr class ="head">
	
	
  

	

<p>

	<?php
		
		if(isset($_POST['submit'])){
			require_once 'trophy.php';
			$name = $_POST['name'];
			$email = $_POST['email'];
			$shape = $_POST['shape'];
			$length = $_POST['length'];
			$height = $_POST['height'];
			$width = $_POST['width'];
			$radius = $_POST['radius'];
			$metal = $_POST['metal'];
			$metalPurity = $_POST['metalPurity'];
			$coating = $_POST['coating'];
			$coatingThickness = $_POST['coatingThickness'];
			
			
			
			$trophy = new trophy($shape, $metal, $metalPurity, $coating, $coatingThickness, $length, $height, $width, $radius);
			$volume = $trophy->getVolume();
			$surface = $trophy->getSuraceArea();
			
			
			$volume_calculated = $trophy->$volume();
    		$surface_calculated = $trophy->$surface();

  		    $amount=  number_format((float)$trophy->cost($volume_calculated, $surface_calculated), 2, '.', '');
			
			
			
		}
		
	?>

</p>

<br>
<div class="result" >
	<h1>Result</h1>
	<span><b>
	<label>Name: <?php echo "$name" ?></label><br>
	<label>Email: <?php echo "$email" ?></label><br>
	<label>Shape: <?php echo "$shape"?></label><br>
	<label>Length: <?php echo "$length"?>cm</label><br>
	<label>Height: <?php echo "$height"?>cm</label><br>
	<label>Width: <?php echo "$width"?>cm</label><br>
	<label>Radius: <?php echo "$radius"?>cm</label><br>
	<label>Type Of Metal: <?php echo "$metal"?></label><br>
	<label>Metal Purity: <?php echo "$metalPurity"?>%</label><br>
	<label>Coating: <?php echo "$coating"?></label><br>
	<label>Coating Thickness: <?php echo "$coatingThickness"?></label></b><br>
	<hr class="head">
	<b><h2><label>Cost Of Trophy: Rs.<?php echo "$amount"?></label></h2></b><br>	
	<button onclick="goBack()">Edit</button><br>
	<script>
  		function goBack() {
  		window.history.back();
	}
	</script>
	</span>
</div>


<footer>
	<hr>
	<p class="p_footer">Made with &#10084 by 	<a href="mailto:patelyesha318@gmail.com"  style='  text-decoration:none; color:#17252a'>Yesha Patel</p></a> </code>

</footer>



</body>
</html>