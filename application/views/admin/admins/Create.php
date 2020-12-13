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
      <?php
    if(!empty($this->session->flashdata('msg')))
    {
        echo"<div class='alert alert-success' style='border-radius:0'>" . $this->session->flashdata('msg') ."</div><br>";
    }
  ?>
        <div class="row">
          <div class="col-lg-12">
          <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Add Administrator</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?php echo base_url('admin/Admin/create'); ?>" method="post" name="add_admin" id="add_admin">
                <div class="card-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name"
                    value="<?php echo set_value('name');?>"
                    >
                    <div class="text-danger"> <?php echo form_error('name');?></div> 
                </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" name="email" id="exampleInputEmail1"
                     placeholder="Enter email"
                     value="<?php echo set_value('email');?>">
                    <div class="text-danger"> <?php echo form_error('email');?></div>
                </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="password" id="exampleInputPassword1" 
                    placeholder="Password"  value="<?php echo set_value('password');?>">
                    <div class="text-danger"> <?php echo form_error('password');?></div>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword2">Confirm Password</label>
                    <input type="password" class="form-control" name="passconf" 
                    id="exampleInputPassword2" placeholder="Confirm Password"  value="<?php echo set_value('passconf');?>">
                    <div class="text-danger"> <?php echo form_error('passconf');?></div>
                </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Confirm Add</button>
                  <button type="submit" class="btn btn-success">Back</button>

                </div>
              </form>
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
 
