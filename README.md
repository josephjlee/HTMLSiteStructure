# HTMLSiteStructure 0.0.1 alpha
A HTML-Boilerplate written in PHP 7 for output as template

# My Intention:
I had a break of five years from programming. I'm teaching myself with a project the new standards fo writting codes in PHP, Java, Python, Javascript, Css to name a few. Have a inside view of my way of thinking how it has to be (or 'better' not). Actually, I decided to do my own work-around to output a well-formed HTML template. 

# Configuration:
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
  
In the dir /core/ I put my HTMLSiteStructure and MobileDetect. Should looks like this:
  - /core/Page/
  - /core/Page/Interfaces/
  - /core/Page/Traits/

  - /core/Http/MobileDetect

