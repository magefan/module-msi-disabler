# Magento 2 Multi-Source Inventory Disabler

## Installation Method 1 - Installing via composer
  * Open command line
  * Using command "cd" navigate to your magento2 root directory
  * Run the commands:
  
```
composer require magefan/module-msi-disabler
php bin/magento setup:upgrade
php bin/magento setup:di:compile
php bin/magento setup:static-content:deploy
```

## Installation Method 2 - Installing via FTP using archive
  * Download [ZIP Archive](https://github.com/magefan/module-msi-disabler/archive/main.zip)
  * Extract files
  * In your Magento 2 root directory create folder app/code/Magefan/MsiDisabler
  * Copy files and folders from the archive to that folder
  * In the command line, using "cd", navigate to your Magento 2 root directory
  * Run the commands:
```
php bin/magento setup:upgrade
php bin/magento setup:di:compile
php bin/magento setup:static-content:deploy
```
## Usage

Follow this article ...
