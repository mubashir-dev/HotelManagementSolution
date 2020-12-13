 <!-- Include header -->
 <?php $this->load->view('admin/include/header'); ?>
 <!-- End of header Include -->
 

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Admins</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
      <?php if (!empty($this->session->flashdata('msg'))) {
          echo "<div class='alert alert-success' style='border-radius:0'>" .
              $this->session->flashdata('msg') .
              '</div><br>';
      } ?>
        <div class="row">
          <div class="col-lg-12">
          <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Administrators</h3>
              </div>
              <!-- /.card-header -->

    
              <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Hash</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($data as $row) {
                        echo "<tr>";
                        echo "<td>".$row['id']."</td>";
                        echo "<td>".$row['name']."</td>";
                        echo "<td>".$row['email']."</td>";
                        echo "<td>".$row['password']."</td>";
                        echo '<td><a href="'.base_url().'admin/Admin/update_data?id='.$row['id'].'"class="btn btn-warning btn-sm">Edit</a></td>';
                        echo '<td><a href="'.base_url().'admin/Admin/delete_admin?id='.$row['id'].'"class="btn btn-danger btn-sm">Delete</a></td>';
                        echo "</tr>";

                    } ?>
                  </tbody>
                </table>
              
            </div>
          </div>
          <!-- /.col-md-12 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->





<!-- Include footer -->
<?php $this->load->view('admin/include/footer'); ?>
 <!-- End of footer Include -->
 
