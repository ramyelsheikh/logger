# Mongodb Logger

Package to save the user hits on pages to Mongodb within laravel framework

## Getting Started

You will find this package in packagist.org at https://packagist.org/packages/influencers/logger 

### Prerequisites

1- Set Minimum Stability of your core laravel to dev by:
- Adding this line to core composer.json file: "minimum-stability": "dev"
- run command: composer dump-autoload  
2- Install Mongodb client on your server. If it is not installed, the package will refuse to install.

### Installing

1- using composer in your laravel root, run the following command:
- composer require influencers/logger

2- Register the package provider by adding the following line to the file config/app.php:

- Influencers\Logger\LoggerServiceProvider::class,

3- Set the configuration of Mongodb Server in .env file of your laravel root dir:
- mongodb_host=<mongodb_host>
- mongodb_port=<mongodb_port>
- mongodb_database=<mongodb_database>
- mongodb_collection=<mongodb_collection>

replace the <> with your server values.

- Routes Examples:

- /page1
- /page2
- /page-404
- /page-403
- /summary : contains all your visits sorted by time descending
