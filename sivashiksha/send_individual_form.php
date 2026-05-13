<?php


$to = "info@sivashiksha.com";
$subject = "New Individual Form Submission - Siva Shiksha";

// Sanitize and collect form inputs
$name     = htmlspecialchars($_POST['name'] ?? '');
$address  = htmlspecialchars($_POST['address'] ?? '');
$phone    = htmlspecialchars($_POST['phone'] ?? '');
$email    = htmlspecialchars($_POST['email'] ?? '');
$remarks  = htmlspecialchars($_POST['remarks'] ?? '');

// Validate required fields
if (empty($name) || empty($address) || empty($phone) || empty($email)) {
    echo json_encode(["status" => "error", "message" => "Please fill all required fields."]);
    exit;
}

// Email content
$message = "
<h3>New Individual Contribution Form Submission</h3>
<p><strong>Name:</strong> {$name}</p>
<p><strong>Address:</strong> {$address}</p>
<p><strong>Phone:</strong> {$phone}</p>
<p><strong>Email:</strong> {$email}</p>
<p><strong>Remarks:</strong> {$remarks}</p>
";

// Email headers
$headers  = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: {$name} <{$email}>" . "\r\n";

// Send mail
if (mail($to, $subject, $message, $headers)) {
    echo json_encode(["status" => "success", "message" => "Thank you! Your form has been submitted successfully."]);
} else {
    echo json_encode(["status" => "error", "message" => "Failed to send email. Please try again later."]);
}
?>
