<?php
include'db.php';
$id=$_POST['id'];
$repo_id=$_POST['repo_id'];
$repo_name=$_POST['repo_name'];
$repo_description=$_POST['repo_description'];
$repo_url=$_POST['repo_url'];
$repo_number_of_stars=$_POST['repo_number_of_stars'];
$repo_created_date=$_POST['repo_created_date'];
$repo_last_push_date=$_POST['repo_last_push_date'];

$query="UPDATE `repositories` SET `repository_id`='$repo_id',`repository_name`='$repo_name',`repository_url`='$repo_url',`repository_created_date`='$repo_created_date',`repository_last_push_date`='$repo_last_push_date',`repository_description`='$repo_description',`number_of_stars`='$repo_number_of_stars' WHERE `id`='$id'";
$result=mysqli_query($conn,$query);
if($result)
{
	
	header('location:repoList.php');
}
else{

}
?>