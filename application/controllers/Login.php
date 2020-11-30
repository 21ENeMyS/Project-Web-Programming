<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Login extends Pupmart_Controller
{

  /**
   * Class Login
   * 
   * @author almarup21 <https://github.com/almarup21>
   * @package ${NAMESPACE}
   */

  public function __construct()
  {
    parent::__construct();
    /**
     * Apakah User sudah login ?
     * jika User sudah login akan dialihkan/redirect ke halaman pertama 
     * 
     * @author almarup21 <https://github.com/almarup21>
     * @package ${NAMESPACE}
     */
    $is_login = $this->session->userdata('is_login');

    if ($is_login) {
      redirect(base_url());
      return;
    }
  }


  public function index()
  {
    if (!$_POST) {
      $input = (object) $this->login->getDefaultValues();
    } else {
      $input = (object) $this->input->post(null, true);
    }

    if (!$this->login->validate()) {
      $data = [
        'title' => "Halaman Login",
        'input' => $input,
        'page' => 'auth/login'
      ];
      $this->view($data);
      return;
    }

    if ($this->login->run($input)) {
      $this->session->set_flashdata('success', ' Anda berhasil melakukan login');
      redirect(base_url());
    } else {
      $this->session->set_flashdata('error', ' Email atau Password salah');
      redirect(base_url('login'));
    }
  }
}

/* End of file Login.php */
