<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ListRow
 *
 * @author lbernard
 */
class ListRow implements IBaseRow {
    private $content;
    public function __construct($content=null){
        $this->content = $content;
    }

    public function setContent($content){
        $this->content = $content;
    }
    
    public function render() {
        $dom = new DomDocument('1.0', 'UTF-8');
        $itemnode = $dom->createElement('li');
        if(!empty($this->content)) {
            $contentFrag = $dom->createDocumentFragment();
            $contentFrag->appendXML($this->content);
            $itemnode->appendChild($contentFrag);
        }
        return $itemnode;
    }

    public static function createRow($value,$key){
        $key = !preg_match('/[0-9]/', $key) ? $key . '/' : '';
        return new ListRow($key.$value);
    }
}
?>
