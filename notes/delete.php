<?php
include "../connect.php";
include "../zon.php";
$id  = filterRequest("id");
$stsm = $con->prepare("Delete FROM `notes` WHERE `id` = ?");
$stsm->execute(array($id));
$nameimage  = filterRequest("image");

$count = $stsm->rowCount();
if ($count > 0) {
    $delet = deletefile("../upload",$nameimage);
    // نجاح تسجيل الدخول
    echo json_encode(array('success' => true, 'message' => 'تم تسجيل الدخول بنجاح.',));
} else {
    // فشل تسجيل الدخول
    echo json_encode(array('success' => false, 'message' => 'فشل تسجيل الدخول. الرجاء التحقق من اسم المستخدم وكلمة المرور.'));
}