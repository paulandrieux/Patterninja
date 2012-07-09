<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DListRow
 *
 * @author lbernard
 */
class DListRow implements IBaseRow {
    private $value;
    private $key;
    public function __construct($value="",$key=""){
        $this->value = $value;
        $this->key = $key;
    }

    public function setValue($value){
        $this->value = $value;
    }
    public function setKey($key){
        $this->key = $key;
    }


    public function render() {
        $dom = new DomDocument('1.0', 'UTF-8');
        $keynode = $dom->createElement('dt');
        $valuenode = $dom->createElement('dd');
        if(!empty($this->value)) {
            $keyFrag = $dom->createDocumentFragment();
            $keyFrag->appendXML($this->key);
            $keynode->appendChild($keyFrag);
            $valueFrag = $dom->createDocumentFragment();
            $valueFrag->appendXML($this->value);
            $valuenode->appendChild($valueFrag);
        }
        return array($keynode,$valuenode);
    }


    public static function createRow($value,$key){
        return new DListRow($value,$key);
    }
}
?>
