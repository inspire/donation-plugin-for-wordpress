=== Plugin Name ===
Contributors: mattyza, innerfire
Donate link: https://inspirepay.com/pay/inspirepay
Tags: inspirepay, donations, payment, widget, shortcode, Paypal, Dwolla, Credit Card, fundraising, inspire
Requires at least: 3.3.2
Tested up to: 3.4.2
Stable tag: 1.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Easily add a donation button to your site using InspirePay.com.  Get paid via PayPal, Dwolla, and Credit Cards.

== Description ==

Donations via InspirePay adds a simple widget for requesting donations in your sidebars, and gives you the power of simple short codes to request donations in your content.  InspirePay pages are free to setup at htttp://inspirepay.com/ , and are PCI DSS Level 1 compliant (ie. secure and audited by a third party) so your website doesn't need to be.  Brand them to match your style.

Easily accept payments of a specific amount or allow your users to choose.  InspirePay's integrated payment methods include Paypal, Dwolla, Stripe, and most credit card companies.  

InspirePay currently works with USD only.

**Widget Features**
* Sidebar widget which connects to your InspirePay page.
* Short codes to add donation form functionality to your content.
* Editable widget Title, pre-form text, submit button text, and post button text.
* Easily set a default payment amount, or allow your customers to choose.
* That's it today.  It's basic but gets the job done.

**InspirePay Features**
* It's Secure and Free.
* Allows you to express your design into the payment pages.
* Accept payments via Paypal, Dwolla, Stripe, and most credit cards.
* InspirePay pages are PCI Level 1 (Geek for secure as hell)

**Coming soon**
* More payment methods.
* Multi-currency support.
* Enhanced reporting.

If you have suggestions for a new feature (Plugin or InspirePay), feel free to email me at mark@inspirepay.com.

Want regular updates?  Become a fan of our facebook page.

https://www.facebook.com/inspirepay

Or follow us on twitter

http://twitter.com/inspirepay

== Installation ==

= Manual Installation =

1. Download the plugin from the WordPress.org plugin repository.
1. Visit the "Plugins > Add New" screen in your WordPress admin.
1. Click the "Upload" tab and browse to the ZIP file downloaded in step 1.
1. Clicking the "Upload" button will install the plugin.

= Automated Installation =

1. Under the "Plugins > Add New" screen in your WordPress admin, search for "inspirepay donations".
1. Once found in the search results, click the "Install" link next to the plugin.
1. The plugin has been successfully installed.

== Frequently Asked Questions ==

= How do I get an InspirePay account? =

InspirePay accounts can be setup at http://inspirepay.com/.  They are free.

= What should I put in "InspirePay URL Slug" in the widget settings?=

Your unique URL slug.  Mine is 'mark' since my InspirePay page is https://inspirepay.com/pay/mark

= What are the shortcodes? =

[inspirepay_donation inspirepay_url="mark"] 

Where "inspirepay_url" is your account name... Mine is "mark" which I just stated above, but if you'd like your website to send donations to me, that would be ok... just use mark.  Otherwise use you. 

Other variables are: "submit_button_text" and "donation_amount" 

In this case: [inspirepay_donation inspirepay_url="mark" submit_button_text="Donate A Slice Of Pizza" donation_amount="9.95"] 

Creates a form with a default amount of $9.95 (although this is a donation FORM, so the amount can be edited), with a button that reads, "Donate A Slice Of Pizza." 

If you want a fixed dollar amount, than a link is easier to build... 

<a href="https://inspirepay.com/pay/mark/$9.95">Donate A Slice Of Pizza</a>


== Screenshots ==

1. The Donation Form widget's settings.
2. The Donation Form widget, on your website (styling may vary).

== Changelog ==

= 1.0.0 =
* Initial release.

== Upgrade Notice ==

= 1.0.0 =
* Initial release.