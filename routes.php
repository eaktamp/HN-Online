<?php require_once __DIR__ . '/router.php';

GET('/hn-online', 'views/index.php');
GET('/hn-online/serchpatient', 'views/index2.php');
GET('/hn-online/login', 'views/check_admin.php');


POST('/hn-online/frm_patient', 'views/check_cid.php');

POST('/hn-online/checkpatient', 'service/checkpatient.php');
POST('/hn-online/insertpatient', 'service/insertpatient.php');
POST('/hn-online/service_checklogin', 'service/service_checklogin.php');

POST('/hn-online/delete_patient', 'service/delete_patient.php');

GET('/hn-online/adduseradmin', 'views/adduseradmin.php');
POST('/hn-online/addUser', 'service/addUser.php');


if (!isset($_SESSION['loggedin'])) {
    header('Location: /hn-online/login');
    exit();
} else {
    GET('/hn-online/admin', 'views/admin.php');
    GET('/hn-online/logout', 'views/logout.php');
    GET('/hn-online/view.data', 'views/view.data.php');
    GET('/hn-online/delete.data', 'views/delete.data.php');
    
}


any('/404', 'views/error.php');
