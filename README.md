# PHP Quick Start Guide

This guide will walk you through deploying a PHP application on Deis.

## Setup your workstation

* Install [RubyGems](http://rubygems.org/pages/download) to get the `gem` command on your workstation
* Install [Foreman](http://ddollar.github.com/foreman/) with `gem install foreman`
* Install [Xampp](http://www.apachefriends.org/en/xampp.html)) or [MAMP PRO](http://www.mamp.info/en/mamp-pro/) so that you have an environment that can run PHP

## Clone your Application

If you want to use an existing application, no problem.  You can also use the Deis sample application located at <https://github.com/opdemand/example-php>.  Clone the example application to your local workstation:

    $ git clone https://github.com/opdemand/example-php.git
    $ cd example-php

## Prepare your Application

To use a PHP application with Deis, you will need to conform to 3 basic requirements:

 1. Use [Composer](http://getcomposer.org/) to manage dependencies
 2. Use [Foreman](http://ddollar.github.com/foreman/) to manage processes
 3. Use [Environment Variables](https://help.ubuntu.com/community/EnvironmentVariables) to manage configuration inside your application

If you're deploying the example application, it already conforms to these requirements.

#### 1. Use Composer to manage dependencies

Composer requires that you explicitly declare your dependencies using a `composer.json` file that sits in the root directory of your project. Here is a very basic example:

	{ 
		"require": { 
		    "illuminate/foundation": "1.0.*"
		},
		"minimum-stability": "dev"
	}
    
You can then install dependencies on your local workstation with `php composer.phar install`:

For more information on using [Composer](http://getcomposer.org/), we recommend you read this [blog post](http://www.sitepoint.com/php-dependency-management-with-composer/) 

#### 2. Use Foreman to manage processes

Deis relies on a [Foreman](http://ddollar.github.com/foreman/) `Procfile` that lives in the root of your repository.  This is where you define the command(s) used to run your application.  Here is an example `Procfile`:

    web: sh boot.sh

This tells Deis to run `web` workers using the command `sh boot.sh`. 

Since PHP runs explicitly on a web server, you won't be able to use `Foreman` locally. Rather, test locally using Xampp or Mamp Pro.

#### 3. Use Environment Variables to manage configuration

Deis uses environment variables to manage your application's configuration. For example, your application listener must use the value of the `PORT` environment variable. The following code snippet demonstrates how this can work inside your application:

    port = getenv(PORT);

## Create a new Application

Per the prerequisites, we assume you have access to an existing Deis formation. If not, please review the Deis [installation instuctions](http://docs.deis.io/en/latest/gettingstarted/installation/).

Use the following command to create an application on an existing Deis formation.

    $ deis create --id=<appName>
	Creating application... done, created <appName>
	Git remote deis added
    
If an ID is not provided, one will be auto-generated for you.

## Deploy your Application

Use `git push deis master` to deploy your application.

	$ git push deis master
	Counting objects: 4, done.
	Delta compression using up to 4 threads.
	Compressing objects: 100% (3/3), done.
	Writing objects: 100% (3/3), 2.83 KiB, done.
	Total 3 (delta 1), reused 0 (delta 0)
	       PHP app detected
	-----> Bundling mcrypt version 2.5.8
	-----> Bundling Apache version 2.2.25

Once your application has been deployed, use `deis open` to view it in a browser. To find out more info about your application, use `deis info`.

## Scale your Application

To scale your application's [Docker](http://docker.io) containers, use `deis scale` and specify the number of containers for each process type defined in your application's `Procfile`. For example, `deis scale web=8`.

	$ deis scale web=8
	Scaling containers... but first, coffee!
	done in 19s
	
	=== <appName> Containers
	
	--- web: `sh boot.sh`
	web.1 up 2013-10-28T20:23:58.904Z (phpFormation-runtime-1)
	web.2 up 2013-10-30T17:24:35.783Z (phpFormation-runtime-1)
	web.3 up 2013-10-30T17:24:35.801Z (phpFormation-runtime-1)
	web.4 up 2013-10-30T17:24:35.815Z (phpFormation-runtime-1)
	web.5 up 2013-10-30T17:24:35.831Z (phpFormation-runtime-1)
	web.6 up 2013-10-30T17:24:35.847Z (phpFormation-runtime-1)
	web.7 up 2013-10-30T17:24:35.865Z (phpFormation-runtime-1)
	web.8 up 2013-10-30T17:24:35.885Z (phpFormation-runtime-1)


## Configure your Application

Deis applications are configured using environment variables. The example application includes a special `POWERED_BY` variable to help demonstrate how you would provide application-level configuration. 

	$ curl -s http://yourapp.yourformation.com
	Powered by Deis
	$ deis config:set POWERED_BY=PHP
	=== <appName>
	POWERED_BY: PHP
	$ curl -s http://yourapp.yourformation.com
	Powered by PHP

`deis config:set` is also how you connect your application to backing services like databases, queues and caches. You can use `deis run` to execute one-off commands against your application for things like database administration, initial application setup and inspecting your container environment.

	$ deis run ls -la
	total 44
	drwxr-xr-x  8 root  root  4096 Oct 30 17:23 .
	drwxr-xr-x 57 root  root  4096 Oct 30 17:28 ..
	drwxr-xr-x  2 root  root  4096 Oct 30 17:23 .profile.d
	-rw-r--r--  1 root  root    45 Oct 30 17:23 .release
	-rw-r--r--  1 root  root    15 Oct 30 17:23 Procfile
	drwxr-xr-x 15 14436 14436 4096 Aug 29 23:48 apache
	drwxr-xr-x  2 root  root  4096 Oct 30 17:23 bin
	-rwxr-xr-x  1 root  root   370 Oct 30 17:23 boot.sh
	drwx------  7 14436 14436 4096 Oct 30 17:23 php
	drwxr-xr-x  3 root  root  4096 Oct 30 17:23 vendor
	drwxr-xr-x  5 root  root  4096 Oct 30 17:23 www

## Troubleshoot your Application

To view your application's log output, including any errors or stack traces, use `deis logs`.

    $ deis logs
	Oct 30 17:27:12 ip-172-31-25-226 jagged-playroom[web.7]: 172.31.25.226 - - [30/Oct/2013:17:27:12 +0000] "GET / HTTP/1.0" 200 1579
	Oct 30 17:27:12 ip-172-31-25-226 jagged-playroom[web.4]: 172.31.25.226 - - [30/Oct/2013:17:27:12 +0000] "GET / HTTP/1.0" 200 1579
	Oct 30 17:27:12 ip-172-31-25-226 jagged-playroom[web.5]: 172.31.25.226 - - [30/Oct/2013:17:27:12 +0000] "GET / HTTP/1.0" 200 1579

## Additional Resources

* [Get Deis](http://deis.io/get-deis/)
* [GitHub Project](https://github.com/opdemand/deis)
* [Documentation](http://docs.deis.io/)
* [Blog](http://deis.io/blog/)
