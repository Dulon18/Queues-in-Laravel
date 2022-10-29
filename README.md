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
