Telerivet for Yii2
================
This component is YII2 wrapper for Telerivet PHP SDK.

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist open-ecommerce/yii2-Telerivet "dev-master"
```
or if you have composer installed globaly
```
composer require --prefer-dist open-ecommerce/yii2-Telerivet "dev-master"

```
or add
```
"open-ecommerce/yii2-Telerivet": "dev-master"
```

to the require section of your `composer.json` file.

Depending on your minimun composer requirements defined in your composer.json you will need to add the repository:

```
"repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/open-ecommerce/yii2-telerivet"
        },
        ...
```


Usage
-----

Once the extension is installed, simply use it in your code by putting this in your config:
```php
'components' => array(
    ...
    'Yii2Telerivet' => array(
        'class' => 'openecommerce\yiiTelerivet\YiiTelerivet',
        'account_sid' => getenv('Telerivet_ACCOUNT_SID'),
        'auth_key' => getenv('Telerivet_AUTH_KEY'),
    ),
    ...
);
```

After you have configured a component, you can use it for example in this way:

```php

    $TelerivetService = Yii::$app->Yii2Telerivet->initTelerivet();

        try {
            $message = $TelerivetService->account->messages->create(
                "+12345678901", // To a number that you want to send sms
                array(
                "from" => "+12345678901",   // From a number that you are sending
                "body" => "Hello from my Yii2 Application!",
            ));
        } catch (\Telerivet\Exceptions\RestException $e) {
                echo $e->getMessage();
        }

```

For more SDK functions and usage documentation feel free to visit official Telerivet PHP SDK documentation section [here](https://github.com/Telerivet/telerivet-php-client).

Resources
-----

[Telerivet.com](http://www.Telerivet.com)


If you have any questions, feel free to ask.
