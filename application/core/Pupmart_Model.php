<?php

/**
 * Class Pupmart_Model
 * Membuat Query Builder supaya synatx dalam Models tidak terlalu panjang 
 * Dan Tinggal dipanggil saja dari Folder core ini
 * @author Almarup21 <https://github.com/almarup21>
 * @package ${NAMESPACE}
 */


defined('BASEPATH') or exit('No direct script access allowed');

class Pupmart_Model extends CI_Model
{
  protected $table = '';

  public function __construct()
  {
    parent::__construct();
    if (!$this->table) {
      // Jika tabel kosong 
      $this->table = strtolower(
        // Secra otomotis akan mencari suata nama Kelas model yang kita gunakan
        str_replace('_model', '', get_class($this))
      );
    }
  }
}

/* End of file Pupmart_Model.php */
