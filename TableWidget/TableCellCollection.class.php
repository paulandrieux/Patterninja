<?php

/**
 * Description of TableCellCollection
 *
 * @author lbernard
 */
class TableCellCollection {

    private $cells;

    public function __construct() {

    }

    public function add(TableCell $cell) {
        $this->cells[] = $cell;
    }

    public function remove($index) {
        unset($this->cells[$index]);
    }

    public function getCells() {
        return $this->cells;
    }

    public function render() {
        $render = "";
        foreach ($this->cells as $key => $cell) {
            $render .= $cell->render();
        }
        return $render;
    }

}

?>
