# Geslib Files Component

Componente para lectura de ficheros de exportación de datos
de [Geslib](https://editorial.trevenque.es/productos/geslib/).

## Instalación

Este paquete es instalable y autocargable a través de Composer:

```$ composer require numaxlab/geslib-files```

## Uso

```php
use NumaxLab\Geslib\GeslibFile;

$geslibFile = GeslibFile::parse($fileContent);

$lines = $geslibFile->lines();
//...
```
