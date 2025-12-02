<?php

$host = explode('?', $_SERVER['REQUEST_URI'])[0];
$parts = explode('/', trim($host, '/'));

if ($parts[0] === 'newsPortalPikolad') {
    $path = $parts[1] ?? '';
} else {
    $path = $parts[0] ?? '';
}

if ($path === '' || $path === 'index' || $path === 'index.php') {
    $response = Controller::StartSite();
}

elseif ($path === 'all') {
    $response = Controller::AllNews();
}

elseif ($path === 'category' && isset($_GET['id'])) {
    $response = Controller::NewsByCatID($_GET['id']);
}

elseif ($path === 'news' && isset($_GET['id'])) {
    $response = Controller::NewsByID($_GET['id']);
}

elseif ($path === 'insertcomment' && isset($_GET['comment'], $_GET['id'])) {
    $response = Controller::InsertComment($_GET['comment'], $_GET['id']);
}

else {
    $response = Controller::error404();
}
?>
