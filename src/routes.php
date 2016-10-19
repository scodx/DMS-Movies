<?php
// Routes

/**
 * Web App router
 */
$app->get('/', function ($request, $response, $args) {


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

    $favorites = new \DMS\Favorites($this->db);

    $data = $favorites->getFavorites();

    return $response->withJson($data, 200);

});









