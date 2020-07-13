<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kesehatan extends CI_Controller {

  private $_theme;

  public function __construct()
  {
    parent::__construct();
    $this->load->library('frontend');
    $this->load->helper('profil');

    $this->frontend->insertPengunjung();
    $this->_theme = 'frontend/themes/dlh';

    $this->field_group = array(
                                "prasarana" => array("prasarana"),
                                "sarana" => array("sarana"),
                                /*"kesehatan_keluarga" => array("status_gizi", "dengue", "penyakit", "kesehatan"),*/
                                "status_gizi" => array("status_gizi"),
                                "balita" => array("balita"),
                                "baduta" => array("baduta"),
                                "dengue" => array("dengue"),
                                "penyakit" => array("penyakit"),
                                "kesehatan" => array("kesehatan")
                              );

    $this->field_labels = array(
                                "prasarana" => array(
                                                  "labels"    => array("Puskesmas", "Data Kunjungan Puskesmas", "Klinik Pratama", "Klinik Utama", "Apotek", "Posyandu", "Praktek Mandiri Dokter", "Praktek Mandiri Dokter Gigi", "Praktek Mandiri Bidan"),
                                                  "nilai"     => array("Puskesmas", "Data Kunjungan Puskesmas", "Klinik Pratama", "Klinik Utama", "Apotek", "Posyandu", "Praktek Mandiri Dokter", "Praktek Mandiri Dokter Gigi", "Praktek Mandiri Bidan")
                                                ),
                                "sarana" => array(
                                                  "labels"    => array("Dokter Umum", "Dokter Gigi", "Bidan", "Perawat", "Jumlah dokter praktek", "Laboratorium Kesehatan"),
                                                  "nilai"     => array("Dokter Umum", "Dokter Gigi", "Bidan", "Perawat", "Jumlah dokter praktek", "Laboratorium Kesehatan")
                                                ),
                                /*"status_gizi" => array(
                                                  "labels"    => array("Balita", "Baduta"),
                                                  "nilai"     => array(
                                                                        "normal"        => array("Balita dg Status Gizi Normal (N)", "Baduta dg Status Gizi Normal (N)"),
                                                                        "pendek"        => array("Balita dg Status Gizi Pendek (P)", "Baduta dg Status Gizi Pendek (P)"),
                                                                        "sangat_pendek" => array("Balita dg Status Gizi Sangat Pendek (SP)", "Baduta dg Status Gizi Sangat Pendek (SP)"),
                                                                        "tinggi"        => array("Balita dg Status Gizi Tinggi (T)", "Baduta dg Status Gizi Tinggi (T)")
                                                                      )
                                                ),*/
                                "status_gizi" => array(
                                                  "labels"    => array("Balita", "Baduta"),
                                                  "nilai"     => array(
                                                                        "Balita"        => array("Balita dg Status Gizi Tinggi (T)", "Balita dg Status Gizi Normal (N)", "Balita dg Status Gizi Pendek (P)", "Balita dg Status Gizi Sangat Pendek (SP)"),
                                                                        "Baduta"        => array("Baduta dg Status Gizi Tinggi (T)", "Baduta dg Status Gizi Normal (N)", "Baduta dg Status Gizi Pendek (P)", "Baduta dg Status Gizi Sangat Pendek (SP)")
                                                                      )
                                            ),
                                "balita" => array(
                                                  "labels"    => array("Balita dg Status Gizi Tinggi (T)", "Balita dg Status Gizi Normal (N)", "Balita dg Status Gizi Pendek (P)", "Balita dg Status Gizi Sangat Pendek (SP)"),
                                                  "nilai"     => array("Balita dg Status Gizi Tinggi (T)", "Balita dg Status Gizi Normal (N)", "Balita dg Status Gizi Pendek (P)", "Balita dg Status Gizi Sangat Pendek (SP)")
                                            ),
                                "baduta" => array(
                                                  "labels"    => array("Baduta dg Status Gizi Tinggi (T)", "Baduta dg Status Gizi Normal (N)", "Baduta dg Status Gizi Pendek (P)", "Baduta dg Status Gizi Sangat Pendek (SP)"),
                                                  "nilai"     => array("Baduta dg Status Gizi Tinggi (T)", "Baduta dg Status Gizi Normal (N)", "Baduta dg Status Gizi Pendek (P)", "Baduta dg Status Gizi Sangat Pendek (SP)")
                                            ),
                                "dengue" => array(
                                                  "labels"    => array("Dengue Terkonfirmasi", "Dengue Suspek", "Suspek Dengue"),
                                                  "nilai"     => array("Dengue Terkonfirmasi", "Dengue Suspek", "Suspek Dengue")
                                                ),
                                "penyakit" => array(
                                                  "labels"    => array("Demam Berdarah", "Leptospirosis", "Diabetes Melitus", "Hipertensi"),
                                                  "nilai"     => array("Dengue Terkonfirmasi", "Leptospirosis Terkonfirmasi", "Diabetes Melitus", "Hipertensi")
                                                ),
                                "kesehatan" => array(
                                                  "labels"    => array("Angka Bebas Jentik (ABJ)", "AV-COD", "Caries (<=12  th)", "Gangguan Jiwa", "Ibu Hamil", "Ibu Melahirkan", "Jml Kematian", "Jml Kematian Bayi", "Jml Kematian Ibu", "Obesitas (BMI >=30)", "Overweight (BMI 25-29)", "Penyuluhan Kesehatan", "Remaja Wanita (10-18 th)"),
                                                  "nilai"     => array("Angka Bebas Jentik (ABJ)", "AV-COD", "Caries (<=12  th)", "Gangguan Jiwa", "Ibu Hamil", "Ibu Melahirkan", "Jml Kematian", "Jml Kematian Bayi", "Jml Kematian Ibu", "Obesitas (BMI >=30)", "Overweight (BMI 25-29)", "Penyuluhan Kesehatan", "Remaja Wanita (10-18 th)")
                                                )
                              );
  }

  public function index($slug = NULL, $tahun="", $view="")
  {   

    $subdomain    = $this->config->item('subdomain_name');
    $instansi     = $this->db->query("SELECT * FROM instansi WHERE sub_domain = '$subdomain'")->row();
    $id_instansi  = $instansi->id_instansi;
    $id_opd       = $instansi->id_opd;
    $kelurahan    = $this->db->query("SELECT * FROM m_kelurahan WHERE id_opd = '$id_opd'")->row();

    $no_prop      = str_pad($kelurahan->no_prop, 2, "0", STR_PAD_LEFT );
    $no_kab       = str_pad($kelurahan->no_kab, 2, "0", STR_PAD_LEFT );
    $no_kec       = str_pad($kelurahan->no_kec, 2, "0", STR_PAD_LEFT );
    $no_kel       = str_pad($kelurahan->no_kel, 4, "0", STR_PAD_LEFT );
    $id_composite = $no_prop.$no_kab.$no_kec.$no_kel;

    /* Ambil menu */
    $menu_link    = $this->uri->slash_segment(1).$this->uri->slash_segment(2).$this->uri->slash_segment(3).$this->uri->segment(4);
    $menu         = $this->db->query("SELECT * from menu where id_instansi = $id_instansi and menu_link = '".$menu_link."'")->row();
    $menu_id      = empty($menu) ? "" : $menu->menu_id;
    $menu_name    = empty($menu) ? "" : $menu->menu_name;

    $title  = empty($menu_name) ? str_replace("-", " ", $slug) : $menu_name;
    $tahun = empty($tahun) ? ((int)date("Y") - 1) : $tahun;
    
    $breadcrumb = array(
        array(
            'name'  => empty($menu) ? "" : $menu->menu_name,
            'url'   => ''
        )
    );

    /* Isi Page */

    //$tahun = date("Y") - 1;
    //$data["data"] = getKesehatan($id_composite)["data"];

    $submenu = array(
                      array("url" => "prasarana", "name" =>"Data Prasarana Kesehatan ".$tahun, "type" => "line", "labels" => $this->field_labels["prasarana"]["labels"], "stacked" => false, "grouped" => false),
                      array("url" => "sarana", "name" =>"Data Sarana Kesehatan ".$tahun, "type" => "line", "labels" => $this->field_labels["sarana"]["labels"], "stacked" => false, "grouped" => false),
                      array("url" => "status_gizi", "name" =>"Data Status Gizi ".$tahun, "type" => "line", "labels" => $this->field_labels["status_gizi"]["labels"], "stacked" => false, "grouped" => false),
                      array("url" => "balita", "name" =>"Data Status Gizi Balita ".$tahun, "type" => "line", "labels" => $this->field_labels["balita"]["labels"], "stacked" => false, "grouped" => false),
                      array("url" => "baduta", "name" =>"Data Status Gizi Baduta ".$tahun, "type" => "line", "labels" => $this->field_labels["baduta"]["labels"], "stacked" => false, "grouped" => false),
                      array("url" => "dengue", "name" =>"Data Demam Berdarah ".$tahun, "type" => "line", "labels" => $this->field_labels["dengue"]["labels"], "stacked" => false, "grouped" => false),
                      array("url" => "penyakit", "name" =>"Data Penyakit ".$tahun, "type" => "line", "labels" => $this->field_labels["penyakit"]["labels"], "stacked" => false, "grouped" => false),
                      array("url" => "kesehatan", "name" =>"Data Kesehatan Keluarga ".$tahun, "type" => "line", "labels" => $this->field_labels["kesehatan"]["labels"], "stacked" => false, "grouped" => false)
                    );

    switch ($slug) {
      case 'prasarana':
              $i = 0;
        break;

      case 'sarana':
              $i = 1;
        break;

      case 'status_gizi':
              $i = 2;
        break;

      case 'balita':
              $i = 3;
        break;

      case 'baduta':
              $i = 4;
        break;

      case 'dengue':
              $i = 5;
        break;

      case 'penyakit':
              $i = 6;
        break;

      case 'kesehatan':
              $i = 7;
        break;
      
      default:
              $i = 0;
        break;
    }

    $data["submenu"] = $submenu;
    $data["param"] = $submenu[$i];
    $slug = empty($slug) ? key($this->field_group) : $slug;

    /* Akhir Page */

    /* Untuk tampilan di JSS android */

    $view = (empty($view) || intval($view)) ? "" : $view;

    switch ($view) {
      case 'm':
      case 'mini':
        $data['show_menu'] = false;
        $data['show_widget'] = false;
        $data['show_footer'] = false;
        break;
      
      default:
        $data['show_menu'] = true;
        $data['show_widget'] = true;
        $data['show_footer'] = true;
        break;
    }

    $data['listTitle']  = ucwords($title);
    $data['slug']       = $slug;
    $data['view']       = $view;
    $data['breadcrumb'] = $this->layouts->make_breadcrumb($breadcrumb);

    if (theme_folder() == "default") {
        $data['contentType'] = 'foprofil/content-type-kesehatan';
        $data['setting']    = $this->frontend->getSetting();
        $data['menu']       = $this->frontend->createMenu();
        $data['widget']     = $this->frontend->getWidget('all');
        $data['link']       = $this->frontend->getLink();
        $data['polling']    = $this->frontend->getPolling();
        $data['poll_stat']  = $this->frontend->check_poll($this->input->ip_address());
        $data['count_poll'] = $this->frontend->count_poll();
        $data['w_agenda']   = $this->frontend->getAgendaOnWiget();   
        $data['sirapat']    = $this->frontend->getSirapat($data['setting']->id_opd);
        $data['category']   = $this->frontend->getCategory();
        $data['mapslocation']= $data['setting']->map;

        $this->load->view($this->frontend->getTheme(), $data);
    } else {
        $this->frontend->createView('foprofil/kesehatan', $data, true);
    }
  }



  public function getChartData($kategori="", $tahun="", $kode_wilayah="")
  {
      $param = "";
      $kategori = empty($kategori) ? key($this->field_group) : $kategori;
      $param = empty($param) ? "kesehatan" : $param;

      if (empty($kode_wilayah)) {
            
        $subdomain    = $this->config->item('subdomain_name');
        $instansi     = $this->db->query("SELECT * FROM instansi WHERE sub_domain = '$subdomain'")->row();
        $id_opd       = $instansi->id_opd;
        $kelurahan    = $this->db->query("SELECT * FROM m_kelurahan kel JOIN m_kecamatan kec ON kec.kode_kec = kel.kode_kec WHERE kel.id_opd = '$id_opd'")->row();

        $no_prop      = str_pad($kelurahan->no_prop, 2, "0", STR_PAD_LEFT );
        $no_kab       = str_pad($kelurahan->no_kab, 2, "0", STR_PAD_LEFT );
        $no_kec       = str_pad($kelurahan->no_kec, 2, "0", STR_PAD_LEFT );
        $no_kel       = str_pad($kelurahan->no_kel, 4, "0", STR_PAD_LEFT );

        $kode_wilayah = $no_prop.$no_kab.$no_kec.$no_kel;

      }

      $tahun = empty($tahun) ? ((int)date("Y") - 1) : $tahun;

      $field = getKesehatan($kategori, $kode_wilayah, $tahun)["data"][$kategori];

      $stat = array();
      $i = 0;

      foreach ($this->field_group[$kategori] as $key => $value) {
        foreach ($this->field_labels[$value]["labels"] as $key1 => $value1) {
          foreach ($this->field_labels[$value]["nilai"] as $k => $v) {
            if (is_array($v)) {
              foreach ($v as $k1 => $v1) {
                if ($key1 == $k1) {
                  $stat[$i]["label"] = $value1;
                  //$stat[$i][$k] = $v1;
                  $stat[$i]["nilai"] = $field[$k];
                  $i += 1;
                }
              }
            }/* else {
              $stat[$i]["label"] = $value1;
              $stat[$i][$k] = $v;
              $i += 1;
            }*/
          }
        }
      }
      if (empty($stat)) {
        echo json_encode($field);
      } else {
        //dump($stat);
        echo json_encode($field);
        //echo json_encode($stat);
      }

  }

  public function getDTData($kategori="", $tahun="", $kode_wilayah="")
  {
      $param = "";
      $kategori = empty($kategori) ? key($this->field_group) : $kategori;
      $param = empty($param) ? "kesehatan" : $param;

      if (empty($kode_wilayah)) {
            
        $subdomain    = $this->config->item('subdomain_name');
        $instansi     = $this->db->query("SELECT * FROM instansi WHERE sub_domain = '$subdomain'")->row();
        $id_opd       = $instansi->id_opd;
        $kelurahan    = $this->db->query("SELECT * FROM m_kelurahan kel JOIN m_kecamatan kec ON kec.kode_kec = kel.kode_kec WHERE kel.id_opd = '$id_opd'")->row();

        $no_prop      = str_pad($kelurahan->no_prop, 2, "0", STR_PAD_LEFT );
        $no_kab       = str_pad($kelurahan->no_kab, 2, "0", STR_PAD_LEFT );
        $no_kec       = str_pad($kelurahan->no_kec, 2, "0", STR_PAD_LEFT );
        $no_kel       = str_pad($kelurahan->no_kel, 4, "0", STR_PAD_LEFT );

        $kode_wilayah = $no_prop.$no_kab.$no_kec.$no_kel;

      }

      $tahun = empty($tahun) ? ((int)date("Y") - 1) : $tahun;

      $field = getKesehatan($kategori, $kode_wilayah, $tahun)["data"][$kategori];

      $stat = array();

      $i = 0;

      foreach ($this->field_group[$kategori] as $key => $value) {
        foreach ($this->field_labels[$value]["labels"] as $key1 => $value1) {
          $stat[$i]["label"] = $value1;
          foreach ($field as $k => $v) {
            if ($k == $value1) {
              foreach ($v as $k1 => $v1) {
                $stat[$i][(int)$v1["bulan"]] = $v1["jumlah"];
              }
            }
          }
          $i += 1;
        }
      }

      echo json_encode($stat);

  }


}