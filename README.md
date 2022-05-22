## Laboratorio 9:
Bienvenido a la rama "migrations". Aquí se verá el desarrollo de los archivos de migración, 
así como el proceso del desarrollo del diagrama de entidad relación del proyecto llamado
**"Gestor de emails y contraseñas"**.

La ruta que puede tomar para ver los archivos de migración es el siguiente:
```shell
laravel/database/migrations
```
Esta ruta aplicaría para todos los sistemas operativos donde se clone el proyecto. 

## Modelo de entidad relación:
La creacion del modelo entidad relación se pensó en el desarrollo de un proyecto de un 
**gestor de emails y contraseñas**. Teniendo en cuenta ese primer concepto, los pasos que se siguen
serían los siguientes:
- El usuario puede crear más de una base de datos para su email y contraseña. 
- Dentro de esa base de datos, podrá agregar la información necesaria para el registro y el tipo de encriptación que tendrá la contraseña de la base de datos y la de las páginas que agregue. 
- Cuando tenga su base de datos, el usuario podrá agregar diferentes categorías para una mejor organización. 
- Adicionalmente, si el usuario desea, puede crear una subcategoría. Tanto la categoría como la subcategoría podrán guardar los datos necesarios de su email y contraseña.

Con estos pasos definidos, obtenemos el siguiente diagrama de entindad relación:
<br>
<a href="https://ibb.co/dMs4CfH"><img src="https://i.ibb.co/vqC4ycM/Selection-003.png" alt="Selection-003" border="0"></a>
</br>

## Archivos de la carpeta migrations:
Los archivos que se pueden encontrar en base al diagrama de entidad relación creado son los siguientes:
- _2022_05_21_204339_create_email_password_database_table.php_
- _2022_05_21_214507_create_category_table.php_
- _2014_10_12_000000_create_users_table.php_
- _2022_05_21_214631_create_saved_sites_table.php_

Dentro de algunos archivos se puede apreciar que existen otras tablas que se crearon para la aplicación de las _foreign keys_.
Tenemos los siguientes ejemplos:

**2022_05_21_204339_create_email_password_database_table.php**:

```text
public function up()
    {
        Schema::create('email_password_database', function (Blueprint $table) {
            $table->id('id_database');
            $table->timestamps();
            $table->string('database_name');
        });

        Schema::create('database_information', function (Blueprint $table) {
           $table->id('id_db_information');
           $table->timestamps();
           $table->unsignedBigInteger('database_reference');
           $table->foreign('database_reference')->references('id_database')->on('email_password_database')->onDelete('cascade');
           $table->string('database_password',255);
           $table->text('database_description');
           $table->enum('encryption_type',['RSA','AES']);

        });
    }
```

**022_05_21_214507_create_category_table.php**:
```text
public function up()
    {
        Schema::create('category', function (Blueprint $table) {
            $table->id('id_category');
            $table->timestamps();
            $table->string('category_name',100);
        });

        Schema::create('sub_category', function (Blueprint $table){
            $table->id('id_subcategory');
            $table->timestamps();
            $table->string('subcategory_name',100);
            $table->unsignedBigInteger('category_reference');
            $table->foreign('category_reference')->references('id_category')->on('category')->onDelete('cascade');
        });
    }
```

Si quiere analizar el documento **.sql** en el que contiene las base de datos creadas, puede ir al siguiente 
[link](https://drive.google.com/file/d/1Jk6V6ahpeb-eN_Q2_-osncqXmBaCAPI5/view?usp=sharing).

Muchas gracias por su lectura.
