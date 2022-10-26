<?php 



require 'connect.php';
$sql = "select * from nhan_vien";
$result = mysqli_query($connect,$sql);

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
    <link rel="stylesheet" href="./assets/css/employee.css" />
    <link rel="stylesheet" href="./assets/css/base.css" />
  </head>
  <body>
    <div class="main-wrapper">
      <div class="container-fluid">
        <div class="row">
          <!-- Sidebar -->
          <?php require "sidebar.php"?>
          <!-- /Sidebar -->

          <!-- Page Wrapper -->
          <div class="page-wrapper col-lg-10">
            <!-- Page Content -->
            <div class="content container-fluid">
              <!-- Page Header -->
              <div class="page-header">
                <div class="row align-items-center">
                  <div class="col">
                    <h3 class="page-title">Employee</h3>
                  </div>
                  <div class="col-auto float-right ml-auto">
                    <a
                      href="#"
                      class="btn add-btn"
                      data-toggle="modal"
                      data-target="#add_employee"
                      ><i class="fa fa-plus"></i> Add Employee</a
                    >
                  </div>
                </div>
              </div>
              <!-- /Page Header -->

              <!-- Search Filter -->
              <div class="row filter-row">
                <div class="col-sm-6 col-md-3">
                  <div class="form-group form-focus">
                    <input type="text" class="form-control floating" />
                    <label class="focus-label">Employee ID</label>
                  </div>
                </div>
                <div class="col-sm-6 col-md-3">
                  <div class="form-group form-focus">
                    <input type="text" class="form-control floating" />
                    <label class="focus-label">Employee Name</label>
                  </div>
                </div>
                <div class="col-sm-6 col-md-3">
                  <select
                    class="input-group-text form-group form-focus select-focus"
                  >
                    <option>Select Designation</option>
                    <option>Web Developer</option>
                    <option>Web Designer</option>
                    <option>Android Developer</option>
                    <option>Ios Developer</option>
                  </select>
                </div>
                <div class="col-sm-6 col-md-3">
                  <a href="#" class="btn btn-success btn-block"> Search </a>
                </div>
              </div>
              <!-- Search Filter -->

              <div class="row staff-grid-row">
                <?php foreach ($result as $item) { ?>
                  <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                  <div class="profile-widget">
                    <div class="profile-img">
                      <a href="profile.php?manv=<?php echo $item['manv']?>" class="avatar"
                        ><img src="assets\img\profiles\avatar-02.jpg" alt=""
                      /></a>
                    </div>
                    <div class="dropdown profile-action">
                      <a
                        href="#"
                        class="action-icon dropdown-toggle"
                        data-toggle="dropdown"
                        aria-expanded="false"
                        ><i class="material-icons">&Xi;</i></a
                      >
                      <div class="dropdown-menu dropdown-menu-right">
                        <a
                          class="dropdown-item"
                          href="#"
                          data-toggle="modal"
                          data-target="#edit_employee"
                          ><i class="fa fa-pencil m-r-5"></i> Edit</a
                        >
                        <a
                          class="dropdown-item"
                          href="#"
                          data-toggle="modal"
                          data-target="#delete_employee"
                          ><i class="fa fa-trash-o m-r-5"></i> Delete</a
                        >
                      </div>
                    </div>
                    <h4 class="user-name m-t-10 mb-0 text-ellipsis">
                      <a href="profile.php?manv=<?php echo $item['manv']?>"><?php echo $item['hoten']?></a>
                    </h4>
                    <div class="small text-muted">Web Designer</div>
                  </div>
                </div>
                <?php  }?>
                
              </div>
            </div>
           

            <!-- Add Employee Modal -->
            <div
              id="add_employee"
              class="modal custom-modal fade"
              role="dialog"
            >
              <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Add Employee</h5>
                    <button
                      type="button"
                      class="close"
                      data-dismiss="modal"
                      aria-label="Close"
                    >
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <hr />
                  <div class="modal-body">
                    <form action="add_employee.php" method="post" enctype="multipart/form">
                      <h4 class="text-center mt-20">Profile Information</h4>
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label class="col-form-label">Full Name </label>
                            <input class="form-control" type="text" name="hoten" />
                          </div>
                        </div>
                        <!-- <div class="col-sm-6">
                          <div class="form-group">
                            <label class="col-form-label">Last Name </label>
                            <input class="form-control" type="text" />
                          </div>
                        </div> -->
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label class="col-form-label">Birth Date</label>
                            <div class="cal-icon">
                              <input
                                class="form-control datetimepicker"
                                type="text"
                                value="" name="ngaysinh"
                              />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Gender</label>
                            <select class="select form-control" name="gioitinh">
                              <option value="male selected">Male</option>
                              <option value="female">Female</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Religion</label>
                            <input type="text" class="form-control" value="" name="tongiao" />
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Address</label>
                            <input
                              type="text"
                              class="form-control"
                              value=""
                              name="quequan"
                            />
                          </div>
                        </div>
                        <!-- <div class="col-md-6">
                          <div class="form-group">
                            <label>Employee ID</label>
                            <input
                              type="text"
                              class="form-control"
                              value=""
                            />
                          </div>
                        </div> -->
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Date of Join</label>
                            <input
                              class="form-control datetimepicker"
                              type="text"
                              value="" name="ngaybatdau"
                            />
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Phone Number</label>
                            <input
                              type="text"
                              class="form-control"
                              value=""
                              name="sdt"
                            />
                          </div>
                        </div>
                        <!-- <div class="col-md-6">
                          <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" value="" />
                          </div>
                        </div> -->
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Department </label>
                            <select class="select" name="tenphongban" >
                              <option>Select Department</option>
                              <option>Web Development</option>
                              <option>IT Management</option>
                              <option>Marketing</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Designation </label>
                            <select class="select" name="tencv">
                              <option>Select Designation</option>
                              <option>Web Designer</option>
                              <option>Web Developer</option>
                              <option>Android Developer</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <hr />
                      <!-- <h4 class="text-center pb-2">Personal Information</h4>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Full Name</label>
                            <input
                              type="text"
                              class="form-control"
                              value="New York"
                            />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Birth Date</label>
                            <input
                              class="form-control datetimepicker"
                              type="text"
                              value="05/06/1985"
                            />
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Address</label>
                            <input
                              type="text"
                              class="form-control"
                              value="631-889-3206"
                            />
                          </div>
                        </div>
                        
                      </div> -->
                      <hr />
                      <h4 class="text-center pb-2">Citizen Identity Card</h4>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Citizen Identity Card Number</label>
                            <input
                              type="text"
                              class="form-control"
                              value="" name="cccd"
                            />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Where Issued</label>
                            <input
                              class="form-control datetimepicker"
                              type="text"
                              value="" name=""
                            />
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Date Of Issuance</label>
                            <input
                              type="text"
                              class="form-control"
                              value="" name="ngaycapcccd"
                            />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Valid until</label>
                            <input type="text" class="form-control" value="" name="ngayhethancccd" />
                          </div>
                        </div>
                      </div>
                      <hr />
                      <h4 class="text-center pb-2">Health Insurance Card</h4>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Health Insurance Card Number</label>
                            <input
                              type="text"
                              class="form-control"
                              value=""
                              name="sobhyte"
                            />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Where Issued</label>
                            <input
                              class="form-control datetimepicker"
                              type="text"
                              value="" name="noicapbhyte"
                            />
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Date Of Issuance</label>
                            <input
                              type="text"
                              class="form-control"
                              value="631-889-3206"name="ngaycapbhyte"
                            />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Valid until</label>
                            <input type="text" class="form-control" value=""  name="ngayhethanbhyte"/>
                          </div>
                        </div>
                      </div>
                      <hr />
                      <h4 class="text-center pb-2">Social Insurance Card</h4>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Social Insurance Card Number</label>
                            <input
                              type="text"
                              class="form-control"
                              value="" name="sobhxh"
                            />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Where Issued</label>
                            <input
                              class="form-control datetimepicker"
                              type="text"
                              value="05/06/1985"name="noicapbhxh"
                            />
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Date Of Issuance</label>
                            <input
                              type="text"
                              class="form-control"
                              value="631-889-3206"name="ngaycapbhxh"
                            />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Valid until</label>
                            <input type="text" class="form-control" value=""name="ngayhethanbhxh" />
                          </div>
                        </div>
                      </div>
                      <hr />
                      <h4 class="text-center pb-2">Office Informations</h4>
                      <div class="row">
                        <!-- <div class="col-md-6">
                          <div class="form-group">
                            <label>Staff Id</label>
                            <input
                              type="text"
                              class="form-control"
                              value=""name=""
                            />
                          </div>
                        </div> -->
                      <div class="col-md-6">
                          <div class="form-group">
                            <label>Specialization</label>
                            <input
                              class="form-control datetimepicker"
                              type="text"
                              value="05/06/1985"name="chuyennganh"
                            />
                          </div>
                        </div>

                        <!-- <div class="col-md-6">
                          <div class="form-group">
                            <label>Designation</label>
                            <input
                              type="text"
                              class="form-control"
                              value="631-889-3206"name="tencv"
                            />
                          </div>
                        </div>  -->
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Education</label>
                            <input type="text" class="form-control" value=""name="tentrinhdo" />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Foreign Language Level</label>
                            <input type="text" class="form-control" value=""name="trinhdongoaingu" />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Joining Date</label>
                            <input type="text" class="form-control" value=""name="ngaybatdau" />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Work Experience</label>
                            <input type="text" class="form-control" value="" name="noidung"/>
                          </div>
                        </div>
                      </div>
                      <div class="submit-section pb-4">
                        <button class="btn btn-primary submit-btn">
                          Submit
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            
            <!-- Edit Employee Modal -->
            <div
              id="edit_employee"
              class="modal custom-modal fade"
              role="dialog"
            >
            <div class="modal-dialog modal-dialog-centered modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Edit Employee</h5>
                  <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close"
                  >
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label class="col-form-label"
                            >Full Name
                            </label
                          >
                          <input class="form-control" type="text" />
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label class="col-form-label">Department Id</label>
                          <input class="form-control" type="text" />
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label class="col-form-label"
                            >Designation Id
                            </label
                          >
                          <input class="form-control" type="text" />
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label class="col-form-label"
                            >Religion </label
                          >
                          <input class="form-control" type="email" />
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label class="col-form-label">Gender</label>
                          <input class="form-control" type="text" />
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label class="col-form-label"
                            >Date of Birth</label> 
                            <div class="cal-icon">
                              <input class="form-control datetimepicker" type="text" value="05/06/1985">
                            </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label class="col-form-label"
                            >Region
                            </label
                          >
                          <input type="text" class="form-control" />
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label class="col-form-label"
                            >Phone Number
                            </label
                          >
                          <input type="text" class="form-control" />
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label
                            >Department
                            </label
                          >
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
                          <label
                            >Designation
                            </label
                          >
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
                      <button class="btn btn-primary submit-btn">
                        Submit
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            </div>
           

            <!-- Delete Employee Modal -->
            <div
              class="modal custom-modal fade"
              id="delete_employee"
              role="dialog"
            >
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-body">
                    <div class="form-header">
                      <h3>Delete Employee</h3>
                      <p>Are you sure want to delete?</p>
                    </div>
                    <div class="modal-btn delete-action">
                      <div class="row">
                        <div class="col-6">
                          <a
                            href="javascript:void(0);"
                            class="btn btn-primary continue-btn"
                            >Delete</a
                          >
                        </div>
                        <div class="col-6">
                          <a
                            href="javascript:void(0);"
                            data-dismiss="modal"
                            class="btn btn-primary cancel-btn"
                            >Cancel</a
                          >
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
          <!-- /Page Wrapper -->
        </div>
      </div>
    </div>
  </body>
</html>
