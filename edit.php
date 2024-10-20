<?php

include('functions.php');

$id = $_GET['id'];
$data_peserta = mysqli_query($conn, "SELECT * FROM registration WHERE id = $id")->fetch_assoc();

if(isset($_POST['edit'])) {
    edit_peserta($_POST, $id);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>

<body>
    <h1>Edit peserta</h1>
    <form action="" method="post">
        <table cellpadding="5">
            <tr>
                <td><label for="nama">Nama</label></td>
                <td><input type="text" name="nama" id="nama" value="<?= $data_peserta['nama'] ?>"></td>
            </tr>

            <tr>
                <td><label for="institusi">Institusi</label></td>
                <td><input type="text" name="institusi" id="institusi" value="<?= $data_peserta['institusi'] ?>"></td>
            </tr>

            <tr>
                <td><label for="country">Country</label></td>
                <td>
                    <select name="country" id="country">
                        <?php foreach($country as $item): ?>
                            <option value="<?= $item ?>" <?= ($data_peserta['country'] == $item) ? 'selected' : '' ?>><?= $item ?></option>
                        <?php endforeach ?>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label for="address">Address</label></td>
                <td><input type="text" name="address" id="address" value="<?= $data_peserta['address'] ?>"></td>
            </tr>

            <tr>
                <td></td>
                <td><button type="submit" name="edit">Ubah</button></td>
            </tr>

        </table>

    </form>
</body>

</html>