<p align="center"><a href="https://increnta.com/tecnologia/" target="_blank"><img src="https://sso.magickhub.com/assets/images/logo_dark.png" width="400"></a></p>



<p align="center"> <p align="center"> Prueba Técnica Magick
    <br> 
</p>



## About:
Realización de una prueba técnica para el desarrollo de una API Rest en Laravel siguiendo las buenas prácticas en la implementación del código.
La API se basará en el modelo de datos.

## ⛏️ Built With <a name = "built"></a>


- [Laravel](https://laravel.com/) - ORM
- [PHP](https://www.php.net/) - Hypertext Preprocessor
- [Postman](https://learning.postman.com/docs/getting-started/introduction/) - Server Environment
- [Docker](https://docs.docker.com/) - Server Deployment
- [MySql](https://www.mysql.com/) - Database
- [Workbench](https://www.mysql.com/products/workbench/) - Database

###  🎈  Start Project <a name="start-project"></a>

Para hacer funcionar la prueba técnica, primero de todo, en el terminal del VSC hay que poner los siguientes comandos:

- sh docker-run.sh
- php artisan serve

Luego tendremos que crear una base de datos con el nombre de magick y un password 1234.

Cuando ya tengamos la BBDD corriendo, ya podemos empezar a crear users y posts.

Con esta API Rest se puede crear, loguear, logout, modificar, borrar y mostrar todos los users. Además de crear, modificar, borrar y mostrar todos los posts.
Siempre que el user tenga algun post vinculado no se podrá borrar el user.

## DB diagram 🗃️

En esta imagen se muestra la relación entre tablas:

![DB](https://i.imgur.com/Dt4Lwf1.png)

## CRUD with Postman ![postman](https://i.imgur.com/cXur21z.png)

[![Run in Postman](https://run.pstmn.io/button.svg)](https://app.getpostman.com/run-collection/f41154fc76331a0eab73?action=collection%2Fimport)

## Author 🧐

- [@Carlos-Val](https://github.com/Carlos-Val) -  Initial development work


## 📝 License

The Laravel framework es un software de código abierto con licencia [MIT license](https://opensource.org/licenses/MIT).
    <br> 
</p>