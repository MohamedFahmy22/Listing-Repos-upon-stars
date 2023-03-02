# GithubApi

GitHub Repository Search
This is a simple PHP application that searches for GitHub repositories based on certain criteria, such as language and creation date.

Installation
To run this application, you will need to have PHP installed on your computer. You can download the latest version of PHP from the official website.

Once you have PHP installed, you can clone this repository to your local machine:
 {{{{{  git clone https://github.com/your-username/github-repo-search.git }}}}
 
 Next, navigate to the project directory:

cd github-repo-search

Usage
To use the application, you can open the index.php file in your web browser. This will display a simple form that allows you to search for GitHub repositories based on certain criteria.

To test the PHP code, you can run the built-in PHP web server by running the following command:

php -S localhost:8000

Testing
To test the PHP code, you can use the built-in PHPUnit testing framework. First, you will need to install PHPUnit using Composer. If you don't have Composer installed, you can download it from the official website.

Next, navigate to the project directory and install the required dependencies:

cd github-repo-search
composer install

GitHub Repository Search
This is a simple PHP script that searches for GitHub repositories based on date and programming language.

Requirements
PHP 7.0 or later
cURL extension for PHP
Usage
To use the script, simply fill out the search form on the search.php page with the desired search criteria. The script will then display a list of the top repositories based on the number of stars.

Example Code

// Set the search parameters
$per_page = 10; // Number of results to return
$date = '2022-01-01'; // Date from which to search for repositories
$language = 'php'; // Programming language to search for

// Build the GitHub API search URL based on the search parameters
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

// Display the repository names and number of stars
foreach ($repositories as $repo) {
    echo "$repo->name ($repo->stargazers_count stars)<br>";
}

// Close the cURL request
curl_close($curl);

This code demonstrates how to use cURL to send a request to the GitHub API and retrieve a list of repositories based on the search parameters. It then displays the names and number of stars for each repository in the list.

Note that this is just an example, and you will need to customize the code to suit your specific needs.


![image](https://user-images.githubusercontent.com/40919489/222575286-431250ee-e1f6-4f10-b659-475d41751726.png)
![image](https://user-images.githubusercontent.com/40919489/222575407-484f3307-0bf0-4e7d-ae1b-c14a8cc09d6d.png)



