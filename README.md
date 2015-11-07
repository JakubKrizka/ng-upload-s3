# ng-upload-s3
Simple AngularJS directive that upload (any) files directly to AWS S3 from client-side.

Main project is [here](https://github.com/asafdav/ng-s3upload), this is edited version with working demo and detailed tutorial.

***

# DEMO
[YouTube](https://www.youtube.com/watch?v=6QcvrJ8r6z8)

![demo](https://cloud.githubusercontent.com/assets/10690361/11015137/7e8231e6-8552-11e5-9522-35374ad44631.gif)

***

# Run DEMO

1. Clone project: $ ```git clone https://github.com/jakubkrizka/ng-upload-s3.git```
2. Setup [AWS keys](https://youtu.be/dciTmc-2oIU) and [AWS Permissions](https://youtu.be/YTiezqArvsE) and copy this keys to [setting.php](https://github.com/jakubkrizka/ng-upload-s3/blob/master/settings.php#L9)
3. Setup [bucket](https://github.com/jakubkrizka/ng-upload-s3/blob/master/demo.html#L40) and [folder](https://github.com/jakubkrizka/ng-upload-s3/blob/master/demo.html#L41) in demo.html ..... more info how to create S3 bucket is [here](https://www.youtube.com/watch?v=VC0k-noNwOU)
4. Setup web server (Apache, Nginx, etc) and open demo.html in browser

***

# Configuration 

* [bucket name](https://github.com/jakubkrizka/ng-upload-s3/blob/master/demo.html#L40)
* [folder in bucket](https://github.com/jakubkrizka/ng-upload-s3/blob/master/demo.html#L41)
* [time expiration](https://github.com/jakubkrizka/ng-upload-s3/blob/master/settings.php#L14)
* [file maximum size](https://github.com/jakubkrizka/ng-upload-s3/blob/master/settings.php#L24)
* [Content-Type](https://github.com/jakubkrizka/ng-upload-s3/blob/master/settings.php#L25) - not testing yet

***

# Install to your project

## Bower coming soon ;)

