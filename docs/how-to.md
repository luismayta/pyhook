# How To Use

Clonar el repo de Hooks:

```bash
$ git clone "repo de hooks git"
```

Ir al repo que se desea agregar el hook y hacer lo siguiente:

```bash
$ cp pre-commit .git/hook
$ chmod +x .git/hook/pre-commit
```

## Example

para comprobarlo vamos a generar un archivo php


```bash
$ vim test.php
```

Incluir lo siguiente:

```bash
<?php
    var_dump("Test Pre-commit");
    print_r("Test Pre-commit");
    eval();
```

Despues Comitear:

```bash
$ git add .
$ git commit -m "test commit"
```

El Hook lo que realiza es cancelar el Commit ya que revisa en los archivos que se comitea
si existen las funciones configuradas que no deben pasar.

**output**


```bash
Se encontraron los siguientes Errores
file: test.php line: 2 codigo:  var_dump("Test Pre-commit");

file: test.php line: 3 codigo:  print_r("Test Pre-commit");

file: test.php line: 4 codigo:  eval();
If you are sure you want to commit those files, use --no-verify option
```


En el caso que sea necesario comitear realizar lo siguiente:

```bash
$ git commit -m "test commit" --no-verify
```

Esto hace que no se ejecuten los hooks


## Microsoft Windows

**Agregar el path del binario de python a las variables de entorno**
