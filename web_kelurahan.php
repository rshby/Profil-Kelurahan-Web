<?php 
class web_kelurahan extends CI_Controller
{
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
    $no_prop      = str_pad($kelurahan->no_prop, 2, "0", STR_PAD_LEFT );
    $no_kab       = str_pad($kelurahan->no_kab, 2, "0", STR_PAD_LEFT );
    $no_kec       = str_pad($kelurahan->no_kec, 2, "0", STR_PAD_LEFT );
    $no_kel       = str_pad($kelurahan->no_kel, 4, "0", STR_PAD_LEFT );
    $id_composite = $no_prop.$no_kab.$no_kec.$no_kel;

    /* Ambil menu */
    $menu_link    = $this->uri->slash_segment(1).$this->uri->slash_segment(2).$this->uri->slash_segment(3).$this->uri->segment(4);
    $menu         = $this->db->query("SELECT * from menu where id_instansi = $id_instansi and menu_link = '".$menu_link."'")->row();
    $menu_id      = empty($menu) ? "" : $menu->menu_id;

    $title  = str_replace("-", " ", $slug);
    
    $breadcrumb = array(
    	array(
    		'name'  => empty($menu) ? "" : $menu->menu_name,
    		'url'   => ''
    	)
    );

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
    	$data['contentType'] = 'web_kelurahan';
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
    	$this->frontend->createView('foprofil/gambaranumum', $data, true);
    }
}

public function masalah($slug = NULL, $view="")
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

    $title  = str_replace("-", " ", $slug);
    
    $breadcrumb = array(
        array(
            'name'  => empty($menu) ? "" : $menu->menu_name,
            'url'   => ''
        )
    );
    
    $view = (empty($view) || intval($view)) ? "" : $view;
    switch ($view){
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
        $data['contentType'] = 'web_kelurahan';
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
        $this->frontend->createView('foprofil/cek_masalah', $data, true);
    }	
}

public function info_masalah($slug = NULL, $view="", $no_rw="")
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

    $title  = str_replace("-", " ", $slug);
    
    $breadcrumb = array(
        array(
            'name'  => empty($menu) ? "" : $menu->menu_name,
            'url'   => ''
        )
    );
    
    $view = (empty($view) || intval($view)) ? "" : $view;
    switch ($view){
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
        $data['contentType'] = 'web_kelurahan';
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
        $this->frontend->createView('foprofil/info_masalah', $data, true);
    }   
}

public function lembaga($slug = NULL, $view="")
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

    $title  = str_replace("-", " ", $slug);
    
    $breadcrumb = array(
        array(
            'name'  => empty($menu) ? "" : $menu->menu_name,
            'url'   => ''
        )
    );
    
    $view = (empty($view) || intval($view)) ? "" : $view;
    switch ($view){
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
        $data['contentType'] = 'web_kelurahan';
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
        $this->frontend->createView('foprofil/lembaga', $data, true);
    }	
}

public function potensi_sarpras($slug = NULL, $view="")
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

    $title  = str_replace("-", " ", $slug);
    
    $breadcrumb = array(
        array(
            'name'  => empty($menu) ? "" : $menu->menu_name,
            'url'   => ''
        )
    );
    
    $view = (empty($view) || intval($view)) ? "" : $view;
    switch ($view){
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
        $data['contentType'] = 'web_kelurahan';
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
        $this->frontend->createView('foprofil/potensi_sarpras', $data, true);
    }   	
}

public function kesehatan_sarpras($slug = NULL, $view="")
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

    $title  = str_replace("-", " ", $slug);
    
    $breadcrumb = array(
        array(
            'name'  => empty($menu) ? "" : $menu->menu_name,
            'url'   => ''
        )
    );
    
    $view = (empty($view) || intval($view)) ? "" : $view;
    switch ($view){
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
        $data['contentType'] = 'web_kelurahan';
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
        $this->frontend->createView('foprofil/kesehatan_sarpras', $data, true);
    }
}

public function pendidikan_sarpras($slug = NULL, $view="")
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

    $title  = str_replace("-", " ", $slug);
    
    $breadcrumb = array(
        array(
            'name'  => empty($menu) ? "" : $menu->menu_name,
            'url'   => ''
        )
    );
    
    $view = (empty($view) || intval($view)) ? "" : $view;
    switch ($view){
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
        $data['contentType'] = 'web_kelurahan';
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
        $this->frontend->createView('foprofil/pendidikan_sarpras', $data, true);
    }
}

public function hiburan_sarpras()
{
	$this->load->view('hiburan_sarpras');
}

public function kebersihan_sarpras($slug = NULL, $view="")
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

    $title  = str_replace("-", " ", $slug);
    
    $breadcrumb = array(
        array(
            'name'  => empty($menu) ? "" : $menu->menu_name,
            'url'   => ''
        )
    );
    
    $view = (empty($view) || intval($view)) ? "" : $view;
    switch ($view){
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
        $data['contentType'] = 'web_kelurahan';
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
        $this->frontend->createView('foprofil/kebersihan_sarpras', $data, true);
    }
}

public function tempat_strategis($slug = NULL, $view="")
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

    $title  = str_replace("-", " ", $slug);
    
    $breadcrumb = array(
        array(
            'name'  => empty($menu) ? "" : $menu->menu_name,
            'url'   => ''
        )
    );

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
        $data['contentType'] = 'web_kelurahan';
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
        $this->frontend->createView('foprofil/cek1', $data, true);
    }
}

//fungsi untuk get API profil Lurah/Atasan
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

function get_jml()
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

    $postData = '';

    $param = array(
        "no_prop" => $no_prop,
        "no_kab"  => $no_kab,
        "no_kec"  => $no_kec,
        "no_kel"  => $no_kel
    );

    $postData = '';

    foreach ($param as $k => $v) {
        $postData .= $k . '=' . $v . '&';
    }

    rtrim($postData, '&');

    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://datawarehouse.jogjakota.go.id/index.php/capillistrw",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_SSL_VERIFYPEER => true,
      CURLOPT_POST => count($postData),
      CURLOPT_POSTFIELDS => $postData,
  ));

    $list_rw = curl_exec($curl);

    if (curl_errno($curl)) {
        print "Error: " . curl_error($curl);
    } else {

        curl_close($curl);

        echo $list_rw;

    }
}

 //funcsi untuk get API data tempat strategis
function getTempatStrategis()
{
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://layananupik.jogjakota.go.id/lumen/public/api/filter-poi-category?type=string",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_HTTPHEADER => array(
            "Content-Type: multipart/form-data; boundary=--------------------------121005133816139599699013"
        ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    echo $response;
}

 //fungsi untuk get API data Linmas
function getDataLinmas()
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
     $id_composite = $no_kec.$no_kel;

     $curl = curl_init();
     curl_setopt_array($curl, array(
        CURLOPT_URL => "https://webservice.jogjakota.go.id/Monografi/linmas?kel=".$id_composite."&thn=2019",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "Content-Type: multipart/form-data; boundary=--------------------------223582120226822761598678"
        ),
    ));
     $response = curl_exec($curl);
     curl_close($curl);
     echo $response;
 }	

 function getDataRw()
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

    $postData = '';

    $param = array(
        "no_prop" => $no_prop,
        "no_kab"  => $no_kab,
        "no_kec"  => $no_kec,
        "no_kel"  => $no_kel
    );

    $postData = '';

    foreach ($param as $k => $v) {
        $postData .= $k . '=' . $v . '&';
    }

    rtrim($postData, '&');

    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://datawarehouse.jogjakota.go.id/index.php/capillistrw",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_SSL_VERIFYPEER => true,
      CURLOPT_POST => count($postData),
      CURLOPT_POSTFIELDS => $postData,
  ));

    $list_rw = curl_exec($curl);

    if (curl_errno($curl)) {
        print "Error: " . curl_error($curl);
    } else {

        curl_close($curl);
        json_decode($list_rw);
        echo $list_rw;
        echo $list_rw["no_rw"];
        return $list_rw["no_rw"];

    }
 }

 function getDatawarga($no_rw="0")
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
    $no_rw        = str_pad($no_rw, 3, "0", STR_PAD_LEFT );

    $param = array(
        "no_prop" => $no_prop,
        "no_kab"  => $no_kab,
        "no_kec"  => $no_kec,
        "no_kel"  => $no_kel,
        "no_rw"   => $no_rw
    );

    $postData = '';

    foreach ($param as $k => $v) {
        $postData .= $k . '=' . $v . '&';
    }

    rtrim($postData, '&');

    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => "https://datawarehouse.jogjakota.go.id/index.php/capilrt",
    CURLOPT_RETURNTRANSFER => true,
    /*CURLOPT_ENCODING => "",*/
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    /*CURLOPT_FOLLOWLOCATION => true,*/
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_SSL_VERIFYPEER => true,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => $postData,
    //CURLOPT_POSTFIELDS => array('no_prop' => $no_prop,'no_kab' => $no_kab,'no_kec' => $no_kec,'no_kel' => $no_kel,'no_rw' => $no_rw),
    /*CURLOPT_HTTPHEADER => array(
    "Content-Type: multipart/form-data; boundary=--------------------------405785126821579732484360"
    ),*/
    ));

    $response = curl_exec($curl);

    if (curl_errno($curl)) {
        print "Error: " . curl_error($curl);
    } else {

        curl_close($curl);

        echo $response;
    }
 }

 function getKesehatan()
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

     $curl = curl_init();

     curl_setopt_array($curl, array(
        CURLOPT_URL => "https://webservice.jogjakota.go.id/kesehatan/?no_prop=".$no_prop."&no_kab=".$no_kab."&no_kec=".$no_kec."&no_kel=".$no_kel."",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
        "Content-Type: multipart/form-data; boundary=--------------------------576775849297563579727347"
    ),
  ));

     $response = curl_exec($curl);

     curl_close($curl);
     echo $response;

 }

}
?>