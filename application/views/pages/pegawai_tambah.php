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
              <h3 class="h6 text-uppercase mb-0">Form Data Pegawai</h3>
            </div>
            <div class="card-body">
            <form method="post" action="<?php echo base_url().'index.php/master/pegawai_act/tambah'?>">
                <div class="form-group">
                  <label class="form-control-label text-uppercase" for='nip'>NIP</label>
                  <input class="form-control" type='text' id='nip' name='nip' placeholder='NIP' readonly="" required="" />
                </div>
                <div class="form-group">
                  <label class="form-control-label text-uppercase" for='nama'>Nama</label>
                  <input class="form-control" type='text' id='nama' name="nama" placeholder='Nama' required="" />
                </div>
                <div class="form-group">
                  <label class="form-control-label text-uppercase" for='tgl_1'>Tanggal Lahir</label>
                  <div class="input-group">
                        <input class="form-control" id="tgl_l" name="tgl_l" type="date" data-date-format="dd-mm-yyyy" value="<?php echo date('d-m-Y') ?>" />
                        <span class="input-group-addon">
                            <i class="fa fa-calendar bigger-110"></i>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-control-label text-uppercase" for='tgl_p'>Tanggal Pengangkatan</label>
                    <div class="input-group">
                        <input class="form-control" id="tgl_p" name="tgl_p" type="date" data-date-format="dd-mm-yyyy" value="<?php echo date('d-m-Y') ?>" />
                        <span class="input-group-addon">
                            <i class="fa fa-calendar bigger-110"></i>
                        </span>
                    </div>
                </div>
                <div class="form-group">       
                  <label class="form-control-label text-uppercase" for="jk">Jenis Kelamin</label>
                  <div class="select mb-3">
                    <select class="form-control" id='jk' name="jk" placeholder='Jenis Kelamin'>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">       
                  <label class="form-control-label text-uppercase" for="unit">Unit Kerja</label>
                  <div class="select mb-3">
                    <select class="form-control" id="unit" name="unit" placeholder='Unit Kerja'>
                        <?php foreach($unit_kerja as $uk) { ?>
                        <option value="<?php echo $uk->ID_UNIT; ?>"><?php echo $uk->NAMA; ?></option>
                        <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">       
                  <label class="form-control-label text-uppercase" for="jabatan">Jabatan</label>
                  <div class="select mb-3">
                    <select class="form-control" id="jabatan" name="jabatan" placeholder='Jabatan'>
                        <?php foreach($jabatan as $j) { ?>
                        <option value="<?php echo $j->ID_JABATAN; ?>"><?php echo $j->NAMA; ?></option>
                        <?php } ?>                    
                    </select>
                  </div>
                </div>
                <div class="form-group">       
                  <label class="form-control-label text-uppercase" for="alamat">Alamat</label>
                  <textarea name="alamat" id="alamat" placeholder="Alamat" class="form-control"></textarea>
                </div>  
                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <button class="btn btn-info" type="submit">
                            <i class="ace-icon fa fa-check bigger-110"></i>
                            Simpan
                        </button>
                        &nbsp; &nbsp; &nbsp;
                        <button class="btn" type="reset">
                            <i class="ace-icon fa fa-undo bigger-110"></i>
                            Reset
                        </button>
                    </div>
                </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>  