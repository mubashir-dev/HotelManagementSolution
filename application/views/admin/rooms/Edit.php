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
              <li class="breadcrumb-item active">Rooms</li>
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
                <h3 class="card-title">Edit Room</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?php echo base_url(
                  'admin/Rooms/Edit'
              ); ?>" method="post" name="edit_room" id="edit_room">
                <div class="card-body">
                <div class="form-group">
                <input type="text" name="id" <?php echo $data['id']; ?> hidden="hidden">
                    <label for="roomno">Room No</label>
                    <input type="text" class="form-control" name="roomno" id="roomno" placeholder="Enter Room No"
                    value="<?php echo $data['no']; ?>"
                    >
                    <div class="text-danger"> <?php echo form_error(
                        'roomno'
                    ); ?></div> 
                </div>
                  <div class="form-group">
                    <label for="no_of_beds">No of Beds</label>
                    <input type="text" class="form-control" name="no_of_beds" id="no_of_beds"
                     placeholder="Enter No of Beds"
                     value="<?php echo $data['no_of_bed']; ?>">
                    <div class="text-danger"> <?php echo form_error(
                        'no_of_beds'
                    ); ?></div>
                </div>
                  <div class="form-group">
                    <label for="rent">Rent per Night</label>
                    <input type="text" class="form-control" name="rent" id="rent" 
                    placeholder="Enter Rent"   value="<?php echo $data[
                        'rent'
                    ]; ?>">
                    <div class="text-danger"> <?php echo form_error(
                        'rent'
                    ); ?></div>
                </div>
                <div class="form-group">
                    <label for="descp">Description</label>
                    <input type="text" class="form-control" name="descp" 
                    id="descp" placeholder="Short Description"  
                    value="<?php echo $data['description']; ?>">
                    <div class="text-danger"> 
                    <?php echo form_error('descp'); ?></div>
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
 
