<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouTube Audio Downloader</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
            background-image: url(images/dl.jpg);
            background-size: 80%;
            background-position: center;
        }
        
        .form-container {
            background: rgba(255, 255, 255, 0.2); 
            padding: 30px; 
            border-radius: 15px; 
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); 
            width: 350px; 
            backdrop-filter: blur(10px); 
        }
        
        h2 {
            margin-bottom: 20px;
            font-size: 24px; 
            font-weight: bold;
            color: #333;
        }
        
        input {
            width: 90%; 
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
        }
        
        button {
            width: 100%;
            padding: 12px;
            background: lightpink;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 18px;
            transition: background 0.3s ease;
        }
        
        button:hover {
            background: #d65a7a;
        }
        
        p {
            margin-top: 15px;
            font-size: 14px;
            color: #333;
        }
        
        a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }
        
        a:hover {
            text-decoration: underline;
        }
        
        </style>
</head>
<body>
    
    <form action="download.php" method="POST">
    <h2>VIDEO TO AUDIO CONVERTER</h2><br><br>
        <input type="text" name="youtube_url" placeholder="Enter YouTube URL" required>
        <button type="submit">Download</button>
    </form>
    
</body>
</html>