<!DOCTYPE html>
<html lang="">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $title ?></title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- Bootstrap CSS -->
	<!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"> -->

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.3/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	<link rel="stylesheet" href="<?php echo base_url('public') ?>/css/welcome.css">
</head>

<body>
	<div class="container-cover">
		<div class="employee-container">
			<div class="login">
				
				<form action="<?=base_url('check')?>" method="POST" role="form">
					<legend>Login</legend>
                     <?php if(isset($error)):?>
					<span style="color:#fff;margin-left:150px;background-color:red;"><?=$error?></span>
					<?php endif;?>
					<div class="form-group">
						<span id="check-email" style="color:red; background:transparent"></span>
						<input type="email" class="form-control" name="email" id="email" placeholder="email...">
					</div>

					<div class="form-group">
						<input type="password" class="form-control" name="password" id="password" placeholder="password...">
					</div>
					<button type="submit" class="btn btn-primary" id="submit">Submit</button>
					<a href="<?= base_url('register') ?>">Go to make your account if you haven't had an account</a>
				</form>
			</div>
		</div>
	</div>
	<!-- jQuery -->
	<script src="https://code.jquery.com/jquery-3.6.0.js" type="text/javascript"></script>
	<script>
		$(document).ready(function() {
			$('#submit').attr("disabled", true);
			$('#email').change(function() {
				var email = $('#email').val();
				if (email != '') {
					$.ajax({
						url: "<?= base_url('checkuserlog') ?>",
						method: "POST",
						data: {
							email: email
						},
						success: function(data) {
							$('#check-email').html(data);
							$('#submit').attr("disabled", false);
						}
					});
				}
			});
		});
	</script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!-- Bootstrap JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>