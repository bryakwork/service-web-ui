<?php
/**
 * Setup routes with a single request method:
 *
 * $app->get('/', App\Action\HomePageAction::class, 'home');
 * $app->post('/album', App\Action\AlbumCreateAction::class, 'album.create');
 * $app->put('/album/:id', App\Action\AlbumUpdateAction::class, 'album.put');
 * $app->patch('/album/:id', App\Action\AlbumUpdateAction::class, 'album.patch');
 * $app->delete('/album/:id', App\Action\AlbumDeleteAction::class, 'album.delete');
 *
 * Or with multiple request methods:
 *
 * $app->route('/contact', App\Action\ContactAction::class, ['GET', 'POST', ...], 'contact');
 */

/** @var \Zend\Expressive\Application $app */

$app->route('/api/datastore[/{resourceName}[/{id}]]', 'api-datastore', ['GET', 'POST', 'PUT', 'DELETE', 'PATCH'], 'api-datastore');

//template name is parsed from route name (<namespace>-<templateName>)
$app->route('/', 'navigationPage', ['GET'], 'webUi-homepage');
$app->route('/login', 'loginPage', ['GET', 'POST'], 'webUi-login');
$app->route('/example-grid', 'exampleGridPage', ['GET'], 'webUi-exampleGrid');

$app->route('/vehicles/compare-vehicles', 'compareVehiclesPage', ['GET'], 'ebayVehicles-vehiclesCompare');
$app->route('/vehicles/vehicles-list-processor', 'vehicleListProcessorPage', ['GET'], 'ebayVehicles-vehiclesListProcessor');
$app->route('/vehicles/vehicles-comparison-result', 'vehiclesComparisonResult', ['GET'], 'ebayVehicles-vehiclesComparisonResult');
