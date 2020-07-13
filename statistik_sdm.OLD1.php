<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statistik_sdm extends CI_Controller {

  private $_theme;

  public function __construct()
  {
    parent::__construct();
    $this->load->library('frontend');

    $this->frontend->insertPengunjung();
    $this->_theme = 'frontend/themes/dlh';
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
    $no_prop      = str_pad($kelurahan->no_prop, 2, "0");
    $no_kab       = str_pad($kelurahan->no_kab, 2, "0");
    $no_kec       = str_pad($kelurahan->no_kec, 2, "0");
    $no_kel       = str_pad($kelurahan->no_kel, 4, "0");
    $id_composite = $no_prop.$no_kab.$no_kec.$no_kel;

    /* Ambil menu */
    $menu_link    = $this->uri->slash_segment(1).$this->uri->slash_segment(2).$this->uri->slash_segment(3).$this->uri->segment(4);
    $menu         = $this->db->query("SELECT * from menu where id_instansi = $id_instansi and menu_link = '".$menu_link."'")->row();
    $menu_id      = $menu->menu_id;

    $title  = str_replace("-", " ", $slug);
    
    $breadcrumb = array(
        array(
            'name'  => $menu->menu_name,
            'url'   => ''
        )
    );

    $submenu = array(
      array("url" => "agama", "name" => "Agama", "type" => "bar"), 
      array("url" => "gol_darah", "name" => "Golongan Darah", "type" => "bar"), 
      array("url" => "jk", "name" => "Jenis Kelamin", "type" => "pie"), 
      array("url" => "difabel", "name" => "Kebutuhan Khusus", "type" => "bar"), 
      array("url" => "pendidikan", "name" => "Pendidikan", "type" => "horizontalBar"), 
      array("url" => "pekerjaan", "name" => "Pekerjaan", "type" => "horizontalBar")
    );

    switch ($field) {
      case 'agama':
      $i = 0;
      break;
      case 'gol_darah':
      $i = 1;
      break;
      case 'jk':
      $i = 2;
      break;
      case 'difabel':
      $i = 3;
      break;
      case 'pendidikan':
      $i = 4;
      break;
      case 'pekerjaan':
      $i = 5;
      break;

      default:
      $i = 2;
      break;
    }

    $data['submenu'] = $submenu;
    $data['param']   = $submenu[$i];

    /* Isi Page */



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
    $data['breadcrumb'] = $this->layouts->make_breadcrumb($breadcrumb);

    if (theme_folder() == "default") {
        $data['contentType'] = 'statistik_sdm';
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
        $this->frontend->createView('foprofil/modern_statistik_sdm', $data, true);
    }
  }

  public function getChartData($param="", $loc="")
  {
      $subdomain = $this->config->item('subdomain_name');
      $id_instansi = $this->db->query("SELECT id_instansi FROM instansi WHERE sub_domain = '$subdomain'")->row()->id_instansi;

      $stat = array();
      $i = 0;

      switch ($param) {
          case 'agama':
          $field = $this->db->get("m_agama")->result();
          break;
          
          default:
          $field = $this->db->get("m_jk")->result();
          break;
      }

      foreach ($field as $row) {

        $stat[$i]["id"] = $row->{"id_".$param};

        switch ($param) {

            case 'difabel':
            $stat[$i][$param] = empty($row->{$param."_name"}) ? "Tidak Cacat" : $row->{$param."_name"};
            $stat[$i]["field"] = $row->{"id_".$param};
            break;

            case 'pendidikan':

            case 'pekerjaan':
            $stat[$i][$param] = $row->{$param."_name"};
            $stat[$i]["field"] = $row->{"id_".$param};
            break;

            default:
            $stat[$i][$param] = $row->{$param."_name"};
            $stat[$i]["field"] = $row->{$param."_name"};
            break;
        }
        $stat[$i]["jumlah"] = 0;
        $i++;
    }

    echo json_encode($stat);

    }


}
