

## steps to configure the app

- git clone the repo
- create a copy of .env.example file and name it .env
- create a blog_db database and import data from blog_db.slq file attached 
- update .env file to connect to the database created
- run composer install command - this will create the vendor folder
- run php artisan key:generate to generate application key
- run php artisan serve command 
- for admin login use http://127.0.0.1:8000/admin/login
username: paul
password: paul

