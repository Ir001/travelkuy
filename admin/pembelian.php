<?php 
  require '../system/config.php';
  $admin = new config();
  $loged = $admin->loged();
  if ($loged == 0) {
    header("location:login.php");
  }
  $pembelian = $admin->getPembelian();
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $setting['title']; ?> &mdash; Pembelian</title>
  <?php include 'template/meta_head.php'; ?>
  <!-- Toastr -->
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<?php include 'template/navbar.php'; ?>
<?php include 'template/sidebar.php'; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard - Pembelian Tiket</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Pembelian Tiket</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Destinasi</h3>
                <div class="card-tools">
                </div>
              </div>
              <div class="card-body">
                <table id="pelanggan" class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Destinasi</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $i=0;
                      foreach (@$pembelian as $data) {
                        $id_des = $data['id_destinasi'];
                        $getDestinasi = $admin->showDestinasi($id_des);
                     ?>
                  <tr>
                    <td>
                      <?php echo $i+1; ?>
                    </td>
                    <td>
                      <?php echo $data['nama_lengkap']; ?> 
                    </td>
                    <td>
                      <?php echo $getDestinasi['nama_destinasi']; ?>
                    </td>
                     <td>
                      <?php echo $data['jumlah']; ?> 
                    </td>
                    <td>
                     Rp. <?php echo number_format($data['total_pembelian'], 0, ",","."); ?> 
                    </td>
                    <td>
                      <?php echo $data['status']; ?>
                    </td>
                    <td>
                    	<a href="edit_pembelian.php?id=<?php echo $data['id_pembayaran']; ?>" class="btn btn-sm btn-primary">Detail</a>
                    	<!-- <a href="#" class="btn btn-sm btn-danger">Delete</a> -->
                    </td>
                  </tr>
                  <?php $i++; } ?>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 <?php include 'template/footer.php'; ?>
</div>
<!-- ./wrapper -->

<?php include 'template/meta_footer.php'; ?>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- Toastr -->
<script src="plugins/toastr/toastr.min.js"></script>
<script type="text/javascript">
  $(function(){
    $('#pelanggan').DataTable();
  })
</script>
</body>
</html>
