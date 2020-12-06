<?php


/**
 * Class Profile_model
 * 
 * @author almarup21 <almarup21@email.com>
 * @package ${NAMESPACE}
 */

defined('BASEPATH') or exit('No direct script access allowed');

class Profile_model extends Pupmart_Model
{

  protected $table = 'user';

  public function getDefaultValues()
  {
    return [
      'nama' => '',
      'email' => '',
      'image' => ''
    ];
  }

  public function getValidationRules()
  {
    $validationRules = [
      [
        'field' => 'nama',
        'label' => 'Nama',
        'rules' => 'trim|required'
      ],
      [
        'field' => 'email',
        'label' => 'Email',
        'rules' => 'trim|required|valid_email|callback_unique_email'
      ]
    ];

    return $validationRules;
  }


  public function uploadImage($fieldName, $fileName)
  {
    $config = [
      'upload_path' => '../images/user',
      'file_name' => $fileName,
      'allowed_types'    => 'jpg|gif|png|jpeg|JPG|PNG',
      'max_size'      => 1024,
      'max_width'      => 0,
      'max_height'    => 0,
      'overwrite'      => true,
      'file_ext_tolower'  => true
    ];

    $this->load->library('upload', $config);

    if ($this->upload->do_upload($fieldName)) {
      return $this->upload->data();
    } else {
      $this->session->set_flashdata('image_error', $this->upload->display_errors('', ''));
      return false;
    }
  }


  public function deleteImage($fileName)
  {
    if (file_exists("../images/user/$fileName")) {
      unlink("../images/user/$fileName");
    }
  }
}

/* End of file Profile_model.php */
