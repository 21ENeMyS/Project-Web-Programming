<?php


defined('BASEPATH') or exit('No direct script access allowed');

class User extends Pupmart_Controller
{

  /**
   * Class User
   * 
   * @author almarup21 <https://github.com/almarup21>
   * @package ${NAMESPACE}
   */



  public function __construct()
  {
    parent::__construct();
    $role = $this->session->userdata('role');
    if ($role != 'admin') {
      redirect(base_url('/'));
      return;
    }
  }


  public function index($page = null)
  {
    $data['title'] = 'Dashboard';
    $data['content'] = $this->user->paginate($page)->getAll();
    $data['total_rows'] = $this->user->count();
    $data['pagination'] = $this->user->makePagination(
      base_url('user'),
      2,
      $data['total_rows']
    );
    $data['page'] = 'user/index';

    $this->view($data);
  }

  public function cari($page = null)
  {
    if (isset($_POST['keyword'])) {
      $this->session->set_userdata('keyword', $this->input->post('keyword'));
    } else {
      redirect(base_url('user'));
    }

    $keyword  = $this->session->userdata('keyword');
    $data['title']    = 'Dashboard';
    $data['content']  = $this->user
      ->like('nama', $keyword)
      ->orLike('email', $keyword)
      ->paginate($page)
      ->getAll();
    $data['total_rows']  = $this->user->like('nama', $keyword)->orLike('email', $keyword)->count();
    $data['pagination']  = $this->user->makePagination(
      base_url('user/cari'),
      3,
      $data['total_rows']
    );
    $data['page']    = 'user/index';

    $this->view($data);
  }

  public function reset()
  {
    $this->session->unset_userdata('keyword');
    redirect(base_url('user'));
  }

  public function tambah()
  {
    if (!$_POST) {
      $input = (object) $this->user->getDefaultValues();
    } else {
      $input = (object) $this->input->post(null, true);
      $this->load->library('form_validation');
      $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
      $input->password = hashEncrypt($input->password);
    }


    if (!empty($_FILES) && $_FILES['image']['nama'] !== '') {
      $imageName  = url_title($input->nama, '-', true) . '-' . date('YmdHis');
      $upload    = $this->user->uploadImage('image', $imageName);
      if ($upload) {
        $input->image  = $upload['file_name'];
      } else {
        redirect(base_url('user/tambah'));
      }
    }

    if (!$this->user->validate()) {
      $data['title'] = "Tambah Pengguna";
      $data['input'] = $input;
      $data['form_action'] = base_url("user/tambah");
      $data['tombol'] = "Tambahkan";
      $data['page'] = 'user/tambah';

      $this->view($data);
      return;
    }

    if ($this->user->create($input)) {
      $this->session->set_flashdata('success', ' Data berhasil ditambahkan');
    } else {
      $this->session->set_flashdata('error', ' Oooow!! Data gagal ditambahkan Coba lagi nanti ya tetap semangat');
    }
    redirect(base_url('user'));
  }

  public function ubah($id)
  {
    $data['content'] = $this->user->where('id', $id)->first();

    if (!$data['content']) {
      $this->session->set_flashdata('warning', 'Maaf, data tidak dapat ditemukan');
      redirect(base_url('user'));
    }

    if (!$_POST) {
      $data['input']  = $data['content'];
    } else {
      $data['input']  = (object) $this->input->post(null, true);
      if ($data['input']->password !== '') {
        $data['input']->password = hashEncrypt($data['input']->password);
      } else {
        $data['input']->password = $data['content']->password;
      }
    }

    if (!empty($_FILES) && $_FILES['image']['name'] !== '') {
      $imageName  = url_title($data['input']->name, '-', true) . '-' . date('YmdHis');
      $upload    = $this->user->uploadImage('image', $imageName);
      if ($upload) {
        if ($data['content']->image !== '') {
          $this->user->deleteImage($data['content']->image);
        }
        $data['input']->image  = $upload['file_name'];
      } else {
        redirect(base_url("user/ubah/$id"));
      }
    }

    if (!$this->user->validate()) {
      $data['title']      = 'Ubah Pengguna';
      $data['form_action']  = base_url("user/ubah/$id");
      $data['page']      = 'user/tambah';

      $this->view($data);
      return;
    }


    if ($this->user->where('id', $id)->update($data['input'])) {
      $this->session->set_flashdata('success', ' Data berhasil disimpan!');
    } else {
      $this->session->set_flashdata('error', ' Ooww! Terjadi suatu kesalahan');
    }

    redirect(base_url('user'));
  }


  public function hapus($id)
  {
    if (!$_POST) {
      redirect(base_url('user'));
    }

    $user = $this->user->where('id', $id)->first();

    if (!$user) {
      $this->session->set_flashdata('warning', ' Mohon maaf saya tidak menemukan data yang anda cari');
      redirect(base_url('url'));
    }

    if ($this->user->where('id', $id)->delete()) {
      $this->user->deleteImage($user->image);
      $this->session->set_flashdata('success', ' Data berhasil dihapus');
    } else {
      $this->session->set_flashdata('error', ' Oooow!! Data gagal dihapus Coba lagi nanti ya tetap semangat');
    }

    redirect(base_url('user'));
  }

  public function unique_email()
  {
    $email = $this->input->post('email', true);
    $id = $this->input->post('id');
    $user = $this->user->where('email', $email)->first();

    if ($user) {
      if ($id == $user->id) {
        return true;
      }
      $this->load->library('form_validation');
      $this->form_validation->set_message('unique_email', '%s Sudah digunakan');
      return false;
    }
    return true;
  }
}

/* End of file User.php */
