<?php
header('Content-Type: application/json');
require_once 'config.php';

try {
    $stmt = $pdo->query("SELECT * FROM projects ORDER BY created_at DESC");
    $projects = $stmt->fetchAll();
    
    foreach ($projects as &$project) {
        $project['technologies'] = explode(',', $project['technologies'] ?? '');
    }
    unset($project); // Prevent reference issues
    
    echo json_encode([
        'success' => true,
        'projects' => $projects
    ]);
    
} catch(PDOException $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => 'Failed to load projects'
    ]);
}
?>