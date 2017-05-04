<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

/*Contoh Route*/

	//$url = route('profile', ['id' => $username]);
	//$url = route('profile');
	//return redirect()->route('profile');


$app->get('/', function () use ($app) {
    return $app->version();
});

$app->get('/users/{id}', function($id) {
	return "user id = $id";
});

// $app->get('groups/{groupid:name[A-Za-z]+}/users/{userid}', function($groupid, $userid) {
// 	return "group = $groupid; user id = $userid.";
// });

$app->get('groups/{groupid:[A-Za-z]+}/users[/{userid}]', function($groupid, $userid = 0) {
	if($userid > 0)
		return "group = $groupid; user id = $userid.";
	else
		return "group = $groupid; tampilkan semua users";
});

$app->get('/users/{username}/profile', ['as' => 'profile', function ($username) {
	return "Nama route = profile. walaupun di address bar /users/$username/profile";

}]);


$app->get('/articles', 'ArticleController@index');
$app->get('/articles/{id}', 'ArticleController@getArticle');
$app->post('/articles', 'ArticleController@saveArticle');
$app->put('/articles/{id}', 'ArticleController@updateArticle');
$app->delete('/articles/{id}', 'ArticleController@deleteArticle');