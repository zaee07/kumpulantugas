<?php
function htmlStart($judul) {
echo '<!DOCTYPE html>';
echo '<html lang="en">';
echo '<head>';
echo '<meta charset="UTF-8">';
echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
echo '<title>' . $judul . '</title>';
echo "<link rel='stylesheet' type='text/css' media='screen' href='style.css'>";
echo '</head>';
echo '<body>';
}

function htmlEnd() {
 echo '</body></html>';
}

// koneksi db -> siska
$server = 'localhost';
$username = 'root';
$pwd = '';
$db = 'siska_dasprog';

$conn = mysqli_connect($server, $username, $pwd, $db);

function cari() {
    global $conn;
    // Menerima filter yang dikirimkan dari formulir
$prodi = $_POST['prodi'];

// Menyusun pernyataan SQL SELECT dengan kondisi filter
if (!empty($prodi)) {
    // $sql = "SELECT * FROM nama_tabel WHERE kategori = '$prodi'";
    $sql = "SELECT DISTINCT nim, nama_lengkap, mahasiswa.alamat, mahasiswa.no_telp, tgl_lahir, nama_prodi, nama_dosen
        FROM(mahasiswa JOIN prodi ON prodi_id=id_prodi) JOIN dosen ON dosen_pa_nidn=nidn WHERE nama_prodi = '$prodi'";
} else {
    $sql = "SELECT nim, nama_lengkap, mahasiswa.alamat, mahasiswa.no_telp, tgl_lahir, nama_prodi, nama_dosen
        FROM(mahasiswa JOIN prodi ON prodi_id=id_prodi) JOIN dosen ON dosen_pa_nidn=nidn";
}

// Menjalankan pernyataan SQL dan mengambil hasilnya
$result = mysqli_query($conn, $sql);
// return $result;
var_dump($result);
}
?>