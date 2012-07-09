<?php

/**
 * Description of BaseList
 *
 * @author lbernard
 */
abstract class BaseList extends BaseHtmlList {
    public function render() {

        $dom = new DomDocument('1.0','UTF-8');
        $listNode = $dom->createElement($this->htmlTag);

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

        $listNode = $this->renderChilds($dom,$listNode);
        $dom->appendChild($listNode);
        return $dom->saveHtml();
    }
}
?>
