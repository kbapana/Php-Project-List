<!DOCTYPE html>
<html lang="en">
<head>
    <title>List Of Git Hub Repository</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row">

        <form role="form" action="repo_update.php" method="post">
			<?php
	
	            require_once('db.php');

            if(isset($_GET['uid']))
            {
            $id=$_GET['uid'];
            $query="SELECT * from `repositories` where id='$id'";

            $row=mysqli_query($conn,$query);
            $result=mysqli_fetch_assoc($row);


            ?>

            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h2 class="text-center">Update Repository</h2>
                        <br><br><br>
                        <input type="hidden" name="id" value="<?php echo $result['id']?>">
                        <label class="col-md-4 col-form-label">Repository ID</label>
                        <div class="form-group input-group col-md-6" >

                            <input type="text" name="repo_id" readonly="readonly" class="form-control" value="<?php  echo $result['repository_id']?>">
                        </div>

                        <label class="col-md-4 col-form-label">Name</label>
                        <div class="form-group input-group col-md-6" >
                            <input type="text" class="form-control" name="repo_name" value="<?php echo $result['repository_name']?>">
                        </div>
                        <label class="col-md-4 col-form-label">Description</label>
                        <div class="form-group input-group col-md-6" >
                            <input type="text" class="form-control"name="repo_description" value="<?php echo $result['repository_description']?>">
                        </div>
                        <label class="col-md-4 col-form-label">Url</label>
                        <div class="form-group input-group col-md-6" >
                            <input type="text" name="repo_url" class="form-control"value="<?php echo $result['repository_url']?>">
                        </div>
                        <label class="col-md-4 col-form-label">Number of stars</label>
                        <div class="form-group input-group col-md-6" >
                            <input type="text" class="form-control"name="repo_number_of_stars" value="<?php echo $result['number_of_stars']?>">
                        </div>
                        <label class="col-md-4 col-form-label">Created date</label>
                        <div class="form-group input-group col-md-6" >
                            <input type="timezone" class="form-control" name="repo_created_date" readonly="readonly" value="<?php echo $result['repository_created_date']?>">
                        </div>
                        <label class="col-md-4 col-form-label">Last push date</label>
                        <div class="form-group input-group col-md-6" >
                            <input type="timezone" class="form-control"name="repo_last_push_date" readonly="readonly" value="<?php echo $result['repository_last_push_date']?>">
                        </div>
                        <br><br>
                        <div class="row">
                            <div class="col-md-3 col-md-offset-9">
                                <input type="submit" class="btn btn-warning btn-sm" value="update">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <?php }?></form>

    </div></div></body></html>