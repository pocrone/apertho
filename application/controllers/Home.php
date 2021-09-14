<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->has_userdata('id_user')) {
            redirect('auth', 'refresh');
        }
        $this->load->model('Arsip_model');
        $this->load->model('Auth_model');

        $this->load->library('encryption');
    }
    public function index()
    {
        $data = array(
            'title' => 'Beranda',
            'pendidikan' => $this->Arsip_model->countByKategori('pendidikan'),
            'keuangan' => $this->Arsip_model->countByKategori('keuangan'),
            'kesehatan' => $this->Arsip_model->countByKategori('kesehatan'),
            'kepemilikan' => $this->Arsip_model->countByKategori('kepemilikan'),
            'datadiri' => $this->Arsip_model->countByKategori('datadiri'),
        );
        $this->load->view('template/header-mobile');
        $this->load->view('home/dashboard');
        $this->load->view('template/footer-mobile');
    }

    public function camera()
    {
        $this->load->view('template/header-mobile');
        $this->load->view('home/camera');
        $this->load->view('template/footer-mobile');
    }
    public function tambah()
    {
        $data = array(
            'title' => 'Tambah Arsip'
        );
        $this->load->view('template/header', $data);
        $this->load->view('tambah');
        $this->load->view('template/footer');
    }
    public function tambah__()
    {
        $config['upload_path']          = './files/';
        $config['allowed_types']        = '*';
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')) {
            redirect('tambah', 'refresh');
        } else {
            $data = array(
                'kategori' => $this->input->post('kategori'),
                'nama_arsip' => $this->input->post('nama_arsip'),
                'file' => $this->upload->data('file_name'),
                'ext' => $this->upload->data('file_ext'),
                'id_user' => $this->session->userdata('id_user')

            );
            $this->db->insert('arsip', $data);

            redirect($data['kategori'], 'refresh');
        }
    }
    public function edit($id)
    {
        $data = array(
            'title' => 'Edit Arsip',
            'arsip' => $this->Arsip_model->getArsipById($id)
        );
        $this->load->view('template/header', $data);
        $this->load->view('edit');
        $this->load->view('template/footer');
    }
    public function edit__()
    {
        $config['upload_path']          = './files/';
        $config['allowed_types']        = '*';
        $this->load->library('upload', $config);
        $id_arsip = $this->input->post('id');

        if (!$this->upload->do_upload('file')) {
            //jika user tidak upload file
            $data = array(
                'kategori' => $this->input->post('kategori'),
                'nama_arsip' => $this->input->post('nama_arsip'),
            );

            $this->Arsip_model->updateArsip($id_arsip, $data);
            redirect($data['kategori'], 'refresh');
        } else {
            //jika user upload file
            //hapus file lama
            $old_file = $this->Arsip_model->getArsipRow($id_arsip, 'file');
            unlink('./files/' . $old_file);
            //update
            $data = array(
                'kategori' => $this->input->post('kategori'),
                'nama_arsip' => $this->input->post('nama_arsip'),
                'file' => $this->upload->data('file_name'),
                'ext' => $this->upload->data('file_ext'),
            );

            $this->Arsip_model->updateArsip($id_arsip, $data);

            redirect($data['kategori'], 'refresh');
        }
    }
    public function arsip($kategori)
    {
        $title = $kategori;
        if ($kategori == 'datadiri') {
            $title = "Data Diri";
        }
        $data = array(
            'title' => 'Arsip ' . $title,
            'arsip' => $this->Arsip_model->getArsipByKategori($kategori),
            'count' => $this->Arsip_model->countByKategori($kategori),
            'kategori' => $kategori,
        );

        $this->load->view('template/header', $data);
        $this->load->view('arsip');
        $this->load->view('template/footer');
    }
    // public function download($id)
    // {
    //     $filename=$this->Arsip_model->getArsipRow($id, 'file');
    //     //$mime = get_mime_by_extension($filename)
    //     force_download('./files/'.$filename, true);
    // }
    public function push_file($id)
    {
        $name = $this->Arsip_model->getArsipRow($id, 'file');
        $path = './files/' . $name;
        // make sure it's a file before doing anything!
        if (is_file($path)) {
            // required for IE
            if (ini_get('zlib.output_compression')) {
                ini_set('zlib.output_compression', 'Off');
            }

            // get the file mime type using the file extension
            $this->load->helper('file');

            $mime = get_mime_by_extension($path);

            // Build the headers to push out the file properly.
            header('Pragma: public');     // required
            header('Expires: 0');         // no cache
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Last-Modified: ' . gmdate('D, d M Y H:i:s', filemtime($path)) . ' GMT');
            header('Cache-Control: private', false);
            header('Content-Type: ' . $mime);  // Add the mime type from Code igniter.
            header('Content-Disposition: attachment; filename="' . basename($name) . '"');  // Add the file name
            header('Content-Transfer-Encoding: binary');
            header('Content-Length: ' . filesize($path)); // provide file size
            header('Connection: close');
            readfile($path); // push it out
            exit();
        }
    }
    public function lihat($id)
    {
        $data = array(
            'title' => $this->Arsip_model->getArsipRow($id, 'nama_arsip'),
            'file' => $this->Arsip_model->getArsipRow($id, 'file'),
            'back' => base_url() . $this->Arsip_model->getArsipRow($id, 'kategori')
        );
        $this->load->view('template/header', $data);
        $this->load->view('lihat');
        $this->load->view('template/footer');
    }
    public function profil()
    {
        $data = array(
            'title' => 'Pengaturan Profil',
            'profil' => $this->Arsip_model->getProfil()
        );
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('telp', 'telp', 'required|numeric|callback_telp_check', array('numeric' => 'Nomor telepon harus berupa angka'));
        $this->form_validation->set_rules('alamat', 'alamat ', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('profil');
            $this->load->view('template/footer');
        } else {
            $data_user = array(
                'nama' => $this->input->post('nama'),
                'telp' => $this->input->post('telp'),
                'alamat' => $this->input->post('alamat')
            );
            $this->Arsip_model->updateProfil($data_user);
            $userdata = array(
                'nama'     => $data_user['nama']
            );
            $this->session->set_userdata($userdata);
            redirect('profil', 'refresh');
        }
    }
    public function password()
    {
        $data = array(
            'title' => 'Pengaturan Profil'
        );
        $this->form_validation->set_rules('old_password', 'Password', 'required|callback_password_check');
        $this->form_validation->set_rules('new_password', 'Password', 'required');
        $this->form_validation->set_rules(
            'passconf',
            'Konfirmasi Kata Sandi',
            'matches[new_password]',
            array(
                'matches' => 'Kata sandi baru tidak sesuai',
            )
        );
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('password');
            $this->load->view('template/footer');
        } else {
            $new_password = $this->input->post('new_password');
            $data = array(
                'password' => password_hash($new_password, PASSWORD_BCRYPT)
            );
            $this->Auth_model->updatePassword($data);
            redirect('profil', 'refresh');
        }
    }
    public function password_check($password)
    {
        $password_hash = $this->Auth_model->getPassword();
        if (password_verify($password, $password_hash)) {
            return true;
        } else {
            $this->form_validation->set_message('password_check', 'Kata sandi lama salah');
            return false;
        }
    }
    public function telp_check($telp)
    {
        $count = $this->Arsip_model->uniqueTelp($telp);

        if ($count == 0) {
            return true;
        } else {
            $this->form_validation->set_message('telp_check', 'Nomor Telepon sudah terdaftar');
            return false;
        }
    }
    public function hapus($id)
    {
        $kategori = $this->Arsip_model->getArsipRow($id, 'kategori');
        $old_file = $this->Arsip_model->getArsipRow($id, 'file');

        $this->Arsip_model->deleteArsip($id);

        unlink('./files/' . $old_file);
        //print_r(base_url($kategori));
        redirect($kategori, 'refresh');
    }
    public function cari($kategori)
    {
        $kata = $this->input->post('cari');
        $data = array(
            'title' => 'Pencarian Arsip',
            'kata' => $kata,
            'kategori' => $kategori,
            'arsip' => $this->Arsip_model->cari($kategori, $kata),
            'count' => $this->Arsip_model->countCari($kategori, $kata)
        );
        $this->load->view('template/header', $data);
        $this->load->view('cari');
        $this->load->view('template/footer');
    }
}
        
    /* End of file  Home.php */
