<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Embedded CSS */

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 1rem 0;
            text-align: center;
        }

        header h1 {
            margin: 0;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
        }

        nav ul li {
            display: inline;
            margin: 0 1rem;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
        }

        main {
            margin: 2rem auto;
            max-width: 800px;
            padding: 1rem;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        section h2 {
            margin-top: 0;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 1rem 0;
            position: fixed;
            width: 100%;
            bottom: 0;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        form label {
            margin: 0.5rem 0 0.2rem;
        }

        form input, form textarea {
            padding: 0.5rem;
            margin-bottom: 1rem;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        form button {
            padding: 0.7rem;
            border: none;
            background-color: #333;
            color: #fff;
            border-radius: 4px;
            cursor: pointer;
        }

        form button:hover {
            background-color: #555;
        }

        article {
            margin-bottom: 2rem;
        }
    </style>
    <title>Simple CMS</title>
</head>
<body>
    <header>
        <h1>Welcome to the Simple CMS</h1>
        <nav>
            <ul>
                <li><a href="login.php">Login</a></li>
                
            </ul>
        </nav>
    </header>
    <main>
        <section>
            <h2>Latest Content</h2>
            <?php include '../content/read_content.php'; ?>
        </section>
    </main>
    
    <script>
        // Embedded JavaScript
        document.addEventListener("DOMContentLoaded", function() {
            // Example of JavaScript functionality
            console.log("JavaScript is loaded and running!");
        });
    </script>
</body>
</html>
