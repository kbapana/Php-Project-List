<?php

require_once('db.php');
$opts = [
    'http' => [
        'method' => 'GET',
        'header' => [
            'User-Agent: PHP'
        ]
    ]
];

$context = stream_context_create($opts);
for ($k=1; $k <=10; $k++) { 

$data = file_get_contents("https://api.github.com/search/repositories?q=language:php&page='$k'&per_page=100", false, $context);

if($data){
    $data=json_decode($data,true);
    $data=$data['items'];
  
    for($i=0;$i<count($data);$i++)
    {
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
            $query="INSERT INTO `repositories`(`repository_id`, `repository_name`, `repository_url`, `repository_created_date`, `repository_last_push_date`, `repository_description`, `number_of_stars`) VALUES ('$id','$name','$url','$created_at','$updated_at','$description','$star')";
            if (mysqli_query($conn, $query)) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }

           

            //echo '<br>';
        }
		else{
			echo "Project Already Available in Database";
		}
    }
 }   

}
 mysqli_close($conn);




?>