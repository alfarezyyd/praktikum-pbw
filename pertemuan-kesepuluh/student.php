<?php
include "koneksi.php";

class Student
{
    public function getStudents(): void
    {
        global $koneksirest;
        $data = [];
        $mysqli_result = $koneksirest->query("SELECT * FROM mahasiswa");
        while ($row = mysqli_fetch_object($mysqli_result)) {
            $data[] = $row;
        }
        $response = array(
            'status' => 1,
            'message' => "Get List Student Successfully.",
            'data' => $data
        );
        header('Content-Type', 'application/json');
        echo json_encode($response);
    }

    public function getStudent($id): void
    {
        global $koneksirest;
        $data = [];
        $mysqli_result = $koneksirest->query("SELECT * FROM mahasiswa WHERE npm = '$id'");
        while ($row = mysqli_fetch_object($mysqli_result)) {
            $data[] = $row;
        }
        $response = array(
            'status' => 1,
            'message' => "Get List Student Successfully.",
            'data' => $data
        );
        header('Content-Type', 'application/json');
        echo json_encode($response);
    }


    public function saveStudent(): void
    {
        global $koneksirest;
        $arrcheckpost = array('npm' => '', 'nama' => '', 'jurusan' => '', 'alamat' => '');
        $hitung = count(array_intersect_key($_POST, $arrcheckpost));
        if ($hitung == count($arrcheckpost)) {
            $result = mysqli_query($koneksirest, "INSERT INTO mahasiswa SET
                npm = '$_POST[npm]',
                nama = '$_POST[nama]',
                jurusan = '$_POST[jurusan]',
                alamat = '$_POST[alamat]'");
            if ($result) {
                $response = array(
                    'status' => 1,
                    'message' => 'Student Created Successfully.'
                );
            } else {
                $response = array(
                    'status' => 0,
                    'message' => 'Student Created Failed.'
                );
            }
        } else {
            $response = array(
                'status' => 0,
                'message' => 'Parameter Do Not Match'
            );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function updateStudent($id): void
    {
        global $koneksirest;
        $arrcheckpost = array('npm' => '', 'nama' => '', 'jurusan' => '', 'alamat' => '');
        $hitung = count(array_intersect_key($_POST, $arrcheckpost));
        if ($hitung == count($arrcheckpost)) {
            $result = mysqli_query($koneksirest, "UPDATE mahasiswa SET
                npm = '$_POST[npm]',
                nama = '$_POST[nama]',
                jurusan = '$_POST[jurusan]',
                alamat = '$_POST[alamat]' WHERE npm = '$id'");
            if ($result) {
                $response = array(
                    'status' => 1,
                    'message' => 'Student Updated Successfully.'
                );
            } else {
                $response = array(
                    'status' => 0,
                    'message' => 'Student Update Failed.'
                );
            }
        } else {
            $response = array(
                'status' => 0,
                'message' => 'Parameter Do Not Match'
            );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function deleteStudent($id): void
    {
        global $koneksirest;
        $query = "DELETE FROM mahasiswa WHERE npm =  '$id'";
        if (mysqli_query($koneksirest, $query)) {
            $response = array(
                'status' => 1,
                'message' => 'Student Deleted Successfully.'
            );
        } else {
            $response = array(
                'status' => 0,
                'message' => 'Student Deletion Failed.'
            );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}
