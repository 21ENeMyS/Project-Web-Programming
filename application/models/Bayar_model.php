<?php

/**
 * Class Bayar_model
 * 
 * @author almarup21 <almarup21@email.com>
 * @package ${NAMESPACE}
 */

defined('BASEPATH') or exit('No direct script access allowed');

class Bayar_model extends Pupmart_Model
{


  public $table = 'orders';

  public function getDefaultValues()
  {
    return [
      'name' => '',
      'address' => '',
      'phone' => '',
      'status' => ''
    ];
  }

  public function getValidationRules()
  {
    $validationRules = [
      [
        'field'  => 'name',
        'label'  => 'Nama',
        'rules'  => 'trim|required'
      ],
      [
        'field'  => 'address',
        'label'  => 'Alamat',
        'rules'  => 'trim|required'
      ],
      [
        'field'  => 'phone',
        'label'  => 'Telepon',
        'rules'  => 'trim|required|max_length[15]'
      ],
    ];

    return $validationRules;
  }
}


/* End of file Bayar_model.php */
