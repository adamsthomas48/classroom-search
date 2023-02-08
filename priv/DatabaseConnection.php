<?php

class DatabaseConnection
{
    private $strServerName = 'mysql02.usu.edu';
    private $strDatabaseName = 'inventory';
    private $strUserName = 'classinvuser';
    private $strPassword = 'xbaAzfnnqZlYX7kUhgUQtzrsd6tSIy7IGCF';
    private $objConnection;

    public function __construct(){}

    /**
     * setConnection
     * Establishes a connection with the database and saves it to the $conn variable.
     * @return void
     */
    public function setConnection()
    {
        try {
            $this->objConnection = new PDO("mysql:host=$this->strServerName;dbname=$this->strDatabaseName;", $this->strUserName, $this->strPassword);
            $this->objConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    /**
     * interact
     * Interacts with the database and returns the results.
     *
     * @param string $strSql
     * @return void
     */
    public function interact($strSql)
    {
        try {
            $this->setConnection();
            $objStmt = $this->objConnection->prepare($strSql);
            $objStmt->execute();
            $this->objConnection = null;
            if($objStmt->columnCount() > 0){
                return $objStmt->fetchAll();
            }


        } catch (PDOException $e) {

            die("Error: " . $e->getMessage());
        }
    }

    /**
     * insertData
     * Takes a table name, an array of the columns that will be affected, and an array of values that will be inserted for
     * those columns and inserts into the database. This only handles one row at a time and will rollback if there is an issue.
     *
     * @param $tableName
     * @param $arrCols
     * @param $arrValues
     * @return void
     */
    public function insertData($tableName, $arrCols, $arrValues)
    {
        $this->setConnection();
        $strCols = implode(', ', $arrCols);
        $stmt = $this->objConnection->prepare(sprintf("INSERT INTO %s (%s) VALUES (%s)", $tableName, $strCols, $this->setValueString($arrCols)));


        try {
            $this->objConnection->beginTransaction();
            $stmt->execute($arrValues);
            $this->objConnection->commit();
        } catch (Exception $e){
            $this->objConnection->rollback();
            $this->handleError($e);

        }
        $this->objConnection = null;
    }

    private function setValueString($arrCols){
        $strValuesTemplate = str_repeat('?,', sizeof($arrCols) - 1);
        $strValuesTemplate .= '?';

        return $strValuesTemplate;
    }


}