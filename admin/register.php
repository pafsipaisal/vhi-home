<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Argapuraku | Register</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets//plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="../../index2.html"><b>Argapuraku</b>Register</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Register Petugas Wisata Baru</p>

        <form action="media.php?modul=auth&act=register" method="post" enctype="multipart/form-data">
          <p>
            <label>Username :</label>
            <input class="form-control" type="text" name="username" placeholder="Isi Username">
          </p>
          <p>
            <label>Password :</label>
            <input class="form-control" type="password" name="password" placeholder="Isi Password">
          </p>
          <p>
            <label>Nama :</label>
            <input class="form-control" type="text" name="nama" placeholder="Isi Nama">
          </p>
          <p>
            <label>Jenis Kelamin :</label>
            <select class="form-control" name="jk">
              <option value="L">Laki-laki</option>
              <option value="P">Perempuan</option>
            </select>
          </p>
          <p>
            <label>Agama :</label>
            <select class="form-control" name="agama">
              <?php include "config/koneksi.php"; 
              $query = mysqli_query($konek,"SELECT * FROM ref_agama");
              while($r = mysqli_fetch_array($query)){
                ?>
                <option value="<?php echo $r['id_agama']; ?>"><?php echo $r['nama_agama']; ?></option>
                <?php 
              } 
              ?>
            </select>
          </p>
          <p>
            <label>Alamat :</label>
            <textarea class="form-control" name="alamat"></textarea>
          </p>
          <div class="form-group">
            <label for="exampleInputFile">File input</label>
            <div class="input-group">
              <div >
                <input type="file" class="custom-file-input" id="exampleInputFile" name="gambar">
                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">Register</button>
              <button type="button" class="btn btn-danger btn-block" onclick="window.history.back();">Kembali</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="assets/dist/js/adminlte.min.js"></script>

</body>
</html>
