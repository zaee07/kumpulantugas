<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pengecatan</title>
    <style>
        .container {
            background-color: darkorchid;
            padding: 10px;
            justify-content: center;
            align-items: center;
            align-content: center;

        }

        .button {
            background-color: green;
            color: white;
            text-decoration: none;
            font-size: 14px;
            line-height: 1;
            border: none;
            border-radius: 8px;
            border-style: solid;
            border-color: black;
            padding: 8px 16px;
            margin: 8px 2px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <?php
        if($_SERVER['REQUEST_METHOD']=="POST") {
            // statement memproses
            $tanggal =$_POST['tanggal'];
            $bulan =$_POST['bulan'];
            $tahun =$_POST['tahun'];
            $panjang =trim($_POST['panjang']);
            $lebar =trim($_POST['lebar']);
            $tinggi =trim($_POST['tinggi']);
            $bayar =$_POST['bayar'];


            if(empty($panjang) or empty($lebar) or empty($tinggi)) {
                echo '<h1>gagal divalidasi</h1>';
                echo '<p>silahkan isi semua dengan benar !</p>';
                echo '<p><a href="pengecatan.php" class="button">kembali</a></p>';
                die();
            };

            if(!is_numeric($panjang) or !is_numeric($lebar) or !is_numeric($tinggi)
                or $panjang <0 or $lebar <0 or $tinggi <0) {
                echo '<h1>gagal divalidasi</h1>';
                echo '<p>silahkan isi semua dengan benar !</p>';
                echo '<p><a href="pengecatan.php" class="button">kembali</a></p>';
                die();
            };

            $luasTembokPanjang = 2 * $panjang * $tinggi;
            $luasTembokPendek = 2 * $lebar * $tinggi;
            $luasLangit = $lebar * $panjang;
            $luasTotalArea = $luasTembokPanjang + $luasTembokPendek + $luasLangit;
            $biayaCat = $luasTotalArea /150 * 200000;
            $biayaTenagaKerja = $luasTotalArea /30 * 20000;
            $totalBiaya = $biayaCat + $biayaTenagaKerja;

            // buat aray asociative untuk input user

            $record = [
                "tanggal" => $tanggal,
                "bulan" => $bulan,
                "tahun" => $tahun,
                "panjang" => $panjang,
                "lebar" => $lebar,
                "tinggi" => $tinggi,
                "cara pembayaran" => $bayar,
                "biaya cat" => $biayaCat,
                "biaya tenaga kerja" => $biayaTenagaKerja,
                "total biaya" => $totalBiaya
            ];
            $jsonRecord=json_encode($record)."\n";

            $file = 'pengecatan.txt';
            $bukaFile = fopen($file, "a", true);
            $tulisFile = fputs($bukaFile, $jsonRecord);

            if(fclose($bukaFile)) {
            ?>
            <h1>Catatan Berhasil disimpan</h1>
            <p>terima kasih !</p>
            <p>
                <a href="pengecatan.php" class="button">tambah lagi</a>
                <a href="pengecatan-tampil.php" class="button catatan">lihat catatan</a>
            </p>
            <?php } else { ?>
            <h1>Catatan Gagal disimpan</h1>
            <p>eror !</p>
            <p>
                <a href="pengecatan.php" class="button">ulangi lagi</a>
                <a href="pengecatan-tampil.php" class="button catatan">lihat catatan</a>
            </p>
            
            <?php } } else {  //menampilkan formulr  ?>
            <h1>Input Pengecatan</h1>
            <div class="container">
                <form action="pengecatan.php" method="post">
                    <table>
                        <tr>
                            <td><label for="tanggal">Tanggal : </label></td>
                            <td>
                                <select name="tanggal" id="tanggal">
                                    <?php
                                        for($i=1; $i<=31; $i++) {
                                            echo '<option value="' .$i. '">' .$i. '</option>';
                                        }
                                    ?>
                                </select>
                                <select name="bulan" id="bulan">
                                    <option value="januari">januari</option>
                                    <option value="februari">februari</option>
                                    <option value="maret">maret</option>
                                    <option value="april">april</option>
                                    <option value="mei">mei</option>
                                    <option value="juni">juni</option>
                                    <option value="juli">juli</option>
                                    <option value="agustus">agustus</option>
                                    <option value="september">september</option>
                                    <option value="oktober">oktober</option>
                                    <option value="november">november</option>
                                    <option value="desember">desember</option>
                                </select>
                                <select name="tahun" id="tahun">
                                    <?php
                                        for($i=2023; $i<=2030; $i++) {
                                            echo '<option value="' .$i. '">' .$i. '</option>';
                                        }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="panjang">Panjang : </label></td>
                            <td><input type="text" name="panjang" id="panjang">m</td>
                        </tr>
                        <tr>
                            <td><label for="lebar">Lebar : </label></td>
                            <td><input type="text" name="lebar" id="lebar">m</td>
                        </tr>
                        <tr>
                            <td><label for="tinggi">Tinggi : </label></td>
                            <td><input type="text" name="tinggi" id="tinggi">m</td>
                        </tr>
                        <tr>
                            <td><label for="bayar">Pembayaran : </label></td>
                            <td>
                                <input type="radio" name="bayar" id="tunai" value="tunai" checked>
                                <label for="tunai">Tunai</label>
                                <input type="radio" name="bayar" id="hutang" value="hutang">
                                <label for="hutang">Hutang</label>
                            </td>
                        </tr>
                    </table>
                    <a href="pengecatan-tampil.php" class="button catatan">Lihat Daftar Pengecatan</a>
                    <input type="submit" value="tambah pengecatan" class="button" style="background-color: blue;">
                </form>
            </div>
        <?php }  ?>
</body>
</html>