<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // دریافت داده‌ها از فرم
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    // آدرس ایمیل گیرنده
    $to = "tahaemami50@gmail.com"; // ایمیل خودتان را اینجا وارد کنید
    $subject = "پیام جدید از وبسایت EliteDev™";
    $headers = "From: " . $name . " <" . $email . ">\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-type: text/plain; charset=UTF-8\r\n";

    // بدنه ایمیل
    $email_body = "نام: " . $name . "\n";
    $email_body .= "ایمیل: " . $email . "\n\n";
    $email_body .= "پیام:\n" . $message . "\n";

    // ارسال ایمیل
    if (mail($to, $subject, $email_body, $headers)) {
        // اگر ایمیل با موفقیت ارسال شد
        header("Location: index.html?status=success#contact"); // به صفحه اصلی برگرد و پیام موفقیت نمایش بده
        exit;
    } else {
        // اگر ارسال ایمیل با مشکل مواجه شد
        header("Location: index.html?status=error#contact"); // به صفحه اصلی برگرد و پیام خطا نمایش بده
        exit;
    }
} else {
    // اگر کسی مستقیماً به این صفحه دسترسی پیدا کرد
    header("Location: index.html");
    exit;
}
?>