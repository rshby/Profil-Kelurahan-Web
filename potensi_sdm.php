<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Potensi_sdm extends CI_Controller {

  private $_theme;

  public function __construct()
  {
    parent::__construct();
    $this->load->library('frontend');
    $this->load->helper('profil');

    $this->frontend->insertPengunjung();
    $this->_theme = 'frontend/themes/dlh';
    $this->fields = array(
                          "jk"              => [3, "Jenis Kelamin"],
                          "agama"           => [1, "Agama"],
                          "umur"            => [2, "Kelompok Umur"],
                          "kawin"           => [3, "Status Perkawinan"],
                          "gol_darah"       => [4, "Golongan Darah"],
                          "fisik"           => [5, "Kondisi Fisik"],
                          "pendidikan"      => [6, "Tingkat Pendidikan"],
                          "akta"            => [7, "Status Akta"],
                          "usia_produktif"  => [2, "Usia Produktif"]
                        );
    $this->field_labels = array(
                                "agama" => array(
                                                  "labels"    => array("ISLAM", "KRISTEN", "KATHOLIK", "HINDU", "BUDHA", "KHONGHUCU", "KEPERCAYAAN"),
                                                  "LAKI-LAKI" => array("ISLAML", "KRISTENL", "KATHOLIKL", "HINDUL", "BUDHAL", "KHONGHUCUL", "KEPERCAYAANL"),
                                                  "PEREMPUAN" => array("ISLAMP", "KRISTENP", "KATHOLIKP", "HINDUP", "BUDHAP", "KHONGHUCUP", "KEPERCAYAANP")
                                                ),
                                "umur" => array(
                                                  "labels"    => array("0 sd 4 th", "4 sd 9 th", "9 sd 14 th", "14 sd 19 th", "19 sd 24 th", "24 sd 29 th", "29 sd 34 th", "34 sd 39 th", "39 sd 44 th", "44 sd 49 th", "49 sd 54 th", "54 sd 59 th", "59 sd 64 th", "Diatas 64 th"),
                                                  "LAKI-LAKI" => array("UMUR1L", "UMUR2L", "UMUR3L", "UMUR4L", "UMUR5L", "UMUR6L", "UMUR7L", "UMUR8L", "UMUR9L", "UMUR10L", "UMUR11L", "UMUR12L", "UMUR13L", "UMUR14L"),
                                                  "PEREMPUAN" => array("UMUR1P", "UMUR2P", "UMUR3P", "UMUR4P", "UMUR5P", "UMUR6P", "UMUR7P", "UMUR8P", "UMUR9P", "UMUR10P", "UMUR11P", "UMUR12", "UMUR13P", "UMUR14P")
                                                ),
                                "kawin" => array(
                                                  "labels"    => array("BELUM KAWIN", "KAWIN", "CERAI HIDUP", "CERAI MATI"),
                                                  "LAKI-LAKI" => array("BLMKWNL", "KWNL", "CHIDUPL", "CMATIL"),
                                                  "PEREMPUAN" => array("BLMKWNP", "KWNP", "CHIDUPP", "CMATIP")
                                                ),
                                "gol_darah" => array(
                                                  "labels"    => array("A", "B", "AB", "O", "A+", "A-", "B+", "B-", "AB+", "AB-", "O+", "O-", "TIDAK TAHU"),
                                                  "LAKI-LAKI" => array("AL", "BL", "ABL", "OL", "APL", "ANL", "BPL", "BNL", "ABPL", "ABNL", "OPL", "ONL", "TDL"),
                                                  "PEREMPUAN" => array("AP", "BP", "ABP", "OP", "APP", "ANP", "BPP", "BNP", "ABPP", "ABNP", "OPP", "ONP", "TDP")
                                                ),
                                "fisik" => array(
                                                  "labels"    => array("TIDAK CACAT", "CACAT FISIK", "CACAT NETRA/BUTA", "CACAT RUNGU/WICARA", "CACAT MENTAL/JIWA", "CACAT FISIK DAN MENTAL", "CACAT LAINNYA"),
                                                  "LAKI-LAKI" => array("TCL", "CFL", "CNL", "CRL", "CML", "CFML", "CLL"),
                                                  "PEREMPUAN" => array("TCP", "CFP", "CNP", "CRP", "CMP", "CFMP", "CPP")
                                                ),
                                "pendidikan" => array(
                                                  "labels"    => array("TIDAK/BLM SEKOLAH", "BELUM TAMAT SD/SEDERAJAT", "TAMAT SD/SEDERAJAT", "SLTP/SEDERAJAT", "SLTA/SEDERAJAT", "DIPLOMA I/II", "AKADEMI/DIPLOMA III/SARJANA MUDA", "DIPLOMA IV/STRATA I", "STRATA-II", "STRATA-III"),
                                                  "LAKI-LAKI" => array("TSL", "BTSL", "SDL", "SMPL", "SMAL", "DIIL", "DIIIL", "SIL", "SIIL", "SIIIL"),
                                                  "PEREMPUAN" => array("TSP", "BTSP", "SDP", "SMPP", "SMAP", "DIIP", "DIIIP", "SIP", "SIIP", "SIIIP")
                                                ),
                                "akta" => array(
                                                  "labels"    => array("MEMILIKI AKTA KELAHIRAN", "MEMILIKI AKTA PERKAWINAN", "MEMILIKI AKTA PERCERAIAN", "MEMILIKI AKTA KEMATIAN"),
                                                  "LAKI-LAKI" => array("MAKL", "MAKWNL", "MACRL", "MAMATL"),
                                                  "PEREMPUAN" => array("MAKP", "MAKWNP", "MACRP", "MAMATP")
                                                ),
                                "usia_produktif" => array(
                                                  "labels"    => array("BELUM PRODUKTIF", "PRODUKTIF", "TIDAK PRODUKTIF"),
                                                  "LAKI-LAKI" => array(array("UMUR1L", "UMUR2L", "UMUR3L"), array("UMUR4L", "UMUR5L", "UMUR6L", "UMUR7L", "UMUR8L", "UMUR9L", "UMUR10L", "UMUR11L", "UMUR12L", "UMUR13L"), array("UMUR14L")),
                                                  "PEREMPUAN" => array(array("UMUR12", "UMUR1P", "UMUR2P", "UMUR3P"), array("UMUR4P", "UMUR5P", "UMUR6P", "UMUR7P", "UMUR8P", "UMUR9P", "UMUR10P", "UMUR11P", "UMUR12P", "UMUR13P"), array("UMUR14P"))
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
    $slug = empty($slug) ? "jk" : $slug;
    $title = ($slug == "jk") ? "Jenis Kelamin" : $this->fields[$slug][1];
    
    $breadcrumb = array(
        array(
            'name'  => empty($menu) ? "" : $menu->menu_name,
            'url'   => ''
        )
    );

    $submenu = array(
      array("url" => "jk", "name" =>"Jenis Kelamin", "type" => "pie", "labels" => ["LAKI-LAKI", "PEREMPUAN"]),
      array("url" => "agama", "name" => $this->fields["agama"][1], "type" => "horizontalBar", "labels" => $this->field_labels["agama"]["labels"], "stacked" => true),
      array("url" => "umur", "name" => $this->fields["umur"][1], "type" => "horizontalBar", "labels" => $this->field_labels["umur"]["labels"], "stacked" => true),
      array("url" => "kawin", "name" => $this->fields["kawin"][1], "type" => "horizontalBar", "labels" => $this->field_labels["kawin"]["labels"], "stacked" => true), 
      array("url" => "gol_darah", "name" => $this->fields["gol_darah"][1], "type" => "horizontalBar", "labels" => $this->field_labels["gol_darah"]["labels"], "stacked" => true), 
      array("url" => "fisik", "name" => $this->fields["fisik"][1], "type" => "horizontalBar", "labels" => $this->field_labels["fisik"]["labels"], "stacked" => true), 
      array("url" => "pendidikan", "name" => $this->fields["pendidikan"][1], "type" => "horizontalBar", "labels" => $this->field_labels["pendidikan"]["labels"], "stacked" => true), 
      array("url" => "akta", "name" => $this->fields["akta"][1], "type" => "horizontalBar", "labels" => $this->field_labels["akta"]["labels"], "stacked" => true), 
      array("url" => "usia_produktif", "name" => $this->fields["usia_produktif"][1], "type" => "horizontalBar", "labels" => $this->field_labels["usia_produktif"]["labels"], "stacked" => true)
    );

    switch ($slug) {
      case 'jk':
              $i = 0;
              $kategori = 0;
      break;
      case 'agama':
              $i = 1;
              $kategori = $this->fields[$slug][0];
      break;
      case 'umur':
              $i = 2;
              $kategori = $this->fields[$slug][0];
      break;
      case 'kawin':
              $i = 3;
              $kategori = $this->fields[$slug][0];
      break;
      case 'gol_darah':
              $i = 4;
              $kategori = $this->fields[$slug][0];
      break;
      case 'fisik':
              $i = 5;
              $kategori = $this->fields[$slug][0];
      break;
      case 'pendidikan':
              $i = 6;
              $kategori = $this->fields[$slug][0];
      break;
      case 'akta':
              $i = 7;
              $kategori = $this->fields[$slug][0];
      break;
      case 'usia_produktif':
              $i = 8;
              $kategori = $this->fields[$slug][0];
      break;

      default:
              $i = 0;
              $kategori = 0;
      break;
    }

    $data['submenu'] = $submenu;
    $data['param']   = $submenu[$i];

    /* Isi Page */

    $data['kode_wilayah'] = $id_composite;

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
        $data['contentType'] = 'foprofil/content-type-potensi_sdm';
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
        $this->frontend->createView('foprofil/potensi_sdm', $data, true);
    }
  }

  public function getChartData($param="", $kode_wilayah="")
  {
      if (empty($kode_wilayah)) {
            
        $subdomain    = $this->config->item('subdomain_name');
        $instansi     = $this->db->query("SELECT * FROM instansi WHERE sub_domain = '$subdomain'")->row();
        $id_opd       = $instansi->id_opd;
        $kelurahan    = $this->db->query("SELECT * FROM m_kelurahan kel JOIN m_kecamatan kec ON kec.kode_kec = kel.kode_kec WHERE kel.id_opd = '$id_opd'")->row();

        /*$no_prop      = str_pad($kelurahan->no_prop, 2, "0", STR_PAD_LEFT );
        $no_kab       = str_pad($kelurahan->no_kab, 2, "0", STR_PAD_LEFT );
        $no_kec       = str_pad($kelurahan->no_kec, 2, "0", STR_PAD_LEFT );
        $no_kel       = str_pad($kelurahan->no_kel, 4, "0", STR_PAD_LEFT );*/
        //$kode_wilayah = $no_prop.$no_kab.$no_kec.$no_kel;
        $kode_wilayah = $kelurahan->nama_kec."_".$kelurahan->nama_kel;
        $kode_wilayah = strtoupper($kode_wilayah);

      }

      switch ($param) {

        case 'jk':
        case 'agama':
        case 'umur':
        case 'kawin':
        case 'gol_darah':
        case 'fisik':
        case 'pendidikan':
        case 'akta':
        case 'usia_produktif':
                    $statPenduduk = getStatPenduduk_bykodewil($this->fields[$param][0], $kode_wilayah);
                    $field = empty($statPenduduk["data"]) ? [] : $statPenduduk["data"][0];
              break;

        default:
                    $statPenduduk = getStatPenduduk_bykodewil(3, $kode_wilayah);
                    $field = empty($statPenduduk["data"]) ? [] : $statPenduduk["data"][0];
              break;
      }

      $stat = array();
      $i = 0;

      foreach ($field as $key => $value) {

        switch ($param) {

          case 'jk':

            if (in_array($key, $this->field_labels["kawin"]["LAKI-LAKI"])) {
              $i = 0;
            } else {
              $i = 1;
            }
            
            if (!isset($stat[$i]["jumlah"])) {
              $stat[$i]["jumlah"] = 0;
            }
            $stat[$i]["jumlah"] += $value;

            if (in_array($key, $this->field_labels["kawin"]["LAKI-LAKI"])) {
              $stat[$i][$param]  = "LAKI-LAKI";
              $stat[$i]["label"] = "LAKI-LAKI";
              $stat[$i]["field"] = "LAKI-LAKI";
            } else {
              $stat[$i][$param]  = "PEREMPUAN";
              $stat[$i]["label"] = "PEREMPUAN";
              $stat[$i]["field"] = "PEREMPUAN";
            }

            break;

          case 'agama':
          case 'umur':
          case 'kawin':
          case 'gol_darah':
          case 'fisik':
          case 'pendidikan':
          case 'akta':

            $label = substr($key, 0, strlen($key)-1);

            $stat[$i][$param] = $key;
            $stat[$i]["label"] = $label;
            $stat[$i]["jumlah"] = $value;

            if (in_array($key, $this->field_labels[$param]["LAKI-LAKI"])) {
              $stat[$i]["field"] = "LAKI-LAKI";
            } else {
              $stat[$i]["field"] = "PEREMPUAN";
            }

            break;

          case 'usia_produktif':

            $k = 0;
            $labels_last_index = sizeof($this->field_labels[$param]["labels"]);

            foreach ($this->field_labels[$param]["labels"] as $v) {

              $array = $this->field_labels[$param]["LAKI-LAKI"][$k];
              while ($f = current($array)) {
                if ($f == $key) {
                  $i = $k;
                  $j = $i;
                }
                next($array);
              }

              $array = $this->field_labels[$param]["PEREMPUAN"][$k];
              while ($f = current($array)) {
                if ($f == $key) {
                  $i = $k;
                  $j = $i + $labels_last_index;
                }
                next($array);
              }

              $k += 1;
            }

            $label = $this->field_labels[$param]["labels"][$i];
            $stat[$j][$param] = $label;
            $stat[$j]["label"] = $label;
            
            if (!isset($stat[$j]["jumlah"])) {
              $stat[$j]["jumlah"] = 0;
            }
            $stat[$j]["jumlah"] += $value;

            if (in_array($key, $this->field_labels[$param]["LAKI-LAKI"][$i])) {
              $stat[$j]["field"] = "LAKI-LAKI";
            } else {
              $stat[$j]["field"] = "PEREMPUAN";
            }

            ksort($stat);

            break;

          default:

            $stat[$i][$param] = $key;
            $stat[$i]["field"] = $key;
            $stat[$i]["jumlah"] = $value;
          break;
      }

      $i += 1;
    }

    echo json_encode($stat);

  }

  public function getDTData($param="", $kode_wilayah="")
  {
      if (empty($kode_wilayah)) {
            
        $subdomain    = $this->config->item('subdomain_name');
        $instansi     = $this->db->query("SELECT * FROM instansi WHERE sub_domain = '$subdomain'")->row();
        $id_opd       = $instansi->id_opd;
        $kelurahan    = $this->db->query("SELECT * FROM m_kelurahan kel JOIN m_kecamatan kec ON kec.kode_kec = kel.kode_kec WHERE kel.id_opd = '$id_opd'")->row();

        $kode_wilayah = $kelurahan->nama_kec."_".$kelurahan->nama_kel;
        $kode_wilayah = strtoupper($kode_wilayah);

      }

      switch ($param) {

        case 'jk':
                    $field = getStatPenduduk_bykodewil(3, $kode_wilayah)["data"][0];
          break;
        case 'agama':
        case 'umur':
        case 'kawin':
        case 'gol_darah':
        case 'fisik':
        case 'pendidikan':
        case 'akta':
                    $field = getStatPenduduk_bykodewil($this->fields[$param][0], $kode_wilayah)["data"][0];
              break;
        case 'usia_produktif':
                    $field = getStatPenduduk_bykodewil(2, $kode_wilayah)["data"][0];
          break;

        default:
                    $field = getStatPenduduk_bykodewil(3, $kode_wilayah)["data"][0];
              break;
      }

      $stat = array();
      $i = 0;

      foreach ($field as $key => $value) {

        switch ($param) {

          case 'jk':

            if (in_array($key, $this->field_labels["kawin"]["LAKI-LAKI"])) {
              $i = 0;
            } else {
              $i = 1;
            }
            
            if (!isset($stat[$i]["jumlah"])) {
              $stat[$i]["jumlah"] = 0;
            }
            $stat[$i]["jumlah"] += $value;

            if (in_array($key, $this->field_labels["kawin"]["LAKI-LAKI"])) {
              $stat[$i][$param]  = "LAKI-LAKI";
              $stat[$i]["label"] = "LAKI-LAKI";
              $stat[$i]["field"] = "LAKI-LAKI";
            } else {
              $stat[$i][$param]  = "PEREMPUAN";
              $stat[$i]["label"] = "PEREMPUAN";
              $stat[$i]["field"] = "PEREMPUAN";
            }

            break;

          case 'agama':
          case 'umur':
          case 'kawin':
          case 'gol_darah':
          case 'fisik':
          case 'pendidikan':
          case 'akta':

            $label = substr($key, 0, strlen($key)-1);

            if (in_array($key, $this->field_labels[$param]["LAKI-LAKI"])) {
              $i = array_search($key, $this->field_labels[$param]["LAKI-LAKI"]);
            } else {
              $i = array_search($key, $this->field_labels[$param]["PEREMPUAN"]);
            }
            
            $stat[$i][$param] = $key;
            $stat[$i]["label"] = $this->field_labels[$param]["labels"][$i];

            if (!isset($stat[$i]["jumlah_laki"])) {
              $stat[$i]["jumlah_laki"] = 0;
            }
            if (!isset($stat[$i]["jumlah_perempuan"])) {
              $stat[$i]["jumlah_perempuan"] = 0;
            }

            if (in_array($key, $this->field_labels[$param]["LAKI-LAKI"])) {
              $stat[$i]["field"] = "LAKI-LAKI";
              $stat[$i]["jumlah_laki"] = $value;
            } else {
              $stat[$i]["field"] = "PEREMPUAN";
              $stat[$i]["jumlah_perempuan"] = $value;
            }

            $stat[$i]["jumlah"] = $stat[$i]["jumlah_laki"] + $stat[$i]["jumlah_perempuan"];

            break;
          case 'usia_produktif':

          /*  UMUR12 --> SEHARUSNYA UMUR12P */

            $k = 0;
            foreach ($this->field_labels[$param]["labels"] as $v) {

              $array = $this->field_labels[$param]["LAKI-LAKI"][$k];
              while ($f = current($array)) {
                if ($f == $key) {
                  $i = $k;
                }
                next($array);
              }

              $array = $this->field_labels[$param]["PEREMPUAN"][$k];
              while ($f = current($array)) {
                if ($f == $key) {
                  $i = $k;
                }
                next($array);
              }

              $k++;
            }

            $label = $this->field_labels[$param]["labels"][$i];
            $stat[$i][$param] = $label;
            $stat[$i]["label"] = $label;

            /*echo "Usia : ";
            echo $key;
            echo ",Label : ";
            echo $label;
            echo ",Value : ";
            echo $value;
            echo ",JK : ";*/
            
            if (!isset($stat[$i]["jumlah_laki"])) {
              $stat[$i]["jumlah_laki"] = 0;
            }
            if (!isset($stat[$i]["jumlah_perempuan"])) {
              $stat[$i]["jumlah_perempuan"] = 0;
            }

            if (in_array($key, $this->field_labels[$param]["LAKI-LAKI"][$i])) {
              $stat[$i]["jumlah_laki"] += $value;
              /*echo "L";
              echo "<br><br>";*/
            } else {
              $stat[$i]["jumlah_perempuan"] += $value;
              /*echo "P";
              echo "<br><br>";*/
            }

            $stat[$i]["jumlah"] = $stat[$i]["jumlah_laki"] + $stat[$i]["jumlah_perempuan"];

            ksort($stat);

            break;


          default:
            $stat[$i][$param] = $key;
            $stat[$i]["field"] = $key;
            $stat[$i]["jumlah"] = $value;
          break;
        }

        $i += 1;;
    }

    echo json_encode($stat);

  }

  function getAtasan()
  {

    $subdomain = $this->config->item('subdomain_name');
    $instansi     = $this->db->query("SELECT * FROM instansi WHERE sub_domain = '$subdomain'")->row();
    $id_opd       = $instansi->id_opd;

    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://webservice.jogjakota.go.id/simpeg/instansi_atasan?id=".$id_opd,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;
  }


}
