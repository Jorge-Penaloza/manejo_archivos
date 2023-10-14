<?php
class fileBinary
{
    private $archivo; 
    public $codigo;  //Tamaño  10
    public $nombre;  //Tamaño  90
    public $titulo;  //Tamaño  60
    public $curso;  //Tamaño  40

    private $tamCodigo;  //Tamaño  10
    private $tamNombre;  //Tamaño  90
    private $tamTitulo;  //Tamaño  60
    private $tamCurso;  //Tamaño  40
    

    public function setTam($t1,$t2,$t3,$t4)
    {
        $this->tamCodigo = $t1;
        $this->tamNombre = $t2;
        $this->tamTitulo = $t3;
        $this->tamCurso = $t4;
    }

    public function setFile($archivo)
    {
        $this->archivo = $archivo;
    }

    public function getFile()
    {
        return $this->archivo;
    }

    private function ajustarTamaño($variable, $tamanio)
    {
        $res = "";
        $tam = strlen($variable);
        if($tam < $tamanio)
        {
            $res = $variable.str_repeat(" ", $tamanio - $tam ); 
        }
        else
        {
            $res = substr($variable,0,$tamanio );
        }
        return $res;
    }

    public function insertar()
    {
        $codigo = $this->ajustarTamaño($this->codigo,$this->tamCodigo);
        $nombre = $this->ajustarTamaño($this->nombre,$this->tamNombre);
        $titulo = $this->ajustarTamaño($this->titulo,$this->tamTitulo);
        $curso = $this->ajustarTamaño($this->curso,$this->tamCurso);
        $texto = $codigo.$nombre.$titulo.$curso;
        echo $texto."<br>"; 
        echo strlen($texto)."<br>"; 
        $fp = fopen($this->archivo, "a");
        fwrite($fp, $texto);
        fclose($fp);
    }

    public function buscar($codigo)
    {
        
        $fp = fopen($this->archivo, "r");
        // Loop que parará al final del archivo, cuando feof sea true:
        while(!feof($fp))
        {
            $codAux = fread($fp, $this->tamCodigo);
            $nomAux = fread($fp, $this->tamNombre);
            $titAux = fread($fp, $this->tamTitulo);
            $curAux = fread($fp, $this->tamCurso);
            if($codAux == $codigo)
            {
                $this->codigo = $codAux;
                $this->nombre = $nomAux;
                $this->titulo = $titAux;
                $this->curso  = $curAux;
                fclose($fp);        
                return true;
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
            $codAux = fread($fp, $this->tamCodigo);
            $nomAux = fread($fp, $this->tamNombre);
            $titAux = fread($fp, $this->tamTitulo);
            $curAux = fread($fp, $this->tamCurso);
            if($codAux != $codigo)
            {
                $texto = $codAux.$nomAux.$titAux.$curAux;
                fwrite($fpRespaldo, $texto);    
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
            $codAux = fread($fp, $this->tamCodigo);
            $nomAux = fread($fp, $this->tamNombre);
            $titAux = fread($fp, $this->tamTitulo);
            $curAux = fread($fp, $this->tamCurso);
            if($codAux != $this->codigo)
            {
                $texto = $codAux.$nomAux.$titAux.$curAux;
                fwrite($fpRespaldo, $texto);    
            }
            else 
            { 
                $codigo = $this->ajustarTamaño($this->codigo,$this->tamCodigo);
                $nombre = $this->ajustarTamaño($this->nombre,$this->tamNombre);
                $titulo = $this->ajustarTamaño($this->titulo,$this->tamTitulo);
                $curso = $this->ajustarTamaño($this->curso,$this->tamCurso);
                $texto = $codigo.$nombre.$titulo.$curso;
                fwrite($fpRespaldo, $texto);    
            }
        }
        fclose($fpRespaldo);    
        fclose($fp);
        unlink($this->archivo);
        rename("002".$this->archivo,$this->archivo);
    }
    public function buscarTodo()
    {
        $lista = array  (
                        array("","","","")
                        );
        $fp = fopen($this->archivo, "r");
        // Loop que parará al final del archivo, cuando feof sea true:
        while(!feof($fp))
        {
            $codAux = fread($fp, $this->tamCodigo);
            $nomAux = fread($fp, $this->tamNombre);
            $titAux = fread($fp, $this->tamTitulo);
            $curAux = fread($fp, $this->tamCurso);
            array_push($lista, array($codAux,$nomAux,$titAux,$curAux));
        }
        fclose($fp);
        return $lista;
    }
}
?>
