
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">

  <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

              <form id="checkForm">

                <div class="row">
                  <div class="col-md-12 mb-3">
                    <div data-mdb-input-init class="form-outline">
                      <input placeholder="กรุณากรอกรหัสประจำตัวประชาชน" minlength="13" maxlength="13" name="txtCid"
                        type="text" id="cidInput" class="form-control text-center" value="" oninput="checkCitizenID(this.value)" required 
                        onkeypress="return event.charCode >= 48 && event.charCode <= 57" />
                      <!--  -->
                      <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                
                    </div>
                  </div>
                  <div class="col-md-12 mb-3">
                    <div data-mdb-input-init class="form-outline">
                      <div class="text-center" id="result"></div>
                    </div>
                  </div>



                  <div class="col-md-4 mb-3">
                    <select class="form-select  " name="txtBd" required>
                      <option value=''>วันเกิด</option>
                      <?php foreach (range(1, 31) as $resl) { ?>
                        <option value="<?= $resl ?>"> <?= $resl ?> </option>
                      <?php } ?>
                    </select>
                  </div>

                  <div class="col-md-4 mb-3">
                    <div data-mdb-input-init class="form-outline">
                      <select name="txtBm" class="form-select  " required>
                        <Option value="">เดือนเกิด</option>
                        <Option value="1">มกราคม</option>
                        <Option value="2">กุมภาพันธ์</option>
                        <Option value="3">มีนาคม</option>
                        <Option value="4" >เมษายน</option>
                        <Option value="5">พฤษภาคม</option>
                        <Option value="6">มิถุนายน</option>
                        <Option value="7">กรกฎาคม</option>
                        <Option value="8">สิงหาคม</option>
                        <Option value="9">กันยายน</option>
                        <Option value="10">ตุลาคม</option>
                        <Option value="11">พฤศจิกายน</option>
                        <Option value="12">ธันวาคม</Option>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-4 mb-3">
                    <select class="form-select " name="txtBy" required>
                      <option value='' style="text-align:center;">ปีเกิด</option>
                      <?php
                      foreach (range(2490, 2567) as $resl) {
                      ?><option value="<?= $resl ?>"> <?= $resl ?>
                        </option><?php   }   ?>
                    </select>
                  </div>

                </div>
            </div>

            <div class="d-grid gap-2 col-8 mx-auto mb-5">
              <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-success btn-block mb-0" style="margin-top:-40px;">
                ตรวจสอบข้อมูล
              </button>
              <a href="/hn-online/login" class="text-primary text-center " style="margin-bottom:-40px"><i class="fa fa-lock text-dark"></i></a>
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

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <script>
    // Check INPUT
   
     
    function checkCitizenID(cid) {
    const submitButton = document.querySelector('button[type="submit"]');
    const resultElement = document.getElementById("result");

    if (cid.length !== 13) {
        resultElement.innerText = "";
        submitButton.disabled = true; 
        return;
    }

    let sum = 0;
    for (let i = 0; i < 12; i++) {
        sum += parseInt(cid.charAt(i)) * (13 - i);
    }
    
    let checkDigit = (11 - (sum % 11)) % 10;

    if (checkDigit === parseInt(cid.charAt(12))) {
        resultElement.innerHTML = '<i class="fa-solid fa-check text-success"></i> เลขบัตรประชาชนถูกต้อง';
        resultElement.style.color = "green"; 
        submitButton.disabled = false; 
    } else {
        resultElement.innerHTML = '<i class="fa-solid fa-circle-xmark text-danger"></i> เลขบัตรประชาชนไม่ถูกต้อง'; 
        resultElement.style.color = "red";
        submitButton.disabled = true; 
    }
}

document.getElementById("cidInput").addEventListener("input", function() {
    checkCitizenID(this.value);
});

document.addEventListener("DOMContentLoaded", function() {
    document.querySelector('button[type="submit"]').disabled = true;
});

    // SELECT 2

    $(document).ready(function() {
      $('.select2txtBd').select2({
        placeholder: "วันเกิด",
        allowClear: true,
        width: '100%'
      });
      $('.select2txtBm').select2({
        placeholder: "เดือนเกิด",
        allowClear: true,
        width: '100%',
      });
      $('.select2txtBy').select2({
        placeholder: "ปีเกิด",
        allowClear: true,
        width: '100%'
      });
    });

    $(document).ready(function() {
    $('#checkForm').on('submit', function(event) {
        event.preventDefault();
        const cid = $('#cidInput').val();
        const bd = $('select[name="txtBd"]').val();
        const bm = $('select[name="txtBm"]').val();
        const by = $('select[name="txtBy"]').val();
        
        $.ajax({
            url: '/hn-online/checkpatient',
            type: 'POST',
            data: {
                txtCid: cid,
                txtBd: bd,
                txtBm: bm,
                txtBy: by,
                csrf_token: $('input[name="csrf_token"]').val()
            },
            success: function(response) {
                if (response.success) {
                    $('#modalBody').html(`
                        <div class="text-center">
                            <div class="fw-bold h4 ">สวัสดี</div>
                            <div class="fw-bold display-6 text-success"><i class="fa fa-user text-success"></i> คุณ${response.fname} ${response.lname}</div>
                            <div class="fw-normal h5 mt-3">HN ของคุณคือ</div>
                            <div class="text-primary display-1 fw-bold">${response.hn}</div>
                            <div class="fw-normal mt-3 h5 text-muted">โรงพยาบาลเจ้าพระยาอภัยภูเบศร ขอบคุณที่ใช้บริการ</div>
                            <div class="fw-normal mt-3 h6 text-danger">ท่านสามารถนำบัตรประจำตัวประชาชน เข้ารับบริการผ่านตู้ออกบัตรอัตโนมัติ</div>
                        </div>
                    `);
                    $('#resultModal').modal('show');
                } else {
                    if (response.redirect) {
                        const form = $('<form>', {
                            action: '/hn-online/frm_patient',
                            method: 'POST',
                            style: 'display:none;'
                        }).append($('<input>', { name: 'cid', value: response.cid }))
                          .append($('<input>', { name: 'bdDay', value: response.bdDay }))
                          .append($('<input>', { name: 'bdMonth', value: response.bdMonth }))
                          .append($('<input>', { name: 'bdYear', value: response.bdYear }));
                        
                        $('body').append(form);
                        form.submit();
                    } else {
                      $('#modalBody').html(`
                                  <div class="text-center">
                                      <div class="fw-bold h4 text-success"><i class="fa fa-exclamation-triangle text-warning"></i> สถานะการลงทะเบียน ขอเลข HN Online </div>
                                      <div class="fw-bold mt-3 h2 text-success">สถานะ : ${response.message}</div>
                                  </div>
                              `);
                              $('#resultModal').modal('show');
                    }
                }
            },
            error: function() {
                Swal.fire({
                    icon: 'error',
                    title: 'เกิดข้อผิดพลาด',
                    text: 'เกิดข้อผิดพลาดในการตรวจสอบข้อมูล',
                    confirmButtonText: 'ตกลง',
                    customClass: {
                        title: 'fw-bold',
                        content: 'h6',
                    }
                });
            }
        });
    });
});
  </script>

  <div class="modal fade" id="resultModal" tabindex="-1" aria-labelledby="resultModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="resultModalLabel"> <i class="fa-solid fa-hospital-user text-primary"></i> CPA HN ONLINE</h5>
        </div>
        <div class="modal-body" id="modalBody">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
        </div>
      </div>
    </div>
  </div>

</body>

</html>