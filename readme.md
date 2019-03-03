# Expotition Laravel

1. Clone this repo
0. Run `composer install`
0. In the main directory, run `php artisan key:generate`
0. Point a domain at the public directory
0. You may need to monkey with file permissions

You should be able to browse the site.

## Creating a Gamebook Adventure

Web routes are setup to look for files in the resource folder based on url segments.

There are example files in `resources/adventures/test/` to use as guidelines for creating your own Gamebook. There is also a class folder in `app/Adventures/Test` that organizes the Actions for each setting in the Adventure.

To start a new Gamebook, add a new folder in `resources/adventures` and in `app/Adventures` and start adding files modeled after `test`. For more information on the Expotition library, [visit the GitHub project](https://github.com/puritandesigns/expotition). There's also a [presentation that overviews the Gamebook concepts](http://puritandesigns.com/expotition/).
