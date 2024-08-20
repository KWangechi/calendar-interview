<?php
// create the Controller for inserting events into the database

include_once('../config/db_connection.php');
include_once("../models/Event.php");
include("../routes/index.php");


class EventController
{

    public function index()
    {
        echo "This is so cool";
    }

    public function getAllEvents()
    {
        $conn = getConnection();
        $query = "SELECT id, title, description, start_date, end_date FROM events";

        $stmt = $conn->prepare($query);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            echo json_encode([
                "status" => http_response_code(200),
                "message" => "No results found",
                "data" => [],
            ]);

            return json_encode([
                "status" => http_response_code(200),
                "message" => "No results found",
                "data" => [],
                "message" => "No results found"
            ]);
        }

        // return a JSON response of the data
        echo json_encode([
            "status" => http_response_code(200),
            "message" => "Success",
            "data" => $result->fetch_all(MYSQLI_ASSOC)
        ]);

        return json_encode([
            "status" => http_response_code(200),
            "message" => "Success",
            "data" => $result->fetch_all(MYSQLI_ASSOC)
        ]);
    }


    // method to insert a new event into the database
    public function createEvent()
    {
        $data = json_decode(file_get_contents("php://input"));

        $newEvent = new Event($data->title, $data->label, $data->description, $data->start_date, $data->end_date, $data->allDay, $data->eventUrl, $data->location);

        $result = $newEvent->createEvent($newEvent);

        if (!$result) {
            echo json_encode([
                "status" => http_response_code(400),
                "message" => "Error creating event",
                "data" => []
            ]);
            return;
        }

        echo json_encode([
            "status" => http_response_code(201),
            "message" => "Event created successfully",
            "data" => $data
        ]);

        return;
    }

    // method to update an existing event in the database
    public function updateEvent($id)
    {
        $data = json_decode(file_get_contents("php://input"));

        $updatedEvent = new Event($data->title, $data->label, $data->description, $data->start_date, $data->end_date, $data->allDay, $data->eventUrl, $data->location);

        if (!$updatedEvent->updateEvent($id, $updatedEvent)) {
            return;
        }

        echo json_encode([
            "status" => 200,
            "message" => "Event updated successfully",
            "data" => $data
        ]);
    }

    /**
     * Delete an event from the database
     * @param int $id
     */
    public function deleteEvent($id)
    {

        $event = new Event();

        if (!$event->deleteEvent($id)) {
            return;
        };

        echo json_encode([
            "status" => http_response_code(200),
            "message" => "Event deleted successfully!"
        ]);
    }
}
