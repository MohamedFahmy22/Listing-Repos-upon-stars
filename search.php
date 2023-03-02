<?php
if (isset($_GET['per_page']) && isset($_GET['date']) && isset($_GET['language'])) {
    $per_page = $_GET['per_page'];
    $date = $_GET['date'];
    $language = $_GET['language'];

    // Build the GitHub API search URL based on the form inputs
    $url = "https://api.github.com/search/repositories?q=created:$date+language:$language&sort=stars&order=desc&per_page=$per_page";

    // Set up the HTTP headers for the request
    $headers = array(
        'User-Agent: PHP'
    );

    // Set up the cURL request
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

    // Send the request and decode the response JSON
    $response = curl_exec($curl);
    $repositories = json_decode($response)->items;

    // Check if any repositories were found
    if (count($repositories) > 0) {
        // Display the search results
        echo "<h2>Top $per_page repositories created from $date onwards, sorted by number of stars, for $language:</h2>";
        echo "<ol>";
        foreach ($repositories as $repo) {
            echo "<li><a href=\"$repo->html_url\" target=\"_blank\">$repo->name</a> - $repo->description ($repo->stargazers_count stars)</li>";
        }
        echo "</ol>";
    } else {
        // Display a message if no repositories were found
        echo "<p>No repositories found.</p>";
    }

    // Close the cURL request
    curl_close($curl);
}
?>
