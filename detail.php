<?php require 'system/config.php'; ?>
<?php 
	if (empty(isset($_GET['id']))) {
		header("location:destinasi.php");
	}else{
		$id = $_GET['id'];
		if ($id == "") {
			header("location:destinasi.php");
		}
		$detail = $app->showDetail($id);
	}
 ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $setting['title']; ?> &mdash; Detail <?php echo $detail['nama_destinasi']; ?></title>
	<?php include 'template/meta_head.php'; ?>

	</head>
	<body>
		<div id="fh5co-wrapper">
		<div id="fh5co-page">

		<?php include 'template/header.php'; ?>

		<div id="fh5co-blog-section" class="fh5co-section-gray">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
						<h3>Detail <?php echo $detail['nama_destinasi']; ?></h3>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row row-bottom-padded-md">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<div class="fh5co-blog animate-box">
							
							<div class="blog-text">
								<div class="prod-title">
									<div class="row">
										<div class="col-md-6 col-sm-6 col-xs-6">
											<h3><?php echo $detail['nama_destinasi']; ?></h3>
										</div>
										<div class="col-md-6 col-sm-6 col-xs-6">
											<form method="get" action="buy.php" class="pull-right">
												<input type="hidden" name="id" value="<?php echo $detail['id_destinasi']; ?>">
												<input type="number" name="jumlah" placeholder="Jumlah Tiket" min="1" max="99" value="<?php echo $_SESSION['cart'][$detail['id_destinasi']]; ?>" required>
												<?php if (isset($_GET['page']) AND $_GET['page'] == "edit"): ?>
													<input type="hidden" name="page" value="edit">
													<button type="submit" class="btn btn-sm btn-primary">Ubah Jumlah</button>
													<?php else: ?>
													<button type="submit" class="btn btn-sm btn-primary">Booking</button>

												<?php endif ?>
											</form>
										</div>
									</div>
									<div class="col-md-4">
										<img class="img-responsive" src="images/<?php echo $detail['foto_destinasi']; ?>" alt="">
									</div>
									<div class="col-md-6">
										<p><?php echo $detail['deskripsi_destinasi']; ?></p>
									</div>	
									<div class="col-md-12" style="margin-top: 20px">
										<a href="destinasi.php"><< Kembali</a>
									</div>
								</div>
							</div> 
						</div>
					</div>
					<div class="clearfix visible-md-block"></div>
				</div>

			</div>
		</div>
	</div>
		<?php include 'template/footer.php'; ?>

	

	</div>
	<!-- END fh5co-page -->

	</div>
	<!-- END fh5co-wrapper -->

	<?php include 'template/meta_footer.php'; ?>
	</body>
</html>

