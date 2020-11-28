<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pupmart_Controller extends CI_Controller
{

  /**
   * Membuat Controller sendiri atau Costumize Controller
   * @param [type] $data
   * @return viod
   */

  public function __construct()
  {
    parent::__construct();
    $model = strtolower(get_class($this));
    if (file_exists(APPPATH . 'models/' . $model . '_model.php')) {
      $this->load->model($model . '_model', $model, true);
    }
  }

  /**
   * Membuat load di View didalam Core Controller agar dalam Controllers tidak
   * terlalu panjang membuat Load View defaults
   * @param [type] $data
   * @return void
   */

  public function view($data)
  {
    $this->load->view('templates/header', $data);
  }
}

/* End of file Pupmart_Controller.php */
