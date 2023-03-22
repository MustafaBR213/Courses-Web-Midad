<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>
<h1>Laravel Web Courses Project</h1>
This project is a web-based learning platform that allows students to access courses and educational content. The project is built using the Laravel framework and provides an intuitive user interface for both students and administrators.

<h2>Features</h2>
Admin Dashboard
The admin dashboard allows authorized users to add and manage courses, videos, and users. The dashboard is only accessible with admin credentials.

<h2>User Access</h2>
Students can access the courses available on the platform and watch educational videos. Users are not authorized to perform any administrative functions.

<h2>API Authentication</h2>
API authentication is implemented to provide secure access to the admin page.

<h2>To access the admin page, use the following credentials:</h2>

Email: admin@gmail.com
Password: admin123


<h2>Technologies Used</h2>
Laravel Framework
PHP
HTML
CSS
JavaScript

<h2>Tailwind CSS</h2>
In addition to the technologies listed above, this project also uses Tailwind CSS, a utility-first CSS framework. Tailwind CSS provides pre-defined classes that can be used to style elements quickly and efficiently.

The Tailwind CSS classes are used throughout the project to style the user interface. The framework's responsive design capabilities were also utilized to ensure that the platform is accessible on a wide range of devices and screen sizes.

<h3>Installation</h3>
Clone the repository using the following command:

git clone https://github.com/<username>/<repository-name>.git

<h3>Install the dependencies using Composer:</h3>

<code>composer install</code>

Create a .env file by copying the .env.example file and update the database credentials:

<code>cp .env.example .env</code>

<h3>Generate a new application key:</h3>

<code>php artisan key:generate</code>

<h3>Run the database migrations:</h3>

<code>php artisan migrate</code>

<h3>Start the development server:</h3>

<code>php artisan serve</code>

<h3>To compile the assets and start the development server, you can run the following command:</h3>
<code>npm run dev</code>
