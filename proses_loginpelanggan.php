<?php 

    if($_POST){

        $id_pelanggan=$_POST['id_pelanggan'];

        $nama_pelanggan=$_POST['nama_pelanggan'];
    
        if(empty($id_pelanggan)){

            echo "<script>alert('ID Pelanggan tidak boleh kosong');location.href='loginpelanggan.php';</script>";

        } elseif(empty($nama_pelanggan)){

            echo "<script>alert('Nama pelanggan tidak boleh kosong');location.href='loginpelanggan.php';</script>";

        } else {

            include "cekkoneksi.php";

            $qry_loginpelanggan=mysqli_query($conn,"select * from pelanggan where id_pelanggan = '".$id_pelanggan."' AND nama = '".$nama_pelanggan."'");

            if(mysqli_num_rows($qry_loginpelanggan)>0){

                $dt_loginpelanggan=mysqli_fetch_array($qry_loginpelanggan);

                session_start();

                $_SESSION['id_pelanggan']=$dt_loginpelanggan['id_pelanggan'];

                $_SESSION['nama_pelanggan']=$dt_loginpelanggan['nama_pelanggan'];

                $_SESSION['status_login']=true;

                header("location: homepelanggan.php");

            } else {

                echo "<script>alert('Username dan Password tidak benar');location.href='loginpelanggan.php';</script>";

            }

        }

    }

?>