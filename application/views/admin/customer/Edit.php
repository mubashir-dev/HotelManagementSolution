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
              <li class="breadcrumb-item active">Customers</li>
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
                <h3 class="card-title">Edit Customer</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?php echo base_url('admin/Customers/Edit'); ?>" method="post" name="add_admin" id="add_admin">
                <div class="card-body">
                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name"
                    value="<?php echo $data['name']; ?>">
                    <div class="text-danger"> <?php echo form_error('name');?></div> 
                </div>
                  <div class="form-group">
                    <label for="contactid">Contact</label>
                    <input type="text" class="form-control" name="contact" id="contactid"
                     placeholder="Enter Contact"
                     value="<?php echo $data['contact']; ?>">
                    <div class="text-danger"> <?php echo form_error('contact');?></div>
                </div>
                  <div class="form-group">
                    <label for="cnicid">CNIC</label>
                    <input type="text" class="form-control" name="cnic" id="cnicid" 
                    placeholder="Enter CNIC"  value="<?php echo $data['cnic']; ?>">
                    <div class="text-danger"> <?php echo form_error('cnic');?></div>
                </div>
                <div class="form-group">
                    <label for="cityid">City</label>
                    <input type="text" class="form-control" name="city" 
                    id="cityid" placeholder="City"  value="<?php echo $data['city']; ?>">
                    <div class="text-danger"> <?php echo form_error('city');?></div>
                </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Confirm Edit</button>
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
 
