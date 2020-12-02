<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Produk_model extends Pupmart_Model
{

  /**
   * Class Produk_model
   * 
   * @author almarup21 <https://github.com/almarup21>
   * @package ${NAMESPACE}
   */

  public function getDefaultValues()
  {
    return [
      'id_kategori' => '',
      'slug' => '',
      'kategori' => '',
      'desk' => '',
      'harga' => '',
      'is_avaiable' => 1,
      'image' => '',
    ];
  }

  public function getValidationRules()
  {
    $validationRules = [
      [
        'field' => 'id_kategori',
        'label' => 'Kategori',
        'rules' => 'required'
      ],
      [
        'field' => 'slug',
        'label' => 'SLug',
        'rules' => 'trim|required|callback_unique_slug'
      ],
      [
        'field' => 'kategori',
        'label' => 'Nama Produk',
        'rules' => 'trim|required'
      ],
      [
        'field' => 'desk',
        'label' => 'Deskripsi',
        'rules' => 'required|trim'
      ],
      [
        'field' => 'harga',
        'label' => 'Harga',
        'rules' => 'required|trim|numeric'
      ],
      [
        'field' => 'is_avaiable',
        'label' => 'Ketersediaan',
        'rules' => 'required'
      ]
    ];

    return $validationRules;
  }


  public function uploadImages($fieldName, $filename)
  {
    $config = [
      'upload_path' => '../images/produk',
      'file_name'  => $filename,
      'allowed_types' => 'jpg|png|jpeg|JPG|PNG',
      'max_size' => 1024,
      'max_width' => 0,
      'max_height' => 0,
      'overwrite' => true,
      'file_text_tolower' => true,
    ];

    $this->load->labrary('upload', $config);

    if ($this->upload->do_upload($fieldName)) {
      return $this->upload->data();
    } else {
      $this->session->set_flashdata('image_error', $this->upload->display_errors('', ''));
      return false;
    }
  }


  public function deleteImage($fileName)
  {
    if (file_exists("../images/produk")) {
      unlink("../images/produk");
    }
  }
}

/* End of file Produk_model.php */
