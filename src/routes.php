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

    $benchmark = new \wbd\Benchmark($repository, $settingsRepository);
    $benchmark->setMaxExecutionTime(60 *3); // Expanding max execution time to 3 minutes

    $data = $benchmark->run(10);

    return $response->withJson($data, 200);

});



/**
 * Executes a benchmark in a given repository passed trough the url.
 * Returns the results in JSON format.
 */
$app->get('/api/movies/', function ($request, $response, $args) {


    /**
     *  Parameters and other settings are stored in their
     *  respective repositories. The idea was to be more
     *  dynamic, passing the parameters in the request.
     */
    $repository         = $args["repository"];
    $settingsRepository = $this->get('settings')["repositories"];

    $benchmark = new \wbd\Benchmark($repository, $settingsRepository);
    $benchmark->setMaxExecutionTime(60 *3); // Expanding max execution time to 3 minutes

    $data = $benchmark->run(10);

    return $response->withJson($data, 200);

});









