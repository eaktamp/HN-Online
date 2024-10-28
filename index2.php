<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">

    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <?php
  session_start();

  if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
  }
  //include("connect.php"); 
  ?>

  <title>HN Online</title>
</head>

<body style="background-color:#009579;">

  <section class="1background-radial-gradient overflow-hidden">

    <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
      <div class="row gx-lg-5 align-items-center mb-5">
        <div class="col-lg-12 mb-0 mb-lg-0" style="z-index: 10; text-align:center">
          <img src="img/ABH-LOGO-WHITE.png" alt="" style="width:20%; margin-top:-80px; margin-bottom:-30px;">
          <h1 class="my-1 display-3 fw-bold ls-light" style="color: hsl(218, 81%, 95%)">
            CPA HN Online
          </h1>
          <p class="text-white mt-4 h2" style="font-family:kanit" ;>ระบบขอเลข HN Online</p>
          <p class="text-white mt-0 h5 opacity-70 fw-light" style="font-family:kanit" ;>เพื่อลดการแออัด และลดเวลารอคอย</p>
        </div>

        <!-- box center -->
        <div class="col-lg-3 mb-5 mb-lg-0 position-relative"></div>
        <div class="col-lg-6 mb-5 mb-lg-0 position-relative">

          <!-- card center -->
          <div class="card bg-glass">
            <!-- card size -->
            <div class="card-body px-4 py-5 px-md-5">

              <form action="check_cid.php" method="POST">

                <div class="row">
                  <div class="col-md-12 mb-3">
                    <div data-mdb-input-init class="form-outline">
                      <input placeholder="กรุณากรอกรหัสประจำตัวประชาชน" minlength="13" maxlength="13" name="txtCid" type="text" id="form3Example1" class="form-control text-center" required />
                      <?php echo '<input type="hidden" name="csrf_token" value="' . $_SESSION['csrf_token'] . '">'; ?>

                    </div>
                  </div>


                  <div class="col-md-4 mb-3">
                    <select class="form-select" name="txtBd" required>
                      <option value=''>วันเกิด</option>
                      <?php foreach (range(1, 31) as $resl) { ?>
                        <option value="<?= $resl ?>"> <?= $resl ?> </option>
                      <?php } ?>
                    </select>
                  </div>

                  <div class="col-md-4 mb-3">
                    <div data-mdb-input-init class="form-outline">
                      <select name="txtBm" class="form-select" required>
                        <Option value="">เดือนเกิด</option>
                        <Option value="1">มกราคม</option>
                        <Option value="2">กุมภาพันธ์</option>
                        <Option value="3">มีนาคม</option>
                        <Option value="4">เมษายน</option>
                        <Option value="5">พฤษภาคม</option>
                        <Option value="6">มิถุนายน</option>
                        <Option value="7">กรกฎาคม</option>
                        <Option value="8">สิงหาคม</option>
                        <Option value="9">กันยายน</option>
                        <Option value="10">ตุลาคม</option>
                        <Option value="11">พฤศจิกายน</option>
                        <Option value="12">ธันวาคม</option>
                      </Select>
                    </div>
                  </div>

                  <div class="col-md-4 mb-3">
                    <select class="form-select" name="txtBy" required>
                      <option value='' style="text-align:center;">ปีเกิด</option>
                      <?php
                      foreach (range(2500, 2567) as $resl) {
                      ?><option value="<?= $resl ?>"> <?= $resl ?>
                        </option><?php   }   ?>
                    </select>
                  </div>

                </div>
                <!-- end input -->
            </div>

            <div class="d-grid gap-2 col-8 mx-auto mb-5">
              <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-success btn-block mb-0" style="margin-top:-40px;">
                ตรวจสอบข้อมูล
              </button>
              <a href="check_admin.php" class="text-primary text-center " style="margin-bottom:-40px"><i class="fa fa-lock text-dark"></i></a>
            </div>
            </form>

          </div>
          <p class="mt-0 opacity-100 text-center mt-4" style="color: hsl(218, 81%, 85%); font-family:kanit;">
            กลุ่มงานดิจิทัลสุขภาพ โรงพยาบาลเจ้าพระยาอภัยภูเบศร
          </p>
        </div>
      </div>
    </div>
    </div>
  </section>
  <!-- Section: Design Block -->

</body>

</html>