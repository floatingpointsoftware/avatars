# Avatars

Avatars allows you to easily and quickly support avatars throughout your application, by fetching
the required images and returning either the requested URL, or a 404 image for missing avatar requests. 

## Installation

    composer require floatingpoint/avatars

## Usage

Usage and retrieval of avatars is very simple. Because the package can be used to access several different
services, including gravatar or avatars.io, requesting and supporting avatars in your application has
never been simpler.

First we need to configure Avatar and register our required drivers.

```php
$avatar = new Avatar;
$avatar->addDriver(new AvatarsIoDriver(['default' => 'facebook']));
$avatar->addDriver(new GravatarsDriver);
 ```

This registers two drivers that we can cycle through, but now let's just work with the Gravatars driver:

```php
$avatar->use('gravatars');
```

The string here refers to the name of the actual driver that is configured on the driver itself. The current
available drivers via their names are:

* gravatars and
* avatars.io

You can switch drivers at any point, simply by calling 'use' again.

### Gravatars

Let's fetch an avatar now from the Gravatars service:

```php
$avatar->get($hash);
```

You can also do it via an email using the same method:

```php
$avatar->get('me@domain.com');
```

Now, what if we want to work with Avatars IO service?

### Avatars.IO

```php
$avatar->use('avatars.io');
$avatar->get($id);
```

Remember earlier we set the default service for avatars.io to Facebook? The above call to get would then 
retrieve an image from the user's facebook account based on the id provided.

We can simplify this further, as well:

```php
$avatar->get($id, 'avatars.io', 'twitter');
```

This will fetch an image using the Avatars IO driver, and set the service to be used for the request to twitter.
In other words, the request will fetch the user's avatar from their twitter account, avoiding the defined default.
