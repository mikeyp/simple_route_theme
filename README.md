This module provides the ability to use a `_theme` key in route definitions to specify a theme hook that should be called to return the content for the route. 

## Example

In your *.routing.yml file:

```
pages.foo:
  path: '/pages/foo'
  defaults:
    _theme: 'pages_foo'
    _title: 'Foo Page'
  requirements:
    _access: 'TRUE'
```

This would return a render array for the content of `/pages/foo` of:

```
array('#theme' => 'pages_foo')
```

## Installation and configuration

There is no configuration other than enabling/disabling the module.