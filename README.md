# Aconpy Test Manual de instalacion

# Ubicarse en la carpeta donde estará el proyecto y clonar el repositorio
    $ git clone https://github.com/lvlal2iano/aconpy_test.git ./

# Crea una base de datos en MySQL llamada aconpy_test (el nombre queda a su criterio)

# Debes Instalar Composer, segun la plataforma en la que trabajes esto se realiza de diferentes maneras, asegurate de tenerlo como un PATH de entorno global, Mas estecificaciones en https://getcomposer.org/

# Una vez que tengamos composer instalado vamos a la carpeta donde clonamos el repositorio y realizamos:
    $ composer install

# Seguidamente corremos la siguiente linea
    cp .env.example .env (En una consola bash)

# Luego editamos el archivo .env
    Colocamos los datos de conexion en las variables
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE= $nombre_de_la_base_de_datos
    DB_USERNAME=xxxx
    DB_PASSWORD=xxxx

# Ahora realizamos las migraciones
    php artisan migrate

# Despues corremos 
    php artisan key:generate

# Una vez que llegamos a este punto soo nos queda levantar el servidor interno para pruebas que laravel tiene embebido:
    php artisan serv (Por defecto toma el puerto 8000, si te genera error puedes cambiar el puerto con la bandera --port=xxxx)

# Ya tienes disponible el sistema en http://localhost:8000, solo debes registrarte y empesar a gestionar tus comercios con sus respectivos cbus.
