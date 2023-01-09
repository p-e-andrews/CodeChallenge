# CodeChallenge

'Enineering Code Test'

STARTING INSTRUCTIONS:

Setup a basic CRUD API using Laravel. 
  1. Fields must include: UUID, name, description, code and status (active and inactive). 
  2. Leverage as much of the framework as possible
  3. with as close to 100% code coverage (using PHPUnit) as possible.

Use Blade and VueJS with Vue-Bootstrap and Axios to build a website that does the
following:
  1. Displays a list of records
  2. Opens a modal to edit a record
  3. Saves record to the database

Bonus points:
  1. Protected API
  2. Conditional records list
  
  -----------------------------------Andrews Log -----------------------------------------

  CITATIONS:
  
  Laravel:
  https://laravel.com/docs/9.x/installation

  PHP:
  https://www.sitepoint.com/how-to-install-php-on-windows/#installingphp
  https://www.geeksforgeeks.org/how-to-install-php-in-windows-10/
  https://windows.php.net/download#php-8.2 

  Composer:
  https://getcomposer.org/download/ 
  https://getcomposer.org/ 

  Node:
  https://phoenixnap.com/kb/install-node-js-npm-on-windows
  https://nodejs.org/en/download/

  Docker Desktop:
  https://www.docker.com/products/docker-desktop/ 

  CRUD API:
  https://www.techiediaries.com/laravel-8-rest-api-crud-mysql/
  https://stackoverflow.com/questions/50837543/how-to-re-migrate-a-laravel-migration-after-deleting-the-table

  Blade:
  https://kristijanhusak.github.io/laravel-form-builder/field/basic-input-types.html

  UUIDs:
  https://emymbenoun.medium.com/how-to-use-uuids-instead-of-auto-increment-ids-in-your-laravel-app-2e6cc045f6c1 re: followed tutorial, used a portion of given code
  https://laravel.com/docs/9.x/migrations

  PHPUnit:
  https://laravel.com/docs/9.x/testing

  Git and GitHub:
  https://www.techielass.com/convert-a-folder-to-a-git-repository/
  https://www.theserverside.com/video/How-to-use-the-git-remote-add-origin-command-to-push-remotely 
  https://stackoverflow.com/questions/4181861/message-src-refspec-master-does-not-match-any-when-pushing-commits-in-git
  
  Vue Bootstrap Modal:
  https://fahmidasclassroom.com/laravel-7-crud-using-bootstrap-modal/ re: followed tutorial, used a portion of given code

- - - - - - - - -

  LARAVEL SETUP:

  Install Laravel
  1. Install PHP (download windows thread safe zip, then extract to C:)
  2. Install Composer (download and run Composer-Setup.exe)
  3. Install Node
  4. Install NPM (comes with Node)
  5. Install Docker Desktop (configured to use WSL2 backend)
  6. Install and enable Windows Subsystem for Linux 2 (WSL2)
  7. Install Visual Studio Code and first party extension for Remote Development

  Create new Laravel project:
  1. Open command line and enter following commands:
  2. composer create-project laravel/laravel example-app
  3. cd example-app



  PROJECT:

  Access project:
  1. Find project file in file explorer, right click and select option to open in VS code
  2. Start Laravel's local development server via command line:
  3. cd example-app
  4. php artisan serve

  Create MySql database:
  1. Make sure your local MySql server is running (I used my local server from last semester)
  2. In command line, login in to MySql: mysql -uscott -tiger (from last semester)
  3. In command line, create your database: create database example_database;
  
  CRUD API:
  1. Update the .env file database section with your database information
  2. Create database and SQL tables for Laravel, in command line: php artisan migrate
  3. Create Laravel Model, in command line: php artisan make:model Process --migration
  4. Update your new create_processes_table.php with your desired table fields
  5. Create your process table, in command line: php artisan migrate
  6. Update Model file Process.php with the desired fields names
  7. Create controller for CRUD routes, in command line: php artisan make:controller ProcessController --resource
  8. Open web.php, add routing for ProcessController to file
  9. Update ProcessController.php, add import for Process model: use App\Models\Process;
  10. Update ProcessController.php method 'store()', via cited blade tutorial BUT update fields, table name, and Model name

  Blade:
  1. Blade is already included in Laravel project, look under 'resources/views'
  2. Create base blade template that future templates will extend, create new file base.blade.php
  3. Create new folder 'processes' under project folder 'resources/views'
  4. In processes folder, make new file create.blade.php
  5. Use code from cited blade tutorial, BUT update fields, table name, and Model name
  6. Update create() in ProcessController to use view create.blade.php, re cited blade tutorial
  7. In processes folder, make new file index.blade.php
  8. Use code from cited blade tutorial, BUT update fields, table name, and Model name
  9. Update index() in ProcessController to use view index.blade.php, re cited blade tutorial
  10. In processes folder, make new file edit.blade.php
  11. Use code from cited blade tutorial, BUT update fields, table name, and Model name
  12. Update edit() in ProcessController to use view edit.blade.php, re cited blade tutorial
  13. Update destroy() in ProcessController to use view edit.blade.php, re cited blade tutorial
  14. Add success message to index.blade.php, re cited blade tutorial
  15. Add button to 'create form' in index.blade.php, re cited blade tutorial

  UUIDs:
  1. Under app folder create 'Traits' folder
  2. Create new file Uuids.php in Traits folder for easy reuse
  3. Add code to Uuids.php, re cited UUID tutorial
  4. Import Uuids into Model file Process.php using: use App\Traits\Uuids;
  5. Update create_processes_table.php migrations file by changing $table->id(); into $table->uuid('id')->primary();
  6. Delete all previous database tables and migrate above update, in command line: php artisan migrate:fresh

  PHPUnit:
  1. Support for PHPUnit testing included in project at phpunit.xml
  2. To run tests, in command line: php artisan test
  3. To create Feature tests, in command line: php artisan make:test UserTest
  4. To create Unit tests, in command line: php artisan make:test UserTest --unit
  5. To see/report test coverage, in command line: php artisan test --coverage
  6. To see/report test coverage AND set minimum coverage to meet, in command line: php artisan test --coverage --min=80.3

  Testing:
  1. Create some 


NOTES:
1. Using 'UUID' in place of 'id' during references will upset sql database, as it assumes 'id'
2. Sql assumes created_at and updated_at columns, migration file needs $table->timestamps();
3. Many hints indicate Linux or Docker might be better for this project including command line warning after tests: 'TTY mode is not supported on Windows platform'
