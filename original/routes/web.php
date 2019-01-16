<?php

Route::get('/', 'WebsitesController@index');

Route::get('analytics/ip', 'AnalyticsController@ipReport');
Route::get('analytics/country', 'AnalyticsController@countryReport');
Route::get('analytics/website', 'AnalyticsController@websiteReport');



