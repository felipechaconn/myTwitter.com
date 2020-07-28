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

## Design Main

Before we can dive into writing the core logic, let's first set aside fifteen minutes or so to design the main timeline page, using Tailwind (Check home and app blades).

## Make the Timeline Dynamic

Now that we have a nice - but static - layout in place, we can begin making the different sections dynamic. We'll begin with the core of our application: tweets!

1. First we going to create factory, model and controller Tweet with this command.

    ```bash
         php artisan make:model Tweet -fmc
    ```

2. Then we going to define the rows in migration like these:

    ```php
     public function up()
    {
        Schema::create('tweets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('body');
            $table->timestamps();
        });
    }

    ```

3. Also we create a factory like that:

    ```php
    $factory->define(Tweet::class, function (Faker $faker) {
        return [
        'user_id'=> factory(App\User::class),
        'body'=> $factory->sentence
        ];
    });
    ```

4. We can execute the factory like that:

    ```bash
    php artisan tinker
    factory('App\Tweet')->create();
    ```

5. Inside Home Controller we need something like that:

    ```php
    public function index()
    {
        $tweets = Tweet::latest()->get();
        return view('home',[
            'tweets' => auth()->user()->timeline()
        ]);
    }
    ```

6. We'll create a method inside UserController like that:
    this method return the las tweet that i write

    ```php
     public function timeline() {
        return Tweet::where('user_id', $this->id)->latest()->get();
    }
    ```

## Expanding the Timeline

Now that we have the necessary functionality to follow other Tweety users, we can fully expand the timeline to include all relevant posts.
Before that we'll create a middlaware to secure the routes. We'll have to do something like tath:

    ```php
    Route::middleware('auth')->group(function(){
    Route::get('/tweets', 'TweetController@index')->name('home');
    Route::post('/tweets', 'TweetController@store');
});
    ```

