<?php 

require 'connect.php';
if(isset($_GET['manv'])){
	$manv = $_GET['manv'];
	$sql = "SELECT *
	FROM nhan_vien
	INNER JOIN trinhdo ON nhan_vien.manv = trinhdo.manv
	
	INNER JOIN chucvu ON nhan_vien.manv = chucvu.manv
	INNER JOIN hopdong ON nhan_vien.manv = hopdong.manv
	INNER JOIN phongban ON nhan_vien.manv = phongban.manv
	WHERE nhan_vien.manv = $manv";
	// die($sql);
	// echo $manv;
	$result = mysqli_query($connect,$sql);
	$each = mysqli_fetch_array($result);
	// echo $each['tencv'];
	// die();
	// die($each);
	// $sql = "SELECT * chucvu where manv = '$manv'";
	// $result = mysqli_query($connect,$sql);
	// $chucvu = mysqli_fetch_array($result);
}else{
	header('location:employee.php');
}


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Employees</title>
    <link
      rel="shortcut icon"
      href="./config/login_image.jpg"
      type="image/x-icon"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
      integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />
    <script
      src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
      integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
      integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
      integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="./assets/css/profile.css" />
    <link rel="stylesheet" href="./assets/css/base.css" />
  </head>
  <body>
    <!-- Main Wrapper -->
    <div class="main-wrapper">
      <div class="container-fluid">
        <div class="row">
			 <!-- Sidebar -->
			<?php  require 'sidebar.php';?>
			  <!-- /Sidebar -->
		
			  <!-- Page Wrapper -->
			<div class="page-wrapper col-lg-10">
				<!-- Page Content -->
				<div class="content container-fluid profile__content">
					
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Profile</h3>
							
							</div>
						</div>
					</div>
					<!-- /Page Header -->

					
					
					
					
					<div class="card mb-0">
						<div class="card-body">
							<div class="row">
								<div class="col-md-12">
									<div class="profile-view">
										<div class="profile-img-wrap">
											<div class="profile-img">
												<a href="#"><img alt="" src="assets/img/profiles/avatar-02.jpg"></a>
											</div>
										</div>
										<div class="profile-basic">
											<div class="row">
												<div class="col-md-5">
													<div class="profile-info-left">
														<h3 class="user-name m-t-0 mb-0"><?php echo $each['hoten']?></h3>
														<h6 class="text-muted"><?php echo $each['chuyennganh']?></h6>
														<small class="text-muted">Software Engineer</small>
														<div class="staff-id">Employee ID : <?php echo $each['manv']?></div>
														<div class="small doj text-muted">Date of Join : <?php echo $each['ngaybatdau']?></div>
													</div>
												</div>
												<div class="col-md-7">
													<ul class="personal-info">
														<li>
															<div class="title">Phone:</div>
															<div class="text"><?php echo $each['sdt']?></div>
														</li>
														<li>
															<div class="title">Email:</div>
															<div class="text"><?php echo $manv?>@gmail.com</a></div>
														</li>
														<li>
															<div class="title">Birthday:</div>
															<div class="text"><?php echo $each['ngaysinh']?></div>
														</li>
														
														<li>
															<div class="title">Gender:</div>
															<?php if($each['gioitinh']==1){
																$gioitinh = "Male";
															}else{
																$gioitinh = "Female";

															}?>
															<div class="text"><?php echo $gioitinh; ?></div>
														</li>
														
													</ul>
												</div>
											</div>
										</div>
										<div class="pro-edit"><a data-target="#profile_info" data-toggle="modal" class="edit-icon" href="#"><i class="fa fa-pencil"></i></a></div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					
					
					<div class="tab-content">
					
						<!-- Profile Info Tab -->
						<div id="emp_profile" class="pro-overview tab-pane fade show active">
							<div class="row">
								<div class="col-md-6 d-flex">
									<div class="card profile-box flex-fill">
										<div class="card-body">
											<h3 class="card-title">Personal Informations <a href="#" class="edit-icon" data-toggle="modal" data-target="#personal_info_modal"><i class="fa fa-pencil"></i></a></h3>
											<ul class="personal-info">
									
												<li>
													<div class="title">Full Name:</div>
													<div class="text"><?php echo $each['hoten']?></div>
												</li>
												<li>
													<div class="title">Birth-Date:</div>
													<div class="text"><?php echo $each['ngaysinh']?></div>
												</li>
												<li>
													<div class="title">Address:</div>
													<div class="text"><?php echo $each['quequan']?></div>
												</li>
												<li>
													<div class="title">Religion:</div>
													<div class="text"> <?php echo $each['tongiao']?></div>
												</li>
											</ul>
										</div>
									</div>
								</div>
								
								<div class="col-md-6 d-flex">
									<div class="card profile-box flex-fill">
										<div class="card-body">
											<h3 class="card-title">Citizen Identity Card <a href="#" class="edit-icon" data-toggle="modal" data-target="#citizen_identity_card"><i class="fa fa-pencil"></i></a></h3>
											<ul class="personal-info">
												<li>
													<div class="title">Citizen Identity Card Number:</div>
													<div class="text"> <?php echo $each['cccd']?></div>
												</li>
												<li>
													<div class="title">Where Issued:</div>
													<div class="text"> <?php echo $each['quequan']?></div>
												</li>
												<li>
													<div class="title">Date Of Issuance:</div>
													<div class="text"> <?php echo $each['ngaycapcccd']?></div>
												</li>
												<li>
													<div class="title">Valid until:</div>
													<div class="text"> <?php echo $each['ngayhethancccd']?></div>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="col-md-6 d-flex">
									<div class="card profile-box flex-fill">
										<div class="card-body">
											<h3 class="card-title">Health Insurance Card <a href="#" class="edit-icon" data-toggle="modal" data-target="#health_identity_card"><i class="fa fa-pencil"></i></a></h3>
											<ul class="personal-info">
												<li>
													<div class="title">Health Insurance Card Number:</div>
													<div class="text"> <?php echo  $each['sobhyte']?></div>
												</li>
												<li>
													<div class="title">Where Issued:</div>
													<div class="text"> <?php echo $each['noicapbhyte']?></div>
												</li>
												<li>
													<div class="title">Date Of Issuance:</div>
													<div class="text">  <?php echo $each['ngaycapbhyte']?></div>
												</li>
												<li>
													<div class="title">Valid until:</div>
													<div class="text">  <?php echo $each['ngayhethanbhyte']?></div>
												</li>
											</ul>
											<hr>
											<h3 class="card-title">Social Insurance Card <a href="#" class="edit-icon" data-toggle="modal" data-target="#social_identity_card"><i class="fa fa-pencil"></i></a></h3>
											<ul class="personal-info">
												<li>
													<div class="title">Social Insurance Card Number:</div>
													<div class="text">  <?php echo $each['sobhxh']?></div>
												</li>
												<li>
													<div class="title">Where Issued:</div>
													<div class="text"> <?php echo $each['noicapbhxh']?></div>
												</li>
												<li>
													<div class="title">Date Of Issuance:</div>
													<div class="text"> <?php echo $each['ngaycapbhxh']?></div>
												</li>
												<li>
													<div class="title">Valid until:</div>
													<div class="text"> <?php echo $each['ngayhethanbhxh']?></div>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="col-md-6 d-flex">
									<div class="card profile-box flex-fill">
										<div class="card-body">
											<h3 class="card-title">Office Informations <a href="#" class="edit-icon" data-toggle="modal" data-target="#office_info_modal"><i class="fa fa-pencil"></i></a></h3>
							
											<ul class="personal-info">
												<li>
													<div class="title">Staff Id:</div>
													<div class="text"> <?php echo $manv?></div>
												</li>
												<li>
													<div class="title">Deptartment:</div>
													<div class="text"><?php echo $each['tenphongban']?></div>
												</li>
												<li>
													<div class="title">Designation:</div>
													<div class="text"><?php echo $each['tencv']?></div>
												</li>
												
												<li>
													<div class="title">Education:</div>
													<div class="text"><?php echo $each['tentrinhdo']?></div>
												</li>
												<li>
													<div class="title">Foreign Language Level:</div>
													<div class="text"><?php echo $each['trinhdongoaingu']?></div>
												</li>
												<li>
													<div class="title">Joining Date:</div>
													<div class="text"><?php echo $each['ngaybatdau']?></div>
												</li>
												
	
												<li>
													<div class="title">Work Experience:</div>
													<div class="text"><?php echo $each['noidung']?></div>
												</li>
												
											</ul>
										</div>
									</div>
								</div>
							</div>
							
							
							
						</div>
						<!-- /Profile Info Tab -->
						
					</div>
				</div>
				<!-- /Page Content -->
				<!-- <form action="google.com"> -->
				<!-- Profile Modal -->
				<div id="profile_info" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Profile Information</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
									<div class="row">
										<div class="col-md-12">
											<div class="profile-img-wrap edit-img">
												<img class="inline-block" src="assets/img/profiles/avatar-02.jpg" alt="user">
												<div class="fileupload btn">
													<span class="btn-text">edit</span>
													<input class="upload" type="file">
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label>First Name</label>
														<input type="text" class="form-control" value="John">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label>Last Name</label>
														<input type="text" class="form-control" value="Doe">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label>Birth Date</label>
														<div class="cal-icon">
															<input class="form-control datetimepicker" type="text" value="05/06/1985">
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label>Gender</label>
														<select class="select form-control">
															<option value="male selected">Male</option>
															<option value="female">Female</option>
														</select>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Address</label>
												<input type="text" class="form-control" value="4487 Snowbird Lane">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Employee ID</label> 
												<input type="text" class="form-control" value="New York">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Date of Join</label>
												<input class="form-control datetimepicker" type="text" value="05/06/1985">
											</div>
										</div>
										
										<div class="col-md-6">
											<div class="form-group">
												<label>Phone Number</label>
												<input type="text" class="form-control" value="631-889-3206">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Email</label>
												<input type="text" class="form-control" value="">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Department <span class="text-danger">*</span></label>
												<select class="select">
													<option>Select Department</option>
													<option>Web Development</option>
													<option>IT Management</option>
													<option>Marketing</option>
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Designation <span class="text-danger">*</span></label>
												<select class="select">
													<option>Select Designation</option>
													<option>Web Designer</option>
													<option>Web Developer</option>
													<option>Android Developer</option>
												</select>
											</div>
										</div>
										
									</div>
									<div class="submit-section">
										<button class="btn btn-primary submit-btn">Submit</button>
									</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /Profile Modal -->
				
				<!-- Personal Info Modal -->
				<div id="personal_info_modal" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
						<!-- <div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Personal Information</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
								<div class="modal-body">
									<form action="salary.php">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Full Name</label>
												<input class="form-control" type="text" value="<?php echo $each['hoten'] ?> ">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Birth Date</label>
												<div class="cal-icon">
													<input class="form-control " type="text" value="<?php echo $each['ngaysinh'] ?> ">
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Address</label> <span class="text-danger">*</span></label>
												<input class="form-control" type="text" value="<?php echo $each['quequan'] ?> ">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Religion</label>
												<input class="form-control" type="text"value="<?php echo $each['tongiao'] ?> ">
											</div>
										</div>	
									</div>
									<div class="submit-section">
										<button type="button" class="btn btn-primary submit-btn">Submit</button>
									</div>
									</form>
							</div>
						</div> -->
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Personal Information</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
								<div class="modal-body">
									<form action="./edit.php" method="post" enctype="multipart/form">
									<input type="hidden" name="manv" value ="<?php echo $each['manv']?>">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Full Name</label>
												<input class="form-control" type="text" name="hoten" value="<?php echo $each['hoten']?>" >
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Birth Date</label>
												<div class="cal-icon">
													<input class="form-control " type="text" name="ngaysinh" value="<?php echo $each['ngaysinh']?>"> 
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Address</label> <span class="text-danger">*</span></label>
												<input class="form-control" name="quequan" type="text"value="<?php echo $each['quequan']?>" > 
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Religion</label>
												<input class="form-control" name="tongiao" type="text"value="<?php echo $each['tongiao']?>"> 
											</div>
										</div>	
									</div>
									<div class="submit-section">
										<button  class="btn btn-primary submit-btn">Submit</button>
									</div>
									</form>
							</div>
						</div>
					</div>
				</div>
				<!-- Citizen Identity Card Modal -->
				<div id="citizen_identity_card" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Citizen Identity Card</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="./edit.php" method="post" enctype="multipart">
								<input type="hidden" name="manv" value ="<?php echo $each['manv']?>">
								<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Citizen Identity Card Number</label>
												<input class="form-control" name="cccd" type="text" value="<?php echo $each['cccd']?>">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Where Issued</label>
												<input class="form-control" type="text" value="<?php echo $each['quequan']?>">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Date Of Issuance</label> <span class="text-danger">*</span></label>
												<input class="form-control" type="text" name="ngaycapcccd" value="<?php echo $each['ngaycapcccd']?>">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Valid until</label>
												<input class="form-control" name="ngayhethancccd" type="text" value="<?php echo $each['ngayhethancccd']?>">
											</div>
										</div>	
									</div>
									<div class="submit-section">
										<button class="btn btn-primary submit-btn">Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- Health Insurance Card -->
				<div id="health_identity_card" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Health Insurance Card</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
									<form action="./edit.php" method="post" enctype="multipart/form">
									<input type="hidden" name="manv" value ="<?php echo $each['manv']?>">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Health Insurance Card Number</label>
												<input class="form-control" type="text" name="sobhyte" value="<?php echo $each['sobhyte']?>">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Where Issued</label>
												<input class="form-control" type="text" name="noicapbhyte" value="<?php echo $each['noicapbhyte']?>">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Date Of Issuance</label> <span class="text-danger">*</span></label>
												<input class="form-control" type="text" name="ngaycapbhyte"  value="<?php echo $each['ngaycapbhyte']?>">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Valid until</label>
												<input class="form-control" type="text" name="ngayhethanbhyte" value="<?php echo $each['ngayhethanbhyte'] ?>">
											</div>
										</div>	
									</div>
									<div class="submit-section">
										<button class="btn btn-primary submit-btn">Submit</button>
									</div>
									</form>
							</div>
						</div>
					</div>
				</div>
				<!-- Social Insurance Card -->
				<div id="social_identity_card" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Social Insurance Card</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
									<form action="./edit.php" method="post">
									<input type="hidden" name="manv" value ="<?php echo $each['manv']?>">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Social Insurance Card Number</label>
												<input class="form-control" type="text" name="sobhxh" value="<?php echo $each['sobhxh'] ?>">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Where Issued</label>
												<input class="form-control" type="text" name="noicapbhxh" value="<?php echo $each['noicapbhxh'] ?>">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Date Of Issuance</label> <span class="text-danger">*</span></label>
												<input class="form-control" type="text" name="ngaycapbhxh" value="<?php echo $each['ngaycapbhxh'] ?>">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Valid until</label>
												<input class="form-control" type="text" name="ngayhethanbhxh" value="<?php echo $each['ngayhethanbhxh'] ?>">
											</div>
										</div>	
									</div>
									<div class="submit-section">
										<button class="btn btn-primary submit-btn">Submit</button>
									</div>
									</form>
							</div>
						</div>
					</div>
				</div>
				<!-- Office Informations -->
				<div id="office_info_modal" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Office Informations</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Staff Id</label>
												<input class="form-control" type="text">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Department</label>
												<input class="form-control" type="text">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Designation</label> 
												<input class="form-control" type="text">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Education</label>
												<input class="form-control" type="text">
											</div>
										</div>	
										<div class="col-md-6">
											<div class="form-group">
												<label>Foreign Language Level</label>
												<input class="form-control" type="text">
											</div>
										</div>	
										<div class="col-md-6">
											<div class="form-group">
												<label>Joining Date</label>
												<input class="form-control" type="text">
											</div>
										</div>	
										<div class="col-md-6">
											<div class="form-group">
												<label>Work Experience</label>
												<input class="form-control" type="text">
											</div>
										</div>	
										<div class="col-md-6">
											<div class="form-group">
												<label>Education</label>
												<input class="form-control" type="text">
											</div>
										</div>	
									</div>
									<div class="submit-section">
										<button class="btn btn-primary submit-btn">Submit</button>
									</div>
							</div>
						</div>
					</div>
				</div>
				</form>
			</div>
		</div>  
      </div>
    </div>
    <!-- /Main Wrapper -->
  </body>
</html>
