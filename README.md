# Moshi mociné

## Install
- Take the sql database provided in the root directory
- Put that sql into a database named 'wp_moshi_mocine' (or any other name that you would like, you'll have to edit the corresponding values in the wp_config file)

The hard part is done, now the easy part: starting the project.

```shell
# We'll need to build the JS and SCSS of the theme
cd ./wp-content/themes/cinetheme
# Install deps
npm install
# Build the project in production
npm run build
# Or if you want to simply have a dev build, run  the following command
#npm run watch
# Now we go back to the root of the project, for PHP
cd ../../../
# Installing composer dependencies (mainly dev deps)
composer install
# And we start WordPress !
php -S 127.0.0.1:8000
echo "Thank you for using my project :)"
```

Tadaa, the project is on, have fun on Moshi mociné !

*Note: the username and pass for logging on the wp-admin interface are:*
- Username: dev
- Password: dev

Have fun ;)