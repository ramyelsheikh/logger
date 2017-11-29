<?php

Route::get('page1', 'Influencers\Logger\LoggerController@logPage');
Route::get('page2', 'Influencers\Logger\LoggerController@logPage');
Route::get('page3', 'Influencers\Logger\LoggerController@logPage');
Route::get('page4', 'Influencers\Logger\LoggerController@logPage');
Route::get('page-404', 'Influencers\Logger\LoggerController@logPage');
Route::get('page-403', 'Influencers\Logger\LoggerController@logPage');
Route::get('summary', 'Influencers\Logger\LoggerController@summary');