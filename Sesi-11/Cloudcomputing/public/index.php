<?php
session_start();

?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Firebase</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            background: white;
            padding: 30px;
            /* Tambah padding untuk memberi ruang */
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: 20px auto;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 12px;
            /* Tambah padding untuk input */
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        button {
            width: 100%;
            padding: 12px;
            /* Sesuaikan padding di tombol juga */
            background-color: #5cb85c;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #4cae4c;
        }

        h2 {
            text-align: center;
            margin-top: 30px;
            color: #333;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 10px;
            text-decoration: none;
            color: #007bff;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <h1 id="formTitle">Daftar Pemain Sepak Bola</h1>
    <form action="insert.php" method="POST">
        <input type="text" name="name" placeholder="Nama" required><br>
        <input type="number" name="age" placeholder="Umur" required><br>
        <input type="text" name="nationality" placeholder="Negara" required><br>
        <input type="text" name="club" placeholder="Club" required><br>
        <button type="submit">Kirim</button>
    </form>
    <h2>Lihat Data</h2>
    <a href="view_data.php">Lihat Semua Data</a>
</body>



</html>