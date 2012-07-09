<?php

/**
 * Description of TableWidget
 *
 * @author lbernard
 */
class TableWidget extends BaseHtmlList {

    public function initHeaders() {
        $headerRow = new TableRow();
        return $headerRow;
    }

    public function render() {

        $dom = new DomDocument('1.0','UTF-8');
        $tableNode = $dom->createElement('table');

        /* ADD THE ATTRIBUTES (CLASSES, ID, WIDTH etc) */
        foreach ($this->attributes as $key => $value) {
            if (is_array($value)) {
                $attributeString = $key.'="';
                foreach ($value as $data) {
                    $attributeString .= $data . " ";
                }
                $attributeString = rtrim($attributeString) . '"';
                $tableNode->setAttribute($key,$attributeString);
            }else{
                $tableNode->setAttribute($key,$value);
            }
        }

        /* ADD HEADER ROW IN THEAD */
        if($this->getHeaderRow()->isVisible()){
            $theadNode = $dom->createElement('thead');

            $thNode = $dom->importNode($this->getHeaderRow()->render(), true);
            $theadNode->appendChild($thNode);
            $tableNode->appendChild($theadNode);
        }

        /* ADD ROWS IN TBODY */
        $tbodyNode = $dom->createElement('tbody');


        foreach ($this->getRows() as $row) {
            $tdNode = $dom->importNode($row->render(), true);
            $tbodyNode->appendChild($tdNode);
        }
        $tableNode->appendChild($tbodyNode);
        $dom->appendChild($tableNode);
        return $dom->saveHtml();
//        return htmlentities($dom->saveHtml());
    }

    public function addError($error) {
        $row = new TableRow();
        $row->addCell(new TableCell($error));
        $this->addRow($row);
    }

}

?>
