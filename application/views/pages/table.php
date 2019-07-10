<div class="page-holder w-100 d-flex flex-wrap">
  <div class="container-fluid px-xl-5">
    <h3 class="mt-5"><?php echo $judul; ?></h3>
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
              <h3 class="h6 text-uppercase mb-0">Tambah Data Jabatan</h3>
            </div>
            <div class="card-body">

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

              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>  


<div id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
  <div role="document" class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 id="exampleModalLabel" class="modal-title">Edit Jabatan</h4>
        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <form role='form' action='<?php echo base_url()."index.php/master/jabatan_act/ubah"; ?>' method='post'>
          <input type='hidden' id='id-u' name="id-u" placeholder='ID' readonly="" required="" />
          <div class="form-group">
            <label>Nama</label>
            <input type='text' id='nama-u' name="nama-u" placeholder='Nama'class="form-control" required="" />
          </div>
          <div class="form-group">       
            <label class="form-control-label text-uppercase">Kepala</label>
            <div class="select mb-3">
              <select class="form-control" id='kepala-u' name="kepala-u" placeholder='Kepala'>
                <?php foreach ($jabatan as $j) { ?>
                <option value="<?php echo $j->ID_JABATAN ?>"><?php echo $j->NAMA; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-group">       
            <label class="form-control-label text-uppercase">Disposisi</label>
            <div class="select mb-3">
              <select class="form-control" id='disposisi-u' name="disposisi-u" placeholder='Disposisi'>
                <option value="0">Tidak</option>
                <option value="1">Ya</option>
              </select>
            </div>
          </div>
          <div class="form-group">       
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-secondary">Tutup</button>
        <input type="submit" value="Simpan" class="btn btn-primary">
      </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  function edit(id, nama, kepala, disposisi) {
    $('#id-u').val(id);
    $('#nama-u').val(nama);
    $('#kepala-u').val(kepala);
    $('#disposisi-u').val(disposisi);
  }
</script>


<!-- EXPLODE -->

<div class="widget-box">
  <div class="widget-header widget-header-flat">
    <h4 class="widget-title">Daftar Arsip Surat</h4>
  </div>
  <div class="widget-body">
    <div class="widget-main">
      <ol>
        <?php
        $idx = 1;
        foreach ($upload as $u) {
          $url_segment = explode("/", $u->PATH);
          echo "<li>".$url_segment[6]." <br>
            <a href='".$u->PATH."' target='_blank'>[Lihat]</a></li>";
          $idx++;
        }
        ?>
      </ol>
    </div>
  </div>
</div>



<!-- MULTIPLE FORM -->
<h1><?php echo $judul; ?></h1><hr>
<?php if (isset($_SESSION['pesan'])) { ?>
  <div class="alert alert-block alert-info" role="alert">
    <button type="button" class="close" data-dismiss="alert">
      <i class="ace-icon fa fa-times"></i>
    </button>
    <?php echo $this->session->flashdata('pesan'); ?>
  </div>
<?php } ?>
<?php echo form_open_multipart('surat/simpan_masuk', array('class' => 'form-horizontal')); ?>
<!--<form action="<?php //echo base_url().'index.php/surat/do_upload'; ?>" method="post" class="form-horizontal">-->
  <div class="widget-box">
    <div class="widget-header widget-header-flat">
			<h4 class="widget-title">Form Surat Masuk</h4>
		</div>
    <div class="widget-body">
  		<div class="widget-main">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label class='col-sm-4 control-label no-padding-right' for='id'>ID Surat</label>
              <div class='col-sm-8'>
                <input type='text' id='id' name="id" placeholder='ID Surat'
                  class='form-control' value="<?php echo $id; ?>" required="" readonly="" />
              </div>
            </div>
            <div class="form-group">
              <label class='col-sm-4 control-label no-padding-right' for='kop'>Judul Kop Surat</label>
              <div class='col-sm-8'>
                <input type='text' id='kop' name="kop" placeholder='Judul Kop Surat' class='form-control' required="" />
              </div>
            </div>
            <div class="form-group">
              <label class='col-sm-4 control-label no-padding-right' for='no'>Nomor Surat</label>
              <div class='col-sm-8'>
                <input type='text' id='no' name="no" placeholder='Nomor Surat' class='form-control' required="" />
              </div>
            </div>
            <div class="form-group">
              <label class='col-sm-4 control-label no-padding-right' for='tgl'>Tanggal Surat</label>
              <div class='col-sm-5'>
                <div class="input-group">
    							<input class="form-control date-picker" id="tgl" name="tgl" type="text"
                  data-date-format="dd-mm-yyyy" value="<?php echo date('d-m-Y') ?>" />
    							<span class="input-group-addon">
    								<i class="fa fa-calendar bigger-110"></i>
    							</span>
    						</div>
              </div>
            </div>
            <div class="form-group">
              <label class='col-sm-4 control-label no-padding-right' for='hal'>Perihal</label>
              <div class='col-sm-8'>
                <input type='text' id='hal' name="hal" placeholder='Perihal' class='form-control' required="" />
              </div>
            </div>
            <div class="form-group">
              <label class='col-sm-4 control-label no-padding-right' for='dari'>Dari</label>
              <div class='col-sm-8'>
                <input type='text' id='dari' name="dari" placeholder='Dari' class='form-control' required="" />
              </div>
            </div>
            <div class="form-group">
              <label class='col-sm-4 control-label no-padding-right' for='kepada'>Kepada</label>
              <div class='col-sm-8'>
                <input type='text' id='kepada' name="kepada" placeholder='Kepada' class='form-control' required="" />
              </div>
            </div>
            <div class="form-group">
              <label class='col-sm-4 control-label no-padding-right' for='asal'>Asal Instansi</label>
              <div class='col-sm-8'>
                <input type='text' id='asal' name="asal" placeholder='Asal Instansi' class='form-control' required="" />
              </div>
            </div>
            <!--<div class="form-group">
              <label class='col-sm-4 control-label no-padding-right' for='balasan'>Balasan Dari Surat</label>
              <div class='col-sm-8'>
                <div class="input-group">
    							<input class="form-control" id="balasan" placeholder="Cari" name="balasan" type="text" />
    							<span class="input-group-btn">
    								<button type="button" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-search bigger-110"></i></button>
    							</span>
    						</div>
              </div>
            </div>-->
            <div class="form-group">
              <label class='col-sm-4 control-label no-padding-right' for='tgl_masuk'>Tanggal Masuk Surat</label>
              <div class='col-sm-5'>
                <div class="input-group">
    							<input class="form-control date-picker" id="tgl_masuk" name="tgl_masuk" type="text"
                  data-date-format="dd-mm-yyyy" value="<?php echo date('d-m-Y') ?>" />
    							<span class="input-group-addon">
    								<i class="fa fa-calendar bigger-110"></i>
    							</span>
    						</div>
              </div>
            </div>
            <div class="form-group">
              <label class='col-sm-4 control-label no-padding-right' for='surat'>Unggah Surat</label>
              <div class='col-sm-8'>
                <input type='file' multiple="" id='surat' name="surat[]" class='form-control' required="" />
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class='col-sm-4 control-label no-padding-right' for='media'>Media</label>
              <div class='col-sm-8'>
                <select id='media' name="media" class='form-control form-control' required="">
                  <option></option>
                  <?php foreach ($media as $m) {
                    echo "<option value='".$m->ID_MEDIA."'>".$m->NAMA."</option>";
                  } ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class='col-sm-4 control-label no-padding-right' for='jenis'>Jenis Surat</label>
              <div class='col-sm-8'>
                <select id='jenis' name="jenis" class='form-control form-control' required="">
                  <option></option>
                  <?php foreach ($jenis as $j) {
                    echo "<option value='".$j->ID_JENIS."'>".$j->NAMA."</option>";
                  } ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class='col-sm-4 control-label no-padding-right' for='inaktif'>Jadwal Inaktif</label>
              <div class='col-sm-8'>
                <input type='text' id='inaktif' name="inaktif" placeholder='DD-MM-YYYY' class='form-control' required="" readonly="" />
              </div>
            </div>
            <div class="form-group">
              <label class='col-sm-4 control-label no-padding-right' for='retensi'>Jadwal Retensi</label>
              <div class='col-sm-8'>
                <input type='text' id='retensi' name="retensi" placeholder='DD-MM-YYYY' class='form-control' required="" readonly="" />
              </div>
            </div>
            <div class="form-group">
              <label class='col-sm-4 control-label no-padding-right' for='lokasi'>Lokasi Penyimpanan</label>
              <div class='col-sm-8'>
                <select id='lokasi' name="lokasi" class='form-control form-control' required="">
                  <option></option>
                  <?php foreach ($lokasi as $l) {
                    echo "<option value='".$l->ID_LOKASI."'>".$l->NAMA."</option>";
                  } ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class='col-sm-4 control-label no-padding-right' for='ket'>Keterangan</label>
              <div class='col-sm-8'>
                <textarea id='ket' name="ket" placeholder='Keterangan' class='form-control' rows="9"></textarea>
              </div>
            </div>
            <div class="form-group">
  						<div class="col-md-offset-4 col-md-8">
                <a href="<?php echo base_url().'index.php/surat/masuk_list'; ?>">Lihat Data</a>
  							<button class="btn btn-info pull-right" type="submit">
  								<i class="ace-icon fa fa-check bigger-110"></i>
  								Simpan
  							</button>
  						</div>
  					</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>


