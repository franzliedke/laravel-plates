# laravel-plates

A Laravel driver for the powerful native PHP templating system [Plates](http://platesphp.com).

## Installation with Composer

#### Step 1: Install package through Composer

Add this line to the `require` section of your `composer.json`:

    "franzl/laravel-plates": "dev-master"

Alternately, you can use the Composer command-line tool by running this command:

    composer require franzl/laravel-plates

Next, run `composer install` to actually install the package.

#### Step 2: Register the service provider

In your Laravel application, edit the `app/config/app.php` file and add this
line to the `providers` array:

    'Franzl\LaravelPlates\LaravelPlatesServiceProvider',

## Usage

Once installed, you can use Laravel's view system as you always do. Files ending in `.plates.php` will automatically be treated as Plates templates. As long as you don't try to combine things like Blade layouts and Plates' partial views, everything should go well.
