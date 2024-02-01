# MotorY Task - Vehicles Website

## Overview

Welcome to MotorY Task, a robust web application meticulously crafted with PHP 8.2.4 and the Yii2 framework. It seamlessly integrates CRUD (Create, Read, Update, Delete) functionalities to facilitate the efficient management of vehicles, encompassing services and categories.

## Getting Started

### Prerequisites

Ensure your system meets the following prerequisites:

- PHP 8.2.4
- Composer (for Yii2 dependencies)
- Web server (e.g., Apache, Nginx)

### Installation

1. **Clone the repository:**

   ```bash
   git clone https://github.com/Yousef-M-Jaradat/motory_task.git
   
   ```bash
   cd motory_task
   
    ```bash
   composer install

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
