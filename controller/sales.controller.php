<?php 
    class SalesController {
    /**======================================
    *             Show Sales
    * ======================================**/
    static public function showSalesCtr($item, $value) {
        $table = 'sales';

        $response = SalesModel::MdlShowSales($table, $item, $value);

        return $response;
    }
}