## Project created with:
1. laravel
2. Bootstrap
3. Sweetalert2
4. jQuery
5. Ajax

## Installation
#### Assuming you've already installed on your machine: PHP (>= 7.3.0), [Laravel](https://laravel.com), [Composer](https://getcomposer.org) and [Node.js](https://nodejs.org).

##### 1. Clone the repository
```
git clone https://github.com/koksztul/laravel-blog.git
```
##### 2. Switch to the repo folder
```
cd laravel-blog
```
##### 3. Install all the dependencies using composer
```
composer install
```
##### 4. Copy the example env file and make the required configuration changes in the .env file
```
cp .env.example .env
```
##### 5. Generate a new application key
```
php artisan key:generate
```
##### 6. Create the symbolic link to the public disc
```
php artisan storage:link
```
##### 7. Run the database migrations (Set the database connection in .env before migrating)
```
php artisan migrate
```
##### 8. build CSS and JS assets
```
npm run dev

# Or run all Mix tasks and minify output
npm run prod
```
#####  9. Start the local development server
```
php artisan serve
```
