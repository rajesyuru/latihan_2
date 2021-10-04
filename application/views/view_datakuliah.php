<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Data Kuliah</title>
</head>

<body>
    <center>
        <table>
            <tr>
                <th colspan="3">Hasil Input Data Mata Kuliah</th>
            </tr>

            <tr>
                <th colspan="3">
                    <hr>
                </th>
            </tr>
            <tr>
                <th>Kode MTK</th>
                <th>:</th>
                <th><?php echo $kode ?></th>
            </tr>
            <tr>
                <th>Nama MTK</th>
                <th>:</th>
                <th><?php echo $nama ?></th>
            </tr>
            <tr>
                <th>SKS</th>
                <th>:</th>
                <th><?php echo $sks ?></th>
            </tr>
            <tr>
                <th colspan="3"><a href="<?= base_url(); ?>matakuliah/">Kembali</a></th>
            </tr>

        </table>
    </center>
</body>

</html>