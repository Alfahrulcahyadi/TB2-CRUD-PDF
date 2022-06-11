<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <center>
        <h2>
            DATA DIRI
        </h2>
    </center>
    <h3>
        Nama
    </h3>
    <?= $profile['nama']; ?>
    <br>
    <h3>
        Pendidikan
    </h3>
    <?= $profile['pendidikan']; ?>

    <br>
    <h3>
        Pengalaman
    </h3>
    <?= $profile['pengalaman']; ?>

    <br>
    <h3>
        Prestasi
    </h3>
    <?= $profile['prestasi']; ?>

    <br>
    <h3>
        No Telepon
    </h3>
    <?= $profile['no_telepon']; ?>

    <br>
</body>

</html>