<?php 

namespace FRtechnology;

class Upload{

    /**
     * @var name
     * Nome do Arquivo
     */
    private $nameFile;

    /**
     * Nome Temporario
     */
    private $tmpName;

    /**
     * Error
     */
    private $errorFile;

    /**
     * Extencao do Arquivo
     */
    private $typeFile;

    /** @var Double**/
    private $sizeFile;

    /** @var String */
    private $dir;

    /** @var Array */
    private $extension = [];

    /** @var Int */
    private $maxSize;

    /** @var Double */
    private $realSize;

    public function __construct($file,$dir,$maxSize)
    {
        $this->nameFile  = $file['name'];
        $this->tmpName   = $file['tmp_name'];
        $this->errorFile = $file['error'];
        $this->sizeFile  = $file['size'];
        $this->dir       = $dir;
        $this->maxSize  = 1024 * 1024 * $maxSize;
        $this->setType();
    }

    private function setType()
    {
        $extencion = pathinfo($this->nameFile,PATHINFO_EXTENSION);
        $this->typeFile = $extencion;
    }

    public function setExtension($ext=array())
    {
        $this->extension = $ext;
    }

    // Rescreve o Nome Caso Exista Um Arquivo Com o Mesmo Nome
    private function rewriteName($rewriteName)
    {
       if($rewriteName){
          if(file_exists($this->dir.$this->nameFile)){
            $newName = date('Y-m-d H-m-s').'-'.$this->nameFile;
          
            $this->nameFile = $newName;
          }
       }
    }

    /** @param Boolean // Ativa a Rescrita Nome Ficheiro
     *  @param String // Nome Do Arquivo
     */

    public function upload($rewriteName=false,$name=null)
    {
        if(!in_array($this->typeFile,$this->extension)) return false;
        
        if($this->maxSize < $this->sizeFile) return false;


        if($this->errorFile !=0) return $file;

        $this->rewriteName($rewriteName);

        if(move_uploaded_file($this->tmpName,$this->dir.$this->nameFile)){
            $this->realSizeFile();

            return true;
        }

        return false;
    }



    private function realSizeFile()
    { 
        $realSize = filesize($this->dir.$this->nameFile)/1049576;
        $this->realSize = number_format($realSize,2,',','.');
    }

    public function getRealSize()
    {
        return $this->realSize;
    }
    
}