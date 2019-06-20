<?php
/**
 *
 */
class M_Riwayat_Inaktif extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }

  public function create($id, $surat, $inaktif, $tanggal1, $tanggal2)
  {
    return $this->db->insert(
      'riwayat_inaktif',
      array(
        'id' => $id,
        'id_surat' => $surat,
        'id_inaktif' => $inaktif,
        'tanggal_inaktif' => $tanggal1,
        'tanggal_aktif_kembali' => $tanggal2,
        // 'status' => $status
      )
    );
  }

  public function update($id, $surat, $inaktif, $tanggal1, $tanggal2, $status)
  {
    $this->db->where('id', $id);
    return $this->db->update(
      'riwayat_inaktif',
      array(
        'id_surat' => $surat,
        'id_inaktif' => $inaktif,
        'tanggal_inaktif' => $tanggal1,
        'tanggal_aktif_kembali' => $tanggal2,
        'status' => $status
      )
    );
  }

  public function update_surat($surat, $inaktif, $tanggal1, $tanggal2, $status)
  {
    $this->db->where('id_surat', $surat);
    return $this->db->update(
      'riwayat_inaktif',
      array(
        'id_inaktif' => $inaktif,
        'tanggal_inaktif' => $tanggal1,
        'tanggal_aktif_kembali' => $tanggal2,
        'status' => $status
      )
    );
  }

  

  public function change_status($id_surat, $status)
  {
    $this->db->where('id_surat', $id_surat);
    return $this->db->update('riwayat_inaktif', array('status' => $status));
  }

  public function reactivate($id)
  {
    $this->db->where('id', $id);
    $this->db->update(
      'riwayat_inaktif',
      array(
        //'tanggal_inaktif' => date("Y-m-d"),
        'tanggal_aktif_kembali' => date("Y-m-d"),
        'status' => 0
      )
    );
  }

  public function get_all()
  {
    return $this->db->get('riwayat_inaktif')->result();
  }

  public function get_id($id)
  {
    return $this->db->get_where('riwayat_inaktif', array('id' => $id))->result();
  }

  public function get_surat($surat)
  {
    return $this->db->get_where('riwayat_inaktif', array('id_surat' => $surat))->result();
  }

  public function delete($id)
  {
    $this->db->where('id', $id);
    return $this->db->delete('riwayat_inaktif');
  }

  public function delete_surat($surat)
  {
    $this->db->where('id_surat', $surat);
    return $this->db->delete('riwayat_inaktif');
  }

  public function get_status($status)
  {
    $this->db->select("surat.*, jenis_surat.NAMA as JENIS, lokasi.NAMA as LOKASI, riwayat_inaktif.*");
    $this->db->from("surat");
    $this->db->join("riwayat_inaktif", "surat.id_surat = riwayat_inaktif.id_surat");
    $this->db->join("lokasi", "surat.id_lokasi = lokasi.id_lokasi", "left");
    $this->db->join("jenis_surat", "surat.id_jenis = jenis_surat.id_jenis", "left");
    $this->db->where("riwayat_inaktif.status", $status);
    return $this->db->get()->result();
  }
}

?>
