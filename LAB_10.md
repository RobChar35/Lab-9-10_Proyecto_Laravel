## Laboratorio 10:
Bienvenido a la rama "main". Aquí se verá el desarrollo de la implementación de la autenticación básica,
los modelos, la ruta para esos modelos y las migraciones del proyecto llamado **"Gestor de emails y contraseñas"**.

La ruta que se puede tomar para ver los modelos creados es el siguiente:
```shell
laravel/app/Models
```

La ruta que contiene el archivo que guarda las rutas de los modelos creados para mostrarlos en la página del proyecto es el siguiente:
```shell
laravel/routes/web.php
```

La ruta que puede tomar para ver las migraciones creadas es el siguiente:
```shell
laravel/database/migrations
```

Esta ruta aplicaría para todos los sistemas operativos donde se clone el proyecto.

## Autenticación con Laravel:
Para la implementación de la autenticación del proyecto con Laravel se tuvieron que implementar los siguientes comandos:
```shell
sudo composer require laravel/ui

php artisan ui bootstrap --auth

npm install 

npm run dev
```

Aplicando cada comando (por separado) en la carpeta del proyecto de Laravel me permitió poder crear una interfaz que permita 
al usuario poder registrarse y loguearse a la página sin ningún problema.

## Creación de los modelos:
Para poder crear los modelos en base a la base de datos y migración creada, tuve que aplicar el siguiente comando:
```shell
php artisan make:model <model-name>
```
Una vez haya creado el modelo correspondiente a mi base de datos, tuve que implementar una línea de código que indique a qué
base de datos se va a dirigir. Para ello, tuve que aplicar lo siguiente:
```text
class <class-name> extends Model
{
    use HasFactory;
    protected $table = 'table_name';
}
```
Esto me permitió poder establecer una conexión con la tabla creada en la migración que se hizo en el laboratorio 9.

Los modelos creados para el proyecto son los siguientes:
* _Category.php_
* _Email_Password_Db.php_
* _Saved_Sites.php_
* _User.php_

## Rutas para los modelos creados:
El archivo por excelencia para la implementación de las rutas que se van a mostrar en la página del proyecto es el
siguiente: **web.php**. Dicho archivo se encuentra en la ruta que se especificó al inicio de este documento.

Dentro de este documento se puede apreciar la siguiente pieza de código:
```text
Route::get('/', function () {
    return view('welcome');
});
```
_Aquí se especifica el link que se va a mostrar y lo que va a retornar._

Para que una ruta pueda retornar los valores agregados en las tablas creadas, se tuvo que aplicar lo siguiente:
```text
Route::get('/route_name', function () {
    return model_file_name::All();
});
```
_Aquí se especifica tanto el link que se va a mostrar como el archivo que se creó en los modelos que va a retornar en esa ruta._

### Vista de la ruta creada:
La única ruta en la que se puede ver los datos agregados de una tabla es el siguiente:
```text
127.0.0.1:8000/saved
```
En esta ruta se puede ver los datos que se agregaron en la tabla "saved_sites" que se creó en la migración. De momento, esta seria la única tabla 
que tiene datos muy aparte de la tabla "users".

## Iniciar proyecto de Laravel:
Si quiere visualizar todo lo que se ha creado en su navegador de preferencia, no olvide utilizar el siguiente comando para crear un entorno local:
```shell
php artisan serve
```
Este comando sirve para iniciar un servidor local de pruebas.

## Base de datos:
Si quiere analizar el documento **.sql** en el que contiene las base de datos creadas, puede ir al siguiente
[link](https://drive.google.com/file/d/1Jk6V6ahpeb-eN_Q2_-osncqXmBaCAPI5/view?usp=sharing).

Muchas gracias por su lectura.
