<?php
// 加載 PHPMailer 類
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; 

$mail = new PHPMailer(true); // 建立 PHPMailer 物件

try {
    // 伺服器設定
    $mail->isSMTP();                                      // 使用 SMTP
    $mail->Host       = 'smtp.gmail.com';                 // 設置 Gmail 的 SMTP 伺服器
    $mail->SMTPAuth   = true;                             // 啟用 SMTP 驗證
    $mail->Username   = 'your_email@gmail.com';           // Gmail 郵箱地址
    $mail->Password   = 'your_password_or_app_password';  // 郵箱密碼或應用專用密碼
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;   // 啟用 TLS 加密
    $mail->Port       = 587;                              // SMTP 端口（TLS 使用 587）

    // 設置郵件編碼為 UTF-8
    $mail->CharSet = 'UTF-8';                             // 設置字符集，防止中文亂碼

    // 收件人
    $mail->setFrom('your_email@gmail.com', '發件人姓名'); // 發件人地址和名稱
    $mail->addAddress('recipient@example.com', '收件人姓名'); // 添加收件人

    // 內容
    $mail->isHTML(true);                                  // 設置郵件格式為 HTML
    $mail->Subject = '測試郵件';                          // 郵件主題
    $mail->Body    = '這是一封 <b>測試郵件</b>，內含中文內容！'; // 郵件正文（HTML）
    $mail->AltBody = '這是純文字版本的郵件內容';         // 純文字正文，適用於不支援 HTML 的客戶端

    // 發送郵件
    $mail->send();
    echo '郵件已成功發送';
} catch (Exception $e) {
    echo "郵件發送失敗: {$mail->ErrorInfo}";
}
?>