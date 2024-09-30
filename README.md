# silverstripe-blog-utils

A collection of enhancements & utilities for the Silverstripe
[Blog](https://github.com/silverstripe/silverstripe-blog) module.

These include:

  - a cron task/extension to allow the specification of an expiration date for a
    post, at which time it is automatically archived.

## Installation

```sh
composer require "logicbrush/silverstripe-blog-utils"
```

To execute the cron task, you must create a cron job that calls `dev/cron` as
[illustrated here](https://github.com/silverstripe/silverstripe-crontask).

## Blog Post Expiration

A new date time field `Expired Date` has been added to the `Post Options` tab.
Enter this value to have the post automatically archived at the specified time.
