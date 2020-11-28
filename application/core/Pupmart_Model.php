<?php

/**
 * Class Pupmart_Model
 * Membuat Query Builder supaya synatx dalam Models tidak terlalu panjang 
 * Dan Tinggal dipanggil saja dari Folder core ini
 * @author Almarup21 <https://github.com/almarup21>
 * @package ${NAMESPACE}
 */

use function PHPSTORM_META\type;

defined('BASEPATH') or exit('No direct script access allowed');

class Pupmart_Model extends CI_Model
{
  protected $table = '';
  protected $perPage = 5;

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


  public function validate()
  {
    /**
     * Fungsi Validasi Input
     * Peraturan Dideklarasikan dalam masing-masing model
     * @author Almarup21 <https://github.com/almarup21>
     * @package ${NAMESPACE}
     */

    $this->load->library('form_validation');

    $this->form_validation->set_error_delimeters(
      '<small class="form-text text-danger">',
      '</small>'
    );

    $validationRules = $this->getValidationRules();
    $this->form_validation->set_rules($validationRules);
    return $this->form_validation->run();
  }

  public function select($column)
  {
    $this->db->select($column);
    return $this;
  }

  public function where($column, $condition)
  {
    $this->db->where($column, $condition);
    return $this;
  }

  public function like($column, $condition)
  {
    $this->db->like($column, $condition);
    return $this;
  }

  public function orLike($column, $condition)
  {
    $this->db->or_like($column, $condition);
    return $this;
  }

  public function join($table, $type = 'left')
  {
    $this->db->join($table, "$this->table.id_$table = $table.id", $type);
    return $this;
  }

  public function orderBy($column, $order = 'asc')
  {
    $this->db->order_by($column, $order);
    return $this;
  }

  public function first()
  {
    return $this->db->get($this->table)->row();
  }

  public function getAll()
  {
    return $this->db->get($this->table)->result();
  }

  public function count()
  {
    return $this->db->count_all_results($this->table);
  }

  public function create($data)
  {
    $this->db->insert($this->table, $data);
    return $this->db->insert_id();
  }

  public function update($data)
  {
    return $this->db->update($this->table, $data);
  }

  public function delete()
  {
    $this->db->delete($this->table);
    return $this->db->affected_rows();
  }

  /**
   * Membatasi data ke halaman supaya tidak overlow
   * 
   * @author almarup21 <https://github.com/almarup21>
   * @package ${NAMESPACE}
   */

  public function pagination($page)
  {
    $this->db->limit($this->perPage, $this->calculateOffset($page));
  }

  public function calculateOffset($page)
  {
    if (is_null($page) || empty($page)) {
      $offset = 0;
    } else {
      $offset = ($page * $this->perPage) - $this->perPage;
    }

    return $offset;
  }

  public function makePagination($baseUrl, $uriSegment, $totalRows = null)
  {
    $this->load->library('pagination');

    $config = [
      'base_url' => $baseUrl,
      'uri_segment' => $uriSegment,
      'per_page' => $this->perPage,
      'total_rows' => $totalRows,
      'user_page_number' => true,

      'full_tag_open' => '<ul class="pagination">',
      'full_tag_close' => '</ul>',
      'attributes' => ['class' => 'page_link'],
      'first_link' => false,
      'last_link' => false,
      'first_tag_open' => '<li class="page-item">',
      'first_tag_close' => '</li>',
      'prev_link' => '&laquo',
      'prev_tag_open' => '<li class="page-item">',
      'prev_tag_close' => '</li>',
      'next_link' => '&raquo',
      'next_tag_open' => '<li class="page-item">',
      'next_tag_close' => '</li>',
      'last_tag_open' => '<li class="page-item">',
      'last_tag_close' => '</li>',
      'cur_tag_open' => '<li class="page-item active"><a href="#"             class="page-link">',
      'cur_tag_close' => '<span class="sr-only">(current)</span></a></li>',
      'numb_tag_open' => '<li class="page-item">',
      'numb_tag_close' => '</li>'
    ];

    $this->pagination->initialize($config);
    return $this->pagination->create_links();
  }
}

/* End of file Pupmart_Model.php */
