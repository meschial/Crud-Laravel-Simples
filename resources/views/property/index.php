<h1>Listagem de produtos</h1>
<p><a href="<?=url('/imoveis/novo');?>">Novo Imovel</a> </p>

<?php
if(!empty($property)){

    echo "<table>";
    echo "<tr>
            <td>Título</td>
            <td>Valor de locação</td>
            <td>Valor de Compra</td>
            <td>Ações</td>
          </tr>";
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
