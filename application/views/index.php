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
	<!-- HEADER -->
	<header class="header">
      <nav class="navbar navbar-expand-lg px-4 py-2 bg-white shadow"><a href="#" class="sidebar-toggler text-gray-500 mr-4 mr-lg-5 lead"><i class="fas fa-align-left"></i></a><a href="index.html" class="navbar-brand font-weight-bold text-uppercase text-base">SI-MAP</a>
        <ul class="ml-auto d-flex align-items-center list-unstyled mb-0">
          <li class="nav-item dropdown mr-3"><a id="notifications" href="http://example.com" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle text-gray-400 px-1"><i class="fa fa-bell"></i><span class="notification-icon"></span></a>
            <div aria-labelledby="notifications" class="dropdown-menu"><a href="#" class="dropdown-item">
                <div class="d-flex align-items-center">
                  <div class="icon icon-sm bg-violet text-white"><i class="fab fa-twitter"></i></div>
                  <div class="text ml-2">
                    <p class="mb-0">Test</p>
                  </div>
                </div></a><a href="#" class="dropdown-item"> 
              <div class="dropdown-divider"></div><a href="#" class="dropdown-item text-center"><small class="font-weight-bold headings-font-family text-uppercase">View all notifications</small></a>
            </div>
          </li>
          <li class="nav-item dropdown ml-auto"><a id="userInfo" href="http://example.com" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><img src="img/avatar-6.jpg" alt="<?php echo $this->session->userdata('nama'); ?>" style="max-width: 2.5rem;" class="img-fluid rounded-circle shadow"></a>
            <div aria-labelledby="userInfo" class="dropdown-menu"><a href="#" class="dropdown-item"><strong class="d-block text-uppercase headings-font-family"><?php echo $this->session->userdata('nama'); ?></strong><small><?php echo $this->session->userdata('nip'); ?></small></a>
              <div class="dropdown-divider"></div><a href="<?php echo base_url().'index.php/login/keluar'; ?>" class="dropdown-item">Logout</a>
            </div>
          </li>
        </ul>
      </nav>
	</header>
	<!-- MAIN -->
    <div class="d-flex align-items-stretch">
		<!-- SIDEBAR -->
		<?php $this->load->view('sidebar'); ?>
		<!-- MAIN CONTENT -->
		<?php $this->load->view($konten); ?>
	</div>
	<!-- LOAD JS -->
	<script src="<?php echo base_url().'assets/vendor/jquery/jquery.min.js'; ?>"></script>
  <script src="<?php echo base_url().'assets/vendor/popper.js/umd/popper.min.js'; ?>"> </script>
  <script src="<?php echo base_url().'assets/vendor/bootstrap/js/bootstrap.min.js'; ?>"></script>
  <script src="<?php echo base_url().'assets/vendor/jquery.cookie/jquery.cookie.js'; ?>"> </script>
	<script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
  <script src="<?php echo base_url().'assets/js/front.js'; ?>"></script>
  <!-- GET NAME FROM NIP -->
  <script type="text/javascript">
    function gen_id(tgl_l, tgl_p, jk) {
      $.ajax({
        url: '<?php echo base_url()."index.php/master/gen_id_peg"; ?>',
        type: 'POST',
        data: {'tgl_l': tgl_l, 'tgl_p': tgl_p, 'jk': jk},
        success: function(result) {
          $('#nip').val(result);
        },
        error: function(xhr, status, error) {
          console.log(error);
        }
      });
    }
  </script>
  <!-- GENERATE NIP -->
  <script type="text/javascript">
    $(document).ready(function() {
      var tgl_l = $('#tgl_l').val();
      var tgl_p = $('#tgl_p').val();
      var jk = $('#jk').val();
      gen_id(tgl_l, tgl_p, jk);

      $('#tgl_l').change(function() {
        var tgl_l = $(this).val();
        var tgl_p = $('#tgl_p').val();
        var jk = $('#jk').val();
        gen_id(tgl_l, tgl_p, jk);
      });
      $('#tgl_p').change(function() {
        var tgl_l = $('#tgl_l').val();
        var tgl_p = $(this).val();
        var jk = $('#jk').val();
        gen_id(tgl_l, tgl_p, jk);
      });
      $('#jk').change(function() {
        var tgl_l = $('#tgl_l').val();
        var tgl_p = $('#tgl_p').val();
        var jk = $(this).val();
        gen_id(tgl_l, tgl_p, jk);
      });
    });
  </script>
  <!-- GET RETENSI/INAKTIF -->
  <script type="text/javascript">
    $(document).ready(function() {
      $('#jenis').change(function(event) {
        var tgl_masuk = $('#tgl_masuk').val();
        var jenis = $(this).val();
        // ambil masa aktif surat
        $.ajax({
          url: '<?php echo base_url()."index.php/surat/jadwal_inaktif/"; ?>' + jenis + "/" + tgl_masuk,
          type: 'GET',
          success: function(result) {
            $('#inaktif').val(result);
          },
          error: function(xhr, status, error) {
            console.error(error);
          }
        });
        // ambil masa retensi surat
        $.ajax({
          url: '<?php echo base_url()."index.php/surat/jadwal_retensi/"; ?>' + jenis  + "/" + tgl_masuk,
          type: 'GET',
          success: function(result) {
            $('#retensi').val(result);
          },
          error: function(xhr, status, error) {
            console.error(error);
          }
        });
      });
    });
  </script>
  <!-- PENGGUNA -->
  <script type="text/javascript">
    function lihat(id) {
      $.ajax({
        url: '<?php echo base_url()."index.php/pengguna/lihat/" ?>' + id,
        type: 'GET',
        success: function(result) {
          $('#lihat').html(result);
        },
        error: function(xhr, status, error) {
          $('#lihat').html("Terjadi kesalahan!");
        }
      })
    }

    function edit(id) {
      $.ajax({
        url: '<?php echo base_url()."index.php/pengguna/edit/" ?>' + id,
        type: 'GET',
        success: function(result) {
          $('#edit').html(result);
        },
        error: function(xhr, status, error) {
          $('#edit').html("Terjadi kesalahan!");
        }
      })
    }
  </script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#btn-simpan').attr('disabled', true);
      $('#nip').change(function() {
        var nip = $(this).val();
        $.ajax({
          url: '<?php echo base_url()."index.php/pengguna/cari_karyawan"; ?>',
          type: 'POST',
          data: {'nip': nip},
          success: function(result) {
            $('#nama').val(result);
            $('#btn-simpan').attr('disabled', false);
          },
          error: function(xhr, status, error) {
            $('#nama').val('');
            $('#btn-simpan').attr('disabled', true);
          }
        });
      });
    });
  </script>
</body>
</html>
