---
title: Getting Started
currentMenu: gettingStarted
---

**For those who have never used a terminal:** When copying and pasting from here to your terminal, do NOT include `$ ` (dollar sign followed by a space). `$ ` is used to indicate the beginning of a new command. Enter commands one at a time and press return after each one.

If you're working locally, you'll need something like [MAMP](http://www.mamp.info/en/) to work with the PHP and MySQL required by WordPress. If you're working remotely, you'll have to deal with the pitfalls of SSH (lagging and broken pipes), unless you use something like [Mosh](http://mosh.mit.edu/) (which I highly recommend).

---

## Setting Up Your Environment

First, you'll need to [install git](http://git-scm.com/book/en/Getting-Started-Installing-Git). Then, you will need `nodejs` (and `npm`). [Head here for the most complete instructions I've found.](https://github.com/joyent/node/wiki/Installing-Node.js-via-package-manager) Once you have `npm`, you can install the [Grunt Command Line Interface](http://gruntjs.com/getting-started) or [Gulp](https://github.com/gulpjs/gulp/blob/master/docs/getting-started.md), and `node-sass` globally:

```
$ npm install -g grunt-cli
$ npm install -g gulp-cli
$ npm install -g node-sass
```

---

## Installing WordPress and Scratch

Navigate to the root directory of your site. Copy and paste this into your terminal:

```
$ wget http://wordpress.org/latest.tar.gz && tar xfz latest.tar.gz && mv wordpress/* ./ && rmdir ./wordpress/ && rm -f latest.tar.gz
```

or, if you have [WP-CLI](https://wp-cli.org/):

```
$ wp core download
$ wp core config # you'll need some arguments here
$ wp core install # and here
```

Now you can do this:

```
$ cd wp-content/themes/
$ git clone https://github.com/zackphilipps/scratch-theme.git
```

![Getting Started Screencast](/assets/img/screencast1.gif)

At this point you should install dependencies:

```
$ cd scratch-theme/
$ npm install
```

---

## What's Included

```
scratch-theme/
├── assets/
│   ├── core/
│   ├── css/
│   ├── fonts/
│   ├── grunt/
│   ├── gulp/
│   ├── img/
│   ├── js/
│   └── scss/
├── docs/
├── includes/
├── parts/
│   └── layouts/
├── root/
└── acf-json/
```

The `assets/` directory contains all SCSS, CSS, JS, images, and fonts as well as the `Gruntfile` and `gulpfile` and their respective `package.json` files. [There are also helpful READMEs in most directories.](https://github.com/zackphilipps/scratch-theme)

The `docs/` directory contains the markdown files you are reading right now. `includes/` has additional PHP that's loaded into `functions.php`. `parts/` are partial templates like `header.php` and `footer.php`. `root/` contains files that should be moved to the root of your site if you desire to use the configuration that comes with [HTML5 Boilerplate](https://github.com/h5bp/html5-boilerplate).

---

**Next up:** [Check out these screencasts](/screencasts.html) to see Scratch in action, but bear in mind that they may be out of date. Who has time to make gifs?!
