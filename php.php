

<!----

	localhost => server name
	root =>  user name
	mysql => password
	practice => database name
	data_form => database table name
	Data_form.php => File name or page name (jaha action (edit, delete, fatch) karana hai
	fname,lname =>  assigned name for firstname and for last name
	
---->



										<!-- INSTERTION 😎😎😎 -->
										
<?php

					//Setting Connection
					
$con = mysqli_connect("localhost", "root", "mysql", "practice");
$msg = '';
if(!$con){
	$msg .= '<h3 style="color:#ff0000;">Error # Unable to Connect</h3>';
}


						//Insert Query
						
if(isset($_POST['fname'])){
	$sql = 'insert into data_form (fname, lname) values("'.$_POST['fname'].'", "'.$_POST['lname'].'")';
	
	//Checking connection and SQL query
	mysqli_query($con, $sql);
	if(mysqli_error($con)){
		$msg .= '<h3 style="color:#ff0000;">Error # 1 : '.mysqli_error($con).' >> '.$sql;
	}
	else{
		$msg .= '<h3 style="color:#00FF00;">Data Inserted</h3>';
	}
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Entry Form</title>
</head>
<body>
    <form action="Data_form.php" method="POST" enctype="multipart/form-data">
        <label for="fname">First Name</label>
        <input type="text" name="fname" id="fname"  placeholder="Enter First Name"> </br></br>
        
        <label for="lname">Last Name</label>
        <input type="text" name="lname" id="lname"  placeholder="Enter Last Name"> </br>

		<button type="submit" class="btn btn-primary">Submit</button>
				  
    </form></br></br>

    <table width="40%">
        <tr>
			<th>s.no</th>
            <th><b>First Name</b></th>
            <th><b>Last Name</b></th>
        </tr>
    </table>
</body>
</html>





									<!--- FATCHING (PRINT IN TABLE) 😁😁😁 --->

<?php

							//Setting Connection
							
$con = mysqli_connect("localhost", "root", "mysql", "practice");
$msg = '';
if(!$con){
	$msg .= '<h3 style="color:#ff0000;">Error # Unable to Connect</h3>';
}

							//Insert Query
							
if(isset($_POST['fname'])){
	$sql = 'insert into data_form (fname, lname) values("'.$_POST['fname'].'", "'.$_POST['lname'].'")';
	
	//Checking connection and SQL query
	mysqli_query($con, $sql);
	if(mysqli_error($con)){
		$msg .= '<h3 style="color:#ff0000;">Error # 1 : '.mysqli_error($con).' >> '.$sql;
	}
	else{
		$msg .= '<h3 style="color:#00FF00;">Data Inserted</h3>';
	}
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Entry Form</title>
</head>
<body>
    <form action="Data_form.php" method="POST" enctype="multipart/form-data">
        <label for="fname">First Name</label>
        <input type="text" name="fname" id="fname"  placeholder="Enter First Name"> </br></br>
        
        <label for="lname">Last Name</label>
        <input type="text" name="lname" id="lname"  placeholder="Enter Last Name"> </br>

		<button type="submit" class="btn btn-primary">Submit</button>
				  
    </form></br></br>

    <table width="40%">
        <tr>
			<th>s.no</th>
            <th><b>First Name</b></th>
            <th><b>Last Name</b></th>
        </tr>
		<?php
			// Data Fetch (Print in Table)
			$sql = 'select * from data_form';
			$result = mysqli_query($con, $sql);
			$i=1;
			while($row = mysqli_fetch_assoc($result)){
				echo '<tr>
				<td>'.$i++.'</td>
				<td>'.$row['fname'].'</td>
				<td>'.$row['lname'].'</td>
					</tr>'	;
			}
		?>
		
    </table>
</body>
</html>





											<!--- DELETION 😥😥😥 --->

<?php
								//Setting Connection
								
$con = mysqli_connect("localhost", "root", "mysql", "practice");
$msg = '';
if(!$con){
	$msg .= '<h3 style="color:#ff0000;">Error # Unable to Connect</h3>';
}

								//Insert Query
								
if(isset($_POST['fname'])){
	$sql = 'insert into data_form (fname, lname) values("'.$_POST['fname'].'", "'.$_POST['lname'].'")';
	
	mysqli_query($con, $sql);
	if(mysqli_error($con)){
		$msg .= '<h3 style="color:#ff0000;">Error # 1 : '.mysqli_error($con).' >> '.$sql;
	}
	else{
		$msg .= '<h3 style="color:#00FF00;">Data Inserted</h3>';
	}
}
								//Delete Query
								
if(isset($_GET['del'])){
	$sql = 'delete from data_form where fname="'.$_GET['del'].'"';
	mysqli_query($con, $sql);
	if(mysqli_error($con)){
		$msg .= '<h3 style="color:#ff0000;">Error in deleting . '.mysqli_error($con).' >> '.$sql.'</h3>';
	}
	else{
		$msg .= '<h3 style="color:#00ff00;">Deleted</h3>';
	}
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Entry Form</title>
</head>
<body>
    <form action="Data_form.php" method="POST" enctype="multipart/form-data">
        <label for="fname">First Name</label>
        <input type="text" name="fname" id="fname"  placeholder="Enter First Name"> </br></br>
        
        <label for="lname">Last Name</label>
        <input type="text" name="lname" id="lname"  placeholder="Enter Last Name"> </br>

		<button type="submit" class="btn btn-primary">Submit</button>
				  
    </form></br></br>

    <table width="40%">
        <tr>
			<th>s.no</th>
            <th><b>First Name</b></th>
            <th><b>Last Name</b></th>
			<th><b>Delete</b></th>
			<th><b>Edit</b></th>
        </tr>
		<?php
			// Data Fetch (Print in Table)
			$sql = 'select * from data_form';
			$result = mysqli_query($con, $sql);
			$i=1;
			while($row = mysqli_fetch_assoc($result)){
				echo '<tr>
				<td>'.$i++.'</td>
				<td>'.$row['fname'].'</td>
				<td>'.$row['lname'].'</td>
				
				<td><a href="Data_form.php?del='.$row['fname'].'" onClick="return confirm(\'Are you sure? \');" > Delete </a></td>
				
					</tr>'	;
			}
		?>
		
    </table>
</body>
</html>



													<!--- EDIT 😑😑😑😑 --->
													
													
<?php

							//Setting Connection
$con = mysqli_connect("localhost", "root", "mysql", "practice");
$msg = '';
if(!$con){
	$msg .= '<h3 style="color:#ff0000;">Error # Unable to Connect</h3>';
}

							//Insert Query

if(isset($_POST['fname'])){
	
	if($_POST['edit_sno']=='')//use for edit
	{
	$sql = 'insert into data_form (fname, lname) values ("'.$_POST['fname'].'", "'.$_POST['lname'].'")';
	}
	
	//for update data after edit
	else{
		$sql = 'update data_form set fname="'.$_POST['fname'].'", lname="'.$_POST['lname'].'" where fname="'.$_POST['edit_sno'].'"';
	}
	mysqli_query($con, $sql);
	if(mysqli_error($con)){
		$msg .= '<h3 style="color:#ff0000;">Error # 1 : '.mysqli_error($con).' >> '.$sql;
	}
	else{
		$msg .= '<h3 style="color:#00FF00;">Data Inserted</h3>';
	}
	
}

							//Delete Query
if(isset($_GET['del'])){
	$sql = 'delete from data_form where fname="'.$_GET['del'].'"';
	mysqli_query($con, $sql);
	if(mysqli_error($con)){
		$msg .= '<h3 style="color:#ff0000;">Error in deleting . '.mysqli_error($con).' >> '.$sql.'</h3>';
	}
	else{
		$msg .= '<h3 style="color:#00ff00;">Deleted</h3>';
	}
}


							//Edit Query
if(isset($_GET['edit'])){
	$sql = 'select * from data_form where fname="'.$_GET['edit'].'"';
	
	$row = mysqli_fetch_assoc(mysqli_query($con, $sql));
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Entry Form</title>
</head>
<body>
    <form action="Data_form.php" method="POST" enctype="multipart/form-data">
        <label for="fname">First Name</label>
        <input type="text" name="fname" id="fname" value="<?php if(isset($row['fname'])){echo $row['fname'];}?>" placeholder="Enter First Name"> </br></br>
        <!-- input me value ka use karne par data edit hone ke liye input box me aayega -->
        <label for="lname">Last Name</label>
        <input type="text" name="lname" id="lname" value="<?php if(isset($row['lname'])){echo $row['lname'];}?>"  placeholder="Enter Last Name"> </br>

		<button type="submit" class="btn btn-primary">Submit</button>
		 <input type="hidden" name="edit_sno" value="<?php if(isset($row['fname'])){echo $row['fname'];}?>">
		  
    </form></br></br>

    <table width="40%">
        <tr>
			<th>s.no</th>
            <th><b>First Name</b></th>
            <th><b>Last Name</b></th>
			<th><b>Edit</b></th>
			<th><b>Delete</b></th>
        </tr>
		<?php
			// Data Fetch (Print in Table)
			$sql = 'select * from data_form';
			$result = mysqli_query($con, $sql);
			$i=1;
			while($row = mysqli_fetch_assoc($result)){
				echo '<tr>
				<td>'.$i++.'</td>
				<td>'.$row['fname'].'</td>
				<td>'.$row['lname'].'</td>
				
				<td><a href="Data_form.php?edit='.$row['fname'].'" onClick="return confirm(\'Are you sure?\');">Edit</a></td>
				
				
				<td><a href="Data_form.php?del='.$row['fname'].'" onClick="return confirm(\'Are you sure? \');" > Delete </a></td>
				
					</tr>'	;
			}
		?>
		
    </table>
</body>
</html>



					<!-- Select data from database and show in select box option 🙂🤗🤔🤨 -->
	
<?php

							//Setting Connection
$con = mysqli_connect("localhost", "root", "mysql", "practice");
$msg = '';
if(!$con){
	$msg .= '<h3 style="color:#ff0000;">Error # Unable to Connect</h3>';
}

							//Insert Query

if(isset($_POST['fname'])){
	
	if($_POST['edit_sno']=='')//use for edit
	{
	$sql = 'insert into data_form (fname, lname) values ("'.$_POST['fname'].'", "'.$_POST['lname'].'")';
	}
	
	//for update data after edit
	else{
		$sql = 'update data_form set fname="'.$_POST['fname'].'", lname="'.$_POST['lname'].'" where fname="'.$_POST['edit_sno'].'"';
	}
	mysqli_query($con, $sql);
	if(mysqli_error($con)){
		$msg .= '<h3 style="color:#ff0000;">Error # 1 : '.mysqli_error($con).' >> '.$sql;
	}
	else{
		$msg .= '<h3 style="color:#00FF00;">Data Inserted</h3>';
	}
	
}

							//Delete Query
if(isset($_GET['del'])){
	$sql = 'delete from data_form where fname="'.$_GET['del'].'"';
	mysqli_query($con, $sql);
	if(mysqli_error($con)){
		$msg .= '<h3 style="color:#ff0000;">Error in deleting . '.mysqli_error($con).' >> '.$sql.'</h3>';
	}
	else{
		$msg .= '<h3 style="color:#00ff00;">Deleted</h3>';
	}
}


							//Edit Query
if(isset($_GET['edit'])){
	$sql = 'select * from data_form where fname="'.$_GET['edit'].'"';
	
	$row = mysqli_fetch_assoc(mysqli_query($con, $sql));
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Entry Form</title>
</head>
<body>
    <form action="Data_form.php" method="POST" enctype="multipart/form-data">
        <label for="fname">First Name</label>
        <input type="text" name="fname" id="fname" value="<?php if(isset($row['fname'])){echo $row['fname'];}?>" placeholder="Enter First Name"> </br></br>
        <!-- input me value ka use karne par data edit hone ke liye input box me aayega -->
        <label for="lname">Last Name</label>
        <input type="text" name="lname" id="lname" value="<?php if(isset($row['lname'])){echo $row['lname'];}?>"  placeholder="Enter Last Name"> </br></br>
		
		
						<!-- Select data from database and show in select box option -->
		
		<label for="">Registerd Name</label>
		<select name="data_form">
		
		<?php
		$sql = "select * from data_form"; //select data from table name
		$result = mysqli_query($con,$sql); //using mysqli_query send data into result
		while ($row = mysqli_fetch_assoc($result)) { //while loop running untill all result data send into row
		?>
		
		<option value="<?php echo $row["fname"]; //giving a value for all data into row 
		?>"> 
		<?php echo $row["fname"]; //show all data into row
		?>
		</option>
		<?php
		}
		?>
		</select> </br> </br>
				
		
		<button type="submit" class="btn btn-primary">Submit</button>
		 <input type="hidden" name="edit_sno" value="<?php if(isset($row['fname'])){echo $row['fname'];}?>"> 
		 
    </form></br></br>

    <table width="40%">
        <tr>
			<th>S.no</th>
            <th><b>First Name</b></th>
            <th><b>Last Name</b></th>
			<th><b>Edit</b></th>
			<th><b>Delete</b></th>
        </tr>
		<?php
			// Data Fetch (Print in Table)
			$sql = 'select * from data_form';
			$result = mysqli_query($con, $sql);
			$i=1;
			while($row = mysqli_fetch_assoc($result)){
				echo '<tr>
				<td>'.$i++.'</td>
				<td>'.$row['fname'].'</td>
				<td>'.$row['lname'].'</td>
				
				<td><a href="Data_form.php?edit='.$row['fname'].'" onClick="return confirm(\'Are you sure?\');">Edit</a></td>
				
				
				<td><a href="Data_form.php?del='.$row['fname'].'" onClick="return confirm(\'Are you sure? \');" > Delete </a></td>
				
					</tr>'	;
			}
		?>
		
    </table>
</body>
</html>							