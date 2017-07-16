<html>
	<head>
		<title>
			List Of Git Hub Repository
		</title>
		
		<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<link rel="stylesheet" href="https//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	
	
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
				<h1 class="text-center">List Of Git Hub Repository</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Repository ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>URL</th>
                <th>Number of stars</th>
                <th>Created date</th>
                <th>Last push date</th>
                <th>Update</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Repository ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Repository URL</th>
                <th>Number of stars</th>
                <th>Created date</th>
                <th>Last push date</th>
                <th>Update</th>
            </tr>
        </tfoot>
        <tbody>
        	<?php
        		require_once('db.php');
				
				$repo="SELECT * FROM `repositories`";
				$repo_query=mysqli_query($conn,$repo);
				while($result=mysqli_fetch_assoc($repo_query)):
        	
            echo '<tr>
                <td>'.$result['repository_id'].'</td>
                <td><a target="_blank" href="'.$result['repository_url'].'">'.$result['repository_name'].'</a></td>
                <td>'.$result['repository_description'].'</td>
                <td><a target="_blank" href="'.$result['repository_url'].'">'.$result['repository_url'].'</a></td>
                <td>'.$result['number_of_stars'].'</td>
                <td>'.$result['repository_created_date'].'</td>
                <td>'.$result['repository_last_push_date'].'</td>
                <td><a href="repo_update_form.php?uid='.$result['id'].'" class="btn btn-info">edit</a></td>
               </tr> ';
            endwhile; ?>

            
        </tbody>
    </table>
				</div>
			</div>
		</div>
	</body>
	<script src="//code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
	<script>
		$(document).ready(function() {
    $('#example').DataTable();
} );
	</script>
</html>