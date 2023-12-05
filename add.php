<?php
// Include file untuk koneksi ke database
include "db_conn.php";

// Jika tombol "Save" ditekan pada formulir
if (isset($_POST["submit"])) {
    // Mengambil nilai-nilai dari formulir
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];

    // Membuat query SQL untuk menambahkan data ke dalam tabel 'crud'
    $sql = "INSERT INTO `crud`(`id`, `first_name`, `last_name`, `email`, `gender`) VALUES (NULL,'$first_name','$last_name','$email','$gender')";

    // Menjalankan query menggunakan koneksi ke database
    $result = mysqli_query($conn, $sql);

    // Memeriksa apakah query berhasil dijalankan
    if ($result) {
        // Jika berhasil, arahkan kembali ke halaman indeks dengan pesan sukses
        header("Location: index.php?msg=New record created successfully");
    } else {
        // Jika gagal, tampilkan pesan kesalahan
        echo "Failed: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PHP CRUD</title>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #eff5f8;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        nav {
            background-color: #007bff; /* Dark Blue */
            color: #fff;
            text-align: center;
            font-size: 1.5em;
            padding: 10px;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
        }

        input {
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }

        .gender-label {
            margin: 10px 0;
        }

        .gender-options {
            display: flex;
            margin-bottom: 15px;
        }

        .gender-options label {
            margin-right: 15px;
        }

        button,
        a {
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            text-align: center;
            text-decoration: none;
            color: #fff;
        }

        button {
            background-color: #28a745;
        }

        a {
            margin-top : 5px;
            background-color: #FF4433;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5">Form</nav>

    <div class="container">
        <div style="text-align: center; margin-bottom: 20px;">
            <h3>Add New User</h3>
        </div>

        <form action="" method="post">
            <!-- Input untuk Nama Depan -->
            <label for="first_name">First Name:</label>
            <input type="text" name="first_name" placeholder="First Name">

            <!-- Input untuk Nama Belakang -->
            <label for="last_name">Last Name:</label>
            <input type="text" name="last_name" placeholder="Last Name">

            <!-- Input untuk Email -->
            <label for="email">Email:</label>
            <input type="email" name="email" placeholder="name@example.com">

            <!-- Pilihan Jenis Kelamin -->
            <div class="gender-label">Gender:</div>
            <div class="gender-options">
                <input type="radio" name="gender" id="male" value="male">
                <label for="male">Male</label>

                <input type="radio" name="gender" id="female" value="female">
                <label for="female">Female</label>
            </div>

            <!-- Tombol untuk Menyimpan Data -->
            <button type="submit" name="submit">Save</button>
            
            <!-- Tautan untuk Membatalkan Aksi dan Kembali ke Halaman Indeks -->
            <a href="index.php">Cancel</a>
        </form>
    </div>

</body>

</html>
