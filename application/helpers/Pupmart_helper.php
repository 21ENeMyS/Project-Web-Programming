<?php

function getDropdownList($table, $column)
{
  $CI = &get_instance();
  $query = $CI->db->select($column)->from($table)->get();

  if ($query->num_rows() >= 1) {
    $option1 = ['' =>  '_ select _'];
    $option2 = array_column($query->result_array(), $column[1], $column[0]);
    $options = $option1 + $option2;

    return $options;
  }

  return $options = [' ' => '_ select _'];
}

function getCategories()
{
  $CI = &get_instance();
  $query = $CI->db->getall('kategori')->result();
  return $query;
}

/**
 * Fungsi Getcard untuk menghitung jumlah data belanja Pembeli atau user 
 * 
 * 
 * @author almarup21 <https://github.com/almarup21>
 * @package ${NAMESPACE}
 */

function getCart()
{
  $CI = &get_instance();
  $userId = $CI->session->userdata('id');
  if ($userId) {
    $query = $CI->db->where('id_user', $userId)->count_all_results('cart');
    return $query;
  }
  return false;
}

/**
 * Membuat password hashing atau meng-amankan password
 * 
 * @author almarup21 <https://github.com/almarup21>
 * @package ${NAMESPACE}
 */

function hashEncrypt($input)
{
  $hash = password_hash($input, PASSWORD_DEFAULT);
  return $hash;
}

/**
 * Verifikasi Password jika password sama akan mengambalikan nilai true
 * Dan jika salah akan mengembalikan nilai false atau gagal
 * 
 * @author almarup21 <https:///github.com/almarup21>
 * @package ${NAMESPACE}
 */

function hashEncryptVerify($input, $hash)
{
  if (password_verify($input, $hash)) {
    return true;
  } else {
    return false;
  }
}
