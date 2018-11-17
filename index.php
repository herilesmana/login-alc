<?php

require 'config/connection.php';
$query = mysqli_query($conn, 'SELECT * FROM approvers ORDER BY urutan asc');
$jumlah = mysqli_num_rows($query);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Alc System</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/animate.css">
	<style type="text/css">
		::placeholder {
			color: #fff !important;
			opacity: 1;
		}
		input {
			color: #fff !important
		}
		.avatar-container {
			padding: 10px !important;
			display: none
		}
		.avatar {
			background: #fff;
			border-radius: 5px;
			height: 200px;
			text-align: center;
		}
		.avatar img {
			width: 150px;
			height: 150px;
			margin: 2px;
			border-radius: 50%;
			border: 2px solid #f2bdf2;
		}
		.pause {
			display: none
		}
		video {
			   position: fixed; right: 0;
			   bottom: 0;
			   min-width: 100%;
			   min-height: 100%;
			   width: auto;
			   height: auto;
			   z-index: 100;
			   background: url(polina.jpg) no-repeat; background-size: cover;
			   display: none
		}
	</style>
</head>
<body style="background: url(./images/background.png) center fixed;background-size: cover;">
<video id="videoplay" controls="controls">
    <source src="video/haneen.mp4" type="video/mp4">
</video>
	<div class="bagian" style="height: 200px; background: transparent">
		<div id="modal" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-sm">
		    <div class="modal-content">
		      <button class="btn btn-primary" id="launch">Lounch</button>
		    </div>
		  </div>
		</div>
		<div class="container-fluid">
			<div class="row">
				<input type="hidden" name="" class="jumlah_semua">
				<input type="hidden" value="0" class="saat_ini">
				<?php while ($approver = mysqli_fetch_assoc($query)) { ?>
				<div id="<?php echo $approver['card_number']; ?>" class="col-md-2 animated avatar-container">
					<div class="avatar">
						<img src="./images/users/<?php echo $approver['foto']; ?>">
						<h4><?php echo $approver['name']; ?></h4>
					</div>
					<audio id="audio<?php echo $approver['card_number']; ?>">
					  <source src="audio/<?php echo $approver['audio']; ?>" type="audio/mpeg">
					</audio>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
	<div class="bagian" style="height: 200px; background: transparent">
		<div class="col-md-6 grid-margin stretch-card" style="margin: 10px auto">
          <div class="card" style="background: transparent;">
            <div class="card-body">
            <h1 class="text-center text-white">System Presentasi Achievement</h1>
	            <form class="forms-sample" id="form">
	                  <input autofocus="" style="background: transparent;" type="text" class="form-control" id="card-number" placeholder="Tap Your Card Please">
	            </form>
	            <div class="player pause">
	            	<img src="images/player.gif" width="100px" height="50px">
	            </div>
              	<audio id="audio" preload="auto" autoplay="">
				  <source src="audio/welcome.mp3" type="audio/mp3">
				</audio>
				<audio id="audio2">
				  <source src="audio/welcome2.mpeg" type="audio/mpeg">
				</audio>
            </div>
          </div>
        </div>
	</div>
	<div class="bagian" style="height: 200px; background: transparent">

	</div>
</body>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript">
	$('#launch').click( function () {
		var video = document.getElementById('videoplay');
		$('#modal').modal('hide');
		$('video').show();
		video.play();
		video.webkitRequestFullScreen();
	})
	$('.jumlah_semua').val('<?php echo $jumlah; ?>');
	$('#form').submit(function (event) {
		event.preventDefault();
		if ($('#audio'+$('#card-number').val()).length == 0) {
			return false;
		}else{
			var card_number = $('#card-number').val();
			$('#'+card_number).show();
			$('#'+card_number).addClass('flipInY');
			var audio3 = document.getElementById('audio'+$('#card-number').val());
			audio3.play();
			pause();
		}
		$('#card-number').val('');
		var saat_ini = parseInt($('.saat_ini').val()) + 1;
		$('.saat_ini').val(saat_ini);
		if ($('.saat_ini').val() == $('.jumlah_semua').val() ) {
			$('#modal').modal('show')
		}
	})
	$('.bagian').click( function () {
		$('#card-number').focus();
	})
	document.addEventListener('play', function(e){
		$('.player').removeClass('pause');
	}, true);
	setTimeout(function(){
		$('.player').addClass('pause');
	}, 8000)
	setTimeout(function(){
		$('.player').removeClass('pause');
		var audio = document.getElementById('audio2');
		audio.play();
	}, 10000)
	setTimeout(function(){
		$('.player').addClass('pause');
	}, 25000)
	function pause()
	{
		setTimeout(function(){
			$('.player').addClass('pause');
		}, 3000)
	}
</script>
</html>