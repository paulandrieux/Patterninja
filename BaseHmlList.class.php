<?php

/**
 * Description of BaseHmlList
 *
 * @author lbernard
 */
abstract class BaseHtmlList implements IHtmlList {
    protected $headers;
    protected $title;
    protected $rows;
    protected $attributes;

    public function __construct($title = "") {
        $this->title = $title;
        $this->rows = array();
        $this->headers = $this->initHeaders();
        $this->attributes = array();
        $this->showHeaders = true;
    }

    public function addRow(IBaseRow $row) {
        $this->rows[] = $row;
    }

    public function getRows() {
        return $this->rows;
    }
    public function initHeaders() {
        return null;
    }

    public function setHeaderRow(IBaseRow $row) {
        $this->headers = $row;
    }

    public function getHeaderRow() {
        return $this->headers;
    }

    public function getTitle() {
        return $this->title;
    }

    public function addErrors(array $errors) {
        foreach ($errors as $key => $error) {
            $this->addError($error);
        }
    }

    public function getClasses() {
        return $this->attributes["classes"];
    }

    public function addClass($class) {

        if(!is_array($this->attributes["classes"])){
            $this->attributes["classes"] = array();
        }
        if(!in_array($class,$this->attributes["classes"])){
            $this->attributes["classes"][] = $class;
        }
    }

    public function hasClass($class) {
        $response = false;
        if(is_array($this->attributes["classes"]) && in_array($class,$this->attributes["classes"]))
            $response = true;
        return $response;
    }

    public function removeClass($class) {
        if(is_array($this->attributes["classes"])){
            if(in_array($class,$this->attributes["classes"])){
                $classFlipped = array_flip($this->attributes["classes"]);
                unset($classFlipped[$class]);
                $this->attributes["classes"] = array_flip($classFlipped);
            }
        }
    }

    public function setId($id) {
        $this->attributes["id"] = $id;
    }
    public function getId($id) {
        return $this->attributes["id"];
    }

}
?>
