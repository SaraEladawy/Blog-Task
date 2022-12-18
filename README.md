
## Blog Task

## Features

Blog Task that have 2 main role Admin and Author.

Author can create, update and delete his posts and can add comments
Admin can view all posts and comments


- [Laravel Collective](https://laravelcollective.com).
- [Swagger Api Documentation](https://github.com/DarkaOnLine/L5-Swagger).

### Setup
---
Clone the repo and follow below steps.
1. Run `composer install`
2. Copy `.env.example` to `.env`
3. Set valid database credentials of env variables `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD`
4. Run `php artisan key:generate` to generate application key
5. Run `php artisan migrate --seed` to seed your database

Thats it... Run the command `php artisan serve`,`npm install`, `npm run dev`.\
Open your server `/api/v1` For Api Documentation

### Demo Credentials
---
*Make sure you have run the command `php artisan db:seed` before you use these credentials.*

Admin

**Email:** admin@blog.com

**Password:** admin_password

Author

**Email:** author@blog.com

**Password:** author_password

