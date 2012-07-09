<?php
interface IHtmlList {

    public function render();
    public function getRows();
    public function addRow(IBaseRow $row);
    public function getTitle();
    public function setHeaderRow(IBaseRow $row);
}
?>
