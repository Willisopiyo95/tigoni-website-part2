<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $fname = $_POST["fname"];
    $email = $_POST["email"];
    $department = $_POST["department"];
    $doctor = $_POST["doctor"];
    $date = $_POST["date"];
    $phone = $_POST["phone"];

    // Validate form data (you can add more validation as needed)
    if (empty($fname) || empty($email) || empty($department) || empty($doctor) || empty($date) || empty($phone)) {
        echo "Please fill out all fields.";
        exit;
    }

    // Further validation can be added for email format, phone number format, etc.

    // Format the message
    $message = "Name: $fname\nEmail: $email\nService: $department\nTime of Day: $doctor\nDate: $date\nPhone Number: $phone";

    // Send email
    $to = "willisopiyo95@gmail.com"; // Change this to your email address
    $subject = "New Appointment";
    $headers = "From: $email"; // Set the "From" header to the user's email address

    if (mail($to, $subject, $message, $headers)) {
        echo "Appointment booked successfully! An email has been sent.";
    } else {
        echo "Failed to send email. Please try again later.";
    }
} else {
    // If the form is not submitted via POST method, show an error message
    echo "Invalid request.";
}
?>
