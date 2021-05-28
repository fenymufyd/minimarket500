<?php
function kode_auto($tabel,$id,$prefix){
    include "koneksi.php";
    // $sql = "SELECT $id FROM $tabel ORDER BY $id DESC";
    $sql = "SELECT MAX($id) AS kode FROM $tabel ORDER BY $id DESC";

    $query = mysqli_query($koneksi,$sql);
	$data = mysqli_fetch_assoc($query);
    if ($data) {
        // $nilaiKode = substr($data['kode'],1);
        $a = substr((string)$data['kode'], strpos($data['kode'], "-") + 1);
        $b = intval($a);
        $kode = $b + 1;
        $kodeAuto = str_pad($kode,4,"0",STR_PAD_LEFT);
        $kodeAuto = $prefix.$kodeAuto;
    }else{
        $kodeAuto = $prefix."0001";
    }

    return $kodeAuto;
}

?>
