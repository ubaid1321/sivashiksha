<?php
// Allow only POST requests
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    echo json_encode(["status" => "error", "message" => "Invalid request method."]);
    exit;
}

// Prevent caching and ensure JSON response
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');

// Retrieve form data safely
$name     = isset($_POST['name']) ? htmlspecialchars(trim($_POST['name'])) : '';
$company  = isset($_POST['company']) ? htmlspecialchars(trim($_POST['company'])) : '';
$website  = isset($_POST['website']) ? htmlspecialchars(trim($_POST['website'])) : '';
$email    = isset($_POST['email']) ? htmlspecialchars(trim($_POST['email'])) : '';
$phone    = isset($_POST['phone']) ? htmlspecialchars(trim($_POST['phone'])) : '';
$message  = isset($_POST['message']) ? htmlspecialchars(trim($_POST['message'])) : '';

// Validate required fields
if (empty($name) || empty($email) || empty($message)) {
    http_response_code(400);
    echo json_encode(["status" => "error", "message" => "Please fill out all required fields."]);
    exit;
}

// Email setup
$to = "info@sivashiksha.com";  // ✅ Change this to your recipient email
$subject = "New Contact Form Submission from $name";
$body = "
Name: $name
Company: $company
Website: $website
Email: $email
Phone: $phone

Message:
$message
";
$headers = "From: $name <$email>\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

// Send email
if (mail($to, $subject, $body, $headers)) {
    echo json_encode(["status" => "success", "message" => "✅ Thank you! Your message has been sent."]);
} else {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Sorry, we couldn’t send your message."]);
}
?>
