MotorY Task - Vehicles Website
Overview
MotorY Task is a web application built with PHP 8.2.4 and Yii2 framework. It provides CRUD (Create, Read, Update, Delete) functionalities for managing vehicles, including services and categories.

Getting Started
Prerequisites
PHP 8.2.4
Composer (for Yii2 dependencies)


Installation
Clone the repository:

bash
Copy code
git clone https://github.com/Yousef-M-Jaradat/motory_task.git
Install dependencies:

bash
Copy code
cd motory_task
composer install
Configure your web server to point to the web directory as the root.

Set up your database and configure the database connection in config/db.php.

Apply migrations to create the necessary database tables:

bash
Copy code
php yii migrate
Usage
Access the application in your web browser.

Use the CRUD functionalities to manage vehicles, services, and categories.

Project Structure
config: Configuration files for the application.
controllers: Controllers handling the application logic.
migrations: Database migrations for setting up the database schema.
models: Model classes representing the data entities.
views: View files for rendering the user interface.
web: Web-accessible files, including assets and entry scripts.
Contributing
If you would like to contribute to MotorY Task, please follow these steps:

Fork the repository.
Create a new branch for your feature or bug fix.
Make your changes and submit a pull request.
License
This project is licensed under the MIT License - see the LICENSE file for details.

Acknowledgments
Yii Framework - A high-performance PHP framework for web development.
