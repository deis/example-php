# PHP Quick Start Guide

This guide will walk you through deploying a PHP application on [Deis Workflow][].

## Usage

```console
$ git clone https://github.com/deis/example-php.git
$ cd example-php
$ deis create
Creating Application... done, created zanier-zeppelin
Git remote deis added
remote available at ssh://git@deis-builder.deis.rocks:2222/zanier-zeppelin.git
$ git push deis master
Counting objects: 224, done.
Delta compression using up to 4 threads.
Compressing objects: 100% (153/153), done.
Writing objects: 100% (224/224), 368.18 KiB | 0 bytes/s, done.
Total 224 (delta 61), reused 224 (delta 61)
Starting build... but first, coffee!
-----> PHP app detected
-----> Bootstrapping...
-----> Installing platform packages...
       - php (7.0.7)
       - apache (2.4.20)
       - nginx (1.8.1)
-----> Installing dependencies...
       Composer version 1.0.3 2016-04-29 16:30:15
       Loading composer repositories with package information
       Installing dependencies from lock file
       - Installing slim/slim (2.6.2)
       Downloading: 100%

       Generating optimized autoload files
-----> Preparing runtime environment...
-----> Checking for additional extensions to install...
-----> Discovering process types
       Procfile declares types -> web
       Default process types for PHP -> web
-----> Compiled slug size is 14M
Build complete.
Launching App...
Done, zanier-zeppelin:v2 deployed to Deis

Use 'deis open' to view this application in your browser

To learn more, use 'deis help' or visit https://deis.com/

To ssh://git@deis-builder.deis.rocks:2222/zanier-zeppelin.git
 * [new branch]      master -> master
$ curl http://zanier-zeppelin.deis.rocks
Powered by Deis!
Running on container ID zanier-zeppelin-v2-web-dbj92
```

## Additional Resources

* [GitHub Project](https://github.com/deis/workflow)
* [Documentation](https://deis.com/docs/workflow/)
* [Blog](https://deis.com/blog/)

[Deis Workflow]: https://github.com/deis/workflow#readme
