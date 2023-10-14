<?php
class fileCSV
{
    private $archivo; 
    public $codigo;  
    public $nombre;  
    public $titulo;  
    public $curso;  

    public function setFile($archivo)
    {
        $this->archivo = $archivo;
    }

    public function getFile()
    {
        return $this->archivo;
    }

    public function insertar()
    {
        $array = array( $this->codigo,
                        $this->nombre,
                        $this->titulo,
                        $this->curso );
        $archivo = fopen( $this->archivo, "a" );
        fputcsv( $archivo, $array, ";" );
        fclose( $archivo );
    }

    public function buscar($codigo)
    {
        
        $fp = fopen($this->archivo, "r");
        // Loop que parará al final del archivo, cuando feof sea true:
        while(!feof($fp))
        {
            $datos = fgetcsv($fp, 1000, ";");
            if($datos != null)
            {
                if($datos[0] == $codigo)
                {
                    $this->codigo = $datos[0];
                    $this->nombre = $datos[1];
                    $this->titulo = $datos[2];
                    $this->curso  = $datos[3];
                    fclose($fp);        
                    return true;
                }    
            }
        }
        fclose($fp);
        return false;
    }

    public function elimina($codigo)
    {
        $fp = fopen($this->archivo, "r");
        $fpRespaldo = fopen("001".$this->archivo, "a");
        
        while(!feof($fp))
        {
            $datos = fgetcsv($fp, 1000, ";");
            if($datos != null)
            {
                if($codigo != $datos[0])
                {
                    fputcsv( $fpRespaldo, $datos, ";" );
                }
            }
        }
        fclose($fpRespaldo);    
        fclose($fp);
        unlink($this->archivo);
        rename("001".$this->archivo,$this->archivo);
    }

    public function actualiza()
    {
        
        $fp = fopen($this->archivo, "r");
        $fpRespaldo = fopen("002".$this->archivo, "a");
        
        while(!feof($fp))
        {
            $datos = fgetcsv($fp, 1000, ";");
            if($datos != null)
            {
                if($this->codigo != $datos[0])
                {
                    fputcsv( $fpRespaldo, $datos, ";" );
                }
                else 
                { 
                    $datos[1] = $this->nombre;
                    $datos[2] = $this->titulo;
                    $datos[3]  =  $this->curso ;
                    
                    fputcsv( $fpRespaldo, $datos, ";" );
                }
            }

        }
        fclose($fpRespaldo);    
        fclose($fp);
        unlink($this->archivo);
        rename("002".$this->archivo,$this->archivo);
    }
    public function buscarTodo()
    {
        $lista = array  ();
        $fp = fopen($this->archivo, "r");
        
        while(!feof($fp))
        {
            $datos = fgetcsv($fp, 1000, ";");
            if($datos != null)
                array_push($lista, $datos);
        }
        fclose($fp);
        return $lista;
    }
}
?>
