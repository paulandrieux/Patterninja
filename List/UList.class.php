<?php

/**
 * Description of UList
 *
 * @author lbernard
 */
class Ulist extends BaseList {
    protected $htmlTag = 'ul';

    public function addError($error) {
        $row = new ListRow();
        $row->setContent($error);
        $this->addRow($row);
    }


    public function renderChilds($dom,$listNode){
        foreach ($this->getRows() as $row) {
            $itemNode = $dom->importNode($row->render(), true);
            $listNode->appendChild($itemNode);
        }
        return $listNode;
    }

    
}
?>
