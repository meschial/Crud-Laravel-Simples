@extends('property.master')

@section('content')
    <div class="container my-3">
        <h1>Listagem de produtos</h1>

        <?php
        if(!empty($property)){

            echo "<table class='table table-striped table-hover'>";
            echo "<thead class='bg-primary text-white'>
                    <td>Título</td>
                    <td>Valor de locação</td>
                    <td>Valor de Compra</td>
                    <td>Ações</td>
                  </thead>";
            foreach ($property as $propert){

                $linkReadMode = url('imoveis/'. $propert->name);
                $linkEditItem = url('imoveis/editar/'. $propert->name);
                $linkRemoveItem = url('imoveis/remover/'. $propert->name);

                echo "<tr>
                    <td>{$propert->title}</td>
                    <td>R$ " . number_format($propert->rental_price, 2, ',', '.')."</td>
                    <td>R$ " . number_format($propert->sale_price, 2, ',', '.')."</td>
                    <td><a href='{$linkReadMode}'>Ver mais</a> | <a href='{$linkEditItem}'>Editar</a> | <a href='{$linkRemoveItem}'>Excluir</a> |</td>
                  </tr>";
            }

            echo "</table>";
        }
        ?>
    </div>
@endsection
