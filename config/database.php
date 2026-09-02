<?php

declare(strict_types=1);

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$dbHost = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "swadesh_arena_v2";

try {
    $conn = new mysqli(
        $dbHost,
        $dbUser,
        $dbPassword,
        $dbName
    );

    $conn->set_charset("utf8mb4");
} catch (mysqli_sql_exception $exception) {
    error_log(
        "Database connection error: " .
        $exception->getMessage()
    );

    http_response_code(500);

    exit(
        "Database connection failed. Please try again later."
    );
}