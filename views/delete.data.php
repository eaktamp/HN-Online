<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">

  <?php
  require_once './vendor/autoload.php'; // path ของไฟล ืautoload.php ใน vendor
  $dotenv = Dotenv\Dotenv::createImmutable('./'); //path ที่เก็บ ไฟล์ .env
  $dotenv->load();
  include("connect/connect.php"); ?>
  <title>HN Online</title>
</head>

<body style="background-color:#009579; ">

  <section class="bg-color soverflow-hidden">

    <div class="dcontainer px-4 py-2 px-md-5 text-center text-lg-start my-5">
      <div class="row gx-lg-5 align-items-center mb-5">
        <div class="col-lg-12 mb-0 mb-lg-0" style="z-index: 10; text-align:center">
          <h1 class="my-1 display-3 fw-bold ls-tight mb-3" style="color: hsl(218, 81%, 95%)">
            COMPLETED
          </h1>
        </div>

        <!-- box center -->
        <div class="col-lg-3 mb-5 mb-lg-0 position-relative">
        </div>

        <div class="col-lg-6 mb-0 mb-lg-0 position-relative">
          <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
          <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

          <div class="card bg-glass">
            <div class="card-body px-4 py-5 px-md-5">


              <!-- 2 column grid layout with text inputs for the first and last names -->
              <div class="row">


                <?php

                // error_reporting(0);

                // $txtPrename = $_POST['txtPrename'];
                // $txtName = $_POST['txtName'];
                // $txtLname = $_POST['txtLname'];
                // $txtGender = $_POST['txtGender'];
                // $txtStatus = $_POST['txtStatus'];
                // $txtBd = $_POST['txtBd'];
                // $txtBm = $_POST['txtBm'];
                // $txtBy = $_POST['txtBy'];
                // $txtCid = $_POST['txtCid'];
                // $txtNationality = $_POST['txtNationality'];
                // $txtReligion = $_POST['txtReligion'];
                // $txtEmail = $_POST['txtEmail'];
                // $txtOccupation = $_POST['txtOccupation'];
                // $txtEducation = $_POST['txtEducation'];
                // $txtName2 = $_POST['txtName2'];
                // $txtLname2 = $_POST['txtLname2'];
                // $txtNameDad = $_POST['txtNameDad'];
                // $txtLnameDad = $_POST['txtLnameDad'];
                // $txtNameMom = $_POST['txtNameMom'];
                // $txtLnameMom = $_POST['txtLnameMom'];
                // $txtNo = $_POST['txtNo'];
                // $txtMo = $_POST['txtMo'];
                // $txtAlley = $_POST['txtAlley'];
                // $txtSubDistrict = $_POST['txtSubDistrict'];
                // $txtDistrict = $_POST['txtDistrict'];
                // $txtProvince = $_POST['txtProvince'];
                // $txtPostCode = $_POST['txtPostCode'];
                // $txtTel = $_POST['txtTel'];

                // echo $txtHN = $_POST['txtHN'];
                echo $txtCid = $_GET['id'];



                // Construct the SQL query
                $sql = "DELETE from Patient WHERE txtCid = '" . $txtCid . "'";

                // Execute the query
                if ($conn->query($sql) === TRUE) {

                ?><div class="text-center" style="font-family:kanit"><?php
                                                        ?><div class="fw-normal h4"><?php echo "ทำการลบข้อมูล "; ?></div><?php
                                                                      ?><div class="fw-normal h2 text-primary"><?php echo $txtCid; ?></div><?php
                                                                        ?><div class="fw-normal"><?php echo "เรียบร้อยแล้ว"; ?></div><?php
                                                                ?><div class="mt-5" style="margin-bottom:-30px;"> <input type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-danger btn-block" onclick="location.href='/hn-online/admin'" value="กลับสู่หน้าหลัก" style="margin-top:-50px"><?php

                                                                                                                                                                                                                                        }

                                                                                                                                                                                                                                        $conn->close();
                                                                                                                                                                                                                                          ?>



                    </div>
                  </div>
              </div>
            </div>
          </div>
  </section>
  <!-- Section: Design Block -->

</body>

</html>