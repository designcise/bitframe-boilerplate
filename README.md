# BitFrame PHP Microframework Boilerplate

## Installation

Simply clone the repo and start building your projects.

### Prerequisites:

- BitFrame v2
- PHP 7.4.0+
- Nginx
- Docker Engine 1.13.0+

## Directory Structure

The following directory structure is recommended for development:

```
root (www)
├── client
│    ├── ...
├── public
│    ├── static
│    └── index.php
├── server
│    ├── app
│    ├── config
│    ├── helper
│    └── test
├── composer.json
└── ...
```

| Folder        | Description   |
| ------------- |:-------------:|
| client        | Frontend app code.   |
| public   | Publicly accessible client-facing directory.   |
| server        | Backend app code.   |

## Quickstart

### Getting Started:

Navigate to the `bitframe-boilerplate` project directory and run:

```
docker-compose up
```

Then, point your browser to access the example route `/hello/test`. For example, using default nginx config in the docker container, the complete url might look something like this:

```
http://localhost:8000/hello/test
```

But this may vary depending on your server configurations.

### Application Design Overview:

Following would get you up to speed about the application design:

- The main app code resides in the front-controller file at `public/index.php`.
- The main app code is wrapped in a self-calling anonymous function to keep the global namespace clean.
- The default controller (`BitFrame\Controller`) can be used as a service container, or you can inject your own as the first argument to `BitFrame\App`.
- The handy `import` function (`YourProject\Helper\import`) is used to import different parts of the application. This helps reduce visual clutter and keep things maintainable.
- The important directory paths are all defined as constants in `YourProject\App\Server`.
- The router is programmed to automatically pick-up the action part of the url path and match it against a method inside the controller with the same name, suffixed with `Action`.
- The `BitFrame\App::use()` method can be used to add middlewares. We use two middlewares in the example, one to emit the response and one for the router. 

### Customizing:

You may begin by customizing `root > server > composer.json`:

1. Start by customizing the name, author, version, etc. for your project. If you change the package name, make sure you update it in `root > composer.json` as well under "required" dependencies.
1. Add appropriate namespace to your app code by replacing `YourProject` with something else. Accordingly, please update namespaces throughout the project. A simply find / replace operation would help.
1. Run `composer dumpautoload` and/or `composer update` to `root > composer.json` to see the changes.

Next you can add more middleware, routes, controllers, services, etc. and start building your project. If you wish to change the directory structure, please update the constants in `YourProject\App\Server`.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

* File issues at https://github.com/designcise/bitframe-boilerplate/issues
* Issue patches to https://github.com/designcise/bitframe-boilerplate/pulls

## Documentation

Complete documentation for Bitframe v2 will be available on https://bitframephp.com soon.

## License

Please see [License File](LICENSE.md) for licensing information.
