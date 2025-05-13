<?php

require_once __DIR__ . '/../database/QueryBuilder.class.php';


class ImagenGaleriaRepository extends QueryBuilder
{
    public function __construct(string $table = 'imagenes', string $classEntity = 'ImagenGaleria')
    {
        parent::__construct($table, $classEntity);
    }

    public function getCategoria(ImagenGaleria $imagenGaleria) : Categoria{
        $categoriaRepository = new CategoriaRepository();
        return $categoriaRepository->find($imagenGaleria->getCategoria());
    }

    /*
    El método find buscará una entidad en nuestra base de datos a partir del identificador que recibe como parametro. Para obtener el identificador de la categoria que queremos buscar llamamos al método getCategoria() de la imagenGaleria que hemos recibido como parámetro. Este método find lo implemtaremos en la clase QueryBuilder.
    */

    public function guarda(ImagenGaleria $imagenGaleria){
    $fnGuardaImagen = function() use ($imagenGaleria){
        // 1. Obtener la categoría asociada a la imagen
        $categoriaRepository = new CategoriaRepository();
        $categoria = $categoriaRepository->find($imagenGaleria->getCategoria());

        // 2. Incrementar el número de imágenes de la categoría
        $categoriaRepository->nuevaImagen($categoria);

        // 3. Guardar la imagen en la base de datos
        $this->save($imagenGaleria);
    };
    $this->executeTransaction($fnGuardaImagen);
}
}