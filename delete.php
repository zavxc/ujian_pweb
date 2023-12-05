<?php
// Menggunakan file koneksi database
include "db_conn.php";

// Memeriksa apakah parameter 'id' telah diset melalui URL
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Menjalankan query SQL untuk menghapus data pengguna berdasarkan ID
    $sql = "DELETE FROM `crud` WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    // Memeriksa hasil query
    if ($result) {
        // Jika penghapusan berhasil, redirect ke halaman utama dengan pesan sukses
        header("Location: index.php?msg=Data deleted successfully");
        exit(); // Menghentikan eksekusi skrip setelah header() digunakan
    } else {
        // Jika penghapusan gagal, tampilkan pesan kesalahan
        echo "Failed: " . mysqli_error($conn);
        exit(); // Menghentikan eksekusi skrip setelah echo digunakan
    }
}
?>
