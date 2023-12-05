<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<form id="loginForm">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <button type="submit">Login</button>
</form>

<script>
    // Menggunakan event listener untuk menangani submit form
    document.getElementById('loginForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Mencegah pengiriman form bawaan

        // Mendapatkan nilai username dan password
        var username = document.getElementById('username').value;
        var password = document.getElementById('password').value;

        // Memeriksa jika username dan password tidak sesuai (Anda bisa tambahkan logika Anda sendiri di sini)
        if (username !== 'admin' || password !== 'admin') {
            // Menampilkan pesan kesalahan menggunakan pop-up
            alert('Username atau password salah');
        } else {
            // Jika login berhasil, redirect ke index.php
            window.location.href = 'index.php';
        }
    });
</script>

</body>
</html>
