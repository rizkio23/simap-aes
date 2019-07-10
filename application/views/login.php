<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SI-MAP</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="robots" content="all,follow">
    <link rel="stylesheet" href="<?php echo base_url().'assets/vendor/bootstrap/css/bootstrap.min.css'; ?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,800">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/orionicons.css'; ?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/style.sea.css'; ?>" id="theme-stylesheet">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/custom.css'; ?>">
    <link rel="shortcut icon" href="<?php echo base_url().'assets/img/favicon.png?3'; ?>">
  </head>
  <body>
    <div class="page-holder d-flex align-items-center">
      <div class="container">
        <div class="row align-items-center py-5">
          <div class="col-5 col-lg-7 mx-auto mb-5 mb-lg-0">
            <div class="pr-lg-5"><img src="<?php echo base_url().'assets/img/illust.png'; ?>" alt="" class="img-fluid"></div>
		  </div>
          <div class="col-lg-5 px-lg-4">
			<?php if (isset($_SESSION['pesan'])) { ?>
				<div class="alert alert-block alert-danger" role="alert">
					<?php echo $this->session->flashdata('pesan'); ?>
				</div>
			<?php } ?>  
            <h1 class="text-base text-primary text-uppercase mb-4">Dinas Pendidikan dan Kebudayaan Kabupaten Bondowoso</h1>
            <h2 class="mb-4">Sistem Informasi Manajemen Arsip</h2>
            <p class="text-muted">Masukkan NIP dan Password.</p>
            <form id="loginForm" action="<?php echo base_url().'index.php/login/auth' ?>" method="post" class="mt-4">
              <div class="form-group mb-4">
                <input type="text" name="nip" placeholder="NIP" class="form-control border-0 shadow form-control-lg">
              </div>
              <div class="form-group mb-4">
                <input type="password" name="pass" placeholder="Password" class="form-control border-0 shadow form-control-lg text-violet">
              </div>
              <button type="submit" class="btn btn-primary shadow px-5">Log in</button>
            </form>
          </div>
        </div>
      </div>
    </div>
	<!-- JavaScript files-->
    <script src="<?php echo base_url().'assets/vendor/jquery/jquery.min.css'; ?>"></script>
    <script src="<?php echo base_url().'assets/vendor/popper.js/umd/popper.min.js'; ?>"> </script>
    <script src="<?php echo base_url().'assets/vendor/bootstrap/js/bootstrap.min.js'; ?>"></script>
    <script src="<?php echo base_url().'assets/vendor/jquery.cookie/jquery.cookie.js'; ?>"> </script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
    <script src="<?php echo base_url().'assets/js/front.js'; ?>"></script>
  </body>
</html>