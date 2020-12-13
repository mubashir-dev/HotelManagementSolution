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
              <li class="breadcrumb-item active">Room Bookings</li>
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
                <h3 class="card-title">Book a Room</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?php echo base_url(
                  'admin/Rooms/makeBooking'
              ); ?>" method="post" name="room_booking" id="room_booking">
                <div class="card-body">
                <div class="form-group">
                    <label for="roomno">Room No</label>
                   <select class="form-control" name="room_no">
                       <option value="">Select Room No</option>
                       <?php 
                       foreach ($data_rooms as $row)
                       {
                        echo "<option value='{$row['id']}'>{$row['no']}</option>";
                       }
                       ?>
                    </select>
                    <div class="text-danger"> <?php echo form_error(
                        'room_no'
                    ); ?></div> 
                </div>
                  <div class="form-group">
                    <label for="no_of_beds">Select Customer</label>
                    <select class="form-control" name="customer_id">
                       <option value="">Select Customer</option>
                       <?php 
                       foreach ($data_customers as $row)
                       {
                        echo "<option value='{$row['id']}'>{$row['name']}</option>";
                       }
                       ?>
                    </select>
                    <div class="text-danger"> <?php echo form_error(
                        'customer_id'
                    ); ?></div>
                </div>
                  <div class="form-group">
                    <label for="rent">Rent per Night</label>
                    <input type="text" class="form-control" name="rent" id="rent" 
                    placeholder="Enter Rent"  value="<?php echo set_value(
                        'rent'
                    ); ?>">
                    <div class="text-danger"> <?php echo form_error(
                        'rent'
                    ); ?></div>
                </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Confirm Booking</button>
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
 
