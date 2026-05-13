<?php
// send_corporation_form.php

// Your receiving email
$to = "info@sivashiksha.com";
$subject = "New Corporation Form Submission - Siva Shiksha";

// Collect and sanitize input
$name         = htmlspecialchars($_POST['name'] ?? '');
$companyName  = htmlspecialchars($_POST['companyName'] ?? '');
$companyType  = htmlspecialchars($_POST['companyType'] ?? '');
$address      = htmlspecialchars($_POST['address'] ?? '');
$phone        = htmlspecialchars($_POST['phone'] ?? '');
$email        = htmlspecialchars($_POST['email'] ?? '');
$remarks      = htmlspecialchars($_POST['remarks'] ?? '');

// Validation
if (empty($name) || empty($companyName) || empty($companyType) || empty($address) || empty($phone) || empty($email)) {
    echo json_encode(["status" => "error", "message" => "Please fill all required fields."]);
    exit;
}

// Email content (HTML)
$message = "
<h3>New Corporation Form Submission</h3>
<p><strong>Name:</strong> {$name}</p>
<p><strong>Company Name:</strong> {$companyName}</p>
<p><strong>Company Type:</strong> {$companyType}</p>
<p><strong>Address:</strong> {$address}</p>
<p><strong>Phone:</strong> {$phone}</p>
<p><strong>Email:</strong> {$email}</p>
<p><strong>Remarks:</strong> {$remarks}</p>
";

// Headers
$headers  = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: no-reply@sivashiksha.com\r\n"; // ✅ safer for cPanel
$headers .= "Reply-To: {$email}\r\n";

// Send Email
if (mail($to, $subject, $message, $headers)) {
    echo json_encode(["status" => "success", "message" => "Thank you! Your form has been submitted successfully."]);
} else {
    echo json_encode(["status" => "error", "message" => "Failed to send email. Please try again later."]);
}
?>
