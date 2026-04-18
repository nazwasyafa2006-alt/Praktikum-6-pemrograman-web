<?php

class Laporan {
    private $conn;

    public function __construct($db){
        $this->conn = $db;
    }

    public function getAll(){
        return mysqli_query($this->conn, "SELECT * FROM laporan");
    }

    public function getById($id){
        return mysqli_query($this->conn, "SELECT * FROM laporan WHERE id='$id'");
    }

    public function save($id, $nama, $kategori, $deskripsi, $foto){
        if($id == ""){

            mysqli_query($this->conn,
            "INSERT INTO laporan (nama,kategori,deskripsi,foto)
            VALUES('$nama','$kategori','$deskripsi','$foto')");

        } else {

            mysqli_query($this->conn,
            "UPDATE laporan SET 
            nama='$nama',
            kategori='$kategori',
            deskripsi='$deskripsi',
            foto='$foto'
            WHERE id='$id'");
        }
    }

    public function delete($id){
        mysqli_query($this->conn, "DELETE FROM laporan WHERE id='$id'");
    }
}