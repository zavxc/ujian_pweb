<?php
// Menggunakan file koneksi database
include "db_conn.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f8f9fa;
        }

        nav {
            background-color: #007bff; /* Dark Blue */
            color: #fff; /* White */
            text-align: center;
            font-size: 1.5rem;
            padding: 10px;
            margin-bottom: 20px;
        }

        .container {
            max-width:100%;
            margin: 0 auto;
            padding: 20px;
        }

        .alert {
            background-color: #ffc107;
            color: #000;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ffca28;
            border-radius: 5px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            background-color: #343a40;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
            margin-bottom: 20px;
            transition: background-color 0.3s ease;
        }

        .btn-dark {
            background-color: #343a40;
            color: #fff;
        }

        .btn-dark:hover {
            background-color: #495057;
        }

        .btn-edit,
        .btn-delete {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 5px;
            background-color: #007bff;
            color: #fff;
        }

        .btn-edit:hover {
            background-color: #0056b3;
        }

        .btn-delete {
            background-color: #dc3545;
            color: #fff;
        }

        .btn-delete:hover {
            background-color: #bd2130;
        }


        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #dee2e6;
            padding: 10px; /* Menyesuaikan padding untuk memberikan ruang yang lebih baik */
            text-align: center;
            margin: 0; /* Menambahkan margin: 0 untuk memastikan tidak ada margin yang ditambahkan secara default */
        }

        th {
            background-color: #343a40;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .link-dark {
            text-decoration: none;
            color: #343a40;
            font-weight: bold;
        }

        .link-dark:hover {
            text-decoration: underline;
        }
    </style>

    <title>Aplikasi Pencatatan Pengguna</title>
</head>

<body>
    <nav>
        Aplikasi Pencatatan Pengguna
    </nav>

    <div class="container">
        <?php
        // Menampilkan pesan jika ada
        if (isset($_GET["msg"])) {
            $msg = $_GET["msg"];
            echo '<div class="alert">
                ' . $msg . '
            </div>';
        }
        ?>
        
        <!-- Tombol untuk menambah pengguna baru -->
        <a href="add.php" class="btn btn-dark">Add</a>

        <!-- Tabel untuk menampilkan data pengguna -->
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Mengambil data pengguna dari database
                $sql = "SELECT * FROM `crud`";
                $result = mysqli_query($conn, $sql);

                // Menampilkan data pengguna dalam bentuk baris tabel
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $row["id"] ?></td>
                        <td><?php echo $row["first_name"] ?></td>
                        <td><?php echo $row["last_name"] ?></td>
                        <td><?php echo $row["email"] ?></td>
                        <td><?php echo $row["gender"] ?></td>
                        <td>
                            <!-- Tombol Edit yang mengarah ke halaman edit.php -->
                            <a href="edit.php?id=<?php echo $row["id"] ?>" class="btn btn-edit">Edit</a>
                            
                            <!-- Tombol Delete dengan fungsi onclick untuk konfirmasi -->
                            <a href="javascript:void(0);" class="btn btn-delete" onclick="confirmDelete(<?php echo $row["id"] ?>)">Delete</a>
                        </td>
                    </tr>
                <?php
                }
                ?>

                <!-- Fungsi JavaScript untuk konfirmasi delete -->
                <script>
                    function confirmDelete(id) {
                        if (confirm("Apakah anda yakin untuk menghapus?")) {
                            window.location.href = "delete.php?id=" + id;
                        }
                    }
                </script>
           </tbody>
        </table>
    </div>
</body>

</html>
