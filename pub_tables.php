<?php
//error_reporting(E_ALL ^ E_NOTICE);
require_once('excel_reader2.php');

//si tiene link a un excel, incluye el excel, sino busca los datos de la tabla.
$sqlTable = "SELECT tables_price.* FROM tables_price, tables_prods WHERE tables_prods.table_id=tables_price.table_id AND tables_prods.prod_id=$prod_id";
if($queryTable = @mysql_query($sqlTable,$db_conn)){
    if(mysql_num_rows($queryTable)>0){
        while($tableRes = mysql_fetch_array($queryTable)){
            $table_id = $tableRes['table_id'];
            $table_name = $tableRes['table_name'];
            $table_desc = $tableRes['table_description'];
            $table_file = $tableRes['table_file'];
        }
        $show_table .= '<h4>'.$table_name.'</h4>';
        
        if(strlen($table_file)>0 && file_exists('admin/'.$table_file)){
            $data = new Spreadsheet_Excel_Reader('admin/'.$table_file);
            $show_table .= '<div id="tablaDiv">'.$data->dump(true,true).'</div>';
        }elseif(!file_exists($table_file)){
            $show_table .= '';
        }elseif(strlen($table_file)==0){
            //buscar aqui la estructura y los datos de la tabla
            //ESTR
            
            $sqlTStru = "SELECT char_field, char_position, char_order FROM table_structure WHERE table_id=$table_id ORDER BY char_position, char_order";
            if($queryTStru = @mysql_query($sqlTStru,$db_conn)){
                if(mysql_num_rows($queryTStru)>0){
                    $last_char_pos = '';
                    $show_table .= '<table><thead><tr><th></th>';
                    //agrego siempre un th por las dudas de que haya columna vertical
                    while($tableStru = mysql_fetch_array($queryTStru)){
                        $char_field = $tableStru['char_field'];
                        $char_position = $tableStru['char_position'];
                        $char_order = $tableStru['char_order'];
                        if($char_position == $last_char_pos || $last_char_pos == ''){
                            //se sigue en el mismo tr
                            $show_table.= '<th>'.$char_field.'</th>';   
                        }elseif($char_position == 'y'){
                           //si tiene en el eje vertical
                           $hay_vert = true;
                           if($last_char_pos == 'x'){
                            $row_number = 1;
                            $show_table .= '</tr></thead>';
                           }else{
                            $row_number++;
                            $show_table .= '</tr>';
                           }
                           $show_table .= '<tr><th>'.$char_field.'</th>';
                           $sqlTData = "SELECT value FROM table_data WHERE table_id=$table_id AND y_pos=$row_number ORDER BY x_pos";
                           if($queryTData = @mysql_query($sqlTData,$db_conn)){
                             if(mysql_num_rows($queryTData)>0){
                                 while($resTData = mysql_fetch_array($queryTData)){
                                     $show_table .= '<td>'.$resTData['value'].'</td>';
                                    }
                                }
                            }
                        }
                        //aqui van todos los valores de esa fila  
                        $last_char_pos = $char_position;   
                    }
                    
                    if(!$hay_vert){
                        $show_table .= '</tr></thead><tbody><tr>';
                        $sqlTData = "SELECT value, y_pos, x_pos FROM table_data WHERE table_id=$table_id ORDER BY y_pos, x_pos";
                        if($queryTData = @mysql_query($sqlTData,$db_conn)){
                         if(mysql_num_rows($queryTData)>0){
                            $last_row = 1;
                            $show_table .= '<td></td>';
                             while($resTData = mysql_fetch_array($queryTData)){
                                if($resTData['y_pos'] == $last_row){
                                    $show_table .= '<td>'.$resTData['value'].'</td>';
                                }else{
                                    $show_table .= '</tr><tr><td></td><td>'.$resTData['value'].'</td>';  
                                }
                                 $last_row = $resTData['y_pos'];
                                }
                            }
                        }   
                    }
                    
                    $show_table.= '</tr></thead>';
                }
            }
            
            //DATOS
            
            
            $show_table .= '
            <tbody></tbody>
            ';          
            $show_table .= '</table>';
        }
        
        $show_table .= '<br /><span>'.$table_desc.'</span><br /><br />';
          
    }
}

?>