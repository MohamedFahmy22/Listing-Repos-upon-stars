<!DOCTYPE html>
<html>
<head>
	<title>GitHub Repository Search</title>
</head>
<body>
	<h1>GitHub Repository Search</h1>
	<form method="get" action="search.php">
		<label for="per_page">Repositories to display:</label>
		<select id="per_page" name="per_page">
			<option value="10">10</option>
			<option value="50">50</option>
			<option value="100">100</option>
		</select><br><br>
		<label for="date">From date:</label>
		<input type="date" id="date" name="date"><br><br>
		<label for="language">Programming language:</label>
		<input type="text" id="language" name="language"><br><br>
		<input type="submit" value="Search">
	</form>

	<?php
		if (isset($_GET['per_page']) && isset($_GET['date']) && isset($_GET['language'])) {
			$per_page = $_GET['per_page'];
			$date = $_GET['date'];
			$language = $_GET['language'];
			$url = "https://api.github.com/search/repositories?q=created:$date+language:$language&sort=stars&order=desc&per_page=$per_page";
			$options = array(
				'http' => array(
					'method' => 'GET',
					'header' => 'User-Agent: PHP'
				)
			);
			$context = stream_context_create($options);
			$response = file_get_contents($url, false, $context);
			if ($response) {
				$repositories = json_decode($response)->items;
				if (count($repositories) > 0) {
					echo "<h2>Top $per_page repositories created from $date onwards, sorted by number of stars, for $language:</h2>";
					echo "<ol>";
					foreach ($repositories as $repo) {
						echo "<li><a href=\"$repo->html_url\" target=\"_blank\">$repo->name</a> - $repo->description ($repo->stargazers_count stars)</li>";
					}
					echo "</ol>";
				} else {
					echo "<p>No repositories found.</p>";
				}
			} else {
				echo "<p>Error retrieving data from GitHub API.</p>";
			}
		}
	?>
</body>
</html>
