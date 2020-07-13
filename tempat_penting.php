<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tempat_penting extends CI_Controller {

  private $_theme;

  public function __construct()
  {
    parent::__construct();
    $this->load->library('frontend');
    $this->load->helper('profil');

    $this->frontend->insertPengunjung();
    $this->_theme = 'frontend/themes/dlh';
  }

  public function tes()
  {  

    $subdomain    = $this->config->item('subdomain_name');
    $instansi     = $this->db->query("SELECT * FROM instansi WHERE sub_domain = '$subdomain'")->row();
    $id_instansi  = $instansi->id_instansi;
    $id_opd       = $instansi->id_opd;
    $kelurahan    = $this->db->query("SELECT * FROM m_kelurahan WHERE id_opd = '$id_opd'")->row();

    $data["data"] = getPOI($kelurahan->nama_kel);
    
    dump($data["data"]);

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
    $menu_link    = implode("/", array_filter(explode("/", $this->uri->slash_segment(1).$this->uri->slash_segment(2).$this->uri->slash_segment(3).$this->uri->segment(4))));
    $menu         = $this->db->query("SELECT * from menu where id_instansi = $id_instansi and menu_link = '".$menu_link."'")->row();
    $menu_id      = empty($menu) ? "" : $menu->menu_id;
    $menu_name    = empty($menu) ? "" : $menu->menu_name;

    $title  = empty($menu_name) ? str_replace("-", " ", $slug) : $menu_name;
    
    $breadcrumb = array(
        array(
            'name'  => empty($menu) ? "" : $menu->menu_name,
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

    switch ($slug) {
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

    $data["data"] = getPOI($kelurahan->nama_kel)["data"];

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
        $data['contentType'] = 'foprofil/content-type-tempat_penting';
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
        $this->frontend->createView('foprofil/tempat_penting', $data, true);
    }
  }


}