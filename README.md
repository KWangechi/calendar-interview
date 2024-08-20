# 📅 Calendar CRUD Operations

Welcome to the Calendar CRUD Operations task! This task is designed to assess your ability to understand existing code and modify it to include CRUD (Create, Read, Update, Delete) operations with a database. You will be working on the backend implementation and ensuring seamless integration with the calendar frontend.

## 📝 Task Overview

Your objective is to:

- Create a fork of the codebase
- Understand the given codebase.
- Modify the relevant files to add CRUD operations for handling calendar events.
- Ensure proper database connection and interaction.
- Implement the backend file structure and APIs.
- Ensure the calendar frontend interacts smoothly with the backend.

## 🔍 Assessment Criteria

Your task will be assessed based on:

1. **Database Connection**: Efficient and secure connection to the database.
2. **Backend Implementation**: Clean and organized file structure.
3. **API Development**: Robust and well-documented APIs for CRUD operations.
4. **Frontend Integration**: Smooth and functional integration of the calendar with the backend.

## 📂 Project Structure

```
calendar-crud-operations/
├── assets/
│   ├── css/
│   ├── img/
│   ├── js/
│   ├── json/
│   ├── vendor/
├── config/
    ├── db_connection.php/
├── controllers/
|   ├── EventController.php/
├── includes/
│   ├── scripts.php
│   ├── search_bar.php
│   ├── sidebar.php
├── models/
|   ├── Event.php/
├── routes/
|   ├── index.php/
├── .gitignore
├── header.php
├── footer.php
├── index.php
├── README.md

```

## 📖 API Documentation

### Add Event

- **URL**: `localhost/calendar-interview/controllers/EventController.php?action=createEvent`
- **Method**: `POST`

### Fetch Events

- **URL**: `localhost/calendar-interview/controllers/EventController.php?action=getAllEvents`
- **Method**: `GET`

### Update Event

- **URL**: `localhost/calendar-interview/controllers/EventController.php?action=updateEvent&id=:id`
- **Method**: `PUT`

### Delete Event

- **URL**: `localhost/calendar-interview/controllers/EventController.php?action=deleteEvent&id=:id`
- **Method**: `DELETE`

## 💡 Tips for Success

- Ensure your database connection is secure and handles errors gracefully.
- Keep your code modular and organized for scalability.
- Write clear and concise API documentation.
- Test your API endpoints thoroughly.

## 📬 Contact

For any questions or clarifications, feel free to reach out via [fiona@vesencomputing.com](mailto:fiona@vesencomputing.com).
