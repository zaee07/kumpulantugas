<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kalkulasi harga tiket</title>
</head>
<body>
    <h1>Total yang harus dibayarkan !</h1>
    <?php
    $nama = $_POST['nama'];
    $nomor = $_POST['nomor'];
    $hargaTiket = 120000;
    $jumlahTiket = $_POST['tiket'];
    $totalHarga = $hargaTiket * $jumlahTiket;

    
    print "<p>Rincian Pembelian Tiket :<br> Nama Lengkap : " . $nama . 
    "<br> Nomor Telepon : " . $nomor . "<br> Jumlah Tiket : " . $jumlahTiket . 
    "<br> Total Harga Tiket : Rp." . $totalHarga . "</p>";
    ?>
</body>
</html>