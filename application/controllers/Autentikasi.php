<?php

class Autentikasi extends CI_Controller
{
    public function index()
    {
        $this->form_validation->set_rules(
            'email',
            'Alamat Email',
            'required|trim|valid_email',
            [
                'required' => 'Email Harus diisi!!',
                'valid_email' => 'Email Tidak Benar!!'
            ]
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|trim',
            [
                'required' => 'Password Harus diisi'
            ]
        );

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'login';
            $data['user'] = '';

            $this->load->view('template/aute_header', $data);
            $this->load->view('autentikasi/login');
            $this->load->view('template/aute_footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = htmlspecialchars($this->input->post('email', true));
        $password = $this->input->post('password', true);
        $user = $this->ModelUser->cekData(['email' => $email])->row_array();

        function alert($message = '')
        {
            return '<div class="alert alert-danger alert-message" role="alert">' . $message . '</div>';
        }

        if ($user) {
            if ($user['is_active'] == 1) {
                $md5pass = md5($password);
                if ($md5pass == $user['password']) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);

                    if ($user['role_id'] == 1) {
                        redirect('admin');
                    } else {
                        if ($user['image'] == 'default.jpg') {

                            // $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-message" role="alert">Silahkan Ubah Profile Anda untuk Ubah Photo Profil</div>');
                            $this->session->set_flashdata('pesan', alert('Silahkan Ubah Profile Anda untuk Ubah Photo Profil'));
                        }
                        redirect('user');
                    }
                } else {
                    $this->session->set_flashdata('pesan', alert('Password Salah'));
                    redirect('autentikasi');
                }
            } else {
                $this->session->set_flashdata('pesan', alert('User Belum Diaktivasi'));
                redirect('autentikasi');
            }
        } else {
            $this->session->set_flashdata('pesan', alert('Email Tidak Terdaftar'));
            redirect('autentikasi');
        }
    }

    public function register()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }

        $this->form_validation->set_rules(
            'nama',
            'Nama Lengkap',
            'required',
            ['required' => 'Nama Belum diisi!!']
        );
        $this->form_validation->set_rules(
            'email',
            'Alamat Email',
            'required|trim|valid_email|is_unique[user.email]',
            [
                'valid_email' => 'Email Tidak Benar!!',
                'required' => 'Email Belum diisi!!',
                'is_unique' => 'Email Sudah Terdaftar!'
            ]
        );
        $this->form_validation->set_rules(
            'password1',
            'Password',
            'required|trim|min_length[3]|matches[password2]',
            [
                'matches' => 'Password Tidak Sama!!',
                'min_length' => 'Password Terlalu Pendek'
            ]
        );
        $this->form_validation->set_rules(
            'password2',
            'Repeat Password',
            'required|trim|matches[password1]'
        );

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Registrasi Member';
            $this->load->view('templates/aute_header', $data);
            $this->load->view('autentikasi/registrasi');
            $this->load->view('templates/aute_footer');
        } else {
            $email = $this->input->post('email', true);
            $data = ['nama' => htmlspecialchars($this->input->post('nama', true)), 'email' => htmlspecialchars($email), 'image' => 'default.jpg', 'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT), 'role_id' => 2, 'is_active' => 0, 'tanggal_input' => time()];
            $this->ModelUser->simpanData($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Selamat!! akun member anda sudah dibuat. Silahkan Aktivasi Akun anda</div>');
            redirect('autentikasi');
        }
    }

    public function blok()
    {
        $this->load->view('autentikasi/blok');
    }
    public function gagal()
    {
        $this->load->view('autentikasi/gagal');
    }
}