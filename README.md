# PHP-CONFIG

This project is a loose port of [node-config](https://www.npmjs.com/package/config). I've only implemented enough of it to help me get going with an existing project.

### What does it do?

The goal of this package is to help you manage configuration files separated by environment, but used as a single object.

### How it works

Suppose your application exists in three environments: `development`, `stage`, and `production`. Each environment has its own unique configurations, and all three share some configuration in common.

As an organized developer, you'll create a `config` directory somewhere in your project, where you'll store the following files:

```javascript
/project
  /config
     default.json
     development.json
     stage.json
     production.json

// config/default.json
{
  "appVersion": "1.0.0",
  "app": {
    "views": {
      "cache": false
    }
  }
}

// config/development.json
{
  "db": {
    "username": "root",
    "password": "",
    "host": "localhost"
  }
}

// config/default.json
{
  "db": {
    "username": "stage-user",
    "password": "stage-password",
    "host": "stage-db"
  }
}

// config/default.json
{
  "db": {
    "username": "secure-user",
    "password": "secure-password",
    "host": "super-cluster"
  },
  "app": {
    "views": {
      "cache": true
    }
  }
}
```

You'll then have a single config object for whatever environment you're in, where `default.json` and the environment-specific `.json` object are merged together, with the default values being overwritten by the environment values (using a shallow merge).

```php
$env = getenv('APP_ENV');
$appRootPath = __DIR__;

$config = new Formigone\Config($env, $appRootPath);

$appVersion = $config->get('appVersion');
$db = $config->get('db');
$shouldCacheViews = $config->get('app.views.cache');
```

### Why reinvent the wheel?

So this project essentially mimics [ZF1's Zend_Config](https://github.com/zf1/zend-config), which allows for inheritable configs. Why use this instead?

 + Why use JSON?
     + So configs can be shared across PHP and JavaScript/Node.js
 + Why not use Zend_Config_Json?
     + Because Zend_Config_Json only parses a single file. That works fine in PHP, but if you use something in Node.js like node-config (which is what I happen to use), the you can't reuse the same config files. Given my specific use case (where I'm reusing configs and starting off with node-config), this makes sense, and hence my need for this package.
