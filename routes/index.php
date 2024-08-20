<?php
// map my EventController and make endpoints available

require_once(__DIR__ . '/../controllers/EventController.php');

$controller = new EventController();

$method = $_SERVER['REQUEST_METHOD'];
$action = $_GET['action'] ?? '';
$id = $_GET['id'] ?? null;

switch ($method) {
    case 'GET':
        if ($action === 'getAllEvents') {
            $controller->getAllEvents();
        } elseif ($action === 'index') {
            $controller->index();
        } else {
            echo "Method not allowed";
        }
        break;

    case 'POST':
        if ($action === 'createEvent') {
            $controller->createEvent();
        } else {
            echo "Method not allowed";
        }
        break;

    case 'PUT':
        if ($action === 'updateEvent') {
            if (!$id) {
                echo "Missing parameter id";
                return;
            }
            $controller->updateEvent($id);
        } else {
            echo "Method not allowed";
        }
        break;

    case 'DELETE':
        if ($action === 'deleteEvent') {
            if (!$id) {
                echo "Missing parameter id";
                return;
            }
            $controller->deleteEvent($id);
        } else {
            echo "Method not allowed";
        }
        break;

    default:
        echo "Method not supported.";
        break;
}
