# HTMLSiteStructure 0.0.1.1 beta
A HTML-Boilerplate written in PHP 7 for output as template

## My Intention:
I had a break of five years from programming. I'm teaching myself with a project the new standards for writing API's in PHP, Java, Python, Javascript, Css to name a few. Have a inside view of my way of thinking how it has to be (or 'better' not). I do not try to reinvent the wheel. On some cases I will use other libraries for better stability, to have a capable progress. 

Actually, I decided to do my own work-around to output a well-formed HTML template. This gives me the possibility having a full control of my templates. It is a Boilerplate for a html document, experimental javascript and a different way of building a website. 

## Contact
If you find something, you would change, please write. Nothing is perfect here and is on his way for a few more updates. I try to document all the things I took from other programms. Give me feedback, if you find something undocumented from a other programmer.

## Table of Contents:
  1. [Configuration] (#configuration)
  1. [Namespaces] (#namespaces)
  1. [Classes] (#classes)
  2. [Footer] (#footer)
  2. [Header] (#header)
  2. [Layout] (#layout)
  2. [Meta] (#meta)
  2. [Navigation] (#navigation)
  2. [Page] (#page)
  2. [Preloader] (#preloader)
  2. [Sections] (#sections)
  2. [Theme] (#theme)
  2. [Vendor] (#vendor)

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

**[⬆ back to top](#table-of-contents)**

## Namespaces

My classes for HTMLSiteStructure are running under the namespace <b>Dmount\HTMLSiteStructure</b>.

Other classes, outside of HTMLSiteStructure are named with <b>Dmount\Core</b>.

**[⬆ back to top](#table-of-contents)**

## Classes

Following classes are included in the package:

**[⬆ back to top](#table-of-contents)**

### Footer
  
  Version: 0.0.1

**[⬆ back to top](#table-of-contents)**

### Header
  
  Version: 0.0.1

**[⬆ back to top](#table-of-contents)**

### Layout
  
  Version: 0.0.1

**[⬆ back to top](#table-of-contents)**

### Meta
  
  Version: 0.0.1

**[⬆ back to top](#table-of-contents)**

### Navigation
  
  Version: 0.0.1

**[⬆ back to top](#table-of-contents)**

### Page
  
  Version: 0.0.1

**[⬆ back to top](#table-of-contents)**

### Preloader
  
  Version: 0.0.1

**[⬆ back to top](#table-of-contents)**

### Sections
  
  Version: 0.0.1

**[⬆ back to top](#table-of-contents)**

### Theme
  
  Version: 0.0.1

**[⬆ back to top](#table-of-contents)**

### Vendor
  
  Version: 0.0.1

**[⬆ back to top](#table-of-contents)**

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
  - Page.int.php
  - Preloader.int.php
  - Sections.int.php
  - Splash.int.php
  - Theme.int.php
  - Vendor.int.php

**[⬆ back to top](#table-of-contents)**

## Traits

  - BrandRessourceManagement.php
  - HtmlRessourceManagement.php
  - JavascriptRessourceManagement
  - SplashRessourceManagement.php
  - VendorRessourceManagement.php

**[⬆ back to top](#table-of-contents)**

### BrandRessourceManagement

**[⬆ back to top](#table-of-contents)**
  
### HtmlRessourceManagement

**[⬆ back to top](#table-of-contents)**
  
### JavascriptRessourceManagement

**[⬆ back to top](#table-of-contents)**
  
### SplashRessourceManagement

**[⬆ back to top](#table-of-contents)**
  
### VendorRessourceManagement

**[⬆ back to top](#table-of-contents)**

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

**[⬆ back to top](#table-of-contents)**

## Javascript

- core.0.0.1.js
  includes constructor functions:
  - Header (not defined)
  - Brand
  - Tabs
  - Splash (not defined)

**[⬆ back to top](#table-of-contents)**

## Other 
This project grows with the time and from now on I update the version, too. The structure of all classes are not really set yet and needs to be updated. 

If something is unclear, please do not hesitate to contact me for further inquiries. From time to time I will update the documentation and the project as a whole.

**[⬆ back to top](#table-of-contents)**

## License
There's actually no license for this project. It's just a study.
