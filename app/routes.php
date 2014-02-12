<?php

Route::get(
    '/login',
    [
        'as'   => 'login', 
        'uses' => 'HomeController@connexion'
    ]
);

Route::post(
    '/login',
    [
        'as'   => 'login', 
        'uses' => 'HomeController@connect'
    ]
);

Route::get(
    '/logout',
    [
        'as'   => 'logout',
        'uses' => 'HomeController@disconnect'
    ]
);

Route::group(['before' => 'auth'], function() {
    Route::get(
        '/',
        [
            'as'   => 'index',
            'uses' => 'CoureurController@index'
        ]
    );

    Route::get(
        '/message',
        [
            'as'   => 'message',
            'uses' => 'MessageController@message'
        ]
    );

    Route::get(
        '/message/send',
        [
            'as'   => 'message.send',
            'uses' => 'MessageController@sendMessageIndex'
        ]
    );

    Route::post(
        '/message/send',
        [
            'as'   => 'message.send',
            'uses' => 'MessageController@sendMessage'
        ]
    );

    Route::get(
        '/document',
        [
            'as'   => 'document',
            'uses' => 'CoureurController@document'
        ]
    );

    Route::get(
        '/horaire',
        [
            'as'   => 'horaire',
            'uses' => 'CoureurController@horaire'
        ]
    );

    Route::get(
        '/dispo',
        [
            'as'   => 'dispo',
            'uses' => 'CoureurController@dispo'
        ]
    );

    Route::get(
        '/ressource',
        [
            'as'   => 'ressource',
            'uses' => 'CoureurController@ressource'
        ]
    );

    Route::get(
        '/gestion/compte',
        [
            'as'   => 'gestion.compte',
            'uses' => 'CoureurController@gestionCompte'
        ]
    );

    Route::post(
        '/gestion/compte',
        [
            'as'   => 'gestion.compte',
            'uses' => 'CoureurController@gestionCompteSave'
        ]
    );

    Route::get(
        '/gestion/compte/{user}',
        [
            'as'   => 'gestion.user.edit',
            'uses' => 'CoureurController@gestionUser'
        ]
    );

    Route::get(
        '/gestion/compte/{user}/delete',
        [
            'as'   => 'gestion.user.delete',
            'uses' => 'CoureurController@deleteUser'
        ]
    );

    Route::get(
        '/gestion/comptes',
        [
            'as'   => 'gestion.comptes',
            'uses' => 'CoureurController@gestionComptes'
        ]
    );

    Route::get(
        'user/add',
        [
            'as'   => 'user.add',
            'uses' => 'UserController@index'
        ]
    );

    Route::post(
        'user/add',
        [
            'as'   => 'user.add',
            'uses' => 'UserController@add'
        ]
    );
});