=== Plugin Name ===
Contributors: jivedig, nathanrice, studiopress, cliffpaulick, marksabbath, modernnerd
Tags: redirect, click tracking, custom post types
Requires at least: 3.0
Tested up to: 5.2.2
Stable tag: 0.9.9

Mai Simple URLs is a complete URL management system that allows you create, manage, and track outbound links from your site.

== Description ==

Mai Simple URLs is a complete URL management system that allows you create, manage, and track outbound links from your site by using custom post types and 301 redirects.

It adds a new custom post type to your Admin menu, where you can create, edit, delete, and manage URLs. It stores click counts in the form of a custom field on that custom post type, so it scales really well.

And by avoiding page based redirects, which is the current trend in masking affiliate links, we avoid any issues with permalink conflicts, and therefore avoid any performance issues.

== Installation ==

1. Upload the entire `simple-urls` folder to the `/wp-content/plugins/` directory
1. DO NOT change the name of the `simple-urls` folder
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Navigate to `Settings > Permalinks` and save them. Yes, just click save. Trust me.
1. Navigate to the `Simple URLs` menu
1. Create a new URL, or manage existing URLs.
1. Publish and use the URLs however you want!

== Frequently Asked Questions ==

= When I try to access my new URL, I'm getting a 404 (not found) error =

Sounds like you didn't follow the installation instructions :-)

Navigate to `Settings > Permalinks` and save them. No need to change anything, just click the save button.

= Can I change the URL structure to use something other than /go/ ??? =

Yes, by using the filter `simple_urls_slug`.

Usage:
```
add_filter( 'simple_urls_slug', function(){
    return 'redirect-me';
});
```

== Screenshots ==

1. The URL management screen
2. The URL create/edit screen

== Changelog ==

= 0.9.9 =
* Fixed URLs not properly redirecting.

= 0.9.8 =
* Coding standards.
* Added composer.
* Added Circle CI integration.
* Added new filter to change the slug.
* Added REST support to ensure Simple URLs appear in list when linking text.
* Added cast string to int to avoid type error.

= 0.9.7 =
* WordPress compatibility.

= 0.9.6 =
* Add plugin header i18n
* Add textdomain loader

= 0.9.5 =
* Changed messages and labels.
* Updated textdomain.
* Generated POT file.

= 0.9.4 =
* Fixed saving bug

= 0.9.3 =
* Removed capability line from the register function. Users with permission to edit posts can create/edit URLs.
* Bumped to show compatibility with WordPress 3.0.4

= 0.9.2 =
* Fixed a type in the plugin URL
* Bumped to show compatibility with WordPress 3.0.2

= 0.9.1 =
* Fixed bug with URLs with ampersands in them
* Added `'with_front' => false` to the post type registration

= 0.9 =
* Initial Beta Release
