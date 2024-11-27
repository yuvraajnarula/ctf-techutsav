<?php
// Correct file path resolution

$baseDir = realpath(dirname(__FILE__) . '/../');
$controllerPath = $baseDir . '/src/controllers/homeController.php';

// Ensure the file exists before requiring
if (file_exists($controllerPath)) {
    require_once $controllerPath;
    
    try {
        echo $controller->index();
    } catch (Exception $e) {
        // Error handling
        echo "Error: " . $e->getMessage();
    }
} else {
    // Detailed error if file not found
    echo "Error: Controller file not found at path: " . $controllerPath;
}
?>