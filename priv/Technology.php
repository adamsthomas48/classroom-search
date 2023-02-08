<?php

class Technology
{
    private $intId;
    private $strName;

    public function __construct($intId, $strName)
    {
        $this->intId = $intId;
        $this->strName = $strName;
    }

    /**
     * getId
     * Returns the id of the technology
     *
     * @return int
     */
    public function getId(){
        return $this->intId;
    }

    /**
     * getName
     * Returns the name of the technology
     *
     * @return string
     */
    public function getName(){
        return $this->strName;
    }
}