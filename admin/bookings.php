<?php

declare(strict_types=1);

require_once __DIR__ . "/../config/database.php";


function escape(string|int|null $value): string
{
    return htmlspecialchars(
        (string) $value,
        ENT_QUOTES,
        "UTF-8"
    );
}


function formatBookingDate(string $date): string
{
    $dateObject = DateTime::createFromFormat(
        "Y-m-d",
        $date
    );

    if ($dateObject === false) {
        return escape($date);
    }

    return $dateObject->format("d M Y");
}


$bookings = [];

$statistics = [
    "total" => 0,
    "pending" => 0,
    "confirmed" => 0,
    "cancelled" => 0
];


try {
    $result = $conn->query(
        "SELECT
            id,
            full_name,
            phone,
            email,
            sport,
            players,
            booking_date,
            time_slot,
            message,
            status,
            created_at
        FROM bookings
        ORDER BY created_at DESC"
    );

    while ($row = $result->fetch_assoc()) {
        $bookings[] = $row;

        $statistics["total"]++;

        $statusKey = strtolower($row["status"]);

        if (array_key_exists($statusKey, $statistics)) {
            $statistics[$statusKey]++;
        }
    }

} catch (mysqli_sql_exception $exception) {
    error_log(
        "Admin booking page error: " .
        $exception->getMessage()
    );
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Booking Dashboard | Swadesh Arena Demo</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect"
          href="https://fonts.gstatic.com"
          crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Oswald:wght@500;600;700&display=swap"
        rel="stylesheet"
    >

    <style>
        :root {
            --green: #b9f227;
            --green-dark: #7fa610;
            --dark: #07110d;
            --dark-soft: #102019;
            --white: #ffffff;
            --page: #f2f5f2;
            --text: #18231e;
            --muted: #6a756e;
            --border: #dbe2dd;
            --pending: #9b6900;
            --confirmed: #08794b;
            --cancelled: #b23434;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            color: var(--text);
            background: var(--page);
            font-family: "Manrope", Arial, sans-serif;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        button,
        input,
        select {
            font: inherit;
        }

        .container {
            width: min(1400px, calc(100% - 40px));
            margin-inline: auto;
        }

        .admin-header {
            color: var(--white);
            background: var(--dark);
        }

        .header-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            min-height: 82px;
            gap: 20px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand-mark {
            display: grid;
            width: 45px;
            height: 45px;
            border-radius: 50%;
            color: var(--dark);
            background: var(--green);
            font-family: "Oswald", sans-serif;
            font-weight: 700;
            place-items: center;
        }

        .brand-text strong,
        .brand-text small {
            display: block;
        }

        .brand-text strong {
            font-family: "Oswald", sans-serif;
            letter-spacing: 2px;
        }

        .brand-text small {
            margin-top: 3px;
            color: var(--green);
            font-size: 0.62rem;
            font-weight: 800;
            letter-spacing: 4px;
        }

        .website-link {
            padding: 11px 18px;
            border: 1px solid rgba(255, 255, 255, 0.25);
            border-radius: 6px;
            font-size: 0.76rem;
            font-weight: 800;
            text-transform: uppercase;
            transition: 0.3s ease;
        }

        .website-link:hover {
            color: var(--dark);
            border-color: var(--green);
            background: var(--green);
        }

        .dashboard {
            padding: 55px 0 80px;
        }

        .page-heading {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            margin-bottom: 32px;
            gap: 25px;
        }

        .eyebrow {
            margin-bottom: 6px;
            color: var(--green-dark);
            font-size: 0.72rem;
            font-weight: 800;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        h1 {
            color: var(--dark);
            font-family: "Oswald", sans-serif;
            font-size: clamp(2.2rem, 5vw, 4rem);
            line-height: 1;
            text-transform: uppercase;
        }

        .demo-warning {
            max-width: 390px;
            color: var(--muted);
            font-size: 0.76rem;
            text-align: right;
        }

        .statistics {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
            margin-bottom: 28px;
        }

        .stat-card {
            padding: 25px;
            border: 1px solid var(--border);
            border-radius: 14px;
            background: var(--white);
        }

        .stat-card span {
            display: block;
            margin-bottom: 8px;
            color: var(--muted);
            font-size: 0.7rem;
            font-weight: 800;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .stat-card strong {
            color: var(--dark);
            font-family: "Oswald", sans-serif;
            font-size: 2.2rem;
        }

        .stat-card.highlight {
            border-color: var(--green);
            background: var(--green);
        }

        .filters {
            display: grid;
            grid-template-columns: 1fr 220px;
            gap: 14px;
            padding: 18px;
            border: 1px solid var(--border);
            border-bottom: none;
            border-radius: 14px 14px 0 0;
            background: var(--white);
        }

        .filters input,
        .filters select {
            width: 100%;
            height: 46px;
            padding: 0 14px;
            border: 1px solid var(--border);
            border-radius: 7px;
            outline: none;
            background: #fafcfa;
        }

        .filters input:focus,
        .filters select:focus {
            border-color: var(--green-dark);
            box-shadow: 0 0 0 4px rgba(185, 242, 39, 0.16);
        }

        .table-wrapper {
            overflow-x: auto;
            border: 1px solid var(--border);
            border-radius: 0 0 14px 14px;
            background: var(--white);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            white-space: nowrap;
        }

        th,
        td {
            padding: 17px 15px;
            border-bottom: 1px solid var(--border);
            text-align: left;
            vertical-align: top;
        }

        th {
            color: var(--muted);
            background: #f8faf8;
            font-size: 0.68rem;
            font-weight: 800;
            letter-spacing: 0.6px;
            text-transform: uppercase;
        }

        td {
            font-size: 0.77rem;
        }

        tbody tr:hover {
            background: #fbfdf8;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .booking-id {
            color: var(--green-dark);
            font-weight: 800;
        }

        .customer-name {
            display: block;
            color: var(--dark);
            font-weight: 800;
        }

        .customer-email,
        .secondary-text {
            display: block;
            margin-top: 3px;
            color: var(--muted);
            font-size: 0.7rem;
        }

        .message-cell {
            max-width: 220px;
            white-space: normal;
        }

        .status {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 6px 11px;
            border-radius: 20px;
            font-size: 0.65rem;
            font-weight: 800;
            text-transform: uppercase;
        }

        .status.pending {
            color: var(--pending);
            background: #fff4cf;
        }

        .status.confirmed {
            color: var(--confirmed);
            background: #dcf7ea;
        }

        .status.cancelled {
            color: var(--cancelled);
            background: #ffe4e4;
        }

        .empty-state {
            padding: 70px 25px;
            text-align: center;
        }

        .empty-state strong {
            display: block;
            color: var(--dark);
            font-family: "Oswald", sans-serif;
            font-size: 1.7rem;
            text-transform: uppercase;
        }

        .empty-state p {
            margin-top: 7px;
            color: var(--muted);
            font-size: 0.82rem;
        }

        .hidden-row {
            display: none;
        }

        @media (max-width: 900px) {
            .statistics {
                grid-template-columns: repeat(2, 1fr);
            }

            .page-heading {
                align-items: flex-start;
                flex-direction: column;
            }

            .demo-warning {
                text-align: left;
            }
        }

        @media (max-width: 600px) {
            .container {
                width: min(100% - 24px, 1400px);
            }

            .header-content {
                min-height: 72px;
            }

            .brand-text {
                display: none;
            }

            .dashboard {
                padding-top: 40px;
            }

            .statistics {
                grid-template-columns: 1fr 1fr;
                gap: 10px;
            }

            .stat-card {
                padding: 18px;
            }

            .filters {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

<header class="admin-header">
    <div class="container header-content">

        <a href="../index.php" class="brand">
            <span class="brand-mark">SA</span>

            <span class="brand-text">
                <strong>SWADESH</strong>
                <small>ARENA</small>
            </span>
        </a>

        <a href="../index.php" class="website-link">
            View Website
        </a>

    </div>
</header>


<main class="dashboard">
    <div class="container">

        <div class="page-heading">
            <div>
                <p class="eyebrow">Administration</p>
                <h1>Booking Dashboard</h1>
            </div>

            <p class="demo-warning">
                This is an educational demonstration dashboard.
                Authentication must be added before production use.
            </p>
        </div>


        <section class="statistics">

            <article class="stat-card highlight">
                <span>Total requests</span>
                <strong><?= escape($statistics["total"]) ?></strong>
            </article>

            <article class="stat-card">
                <span>Pending</span>
                <strong><?= escape($statistics["pending"]) ?></strong>
            </article>

            <article class="stat-card">
                <span>Confirmed</span>
                <strong><?= escape($statistics["confirmed"]) ?></strong>
            </article>

            <article class="stat-card">
                <span>Cancelled</span>
                <strong><?= escape($statistics["cancelled"]) ?></strong>
            </article>

        </section>


        <section class="booking-list">

            <div class="filters">
                <input
                    type="search"
                    id="bookingSearch"
                    placeholder="Search name, phone, email or sport..."
                >

                <select id="statusFilter">
                    <option value="all">All statuses</option>
                    <option value="pending">Pending</option>
                    <option value="confirmed">Confirmed</option>
                    <option value="cancelled">Cancelled</option>
                </select>
            </div>


            <div class="table-wrapper">

                <?php if (count($bookings) > 0): ?>

                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Customer</th>
                                <th>Phone</th>
                                <th>Sport</th>
                                <th>Players</th>
                                <th>Booking schedule</th>
                                <th>Message</th>
                                <th>Status</th>
                                <th>Submitted</th>
                            </tr>
                        </thead>

                        <tbody id="bookingTableBody">

                        <?php foreach ($bookings as $booking): ?>

                            <?php
                            $searchText = strtolower(
                                $booking["full_name"] . " " .
                                $booking["phone"] . " " .
                                $booking["email"] . " " .
                                $booking["sport"]
                            );

                            $statusClass = strtolower(
                                $booking["status"]
                            );
                            ?>

                            <tr
                                data-search="<?= escape($searchText) ?>"
                                data-status="<?= escape($statusClass) ?>"
                            >
                                <td>
                                    <span class="booking-id">
                                        #<?= escape($booking["id"]) ?>
                                    </span>
                                </td>

                                <td>
                                    <span class="customer-name">
                                        <?= escape($booking["full_name"]) ?>
                                    </span>

                                    <span class="customer-email">
                                        <?= escape($booking["email"]) ?>
                                    </span>
                                </td>

                                <td>
                                    <?= escape($booking["phone"]) ?>
                                </td>

                                <td>
                                    <?= escape($booking["sport"]) ?>
                                </td>

                                <td>
                                    <?= escape($booking["players"]) ?>
                                </td>

                                <td>
                                    <?= formatBookingDate(
                                        $booking["booking_date"]
                                    ) ?>

                                    <span class="secondary-text">
                                        <?= escape($booking["time_slot"]) ?>
                                    </span>
                                </td>

                                <td class="message-cell">
                                    <?= escape(
                                        $booking["message"] ?: "—"
                                    ) ?>
                                </td>

                                <td>
                                    <span class="status <?= escape($statusClass) ?>">
                                        <?= escape($booking["status"]) ?>
                                    </span>
                                </td>

                                <td>
                                    <?= escape($booking["created_at"]) ?>
                                </td>
                            </tr>

                        <?php endforeach; ?>

                        </tbody>
                    </table>

                <?php else: ?>

                    <div class="empty-state">
                        <strong>No booking requests yet</strong>

                        <p>
                            Submitted booking requests will appear here.
                        </p>
                    </div>

                <?php endif; ?>

            </div>
        </section>

    </div>
</main>


<script>
    const searchInput =
        document.getElementById("bookingSearch");

    const statusFilter =
        document.getElementById("statusFilter");

    const bookingRows =
        document.querySelectorAll("#bookingTableBody tr");


    function filterBookings() {
        const searchValue =
            searchInput.value.toLowerCase().trim();

        const statusValue =
            statusFilter.value;

        bookingRows.forEach((row) => {
            const rowSearchText = row.dataset.search;
            const rowStatus = row.dataset.status;

            const matchesSearch =
                rowSearchText.includes(searchValue);

            const matchesStatus =
                statusValue === "all" ||
                rowStatus === statusValue;

            row.classList.toggle(
                "hidden-row",
                !(matchesSearch && matchesStatus)
            );
        });
    }


    searchInput.addEventListener(
        "input",
        filterBookings
    );

    statusFilter.addEventListener(
        "change",
        filterBookings
    );
</script>

</body>
</html>