<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proses Pendaftaran</title>
</head>
<body>
    Selamat datang <b> <?php echo $_GET["nama"]; ?></b><br>
    NIM : <?php echo $_GET["nim"]; ?><br>
    Email : <?php echo $_GET["email"]; ?><br>
    Tempat, Tanggal Lahir : <?php echo $_GET["tempat"]; ?>, <?php echo $_GET["tanggal"]; ?><br>
    Alamat : <?php echo $_GET["alamat"]; ?><br>
    Jenis Kelamin : <?php echo $_GET["jenis_kelamin"]; ?><br>
</body>
</html>