

<?php
// List of clist_cid values
echo "mica";exit;
$clist_cid_list = [
    546, 547, 548 // Add more as needed
];

// Define the start and end dates
$start_date = '2024-09-08';
$end_date = '2024-09-30';

// Function to check if a date is a working day (Monday to Friday)
function isWorkingDay($date) {
    $dayOfWeek = date('N', strtotime($date));
    return $dayOfWeek < 6; // 1 = Monday, 7 = Sunday
}

// Function to generate working days within the date range
function getWorkingDays($start_date, $end_date) {
    $working_days = [];
    $current_date = strtotime($start_date);
    $end_date = strtotime($end_date);

    while ($current_date <= $end_date) {
        if (isWorkingDay(date('Y-m-d', $current_date))) {
            $working_days[] = date('d-m-Y', $current_date);
        }
        $current_date = strtotime("+1 day", $current_date);
    }
    return $working_days;
}

// Get the list of working days
$working_days = getWorkingDays($start_date, $end_date);

// Loop through each clist_cid and each working day
foreach ($clist_cid_list as $clist_cid) {
    foreach ($working_days as $date) {
        // Construct the URL with the current clist_cid and date
        $url = "https://dsjlahore.punjab.gov.pk/causelist?clist_cid=$clist_cid&clist_dated=$date&district=17";

        // Initialize a cURL session to retrieve the website content
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // Follow redirects
        $html = curl_exec($ch);
        curl_close($ch);

        // Check if the content was retrieved successfully
        if ($html === false) {
            echo "Failed to retrieve the data for clist_cid: $clist_cid on $date\n";
            continue;
        }

        // Save the HTML content to a file
        $file_name = "clist_cid_$clist_cid" . "_date_$date.html";
        file_put_contents("downloaded_data/$file_name", $html);
        echo "Downloaded data for clist_cid: $clist_cid on $date\n";
    }
}

echo "Scraping and downloading complete!\n";
?>

