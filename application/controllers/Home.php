<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Home extends Pupmart_Controller
{

  /**
   * Class Home extends Pupmart_Controller
   * 
   * @author almarup21 <https://github.com/almarup21>
   * @package ${NAMESPACE}
   */


  public function index()
  {
    $data = [
      'title' => 'Home',
      'page' => 'home/index'
    ];

    $this->view($data);
  }
}

/* End of file Home.php */
