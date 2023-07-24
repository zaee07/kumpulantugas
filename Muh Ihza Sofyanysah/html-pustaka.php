<?php
function htmlStart($judul) {
echo '<!DOCTYPE html>';
echo '<html lang="en">';
echo '<head>';
echo '<meta charset="UTF-8">';
echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
echo '<title>' . $judul . '</title>';
echo "<link rel='stylesheet' type='text/css' media='screen' href='../style/dist/css/bootstrap.min.css'>";
echo '</head>';
echo '<body>';
}

function htmlEnd() {
 echo '<script src="../style/dist/js/bootstrap.bundle.min.js"/>
</body></html>';
}

// koneksi db -> siska
$server = 'localhost';
$username = 'root';
$pwd = '';
$db = 'siska_dasprog';

$conn = mysqli_connect($server, $username, $pwd, $db);

function cari($keyword, $prodi) {

    if ( !empty($prodi) && !empty($keyword) ) {
        $query = "SELECT nim, nama_lengkap, mahasiswa.alamat, mahasiswa.no_telp, tgl_lahir, nama_prodi, nama_dosen
            FROM(mahasiswa JOIN prodi ON prodi_id=id_prodi) JOIN dosen ON dosen_pa_nidn=nidn WHERE nama_prodi = '$prodi' AND nama_lengkap LIKE '%$keyword%'";
    } elseif( !empty($prodi) ) {
        $query = "SELECT nim, nama_lengkap, mahasiswa.alamat, mahasiswa.no_telp, tgl_lahir, nama_prodi, nama_dosen
            FROM(mahasiswa JOIN prodi ON prodi_id=id_prodi) JOIN dosen ON dosen_pa_nidn=nidn WHERE nama_prodi = '$prodi'";
    } elseif( !empty($keyword) ) {
        $query = "SELECT nim, nama_lengkap, mahasiswa.alamat, mahasiswa.no_telp, tgl_lahir, nama_prodi, nama_dosen
            FROM(mahasiswa JOIN prodi ON prodi_id=id_prodi) JOIN dosen ON dosen_pa_nidn=nidn WHERE nama_lengkap LIKE '%$keyword%'";
    } else {
        $query = "SELECT nim, nama_lengkap, mahasiswa.alamat, mahasiswa.no_telp, tgl_lahir, nama_prodi, nama_dosen
            FROM(mahasiswa JOIN prodi ON prodi_id=id_prodi) JOIN dosen ON dosen_pa_nidn=nidn";
    }
    return $query;
}
?>