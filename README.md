# Ya teniendo instalado el software necesario ejecuta

git clone https://github.com/OseChez/blog-osechez.git
## muevete a la carpeta donde se descargo el proyecto mediante consola con comando cd //nombre_carpeta ..
## en entornos gnu/linux ubuntu ejecuta

mkdir vendor # dale los permisos necesarios

### ejecuta mediante composer desde carpeta principal de proyecto

composer install

### cuando ya se hayan instalado las dependencias  ve a la carpeta 

### app/providers/ViewComposerServiceProvider.php y comenta temporalmente el bloque de

### código que esta dentro de la función boot luego ejecuta

php artisan migrate --seed
#listo descomenta el bloque anterior dentro de función boot
#y empieza a hackear el sistema
#ejecuta

php artisan ser
