<?php

include('functions.php');

if(isset($_POST['daftar'])) {
    daftar_admin($_POST);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Admin</title>
</head>
<body>
    <h1>Daftar Admin</h1>
    <form action="" method="post">
        <table cellpadding="5">
            <tr>
                <td><label for="username">Username</label></td>
                <td><input type="text" name="username" id="username"></td>
            </tr>

            <tr>
                <td><label for="password">Password</label></td>
                <td><input type="password" name="password" id="password"></td>
            </tr>

            <tr>
                <td></td>
                <td><button type="submit" name="daftar">Daftar</button></td>
            </tr>
            
        </table>

    </form>
</body>
</html>