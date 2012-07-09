<?php

/**
 * Description of TableHeaderCell
 *
 * @author lbernard
 */
class TableHeaderCell extends TableCell {

    public function render() {
        $dom = new DomDocument('1.0', 'UTF-8');
        $tdnode = $dom->createElement('td');
        if (!empty($this->content)) {
            $test = $dom->createDocumentFragment();
            $test->appendXML($this->content);
            $tdnode->appendChild($test);
        }
        return $tdnode;
    }

}

?>
