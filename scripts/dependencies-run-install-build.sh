#!/usr/bin/env bash

printf "Installing Colby library dependencies \n"



# colby library plugins

cd web/wp-content/plugins/colby-onesearch
composer install
composer dump-autoload
cd -

cd web/wp-content/plugins/colby-libraries
composer install
composer dump-autoload
cd -

cd web/wp-content/plugins/colby-openhours
composer install
composer dump-autoload
cd -