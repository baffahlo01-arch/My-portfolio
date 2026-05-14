<?php
header('Content-Type: application/json');

require_once 'config.php';

try {
    $stmt = $pdo->query("SELECT * FROM projects ORDER BY created_at DESC");
    $projects = $stmt->fetchAll();
    
    foreach ($projects as &$project) {
        $project['technologies'] = explode(',', $project['technologies']);
    }
    
    echo json_encode([
        'success' => true,
        'projects' => $projects
    ]);
    
} catch(PDOException $e) {
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage()
    ]);
}
?>