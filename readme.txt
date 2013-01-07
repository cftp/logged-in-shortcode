=== Logged In Shortcode ===
Contributors: johnbillion
Tags: shortcode
Requires at least: 3.0
Tested up to: 3.6
License: GPL v2 or later
Stable tag: trunk

A shortcode for showing/hiding content for logged in and non-logged in users

== Description ==

This plugin provides two shortcodes: One for showing content to logged in users and one for showing content to non logged in users. In both cases, the plugin will locate and display a fallback file from your theme (if present) if the shortcode condition isn't met.

= Usage =

To show content only to logged in users:

`[logged-in] You are logged in! [/logged-in]`

If the visitor is a logged in user, the content between the shortcodes will be shown. If the visitor is not logged in, the plugin will look for an optional template file in your theme in this order:

 * "shortcode-{post_type}-not-logged-in.php"
 * "shortcode-not-logged-in.php"

To show content only to non logged in users:

`[not-logged-in] You aren't logged in :( [/not-logged-in]`

If the visitor isn't logged in, the content between the shortcodes will be shown. If the visitor is a logged in user, the plugin will look for an optional template file in your theme in this order:

 * "shortcode-{post_type}-logged-in.php"
 * "shortcode-logged-in.php"

== Changelog ==

= 1.0 =
* Initial release.
