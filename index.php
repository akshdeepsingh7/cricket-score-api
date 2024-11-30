<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET' && !isset($_GET['url'])) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cricket Score Api</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                padding: 20px;
            }
            h1 {
                color: #333;
            }
            form {
                margin-top: 20px;
            }
            input[type="text"] {
                padding: 10px;
                width: 300px;
            }
            input[type="submit"] {
                padding: 10px;
                background-color: #5cb85c;
                color: white;
                border: none;
                cursor: pointer;
            }
            input[type="submit"]:hover {
                background-color: #4cae4c;
            }
        </style>
    </head>
    <body>
        <h1>Welcome to Cricket Score Api!</h1>
        <p>To get the latest cricket scores, please enter the URL of the live score page in the field below:</p>
        <form action="/" method="get">
            <input type="text" name="url" placeholder="Enter the Cricbuzz URL here" required>
            <input type="submit" value="Get Score">
        </form>
    </body>
    </html>
    <?php
    exit;
}

if (isset($_GET['url']) && !empty($_GET['url'])) {
    header('Content-Type: application/json');
    $url = filter_var($_GET['url'], FILTER_VALIDATE_URL);

    if ($url === false) {
        echo json_encode([
            "status" => "error",
            "message" => "Invalid URL format."
        ]);
        exit;
    }

    $html = file_get_contents($url);

    if ($html === false) {
        echo json_encode([
            "status" => "error",
            "message" => "Failed to retrieve data from the source."
        ]);
        exit;
    }

    $dom = new DOMDocument();
    libxml_use_internal_errors(true);
    $dom->loadHTML($html);
    libxml_clear_errors();

    $xpath = new DOMXPath($dom);
    $scoreCard = $xpath->query("//div[contains(@class, 'cb-col-100 cb-col cb-col-scores')]//span");

    $response = [
        "status" => "success",
        "message" => "Current Score",
    ];

    if ($scoreCard->length > 0) {
        $response["data"] = trim($scoreCard->item(0)->nodeValue);
    } else {
        $response["status"] = "error";
        $response["message"] = "Score card not found.";
    }

    echo json_encode($response);
    exit;
}
?>
