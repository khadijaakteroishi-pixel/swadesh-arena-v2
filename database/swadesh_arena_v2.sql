CREATE DATABASE IF NOT EXISTS swadesh_arena_v2
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE swadesh_arena_v2;

CREATE TABLE IF NOT EXISTS bookings (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,

    full_name VARCHAR(100) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    email VARCHAR(150) NOT NULL,

    sport VARCHAR(50) NOT NULL,
    players INT UNSIGNED NOT NULL,

    booking_date DATE NOT NULL,
    time_slot VARCHAR(50) NOT NULL,

    message TEXT NULL,

    status ENUM(
        'Pending',
        'Confirmed',
        'Cancelled'
    ) NOT NULL DEFAULT 'Pending',

    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,

    INDEX idx_booking_date (booking_date),
    INDEX idx_sport (sport),
    INDEX idx_status (status)
);