=== The Events Calendar: Community Events ===

Contributors: PaulHughes01, roblagatta, shane.pearlman, codearachnid, peterchester, reid.peifer, jonahcoyote, ModernTribe
Tags: widget, events, simple, tooltips, grid, month, list, calendar, event, venue, community, registration, api, dates, date, plugin, posts, sidebar, template, theme, time, google maps, google, maps, conference, workshop, concert, meeting, seminar, summit, forum, shortcode, The Events Calendar, The Events Calendar PRO
Requires at least: 3.3
Tested up to: 3.4.2
Stable tag: 1.0.4

== Description ==

Content

= The Events Calendar: Community Events =

* Frontend user event submission (anonymous & logged in)
* Decide whether submissions are published or saved to draft
* Style submission form using custom templates

== Installation ==

= Install =

1. Unzip the `the-events-calendar-community-events.zip` file.
2. Upload the `the-events-calendar-community-events` folder (not just the files in it!) to your `wp-contents/plugins` folder.
3. Activate the plugin!

= Requirements =

* WordPress 3.3
* PHP 5.2
* The Events Calendar 2.0.10 or above

== Documentation ==

Community Events extends the functionality of Modern Tribe's The Events Calendar to allow for frontend event submission on your WordPress site. With pretty permalinks enabled, the frontend fields are accessible at the following URLs:

Events list: /events/community/list/
Specific page in events list: /events/community/list/page/[num]
Add a new event: /events/community/add/
Edit an already-submitted event: /events/community/edit/[id] ( redirects to /events/community/list/[post-type]/id )
Delete an already-submitted event: /events/community/delete/[id]

Where /events/ is the TEC slug defined on the main tab, and /community/ is the CE slug defined on the Community tab (e.g. you can tweak the first 2 parts of the URL). These virtual pages will eventually be added to the WP menu as custom items. In Community Events 1.0, however, this is not a feature.

= Shortcodes =

Shortcodes are only available for users who have permalinks turned off; this method will NOT work if you're running with a pretty permalinks structure. These will only work on pages, so don't try them in posts/events/widgets/etc.

Shortcode information

Create a page and use the following:

[tribe_community_events_title] as title
[tribe_community_events] in content

You can add this page to the menu.

== Screenshots ==
1. Frontend event submission form
2. List of a user's submitted events
3. Community Events email notification example

== FAQ ==

= Where do I go to file a bug or ask a question? =

Please visit the forum for questions or comments: http://tri.be/support/forums/forum/events/community-events/

== Contributors ==

The plugin is produced by <a href="http://tri.be/?ref=tec-readme">Modern Tribe Inc</a>.

= Current Contributors =

* <a href="http://profiles.wordpress.org/users/paulhughes01">Paul Hughes</a>
* <a href="http://profiles.wordpress.org/users/roblagatta">Rob La Gatta</a>
* <a href="http://profiles.wordpress.org/users/codearachnid">Timothy Wood</a>
* <a href="http://profiles.wordpress.org/users/jonahcoyote">Jonah West</a>
* <a href="http://profiles.wordpress.org/users/peterchester">Peter Chester</a>
* <a href="http://profiles.wordpress.org/users/reid.peifer">Reid Peifer</a>
* <a href="http://profiles.wordpress.org/users/shane.pearlman">Shane Pearlman</a>

= Past Contributors =

* <a href="http://profiles.wordpress.org/users/jkudish">Joachim Kudish</a>
* <a href="http://profiles.wordpress.org/users/nciske">Nick Ciske</a>
* Justin Endler

= Translators =

* Spanish from Hector at Signo Creativo
* German from Marc Galliath
* Dutch from Jurgen Michiels
* French from Vanessa Bianchi
* Italian from Marco Infussi
* Czech from Petr Bastan


== Changelog ==

= 1.0.4 =

*Small features, UX and Content Tweaks:*

* Incorporated updated German translation files, courtesy of Marc Galliath. 

*Bug Fixes:*

* Fixed a bug that led to a fatal error in the WordPress 3.5 beta 2.
* Removed an illegal HTML style tag from the frontend Community form.

= 1.0.3 =

*Small features, UX and Content Tweaks:*

* Clarified messaging regarding pre-populated "Free" text on cost field.
* Disabled comments from the frontend submission form. 
* Added a filter -- 'tribe_community_events_event_categories' -- to allow users to filter the category list that appears on the frontend submission form.
* Added a new hook -- $args = apply_filters( 'tribe_community_events_my_events_query', $args ); -- at a user's request. This alteration allows you to tap into the WotUser object and pull out a list of events the user has access to and add them into this query.
* Incorporated new Dutch language files, courtesy of Jurgen Michiels.
* Incorporated new French language files, courtesy of Vanessa Bianchi.
* Incorporated new Italian language files, courtesy of Marco Infussi. 
* Incorporated new German language files, courtesy of Marc Galliath. 
* Incorporated new Czech language files, courtesy of Petr Bastan.

*Bug Fixes:*

* Removed a duplicate name attribute from venue-meta-box.php. 
* Categories now save on events submitted by subscriber-level members.
* Categories now save on events submitted by anonymous users. 
* The default state selection as configured in Events Calendar PRO now appears (along with the country) on the frontend submission form. 
* Subscriber-level users may now edit events when that option is enabled under Events --> Settings --> Community. 
* Reconfigured the cost field to work for frontend submissions on sites running the Eventbrite Tickets add-on + Community Events.
* Removed any lingering redirects to the WP Router Placeholder Page. 
* My Events filtering options no longer conflict with the calendar widget. 
* Fixed a broken link in the message that appears when Community Events is activated without the core The Events Calendar. 
* Removed code causing a division by zero error in tribe-community-events.class.php.
* Styles from Community-related pages (events-admin-ui.css) no longer load on non-Community pages. 
* Cleared up untranslatable language strings found in the 1.0.2 POT file.

= 1.0.2 =

*Small features, UX and Content Tweaks:

* Integration with Presstrends (<a href="http://www.presstrends.io/">http://www.presstrends.io/</a>).

*Bug Fixes:*

* Removed unclear/confusing message warning message regarding the need for plugin consistency and added clearer warnings with appropriate links when plugins or add-ons are out date.


= 1.0.1 = 

*Small features, UX and Content Tweaks:*

* Removed the pagination range setting from the Community tab on Settings -> The Events Calendar.
* Added body classes for both the community submit (tribe_community_submit) and list (tribe_community_list) pages.
* Incorporated new Spanish translation files, courtesy of Hector at Signo Creativo. 
* Incorporated new German translation files, courtesy of Mark Galliath.
* Added boolean template tags for tribe_is_community_my_events_page() and tribe_is_community_edit_event_page()
* Added new "Events" admin bar menu with Community-specific options

*Bug Fixes:*

* Rewrite rules are now being flushed when the allowAnonymousSubmissions setting is changed.
* Duplicate venues and organizers are no longer created with each new submission.
* Community no longer deactivates the Events Calendar PRO advanced post manager.
* Clarified messaging regarding the difference between trash/delete settings options.
* Header for status column is no longer missing in My Events.

= 1.0 =
Initial release