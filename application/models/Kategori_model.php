<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_model extends Pupmart_Model
{


  /**
   * Class Kategori_model
   * 
   * @author almarup21 <https://github/almarup21>
   * @package @{NAMESPACE}
   */

  public function getDefaultValues()
  {
    return [
      'id' => '',
      'slug' => '',
      'kategori' => ''
    ];
  }

  public function getValidationRules()
  {
    $validationRules = [
      [
        'field' => 'slug',
        'label' => 'Slug',
        'rules' => 'trim|required|callback_unique_slug'
      ],
      [
        'field' => 'kategori',
        'label' => 'Kategori',
        'rules' => 'trim|required'
      ],
    ];

    return $validationRules;
  }
}
/* End of file Ketegori_model.php */
