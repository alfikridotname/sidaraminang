<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?= $title; ?> | SIDARA Minang</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/admin_lte/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/admin_lte/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/admin_lte/css/adminlte.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<!-- User style -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/alfikri/css/style.css">
	<!-- Extra CSS -->
	<?= $extra_css; ?>
</head>

<body style="background-color: white;background-image: url('<?= base_url(); ?>assets/alfikri/img/bg.jpg');background-attachment: fixed;background-size: cover; color:white;" class="hold-transition register-page">
	<?= $contents; ?>
	<!-- /.register-box -->

	<!-- jQuery -->
	<script src="<?= base_url(); ?>assets/admin_lte/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="<?= base_url(); ?>assets/admin_lte/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?= base_url(); ?>assets/admin_lte/js/adminlte.min.js"></script>
	<!-- Extra JS -->
	<?= $extra_js; ?>
</body>

</html>