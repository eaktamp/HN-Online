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

<body style="background-color:#009579;">

  <section class="bg-color soverflow-hidden">

    <div class="dcontainer px-4 py-2 px-md-5 text-center text-lg-start my-5">
      <div class="row gx-lg-5 align-items-center mb-5">
        <div class="col-lg-12 mb-0 mb-lg-0" style="z-index: 10; text-align:center">
          <h1 class="my-1 display-3 fw-bold ls-tight mb-3" style="color: hsl(218, 81%, 95%)">
            CPA HN ONLINE
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




                $id = $_GET['id'];






                $sql = "SELECT * FROM patient WHERE txtCID = '" . $id . "' ";

                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {

                  $txtPrename = $row['txtPrename'];
                  // $txtName = $row['txtName'];
                  // $txtLname = $row['txtLname'];
                  // $txtGender = $row['txtGender'];
                  $txtStatus = $row['txtStatus'];
                  // $txtBd = $row['txtBd'];
                  // $txtBm = $row['txtBm'];
                  // $txtBy = $row['txtBy'];
                  // $txtCid = $row['txtCid'];
                  $txtNationality = $row['txtNationality'];
                  // $txtEmail = $row['txtEmail'];
                  $txtReligion = $row['txtReligion'];
                  // $txtOccupation = $row['txtOccupation'];
                  $txtEducation = $row['txtEducation'];
                  // $txtName2 = $row['txtName2'];
                  // $txtLname2 = $row['txtLname2'];
                  // $txtNameDad = $row['txtNameDad'];
                  // $txtLnameDad = $row['txtLnameDad'];
                  // $txtNameMom = $row['txtNameMom'];
                  // $txtLnameMom = $row['txtLnameMom'];
                  // $txtNo = $row['txtNo'];
                  // $txtMo = $row['txtMo'];
                  // $txtAlley = $row['txtAlley'];
                  // $txtSubDistrict = $row['txtSubDistrict'];
                  // $txtDistrict = $row['txtDistrict'];
                  // $txtProvince = $row['txtProvince'];
                  // $txtPostCode = $row['txtPostCode'];
                  // $txtTel = $row['txtTel'];



                  $p = $conn->query("SELECT * FROM prename WHERE prename_id = '" . $txtPrename . "' ");
                  $rowP = $p->fetch_assoc();
                   $prename = $rowP['prename_name'];

                  $s = $conn->query("SELECT * FROM status WHERE status_id = '" . $txtStatus . "' ");
                  $rowS = $s->fetch_assoc();
                   $status = $rowS['status_name'];

                  $n = $conn->query("SELECT * FROM nation WHERE nation_id = '" . $txtNationality . "' ");
                  $rowN = $n->fetch_assoc();
                   $nation = $rowN['nation_name'];

                  $r = $conn->query("SELECT * FROM reg WHERE reg_id = '" . $txtReligion . "' ");
                  $rowR = $r->fetch_assoc();
                   $reg = $rowR['reg_name'];

                  $e = $conn->query("SELECT * FROM edu WHERE edu_id = '" . $txtEducation . "' ");
                  $rowE = $e->fetch_assoc();
                   $edu = $rowE['edu_name'];

                ?>


                  <form action="add.hn.php" method="POST">

                    <div class="h1 text-center text-primary " style="margin-top:-20px; font-family:kanit;">ข้อมูลผู้ขอเลข HN ใหม่</div>
                    <div class="h3 " style="font-family:kanit;">ข้อมูลส่วนบุคคล</div>
                    <hr>
                    <!-- <button class="btn btn-primary btn-block mb-5"><?php echo "ลงทะเบียนใหม่ "; ?></button> -->

                    <div class="col-md-12 mb-4 row">

                      <!-- <div class="col-md-3 mb-2">
                        <label for="basic-url" class="form-label"> คำนำหน้า</label>
                        <div class="input-group mb-2">
                            <input name="txtPrename"  type="text" value="<?php echo $row['txtPrename']; ?>"  class="form-control" id="basic-url" aria-describedby="basic-addon3">
                          </div>      
                      </div> -->

                      <div class="col-md-3 mb-2">
                        <label for="basic-url" class="form-label">คำนำหน้าชื่อ</label> <label class="text-danger"> *</label>
                        <div class="input-group mb-2">
                          <select name="txtPrename" class="form-select" aria-label="Default select example">
                            <option selected value="<?php echo $txtPrename; ?>"><?php echo $prename; ?></option>
                          
                              <?php
                               $pp = $conn->query("SELECT * FROM prename"); 
                              while ($rowPrename = $pp->fetch_assoc()) {
                              ?>
                                <option value="<?php echo $rowPrename['prename_id']; ?>">
                                  <?php echo $rowPrename['prename_name'] . "<br>"; ?>
                                </option>
                              <?php
                              }
                              ?>
                            </select>
                        </div>
                      </div>



                      <div class="col-md-4 mb-0">
                        <label for="basic-url" class="form-label">ชื่อ</label>
                        <div class="input-group mb-2">
                          <input name="txtName" type="text" value="<?php echo $row['txtName']; ?>" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                        </div>
                      </div>
                      <div class="col-md-5 mb-0">
                        <label for="basic-url" class="form-label">นามสกุล</label>
                        <div class="input-group mb-2">
                          <input name="txtLname" type="text" value="<?php echo $row['txtLname']; ?>" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                        </div>
                      </div>



                      <div class="col-md-2 mb-2">
                        <label for="basic-url" class="form-label">เพศ</label> <label class="text-danger"> *</label>
                        <div class="input-group mb-2">
                          <select name="txtGender" class="form-select" aria-label="Default select example">
                            <option selected value="<?php echo $row['txtGender']; ?>"><?php echo $row['txtGender']; ?></option>
                            <option value="ชาย">ชาย</option>
                            <option value="หญิง">หญิง</option>
                            <option value="ไม่ระบุ">ไม่ระบุ</option>
                          </select>
                        </div>
                      </div>

  


                      <div class="col-md-4 mb-2">
                        <label for="basic-url" class="form-label">สถานะภาพ</label> <label class="text-danger"> *</label>
                        <div class="input-group mb-2">
                          <select name="txtStatus" class="form-select" aria-label="Default select example">
                            <option selected value="<?php echo $txtStatus; ?>"><?php echo $status; ?></option>
                          
                              <?php
                               $ss = $conn->query("SELECT * FROM status"); 
                              while ($rowStatus = $ss->fetch_assoc()) {
                              ?>
                                <option value="<?php echo $rowStatus['status_id']; ?>">
                                  <?php echo $rowStatus['status_name'] . "<br>"; ?>
                                </option>
                              <?php
                              }
                              ?>
                            </select>
                        </div>
                      </div>

                      <div class="col-md-2 mb-0">
                        <label for="basic-url" class="form-label">วันเกิด</label>
                        <div class="input-group mb-2">
                          <input name="txtBd" type="text" value="<?php echo $row['txtBd']; ?>" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                        </div>
                      </div>
                      <div class="col-md-2 mb-0">
                        <label for="basic-url" class="form-label">เดือนเกิด</label>
                        <div class="input-group mb-2">
                        <?php
$bm = isset($row['txtBm']) ? $row['txtBm'] : null;
$thaiMonths = [
  1 => 'มกราคม',
  2 => 'กุมภาพันธ์',
  3 => 'มีนาคม',
  4 => 'เมษายน',
  5 => 'พฤษภาคม',
  6 => 'มิถุนายน',
  7 => 'กรกฎาคม',
  8 => 'สิงหาคม',
  9 => 'กันยายน',
  10 => 'ตุลาคม',
  11 => 'พฤศจิกายน',
  12 => 'ธันวาคม'
];

// Function to get Thai month name from number
function getThaiMonth($bm)
{
  global $thaiMonths;

  // Check if $bm is not null and is a valid month number
  if (!is_null($bm) && array_key_exists($bm, $thaiMonths)) {
    return $thaiMonths[$bm];
  } else {
    return 'Invalid month number';
  }
}

// Output the Thai month name
echo getThaiMonth($bm);
?>
                          <input name="txtBm" type="text" value="<?php echo getThaiMonth($bm); ?>" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                        </div>
                      </div>
                      <div class="col-md-2 mb-0">
                        <label for="basic-url" class="form-label">ปีเกิด</label>
                        <div class="input-group mb-2">

                          <input name="txtBy" type="text" value="<?php echo $row['txtBy']; ?>" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                        </div>
                      </div>

                      <div class="col-md-6 mb-0">
                        <div class="col-md-12 mb-2">
                          <label for="basic-url" class="form-label">หมายเลขบัตรประชาชน</label>
                          <div class="input-group mb-2">
                            <input name="txtCid" type="text" value="<?php echo $row['txtCid']; ?>" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                          </div>
                        </div>
                      </div>

                      <div class="col-md-3 mb-2">
                        <label for="basic-url" class="form-label">สัญชาติ</label> <label class="text-danger"> *</label>
                        <div class="input-group mb-2">
                          <select name="txtNationality" class="form-select" aria-label="Default select example">
                            <option selected value="<?php echo $txtNationality; ?>"><?php echo $nation; ?></option>
                          
                              <?php
                               $pp = $conn->query("SELECT * FROM nation"); 
                              while ($rowNation = $pp->fetch_assoc()) {
                              ?>
                                <option value="<?php echo $rowNation['nation_id']; ?>">
                                  <?php echo $rowNation['nation_name'] . "<br>"; ?>
                                </option>
                              <?php
                              }
                              ?>
                            </select>
                        </div>
                      </div>

                      <div class="col-md-3 mb-2">
                        <label for="basic-url" class="form-label">ศาสนา</label> <label class="text-danger"> *</label>
                        <div class="input-group mb-2">
                          <select name="txtReligion" class="form-select" aria-label="Default select example">
                            <option selected value="<?php echo $txtReligion; ?>"><?php echo $reg; ?></option>
                          
                              <?php
                               $rr = $conn->query("SELECT * FROM reg"); 
                              while ($rowReg = $rr->fetch_assoc()) {
                              ?>
                                <option value="<?php echo $rowReg['reg_id']; ?>">
                                  <?php echo $rowReg['reg_name'] . "<br>"; ?>
                                </option>
                              <?php
                              }
                              ?>
                            </select>
                        </div>
                      </div>

                      <div class="col-md-12 mb-2">
                        <label for="basic-url" class="form-label">อิเมลล์</label> <label class="text-danger"> *</label>
                        <div class="input-group mb-2">
                          <input name="txtEmail" type="email" value="<?php echo $row['txtEmail']; ?>" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                        </div>
                      </div>

                      <div class="col-md-6 mb-0">
                        <div class="col-md-12 mb-2">
                          <label for="basic-url" class="form-label">อาชีพ</label>
                          <div class="input-group mb-2">
                            <input name="txtOccupation" type="text" value="<?php echo $row['txtOccupation']; ?>" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6 mb-2">
                        <label for="basic-url" class="form-label">วุฒิการศึกษา</label> <label class="text-danger"> *</label>
                        <div class="input-group mb-2">
                          <select name="txtEducation" class="form-select" aria-label="Default select example">
                            <option selected value="<?php echo $txtEducation; ?>"><?php echo $edu; ?></option>
                          
                              <?php
                               $ee = $conn->query("SELECT * FROM edu"); 
                              while ($rowEdu = $ee->fetch_assoc()) {
                              ?>
                                <option value="<?php echo $rowEdu['edu_id']; ?>">
                                  <?php echo $rowEdu['edu_name'] . "<br>"; ?>
                                </option>
                              <?php
                              }
                              ?>
                            </select>
                        </div>
                      </div>

                      <div class="col-md-6 mb-0">
                        <label for="basic-url" class="form-label">ชื่อ (คู่สมรส)</label>
                        <div class="input-group mb-2">
                          <input name="txtName2" type="text" value="<?php echo $row['txtName2']; ?>" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                        </div>
                      </div>
                      <div class="col-md-6 mb-0">
                        <label for="basic-url" class="form-label">นามสกุล (คู่สมรส)</label>
                        <div class="input-group mb-2">
                          <input name="txtLname2" type="text" value="<?php echo $row['txtLname2']; ?>" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                        </div>
                      </div>

                      <div class="col-md-6 mb-0">
                        <label for="basic-url" class="form-label">ชื่อบิดา (ผู้ป่วย)</label>
                        <div class="input-group mb-2">
                          <input name="txtNameDad" type="text" value="<?php echo $row['txtNameDad']; ?>" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                        </div>
                      </div>
                      <div class="col-md-6 mb-0">
                        <label for="basic-url" class="form-label">นามสกุลบิดา (ผู้ป่วย)</label>
                        <div class="input-group mb-2">
                          <input name="txtLnameDad" type="text" value="<?php echo $row['txtLnameDad']; ?>" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                        </div>
                      </div>

                      <div class="col-md-6 mb-0">
                        <label for="basic-url" class="form-label">ชื่อมารดา (ผู้ป่วย)</label>
                        <div class="input-group mb-2">
                          <input name="txtNameMom" type="text" value="<?php echo $row['txtNameMom']; ?>" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                        </div>
                      </div>
                      <div class="col-md-6 mb-0">
                        <label for="basic-url" class="form-label">นามสกุลมารดา (ผู้ป่วย)</label>
                        <div class="input-group mb-2">
                          <input name="txtLnameMom" type="text" value="<?php echo $row['txtLnameMom']; ?>" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                        </div>
                      </div>
                    </div>




                    <div class="h3 " style="font-family:kanit;">ข้อมูลที่อยู่</div>
                    <hr>
                    <!-- <button class="btn btn-primary btn-block mb-5"><?php echo "ลงทะเบียนใหม่ "; ?></button> -->

                    <div class="col-md-12 mb-4 row">
                      <div class="col-md-3 mb-0">
                        <label for="basic-url" class="form-label">เลขที่</label>
                        <div class="input-group mb-2">
                          <input name="txtNo" type="text" value="<?php echo $row['txtNo']; ?>" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                        </div>
                      </div>
                      <div class="col-md-3 mb-0">
                        <label for="basic-url" class="form-label">หมู่</label>
                        <div class="input-group mb-2">
                          <input name="txtMo" type="text" value="<?php echo $row['txtMo']; ?>" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                        </div>
                      </div>
                      <div class="col-md-3 mb-0">
                        <label for="basic-url" class="form-label">ตรอก/ซอย</label>
                        <div class="input-group mb-2">
                          <input name="txtAlley" type="text" value="<?php echo $row['txtAlley']; ?>" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                        </div>
                      </div>
                      <div class="col-md-3 mb-0">
                        <label for="basic-url" class="form-label">แขวง/ตำบล</label>
                        <div class="input-group mb-2">
                          <input name="txtSubDistrict" type="text" value="<?php echo $row['txtSubDistrict']; ?>" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                        </div>
                      </div>
                      <div class="col-md-3 mb-0">
                        <label for="basic-url" class="form-label">เขต/อำเภอ</label>
                        <div class="input-group mb-2">
                          <input name="txtDistrict" type="text" value="<?php echo $row['txtDistrict']; ?>" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                        </div>
                      </div>
                      <div class="col-md-3 mb-0">
                        <label for="basic-url" class="form-label">จังหวัด</label>
                        <div class="input-group mb-2">
                          <input name="txtProvince" type="text" value="<?php echo $row['txtDistrict']; ?>" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                        </div>
                      </div>
                      <div class="col-md-3 mb-0">
                        <label for="basic-url" class="form-label">รหัสไปรณีย์</label>
                        <div class="input-group mb-2">
                          <input name="txtPostCode" type="text" value="<?php echo $row['txtPostCode']; ?>" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                        </div>
                      </div>
                      <div class="col-md-3 mb-0">
                        <label for="basic-url" class="form-label">หมายเลขโทรศัพท์</label>
                        <div class="input-group mb-2">
                          <input name="txtTel" type="text" value="<?php echo $row['txtTel']; ?>" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                        </div>
                      </div>


                      <div class="h3 mt-4" style="font-family:kanit;">เลข HN</div>
                      <hr>
                      <!-- <button class="btn btn-primary btn-block mb-5"><?php echo "ลงทะเบียนใหม่ "; ?></button> -->

                      <div class="col-md-12 mb-4 row">
                        <div class="col-md-3 mb-0">
                          <label for="basic-url" class="form-label">กรอกเลข HN ที่ได้จากระบบ</label>
                          <div class="input-group mb-2">
                            <input name="txtHN" type="text" value="<?php echo $row['txtHN']; ?>" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                          </div>
                        </div>



                        <div class="col-md-12  mb-2 mt-5">




                          <input type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-danger btn-block" onclick="history.back();" value="กลับหน้าหลัก" style="margin-top:-50px">

                          <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-success btn-block mb-0" style="margin-top:-50px;">
                            ยืนยันข้อมูล
                          </button>
                          <br>
                        </div>

                      </div>






                      <!-- <label for="">CID</label>
                    <input class="form-control" id="disabledInput" type="text" value="<?php echo $cid; ?>" disabled>
                     -->
                  </form>


                <?php }



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