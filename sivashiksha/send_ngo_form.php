<?php
// send_ngo_form.php

// Your recipient email
$to = "info@sivashiksha.com";
$subject = "New NGO Form Submission - Siva Shiksha";

// Sanitize and collect form data
$name        = htmlspecialchars($_POST['name'] ?? '');
$companyName = htmlspecialchars($_POST['companyName'] ?? '');
$address     = htmlspecialchars($_POST['address'] ?? '');
$phone       = htmlspecialchars($_POST['phone'] ?? '');
$email       = htmlspecialchars($_POST['email'] ?? '');
$remarks     = htmlspecialchars($_POST['remarks'] ?? '');

// Validate required fields
if (empty($name) || empty($companyName) || empty($address) || empty($phone) || empty($email)) {
    echo json_encode(["status" => "error", "message" => "Please fill all required fields."]);
    exit;
}

// Build email message (HTML format)
$message = "
<h3>New NGO Form Submission</h3>
<p><strong>Name:</strong> {$name}</p>
<p><strong>Company Name:</strong> {$companyName}</p>
<p><strong>Address:</strong> {$address}</p>
<p><strong>Phone:</strong> {$phone}</p>
<p><strong>Email:</strong> {$email}</p>
<p><strong>Remarks:</strong> {$remarks}</p>
";

// Set headers (cPanel-friendly)
$headers  = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: no-reply@sivashiksha.com\r\n"; // ✅ safer for cPanel mail()
$headers .= "Reply-To: {$email}\r\n";

// Send email
if (mail($to, $subject, $message, $headers)) {
    echo json_encode(["status" => "success", "message" => "Thank you! Your form has been submitted successfully."]);
} else {
    echo json_encode(["status" => "error", "message" => "Failed to send email. Please try again later."]);
}
?>
