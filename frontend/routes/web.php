<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

// USER
Route::get('/users/login', function() {
	return view('/users/login');
});

// USER
Route::get('/users/register', function() {
	return view('/users/register');
});

// USER BOOKING
Route::get('/availabilities/{id}', function($id) {
	return view('/availabilities/book', compact('id'));
});


Route::get('/addPackage', function() {
	return view('/packages/addPackage');
});

// ADMIN UPDATE SEATS
Route::get('/availabilities/update/{id}', function($id) {
	return view('/availabilities/update', compact('id'));
});

Route::get('/admin/transactions', function() {
	return view('/transactions/adminView');
});

Route::get('/transactions/{id}', function($id) {
	return view('/transactions/trnxGuestView', compact('id'));
});

Route::get('/addReview', function() {
	return view('/reviews/addReview');
});

		Route::get('/reviews/{id}', function($id) {
			return view('/reviews/revGuestView', compact('id'));
		});

		Route::get('/reviews/update/{id}', function($id) {
			return view('/reviews/update', compact('id'));
		});

		Route::get('/reviews', function() {
			return view('/reviews/adminView');
		});


		Route::get('/reviews/showEdit/{id}' , function($id) {
			return view('/reviews/updateRev', compact('id'));
		});

Route::get('/blogs' , function() {
	return view('/blogs/blogs');
});

Route::get('/blogsUser' , function() {
	return view('/blogs/userView');
});

Route::get('/packages' , function() {
	return view('/packages/packAdminView');
});

Route::get('/calendar' , function() {
	return view('/availabilities/calendar');
});

Route::get('/bookings/showEdit/{id}' , function($id) {
	return view('/transactions/updateBook', compact('id'));
});
