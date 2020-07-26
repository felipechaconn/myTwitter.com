<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About MyTwitter.com

You've reached the final project for "Laravel From Scratch." Great job making it this far! To put your skills to the test, our final task is to build a Twitter clone, called "MyTwitter.com" We'll need to build the design, and add the necessary functionality to login, follow friends, view a timeline, and favorite posts that we like.

## Configuration

In this episode, we begin with the initial project setup.

1. First initialize the project.

    ```bash
    laravel new MyTwitter.com --auth
    ```

2. Create Database MyTwitter
3. Configure .env credentials.
4. Run Migrations.
5. We going to use Tailwind CSS.

    ```bash
    npm install tailwindcss
    ```

6. Add Tailwind mix to our project

    ```php
    mix.postCss('resources/css/main.css', 'public/css', [
    require('tailwindcss'),
    ])
    ```
7. Create  in resources main/main.css and run 'npm run dev'.
