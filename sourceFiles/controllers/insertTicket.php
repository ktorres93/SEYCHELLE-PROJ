    
<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: Post');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
  include_once '../../config.php';
  include_once '../models/tickets.php';
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();
  // Instantiate blog Ticket object
  $Ticket = new Ticket($db);
  // Get raw Ticket data
  $data = json_decode(file_get_contents("php://input"));
  $Ticket->ticket_date = $data->ticket_date;
  $Ticket->user_email= $data->user_email;
  $Ticket->user_full_name= $data->user_full_name;
  $Ticket->user_phone = $data->user_phone;
  $Ticket->ticket_title = $data->ticket_title;
  $Ticket->ticket_description= $data->ticket_description;
  $Ticket->ticket_status_id= $data->ticket_status_id;

  // Create Ticket
  if($Ticket->create()) {
    echo json_encode(
      array('message' => 'Ticket'.  $ticket_id . 'Created')
    );
  } else {
    echo json_encode(
      array('message' => 'Ticket Not Created (All fields required)')
    );
  }