<?php
include "student.php";
$student = new Student();
$request_method = $_SERVER["REQUEST_METHOD"];
switch ($request_method) {
  case 'GET':
    if (!empty($_GET["id"])) {
      $student->getStudent($_GET["id"]);
    } else {
      $student->getStudents();
    }
    break;
  case 'POST':
    if (!empty($_GET["id"])) {
      $student->updateStudent($_GET["id"]);
    } else {
      $student->saveStudent();
    }
    break;
  case 'DELETE':
    $id = intval($_GET["id"]);
    $student->deleteStudent($id);
    break;
  default:
    header("HTTP/1.0 405 Method Not Allowed");
    break;
}
