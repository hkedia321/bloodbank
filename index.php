<?php
include('includes\functions.php');
if(isset($_POST['deletesubmit'])){
	$del_id=$_POST['deleteinput'];
	$success=del_donor_info($del_id);
	if(!$success)
		$error="Some error occured in deleting. Please try again later.";
}
if(isset($_POST['newdonorsubmit'])){
	$donor_id=$_POST['donor_id'];
	$name=$_POST['name'];
	$reg_no=$_POST['reg_no'];
	$phone_no=$_POST['phone_no'];
	$gender=$_POST['gender'];
	$blood_group=$_POST['blood_group'];
	$success=insert_donor_info($donor_id,$name,$reg_no,$phone_no,$gender,$blood_group);
	if(!$success)
		$error="Some error occured in inserting new record. Please try again later.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Blood Now and Here - All Donors information</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body id="index">
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<div class="sidebar-nav">
					<div class="navbar navbar-default" role="navigation">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<span class="visible-xs navbar-brand">Blood Now and Here</span>
						</div>
						<div class="navbar-collapse collapse sidebar-navbar-collapse">
							<ul class="nav navbar-nav">
								<img class="logoimg hidden-xs" src="logo.png">
								<li class="active"><a href="index.php">Donor <b>information</b></a></li>
								<li><a href="patientinfo.php">Patient <b>information</b></a></li>
								<li><a href="casehandler.php">Case Handler <b>information</b></a></li>
								<li><a href="donorforpatient.php">Donor for patient : <b>Relation</b></a></li>
								<li><a href="report.php">Blood transfer <b>information</b></a></li>
							</ul>
						</div><!--/.nav-collapse -->
					</div>
				</div>
			</div>
			<div class="col-sm-9">
				<h2 class="text-center">Donor Information</h2>
				<h3 class="text-center color-red"><?php if(isset($error)) echo $error;?></h3>

				<div class="table-responsive">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th><u>Donor id</u></th>
								<th>Name</th>
								<th>Reg no</th>
								<th>Phone no</th>
								<th>Gender</th>
								<th>Blood Group</th>
								<th>Options</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$all=all_donors();
							if($all){
								while($row=mysqli_fetch_assoc($all)){
									$donor_id=$row['donor_id'];
									$name=$row['name'];
									$reg_no=$row['reg_no'];
									$phone_no=$row['phone_no'];
									$gender=$row['gender'];
									$blood_group=$row['blood_group'];
									echo "
									<tr>
									<td>$donor_id</td>
									<td>$name</td>
									<td>$reg_no</td>
									<td>$phone_no</td>
									<td>$gender</td>
									<td>$blood_group</td>
									<td><button class='btn btn-primary'>edit</button>
										<button class='btn btn-danger' id='$donor_id' onclick='deletethis(this)'>delete</button>
									</td>
									</tr>
									";
								}
							}
							?>
						</tbody>
					</table>
				</div>
				<a data-toggle="modal" data-target="#myModal" href="#">+Create a new entry</a>
			</div>
			<form class="hide" method="POST" action="#">
				<input type="text" class="form-control" id="deleteinput" name="deleteinput" value="">
				<input type="submit" name="deletesubmit" id="deletesubmit">
			</form>
		</div>
	</div>
	<!-- Trigger the modal with a button -->
	<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">New Donor Registration</h4>
				</div>
				<div class="modal-body">
					<div class="container">
						<div class="roww">
							<form action="#" method="POST">
								<div class="row">
									<div class="form-group">
										<label for="donor_id" class="col-sm-2 col-xs-3 control-label">donor_id&nbsp;<span class="required">*</span></label>
										<div class="col-sm-4 col-xs-8">
											<input type="text" placeholder="Donor id" class="inp-donor_id form-control" id="donor_id" required name="donor_id">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="form-group">
										<label for="name" class="col-sm-2 col-xs-3 control-label">Name&nbsp;<span class="required">*</span></label>
										<div class="col-sm-4 col-xs-8">
											<input type="text" placeholder="Donor Name" class="inp-name form-control" id="name" required name="name">
										</div>
									</div>
								</div>
								<br>
								<div class="row">
									<div class="form-group">
										<label for="reg_no" class="col-sm-2 col-xs-3 control-label">reg_no&nbsp;<span class="required">*</span></label>
										<div class="col-sm-4 col-xs-8">
											<input type="text" placeholder="Donor reg no" class="inp-reg_no form-control" id="reg_no" required name="reg_no">
										</div>
									</div>
								</div>
								<br>
								<div class="row">
									<div class="form-group">
										<label for="phone_no" class="col-sm-2 col-xs-3 control-label">phone no&nbsp;<span class="required">*</span></label>
										<div class="col-sm-4 col-xs-8">
											<input type="text" placeholder="Donor phone no" class="inp-phone_no form-control" id="phone_no" required name="phone_no">
										</div>
									</div>
								</div>
								<br>
								<div class="row">
									<div class="form-group">
										<label for="gender" class="col-sm-2 col-xs-3 control-label">gender&nbsp;<span class="required">*</span></label>
										<div class="col-sm-4 col-xs-8">
											<input type="text" placeholder="Donor gender" class="inp-gender form-control" id="gender" required name="gender">
										</div>
									</div>
								</div>
								<br>
								<div class="row">
									<div class="form-group">
										<label for="blood_group" class="col-sm-2 col-xs-3 control-label">blood group&nbsp;<span class="required">*</span></label>
										<div class="col-sm-4 col-xs-8">
											<input type="text" placeholder="Donor blood group" class="inp-blood_group form-control" id="blood_group" required name="blood_group">
										</div>
									</div>
								</div>
								<br>
								<div class="row">
									<div class="pull-left">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										<input type="submit" name="newdonorsubmit" class="btn btn-primary">
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">

			</div>
		</div>

	</div>
</div>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript">
	function deletethis(th){
		var con=confirm("Are you sure you want to delete this row?");
		if(con){
			$("#deleteinput").val(th.id);
			$("#deletesubmit").click();
		}
	}
</script>
</body>