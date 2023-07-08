<?php
function htmlStart($judul) {
echo '<!DOCTYPE html>';
echo '<html lang="en">';
echo '<head>';
echo '<meta charset="UTF-8">';
echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
echo '<title>' . $judul . '</title>';
echo '</head>';
echo '<body>';
}

function htmlEnd() {
 echo '</body></html>';
}
$conn= mysqli_connect("localhost", "root", "", "siska_dasprog");

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    };
    return $rows;
};

function cari($mhs) {
    $query ="SELECT nim, nama_lengkap, mahasiswa.alamat, mahasiswa.no_telp, tgl_lahir, nama_prodi, nama_dosen
                FROM(mahasiswa JOIN prodi ON prodi_id=id_prodi) JOIN dosen ON dosen_pa_nidn=nidn 
                WHERE nama_lengkap LIKE '%$mhs%' OR nim LIKE '%$mhs%$'";
    return query($query);
}


?>