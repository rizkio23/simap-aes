<div class="page-holder w-100 d-flex flex-wrap">
  <div class="container-fluid px-xl-5">
    <h3 class="mt-5"><?php echo $judul; ?></h3>
    <?php
      function isSelected($value1, $value2)
      {
        return $value1==$value2?"selected":"";
      }
    ?>
    <?php if (isset($_SESSION['pesan'])) { ?>
    <div class="alert alert-block alert-info" role="alert">
    <button type="button" class="close" data-dismiss="alert">
      <i class="ace-icon fa fa-times"></i>
    </button>
    <?php echo $this->session->flashdata('pesan'); ?>
    </div>
    <?php } ?>
    <section class="py-5">
      <div class="row">
        <div class="col-lg-4 mb-5">
          <div class="card">
            <div class="card-header">
              <h3 class="h6 text-uppercase mb-0">Tambah Data Jadwal Inaktif</h3>
            </div>
            <div class="card-body">
              <form class="form-horizontal" method="post" action="<?php echo base_url().'index.php/master/inaktif_act/tambah' ?>">
                <input type="hidden" id='id' name="id" />
                <div class="form-group">       
                  <label class="form-control-label text-uppercase">Jenis</label>
                  <div class="select mb-3">
                    <select class="form-control" id='jenis' name="jenis" placeholder='Jenis'>
                      <?php foreach ($all_jenis as $j) {
                        echo "<option value='".$j->ID_JENIS."'>".$j->NAMA."</option>";
                      } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">       
                  <label class="form-control-label text-uppercase" for='masa'>Masa Inaktif (Tahun)</label>
                  <input type='number' id='masa' name="tahun" placeholder='XX' class='form-control' required="" />          
                </div>
                <div class="form-group">       
                    <button type="submit" class="btn btn-primary"><i class="ace-icon fa fa-check"></i> Simpan</button>
                    <button type="reset" class="btn btn-warning"><i class="ace-icon fa fa-undo"></i> Reset</button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <div class="col-lg-8 mb-5">
        <div class="card">
          <div class="card-header">
            <h6 class="text-uppercase mb-0">Daftar Jabatan</h6>
            </div>
            <div class="card-body ">                          
              <table class="table table-striped table-sm card-text table-center">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Jenis Surat</th>
                    <th>Masa Inaktif</th>
                    <th>Opsi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach($inaktif as $i) { ?>
                  <tr>
                    <th><?php echo $no; ?>.</th>
                    <td><?php echo $i->JENIS; ?></td>
                    <td><?php echo $i->MASA_AKTIF; ?> Tahun</td>
                    <td>
                      <button class="btn btn-sm btn-info" href="#modal-edit" data-toggle="modal"
                          onclick="edit('<?php echo $i->ID_INAKTIF; ?>', '<?php echo $i->ID_JENIS; ?>', '<?php echo $i->MASA_AKTIF; ?>')">EDIT</button>
                      <button class="btn btn-sm btn-danger" href="<?php echo base_url().'index.php/master/inaktif_act/hapus-'.$i->ID_INAKTIF; ?>"
                          onclick="return confirm('Anda yakin?');">HAPUS</button>
                    </td>
                  </tr>
                  <?php $no++; } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>  

<div id="modal-edit" class="modal fade" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header no-padding">
				<div class="table-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						<span class="white">&times;</span>
					</button>
					Edit Jadwal Inaktif
				</div>
			</div>
      <form class='form-horizontal' role='form' action='<?php echo base_url()."index.php/master/inaktif_act/ubah"; ?>' method='post'>
      <div class='modal-body no-padding'>
        <div class="form-group">
          <label class='col-sm-3 control-label no-padding-right' for='id-u'>ID</label>
          <div class='col-sm-9'>
            <input type='text' id='id-u' name="id-u" placeholder='ID' class='col-xs-10 col-sm-9' readonly="" required="" />
          </div>
        </div>
        <div class="form-group">
          <label class='col-sm-3 control-label no-padding-right' for='jenis-u'>Jenis</label>
          <div class='col-sm-9'>
            <select id='jenis-u' name="jenis-u" class='col-xs-10 col-sm-9' required="">
              <?php foreach ($all_jenis as $j) {
                echo "<option value='".$j->ID_JENIS."'>".$j->NAMA."</option>";
              } ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class='col-sm-3 control-label no-padding-right' for='masa-u'>Masa Retensi (Tahun)</label>
          <div class='col-sm-9'>
            <input type='number' id='masa-u' name="tahun-u" placeholder='XX' class='col-xs-10 col-sm-9' required="" />
          </div>
        </div>
      </div>
      <div class='modal-footer no-margin-top'>
        <button class='btn btn-sm btn-danger pull-left' data-dismiss='modal'>
          <i class='ace-icon fa fa-times'></i> Tutup
        </button>&nbsp;
        <button class='btn btn-primary btn-sm' type='submit'>
          <i class='ace-icon fa fa-check'></i> Simpan
        </button>
      </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  function edit(id, jenis, masa) {
    $('#id-u').val(id);
    $('#jenis-u').val(jenis);
    $('#masa-u').val(masa);
  }
</script>
