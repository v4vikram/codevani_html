<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = htmlspecialchars(trim($_POST['name'] ?? ''));
  $email = htmlspecialchars(trim($_POST['email'] ?? ''));
  $phone = htmlspecialchars(trim($_POST['phone'] ?? ''));
  $message = htmlspecialchars(trim($_POST['message'] ?? ''));

  // Validate required fields
  if (empty($name) || empty($email) || empty($phone)) {
    echo "Please fill all required fields.";
    exit;
  }

  // You can store this data or send it via email
  // Example: Send email
  $to = "sales@codevani.com, v4vikram.dev@gmail.com";

  $subject = "New Contact Message from $name";
  $body = "Name: $name\nEmail: $email\nPhone: $phone\nMessage: $message";
  $headers = "From: $email";

  if (mail($to, $subject, $body, $headers)) {
    echo "Thank you! Your message has been sent successfully.";
  } else {
    echo "Failed to send message. Please try again later.";
  }
}
?>