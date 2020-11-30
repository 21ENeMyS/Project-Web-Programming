<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends Pupmart_Model
{

  protected $table  = 'user';

  /**
   * Class Login_model
   * 
   * @author almarup21 <https://github.com/almarup21>
   * @package ${NAMESPACE}
   */

  public function getDefaultValues()
  {
    return [
      'email' => '',
      'password' => ''
    ];
  }

  public function getValidationRules()
  {
    $validationRules = [
      [
        'field' => 'email',
        'label' => 'Email',
        'rules' => 'trim|valid_email|required'
      ],
      [
        'field' => 'password',
        'label' => 'Password',
        'rules' => 'required|min_length[8]'
      ]
    ];

    return $validationRules;
  }


  public function run($input)
  {
    $query = $this->where('email', strtolower($input->email))->where('is_active', 1)->first();

    if (!empty($query) && hashEncryptVerify($input->password, $query->password)) {
      $sess_data = [
        'id' => $query->id,
        'nama' => $query->nama,
        'email' => $query->email,
        'role' => $query->role,
        'is_login' => true

      ];
      $this->session->set_userdata($sess_data);
      return true;
    }
    return false;
  }
}

/* End of file Login_model.php */
