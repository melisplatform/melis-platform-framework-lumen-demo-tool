# melis-platform-framework-lumen-demo-tool

This module provides a simple tool inside melis-platform that display the content of Lumen.

### Prerequisites

This module requires melisplatform/melis-platform-frameworks in order to have this module running. This will automatically be done when using composer.

### Installing

```
composer require melisplatform/melis-platform-framework-lumen-demo-tool
```

### Configuration

This module also configured to access the Lumen framework inside directory of /thirdparty by just adding this data to the array inside config/module.coonfig.php file

```
return [
  'third-party-framework' => [
     'index-path' => [
        '/mylumen/public/index.php'
     ]
   ],
   ...
]
```

The module will determine the execution of the third party by providing the path of the index.php file.