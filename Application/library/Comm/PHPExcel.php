<?php
namespace Comm;

/**
 * PHPExcel类
 * 第三饭公开类，任意转载
 * 支持Excel 2007,Excel2005,Excel2003,CSV
 * @version 1.0
 * @date 2015-09-15
 * @bq (c) 2015
 */
class PHPExcel {

    public function __construct() {
        error_reporting(0);
        ini_set('display_errors', FALSE);
        ini_set('display_startup_errors', FALSE);
        date_default_timezone_set('PRC');
    }

    /**
     * 生成excel
     * 
     * @param array $array 需要生成的数据
     * @param int $steep 
     * @return mix Description
     */
    public function create($array = array(), $steep = 0, $title = '', $excelType = 'Excel2007') {
        include LIB_DIR . "Comm/PHPExcel/PHPExcel.php";
        //实例化对象
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getActiveSheet()->setTitle($title);
        if (!empty($array)) {
            $sheet = $objPHPExcel->setActiveSheetIndex($steep);
            //设置标题
            $sheet->setCellValue('A1', $array['title']);
            $sub_title = $array['sub_title'] ? $array['sub_title'] : '';
            $sheet->setCellValue('A2', $sub_title . date("Y-m-d H:i:s", time()));
            //表头
            $i = 65;
            foreach ($array['titles'] as $t_key => $t_value) {
                $sheet->setCellValue(strtoupper(chr($i++)) . '3', $t_value);
            }
            $k = 0;
            foreach ($array['contents'] as $key => $value) {
                $k ++;
                $i = 65;
                foreach ($value as $c_value) {
                    $sheet->setCellValue(strtoupper(chr($i++)) . ($k + 3), $c_value);
                    //设置行高
                    $objPHPExcel->getActiveSheet()->getRowDimension($key + 3)->setRowHeight(30);
                    $objPHPExcel->getActiveSheet()->getStyle('A4:J' . ($k + 3))->getFont()->setSize(10);
                    //设置居中
                    $objPHPExcel->getActiveSheet()->getStyle('A1:J' . ($k + 3))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

                    //所有垂直居中
                    $objPHPExcel->getActiveSheet()->getStyle('A1:J' . ($k + 3))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

                    //设置单元格边框
                    $objPHPExcel->getActiveSheet()->getStyle('A3:J' . ($k + 3))->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);

                    //设置自动换行
                    $objPHPExcel->getActiveSheet()->getStyle('A3:J' . ($k + 3))->getAlignment()->setWrapText(true);
                }
            }
            //合并单元格
            $objPHPExcel->getActiveSheet()->mergeCells('A1:J1');
            $objPHPExcel->getActiveSheet()->mergeCells('A2:J2');

            $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(6);
            $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
            $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
            $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
            $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
            $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
            $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(16);
            $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(35);
            $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(80);
            $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(10);

            //设置表头行高
            $objPHPExcel->getActiveSheet()->getRowDimension(1)->setRowHeight(35);
            $objPHPExcel->getActiveSheet()->getRowDimension(2)->setRowHeight(22);

            //设置字体样式
            $objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setName('黑体');
            $objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
            $objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
            $objPHPExcel->getActiveSheet()->getStyle('A3:J3')->getFont()->setBold(true);

            $objPHPExcel->getActiveSheet()->getStyle('A2')->getFont()->setName('宋体');
            $objPHPExcel->getActiveSheet()->getStyle('A2')->getFont()->setSize(16);

            //默认设置为第一个sheet
            $objPHPExcel->setActiveSheetIndex(0);

            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="' . $array['title'] . '"');
            header('Cache-Control: max-age=0');
            //兼容IE9
            header('Cache-Control: max-age=1');

            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, $excelType);
            $objWriter->save('php://output');
        }
    }

}
