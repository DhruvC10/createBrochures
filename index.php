<?php

  $pName = $_POST['product_name'];
  $targetAud = $_POST['target_audience'];
  $intro = $_POST['introduction'];
  $benefits = $_POST['benefits'];
  $generalWriteup = $_POST["general_writeup"];
  $callToAction = $_POST["call_to_action"];
  $t1 = $_POST["testimonial_1"];
  $t2 = $_POST["testimonial_2"];
  $tagLine = $_POST["tagline"];


  //connecting with database
  $host = "localhost";
  $dbName = "brochures";
  $username = "root";
  $password = "";

  $connection = mysqli_connect($host, $username, $password, $dbName);

  // return error code of most recent connect
  if(mysqli_connect_errno()){
    die("Connection error : " . mysqli_connect_error());
  }

$sqlInsertQuery = "INSERT INTO brochureObject ( product_name,
                                                target_audience,
                                                introduction,
                                                benefits,
                                                general_writeup,
                                                call_to_action,
                                                testimonial_1,
                                                testimonial_2,
                                                tagline)
                      VALUES (?,?,?,?,?,?,?,?,?)";

$stmt = mysqli_stmt_init($connection);


if ( ! mysqli_stmt_prepare($stmt, $sqlInsertQuery)) {
    die(mysqli_error($connection));
}


mysqli_stmt_bind_param( $stmt, "sssssssss",
                        $pName,
                        $targetAud,
                        $intro,
                        $benefits,
                        $generalWriteup,
                        $callToAction,
                        $t1,
                        $t2,
                        $tagLine);

mysqli_stmt_execute($stmt);

echo "Record saved.";




?>

