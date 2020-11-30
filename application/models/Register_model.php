<?php

/**
 * Class Register_model
 * 
 * @author almarup21 <https://github.com/almarup21>
 * @package ${NAMESPACE}
 */

defined('BASEPATH') or exit('No direct script access allowed');

class Register_model extends Pupmart_Model
{

  protected $table = 'user';

  public function getDefaultValues()
  {
    return [
      'nama' => '',
      'email' => '',
      'password' => '',
      'role' => '',
      'is_active' => ''
    ];
  }

  /**
   * Membuat Validasi untuk member atau user
   * 
   * 
   * @author almarup21 <https://github.com/almarup21>
   * @package ${NAMESPACE}
   */

  public function getValidationRules()
  {
    $validationRules = [
      [
        'field' => 'nama',
        'label' => 'Nama',
        'rules' => 'trim|required',
      ],
      [
        'field' => 'email',
        'label' => 'Email',
        'rules' => 'trim|required|valid_email|is_unique[user.email]',
        'errors' => [
          'is_unique' => 'Email ini sudah tersedia'
        ]
      ],
      [
        'field' => 'password',
        'label' => 'Password',
        'rules' => 'required|min_length[8]',
      ],
      [
        'field' => 'password_confirmation',
        'label' => 'Konfirmasi Password',
        'rules' => 'required|matches[password]'

      ],
    ];

    return $validationRules;
  }

  /**
   * Memproses validasi mengEncrypt password
   * 
   * @author almarup21 <https://github.com/almarup21>
   * @package ${NAMESPACE}
   */

  public function run($input)
  {
    $data = [
      'nama' => $input->nama,
      'email' => strtolower($input->email),
      'password' => hashEncrypt($input->password),
      'role' => 'member'
    ];

    $user = $this->create($data);
    // sess_data dimana berfungsi untuk menyimpanan data
    $sess_data = [
      'id' => $user,
      'nama' => $data['nama'],
      'email' => $data['email'],
      'role' => $data['role'],
      'is_login' => true

    ];

    $this->session->set_userdata($sess_data);
    return true;
  }
}
/* End of file Registrer_model.php */
