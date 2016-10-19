<?php
// Routes



$app->get('/[{name}]', function ($request, $response, $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});





/**
 * Executes a benchmark in a given repository passed trough the url.
 * Returns the results in JSON format.
 */
$app->get('/api/search/{title}', function ($request, $response, $args) {

    $title         = $args["title"];

    $omdb = new \DMS\omdbapi();

    $data = $omdb->search($title);

    return $response->withJson($data, 200);

});



/**
 * Gets the movies that the user has saved
 */
$app->get('/api/favorites/', function ($request, $response, $args) {

    

    $data = $benchmark->run(10);

    return $response->withJson($data, 200);

});









