<?php
// deploy.php
$secret = 'trinhdev-hash-token'; // Thêm mã bí mật để bảo vệ webhook
$signature = $_SERVER['HTTP_X_HUB_SIGNATURE'];

// Xác thực chữ ký
$payload = file_get_contents('php://input');
if ('sha1=' . hash_hmac('sha1', $payload, $secret) === $signature) {
    shell_exec('../deploy.sh');  // Gọi script deploy
    echo "Deploy completed: \n" . $output;
    http_response_code(200);
} else {
    http_response_code(403);
}
