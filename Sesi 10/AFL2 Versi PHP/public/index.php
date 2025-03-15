<!DOCTYPE html>
<html>

<head>
    <title>CRUD Firebase</title>
    <link rel="stylesheet" href="">
</head>

<body>
    <h1 id="formTitle">Daftar Pemain Sepak Bola</h1>
    <form action="insert.php" method="POST">
        <input type="text" name="name" placeholder="Nama" required><br>
        <input type="age" name="age" placeholder="Umur" required><br>
        <input type="text" name="nationality" placeholder="Negara" required><br>
        <input type="text" name="club" placeholder="Club" required><br>
        <button type="submit">Kirim</button>
    </form>
    <h2>Lihat Data</h2>
    <a href="./view_data.php">Lihat Semua Data</a>
</body>

</html>