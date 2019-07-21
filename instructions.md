 Antes de ejecutar los comandos php artisan migrate y php artisan db:seed, 
 comentar en el archivo App/Providers/AppServiceProvider.php las siguientes lineas:
 
        $categories = Category::all();
        View::share('categories', $categories);
        
Esto evita que aparezca un error cuando el sistema busca la tabla Categories y no la encuentra.
Luego deshacer el cambio. 
