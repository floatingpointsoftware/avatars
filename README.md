# Avatars

Avatars allows you to easily and quickly support avatars throughout your application, by fetching
the required images and returning either the requested URL, or a 404 image for missing avatar requests. 

## Usage

Usage and retrieval of avatars is very simple. Because the package can be used to access several different
services, including gravatar or avatars.io, requesting and supporting avatars in your application has
never been simpler.

```php
$facebook = (new Avatar)->via('facebook')->get($idOrUsername);
$instagram = (new Avatar)->via('instagram')->get($idOrUsername);
$gravatar = (new Avatar)->via('gravatar')->get($hash);
 ```

You may wish to configure avatar defaults, as well - which you can easily do!

```php
$avatar = (new Avatar)->default('facebook');

$first = $avatar->get($id)
$second = $avatar->get($username)
```

Avatars can also take a configuration array that sets defaults as well as other features, such as the
driver you'd like to use when sourcing avatars:

```php
$config = [
    'driver' => 'avatarsio',
    'default' => 'facebook'
];

$avatar = new Avatar($configuration);
$avatar->get($id);
```

The above code will grab an avatar from the Facebook social platform. What about using the gravatar driver?
Using the same code from above - we could if we wish simply swap the driver.

```php
$avatar->driver('gravatar');
$avatar->get($hash);
```

In this manner, Avatar becomes a highly flexible and usable piece of software for all your avatar needs,
and ensures that you're not locked in to any particular driver or service for implementing avatars
in your application.
