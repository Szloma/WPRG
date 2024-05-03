<?php
function manage($path, $dir_name, $operation = "read") {
    if (substr($path, -1) != "/") {
        $path .= "/";
    }
    if ($operation == "read") {
        if (is_dir($path . $dir_name)) {
            $items = scandir($path . $dir_name);
            echo "Elementy w katalogu $dir_name:<br>";
            foreach ($items as $item) {
                echo "$item<br>";
            }
        } else {
            echo "Katalog $dir_name nie istnieje.";
        }
    } elseif ($operation == "delete") {
        if (is_dir($path . $dir_name)) {
            if (count(scandir($path . $dir_name)) == 2) {
                if (rmdir($path . $dir_name)) {
                    echo "Katalog $dir_name został usunięty.";
                } else {
                    echo "Nie udało się usunąć katalogu $dir_name.";
                }
            } else {
                echo "Katalog $dir_name nie jest pusty.";
            }
        } else {
            echo "Katalog $dir_name nie istnieje.";
        }
    } elseif ($operation == "create") {
        if (!is_dir($path . $dir_name)) {
            if (mkdir($path . $dir_name)) {
                echo "Katalog $dir_name został utworzony.";
            } else {
                echo "Nie udało się utworzyć katalogu $dir_name.";
            }
        } else {
            echo "Katalog $dir_name już istnieje.";
        }
    } else {
        echo "Nieprawidłowa operacja.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $path = $_POST["path"];
    $dir_name = $_POST["dir_name"];
    $operation = isset($_POST["operation"]) ? $_POST["operation"] : "read";

    manage($path, $dir_name, $operation);
}
?>
