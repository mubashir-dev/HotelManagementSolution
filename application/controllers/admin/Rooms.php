
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rooms extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('room_model');
        $this->load->model('customer_model');

    }
    public function index()
    {
        $rooms = $this->room_model->get_rooms();
        $result['data'] = $rooms;
        $this->load->view('admin/rooms/Rooms', $result);
    }
    public function Room()
    {
        $this->load->view('admin/rooms/Create');
    }

    //Add Room
    public function create()
    {
        $this->form_validation->set_rules(
            'roomno',
            'Room No',
            'required|max_length[10]|is_unique[rooms.no]'
        );
        $this->form_validation->set_rules(
            'no_of_beds',
            'No of Beds',
            'required'
        );
        $this->form_validation->set_rules('rent', 'Room Rent', 'required');
        $this->form_validation->set_rules('descp', 'Description', 'required');

        if ($this->form_validation->run() == true) {
            $data_array = [];
            $data_array['no'] = $this->input->post('roomno');
            $data_array['no_of_bed'] = $this->input->post('no_of_beds');
            $data_array['description	'] = $this->input->post('descp');
            $data_array['rent'] = $this->input->post('rent');
            $data_array['created_at'] = date('Y-m-d H:i:s');
            $data_array['updated_at'] = date('Y-m-d H:i:s');
            // $this->room_model->saveRoom($data_array);
            //     $this->session->set_flashdata(
            //         'msg',
            //         'Room Created Successfully'
            //     );
                redirect(base_url('admin/Rooms/index'), 'refresh');
            
        } else {
            $this->load->view('admin/rooms/Create');
        }
    }
    // Updatedata Room
    public function update_data()
    {
        $id = $this->input->get('id');
        $customer = $this->room_model->getRoomById($id);
        $result['data'] = $customer;
        $this->load->view('admin/rooms/Edit', $result);
    }

    // Edit Room

    public function Edit()
    {
        $this->form_validation->set_rules(
            'roomno',
            'Room No',
            'required|max_length[10]'
        );
        $this->form_validation->set_rules(
            'no_of_beds',
            'No of Beds',
            'required'
        );
        $this->form_validation->set_rules('rent', 'Room Rent', 'required');
        $this->form_validation->set_rules('descp', 'Description', 'required');

        if ($this->form_validation->run() == true) {
            $data_array = [];
            $id = $this->input->post('id');
            $data_array['no'] = $this->input->post('roomno');
            $data_array['no_of_bed'] = $this->input->post('no_of_beds');
            $data_array['description'] = $this->input->post('descp');
            $data_array['rent'] = $this->input->post('rent');
            $data_array['updated_at'] = date('Y-m-d H:i:s');
            // $this->room_model->updateRoom($data_array,$id);

            $this->session->set_flashdata('msg', 'Good To Go');
            redirect(base_url('admin/Rooms/index'), 'refresh');
        } else {
            $this->session->set_flashdata('msg', 'Not Good To Go');
            redirect(base_url('admin/Rooms/Edit'));
        }
    }
    //Delete room
    public function delete_room()
    {
        $id = $this->input->get('id');
        $this->room_model->deleteRoom($id);
        $this->session->set_flashdata('msg', 'Room Deleted Successfully');
        redirect(base_url() . 'admin/Rooms/index', 'refresh');
    }

    // Book a Room
    public function RoomBooking()
    {
        $rooms = $this->room_model->getRoomByStatus();
        $result['data_rooms'] = $rooms;
        $customers = $this->customer_model->getCustomerStatus();
        $result['data_customers'] = $customers;
        $this->load->view('admin/rooms/BookRoom',$result);
    }

    // Booked rooms
    public function BookedRooms()
    {
        $rooms = $this->room_model->getBookedRooms();
        $result['booked_room'] = $rooms;
        $this->load->view('admin/rooms/BookedRoom',$result);
    }
    // MakeBooking
    public function makeBooking(){
       
         $this->form_validation->set_rules('rent', 'Room Rent', 'required');
         $this->form_validation->set_rules('customer_id', 'Customer', 'required');
         $this->form_validation->set_rules('room_no', 'Room No', 'required');


        if ($this->form_validation->run() == true)
        {
            $data_array = [];
            $data_array['customer_id'] = $this->input->post('customer_id');
            $data_array['room_id'] = $this->input->post('room_no');
            $data_array['rent'] = $this->input->post('rent');
            $data_array['check_in'] = date('Y-m-d H:i:s');
            $this->room_model->makeRoomBooking($data_array);
            $data_customers['status'] = 1;
            $data_room['status'] = 1;
            $this->customer_model->updateStatusCustomer($this->input->post('customer_id'),$data_customers);
            $this->room_model->updateStatusroom($data_room,$this->input->post('room_no'));
            $this->session->set_flashdata('msg', 'Room Booking has been made');
             redirect(base_url('admin/Rooms/RoomBooking'));
        }
        else
        {
        
        $rooms = $this->room_model->get_rooms();
        $result['data_rooms'] = $rooms;
        $customers = $this->customer_model->get_customers();
        $result['data_customers'] = $customers;
        $this->load->view('admin/rooms/BookRoom',$result);
        }
    }

    // Make Checkout
    public function makeCheckOut(){
        $id = $this->input->get('id');
        //Get BookRoom Data
        $book_room = $this->room_model->getBookedRoomsId($id);
        print_r($book_room);
        foreach ($book_room as $row){
            $customers_id = $book_room['customer_id'];
            $room_id = $book_room['room_id'];
    
        }

        //update status room 
        $data_rooms['status'] = 0;
        $this->room_model->updateStatusroom($data_rooms,$room_id);
        //update checkout time
        $data_array['check_out'] = date('Y-m-d H:i:s');
        $this->room_model->makeCheckout($data_array,$room_id,$customers_id);
        //update customer status
        $data_customers['status'] = 1;
        $this->customer_model->updateStatusCustomer($customers_id,$data_customers);
        $this->session->set_flashdata('msg', 'Successful Checkout');
        redirect(base_url('admin/Rooms/BookedRooms'), 'refresh');
    }
}

