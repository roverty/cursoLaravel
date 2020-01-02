# Curso laravel

## Instalación y configuración del entorno de trabajo distribuciones de GNU/Linux basadas en ArchLinux

Considero que hacer la instalación el una distribución de linux basada en archLinux es la manera más fácil de tener el ambiente configurado. Además, al ser *rolling realise*  nos asegura que siempre tendremos la última versión de los paquetes sin siquiera tener que pedirselo. Obviamente existen sus pros y contras de esto último.

- Instalación de php y sus extensiones

  ```shell
  sudo pacman -S php
  sudo pacman -S php-sqlite # Es la extensión para conectarnos a sqlite
  sudo pacman -S php-pgsql # Es la estensión para conectarnos a postgreSQL
  ```

  Después de instalar php y sus extensiones se debe editar el archivo `/etct/php/php.ini` con el objetivo de descomentar lo siguiente:

  ```php
  extension=pdo_pgsql                                                                   extension=pdo_sqlite                                                            
  extension=pgsql
  ```

  Nota: Los comentarios en el archivo `php.ini` se crean con `;`

- Instalación de composer

  ```shell
  php composer install
  ```

- Instalación de Node y npm

  ```shell
  sudo pacman -S npm
  ```

- Por último, de manera opcional pero altamente recomendable, instalar el instalador de laravel, para ello basta con seguir las instrucciones de la documentación.

  ```shell
  composer global require laravel/installer
  ```

  Para el caso de GNU/Linux y macOS se debe modificar la variable de entorno `$PATH`, al modificarla logramos que el comando `laravel` se pueda ejecutar en cualquier ruta en la consola.

  La variable `$PATH` puede ser modificada en el archivo `~/.bashrc` por lo cual  solo basta abrir el archivo con el editor de preferencia, en este caso se escogió `nano`

  ```shell
  nano ~/.bashrc
  ```

  Hasta el final del todo el contenido del archivo `bashrc` agregaremos lo siguiente.

  ```shell
  export PATH="~/.config/composer/vendor/bin:$PATH"
  ```

  **Consideraciones:** La configuración de la variable de entorno `$PATH` se hace asumiendo que su shell por defecto es `bash` en caso de tener otra shell en resumidas cuentas lo que se debe hacer es:

  - Encontrar el archivo de configuración del su shell
  - Halla la manera de exportar correctamente la variable de entorno `$PATH`

  Por último, ejercutar el siguiente comando

  ```shell
  source ~/.bashrc
  ```

  El cual cargará los nuevos cambios a la shell.

Para verificar que todo este funcionando basta con tirar el comando `laravel` en la consola.