# jxAttrEdit

*Module for backend / admin of OXID eShop for editing attributes of products.*

This module shows all available attributes on one tab page and offers all used values of an attribute as proposal.  

Changes field values are marked with a different color for visualizing which of the attributes are changed.

If the product has variants you can switch to another variant or to the parent without choosing the main tab.

Tested with OXID version 6.0

### Install via Composer (Path repository)

- Create directory in root `/privateSrc/Job963/AttrEdit`
- Download module and copy code into created folder
- Add path repository to composer.json (Code after this list)
- Open terminal in root and enter `composer req job963/attredit`

    "repositories": [
        {
            "type": "path",
            "url": "privateSrc/Job963/AttrEdit"
        }
    ]

### Install via Composer (Git repository / NOT TESTET!)

- Add git repository to composer.json (Code after this list)
- Open terminal in root and enter `composer req job963/attredit`

    "repositories": [
        {
            "type":"package",
            "package": {
            "name": "job963/attredit",
            "version":"oxid6",
            "source": {
                "url": "https://github.com/job963/jxAttrEdit",
                "type": "git",
                "reference":"oxid6"
                }
            }
        }
    ]

### Install via Composer (Packagist.org)

- Package is not registrated via Packagist atm
- We work on it :)

### Screenshot
![](https://github.com/job963/jxAttrEdit/raw/develop/docs/img/editattributes.jpg)


### History

* **Release 0.3**
  * Support for multi-language shops added  

* **Release 0.4**
  * Compatibility for 4.7-4.9 implemented
  * Configurable number of columns

* **Release 0.5**
  * Translation changed to UTF-8
  * Language switch added
  * Number of colums as select box
  * Highlighting of basket attributes

* **Release 0.6**
  * Refactoring all Codes to Oxid 6
  * Modul is installable via composer (Not Packagist, only as path repository)
  * Disable all Attributes for fast edit per default
  * All Attributes can be enabled for fast edit (If u have 20+ Attributes u can setup only a bunch of'em to keep usability)