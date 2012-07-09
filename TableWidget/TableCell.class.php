<?php

/**
 * Description of TableCell
 *
 * @author lbernard
 */
class TableCell {

//    static private $shit = 0;
    protected $content;

    public function __construct($content) {
        $this->content = $content;
    }

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
