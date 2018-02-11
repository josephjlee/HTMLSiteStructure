## HTMLSiteStructure 0.0.1.1 beta
A HTML-Boilerplate written in PHP 7 for output as template

## My Intention:
I had a break of five years from programming. I'm teaching myself with a project the new standards for writing API's in PHP, Java, Python, Javascript, Css to name a few. Have a inside view of my way of thinking how it has to be (or 'better' not). I do not try to reinvent the wheel. On some cases I will use other libraries for better stability, to have a capable progress. 

Actually, I decided to do my own work-around to output a well-formed HTML template. This gives me the possibility having a full control of my templates. It is a Boilerplate for a html document, experimental javascript and a different way of building a website. 

## Contact
If you find something, you would change, please write. Nothing is perfect here and is on his way for a few more updates. I try to document all the things I took from other programms. Give me feedback, if you find something undocumented from a other programmer.

## License

There's actually no license for this project.

## Configuration:
First: It is optional to use it. It's for free, but it's not stable. Therefore I give no warranty for the usage of this code.
Next: You need to install a vendor class, called "MobileDetect" from Victor Stanciu <vic.stanciu@gmail.com>. You will find it       on http://mobiledetect.net or https://github.com/serbanghita/Mobile-Detect

I used this dir-structure for my library at my root webhosting-package:
  - /core/
  - /static/
  - /logs/
  - /webservice/

I used this dir-structure for my domains at my root webhosting-package:
  - /domain-name-1/
  - /domain-name-2/
  - /domain-name-3/
  - /domain-name-4/

  ... and so on
    
I put all my static files like images, css and javascripts into a static subdomain. Looks like this:
  - <static.my-domain.com>/assets/css/
  - <static.my-domain.com>/assets/js/
  - <statict.my-domain.com>/assets/images/
  - <statict.my-domain.com>/assets/fonts/
  
In the dir /core/ I put my HTMLSiteStructure and MobileDetect. Should look like this:
  - /core/Page/
  - /core/Page/Interfaces/
  - /core/Page/Traits/
  - /core/Http/MobileDetect.php

The file "/cms.php" is placed in the dir "/core/". This file includes some configuration settings.

## Namespaces

My classes for HTMLSiteStructure are running under the namespace <b>Dmount\HTMLSiteStructure</b>.

Other classes, outside of HTMLSiteStructure are named with <b>Dmount\Core</b>.


## Classes

Following classes are included in the package:

# Footer
  
  Version: 0.0.1
  
# Header
  
  Version: 0.0.1
  
# Layout
  
  Version: 0.0.1
  
# Meta
  
  Version: 0.0.1
  
# Navigation
  
  Version: 0.0.1
  
# Page
  
  Version: 0.0.1
  
# Preloader
  
  Version: 0.0.1
  
# Sections
  
  Version: 0.0.1
  
# Theme
  
  Version: 0.0.1
  
# Vendor
  
  Version: 0.0.1

## Interfaces

  - Brand.int.php
  - Content.int.php
  - Footer.int.php
  - Header.int.php
  - Html.int.php
  - jQuery.int.php
  - Layout.int.php
  - Meta.int.php
  - Navigation.int.php
  - 

## Traits

  - BrandRessourceManagement.php
  - HtmlRessourceManagement.php
  - JavascriptRessourceManagement
  - SplashRessourceManagement.php
  - VendorRessourceManagement.php
  
# BrandRessourceManagement
  
  
# HtmlRessourceManagement
  
  
# JavascriptRessourceManagement

  
# SplashRessourceManagement

  
# VendorRessourceManagement


## CSS

If you followed the configuration above, you need to set four more dirs in "/css/", called:
  - /lib/
  - /themes/
    - /default/
  - /vendor/

Please put the css files below in "/default/":

- core.0.0.1.css
  import:
  - body-0.0.1.css
  - brand-0.0.1.css
  - navigation-0.0.1.css
  - splash-0.0.1.css
  - tabs-0.0.1.css

## Javascript

- core.0.0.1.js
  includes constructor functions:
  - Header (not defined)
  - Brand
  - Tabs
  - Splash (not defined)

# Other 
This project grows with the time and from now on I update the version, too. The structure of all classes are not really set yet and needs to be updated. 

If something is unclear, please do not hesitate to contact me for further inquiries. From time to time I will update the documentation and the project as a whole.
