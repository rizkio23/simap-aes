<?php
class Surat extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('encrypt');
    $this->load->library('aes');
    $this->aesinitvector = openssl_random_pseudo_bytes(16);
  }

  public function masuk()
  {
    $this->m_security->check();
    $data['judul']  = "Surat Masuk";
    $data['konten'] = "pages/surat/masuk";
    $data['jenis']  = $this->m_jenis->get_all();
    $data['lokasi'] = $this->m_lokasi->get_all();
    $data['media']  = $this->m_media->get_all();
    $data['id']     = $this->m_security->gen_ai_id('surat', 'id_surat');
    return $this->load->view('index', $data);
  }

  public function masuk_list()
  {
    $this->m_security->check();
    $data['judul'] = "Lihat Arsip Masuk";
    $data['konten'] = "pages/surat/masuk_list";
    // $data['surat'] = $this->m_arsip_masuk->get_custom(array("nip" => $this->session->userdata("nip")));
    $data['surat'] = $this->m_arsip_masuk->get_all();
    return $this->load->view('index', $data);
  }

  public function masuk_detil($id)
  {
    $this->m_security->check();
    $data['judul'] = "Detil Arsip Masuk";
    $data['konten'] = "pages/surat/masuk_detil";
    $data['jenis'] = $this->m_jenis->get_all();
    $data['surat'] = $this->m_surat->get_id($id);
    $data['arsip_masuk'] = $this->m_arsip_masuk->get_id($id);
    $data['inaktif'] = $this->m_riwayat_inaktif->get_surat($id);
    $data['retensi'] = $this->m_riwayat_retensi->get_surat($id);
    $data['upload'] = $this->m_upload->get_surat($id);
    return $this->load->view('index', $data);
  }

  public function masuk_ubah($id)
  {
    $this->m_security->check();
    $data['judul'] = "Ubah Arsip Masuk";
    $data['konten'] = "pages/surat/masuk_ubah";

    $data['jenis'] = $this->m_jenis->get_all();
    $data['lokasi'] = $this->m_lokasi->get_all();
    $data['media'] = $this->m_media->get_all();
    $data['surat'] = $this->m_surat->get_id($id);
    $data['arsip_masuk'] = $this->m_arsip_masuk->get_custom(array("surat.id_surat" => $id));
    $data['inaktif'] = $this->m_riwayat_inaktif->get_surat($id);
    $data['retensi'] = $this->m_riwayat_retensi->get_surat($id);
    $data['upload'] = $this->m_upload->get_surat($id);

    return $this->load->view('index', $data);
  }

  public function masuk_hapus($id)
  {
    $this->m_security->check();
    // delete file from directory
    $document_root = $_SERVER['DOCUMENT_ROOT'];
    $upload = $this->m_upload->get_surat($id);
    foreach ($upload as $u) {
      $url_segment = explode("/", $u->PATH);
      $max_idx = sizeof($url_segment);
      $url = $document_root."/"
        .$url_segment[$max_idx-3]."/"
        .$url_segment[$max_idx-2]."/"
        .$url_segment[$max_idx-1]."/"
        .$url_segment[$max_idx];
      unlink($url);
    }

    $this->m_arsip_masuk->delete_surat($id);
    $this->m_upload->delete_surat($id);
    $this->m_penggandaan->delete_surat($id);
    $this->m_riwayat_retensi->delete_surat($id);
    $this->m_riwayat_inaktif->delete_surat($id);
    $this->m_surat->delete($id);

    redirect('surat/masuk_list');
  }

  // surat keluar
  public function keluar()
  {
    $this->m_security->check();
    $data['judul'] = "Surat Keluar";
    $data['konten'] = "pages/surat/keluar";

    $data['jenis'] = $this->m_jenis->get_all();
    $data['lokasi'] = $this->m_lokasi->get_all();
    $data['media'] = $this->m_media->get_all();

    $data['id'] = $this->m_security->gen_ai_id('surat', 'id_surat');
    $data['no'] = $this->m_arsip_keluar->get_no();

    return $this->load->view('index', $data);
  }

  public function keluar_list()
  {
    $this->m_security->check();
    $data['judul'] = "Lihat Arsip Keluar";
    $data['konten'] = "pages/surat/keluar_list";

    $data['surat'] = $this->m_arsip_keluar->get_custom(array("nip" => $this->session->userdata("nip")));

    return $this->load->view('index', $data);
  }

  public function keluar_detil($id)
  {
    $this->m_security->check();
    $data['judul'] = "Detil Arsip Keluar";
    $data['konten'] = "pages/surat/keluar_detil";

    $data['jenis'] = $this->m_jenis->get_all();
    $data['lokasi'] = $this->m_lokasi->get_all();
    $data['media'] = $this->m_media->get_all();
    $data['surat'] = $this->m_surat->get_id($id);
    $data['arsip'] = $this->m_arsip_keluar->get_custom(array("surat.id_surat" => $id));
    $data['inaktif'] = $this->m_riwayat_inaktif->get_surat($id);
    $data['retensi'] = $this->m_riwayat_retensi->get_surat($id);
    $data['upload'] = $this->m_upload->get_surat($id);

    return $this->load->view('index', $data);
  }

  public function keluar_ubah($id)
  {
    $this->m_security->check();
    $data['judul'] = "Ubah Arsip Keluar";
    $data['konten'] = "pages/surat/keluar_ubah";

    $data['jenis'] = $this->m_jenis->get_all();
    $data['lokasi'] = $this->m_lokasi->get_all();
    $data['media'] = $this->m_media->get_all();
    $data['surat'] = $this->m_surat->get_id($id);
    $data['arsip'] = $this->m_arsip_keluar->get_custom(array("surat.id_surat" => $id));
    $data['inaktif'] = $this->m_riwayat_inaktif->get_surat($id);
    $data['retensi'] = $this->m_riwayat_retensi->get_surat($id);
    $data['upload'] = $this->m_upload->get_surat($id);

    return $this->load->view('index', $data);
  }

  public function keluar_hapus($id)
  {
    $this->m_security->check();
    // delete file from directory
    $document_root = $_SERVER['DOCUMENT_ROOT'];
    $upload = $this->m_upload->get_surat($id);
    foreach ($upload as $u) {
      $url_segment = explode("/", $u->PATH);
      $max_idx = sizeof($url_segment);
      $url = $document_root."/"
        .$url_segment[$max_idx-3]."/"
        .$url_segment[$max_idx-2]."/"
        .$url_segment[$max_idx-1]."/"
        .$url_segment[$max_idx];
      unlink($url);
    }

    $this->m_arsip_keluar->delete_surat($id);
    $this->m_upload->delete_surat($id);
    $this->m_penggandaan->delete_surat($id);
    $this->m_riwayat_retensi->delete_surat($id);
    $this->m_riwayat_inaktif->delete_surat($id);
    $this->m_surat->delete($id);

    redirect('surat/keluar_list');
  }

  public function jadwal_inaktif($jenis = null, $tgl_masuk = null)
  {
    if (!empty($jenis) && !empty($tgl_masuk)) {
      $inaktif = $this->m_inaktif->get_jenis($jenis);
      if (count($inaktif) > 0) {
        $masa_aktif = $inaktif[0]->MASA_AKTIF;
        $tahun = date("Y", strtotime($tgl_masuk)) + $masa_aktif;
        echo date("d-m", strtotime($tgl_masuk))."-".$tahun;
      }
    } else {
      echo "";
    }
  }

  public function jadwal_retensi($jenis = null, $tgl_masuk = null)
  {
    if (!empty($jenis) && !empty($tgl_masuk)) {
      $retensi = $this->m_retensi->get_jenis($jenis);
      $inaktif = $this->m_inaktif->get_jenis($jenis);
      if (count($retensi) > 0 && count($inaktif) > 0) {
        $masa_aktif = $inaktif[0]->MASA_AKTIF;
        $masa_retensi = $retensi[0]->MASA_RETENSI + $masa_aktif;
        $tahun = date("Y", strtotime($tgl_masuk)) + $masa_retensi;
        echo date("d-m", strtotime($tgl_masuk))."-".$tahun;
      }
    } else {
      echo "";
    }
  }

  public function simpan_masuk()
  {
    $this->m_security->check();
    $id_surat = $this->input->post('id');
    $id_jenis = $this->input->post('jenis');
    $judul_kop = $this->input->post('kop');
    $nomor = $this->input->post('no');
    $tanggal = date("Y-m-d", strtotime($this->input->post('tgl')));
    $perihal = $this->input->post('hal');
    $dari = $this->input->post('dari');
    $kepada = $this->input->post('kepada');
    $asal_instansi = $this->input->post('asal');
    $tanggal_masuk = date("Y-m-d", strtotime($this->input->post('tgl_masuk')));
    $keterangan = $this->input->post('ket');
    // post berkas
		$enkrip = $this->input->post("enkripfile");
    $password = $this->input->post("pass");

    // input into surat master table --> surat
    $query = $this->m_surat->create($id_surat, $id_jenis, $judul_kop, $nomor, $tanggal, $perihal, $dari, $kepada, $asal_instansi, $tanggal_masuk);
    if ($query > 0) {
      // insert into arsip masuk table
      $id_arsip = $this->m_security->gen_ai_id("arsip_masuk", "id");
      $nip = $this->session->userdata('nip');
      $this->m_arsip_masuk->create($id_arsip, $nip, $id_surat, $tanggal, $keterangan);

      // insert into riwayat retensi table
      $id_retensi = $this->m_security->gen_ai_id("riwayat_retensi", "id");
      $tgl_retensi = date("Y-m-d", strtotime($this->input->post('retensi')));
      $retensi = $this->m_retensi->get_jenis($id_jenis)[0]->ID_JADWAL;
      $this->m_riwayat_retensi->create($id_retensi, $id_surat, $retensi, $tgl_retensi, 0);

      // insert into riwayat inaktif table
      $id_inaktif = $this->m_security->gen_ai_id("riwayat_inaktif", "id");
      $tgl_inaktif = date("Y-m-d", strtotime($this->input->post('inaktif')));
      $inaktif = $this->m_inaktif->get_jenis($id_jenis)[0]->ID_INAKTIF;
      $this->m_riwayat_inaktif->create($id_inaktif, $id_surat, $inaktif, $tgl_inaktif, null, 0);

      // insert into disposisi table
      $id_disposisi = $this->m_security->gen_ai_id("disposisi", "id");
      $this->m_disposisi->create($id_disposisi, $nip, $id_surat, $kepada, $tanggal_masuk);

      // start upload file surat
      if(isset($enkrip) && !empty($password)){

        $writedir = $_SERVER['DOCUMENT_ROOT']."/simap/uploads/smasuk";
        $id_upload = $this->m_security->gen_ai_id("upload", "id_upload");
        $passhash = hash("SHA256", $password, true); //password di hash dengan SHA256
        $aesinitv = $this->aesinitvector;
        $namefile = $_FILES["surat"]["name"];
    
          if (($_FILES["surat"]["error"] < 1) && ($_FILES["surat"]["size"] < 3145728)){ //max size file
            while (1)
            {
              $pinncode = mt_rand(10,100000);
              $enkripname = $pinncode."_".$_FILES["surat"]["name"].".enc";
              $filename = ($writedir."/".$enkripname);
              if (!file_exists($filename)) { break; }
            }
            $filesize = $_FILES['surat']['tmp_name'];
            $filesource = fopen($_FILES["surat"]["tmp_name"], "rb");
            $filenew = fopen($filename, "wb");

            $data_insert = array(
              'id_upload' => $id_upload,
              'id_surat' => $id_surat,
              'nama_dokumen' => $namefile,
              'dokumen_id' => $pinncode,
              'nama_enkrip' => $enkripname
            );
            $this->db->insert('upload', $data_insert);
            if (($filesource !== false) && ($filenew !== false)){
              fwrite($filenew, "".$_FILES["surat"]["name"].""); # filename as string (unknown length)
              fwrite($filenew, "\1"); # non-printable separator (1 byte)
              fwrite($filenew, "".$_FILES["surat"]["size"].""); # filesize in bytes (unknown length)
              fwrite($filenew, "\1"); # non-printable separator (1 byte)
              fwrite($filenew, "enkrip"); # filename as string (unknown length)
              fwrite($filenew, "\1"); # non-printable separator (1 byte)
              $magicstring = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $passhash, "magicstring", MCRYPT_MODE_CBC, $aesinitv);
              fwrite($filenew, $magicstring); # encrypted magic string (16 bytes)
              fwrite($filenew, $aesinitv); # initialization vector (16 bytes)
    
              //proses enkripsi//
              $filesourcedata = fread($filesource,filesize($filesize));
              $aes = new AesCtr();
              $enkripdata = $aes->encrypt($filesourcedata, $passhash, 128);
              $encodedata = base64_encode($enkripdata); //hasil enkripsi di encode dengan BASE64
              fwrite($filenew, $encodedata);
            
              fclose($filenew);
              fclose($filesource);
              // $data['success'] = "Enkripsi File Berhasil";
            }
        }else{
            $data['alert'] = "Enkripsi File Gagal";
        }
      }
    }
    redirect('/surat/masuk');
  }

  public function ubah_masuk()
  {
    $this->m_security->check();
    // get values from input control
    $id_surat = $this->input->post('id');
    $id_lokasi = $this->input->post('lokasi');
    $id_jenis = $this->input->post('jenis');
    $id_media = $this->input->post('media');
    $judul_kop = $this->input->post('kop');
    $nomor = $this->input->post('no');
    $tanggal = date("Y-m-d", strtotime($this->input->post('tgl')));
    $perihal = $this->input->post('hal');
    $dari = $this->input->post('dari');
    $kepada = $this->input->post('kepada');
    $asal_instansi = $this->input->post('asal');
    $tanggal_masuk = date("Y-m-d", strtotime($this->input->post('tgl_masuk')));
    $keterangan = $this->input->post('ket');
    

    // update surat master table --> surat
    $query = $this->m_surat->update($id_surat, $id_lokasi, $id_jenis, $id_media, $judul_kop, $nomor, $tanggal,
      $perihal, $dari, $kepada, $asal_instansi, $tanggal_masuk);
    if ($query > 0) {
      // update arsip masuk table
      $nip = $this->session->userdata('nip');
      $this->m_arsip_masuk->update_surat($nip, $id_surat, $tanggal, $keterangan);

      // update riwayat retensi table
      $tgl_retensi = date("Y-m-d", strtotime($this->input->post('retensi')));
      $retensi = $this->m_retensi->get_jenis($id_jenis)[0]->ID_JADWAL;
      $this->m_riwayat_retensi->update_surat($id_surat, $retensi, $tgl_retensi);

      // update riwayat inaktif table
      $tgl_inaktif = date("Y-m-d", strtotime($this->input->post('inaktif')));
      $inaktif = $this->m_inaktif->get_jenis($id_jenis)[0]->ID_INAKTIF;
      $this->m_riwayat_inaktif->update_surat($id_surat, $inaktif, $tgl_inaktif, "");

      // start upload file surat
      $this->load->library('upload');
      $config['upload_path'] = './uploads/surat/';
      $config['allowed_types'] = 'jpg|png|pdf|doc|docx|xsl|xslx';
      //$config['overwrite'] = FALSE;
      $config['max_size'] = 0;
      $this->upload->initialize($config);

      if ($this->upload->do_multi_upload('surat')) {
        $uploaded_files = $this->upload->get_multi_upload_data();
        foreach ($uploaded_files as $meta => $file) {
          $id_upload = $this->m_security->gen_ai_id("upload", "id_upload");
          $path = base_url().'uploads/surat/'.$file['file_name'];
          $this->m_upload->create($id_upload, $id_surat, $path);
          //echo $id_upload.", ".$id_surat.", ".$path."<br>";
        }
      }
      // end upload file surat
    }
    redirect('/surat/masuk_list');
  }

  public function hapus_upload($id_upload, $id_surat, $jenis = "masuk")
  {
    $this->m_security->check();
    // delete file from directory
    $document_root = $_SERVER['DOCUMENT_ROOT'];
    $upload = $this->m_upload->get_id($id_upload);
    foreach ($upload as $u) {
      $url_segment = explode("/", $u->PATH);
      $max_idx = sizeof($url_segment);
      $url = $document_root."/"
        .$url_segment[$max_idx-3]."/"
        .$url_segment[$max_idx-2]."/"
        .$url_segment[$max_idx-1]."/"
        .$url_segment[$max_idx];
      unlink($url);
    }

    // delete record from database
    $this->m_upload->delete($id_upload);

    if ($jenis == "masuk") {
      redirect("/surat/masuk_ubah/".$id_surat);
    } else {
      redirect("/surat/keluar_ubah/".$id_surat);
    }
  }

  public function simpan_keluar()
  {
    $this->m_security->check();
    // get values from input control
    $id_surat = $this->input->post('id');
    $id_jenis = $this->input->post('jenis');
    $judul_kop = $this->input->post('kop');
    $nomor = $this->input->post('no');
    $tanggal = date("Y-m-d", strtotime($this->input->post('tgl')));
    $perihal = $this->input->post('hal');
    $dari = $this->input->post('dari');
    $kepada = $this->input->post('kepada');
    $asal_instansi = $this->input->post('asal');
    $tanggal_masuk = date("Y-m-d", strtotime($this->input->post('tgl_masuk')));
    $keterangan = $this->input->post('ket');
    // post berkas
		$enkrip = $this->input->post("enkripfile");
    $password = $this->input->post("pass");
    // input into surat master table --> surat
    $query = $this->m_surat->create($id_surat, $id_lokasi, $id_jenis, $id_media, $judul_kop, $nomor, $tanggal,
      $perihal, $dari, $kepada, $asal_instansi, $tanggal_masuk);
    if ($query > 0) {
      // insert into arsip keluar table
      $id_arsip = $this->m_security->gen_ai_id("arsip_keluar", "id");
      $nip = $this->session->userdata('nip');
      $this->m_arsip_keluar->create($id_arsip, $nip, $id_surat, $tanggal, $keterangan);
      // insert into riwayat retensi table
      $id_retensi = $this->m_security->gen_ai_id("riwayat_retensi", "id");
      $tgl_retensi = date("Y-m-d", strtotime($this->input->post('retensi')));
      $retensi = $this->m_retensi->get_jenis($id_jenis)[0]->ID_JADWAL;
      $this->m_riwayat_retensi->create($id_retensi, $id_surat, $retensi, $tgl_retensi, 0);
      //insert into riwayat inaktif table
      $id_inaktif = $this->m_security->gen_ai_id("riwayat_inaktif", "id");
      $tgl_inaktif = date("Y-m-d", strtotime($this->input->post('inaktif')));
      $inaktif = $this->m_inaktif->get_jenis($id_jenis)[0]->ID_INAKTIF;
      $this->m_riwayat_inaktif->create($id_inaktif, $id_surat, $inaktif, $tgl_inaktif, null, 0);
      // start upload file surat
      if(isset($enkrip) && !empty($password)){
        $writedir = $_SERVER['DOCUMENT_ROOT']."/simap/uploads/skeluar";
        $id_upload = $this->m_security->gen_ai_id("upload", "id_upload");
        $passhash = hash("SHA256", $password, true); //password di hash dengan SHA256
        $aesinitv = $this->aesinitvector;
        $namefile = $_FILES["surat"]["name"];
          if (($_FILES["surat"]["error"] < 1) && ($_FILES["surat"]["size"] < 3145728)){ //max size file
            while (1)
            {
              $pinncode = mt_rand(10,100000);
              $enkripname = $pinncode."_".$_FILES["surat"]["name"].".enc";
              $filename = ($writedir."/".$enkripname);
              if (!file_exists($filename)) { break; }
            }
            $filesize = $_FILES['surat']['tmp_name'];
            $filesource = fopen($_FILES["surat"]["tmp_name"], "rb");
            $filenew = fopen($filename, "wb");
            // insert data to db
            $data_insert = array(
              'id_upload' => $id_upload,
              'id_surat' => $id_surat,
              'nama_dokumen' => $namefile,
              'dokumen_id' => $pinncode,
              'nama_enkrip' => $enkripname
            );
            $this->db->insert('upload', $data_insert);
            if (($filesource !== false) && ($filenew !== false)){
              fwrite($filenew, "".$_FILES["surat"]["name"].""); # filename as string (unknown length)
              fwrite($filenew, "\1"); # non-printable separator (1 byte)
              fwrite($filenew, "".$_FILES["surat"]["size"].""); # filesize in bytes (unknown length)
              fwrite($filenew, "\1"); # non-printable separator (1 byte)
              fwrite($filenew, "enkrip"); # filename as string (unknown length)
              fwrite($filenew, "\1"); # non-printable separator (1 byte)
              $magicstring = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $passhash, "magicstring", MCRYPT_MODE_CBC, $aesinitv);
              fwrite($filenew, $magicstring); # encrypted magic string (16 bytes)
              fwrite($filenew, $aesinitv); # initialization vector (16 bytes)
              //proses enkripsi
              $filesourcedata = fread($filesource,filesize($filesize));
              $aes = new AesCtr();
              $enkripdata = $aes->encrypt($filesourcedata, $passhash, 128);
              $encodedata = base64_encode($enkripdata); //hasil enkripsi di encode dengan BASE64
              fwrite($filenew, $encodedata);
              fclose($filenew);
              fclose($filesource);
              // $data['success'] = "Enkripsi File Berhasil";
            }
        }else{
            $data['alert'] = "Enkripsi File Gagal";
        }
      }
      // end upload file surat
    }

    redirect('/surat/keluar');
  }

  public function ubah_keluar()
  {
    $this->m_security->check();
    // get values from input control
    $id_surat = $this->input->post('id');
    $id_lokasi = $this->input->post('lokasi');
    $id_jenis = $this->input->post('jenis');
    $id_media = $this->input->post('media');
    $judul_kop = $this->input->post('kop');
    $nomor = $this->input->post('no');
    $tanggal = date("Y-m-d", strtotime($this->input->post('tgl')));
    $perihal = $this->input->post('hal');
    $dari = $this->input->post('dari');
    $kepada = $this->input->post('kepada');
    $asal_instansi = $this->input->post('asal');
    $tanggal_masuk = date("Y-m-d", strtotime($this->input->post('tgl_masuk')));
    $keterangan = $this->input->post('ket');

    // update surat master table --> surat
    $query = $this->m_surat->update($id_surat, $id_lokasi, $id_jenis, $id_media, $judul_kop, $nomor, $tanggal,
      $perihal, $dari, $kepada, $asal_instansi, $tanggal_masuk);
    if ($query > 0) {
      // update arsip keluar table
      $nip = $this->session->userdata('nip');
      $this->m_arsip_keluar->update_surat($nip, $id_surat, $tanggal, $keterangan);

      // update riwayat retensi table
      $tgl_retensi = date("Y-m-d", strtotime($this->input->post('retensi')));
      $retensi = $this->m_retensi->get_jenis($id_jenis)[0]->ID_JADWAL;
      $this->m_riwayat_retensi->update_surat($id_surat, $retensi, $tgl_retensi);

      // update riwayat inaktif table
      $tgl_inaktif = date("Y-m-d", strtotime($this->input->post('inaktif')));
      $inaktif = $this->m_inaktif->get_jenis($id_jenis)[0]->ID_INAKTIF;
      $this->m_riwayat_inaktif->update_surat($id_surat, $inaktif, $tgl_inaktif, "");

      // start upload file surat





    }
    redirect('/surat/keluar_list');
  }
}

?>
