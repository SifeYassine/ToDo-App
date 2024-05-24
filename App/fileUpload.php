<!DOCTYPE html>
<html>
<head>
    <style>
        .hidden {
            display: none;
        }
        .upload-label {
            height: 40px;
            text-align: center;
            font-weight: bold;
            background-color: #7777ff;
            border-radius: 10px;
            width: 120px;
            padding-top: 8px;
            box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.25);
            cursor: pointer;
            display: inline-block;
        }
    </style>
    <script>
        function submitForm() {
            document.getElementById("uploadForm").submit();
        }
    </script>
</head>
<body>
    <form id="uploadForm" method="post" enctype="multipart/form-data">
        <label for="fileToUpload" class="upload-label">
            Import Tasks
            <input type="file" id="fileToUpload" name="fileToUpload" class="hidden" onchange="submitForm()">
        </label>
    </form>

    <?php
    include './crudMethods/dbConnect.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $target_dir = "uploads/";

        if (!is_dir($target_dir)) {
            mkdir($target_dir);
        }

        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "<br><div>The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded</div>";

            $file = fopen($target_file, "r");
            if ($file) {
                $pdo = new PDO($dsn, $user, $pass, $options);

                $sql = "INSERT INTO tasks (title, description, due_date, priority, progress, user_id, category_id) VALUES (:title, :description, :due_date, :priority, :progress, :user_id, :category_id)";
                $stmt = $pdo->prepare($sql);

                $user_id = 1;
                $category_id = 1;
                $counter = 0;

                while (($line = fgetcsv($file)) !== false) {
                    // Skip the header row
                    if ($counter > 0) { 
                        $title = $line[0];
                        $description = $line[1];
                        $due_date = $line[2];
                        $priority = $line[3];
                        $progress = $line[4];
                
                        $stmt->bindParam(':title', $title);
                        $stmt->bindParam(':description', $description);
                        $stmt->bindParam(':due_date', $due_date);
                        $stmt->bindParam(':priority', $priority);
                        $stmt->bindParam(':progress', $progress);
                        $stmt->bindParam(':user_id', $user_id);
                        $stmt->bindParam(':category_id', $category_id);
                
                        try {
                            $stmt->execute();
                        } catch (PDOException $e) {
                            continue; 
                        }
                    }
                    $counter++;
                }                

                fclose($file);
                echo "<br><div>Tasks have been successfully imported.</div>";
                header("Location: ./index.php");
                exit();
            } else {
                echo "Error reading file.<br>";
            }
        } else {
            echo "Sorry, there was an error uploading your file.<br>";
        }
    }
    ?>
</body>
</html>
