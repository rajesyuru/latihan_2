<?php
class Model_latihansatu extends CI_Model
{
    public function jumlah()
    {
        $nilai1 = 10;
        $nilai2 = 20;

        $penjumlahan = $nilai1 + $nilai2;

        return $penjumlahan;
    }

    public function jumlah2($a, $b)
    {

        $penjumlahan = $a + $b;

        return $penjumlahan;
    }
}
