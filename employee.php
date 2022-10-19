<?php 
session_start();
if(empty($_SESSION['id'])){
  header('Location:login.php?error=Vui lòng đăng nhập');
  exit;
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
      href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
      integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
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
    <!-- <link rel="stylesheet" href="./assets/css/base.css" /> -->
    <link rel="stylesheet" href="./assets/css/employee.css" />
  </head>
  <body>
    <div class="main-wrapper">
      <div class="container-fluid">
        <div class="row">
          <!-- Sidebar -->
          <div class="sidebar col-lg-2">
            <span>Human Resource Management</span>
            <ul class="barList">
              <li class="barItem"><a href="" class="active">All Employees</a></li>
              <li class="barItem"><a href="">Employee Salary</a></li>
              <li class="barItem"><a href="">Manager: <?php echo $_SESSION['username']?></a></li>
              <li class="barItem"><a href="sigout.php">Logout</a></li>
            </ul>
          </div>
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
                  <div class="form-group form-focus select-focus">
                    <select class="select floating">
                      <option>Select Designation</option>
                      <option>Web Developer</option>
                      <option>Web Designer</option>
                      <option>Android Developer</option>
                      <option>Ios Developer</option>
                    </select>
                    <!-- <label class="focus-label">Designation</label> -->
                  </div>
                </div>
                <div class="col-sm-6 col-md-3">
                  <a href="#" class="btn btn-success btn-block"> Search </a>
                </div>
              </div>
              <!-- Search Filter -->

              <div class="row staff-grid-row">
                <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                  <div class="profile-widget">
                    <div class="profile-img">
                      <a href="profile.html" class="avatar"
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
                      <a href="profile.html">John Doe</a>
                    </h4>
                    <div class="small text-muted">Web Designer</div>
                  </div>
                </div>
                <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                  <div class="profile-widget">
                    <div class="profile-img">
                      <a href="profile.html" class="avatar"
                        ><img src="assets\img\profiles\avatar-09.jpg" alt=""
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
                      <a href="profile.html">Richard Miles</a>
                    </h4>
                    <div class="small text-muted">Web Developer</div>
                  </div>
                </div>
                <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                  <div class="profile-widget">
                    <div class="profile-img">
                      <a href="profile.html" class="avatar"
                        ><img src="assets\img\profiles\avatar-10.jpg" alt=""
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
                      <a href="profile.html">John Smith</a>
                    </h4>
                    <div class="small text-muted">Android Developer</div>
                  </div>
                </div>
                <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                  <div class="profile-widget">
                    <div class="profile-img">
                      <a href="profile.html" class="avatar"
                        ><img src="assets\img\profiles\avatar-05.jpg" alt=""
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
                      <a href="profile.html">Mike Litorus</a>
                    </h4>
                    <div class="small text-muted">IOS Developer</div>
                  </div>
                </div>
                <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                  <div class="profile-widget">
                    <div class="profile-img">
                      <a href="profile.html" class="avatar"
                        ><img src="assets\img\profiles\avatar-11.jpg" alt=""
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
                      <a href="profile.html">Wilmer Deluna</a>
                    </h4>
                    <div class="small text-muted">Team Leader</div>
                  </div>
                </div>
                <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                  <div class="profile-widget">
                    <div class="profile-img">
                      <a href="profile.html" class="avatar"
                        ><img src="assets\img\profiles\avatar-12.jpg" alt=""
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
                      <a href="profile.html">Jeffrey Warden</a>
                    </h4>
                    <div class="small text-muted">Web Developer</div>
                  </div>
                </div>
                <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                  <div class="profile-widget">
                    <div class="profile-img">
                      <a href="profile.html" class="avatar"
                        ><img src="assets\img\profiles\avatar-13.jpg" alt=""
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
                      <a href="profile.html">Bernardo Galaviz</a>
                    </h4>
                    <div class="small text-muted">Web Developer</div>
                  </div>
                </div>
                <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                  <div class="profile-widget">
                    <div class="profile-img">
                      <a href="profile.html" class="avatar"
                        ><img src="assets\img\profiles\avatar-01.jpg" alt=""
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
                      <a href="profile.html">Lesley Grauer</a>
                    </h4>
                    <div class="small text-muted">Team Leader</div>
                  </div>
                </div>
                <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                  <div class="profile-widget">
                    <div class="profile-img">
                      <a href="profile.html" class="avatar"
                        ><img src="assets\img\profiles\avatar-16.jpg" alt=""
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
                      <a href="profile.html">Jeffery Lalor</a>
                    </h4>
                    <div class="small text-muted">Team Leader</div>
                  </div>
                </div>
                <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                  <div class="profile-widget">
                    <div class="profile-img">
                      <a href="profile.html" class="avatar"
                        ><img src="assets\img\profiles\avatar-04.jpg" alt=""
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
                      <a href="profile.html">Loren Gatlin</a>
                    </h4>
                    <div class="small text-muted">Android Developer</div>
                  </div>
                </div>
                <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                  <div class="profile-widget">
                    <div class="profile-img">
                      <a href="profile.html" class="avatar"
                        ><img src="assets\img\profiles\avatar-03.jpg" alt=""
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
                      <a href="profile.html">Tarah Shropshire</a>
                    </h4>
                    <div class="small text-muted">Android Developer</div>
                  </div>
                </div>
                <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                  <div class="profile-widget">
                    <div class="profile-img">
                      <a href="profile.html" class="avatar"
                        ><img src="assets\img\profiles\avatar-08.jpg" alt=""
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
                      <a href="profile.html">Catherine Manseau</a>
                    </h4>
                    <div class="small text-muted">Android Developer</div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /Page Content -->

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
                  <div class="modal-body">
                    <form>
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label class="col-form-label"
                              >First Name
                              <span class="text-danger">*</span></label
                            >
                            <input class="form-control" type="text" />
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label class="col-form-label">Last Name</label>
                            <input class="form-control" type="text" />
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label class="col-form-label"
                              >Username
                              <span class="text-danger">*</span></label
                            >
                            <input class="form-control" type="text" />
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label class="col-form-label"
                              >Email <span class="text-danger">*</span></label
                            >
                            <input class="form-control" type="email" />
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label class="col-form-label">Password</label>
                            <input class="form-control" type="password" />
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label class="col-form-label"
                              >Confirm Password</label
                            >
                            <input class="form-control" type="password" />
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label class="col-form-label"
                              >Employee ID
                              <span class="text-danger">*</span></label
                            >
                            <input type="text" class="form-control" />
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label class="col-form-label"
                              >Joining Date
                              <span class="text-danger">*</span></label
                            >
                            <div class="cal-icon">
                              <input
                                class="form-control datetimepicker"
                                type="text"
                              />
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label class="col-form-label">Phone </label>
                            <input class="form-control" type="text" />
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label
                              >Department
                              <span class="text-danger">*</span></label
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
                              <span class="text-danger">*</span></label
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
            <!-- /Add Employee Modal -->

            <!-- Edit Employee Modal -->
            <div
              id="edit_employee"
              class="modal custom-modal fade"
              role="dialog"
            >
              <div
                class="modal-dialog modal-dialog-centered modal-lg"
                role="document"
              >
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
                              >First Name
                              <span class="text-danger">*</span></label
                            >
                            <input
                              class="form-control"
                              value="John"
                              type="text"
                            />
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label class="col-form-label">Last Name</label>
                            <input
                              class="form-control"
                              value="Doe"
                              type="text"
                            />
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label class="col-form-label"
                              >Username
                              <span class="text-danger">*</span></label
                            >
                            <input
                              class="form-control"
                              value="johndoe"
                              type="text"
                            />
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label class="col-form-label"
                              >Email <span class="text-danger">*</span></label
                            >
                            <input
                              class="form-control"
                              value="johndoe@example.com"
                              type="email"
                            />
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label class="col-form-label">Password</label>
                            <input
                              class="form-control"
                              value="johndoe"
                              type="password"
                            />
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label class="col-form-label"
                              >Confirm Password</label
                            >
                            <input
                              class="form-control"
                              value="johndoe"
                              type="password"
                            />
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label class="col-form-label"
                              >Employee ID
                              <span class="text-danger">*</span></label
                            >
                            <input
                              type="text"
                              value="FT-0001"
                              readonly=""
                              class="form-control floating"
                            />
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label class="col-form-label"
                              >Joining Date
                              <span class="text-danger">*</span></label
                            >
                            <div class="cal-icon">
                              <input
                                class="form-control datetimepicker"
                                type="text"
                              />
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label class="col-form-label">Phone </label>
                            <input
                              class="form-control"
                              value="9876543210"
                              type="text"
                            />
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label
                              >Department
                              <span class="text-danger">*</span></label
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
                              <span class="text-danger">*</span></label
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
                        <button class="btn btn-primary submit-btn">Save</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- /Edit Employee Modal -->

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
            <!-- /Delete Employee Modal -->
          </div>
          <!-- /Page Wrapper -->
        </div>
      </div>
    </div>
  </body>
</html>