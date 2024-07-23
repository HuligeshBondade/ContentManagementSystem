# Content Management System (CMS)

## Overview

This Content Management System (CMS) is a web application developed using PHP, XAMPP, and MySQL. It allows administrators to perform CRUD (Create, Read, Update, Delete) operations on website content. The CMS features a user-friendly interface for managing content, including creating new entries, viewing existing ones, updating them, and deleting as needed.

## Features

- **Create**: Add new content with a title and body text.
- **Read**: View a list of all content entries.
- **Update**: Edit existing content by modifying the title or body text.
- **Delete**: Remove content entries with a confirmation prompt.

## Snapshots
  
  ![index](https://github.com/user-attachments/assets/90b820c7-c2f6-4f80-8f8d-de17278a65e7)
  ![admin_dashboard](https://github.com/user-attachments/assets/7c77041e-cefe-4794-9eb1-8500ada244c1)
  ![update_content](https://github.com/user-attachments/assets/2d9fb4fc-175a-455c-a5aa-d70542170c2b)



## Setup and Installation

### Prerequisites

- XAMPP or any other PHP server with MySQL support
- PHP 7.0 or higher
- MySQL database

### Local Setup

1. **Clone or Download the Repository**:
   - Clone the repository using Git or download the ZIP file and extract it.

2. **Place the Files**:
   - Place the project files into the `htdocs` directory of your XAMPP installation.

3. **Configure the Database**:
   - Create a new MySQL database using phpMyAdmin.
   - Import the provided SQL schema to set up the database structure.
   - Update the `config.php` file with your database credentials:
     ```php
     <?php
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "your_database_name";
     
     $conn = new mysqli($servername, $username, $password, $dbname);
     
     if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
     }
     ?>
     ```

4. **Start the Server**:
   - Launch XAMPP and start the Apache and MySQL services.

5. **Access the CMS**:
   - Open your web browser and navigate to `http://localhost/cms/public/`.

## Deployment

The CMS is also deployed and accessible online at:

[http://cms12.rf.gd/cms/public/](https://cms12.rf.gd/cms/public/)

## Admin Login

- **Username**: Admin
- **Password**: 123

Use these credentials to log in and access the administrative features of the CMS.

## Usage

1. **Login**: Use the admin credentials to log in to the dashboard.
2. **Create Content**: Navigate to the 'Create Content' page to add new entries.
3. **View Content**: Go to the 'Admin Dashboard' to view a list of all content.
4. **Update Content**: Click the 'Update' button next to any content entry to modify it.
5. **Delete Content**: Click the 'Delete' button next to any content entry to remove it.

## Troubleshooting

- **Database Connection Issues**: Ensure that the database credentials in `config.php` are correct and that the MySQL server is running.
- **File Permissions**: Make sure that PHP files have the correct permissions.

## Acknowledgements

- XAMPP for the local development environment.
- MySQL for database management.
- PHP for server-side scripting.

