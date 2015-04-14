# PHP Quick Start Guide

This guide will walk you through deploying a PHP application on Deis.

## Usage

```
$ deis create
Creating application... done, created drafty-aqualung
Git remote deis added
$ git push deis master
Counting objects: 189, done.
Delta compression using up to 8 threads.
Compressing objects: 100% (139/139), done.
Writing objects: 100% (189/189), 358.55 KiB | 0 bytes/s, done.
Total 189 (delta 45), reused 187 (delta 44)
-----> PHP app detected

       !     WARNING:        No composer.json found.
       Using index.php to declare PHP applications is considered legacy
       functionality and may lead to unexpected behavior.
       See https://devcenter.heroku.com/categories/php

-----> Setting up runtime environment...
       - PHP 5.5.11
       - Apache 2.4.9
       - Nginx 1.4.6
-----> Installing PHP extensions:
       - opcache (automatic; bundled, using 'ext-opcache.ini')
-----> Building runtime environment...
       NOTICE: No Procfile, defaulting to 'web: vendor/bin/heroku-php-apache2'
-----> Discovering process types
       Procfile declares types -> web
       Default process types for PHP -> web
-----> Compiled slug size is 58M
-----> Building Docker image
Uploading context 62.06 MB
Uploading context
Step 0 : FROM deis/slugrunner
 ---> 5567a808891d
Step 1 : RUN mkdir -p /app
 ---> Using cache
 ---> 86f57b162010
Step 2 : ADD slug.tgz /app
 ---> c14fd45b2b10
Removing intermediate container fdb110d87f49
Step 3 : ENTRYPOINT ["/runner/init"]
 ---> Running in c00be76098d4
 ---> e51324476b24
Removing intermediate container c00be76098d4
Successfully built e51324476b24
-----> Pushing image to private registry

       Launching... done, v2

-----> drafty-aqualung deployed to Deis
       http://drafty-aqualung.local.deisapp.com

       To learn more, use `deis help` or visit http://deis.io

To ssh://git@local.deisapp.com:2222/drafty-aqualung.git
 * [new branch]      master -> master
$ curl http://drafty-aqualung.local.deisapp.com
<!DOCTYPE html>
[...]
```

## Additional Resources

* [Get Deis](http://deis.io/get-deis/)
* [GitHub Project](https://github.com/deis/deis)
* [Documentation](http://docs.deis.io/)
* [Blog](http://deis.io/blog/)
