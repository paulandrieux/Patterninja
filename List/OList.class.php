<?php
/**
 * Description of OList
 *
 * @author lbernard
 */
class Olist extends BaseList {
    protected $htmlTag = 'ol';

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
