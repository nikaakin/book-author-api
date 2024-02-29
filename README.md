<div style="display:flex; align-items: center">
  <h1 style="position:relative; top: -6px" >book-author-api</h1>
</div>

---

book-author-api - is a simple RESTful API for managing books and authors.

database structure - https://drawsql.app/teams/personal-865/diagrams/book-author-api

api documentation - https://documenter.getpostman.com/view/23027399/2sA2rGvK5q

#

### Table of Contents

-   [Prerequisites](#prerequisites)
-   [Tech Stack](#tech-stack)
-   [Getting Started](#getting-started)
-   [Migrations](#migration)
-   [Development](#development)
-   [Database Structure](#database-structure)
-   [Recources](#recources)

#

### Prerequisites

-   *PHP@8.1 and up*
-   _MYSQL@8 and up_
-   _composer@2.5.5 and up\_

#

### Tech Stack

-   [Laravel@10.x](https://laravel.com/docs/10.x) - Back-end framework.

#

### Getting Started

1\. First of all you need to clone repository from github:

```sh
git clone git@github.com:nikaakin/book-author-api.git
```

2\. Next step requires you to run _composer install_ in order to install all the dependencies.

```sh
composer install
```

3\. Now we need to set our env file. Go to the root of your project and execute this command.

```sh
cp .env.example .env
```

And now you should provide **.env** file all the necessary environment variables:

#

**MYSQL:**

> DB_CONNECTION=mysql

> DB_HOST=127.0.0.1

> DB_PORT=3306

> DB_DATABASE=**\***

> DB_USERNAME=**\***

> DB_PASSWORD=**\***

#

##### Now, you should be good to go!

#

### Migration

if you've completed getting started section, then migrating database if fairly simple process, just execute:

```sh
php artisan migrate
```

#

### Development

You can run Laravel's built-in development server by executing:

```sh
  php artisan serve
```

#

Project structure is fairly straitforward(at least for laravel developers)...

For more information about project standards, take a look at these docs:

-   [Laravel](https://laravel.com/docs/10.x)

#

### Database Structure

Database structure - https://drawsql.app/teams/personal-865/diagrams/book-author-api

api documentation - https://documenter.getpostman.com/view/23027399/2sA2rGvK5q
