<?php
function generateLinks($filePath) {
    if (!file_exists($filePath)) {
        return "File not found.";
    }

    $file = fopen($filePath, 'r');
    if (!$file) {
        return "Unable to open the file.";
    }

    $linksHtml = "<ul>\n";

    while (($line = fgets($file)) !== false) {
        $parts = explode(';', trim($line));
        if (count($parts) == 2) {
            $url = htmlspecialchars($parts[0]);
            $description = htmlspecialchars($parts[1]);
            $linksHtml .= "<li><a href=\"$url\">$description</a></li>\n";
        }
    }

    fclose($file);
    $linksHtml .= "</ul>\n";

    return $linksHtml;
}

echo generateLinks('links.txt');
?>