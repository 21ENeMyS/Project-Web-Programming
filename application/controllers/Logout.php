<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Logout extends Pupmart_Controller
{

  /**
   * Class Logout
   * 
   * @author
   * @package 
   */

  public function index()
  {

    // Menghapus data Cookie
    $sess_data = [
      'id',
      'nama',
      'email',
      'role',
      'is_login'
    ];

    $this->session->unset_userdata($sess_data);
    $this->session->sess_destroy();
    redirect(base_url());
  }
}

/* End of file Logout.php */
