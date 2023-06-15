<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perjalanan</title>
    <style>
        h1 {
            margin: 5 auto;
            text-align: center;
        }

        p {
            margin: 5 auto;
            text-align: center;
        }

        a {
            text-decoration: none;
        }

        .button {
        width: 170px;
        padding: 5px;
        background-color: #7788ee;
        color: white;
        border: none;
        cursor: pointer;
        }

        .button:hover {
        background-color: #0033ee;
        }
    </style>
</head>
<body>
    <?php
        // variabel penampung value formulir
        $tanggal =$_POST['tanggal'];
        $bulan =$_POST['bulan'];
        $tahun =$_POST['tahun'];
        $jarak =trim($_POST['jarak']);
        $makanPagi =$_POST['makan-pagi'];
        $makanSiang =$_POST['makan-siang'];
        $makanMalam =$_POST['makan-malam'];
        $inap =$_POST['inap'];

        // validasi formulir
        if(empty($jarak) or empty($makanPagi) or empty($makanSiang) or empty($makanMalam) or empty($inap)) {
            echo '<h1>Data gagal divalidasi</h1>';
            echo '<p>silahkan isi semua dengan benar !</p>';
            echo '<p><a href="input-perjalanan.php" class="button">kembali</a></p>';
            die();
        };

        if(!is_numeric($jarak) or $jarak <0) {
            echo '<h1>data gagal divalidasi</h1>';
            echo '<p>silahkan jarak tempuh diisi dengan bilangan positif !</p>';
            echo '<p><a href="input-perjalanan.php" class="button">kembali</a></p>';
            die();
        };
        echo '<p><a href="input-perjalanan.php" class="button">kembali</a></p>';
        // menyimpan data ke dalam file
        
        $record = $tanggal .":". $bulan .":". $tahun .":". $jarak .":". $makanPagi .":". 
                $makanSiang .":". $makanMalam .":". $inap ."\n";
        $file ='perjalanan.txt';
        $bukaFile =fopen($file, "a", true);
        $tulisFile = fputs($bukaFile, $record);

        // cek apakah file berhasil disimpan
        if(fclose($bukaFile)) {
    ?>
        <h1>Catatan Perjalanan Berhasil Disimpan</h1>
            <p>Terima kasih telah menambahkan catatan perjalanan.</p>
            <p>
                <a href="input-perjalanan.php" class="button">Tambahkan Lagi</a>
                <a href="daftar-perjalanan.php" class="button">Lihat Daftar Perjalanan</a>
            </p>
    <?php
        }  else { ?>
        <h1>Catatan Perjalanan Gagal disimpan</h1>
        <p>terjadi kesalahan pada server. Silahkan ulang kembali !</p>
        <p>
            <a href="pengecatan-input.php" class="button">Kembali</a>
        </p>
        <?php } ?>
</body>
</html>