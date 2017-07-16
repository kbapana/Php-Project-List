## Popular PHP Repositories on GitHub 
---
###Assessment Details:
> Popular PHP Repositories on GitHub Using PHP and MySQL, complete the following: 
> * QUOTE Popular PHP Repositories on GitHub Using PHP and MySQL, complete the following: Use the GitHub API to retrieve the most starred public PHP projects. Store the list of repositories in a MySQL table. The table must contain the repository ID, name, URL, created date, last push date, description, and number of stars.
> * This process should also be able to update existing project details. Using the data in the table created in step 1, create an interface that displays a list of the GitHub repositories and allows the user to click through to view details on each one. Be sure to include all of the fields in step 1 – displayed in either the list or detailed view.
> * blockquote Create a README file with a description of your architecture and notes on installation of your application. You are free to use any PHP, JavaScript, or CSS frameworks as you see fit. 

## Project Architecture:

### Requirements:
>
* Apache or NGINX web server
* PHP 5.4.0 or newer
* Bootstrap
* Javascript

## Technologies Used:
> 
* PHP 
* MySQL 
* Bootstrap 
* Javascript


 
* ** Step 1 : CREATE DATABASE** 

``` 
CREATE DATABASE repositories;
```
```
CREATE TABLE IF NOT EXISTS `repositories`.`repositories` ( `id` INT AUTO_INCREMENT , ` repository_id` VARCHAR(255) NOT NULL , ` repository_name` VARCHAR(255) NOT NULL , `repository_url` VARCHAR(255) NOT NULL , ` repository_created_date` VARCHAR(255) NOT NULL , `repository_last_push_date` VARCHAR(255) NOT NULL , ` repository_description` VARCHAR(255) NOT NULL , ` number_of_stars` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`) ) ENGINE = InnoDB;
 ```

* ** Step 2 : Create Connection File**
 
```
$servername = "servaername"; 
$username = "username"; // database username 
$password = "password"; //database password 
$database = "repositories";

$conn = new mysqli($servername, $username, $password,$database);
 if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error);
 }
```
* **Step3 : Store Data in DB** 
Get the data from git hub Search api accoding to score or star or created date as you wish for only PHP Useful links from the GitHub API 
documentation: 
[https://developer.github.com/v3/](https://developer.github.com/v3/) 
[https://developer.github.com/v3/search/](https://developer.github.com/v3/search/) 
and store data into our table 


OR


```
require_once('db.php');
 $opts = [ 'http' => [ 'method' => 'GET', 'header' => [ 'User-Agent: PHP' ] ] ]; 
$context = stream_context_create($opts); 
for ($k=1; $k <=10; $k++) { $data = file_get_contents("https://api.github.com/search/repositories?q=language:php&page='$k'&per_page=100", false, $context); 
if($data){ $data=json_decode($data,true);
 $data=$data['items']; 
for($i=0;$i" . mysqli_error($conn); 
$name=$data[$i]['name']; 
$id=$data[$i]['id']; 
$url=$data[$i]['html_url']; 
$description=$data[$i]['description'];
 $created_at=$data[$i]['created_at']; 
$updated_at=$data[$i]['updated_at']; 
$star=$data[$i]['watchers_count']; 
$sqll=mysqli_query($conn,"SELECT * FROM `repositories` WHERE `repository_id`='$id'"); 
$num=mysqli_num_rows($sqll);

if($num==0)
 { 
$query="INSERT INTO `repositories`(`repository_id`, `repository_name`, `repository_url`, `repository_created_date`, `repository_last_push_date`, `repository_description`, `number_of_stars`) VALUES ('$id','$name','$url','$created_at','$updated_at','$description','$star')"; if (mysqli_query($conn, $query)) { echo "New record created successfully"; } else { echo "Error: " . $sql . "  
" . mysqli_error($conn); } 
 }
else
    { 
        echo "Project Already Available in Database"; 
    } 
   } 
  } 
} 
mysqli_close($conn);
```

* **Step 4 : Fetch Data From DB**

``` 
require_once('db.php'); 
$repo="SELECT * FROM `repositories`";
$repo_query=mysqli_query($conn,$repo);
while($result=mysqli_fetch_assoc($repo_query)):

PUT $result ARRAY DATA IN Your TABLE

endwhile;
```


![Data In Table Like This ](https://preview.ibb.co/jEC6Cv/Fire_Shot_Capture_4_List_Of_Git_Hub_Repository_http_198_199_73_246_php_repo_List_php.png)