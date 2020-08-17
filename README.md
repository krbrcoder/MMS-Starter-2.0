# Commit v.1.1.3
#####January 5, 2018

####Fixed:
* Debugged NEWS / MSG / DEAN / SPOTLIGHT area
* Debugged metabox admin
* Debugged faculty listing profile appearances
* Debugged services menu issues

####Removed:
* CPTonomies reference in archive
* Removed page-template-facultylistingv2

####Revised:
* Header nestings to reflect proper hierarchy of page
* Changed all icon references to be accessibility friendly
* Debugged leftsidebar for faculty v2
* Blog info for categories
* Debugged metabox.js

#####Functions:
* Removed extra blank lines in code
* Improved global style variable calls
* Placed most nav variables in variable style.scss
* Debugged accessibility issue with sidebars
* Simplified coding for header / top post thumbnail
* Improved coding functionality for page cpts
* Improved top menu navigation to populate specific menu depending on page template

#####Styles:
* Improved accessibility for MMS logo
* Improved accessibility for look of buttons / headers
* Improved look for carousel
* Improved accessibility for links in hover / active / focus settings
* Minor improvements to typography
* Improved accessibility for $utorange (darkened it)
* Improved functionality for slider template
* Improved dynamic functionality for facultylisting page (to accommodate for v2)

####Additions:
* Improved accessibility for all page templates / archives / categories / single / header / sidebars
* Added unique variable search ids for 404 / index / searchform
* Added title to readme for sr-only class
* Added staff ul styles
* Addressed accessibility issues with tablepress
* Added left / right sidebar components for page templates


# Commit v.1.1.2
#####November 1, 2017
2017.11.01 :: combined functionality for services into pages.php CPT

####Removed:
* CPT extras for services (no duplication of re-usable content)
* Removed extra spacing in faculty listing pages

####Revised:
#####Styles:
* Add style for roster ul


# Commit v.1.1.1
#####October 17, 2017
2017.10.17 :: updated menu-mainmenu.php to eliminate php errors

####Fixed:
####Revised:
* Revised coding for mainmenu - services if statement improved


# Commit v.1.1.0
#####October 12, 2017
2017.10.12 :: Services or Retail templates and styles

####Additions:
* Add the functionality of Services
* * Menu Items added
* * New header created
* * New variable added for MMS Link
* * Metabox admin adjusted
* * Mainmenu accommodating for services menu


# Commit v.1.0.9
#####September 18, 2017
Improved SEO, Improved site-search, Improved accessibility changes compliant with new web-aim reports, Simplified coding

####Fixed:
####Revised:
* Readme file issue
* Debugged faculty listing image issue
* Debugged right sidebar include for faculty listing pages
* Revised search terms to show all terms on one page


#####Functions:
#####Styles:
* Enhanced deplogo
* Enhanced googlemap appearance

####Additions:
* Added slug capability for all pages


# Commit v.1.0.8
#####July 28, 2017
Enhanced left sidebar. Added right sidebar capabilities. Connected news to faculty and some page templates. Enhanced news section. Fixed tiled page template.

####Fixed:
* Left sidebar - populates fields better
* Homepage flashcard thumbnail issue

#####Coding:
* Streamlined coding for news anchored to faculty + related internal pages

####Revised:
* Organized menu structures in separate folder

#####Styles:
* Left sidebar (headline + div spans)
* new style specified to generic styles


####Additions:
* Right sidebar - internal / external pages + wysiwyg field
* Tagged page template# Commit V.1.0.0


# Commit v.1.0.7.1
#####May 23, 2017
Added Banner section under homepage spotlight area. Added new homepage layout option. Added columns shortcode and icons to button shortcode. Added titling / linking capabilities to tiled listings. Added new page section layout (double column - 2 columns). Added theme color support through Theme Options. Improved sidebar for post listing pages.

####Fixed:
* Buttons properties so they are not overwritten by post-declared classes
* Homepage video slider div container properties

#####Coding:
* Streamlined maincontent coding

####Removed:
* WordPress auto paragraph reformatting for all "the_content" instances
* Image location delegations for all tiled listings

####Revised:
* Responsive images automatically to all thumbnails and images

####Additions:
* Added faculty search back in for faculty listings
* Added unlimited post listings for archive and category
* Added font-awesome icon specifications in buttons
* Column shortcode: half, third, quarter, two-third, three-quarter
* Ability to choose site theme color
* [INCOMPLETE] Right Sidebar
* Homepage layout options - cards / stacked / overlayed
* Banner section under homepage spotlight area
* [INCOMPLETE] CTA Text button and link options - no code / styles added yet
* Ability to title and link tiled listings
* Double Box layout added


# Commit v.1.0.7
#####May 18, 2017
Added header / footer injections. Tiled page listings. Improved overall styles. Ability to choose different homepage module setup. Theme options now includes color theme selection. Established better pattern library components. Debugged left sidebar and coding inclusions based on metabox completion.

####Fixed:
* IE 10 or below rendering issues

#####Coding:
* Streamlined maincontent coding
* [INCOMPLETE] Debugged left sidebar for pages - active / inactive page selection
* [INCOMPLETE] Debugged left sidebar for posts - show menu based on category
* Streamlined color variables so primary / secondary color selection is automated
* [MAY HAVE BUGS] Homepage appearance metaboxes based on what information is filled out
* Debugged faculty tab to not show if no faculty selected for tabbed pages

####Removed:
* Unnecessary coding for WordPress file-size specifications
* Icon shortcodes
* Unnecessary coding for page-section items that are defunct

####Revised:

#####Functions:
* Footer menu titles
* Ability to choose different styles based on "Theme Options" "Color" specifications
* Ability to choose default or muted card style module section for homepage
* Button / Accordion shortcodes
* Order of homepage module items - modified order of appearance
* Location of "Edit this entry" link

#####Styles:
* Accordions, animation, faculty, maincontent styles modified for accessibility
* Improved button styles (check pattern library on med.uth.edu/test/ for new style options)
* Improved live-search visibility
* Improved responsiveness for wordpress core styles

#####Additions:
* Header / Footer injections added to "Theme Options" under "Appearance"
* Jquery
* [INCOMPLETE] Additional Links & Related Posts for faculty - began coding for faculty CPT.
* 2 more layout styles for page sections
* Width adjustment per page section item
* Pre / Highlight styles added for better sample markup (med.uth.edu/test/pattern-library)
* Orange color scheme
* Tiled Items page template
* Search option to faculty listing 2 page template
* Added description area to homepage module area


# Commit v.1.0.6
#####March 8, 2017
Changed to adhere to A/AA Error compliance for Accessibility. Simplified coding. Added faculty sorting capabilities (Psychiatry request). Added dynamic coding for faculty fields. Style changes. *** REMOVED SEARCH TEMPORARILY FOR ALL ACCESSIBILITY CHECKS. Removed unused images.

####Fixed:
* Accessibility issues adhering to A/AA error compliance
* aria-labelledby for tabs, navigation, header, ids

####Removed:
* Faculty live-search - to pass accessibility
* Category left sidebar archive search - to pass accessibility

####Revised:
#####Styles:
* Made overall color contrast 3:1 ratio for AA error compliance

#####Functions:
* Simplified faculty / division page calls

#####Additions:
* Staff listings page
* Faculty page to be sorted by meta bundles


# Commit v.1.0.5
#####December 12, 2016
Converted site from LESS -> SASS.

####Fixed:
* 404 Header title.
* Size of faculty profiles.
* SEO Optimization

#####Styles:
* Improved color sorting for left sidebar

####Revised:
#####Functions:
* Simplified call for favicon
* Simplified SASS variables

#####Additions:
* Navigation for category page listings
* Form functionality for category


# Commit v.1.0.4
#####December 1, 2016
Continued improvements to debug theme. Added new division page component. Added sidebar component that can handle complex parent / child relations. Debugged tabbed pages.

####Fixed:
* Debugged tabbed bug.
* Debugged faculty listing (lname / fname).
* Leftsidebar parent / child relationship.

####Removed:
* post category archive listing by month (form accessibility issue could not debug)

####Revised:
#####Styles:
* Added beige homepage box

#####Functions:
* Simplified calling for facultylisting php

#####Additions:
* Thumbnail size
* Appointment link for faculty profile
* Breadcrumbs


# Commit v.1.0.3
#####October 19, 2016
Accessibility changes and breadcrumbs improved / debugged. Improved hierarchy coding for all pages. Responsive components added.

####Fixed:
* Leftsidebar links - accessibility from mmslink -> primarycolor
* Leftsidebar posts - debugged extra empty link - improved thumbnail display
* Staff -> Faculty parse

####Removed:
* hr spacer in leftsidebar unless within php implementation
* post category archive listing by month (form accessibility issue could not debug)

####Revised:
#####Styles:
* Button styles for 404search
* Top department / logo name h1 appearance addressed - 46px (changed from 40px)
* Titlebar h1 addressed
* Type treatments matched to PCOE (38px/32px/24px/20px)

#####Functions:
* 404 / index pages simplified / debugged
* Improved hierarchy coding implementation for all pages
* Responsive design for #mainmenu for SM + XS

#####Additions:
* New breadcrumbs functionality added to contact, slider, tabbed, and page template


# Commit v.1.0.1
#####Septemer 16, 2016
Major revisions for starter based on carmig requests and debugging with internal medicine.

####Fixed:
* Thumbnail issues with sizing.
* Javascript errors (ongoing)
* Main Menu Navigation menu dropdown issue
* Metabox showing wrong boxes
* Homepage image issue
* Slider carousel indicators to appear only if more than 1 image

####Removed:
* Breadcrumbs
* Button Animation
* Duplicate called files in header / footer
* Left sidebar components for faculty pages + pages + posts + search

####Revised:
#####Functions:
* Left sidebar - Cleaned up
* Labels for homepage page setup
* Mobile navigation
* Super-navigation
* Contact page (order of appearance)
* Changed order of publication appearance for faculty single profile
* Labels for specific pages

#####Styles:
* Buttons
* Calendar entries
* Carousel captions and wp-captions
* Main menu navigation
* News Archives
* News section padding
* Consistent blue color matched with MMS home

#####Additions:
* New thumbnail profile picture
* Excerpt
* Clinical Phone
* Featured faculty option on homepage
* Third Column option for homepage
* Category page
* Single post page
* Screenshot


#####July 1, 2016
New commit for starter 2.0 theme
* Based on * Starter 1.0 Theme*