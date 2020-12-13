<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class room_model extends CI_Model {

    public function getRoomByStatus()
	{
        $this->db->where('status',0);
        $room = $this->db->get('rooms')->result_array();
        return $room;
    }
    public function getRoomById($id)
	{
        $this->db->where('id',$id);
        $room = $this->db->get('rooms')->row_array();
        return $room;
    }
    
    public function get_rooms(){
        $rooms = $this->db->get('rooms')->result_array();
        return $rooms;   
    }
    public function saveRoom($data_array){
    
        $this->db->insert("rooms",$data_array);    
    }

    public function updateRoom($data_array,$id)
    {
        $this->db->where('id', $id);
        $this->db->update('rooms', $data_array);
    }

    public function deleteRoom($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('rooms');
        
    }

    public function makeRoomBooking($booking)
    {
        $this->db->insert("room_book",$booking);  
    }

    //update status

    public function updateStatusroom($data_array,$id)
    {
        // $data_array['status'] = 1;
        $this->db->where('id', $id);
        $this->db->update('rooms', $data_array);
    }

    // Booked Rooms

    public function getBookedRooms()
    {
        $this->db->select('*');
        $this->db->from('room_book');
        $this->db->join('customers', 'customers.id = room_book.customer_id');
        $this->db->join('rooms', 'rooms.id = room_book.room_id');
        $booked_room = $this->db->get()->result_array();
        return $booked_room;
    }
    //Make Checkout
    public function makeCheckout($data_array,$id,$customer_id)
    {
        $this->db->where('id', $id);
        $this->db->update('room_book', $data_array);
    }
    //Get all Booked rooms
    public function getBookedRoomsId($id)
    {
        $this->db->where('id', $id);
        $booked_room = $this->db->get('room_book')->row_array();
        return $booked_room;
    }
    
    }