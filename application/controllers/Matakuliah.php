<?php
class Matakuliah extends CI_Controller
{
    public function index()
    {
        $this->load->view('view_form_matakuliah');
    }

    public function cetak()
    {
        $this->form_validation->set_rules('kode', 'Kode Matakuliah', 'required|min_length[3]', [
            'required' => "Kode Matakuliah harus diisi.",
            'min_length' => "Kode terlalu pendek. Minimal 3 karakter."
        ]);
        $this->form_validation->set_rules('nama', 'Nama Matakuliah', 'required|min_length[3]', [
            'required' => "Nama Matakuliah harus diisi.",
            'min_length' => "Nama terlalu pendek. Minimal 3 karakter."
        ]);
        $this->form_validation->set_rules('kode', 'Kode Matakuliah', 'required|min_length[3]', [
            'required' => "Kode Matakuliah harus diisi.",
            'min_length' => "Kode terlalu pendek. Minimal 3 karakter."
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('view_form_matakuliah');
        } else {
            $kode = $this->input->post('kode', TRUE);
            $nama = $this->input->post('nama', TRUE);
            $sks = $this->input->post('sks', TRUE);

            $data = [
                'kode' => $kode,
                'nama' => $nama,
                'sks' => $sks,
            ];

            $this->load->view('view_datakuliah', $data);
        }
    }
}
