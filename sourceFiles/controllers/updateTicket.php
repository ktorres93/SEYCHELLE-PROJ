<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
  include_once '../../config.php';
  //would use ticketStatus.php but due to time constraints db is going to be most stable for this
  include_once '../models/db.php';
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();
  // Instantiate blog Ticket object
  $Ticket = new Ticket($db);
  // Get raw Ticketed data
  $data = json_decode(file_get_contents("php://input"));
  // Set Ticket to update
  $Ticket->ticket_id = $data->ticket_id;
  $Ticket->status_id  = $data->status_id;

  if($Ticket->update()) {
    echo json_encode(
      array('message' => 'Ticket' . $ticket_id . 'Updated')
    );
  } else {
    echo json_encode(
      array('message' => 'Ticket Not Updated')
    );
}