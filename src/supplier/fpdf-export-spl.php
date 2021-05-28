<?php
    include "../fpdf181/fpdf.php";
    $pdf = new FPDF("L","cm","A4");
    $pdf->AddPage();

    $pdf->SetFont("Arial", "", 16);

    $image1 = "../../logo500.jpg";

    // $pdf->Image($image1, 5, $pdf->GetY(), 33.78);

    //? Parameter Cell(1,2,3,4,5,6) = Cell(width, height, text, border, position, align)
    $pdf->Cell(27, 0.7, "Minimarket 500", 0, 1, "C");
    $pdf->ln();

    $pdf->ln();
    // Image($file, $x='', $y='', $w=0, $h=0, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false)
    // Logo
    $pdf->Image($image1,13,1.7,3);

    $pdf->Cell(27, 0.7, "Jl. Brig. Jend. Hasan Basry No.07 Telp 0511-3305054 Banjarmasin", 0, 1, "C");

    $pdf->SetLineWidth(0.05);
    $pdf->line(1, 3.9, 29, 3.9);
    $pdf->line(1, 4.2, 29, 4.2);

    $pdf->SetLineWidth(0.01);

    $pdf->ln();
    $pdf->ln();
    $pdf->Cell(27, 0.7, "Laporan Data Supplier", 0, 1, "C");
    $pdf->ln();

    $pdf->SetFillColor(255,0,0);
    $pdf->Cell(1, 0.7, "#", 1, 0, "C", true);
    $pdf->Cell(4, 0.7, "ID Supplier", 1, 0, "C", true);
    $pdf->Cell(9, 0.7, "Nama Supplier", 1, 0, "C", true);
    $pdf->Cell(9, 0.7, "Alamat ", 1, 0, "C", true);
    $pdf->Cell(5, 0.7, "No HP", 1, 1, "C", true);

    include "../koneksi.php";
    $no = 1;
    $result = mysqli_query($koneksi,"SELECT * FROM supplier ORDER BY id_supplier ASC");
    while($data = mysqli_fetch_array($result)){
        $pdf->Cell(1, 0.7, $no++, 1, 0, "C");
        $pdf->Cell(4, 0.7, $data[0], 1, 0, "C");
        $pdf->Cell(9, 0.7, $data[1], 1, 0, "L");
        $pdf->Cell(9, 0.7, $data[2], 1, 0, "L");
        $pdf->Cell(5, 0.7, $data[3], 1, 1, "L");
    }

    $pdf->output();
?>
