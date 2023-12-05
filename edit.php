<?php
// Include file untuk koneksi ke database
include "db_conn.php";

// Mengambil ID user dari parameter URL
$id = $_GET["id"];

// Jika tombol "Update" ditekan pada formulir
if (isset($_POST["submit"])) {
    // Mengambil nilai-nilai dari formulir
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];

    // Membuat query SQL untuk memperbarui data di dalam tabel 'crud'
    $sql = "UPDATE `crud` SET `first_name`='$first_name',`last_name`='$last_name',`email`='$email',`gender`='$gender' WHERE id = $id";

    // Menjalankan query menggunakan koneksi ke database
    $result = mysqli_query($conn, $sql);

    // Memeriksa apakah query berhasil dijalankan
    if ($result) {
        // Jika berhasil, arahkan kembali ke halaman indeks dengan pesan sukses
        header("Location: index.php?msg=Data updated successfully");
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

        .form-label {
            display: block;
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
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5">
        Form
    </nav>

    <div class="container">
        <div class="text-center mb-4">
            <h3>Edit User Information</h3>
        </div>

        <?php
        // Mengambil data user yang akan diedit dari database
        $sql = "SELECT * FROM `crud` WHERE id = $id LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        ?>

        <div class="container">
            <form action="" method="post">
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">First Name:</label>
                        <input type="text" class="form-control custom-input" name="first_name" value="<?php echo $row['first_name'] ?>">
                    </div>

                    <div class="col">
                        <label class="form-label">Last Name:</label>
                        <input type="text" class="form-control custom-input" name="last_name" value="<?php echo $row['last_name'] ?>">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email:</label>
                    <input type="email" class="form-control custom-input" name="email" value="<?php echo $row['email'] ?>">
                </div>

                <div class="form-group mb-3">
                    <label>Gender:</label>
                    &nbsp;
                    <input type="radio" class="form-check-input" name="gender" id="male" value="male" <?php echo ($row["gender"] == 'male') ? "checked" : ""; ?>>
                    <label for="male" class="form-input-label">Male</label>
                    &nbsp;
                    <input type="radio" class="form-check-input" name="gender" id="female" value="female" <?php echo ($row["gender"] == 'female') ? "checked" : ""; ?>>
                    <label for="female" class="form-input-label">Female</label>
                </div>

                <div>
                    <!-- Tombol untuk Menyimpan Data -->
                    <button type="submit" class="btn btn-success" name="submit">Update</button>
                    <!-- Tautan untuk Membatalkan Aksi dan Kembali ke Halaman Indeks -->
                    <a href="index.php" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
