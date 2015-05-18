# PHP Quick Start Guide

This guide will walk you through deploying a PHP application on Deis.

## Usage

```
$ deis create
Creating application... done, created nimbus-waggoner
Git remote deis added
$ git push deis master
Counting objects: 4, done.
Delta compression using up to 4 threads.
Compressing objects: 100% (3/3), done.
Writing objects: 100% (4/4), 346 bytes | 0 bytes/s, done.
Total 4 (delta 2), reused 0 (delta 0)
-----> PHP app detected
-----> Resolved composer.lock requirement for PHP to version 5.6.7.
-----> Installing system packages...
       - PHP 5.6.7
       - Apache 2.4.10
       - Nginx 1.6.0
-----> Installing PHP extensions...
       - zend-opcache (automatic; bundled)
-----> Installing dependencies...
       Composer version 1.0-dev (c5cd184767001f34177da99e91f7a6dcf8ad27f6) 2015-03-24 01:36:30
       - Installing slim/slim (2.6.2)
       Loading from cache

       Generating optimized autoload files
-----> Preparing runtime environment...
-----> Discovering process types
       Procfile declares types -> web
       Default process types for PHP -> web
-----> Compiled slug size is 72M

-----> Building Docker image
remote: Sending build context to Docker daemon 75.37 MB
remote: build context to Docker daemon
Step 0 : FROM deis/slugrunner
 ---> ff6ff94ab108
Step 1 : RUN mkdir -p /app
 ---> Using cache
 ---> 63eca55624d8
Step 2 : WORKDIR /app
 ---> Using cache
 ---> 3eaa756d1c2c
Step 3 : ENTRYPOINT /runner/init
 ---> Using cache
 ---> b271c620819f
Step 4 : ADD slug.tgz /app
 ---> 93d76d83b0b6
Removing intermediate container 58bc45ac8615
Step 5 : ENV GIT_SHA bfffa50b155368573a98232953fdcb2548edf2a1

 ---> Running in 8a6b8e273f73
 ---> a288f00aabbd
Removing intermediate container 8a6b8e273f73
Successfully built a288f00aabbd
-----> Pushing image to private registry

-----> Launching...
       done, nimbus-waggoner:v3 deployed to Deis

       http://nimbus-waggoner.local3.deisapp.com

       To learn more, use `deis help` or visit http://deis.io

To ssh://git@deis.local3.deisapp.com:2222/nimbus-waggoner.git
   90f1c0e..bfffa50  master -> master
$ curl http://nimbus-waggoner.local3.deisapp.com
Powered by Deis
$ deis config:set POWERED_BY="Engine Yard"
Creating config... done, v4

=== nimbus-waggoner
DEIS_APP: nimbus-waggoner
POWERED_BY: Engine Yard
$ curl http://nimbus-waggoner.local3.deisapp.com
Powered by Engine Yard
```

## Additional Resources

* [Get Deis](http://deis.io/get-deis/)
* [GitHub Project](https://github.com/deis/deis)
* [Documentation](http://docs.deis.io/)
* [Blog](http://deis.io/blog/)
