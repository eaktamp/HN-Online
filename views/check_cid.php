<?php
$txtCid = filter_input(INPUT_POST, 'cid', FILTER_SANITIZE_STRING);
$txtBd = filter_input(INPUT_POST, 'bdDay', FILTER_VALIDATE_INT);
$txtBm = filter_input(INPUT_POST, 'bdMonth', FILTER_VALIDATE_INT);
$txtBy = filter_input(INPUT_POST, 'bdYear', FILTER_VALIDATE_INT);

$months = [
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
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>HN Online</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="jquery.Thailand.js/dist/jquery.Thailand.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kanit">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.20/css/uikit.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    .form-control:disabled,
    .form-control[readonly] {
      background-color: #fff;
      opacity: 1;
    }
  </style>

  <script>
    (function(i, s, o, g, r, a, m) {
      i['GoogleAnalyticsObject'] = r;
      i[r] = i[r] || function() {
        (i[r].q = i[r].q || []).push(arguments)
      }, i[r].l = 1 * new Date();
      a = s.createElement(o), m = s.getElementsByTagName(o)[0];
      a.async = 1;
      a.src = g;
      m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-33058582-1', 'auto', {
      'name': 'Main'
    });
    ga('Main.send', 'event', 'jquery.Thailand.js', 'GitHub', 'Visit');
  </script>
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
        <div class="col-lg-3 mb-5 mb-lg-0 position-relative">
        </div>
        <div class="col-lg-6 mb-0 mb-lg-0 position-relative">
          <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
          <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

          <div class="card bg-glass">
            <div class="card-body px-4 py-5 px-md-5">
              <div class="row">
                <div class="text-center" style="font-family:kanit"><?php ?>
                  <div class="mt-5" style="margin-bottom:-30px;">
                  <form id="formpatient" class="" >
                 
                      <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

                      <div class="h1 text-center text-primary " style="margin-top:-20px; font-family:kanit;">ลงทะเบียนผู้ป่วยใหม่</div>
                      <div class="h3 " style="font-family:kanit;">ข้อมูลส่วนบุคคล</div>
                      <hr>
                      <div class="col-md-12 mb-4 row">

                        <div class="col-md-3 mb-2">
                          <label for="basic-url" class="form-label"> คำนำหน้า</label>
                          <div class="input-group mb-2">
                            <select name="txtPrename" class="form-select" aria-label="Default select example" id="prenameSelect">
                              <option selected disabled value="0">คำนำหน้า</option>
                              <option value="นาย">นาย</option>
                              <option value="นาง">นาง</option>
                              <option value="นางสาว">นางสาว</option>
                              <option value="ไม่ระบุ">ไม่ระบุ</option>
                            </select>

                          </div>
                        </div>

                        <div class="col-md-4 mb-0">
                          <label for="basic-url" class="form-label">ชื่อ</label> <label class="text-danger"> *</label>
                          <div class="input-group mb-2">
                            <input name="txtName" required type="text" value="" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                          </div>
                        </div>
                        <div class="col-md-5 mb-0">
                          <label for="basic-url" class="form-label">นามสกุล</label> <label class="text-danger"> *</label>
                          <div class="input-group mb-2">
                            <input name="txtLname" required type="text" value="" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                          </div>
                        </div>

                        <div class="col-md-2 mb-2">
                          <label for="basic-url" class="form-label">เพศ</label> <label class="text-danger"> *</label>
                          <div class="input-group mb-2">
                            <select name="txtGender" class="form-select" aria-label="Default select example" id="genderSelect">
                              <option selected disabled value="0">เพศ</option>
                              <option value="ชาย" >ชาย</option>
                              <option value="หญิง">หญิง</option>
                              <option value="ไม่ระบุ">ไม่ระบุ</option>
                            </select>

                          </div>
                        </div>
                        <div class="col-md-3 mb-2">
                          <label for="basic-url" class="form-label">สถานภาพ</label> <label class="text-danger"> *</label>
                          <div class="input-group mb-2">
                            <select name="txtStatus" class="form-select" aria-label="Default select example">
                              <option value="0" selected disabled>สถานะภาพ</option>
                              <option value="โสด" >โสด</option>
                              <option value="สมรส">สมรส</option>
                              <option value="ม่าย">ม่าย</option>
                              <option value="หย่าร้าง">หย่าร้าง</option>
                              <option value="แยกกันอยู่">แยกกันอยู่</option>
                            </select>
                          </div>
                        </div>

                        <div class="col-md-2 mb-0">
                          <label for="txtBd" class="form-label">วันเกิด</label> <label class="text-danger"> *</label>
                          <input name="txtBd" type="text" value="<?php echo $txtBd; ?>" class="form-control" id="txtBd" aria-describedby="basic-addon3" readonly>
                        </div>


                        <div class="col-md-3 mb-0">
                          <label for="basic-url" class="form-label">เดือนเกิด</label> <label class="text-danger"> *</label>
                          <div data-mdb-input-init class="form-outline">
                            <select name="txtBm" class="form-select " required>
                              <option value="">เดือนเกิด</option>
                              <?php foreach ($months as $value => $name) { ?>
                                <option value="<?php echo $value ?>" <?php echo ($txtBm == $value) ? 'selected ' : '' ?> Disabled><?php echo $name ?></option>
                              <?php } ?>
                            </select>
                            <input type="hidden" name="txtBm" value="<?php echo $txtBm; ?>">

                          </div>
                        </div>
                        <div class="col-md-2 mb-0">
                          <label for="basic-url" class="form-label">ปีเกิด</label> <label class="text-danger"> *</label>
                          <select class="form-select " name="txtBy" required>
                            <option value='' style="text-align:center;">ปีเกิด</option>
                            <?php
                            foreach (range(2490, 2567) as $resl) {
                              $selected = ($resl == $txtBy) ? 'selected' : '';
                              echo "<option value='$resl' $selected style='text-align:center;' Disabled>$resl</option>";
                            }
                            ?>
                          </select>
                          <input type="hidden" name="txtBy" value="<?php echo $txtBy; ?>">
                        </div>

                        <div class="col-md-6 mb-0">
                          <div class="col-md-12 mb-2">
                            <label for="basic-url" class="form-label">หมายเลขบัตรประชาชน</label> <label class="text-danger"> *</label>
                            <div class="input-group mb-2">
                              <input name="txtCid" readonly type="text" value="<?php echo $txtCid; ?>" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                            </div>
                          </div>
                        </div>

                        <div class="col-md-3 mb-2">
                          <label for="basic-url" class="form-label">สัญชาติ</label> <label class="text-danger"> *</label>
                          <div class="input-group mb-2">
                            <input name="txtNationality" type="text" value="" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                          </div>
                        </div>

                        <div class="col-md-3 mb-2">
                          <label for="basic-url" class="form-label">ศาสนา</label> <label class="text-danger"> *</label>
                          <select name="txtReligion" class="form-select" required>
                            <option selected disabled ="" style="text-align:center;">เลือกศาสนา</option>
                            <option value="01" >พุทธ</option>
                            <option value="02">อิสลาม</option>
                            <option value="03">คริสต์</option>
                            <option value="04">ฮินดู</option>
                            <option value="05">อื่นๆ</option>
                            <option value="06">ไม่นับถือศาสนา</option>
                            <option value="07">ซิกข์</option>
                            <option value="09">ไม่ทราบ</option>
                          </select>
                        </div>

                        <div class="col-md-12 mb-2">
                          <label for="basic-url" class="form-label">อีเมลล์</label> <label class="text-danger"> </label>
                          <div class="input-group mb-2">
                            <input name="txtEmail" type="text" value="" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                          </div>
                        </div>

                        <div class="col-md-6 mb-0">
                          <div class="col-md-12 mb-2">
                            <label for="basic-url" class="form-label">อาชีพ</label>
                            <div class="input-group mb-2">
                              <input name="txtOccupation" type="text" value="" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6 mb-2">
                          <label for="basic-url" class="form-label">วุฒิการศึกษา</label>
                          <select name="txtEducation" class="form-select" required>
                            <option value="" selected disabled ="text-align:center;">เลือกวุฒิการศึกษา</option>
                            <option value="00" >ไม่ได้รับการศึกษา หรือต่ำกว่าประถมศึกษา</option>
                            <option value="01">ประถมศึกษา</option>
                            <option value="02">มัธยมศึกษาตอนต้น (ม.3)</option>
                            <option value="03">มัธยมศึกษาตอนปลาย (ม.6)</option>
                            <option value="04">ประกาศนียบัตรวิชาชีพ (ปวช.)</option>
                            <option value="05">ประกาศนียบัตรครู (ปก.ศ.ต้น)</option>
                            <option value="06">ประกาศนียบัตรวิชาชีพเทคนิค (ปวท.)</option>
                            <option value="07">ประกาศนียบัตรวิชาชีพชั้นสูง (ปวส.)</option>
                            <option value="08">ปริญญาตรี</option>
                            <option value="09">ปริญญาโท</option>
                            <option value="10">ปริญญาเอก</option>
                            <option value="11">การฝึกอาชีพระยะสั้น (สถาบันพัฒนาฝีมือ แรงงาน/สถาบันฝึกอาชีพอื่นๆ)</option>
                          </select>
                        </div>

                        <div class="col-md-6 mb-0">
                          <label for="basic-url" class="form-label">ชื่อ (คู่สมรส)</label>
                          <div class="input-group mb-2">
                            <input name="txtName2" type="text" value="" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                          </div>
                        </div>
                        <div class="col-md-6 mb-0">
                          <label for="basic-url" class="form-label">นามสกุล (คู่สมรส)</label>
                          <div class="input-group mb-2">
                            <input name="txtLname2" type="text" value="" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                          </div>
                        </div>

                        <div class="col-md-6 mb-0">
                          <label for="basic-url" class="form-label">ชื่อบิดา (ผู้ป่วย)</label>
                          <div class="input-group mb-2">
                            <input name="txtNameDad" type="text" value="" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                          </div>
                        </div>
                        <div class="col-md-6 mb-0">
                          <label for="basic-url" class="form-label">นามสกุลบิดา (ผู้ป่วย)</label>
                          <div class="input-group mb-2">
                            <input name="txtLnameDad" type="text" value="" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                          </div>
                        </div>

                        <div class="col-md-6 mb-0">
                          <label for="basic-url" class="form-label">ชื่อมารดา (ผู้ป่วย)</label>
                          <div class="input-group mb-2">
                            <input name="txtNameMom" type="text" value="" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                          </div>
                        </div>
                        <div class="col-md-6 mb-0">
                          <label for="basic-url" class="form-label">นามสกุลมารดา (ผู้ป่วย)</label>
                          <div class="input-group mb-2">
                            <input name="txtLnameMom" type="text" value="" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                          </div>
                        </div>
                      </div>



                      <div class="h3 " style="font-family:kanit;">ข้อมูลที่อยู่</div>

                      <hr>
                      <div class="col-md-12 mb-4 row">
                        <div class="col-md-3 mb-0">
                          <label for="basic-url" class="form-label">เลขที่</label>
                          <div class="input-group mb-2">
                            <input name="txtNo" type="text" value="" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                          </div>
                        </div>
                        <div class="col-md-3 mb-0">
                          <label for="basic-url" class="form-label">หมู่</label>
                          <div class="input-group mb-2">
                            <input name="txtMo" type="text" value="" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                          </div>
                        </div>
                        <div class="col-md-3 mb-0">
                          <label for="basic-url" class="form-label">ตรอก/ซอย</label>
                          <div class="input-group mb-2">
                            <input name="txtAlley" type="text" value="" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                          </div>
                        </div>
                        <div class="col-md-3 mb-0">
                          <label for="basic-url" class="form-label">แขวง/ตำบล</label>
                          <div class="input-group mb-2">
                            <input name="txtSubDistrict" type="text" value="" class="form-control" id="basic-url" aria-describedby="basic-addon3" required>
                          </div>
                        </div>
                        <div class="col-md-3 mb-0">
                          <label for="basic-url" class="form-label">เขต/อำเภอ</label>
                          <div class="input-group mb-2">
                            <input name="txtDistrict" type="text" value="" class="form-control" id="basic-url" aria-describedby="basic-addon3" required>
                          </div>
                        </div>
                        <div class="col-md-3 mb-0">
                          <label for="basic-url" class="form-label">จังหวัด</label>
                          <div class="input-group mb-2">
                            <input name="txtProvince" type="text" value="" class="form-control" id="basic-url" aria-describedby="basic-addon3" required>
                          </div>
                        </div>
                        <div class="col-md-3 mb-0">
                          <label for="basic-url" class="form-label">รหัสไปรณีย์</label>
                          <div class="input-group mb-2">
                            <input name="txtPostCode" type="text" value="" class="form-control" id="basic-url" aria-describedby="basic-addon3" required>
                          </div>
                        </div>
                        <div class="col-md-3 mb-0">
                          <label for="basic-url" class="form-label">หมายเลขโทรศัพท์</label>
                          <div class="input-group mb-2">
                            <input name="txtTel" type="text" value="" class="form-control" id="basic-url" aria-describedby="basic-addon3" required>
                          </div>
                        </div>

                        <div class="col-md-12  mb-2 mt-5">

                          <input type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-danger btn-block" onclick="history.back();" value="กลับสู่หน้าหลัก" style="margin-top:-50px">

                          <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-success btn-block mb-0" style="margin-top:-50px;">
                            ตรวจสอบข้อมูล
                          </button>
                          <br>
                        </div>

                      </div>
                    </form>

                  </div>
                </div>
              </div>
            </div>
          </div>
  </section>

  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.20/js/uikit.min.js"></script>
  <script type="text/javascript" src="jquery.Thailand.js/dependencies/JQL.min.js"></script>
  <script type="text/javascript" src="jquery.Thailand.js/dependencies/typeahead.bundle.js"></script>
  <script type="text/javascript" src="jquery.Thailand.js/dist/jquery.Thailand.min.js"></script>
  <script type="text/javascript">
    $.Thailand({
      database: '/HN-Online/jquery.Thailand.js/database/db.json',
      $district: $('#formpatient [name="txtSubDistrict"]'),
      $amphoe: $('#formpatient [name="txtDistrict"]'),
      $province: $('#formpatient [name="txtProvince"]'),
      $zipcode: $('#formpatient [name="txtPostCode"]'),
      onDataFill: function(data) {
        console.info('Data Filled', data);
      },
      onLoad: function() {
        console.info('Autocomplete is ready!');
        $('#loader, .demo').toggle();
      }
    });
    $('#formpatient [name="txtSubDistrict"]').change(function() {
      console.log('ตำบล', this.value);
    });
    $('#formpatient [name="txtDistrict"]').change(function() {
      console.log('อำเภอ', this.value);
    });
    $('#formpatient [name="txtProvince"]').change(function() {
      console.log('จังหวัด', this.value);
    });
    $('#formpatient [name="txtPostCode"]').change(function() {
      console.log('รหัสไปรษณีย์', this.value);
    });

    document.getElementById('prenameSelect').addEventListener('change', function() {
      var genderSelect = document.getElementById('genderSelect');
      var selectedPrename = this.value;
      genderSelect.value = "0";
      if (selectedPrename === 'นาย') {
        genderSelect.value = 'ชาย';
      } else if (selectedPrename === 'นาง' || selectedPrename === 'นางสาว') {
        genderSelect.value = 'หญิง';
      } else if (selectedPrename === 'ไม่ระบุ') {
        genderSelect.value = 'ไม่ระบุ';
      }
    });


    $(document).ready(function() {
      $('#formpatient').on('submit', function(event) {
        event.preventDefault();

        Swal.fire({
          title: 'ยืนยันข้อมูล',
          text: 'กรุณาตรวจสอบข้อมูลของท่านอีกครั้งก่อนยืนยัน?',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'ยืนยัน',
          cancelButtonText: 'ยกเลิก'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              type: 'POST',
              url: '/hn-online/insertpatient',
              data: $(this).serialize(),
              dataType: 'json',
              success: function(response) {
                if (response.success) {
                  Swal.fire({
                    icon: 'success',
                    text: response.message,
                    title: 'ขอขอบคุณ',
                    confirmButtonText: 'ตกลง'
                  }).then(() => {
                    window.location.href = '/hn-online/serchpatient';
                  });
                  $('#formpatient')[0].reset();
                } else {
                  Swal.fire({
                    icon: 'error',
                    title: 'เกิดข้อผิดพลาด',
                    text: 'Error: ' + response.message,
                    confirmButtonText: 'ตกลง'
                  });
                }
              },
              error: function(jqXHR, textStatus, errorThrown) {
                console.log("Error: " + textStatus + " " + errorThrown);
                Swal.fire({
                  icon: 'error',
                  title: 'เกิดข้อผิดพลาด',
                  text: 'เกิดข้อผิดพลาดในการติดต่อกับเซิร์ฟเวอร์: ' + errorThrown,
                  confirmButtonText: 'ตกลง'
                });
              }
            });
          }
        });
      });
    });
  </script>
</body>

</html>