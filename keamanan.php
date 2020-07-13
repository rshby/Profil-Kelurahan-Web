<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keamanan extends CI_Controller {

  private $_theme;

  public function __construct()
  {
    parent::__construct();
    $this->load->library('frontend');
    $this->load->helper('profil');

    $this->frontend->insertPengunjung();
    $this->_theme = 'frontend/themes/dlh';

    $this->field_labels = array(
                                "keamanan" => array(
                                                  "labels"    => array("Anggota Linmas", "Pos Kamling", "Operasi Penertiban", "Pencurian"),
                                                  "semester_1" => array("JumlahAnggotaLinmas", "JumlahPosKamling", "JumlahOperasiPenertiban", "Pencurian"),
                                                  "semester_2" => array("JumlahAnggotaLinmas", "JumlahPosKamling", "JumlahOperasiPenertiban", "Pencurian")
                                                )
                              );
  }

  public function index($slug = NULL, $view="")
  {   

    $subdomain    = $this->config->item('subdomain_name');
    $instansi     = $this->db->query("SELECT * FROM instansi WHERE sub_domain = '$subdomain'")->row();
    $id_instansi  = $instansi->id_instansi;
    $id_opd       = $instansi->id_opd;
    $kelurahan    = $this->db->query("SELECT * FROM m_kelurahan WHERE id_opd = '$id_opd'")->row();
    /*dump($kelurahan);
    die();*/
    /*$no_prop      = str_pad($kelurahan->no_prop, 2, "0", STR_PAD_LEFT );
    $no_kab       = str_pad($kelurahan->no_kab, 2, "0", STR_PAD_LEFT );*/
    $no_kec       = str_pad($kelurahan->no_kec, 2, "0", STR_PAD_LEFT );
    $no_kel       = str_pad($kelurahan->no_kel, 4, "0", STR_PAD_LEFT );
    $id_composite = $no_kec.$no_kel;

    /* Ambil menu */
    $menu_link    = implode("/", array_filter(explode("/", $this->uri->slash_segment(1).$this->uri->slash_segment(2).$this->uri->slash_segment(3).$this->uri->segment(4))));
    $menu         = $this->db->query("SELECT * from menu where id_instansi = $id_instansi and menu_link = '".$menu_link."'")->row();
    $menu_id      = empty($menu) ? "" : $menu->menu_id;
    $menu_name    = empty($menu) ? "" : $menu->menu_name;

    $title  = empty($menu_name) ? str_replace("-", " ", $slug) : $menu_name;
    
    $breadcrumb = array(
        array(
            'name'  => $menu_name,
            'url'   => ''
        )
    );

    /* Isi Page */

    $tahun = date("Y") - 1;
    $data["data"] = getLinmas($id_composite, $tahun)["data"];

    $submenu = array("url" => "linmas", "name" =>"Pengamanan Warga", "type" => "horizontalBar", "labels" => $this->field_labels["keamanan"]["labels"], "stacked" => false, "grouped" => true);
    $data["param"] = $submenu;

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
    $data['slug']       = $menu_link;
    $data['view']       = $view;
    $data['breadcrumb'] = $this->layouts->make_breadcrumb($breadcrumb);

    if (theme_folder() == "default") {
        $data['contentType'] = 'foprofil/content-type-keamanan';
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
        $this->frontend->createView('foprofil/keamanan', $data, true);
    }
  }



  public function getChartData($tahun="", $kode_wilayah="")
  {
      $param = empty($param) ? "keamanan" : $param;

      if (empty($kode_wilayah)) {
            
        $subdomain    = $this->config->item('subdomain_name');
        $instansi     = $this->db->query("SELECT * FROM instansi WHERE sub_domain = '$subdomain'")->row();
        $id_opd       = $instansi->id_opd;
        $kelurahan    = $this->db->query("SELECT * FROM m_kelurahan kel JOIN m_kecamatan kec ON kec.kode_kec = kel.kode_kec WHERE kel.id_opd = '$id_opd'")->row();

        $no_kec       = str_pad($kelurahan->no_kec, 2, "0", STR_PAD_LEFT );
        $no_kel       = str_pad($kelurahan->no_kel, 4, "0", STR_PAD_LEFT );
        $id_composite = $no_kec.$no_kel;

        $kode_wilayah = $id_composite;

      }

      $tahun = empty($tahun) ? ((int)date("Y") - 1) : $tahun;

      $field = getLinmas($kode_wilayah, $tahun)["data"];

      $stat = array();
      $i = 0;
      
      $labels_last_index = sizeof($this->field_labels[$param]["labels"]);

      foreach ($this->field_labels[$param]["semester_1"] as $k => $v) {

        if (!empty($field)) {
          foreach ($field as $row) {
            if ($row["Semester"] == "1") {
              $j = $i;

              $stat[$j][$param] = $v;
              $stat[$j]["label"] = $this->field_labels[$param]["labels"][$i];

              if (!isset($stat[$j]["jumlah"])) {
                $stat[$j]["jumlah"] = 0;
              }
              $stat[$j]["jumlah"] += $row[$v];
              $stat[$j]["field"] = "semester_1";

            }
          }

          $i += 1;
        }
      }

      $i = 0;
      foreach ($this->field_labels[$param]["semester_2"] as $k => $v) {

        if (!empty($field)) {
          foreach ($field as $row) {
            if ($row["Semester"] == "2") {
              $j = $i + $labels_last_index;

              $stat[$j][$param] = $v;
              $stat[$j]["label"] = $this->field_labels[$param]["labels"][$i];

              if (!isset($stat[$j]["jumlah"])) {
                $stat[$j]["jumlah"] = 0;
              }
              $stat[$j]["jumlah"] += $row[$v];
              $stat[$j]["field"] = "semester_2";

            }
          }

          $i += 1;
        }
      }

      echo json_encode($stat);

  }

  public function getDTData($tahun="", $kode_wilayah="")
  {
    $param = "keamanan";
    if (empty($kode_wilayah)) {
          
      $subdomain    = $this->config->item('subdomain_name');
      $instansi     = $this->db->query("SELECT * FROM instansi WHERE sub_domain = '$subdomain'")->row();
      $id_opd       = $instansi->id_opd;
      $kelurahan    = $this->db->query("SELECT * FROM m_kelurahan kel JOIN m_kecamatan kec ON kec.kode_kec = kel.kode_kec WHERE kel.id_opd = '$id_opd'")->row();

      $no_kec       = str_pad($kelurahan->no_kec, 2, "0", STR_PAD_LEFT );
      $no_kel       = str_pad($kelurahan->no_kel, 4, "0", STR_PAD_LEFT );
      $id_composite = $no_kec.$no_kel;

      $kode_wilayah = $id_composite;

    }

    $tahun = empty($tahun) ? date("Y") - 1 : $tahun;

    $field = getLinmas($kode_wilayah, $tahun)["data"];

    $stat = array();

    foreach ($field as $row) {
      $i = 0;
      foreach ($row as $key => $value) {

        if (in_array($key, $this->field_labels[$param]["semester_1"])) {

          if (in_array($key, $this->field_labels[$param]["semester_1"])) {
            $i = array_search($key, $this->field_labels[$param]["semester_1"]);
          } else {
            $i = array_search($key, $this->field_labels[$param]["semester_2"]);
          }

          $stat[$i]["label"] = $this->field_labels[$param]["labels"][$i];

          if (!isset($stat[$i]["semester_1"])) {
            $stat[$i]["semester_1"] = 0;
          }

          if (!isset($stat[$i]["semester_2"])) {
            $stat[$i]["semester_2"] = 0;
          }
          
          if ($row["Tahun"] == $tahun && $row["Semester"] == "1") {
            $stat[$i]["tahun"] = $row["Tahun"];
            $stat[$i]["field"] = $key;
            $stat[$i]["semester_1"] += $value;
          } elseif($row["Tahun"] == $tahun && $row["Semester"] == "2") {
            $stat[$i]["tahun"] = $row["Tahun"];
            $stat[$i]["field"] = $key;
            $stat[$i]["semester_2"] += $value;

            $stat[$i]["selisih"] = $stat[$i]["semester_2"] - $stat[$i]["semester_1"];
          }

          $i += 1;;
        }
      }

    }

    echo json_encode($stat);

  }


}