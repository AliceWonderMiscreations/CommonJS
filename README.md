jQuery Collection
=================

This package contains jQuery 1,2,3 with necessary configuration files to create
JavaScriptResource objects as defined in the
[\AWonderPHP\NotReallyPsrResourceManager](https://github.com/AliceWonderMiscreations/NotReallyPsrResourceManager)
collection of interfaces.

Only the latest versions of jQuery 1 and 2 are included.

Every `major.minor.point` release of jQuery 3 that is included will be retained
for a minimum of twelve months after jQuery ceases support for jQuery 3 unless
a particular `major.minor.point` release has a severe bug that could compromise
the security of clients loading it.

Currently the following `major.minor.point` releases are included:

* jquery-1.12.4 (regular, minified)
* jquery-2.2.4 (regular, minified)
* jquery-3.0.0 (regular, minified, regular slim, slim minified)
* jquery-3.1.1 (regular, minified, regular slim, slim minified)
* jquery-3.2.1 (regular, minified, regular slim, slim minified)
* jquery-3.3.1 (regular, minified, regular slim, slim minified)


jQuery Library Files
--------------------

The files in the `js/` directory were taken directly from the
[https://code.jquery.com/jquery/](https://code.jquery.com/jquery/) and have not
been modified in any way. Feel free to verify the sha256 (or other) digest
yourself, I would in your shoes.


JSON Configuration Files
------------------------

The JSON configuration files for use with classes that implement the interfaces
in the
[\AWonderPHP\NotReallyPsrResourceManager](https://github.com/AliceWonderMiscreations/NotReallyPsrResourceManager)
namespace are located in the `etc/` directory and as distributed all end with the `.dist` suffix.

Those files should not be modified.

To point the configuration files to serve jQuery from a different host than the
host the web application is running on, copy the `.dist` files to have the same
name but without the `.dist` suffix, and then edit the `srcurl` property to
point to the intended URL.


Using the jQuery CDN
--------------------

A PHP script called `jQueryCDN.php` is provided in the `bin/` directory that
will make localized copies of the configuration files for you pointing to the
jQuery CDN. This is done strictly as a convenience, I do not know if their CDN
uses tracking cookies or not, but I do not think they do at this time and I
highly doubt they will in the foreseeable future.

With third party CDNs it is always a *possibility* they may in the future.

You will need to make sure `https://code.jquery.com/` is in your Content
Security Policy white list for scripts if you use Content Security Policy.

I highly recommend doing this. Their CDN is fast and fully supports the
integrity tag that `JavaScriptResource` implementations will create. However it
is *very bad form* to automatically default to a third party web resource, so
the system administrator must ‘opt in’ by running the provided script.

Note that you must re-run the script on update or the newer versions of jQuery
will not be configured to use the jQuery CDN.


