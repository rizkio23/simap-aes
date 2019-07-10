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
        <div class="col-lg-12 mb-5">
        <div class="card">
          <div class="card-header">
            <h6 class="text-uppercase mb-0">Form Surat Keluar</h6>
            </div>
            <div class="card-body ">                          
              <?php echo form_open_multipart('surat/simpan_keluar', array('class' => 'form-horizontal')); ?>
              <div class="row">
                <div class="col-md-6">
                  <input type='hidden' id='id' name="id" placeholder='ID Surat' required="" />
                  <div class="form-group">
                    <label class="form-control-label text-uppercase">Judul Kop Surat</label>
                    <input type='text' id='kop' name="kop" placeholder='Judul Kop Surat' class='form-control' required="" />
                  </div>
                  <div class="form-group">
                    <label class="form-control-label text-uppercase" for='kop'>Nomor Surat</label>
                    <input type='text' id='no' name="no" class='form-control' value="<?php echo "S-".$no."/WKN.8/KNL.01/".date("Y"); ?>" required=""  readonly=""/>
                  </div>
                  <div class="form-group">
                    <label class="form-control-label text-uppercase">Tanggal Surat</label>
                    <input class="form-control date-picker" id="tgl" name="tgl" type="date" data-date-format="dd-mm-yyyy" value="<?php echo date('d-m-Y') ?>" />
                  </div>
                  <div class="form-group">
                    <label class="form-control-label text-uppercase">Perihal Surat</label>
                    <input type='text' id='hal' name="hal" placeholder='Perihal' class='form-control' required="" />
                  </div>
                  <div class="form-group">
                    <label class="form-control-label text-uppercase">Pengirim</label>
                    <input type='text' id='dari' name="dari" placeholder='Dari' class='form-control' required="" />
                  </div>
                  <div class="form-group">
                    <label class="form-control-label text-uppercase">Penerima</label>
                    <input type='text' id='kepada' name="kepada" placeholder='Kepada' class='form-control' required="" />
                  </div>
                  <div class="form-group">
                    <label class="form-control-label text-uppercase">Asal Instansi</label>
                    <input type='text' id='asal' name="asal" placeholder='Asal Instansi' class='form-control' required="" />
                  </div>
                  <div class="form-group">
                    <label class="form-control-label text-uppercase">Tanggal Surat Masuk</label>
                    <input class="form-control" id="tgl_masuk" name="tgl_masuk" type="date" data-date-format="dd-mm-yyyy" value="<?php echo date('d-m-Y') ?>" />
    						  </div>
                </div>  

                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-control-label text-uppercase">Unggah Surat</label>
                    <input type='file' multiple="" name="surat" class='form-control' required="" />
    						  </div>
                  <div class="form-group">
                    <label class="form-control-label text-uppercase">Password Surat</label>
                    <input type='password' name="pass" class='form-control' required="" />
                  </div>
                  <div class="form-group">
                    <label class="form-control-label text-uppercase" for='jenis'>Jenis Surat</label>
                    <select id='jenis' name="jenis" class='form-control form-control' required="">
                      <option></option>
                      <?php foreach ($jenis as $j) {
                        echo "<option value='".$j->ID_JENIS."'>".$j->NAMA."</option>";
                      } ?>
                    </select>
    						  </div>
                  <div class="form-group">
                    <label class="form-control-label text-uppercase" for='inaktif'>Jadwal Inaktif</label>
                    <input type='text' id='inaktif' name="inaktif" placeholder='DD-MM-YYYY' class='form-control' required="" readonly="" />
    						  </div>
                  <div class="form-group">
                    <label class="form-control-label text-uppercase" for='retensi'>Jadwal Retensi</label>
                    <input type='text' id='retensi' name="retensi" placeholder='DD-MM-YYYY' class='form-control' required="" readonly="" />
    						  </div>
                  <div class="form-group">
                    <label class="form-control-label text-uppercase">Keterangan</label>
                    <textarea id='ket' name="ket" placeholder='Keterangan' class='form-control' rows="9"></textarea>
    						  </div>
                  <div class="form-group">       
                    <button type="submit" name="enkripfile" class="btn btn-primary"><i class="ace-icon fa fa-check"></i> Simpan</button>
                    <a href="<?php echo base_url().'index.php/surat/masuk_list'; ?>">
                      <button type="button" class="btn btn-warning"><i class="ace-icon fa fa-undo"></i> Lihat Daftar Surat Masuk</button>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>  