<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TableRow
 *
 * @author lbernard
 */
class TableRow implements IBaseRow {

    private $cellCollection;
    private $visible;

    public function __construct(TableCellCollection $cells = null) {
        $this->cellCollection = $cells != null ? $cells : new TableCellCollection();
        $this->visible = true;
    }

    public function setCells(TableCellCollection $cells) {
        $this->cellCollection = $cells;
    }

    public function addCells(TableCellCollection $cells) {
        foreach ($cells as $key => $cell) {
            $this->addCell($cell);
        }
    }

    public function addCell(TableCell $cell) {
        $this->cellCollection->add($cell);
    }

    public function isVisible() {
        return $this->visible;
    }

    public function setVisible($value = true) {
        $this->visible = $value;
    }

    public function render() {
        $dom = new DomDocument('1.0', 'UTF-8');
        if ($this->isVisible()) {
            $trElement = $dom->createElement('tr');
            foreach ($this->cellCollection->getCells() as $cell) {
                $tdnode = $dom->importNode($cell->render(), true);
                $trElement->appendChild($tdnode);
            }
        }
        return $trElement;
    }

    public static function createRowFromArray(array $values, $isHeader = false) {
        $cells = new TableCellCollection();
        foreach ($values as $key => $value) {
            if (!$isHeader)
                $cells->add(new TableCell($value));
            else
                $cells->add(new TableHeaderCell($key));
        }
        return new TableRow($cells);
    }

}

?>
