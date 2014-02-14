##Requis:
* Wamp
* Git
* Composer : [https://getcomposer.org/Composer-Setup.exe](https://getcomposer.org/Composer-Setup.exe)

##Installation
1. Dans le fichier C:\wamp\bin\php\php5.4.12\php.ini décommenter la ligne extension=php_openssl.dll
1. Dans le fichier httpd.conf d'apache décommenter la ligne LoadModule rewrite_module modules/mod_rewrite.so
1. Cloner le projet dans C:\wamp\www
1. Rajouter sont hostname dans l'array local de bootstrap/start.php
1. Mettre à jour composer en faisant "composer udpate" sur le répertoire à partir de la console
1. Mettre à jout le composer du driver de connexion en faisant composer update dans workbench/coureur/connexion
1. Voila !

##Configuration git
1. git config --global push.default current

##Plus
### Dans sublime text (Package):
1. Laravel Blade Highlighter
1. Phpcs
