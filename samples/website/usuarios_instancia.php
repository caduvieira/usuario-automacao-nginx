#!/usr/bin/php
<?php

error_reporting (0);

echo "Órgão;Quantidade total de Usuários\n";

if ( $handle = opendir('/dados/') ) {
  while ( $instancia = readdir( $handle ) ) {
    
      if ($instancia != '.' && $instancia != '..'){
    
            $json_file = file_get_contents("/dados/".$instancia."/dados/USUARIO.json");
            $obj = json_decode($json_file);     
            $qtd_usr_inst = 0;

        foreach ( $obj as $users ){
                 
          $inativo = $users->IDE_USUARIO_INATIVO;
          
          
          if ($inativo == 'N'){

            $qtd_usr_inst++;
            //echo $users->NOM_USUARIO."\n";
            //echo $users->NOM_USUARIO." ".$users->IDE_USUARIO_INATIVO."\n";

          }
          
        }
      
        $qtd_usr_inst = $qtd_usr_inst - 6;
        $qtd_usr_total = $qtd_usr_total + $qtd_usr_inst;
        echo $instancia.";".$qtd_usr_inst."\n";
      }

  }
  closedir($handle);
}    

echo "\nQuantidade total de Usuários: ".$qtd_usr_total."\n\n";

?>

