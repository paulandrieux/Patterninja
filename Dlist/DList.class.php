<?php
/**
 * Description of DList
 *
 * @author lbernard
 */
class Dlist extends BaseList {
    protected $htmlTag = 'dl';

    public function renderChilds($dom,$dlNode){
        foreach ($this->getRows() as $row) {
            list($key,$value) = $row->render();
            $keyNode = $dom->importNode($key, true);
            $dlNode->appendChild($keyNode);
            $valueNode = $dom->importNode($value, true);
            $dlNode->appendChild($valueNode);
        }
        return $dlNode;
    }

    public function addError(array $error) {
        $row = new DListRow();
        $row->setKey($error[0]);
        $row->setValue($error[1]);
        $this->addRow($row);
    }
}
?>
