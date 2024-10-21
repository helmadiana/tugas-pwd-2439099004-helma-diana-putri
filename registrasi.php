<?php

include('functions.php');

if(!isset($_SESSION['is_login'])) {
    header('location: login.php');
    exit;
}

if(isset($_POST['registrasi'])) {
    registrasi_peserta($_POST);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
</head>

<body>
    <h1>Registrasi peserta</h1>
    <form action="" method="post">
        <table cellpadding="5">
            <tr>
                <td><label for="nama">Nama</label></td>
                <td><input type="text" name="nama" id="nama"></td>
            </tr>

            <tr>
                <td><label for="email">Email</label></td>
                <td><input type="email" name="email" id="email"></td>
            </tr>

            <tr>
                <td><label for="institusi">Institusi</label></td>
                <td><input type="text" name="institusi" id="institusi"></td>
            </tr>

            <tr>
                <td><label for="country">Country</label></td>
                <td><select name="country" id="country">
                        <option value="Indonesia">Indonesia</option>
                        <option value="Korea">Korea</option>
                        <option value="Malaysia">Malaysia</option>
                        <option value="India">India</option>
                    </select></td>
            </tr>

            <tr>
                <td><label for="address">Address</label></td>
                <td><input type="text" name="address" id="address"></td>
            </tr>

            <tr>
                <td></td>
                <td><button type="submit" name="registrasi">Registrasi</button></td>
            </tr>

        </table>

    </form>
</body>

</html>