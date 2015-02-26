# Hive API Package

[![Build Status](https://travis-ci.org/fastwebmedia/laravel-hive-api.svg?branch=master)](https://travis-ci.org/fastwebmedia/laravel-hive-api)

## Install

```
composer require fastwebmedia/hive
```

You then need to add the service provider
 
```
'FWM\Hive\HiveServiceProvider'
```

Finally publised the config 

```
artisan vendor:publish
```    

## Usage

You should first update the config file with the URL and the access token so you can make request via the Hive API.
 
```
$client = new FWM\Hive\Client();
return $client->api('user')->getUser('hello@fastweb.media');
```
 
## Documentation

Coming soon - for now look in the Code and User API classes to view the available methods.

