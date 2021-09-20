<?php

class LatihanSatu extends CI_Controller
{
    public function index()
    {
        echo "<h1>Contoh Class</h1>";
    }

    public function biodata()
    {
        $this->load->view('view_biodata');
    }

    public function biodata2()
    {
        $this->load->model('model_biodata');
        $bio = $this->model_biodata->biodata();

        echo "<h1>Perkenalkan</h1>";
        echo "<br>";
        echo "Nama: " . $bio;
    }

    public function biodata3()
    {
        $this->load->model('model_biodata');
        $bio = $this->model_biodata->biodata();
        $data['title'] = "Form biodata";
        $this->load->view('view_biodata', $data);
    }
}
