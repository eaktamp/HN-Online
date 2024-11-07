<!DOCTYPE html>
<html lang="en">

<head>
    <title>HN Online</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body style="background-color:#009579;">
    <section class="1background-radial-gradient overflow-hidden">
        <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
            <div class="row gx-lg-5 align-items-center mb-5">
                <div class="col-lg-12 mb-0 mb-lg-0" style="z-index: 10; text-align:center">
                    <img src="img/ABH-LOGO-WHITE.png" alt="" style="width:20%; margin-top:-80px; margin-bottom:-30px;">
                </div>
                <div class="col-lg-3 mb-5 mb-lg-0 position-relative"></div>

                <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                    <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                    <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

                    <div class="card bg-glass">
                        <div class="card-body px-4 py-5 px-md-5">
                            <form id="loginForm">
                                <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                                <div class="row">
                                    <div class="col-md-12 mb-0">
                                        <div data-mdb-input-init class="form-outline">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                                                <input type="text" name="username" class="form-control" placeholder="Username"
                                                    aria-label="Username" aria-describedby="basic-addon1" required>
                                            </div>

                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-key"></i></span>
                                                <input type="password" name="password" class="form-control" placeholder="Password"
                                                    aria-label="Password" aria-describedby="basic-addon1" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-grid gap-2 col-6 mx-auto mb-5">
                                    <button type="submit" class="btn btn-success btn-block mb-0">
                                        เข้าสู่ระบบ
                                    </button>
                                    <a href="/hn-online" class="btn text-primary text-center " style="margin-bottom:-40px"><i class="fa fa-home text-dark"></i> กลับสู่หน้าหลัก</a>
                                </div>

                            </form>

                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                            <script>
                                $(document).ready(function() {
                                    $('#loginForm').submit(function(e) {
                                        e.preventDefault();

                                        $.ajax({
                                            type: 'POST',
                                            url: '/hn-online/service_checklogin',
                                            data: $(this).serialize(),
                                            dataType: 'json',
                                            success: function(response) {
                                                if (response.success) {
                                                    window.location.href = '/hn-online/admin';
                                                    Swal.fire({
                                                        icon: 'warning',
                                                        title: 'Invalid login credentials.',
                                                        text: response.message,
                                                        confirmButtonText: 'ตกลง',
                                                        customClass: {
                                                            title: 'fw-bold',
                                                            content: 'h6',
                                                        }
                                                    });
                                                } else {
                                                    Swal.fire({
                                                        icon: 'warning',
                                                        title: 'Invalid login credentials.',
                                                        text: response.message,
                                                        confirmButtonText: 'ตกลง',
                                                        customClass: {
                                                            title: 'fw-bold',
                                                            content: 'h6',
                                                        }
                                                    });
                                                }
                                            }
                                        });
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>