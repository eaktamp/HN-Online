<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">

  <?php
  require_once './vendor/autoload.php';
  $dotenv = Dotenv\Dotenv::createImmutable('./');
  $dotenv->load();
  include("connect/connect.php"); ?>

  <title>HN Online</title>
</head>

<body style="background-color:#009579;">

  <section class="1background-radial-gradient overflow-hidden">

    <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5" sty>
      <div class="row gx-lg-5 align-items-center mb-5">
        <div class="col-lg-12 mb-0 mb-lg-0" style="z-index: 10; text-align:center">
          <img src="img/ABH-LOGO-WHITE.png" alt="" style="width:20%; margin-top:-80px; margin-bottom:-30px;">



        </div>
        <a href="/hn-online/adduseradmin">
                            <div class="btn text-warning bg-dark"><i class="fa fa-user"></i> Add User</div>
                          </a>
        <div class="rounded text-white fs-4 fw-bold" style="text-align: right; "><?php echo "Login : " . $_SESSION['username']; ?></div>
        <!-- box center -->
        <div class="col-lg-3 mb-5 mb-lg-0 position-relative">

        </div>



        <div class="col-lg-12 mb-5 mb-lg-0 position-relative">
          <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
          <div id="radius-shape-2" class="position-absolute shadow-5-strong "></div>

          <div class="card bg-glass">
            <div class="card-body px-4 py-5 px-md-4 bg-white">


              <?php


              if (!isset($_SESSION['admin']) || $_SESSION['admin'] == '0') {

                echo "user";
              ?><div class="text-center text-danger h4 fw-normal" style="font-family:kanit"><?php echo "รหัสผ่านไม่ถูกต้อง"; ?></div>
                <div class="mt-2 text-center">
                  <input type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-danger btn-block mt-2" onclick="history.back();" value="กลับสู่หน้าหลัก" style="margin-top:-50px">
                </div><?php
                      header('Location: check_admin.php');
                    } else {

                      // echo "admin";
                      $sql = "SELECT * FROM patient";
                      $result = $conn->query($sql);
                      $numrow = $result->num_rows;

                      $i = 1;


                      $sqlwait = "SELECT * FROM patient WHERE txtHN = 0";
                      $resultwait = $conn->query($sqlwait);
                      $numwait = $resultwait->num_rows;

             
                      ?>

                <div class="d-grid ">
                  <div class="d-grid gap-2 d-md-flex" style="font-family:kanit">
                    <p class="col-10 h4 justify-content-md-start"><?php echo "พบข้อมูลทั้งหมด " . $numrow . " รายการ"; ?></p>

                    <button class="col-1 btn btn-success justify-content-md-end"><?php echo $numrow - $numwait; ?></button>
                    <button class="col-1 btn btn-warning justify-content-md-end"><?php echo $numwait; ?></button>
                  </div>
                </div>

                <?php


                ?>
                <table class="table table-striped table-hover mt-4">
                  <thead>
                    <tr class="text-center">
                      <th>#</th>
                      <th>HN</th>
                      <th>Confirm</th>
                      <th>ชื่อ</th>
                      <th>CID</th>
                      <th>Manage</th>



                    </tr>
                  </thead>
                  <?php
                      while ($row = $result->fetch_assoc()) { ?>
                    <tbody>
                      <tr>
                        <td class="text-center">
                          <?php echo $i; ?>
                        </td>
                        <td class="text-center col-1 ">
                          <?php
                          $hn = $row['txtHN'];

                          if ($hn == 0) {
                          ?><button class="btn btn-warning">รออนุมัติ</button><?php
                                                                            } else {
                                                                              ?><button class="btn btn-block  btn-success"><?php echo $row['txtHN']; ?></button>
                          <?php
                                                                            }
                                                                            $i++;
                          ?>
                        </td>
                        <td class="col-1 text-center">
                          <link href="/your-path-to-uicons/css/uicons-[your-style].css" rel="stylesheet"> <!--load all styles -->
                          <?php
                          $cf =  $row['txtConfirm'];
                          if ($cf = 1) {
                          ?><i class="fas fa-check"></i><?php
                                                      } else {
                                                      }
                                                        ?>
                        </td>
                        <td>

                        <?php
                                     $pp = $conn->query("SELECT * FROM prename WHERE prename_id = '".$row['txtPrename']."' ");
                                     $rowPP = $pp->fetch_assoc();
                                     $prename = $rowPP['prename_name'];
                        ?>
                          <a href="#" class="text-decoration-none text-dark">
                            <?php echo $prename . $row['txtName'] . " " . $row['txtLname']; ?>
                          </a>
                        </td>
                        <td class="text-center">
                          <?php echo $row['txtCid']; ?>
                        </td>
                        <td class="col-2 text-center">
                          <?php  ?>
                          <a href="/hn-online/view.data?id=<?php echo $row['txtCid']; ?>">
                            <div class="btn btn-primary"><i class="fa fa-edit"></i> แก้ไข</div>
                          </a>

                          <button class="btn btn-danger delete-btn" data-id="<?php echo $row['txtCid']; ?>" data-csrf="<?php echo $_SESSION['csrf_token']; ?>">
                            <i class="fa fa-trash"></i> ลบ
                          </button>
                        </td>

                      </tr>

                    </tbody>

                  <?php } ?>
                </table>
                <center>
                  <div class="mt-5" style="margin-bottom:-30px;"> <input type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-danger btn-block" onclick="location.href='/hn-online/logout'" value="ออกจากระบบ" style="margin-top:-50px">

                </center>
              <?php
                    }
              ?>

            </div>
          </div>


          </form>
        </div>
      </div>
    </div>
    </div>
    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   $(document).on('click', '.delete-btn', function() {
      const id = $(this).data('id');
      const csrfToken = $(this).data('csrf');

      Swal.fire({
         title: 'คุณแน่ใจหรือไม่?',
         text: "การลบข้อมูลนี้จะไม่สามารถกู้คืนได้!",
         icon: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         confirmButtonText: 'ใช่, ลบเลย!'
      }).then((result) => {
         if (result.isConfirmed) {
            $.ajax({
               url: '/hn-online/delete_patient',
               type: 'POST',
               data: { id: id, csrf_token: csrfToken },
               success: function(response) {
                  if (response.success) {
                     Swal.fire('ลบสำเร็จ!', 'ข้อมูลถูกลบเรียบร้อยแล้ว', 'success').then(() => {
                        location.reload();
                     });
                  } else {
                     Swal.fire('เกิดข้อผิดพลาด!', response.message, 'error');
                  }
               },
               error: function() {
                  Swal.fire('เกิดข้อผิดพลาด!', 'ไม่สามารถลบข้อมูลได้', 'error');
               }
            });
         }
      });
   });
</script>


</body>

</html>