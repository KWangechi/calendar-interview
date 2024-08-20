
<?php

include_once("../config/db_connection.php");
class Event
{
    private string $title;
    private string $label;
    private string $description;
    private string $start_date;
    private string $end_date;
    private bool $allDay;
    private string $eventUrl;
    private string $location;

    public function __construct($title = "", $label = "", $description = "", $start_date = "", $end_date = "", $allDay = false, $eventUrl = "", $location = "")
    {
        $this->title = $title;
        $this->label = $label;
        $this->description = $description;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
        $this->allDay = $allDay;
        $this->eventUrl = $eventUrl;
        $this->location = $location;
    }


    public function getTitle()
    {
        return $this->title;
    }

    public function getLabel()
    {
        return $this->label;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getStartDate()
    {
        return $this->start_date;
    }

    public function getEndDate()
    {
        return $this->end_date;
    }

    public function getAllDay()
    {
        return $this->allDay;
    }

    public function getEventUrl()
    {
        return $this->eventUrl;
    }

    public function getLocation()
    {
        return $this->location;
    }


    // Setters

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setStartDate($start_date)
    {
        $this->start_date = $start_date;
    }

    public function setEndDate($end_date)
    {
        $this->end_date = $end_date;
    }

    /**
     * Create a calendar event
     * @param $event
     */
    public function createEvent(Event $event)
    {
        $conn = getConnection();

        $query = "INSERT INTO events(title, label, description, start_date, end_date, allDay, eventUrl, location) VALUES(?,?,?,?,?,?,?,?)";
        $statement = $conn->prepare($query);

        $statement->bind_param("ssssssss", $event->title, $event->label, $event->description, $event->start_date, $event->end_date, $event->allDay, $event->eventUrl, $event->location);

        if (!$statement->execute()) {
            echo "Error creating event";
            return false;
        }
        return true;

        closeConnection();
    }

    /**
     * Update a calendar event
     * @param $event
     */

    public function updateEvent($id, Event $event)
    {
        $conn = getConnection();

        if (!$this->findEvent($id)) {
            return false;
        }

        $query = "UPDATE events SET title=?, label=?, description=?, start_date=?, end_date=?, eventUrl=?, allDay=?, location=?  WHERE id=?";
        $statement = $conn->prepare($query);

        $statement->bind_param("ssssssssi", $event->title, $event->label, $event->description, $event->start_date, $event->end_date, $event->allDay, $event->eventUrl, $event->location, $id);

        $result = $statement->execute();

        if (!$result) {
            echo "Error updating event";
            return false;
        }

        return true;

        closeConnection();
    }

    /**
     * Delete a calendar event
     * @param $event
     */

    public function deleteEvent($id)
    {
        if (!$this->findEvent($id)) {
            return false;
        }

        $conn = getConnection();
        $query = "DELETE FROM events WHERE id=?";
        $statement = $conn->prepare($query);

        $statement->bind_param("i", $id);

        $result = $statement->execute();

        if (!$result) {
            echo "Error deleting event";
            return false;
        }

        return true;

        closeConnection();
    }

    /**
     * Check if a calendar event exists given the event id
     * @param $id
     */
    public function findEvent($id)
    {
        $conn = getConnection();

        $query = "SELECT * FROM events WHERE id=?";
        $statement = $conn->prepare($query);
        $statement->bind_param("i", $id);
        $statement->execute();

        $result = $statement->get_result();

        if ($result->num_rows === 0) {
            echo json_encode([
                "status" => 404,
                "message" => "Event Not Found",
            ]);
            return false;
        }

        return true;
    }
}



?>