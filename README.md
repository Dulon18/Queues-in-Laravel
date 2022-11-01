<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


## What is Laravel Queue ?
A queue involves placing things in order. For instance, a queue management system can be used to serve customers on a first-come-first-serve basis.

This is no different from the Laravel queue. It serves the same job by ensuring that programs or services are executed in a certain order.

For example, you have an application that requires users to sign up and then send them a One-Time-Password (OTP) or even a welcome email. Though this is a great implementation, it may slow down the application’s performance. Laravel queues can help salvage this situation.


Sending an email is a time-consuming task, so what we will do is we will create a job that’s the only task is to send an email to the user in the background. To create a Job, laravel provides a Queue API. So let’s understand that in detail.

Laravel queues provide a unified API across various queue backends, such as Beanstalk, Amazon SQS, Redis, or even a relational database. As a result, queues allow you to defer processing a time-consuming task, such as sending an email. Delaying these time-consuming tasks drastically speeds up web requests to your application.

The queue configuration file is stored in.config/queue.php In this file, you will find connection configurations for each queue driver included with the framework, consisting of a database, Beanstalkd, Amazon SQS, Redis, and synchronous driver that will execute jobs immediately (for local use). In addition, a null queue driver is also included, which discards queued jobs
Queue Workers: How they work
Updated: Sep 7, 2020 — 9 MIN READ — #queues

Let's perform a dive into how workers run your jobs. First I'd like to define workers as a simple PHP process that runs in the background with the purpose of extracting jobs from a storage space and run them with respect to several configuration options.

php artisan queue:work
Running this command will instruct Laravel to create an instance of your application and start executing jobs, this instance will stay alive indefinitely which means the action of starting your Laravel application happens only once when the command was run & the same instance will be used to execute your jobs, that means the following:

You save server resources by avoiding booting up the whole app on every job.
You have to manually restart the worker to reflect any code change you made in your application.
You can also run:

php artisan queue:work --once
This will start an instance of the application, process a single job, and then kill the script.

php artisan queue:listen
The queue:listen command simply runs the queue:work --once command inside an infinite loop, this will cause the following:

An instance of the app is booted up on every loop.
The assigned worker will pick a single job and execute it.
The worker process will be killed.
Using queue:listen ensures that a new instance of the app is created for every job, that means you don't have to manually restart the worker in case you made changes to your code, but also means more server resources will be consumed.

## Database

In order to use the database queue driver, you will need a database table to hold the jobs. To generate a migration that creates this table, run the queue:table Artisan command. Once the migration has been created, you may migrate your database using the migrate command:

php artisan queue:table
 
php artisan migrate

Finally, don't forget to instruct your application to use the database driver by updating the QUEUE_CONNECTION variable in your application's .env file:

QUEUE_CONNECTION=database
