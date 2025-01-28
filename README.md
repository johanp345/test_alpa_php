
# Buscador de clases y exámenes en consola con PHP

Test realizado para Alpha Team con fines de evaluación de conocimientos

El mismo consiste en una aplicación en PHP por consola que permite la busqueda de un parámetro introduciodo por el usuario que sera buscado en la base de datos para devolver las coincidencias.




## Documentation

Proyecto realizado con PHP@8.3.12, mysql y POO, estructurado bajo patrón MVC

Debemos tener el archivo 
```bash
  .env
```
En el directorio raiz con los datos de la conexión a la base de datos y crear una 
base de datos con el nombre que usemos en el archivo.

`HOST_DB`

`USER_DB`

`PASSWORD_DB`

`NAME_DB`

Para la carga inicial de los datos podemos realizarlo de dos maneras:
#### 1.- Por Base de datos
Cargando el archivo .sql adjuntado en el repositorio

#### 2.- mediante un comando de consola
Tener en cuenta que ya debe estar configurada la conexión a la base de datos





#### Crear y poblar tablas

```bash
php .\main.php populate
```




## Comandos que puede usar para uso de la app

```bash
php .\main.php search {valor}
```
Buscará todos los registros que coincidan tanto en clases como exámenes


```bash
php .\main.php search-first {valor}
```
Buscará el primer registros que coincidan tanto en clases como exámenes
