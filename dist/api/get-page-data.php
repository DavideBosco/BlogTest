<?php
    header('Content-Type: application/json');

    require __DIR__ . '/../config/config.php';
    require __DIR__ . '/../includes/get-posts-from-endpoint.php';
    require __DIR__ . '/../includes/generate-page-data.php';

    $postsData = getPostsFromEndpoint($url);
    echo json_encode(generatePageData($postsData, $pageSize));
?>
