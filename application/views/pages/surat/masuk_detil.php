<div class="page-holder w-100 d-flex flex-wrap">
  <div class="container-fluid px-xl-5">
    <h3 class="mt-5"><?php echo $judul; ?></h3>
    <section class="py-5">
      <div class="row">
        <div class="col-lg-12 mb-5">
        <div class="card">
          <div class="card-header">
            <h6 class="text-uppercase mb-0">Detil Surat Masuk</h6>
            </div>
            <div class="card-body ">                          
              <div class="row">
                <div class="col-md-6">
                  <input type='hidden' id='id' name="id" placeholder='ID Surat' required="" readonly="" />
                  <div class="form-group">
                    <label class="form-control-label text-uppercase">Judul Kop Surat</label>
                    <input type='text' id='kop' class='form-control' value="<?php echo $surat[0]->JUDUL_KOP; ?>" disabled="" />
                  </div>
                  <div class="form-group">
                    <label class="form-control-label text-uppercase">Nomor Surat</label>
                    <input type='text' id='no' class='form-control' value="<?php echo $surat[0]->NOMOR; ?>" disabled="" />
                  </div>
                  <div class="form-group">
                    <label class="form-control-label text-uppercase">Tanggal Surat</label>
                    <input class="form-control" id="tgl" type="text" data-date-format="dd-mm-yyyy" value="<?php echo date("d-m-Y", strtotime($surat[0]->TANGGAL)); ?>" disabled=""/>
                  </div>
                  <div class="form-group">
                    <label class="form-control-label text-uppercase">Perihal Surat</label>
                    <input type='text' id='hal' class='form-control' value="<?php echo $surat[0]->PERIHAL; ?>" disabled=""/>
                  </div>
                  <div class="form-group">
                    <label class="form-control-label text-uppercase">Penerima</label>
                    <input type='text' id='kepada' class='form-control' value="<?php echo $surat[0]->KEPADA; ?>" disabled="" />
                  </div>
                  <div class="form-group">
                    <label class="form-control-label text-uppercase">Asal Instansi</label>
                    <input type='text' id='asal' placeholder='Asal Instansi' class='form-control' value="<?php echo $surat[0]->ASAL_INSTANSI; ?>" disabled="" />
                  </div>
                  <div class="form-group">
                    <label class="form-control-label text-uppercase">Tanggal Surat Masuk</label>
                    <input class="form-control" id="tgl_masuk" type="text" data-date-format="dd-mm-yyyy" value="<?php echo date("d-m-Y", strtotime($surat[0]->TANGGAL_MASUK)); ?>" disabled="" />
    						  </div>
                </div> 
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-control-label text-uppercase" for='jenis'>Jenis Surat</label>
                      <select class="form-control" disabled="">
                      <?php foreach ($jenis as $j) {
                        echo "<option>".$j->NAMA."</option>";
                      } ?>
                      </select>
              	  </div>
                  <div class="form-group">
                    <label class="form-control-label text-uppercase" for='inaktif'>Jadwal Inaktif</label>
                    <input value="<?php echo date("d-m-Y", strtotime($inaktif[0]->TANGGAL_INAKTIF)); ?>" placeholder='DD-MM-YYYY' class='form-control' disabled="" />
    						  </div>
                  <div class="form-group">
                    <label class="form-control-label text-uppercase" for='retensi'>Jadwal Retensi</label>
                    <input value="<?php echo date("d-m-Y", strtotime($retensi[0]->TANGGAL_RETENSI)); ?>" placeholder='DD-MM-YYYY' class='form-control' disabled="" />
    						  </div>
                  <div class="form-group">
                    <label class="form-control-label text-uppercase">Keterangan</label>
                    <textarea class='form-control' rows="9" disabled=""><?php echo $arsip_masuk[0]->KETERANGAN; ?></textarea>
    						  </div>
                  <div class="form-group">       
                    <a href="<?php echo base_url().'index.php/surat/masuk_list'; ?>">
                      <button type="button" class="btn btn-warning"><i class="ace-icon fa fa-undo"></i>Kembali</button>
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
