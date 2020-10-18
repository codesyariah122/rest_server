<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <table border="1">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Jurusan</th>
                <th>Email</th>
            </tr>
        </thead>

        <tbody>
        <?php  $no=1; foreach($mahasiswa as $mhs):?>
            <tr>
                <td><?=$no++;?></td>
                <td><?=$mhs->nama?></td>
                <td><?=$mhs->jurusan?></td>
                <td><?=$mhs->email?></td>
            </tr>
        <?php endforeach;?>
        </tbody>

    </table>

</body>
</html>