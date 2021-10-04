<?php
class LatihanSatu extends CI_Controller
{
    public function index()
    {
        echo "Test Page";
    }

    public function penjumlahan()
    {
        $nilai1 = 10;
        $nilai2 = 20;

        $penjumlahan = $nilai1 + $nilai2;

        echo "Hasil penjumlahan " . $nilai1 . " + " . $nilai2 . " = " . $penjumlahan;
    }
    // pakai model
    public function penjumlahan2()
    {
        $this->load->model('Model_latihansatu');
        $hasil = $this->Model_latihansatu->jumlah();

        echo "Hasil penjumlahan " . $hasil;
    }
    //pakai model dan parameter
    public function penjumlahan3($n1 = 0, $n2 = 0)
    {
        $this->load->model('Model_latihansatu');
        $hasil = $this->Model_latihansatu->jumlah2($n1, $n2);

        echo "Hasil penjumlahan " . $hasil;
    }
    //pakai model, parameter, dan view
    public function penjumlahan4($n1 = 0, $n2 = 0)
    {
        $this->load->model('Model_latihansatu');
        $hasil = $this->Model_latihansatu->jumlah2($n1, $n2);

        $data['hasil'] = $hasil;

        $this->load->view('view_latihan1', $data);
    }
}
