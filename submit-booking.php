<?php

declare(strict_types=1);

function redirectToBooking(string $status): never
{
    header(
        "Location: index.php?status=" .
        urlencode($status) .
        "#booking"
    );

    exit;
}


if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit;
}


require_once __DIR__ . "/config/database.php";


$fullName = trim($_POST["full_name"] ?? "");
$phone = trim($_POST["phone"] ?? "");
$email = trim($_POST["email"] ?? "");
$sport = trim($_POST["sport"] ?? "");
$bookingDate = trim($_POST["booking_date"] ?? "");
$timeSlot = trim($_POST["time_slot"] ?? "");
$message = trim($_POST["message"] ?? "");

$players = filter_var(
    $_POST["players"] ?? null,
    FILTER_VALIDATE_INT,
    [
        "options" => [
            "min_range" => 1,
            "max_range" => 50
        ]
    ]
);


$allowedSports = [
    "Football",
    "Cricket",
    "Badminton",
    "Basketball"
];

$allowedTimeSlots = [
    "08:00 AM - 10:00 AM",
    "10:00 AM - 12:00 PM",
    "03:00 PM - 05:00 PM",
    "05:00 PM - 07:00 PM",
    "07:00 PM - 09:00 PM"
];


$cleanedPhone = preg_replace(
    "/[\s\-()]/",
    "",
    $phone
);


$validName =
    $fullName !== "" &&
    mb_strlen($fullName) >= 2 &&
    mb_strlen($fullName) <= 100;

$validPhone =
    is_string($cleanedPhone) &&
    preg_match(
        "/^(?:\+?88)?01[3-9]\d{8}$/",
        $cleanedPhone
    );

$validEmail =
    filter_var($email, FILTER_VALIDATE_EMAIL) !== false &&
    mb_strlen($email) <= 150;

$validSport = in_array(
    $sport,
    $allowedSports,
    true
);

$validTimeSlot = in_array(
    $timeSlot,
    $allowedTimeSlots,
    true
);

$validMessage = mb_strlen($message) <= 1000;


$dhakaTimezone = new DateTimeZone("Asia/Dhaka");

$selectedDate = DateTime::createFromFormat(
    "!Y-m-d",
    $bookingDate,
    $dhakaTimezone
);

$today = new DateTime(
    "today",
    $dhakaTimezone
);

$validDate =
    $selectedDate !== false &&
    $selectedDate->format("Y-m-d") === $bookingDate &&
    $selectedDate >= $today;


if (
    !$validName ||
    !$validPhone ||
    !$validEmail ||
    !$validSport ||
    $players === false ||
    !$validDate ||
    !$validTimeSlot ||
    !$validMessage
) {
    redirectToBooking("error");
}


try {
    $statement = $conn->prepare(
        "INSERT INTO bookings (
            full_name,
            phone,
            email,
            sport,
            players,
            booking_date,
            time_slot,
            message
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?)"
    );

    $statement->bind_param(
        "ssssisss",
        $fullName,
        $cleanedPhone,
        $email,
        $sport,
        $players,
        $bookingDate,
        $timeSlot,
        $message
    );

    $statement->execute();

    $statement->close();
    $conn->close();

    redirectToBooking("success");

} catch (mysqli_sql_exception $exception) {
    error_log(
        "Booking submission error: " .
        $exception->getMessage()
    );

    redirectToBooking("error");
}