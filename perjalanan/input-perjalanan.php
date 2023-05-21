<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perjalanan</title>
    <style>
        h1, form {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  height: 30vh;
}

form input[type="text"],
form textarea {
  width: 150px;
  padding: 4px;
  margin-bottom: 10px;
}

.button {
  width: 170px;
  padding: 5px;
  background-color: #4CAF50;
  color: white;
  border: none;
  cursor: pointer;
}

.button:hover {
  background-color: green;
}

a {
  width: 170px;
  padding: 5px;
  background-color: #7788ee;
  color: white;
  border: none;
  cursor: pointer;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  text-decoration: none;
}

a:hover {
  background-color: #0033ee;
}
    </style>
</head>
<body>
    <h1>Catatan Perjalanan</h1>
    <form action="proses-perjalanan.php" method="post">
        <table>
            <tr>
                <td>
                    <label for="tanggal">Tanggal &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;: </label>
                </td>
                <td>
                    <select name="tanggal" id="tanggal">
                    <?php
                        for($i=1; $i<=31; $i++) {
                            echo '<option value="' .$i. '">' .$i. '</option>';
                        }
                    ?>
                </select>
                <select name="bulan" id="bulan">
                    <option value="januari">Januari</option>
                    <option value="Februari">Februari</option>
                    <option value="maret">Maret</option>
                    <option value="april">April</option>
                    <option value="mei">Mei</option>
                    <option value="juni">Juni</option>
                    <option value="juli">Juli</option>
                    <option value="agustus">Agustus</option>
                    <option value="september">September</option>
                    <option value="oktober">Oktober</option>
                    <option value="november">November</option>
                    <option value="desember">Desember</option>
                </select>
                <select name="tahun" id="tahun">
                    <?php
                        for($i=2020; $i<=2030; $i++) {
                            echo '<option value="' .$i . '">' .$i. '</option>';
                        }
                    ?>
                </select>
            </td>
            </tr>
            <tr>
                <td>
                    <label for="jarak">Jarak &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;: </label>
                </td>
                <td>
                    <input type="text" name="jarak" id="jarak">Km
                </td>
            </tr>
            <tr>
                <td>
                    <label for="makan-pagi">Termasuk Makan Pagi &emsp;&emsp; : </label>
                </td>
                <td>
                    <input type="radio" name="makan-pagi" id="ya-mp" value="ya">
                    <label for="ya-mp">Ya</label>
                    <input type="radio" name="makan-pagi" id="tidak-mp" value="tidak">
                    <label for="tidak-mp">Tidak</label>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="makan-siang">Termasuk Makan Siang&emsp;&emsp;: </label>
                </td>
                <td>
                    <input type="radio" name="makan-siang" id="ya-ms" value="ya">
                    <label for="ya-ms">Ya</label>
                    <input type="radio" name="makan-siang" id="" value="tidak">
                    <label for="tidak-ms">Tidak</label>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="makan-malam">Termasuk Makan Malam&emsp;&emsp;: </label>
                </td>
                <td>
                    <input type="radio" name="makan-malam" id="ya-mm" value="ya">
                    <label for="ya-mm">Ya</label>
                    <input type="radio" name="makan-malam" id="tidak-mm" value="tidak">
                    <label for="tidak-mm">Tidak</label>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="inap">Termasuk menginap di hotel : </label>
                </td>
                <td>
                    <input type="radio" name="inap" id="ya-inap" value="ya">
                    <label for="ya-inap">Ya</label>
                    <input type="radio" name="inap" id="tidak-inap" value="tidak">
                    <label for="tidak-inap">Tidak</label>
                </td>
            </tr>
        </table>
       <a href="daftar-perjalanan.php">Lihat Daftar Perjalanan</a>
        <input type="submit" value="tambah perjalanan" class="button">   
    </form>
</body>
</html>