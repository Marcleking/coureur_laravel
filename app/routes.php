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

Route::get(
    '/creeHoraireTest',
    [
        'as' => 'horaireTest',
        'uses' => 'HoraireController@genere'
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
        '/guide',
        [
            'as'   => 'guide-employe',
            'uses' => 'GuideController@employe',
        ]
    );

    Route::get(
        '/message',
        [
            'as'   => 'message',
            'uses' => 'MessageController@message'
        ]
    );

    Route::any(
        '/document{all?}',
        [
            'as'   => 'document',
            'uses' => 'CoureurController@document'
        ]
    )->where('all', '.*');

    Route::any(
        '/fichier{all?}',
        [
            'as'   => 'fichier',
            'uses' => 'CoureurController@fichier'
        ]
    )->where('all', '.*');

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
        '/gestion/compte',
        [
            'as'   => 'gestion.compte',
            'uses' => 'UserController@gestionCompte'
        ]
    );

    Route::post(
        '/gestion/compte',
        [
            'as'   => 'gestion.compte',
            'uses' => 'UserController@gestionCompteSave'
        ]
    );
	
	Route::get(
        'echange',
        [
            'as'   => 'echange',
            'uses' => 'EchangeController@lesEchanges'
        ]
    );
});

Route::group(['before' => 'auth.type:Gestionnaire'], function() {

    Route::get(
        '/guide',
        [
            'as'   => 'guide-gestionnaire',
            'uses' => 'GuideController@gestionnaire',
        ]
    );

    Route::get(
        '/message/{id}/del',
        [
            'as'   => 'message.delete',
            'uses' => 'MessageController@delMessage'
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
        '/ressource',
        [
            'as'   => 'ressource',
            'uses' => 'CoureurController@ressource'
        ]
    );

    Route::get(
        '/gestion/compte/{user}',
        [
            'as'   => 'gestion.user.edit',
            'uses' => 'UserController@gestionUser'
        ]
    );

    Route::get(
        '/gestion/compte/{user}/delete',
        [
            'as'   => 'gestion.user.delete',
            'uses' => 'UserController@deleteUser'
        ]
    );

    Route::get(
        '/gestion/comptes',
        [
            'as'   => 'gestion.comptes',
            'uses' => 'UserController@gestionComptes'
        ]
    );

    Route::get(
        '/gestion/comptes/{user}',
        [
            'as'   => 'gestion.user.edit.admin',
            'uses' => 'UserController@gestionUserAdmin'
        ]
    );

    Route::post(
        '/gestion/comptes',
        [
            'as'   => 'gestion.user.edit.admin.save',
            'uses' => 'UserController@gestionCompteSaveAdmin'
        ]
    );

    Route::get(
        'user/add',
        [
            'as'   => 'user.add',
            'uses' => 'UserController@ajoutUtilisateur'
        ]
    );

    Route::post(
        'user/add',
        [
            'as'   => 'user.add',
            'uses' => 'UserController@ajoutUtilisateurSave'
        ]
    );

    Route::get(
        'generate',
        [
            'as'   => 'genere.horaire',
            'uses' => 'HoraireController@genere'
        ]
    );

    Route::get(
        'notification',
        [
            'as'   => 'notification.generate',
            'uses' => 'HoraireController@notif'
        ]
    );

    Route::any(
        '/supprimer/document{all?}',
        [
            'as'   => 'delete.document',
            'uses' => 'CoureurController@supprimeDocument'
        ]
    )->where('all', '.*');

    Route::any(
        '/supprimer/fichier{all?}',
        [
            'as'   => 'delete.fichier',
            'uses' => 'CoureurController@supprimeFichier'
        ]
    )->where('all', '.*');

    Route::post('cree/document',
        [
            'as'   => 'document.create',
            'uses' => 'CoureurController@creeDocument'
        ]
    );

    Route::post('ajout/fichier', 
        [
            'as'   => 'add.file',
            'uses' => 'CoureurController@ajoutFichier'
        ]
    );

    Route::any(
        '/info/fichier{all?}',
        [
            'as'   => 'info.fichier',
            'uses' => 'CoureurController@infoFichier'
        ]
    )->where('all', '.*');
	
});