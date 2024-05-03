
#  Kitchen core

Main dependencis of kitchen project

## Authors

- [@Miguel Quevedo](https://github.com/leugin)


## Installation

Install my-project with composer

```bash
  composer require leugin/kitchen-core
```

## License

[MIT](https://choosealicense.com/licenses/mit/)


## Deployment


#### Docker
```bash
docker build -t kitchen-core .
```
#### Normalize
```bash
docker exec -it fixer-kitchen-core /root/.config/composer/vendor/bin/phpcbf /var/www/html/src/
```

