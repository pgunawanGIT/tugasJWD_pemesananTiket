<?php

use FFI\Exception;

class Coneksi
{

    private static $instance = null;
    public $koneksi;


    private function __construct()
    {
        $hostname = "localhost";
        $username = "root";
        $password = "root";
        $database = "pendaftaran_siswa";
        $port = 8889;

        $this->koneksi = new mysqli($hostname, $username, $password, $database, $port);
        if ($this->koneksi->connect_error) {
            die("kokesi gagal" . $this->koneksi->connect_error);
        }
    }

    private static function getInsten()
    {
        if (self::$instance == null) {
            self::$instance = new self();
        }
        return self::$instance;
    }


    public static function getData()
    {
        $insten = self::getInsten()->koneksi;

        $data = $insten->query("SELECT *FROM pesanan");
        return $data;
    }

    public static function insertData($nama, $no_hp, $durasi, $j_peserta, $harga_paket, $jumlah_tagihan, $layanan)
    {

        $insten = self::getInsten()->koneksi;
        try {
            $stm = $insten->prepare("INSERT into pesanan(nama,n_hp,durasi,j_pesanan,harga_paket,jumlah_tagihan,layanan) VALUE(?,?,?,?,?,?,?)");
            $stm->bind_param("sissiis", $nama, $no_hp, $durasi, $j_peserta, $harga_paket, $jumlah_tagihan, $layanan);
            $stm->execute();
            return $insten->insert_id;
        } catch (Exception $e) {
            echo "error $e";
        } finally {
            $insten->close();
        }
    }

    public static function getId($id)
    {
        $insten = self::getInsten()->koneksi;
        try {
            $stm = $insten->prepare("SELECT *FROM pesanan WHERE id= ?");
            $stm->bind_param("i", $id);
            $stm->execute();
            return $stm;
        } catch (Exception $e) {
        } finally {
        }
    }
}
