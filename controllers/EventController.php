<?php
// create the Controller for inserting events into the database

include_once('../config/db_connection.php');


class EventController {

   public function index() {
    echo "This is so cool";
    }

    public function getEvents() {
        // get the database connection
        $conn = getConnection();
        $query = "SELECT * FROM events";

        // get all the events
        $stmt = $conn->prepare($query);
        $stmt->execute();

        if(!$stmt->get_result()) {
            return 'No results found.';
        }

        // fetch all the rows
        $result = $stmt->get_result();

        // return a JSON response of the data
        return json_encode($result->fetch_all(MYSQLI_ASSOC));
    }

    
    // method to insert a new event into the database
    public function insertEvent($title, $description, $start_date, $end_date) {
        // get the database connection
        $conn = getConnection();
        $newEvent = new Event($title, $description, $start_date, $end_date);

        // prepare SQL statement and bind the attributes individually

        
        $stmt = $conn->prepare("INSERT INTO events (title, description, start_date, end_date, user_id) VALUES (?,?,?,?,?)");
    }

    // method to update an existing event in the database
    public function updateEvent($id, $title, $description, $start_date, $end_date) {
        // get the database connection
        $conn = getConnection();
    }

    // method to delete an existing event from the database
    public function deleteEvent($id) {
        // get the database connection
        $conn = getConnection();
    }

    // method to retrieve all events for a specific user
    // public function getAllEventsForUser($user_id) {
    //     // get the database connection
    //     $conn = getConnection();
    // }

    // // method to retrieve all events within a specific date range
    // public function getAllEventsInRange($start_date, $end_date) {
    //     // get the database connection
    //     $conn = getConnection();
    // }
    // method to retrieve all events that are in the current month
    // public function getAllEventsInCurrentMonth() {
    //     // get the database connection
    //     $conn = getConnection();
    // }
    // // method to retrieve all events that are in the current week
    // public function getAllEventsInCurrentWeek() {
    //     // get the database connection
    //     $conn = getConnection();
    // }
    // // method to retrieve all events that are in the current day
    // public function getAllEventsInCurrentDay() {
    //     // get the database connection
    //     $conn = getConnection();
    // }
    // // method to retrieve all events that are in the current hour
    // public function getAllEventsInCurrentHour() {
    //     // get the database connection
    //     $conn = getConnection();
    // }
    
}


?>