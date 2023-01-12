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

  Testing:
  https://emymbenoun.medium.com/how-to-use-uuids-instead-of-auto-increment-ids-in-your-laravel-app-2e6cc045f6c1
  https://fakerphp.github.io/
  https://fakerphp.github.io/formatters/numbers-and-strings/
  https://shortcode.dev/laravel/faker.html

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
  1. Create some fake processes using (Laravel included) factories and seeders
  2. Under 'database' create new file ProcessFactory.php
  3. Fill in defintion() with process fields and use fake(), re cited uuid tutorial
  4. Import Model Process and Traits Uuids
  5. Create a process seeder to create a bunch of fake processes for our table, in command line: php artisan make: seeder ProcessSeeder
  6. In new file ProcessSeeder.php import Process Model
  7. In ProcessSeeder.php's run() add: factory(Process::class, 6)->create();
  8. Open existing DatabaseSeeder.php and add call to ProcessSeeder: $this->call(ProcessSeeder::class);
  9. Run the seeder, in command line: php artisan db:seed


NOTES:
1. Using 'UUID' in place of 'id' during references will upset sql database, as it assumes 'id'
2. Sql assumes created_at and updated_at columns, migration file needs $table->timestamps();
3. Many hints indicate Linux or Docker might be better for this project including command line warning after tests: 'TTY mode is not supported on Windows platform'
4. Terms for 'faker' in testing fields are specific though possibly similar to existing field names, be careful

----------------------Andrews Log: Continued---------------------
CITATIONS:

Git:
https://www.git-tower.com/learn/git/faq/git-create-remote-branch

API:
https://www.positronx.io/create-laravel-vue-js-crud-single-page-application/

Vue:
https://stackoverflow.com/questions/73142864/npm-run-watch-not-working-and-returning-errors-saying-missing-watch
https://www.positronx.io/create-laravel-vue-js-crud-single-page-application/

Testing:
https://5balloons.info/laravel-tdd-beginner-crud-example/
https://stackoverflow.com/questions/44119401/laravel-faker-whats-the-difference-between-create-and-make#:~:text=create%20persists%20to%20the%20database,new%20instance%20of%20the%20model.
https://laracasts.com/discuss/channels/laravel/how-to-wait-for-modelinsert-to-finish
https://stackoverflow.com/questions/15484404/how-to-delete-all-the-rows-in-a-table-using-eloquent

GOALS:
1. Separate API completely (aka methods do not call on blade views)
2. Set up Feature tests and Unit tests with PHPUnit
3. Use VueJS to create a Modal for editing a record (Modal aka 'popup')
4. Explore security re PassPort or similar
5. Research 'Conditional Records List' possibilities
6. Examine working in Docker
7. Clean up

Set up separate branch:
1. Create and switch to new branch, in command line: git checkout -b separateAPI
2. Push to the remote repo (aka GitHub), in command line: git push -u origin separateAPI
3. Confirm on GitHub visually and/or confirm in command line: git branch -r

Separate API:
1. Update methods in ProcessController by removing uses of blade
2. Update/Add CRUD API routes in web.php and api.php

Setup Vue:
1. Install Laravel Vue UI, in command line: composer require laravel/ui
2. Continue, in command line: php artisan ui vue
3. Install the vue router & vue axios packages, in command line: npm install vue-router vue-axios
4. Install npm packages, in command line: npm install
5. Compile the assets, in command line: npm run watch
6. If 'watch' doesn't work, go to package.json & under scripts add: "watch": "vite build --watch"
7. If command line 'watch' didn't work beforem, try again now

Vue:
1. Under 'resources/views' create a new folder 'layout'
2. In the new folder create new file 'app.blade.php'
3. Insert the JS CRUD operations code from the positronx.io tutorial cited above
4. Create template to help invoke vue routes, under 'resources/js' create new file 'App.js'
5. Under 'resources/js/components' create files 'AllProcess.vue' 'CreateProcess.vue' 'Edit Process.vue'
6. Re cited positronix, add code to AllProcess.vue and update fields etc
7. Re cited positronix, add code to CreateProcess.vue and update fields etc
8. Re cited positronix, add code to EditProcess.vue and update fields etc

Testing setup:
1. Log in to local server, in command line: mysql -uscott -utiger
2. Switch to correct database, in command line: use andrews_database;
3. Confirm target table exists, in command line: show tables;
4. Check correct table setup, in command line: describe processes;
5. Confirm seeded enteries from prior test setup, in command line: select * from processes;

Unit testing:
1. Create test for READ, in command line: php artisan make:test ReadTest --unit
2. Go to ReadTest.php, add line to have a process in db, add line to read, add line to assert
3. Create test for CREATE, in coomand line: php artisan make:test CreateTest --unit
4. Go to CreateTest.php, add line to empty database, add line to create process, add line to send to db, add assert to check process exists in db


NOTES:
1. Challenge might imply that blade returns VueJS, more research needed
2. PHPUnit 'coverage' is a driver that must be installed separately
3. PHP, "create persists to the database while make just creates a new instance of the model"
4. Best to create fake database for tests
5. 
