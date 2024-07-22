<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <title>Admin Dashboard</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #333;
            color: white;
            padding: 1rem 0;
            z-index: 1000;
        }

        header h1 {
            margin: 0;
            padding: 0 1rem;
        }

        header nav {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        header nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
        }

        header nav ul li {
            margin: 0 1rem;
        }

        header nav ul li a {
            color: white;
            text-decoration: none;
        }

        .button-box {
            display: inline-block;
            padding: 0.5rem;
            background-color: #007bff;
            color: white;
            text-align: center;
            border-radius: 5px;
            text-decoration: none;
        }

        .button-box:hover {
            background-color: #0056b3;
        }

        main {
            padding-top: 5rem; /* Adjust this value based on the height of your header */
        }

        section article {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1rem;
            padding: 1rem;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        section article h2 {
            margin: 0;
        }

        section article p {
            margin: 0.5rem 0 0 0;
            text-align: justify;
            margin-right: 2%;
        }
    </style>
</head>
<body>
    <header>
        <h1>Admin Dashboard</h1>
        <nav>
            <ul>
                <li><a href="../content/create_content.php">Create Content</a></li>
                <li><a href="index.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section>
            <h2>Your Content</h2>
            <?php
            require '../config/config.php';
            $sql = "SELECT * FROM content";
            $result = $conn->query($sql);

            while ($row = $result->fetch_assoc()) {
                echo "<article data-id='" . $row['id'] . "'>";
                echo "<div>";
                echo "<h2>" . htmlspecialchars($row['title']) . "</h2>";
                echo "<p>" . nl2br(htmlspecialchars($row['body'])) . "</p>";
                echo "</div>";
                echo "<a href='../content/update_content.php?id=" . $row['id'] . "' class='button-box'>Update</a>";
                echo "<button class='delete-button' data-id='" . $row['id'] . "'>Delete</button>";
                echo "</article>";
            }
            ?>
        </section>
    </main>
    
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const deleteButtons = document.querySelectorAll('.delete-button');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const contentId = this.dataset.id;
                    const articleElement = this.closest('article');
                    if (confirm('Are you sure you want to delete this content?')) {
                        fetch(`../content/delete_content.php?id=${contentId}`, {
                            method: 'GET'
                        }).then(response => response.json()).then(data => {
                            if (data.status === 'success') {
                                articleElement.remove();
                            } else {
                                alert('Failed to delete content.');
                            }
                        }).catch(error => {
                            console.error('Error:', error);
                            alert('Failed to delete content.');
                        });
                    }
                });
            });
        });
    </script>
</body>
</html>
