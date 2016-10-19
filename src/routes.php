<?php
// Routes

/**
 * Web App router
 */
$app->get('/', function ($request, $response, $args) {

    $favorites = new \DMS\Favorites($this->db);

    $favs = $favorites->getFavorites();

    // Render index view
    return $this->renderer->render($response, 'index.phtml', array("favorites" => $favs));
});






/**
 * Executes a benchmark in a given repository passed trough the url.
 * Returns the results in JSON format.
 */
$app->get('/api/search/{title}', function ($request, $response, $args) {

    $title = $args["title"];

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


/**
 * post a new favorite
 */
$app->post('/api/favorites/', function ($request, $response, $args) {

    $favorites = new \DMS\Favorites($this->db);

    $data = $favorites->addFavorite($request->getParam('imdbID'));

    return $response->withJson($data, 200);

});









