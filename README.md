# melis-platform-framework-lumen-demo-tool

This module provides a simple tool inside melis-platform that display the content of Lumen.

### Prerequisites

This module requires melisplatform/melis-platform-frameworks in order to have this module running. This will automatically be done when using composer.

### Installing

```
composer require melisplatform/melis-platform-framework-lumen-demo-tool
```

### Configuration

This module is also configured to access the Lumen framework inside the directory of ``/thirdparty`` by just adding the data to the array inside config/module.config.php file :

```
return [
  'third-party-framework' => [
     'index-path' => [
        '/Lumen/public/index.php'
     ]
   ],
   ...
]
```

The module will determine the execution of the third party by providing the path of the ``index.php`` file.

## Authors

* **Melis Technology** - [www.melistechnology.com](https://www.melistechnology.com/)

See also the list of [contributors](https://github.com/melisplatform/melis-core/contributors) who participated in this project.


## License

This project is licensed under the OSL-3.0 License - see the [LICENSE.md](LICENSE.md) file for details
