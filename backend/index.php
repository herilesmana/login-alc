<?php

require '../config/connection.php';
$query = mysqli_query($conn, 'SELECT * FROM approvers ORDER BY urutan asc');

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login Alc Backend</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../images/favicon.png" />
</head>
<body>
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form enctype="multipart/form-data" method="POST" class="forms-sample" id="form" action="http://localhost/login-alc/system/add_approver.php">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label" for="name">Name</label>
                      <div class="col-sm-9">
                        <input class="form-control" name="name" id="name" type="text" placeholder="Name">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label" for="card-number">Card Number</label>
                      <div class="col-sm-9">
                        <input class="form-control" name="card_number" id="card-number" type="text" placeholder="Card Number">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label" for="foto">Foto</label>
                      <div class="col-sm-9">
                        <input class="form-control" name="foto" id="foto" type="file" placeholder="Foto">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label" for="audio">Audio</label>
                      <div class="col-sm-9">
                        <input class="form-control" name="audio" id="audio" type="file" placeholder="Audio">
                      </div>
                    </div>
                    <button class="btn btn-gradient-primary mr-2" type="submit">Save</button>
                    <button type="button" class="btn btn-light" onClick="closeModal()">Cancel</button>
                  </form>
          </div>
        </div>
      </div>
    </div>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="../index.html"><img src="../images/logo.svg" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="../index.html"><img src="../images/logo-mini.svg" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/login-alc">
              <span class="menu-title">Login Alc</span>
              <i class="mdi mdi-home menu-icon"></i>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-home"></i>
              </span>
              Approver Alc System
            </h3>
          </div>
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <button class="btn btn-gradient-primary" data-toggle="modal" data-target="#modal"><strong><i class="mdi mdi-plus"></i></strong></button>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Name</th>
                          <th>Card Number</th>
                          <th>Foto</th>
                          <th>Audio</th>
                          <th>ACT</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no = 1; while ($approver = mysqli_fetch_assoc($query)) { ?>
                          <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $approver['name']; ?></td>
                            <td><?php echo $approver['card_number']; ?></td>
                            <td><?php echo $approver['foto']; ?></td>
                            <td><?php echo $approver['audio']; ?></td>
                            <td><a onClick="edit('<?php echo $approver['id']; ?>')" title="Edit" href="javascript:;" data-toggle="modal" data-target="#modal"><i class="mdi mdi-pencil menu-icon"></i></a></td>
                          </tr>
                        <?php $no++; } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="../vendors/js/vendor.bundle.base.js"></script>
  <script src="../vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="../js/off-canvas.js"></script>
  <script src="../js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../js/dashboard.js"></script>
  <!-- End custom js for this page-->
  <script type="text/javascript">
    function closeModal()
    {
      $('#modal').modal('hide');
    }
    function edit(id)
    {
      $.ajax({
        url: 'http://localhost/login-alc/system/get_approver.php',
        dataType: 'JSON',
        type: 'POST',
        data: {
          id : id
        },
        success: function ( response ) {
          console.log( response );
        },
        error : function ( error ) {
          console.log( error );
        }
      })
    }
  </script>
</body>

</html>
