<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['youtube_url']) && !empty($_POST['youtube_url'])) {
        $youtube_url = trim($_POST['youtube_url']);
        $youtube_url = filter_var($youtube_url, FILTER_SANITIZE_URL);

        if (filter_var($youtube_url, FILTER_VALIDATE_URL)) {
            $output_dir = "downloads/";
            if (!is_dir($output_dir)) {
                mkdir($output_dir, 0777, true);
            }

            $output_file = $output_dir . "audio_%(title)s.%(ext)s";

            $command = "yt-dlp -x --audio-format mp3 -o \"$output_file\" \"$youtube_url\" 2>&1";
            exec($command, $output, $return_var);

            echo "<html><head><style>
                body {
                    font-family: Arial, sans-serif;
                    background-image: url(images/ff.jpg); /* Background image */
                    background-size: cover;
                    background-position: center;
                    text-align: center;
                    color: white;
                    height: 100vh;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }
                .message {
                    background: rgba(255, 255, 255, 0.2);
                    padding: 20px;
                    border-radius: 10px;
                    backdrop-filter: blur(5px);
                    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
                    width: 30%;
                    height:20%
                }
                h2 {
                    color: darkblue;
                }
            </style></head><body>";

            if ($return_var === 0) {
                echo "<div class='message'><h2>Download successful!<br> Check the 'downloads' folder.</h2></div>";
            } else {
                echo "<div class='message'><h2>Error in downloading audio.</h2><p>Debug Info:</p><p>" . implode("<br>", $output) . "</p></div>";
            }

            echo "</body></html>";
        } else {
            echo "<p style='color: red;'>Error: Invalid URL!</p>";
        }
    } else {
        echo "<p style='color: red;'>Error: No URL provided!</p>";
    }
} else {
    echo "<p style='color: red;'>Error: Invalid request!</p>";
}
?>
