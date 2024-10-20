<?php

session_start();

$conn = mysqli_connect("localhost", "root", "", "tugas_pwd");

if(!$conn) {
    echo "Gagal konek!";
}

$country = ['Indonesia', 'Malaysia', 'Nigeria', 'Kolombia', 'Singapura', 'China', 'Jepang', 'Korea'];

function daftar_admin($data) {
    global $conn;
    $username = $data['username'];
    $password = $data['password'];

    // cek username apakah sudah terdaftar
    $result = mysqli_query($conn, "SELECT username FROM admin WHERE username = '$username'");
    if($result->fetch_assoc()) {
        echo "<script>
                alert('Username telah terdaftar!')
                document.location.href = 'registrasi.php'
            </script>";
            exit;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambah ke database
    mysqli_query($conn, "INSERT INTO admin VALUES(NULL, '$username', '$password')");

    if(mysqli_affected_rows($conn)) {
        echo "<script>
                alert('Admin berhasil terdaftar!')
                document.location.href = 'registrasi.php'
            </script>";
            exit;
    } else {
        echo "<script>
                alert('Admin gagal terdaftar!')
                document.location.href = 'registrasi.php'
            </script>";
            exit;
    }
}

function login($data) {
    global $conn;

    $username = $data['username'];
    $password = $data['password'];
    
    // cek username apakah sudah terdaftar
    $result = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username'");
    if($row = $result->fetch_assoc()) {
        // cek password
        if(password_verify($password, $row['password'])) {
            $_SESSION['is_login'] = true;
            header('location: index.php');
            exit;
        }
    }
    echo "<script>
                alert('Username atau password salah!')
                document.location.href = 'login.php'
            </script>";
            exit;
}

function registrasi_peserta($data) {
    global $conn;

    $nama = $data['nama'];
    $email = $data['email'];
    $institusi = $data['institusi'];
    $country = $data['country'];
    $address = $data['address'];

    // cek email apakah sudah terdaftar
    $result = mysqli_query($conn, "SELECT email FROM registration WHERE email = '$email'");
    if($result->fetch_assoc()) {
        echo "<script>
                alert('Email telah terdaftar!')
                document.location.href = 'registrasi.php'
            </script>";
            exit;
    }

    // tambah ke database
    mysqli_query($conn, "INSERT INTO registration VALUES(NULL, '$nama', '$email', '$institusi', '$country', '$address', 0)");

    if(mysqli_affected_rows($conn)) {
        echo "<script>
                alert('Peserta berhasil terdaftar!')
                document.location.href = 'registrasi.php'
            </script>";
            exit;
    } else {
        echo "<script>
                alert('Peserta gagal terdaftar!')
                document.location.href = 'registrasi.php'
            </script>";
            exit;
    }
}

function edit_peserta($data, $id) {
    global $conn;

    $nama = $data['nama'];
    $institusi = $data['institusi'];
    $country = $data['country'];
    $address = $data['address'];

    // edit ke database
    mysqli_query($conn, "UPDATE registration SET nama = '$nama', institusi = '$institusi', country = '$country', address = '$address' WHERE id = $id");

    if(mysqli_affected_rows($conn)) {
        echo "<script>
                alert('Peserta berhasil diedit!')
                document.location.href = 'index.php'
            </script>";
            exit;
    } else {
        echo "<script>
                alert('Peserta gagal diedit!')
                document.location.href = 'index.php'
            </script>";
            exit;
    }
}