<?php
class CategoriaRepository extends QueryBuilder
{
    public function __construct(string $table = 'categorias', string $classEntity = 'Categoria')
    {
        parent::__construct($table, $classEntity);
    }

    public function nuevaImagen(Categoria $categoria){
        $categoria->setNumImagenes($categoria->getnumImagenes() + 1);
        $this->update($categoria); // update estará en QueryBuilder
    }
}
