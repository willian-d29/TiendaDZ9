<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\SaleModel;
use App\Models\ClientModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use FPDF;

class ReportController extends BaseController
{
    public function index()
    {
        $productModel = new ProductModel();
        $products = $productModel->findAll();

        $productNames = [];
        $productStocks = [];
        $productSales = [];
        foreach ($products as $product) {
            $productNames[] = $product['name'];
            $productStocks[] = $product['stock'];
            // Aquí podrías calcular las ventas de cada producto
            $sales = $this->getProductSales($product['id']);
            $productSales[] = $sales;
        }

        $saleModel = new SaleModel();
        $sales = $saleModel->findAll();

        $saleDates = [];
        $salesTotal = [];
        foreach ($sales as $sale) {
            $saleDates[] = $sale['created'];
            $salesTotal[] = $sale['total'];
        }

        $clientModel = new ClientModel();
        $clients = $clientModel->findAll();

        $clientNames = [];
        $clientPurchases = [];
        foreach ($clients as $client) {
            $clientNames[] = $client['name'];
            // Aquí podrías calcular las compras de cada cliente
            $purchases = $this->getClientPurchases($client['id']);
            $clientPurchases[] = $purchases;
        }

        return view('reports/dashboard', [
            'productNames' => $productNames,
            'productStocks' => $productStocks,
            'saleDates' => $saleDates,
            'salesTotal' => $salesTotal,
            'clientNames' => $clientNames,
            'clientPurchases' => $clientPurchases,
            'productSales' => $productSales
        ]);
    }

    private function getProductSales($productId)
    {
        $detailModel = new \App\Models\DetailModel();
        $details = $detailModel->where('productId', $productId)->findAll();
        $totalSales = 0;
        foreach ($details as $detail) {
            $totalSales += $detail['amount'];
        }
        return $totalSales;
    }

    private function getClientPurchases($clientId)
    {
        $saleModel = new SaleModel();
        $sales = $saleModel->where('clientId', $clientId)->findAll();
        $totalPurchases = 0;
        foreach ($sales as $sale) {
            $totalPurchases += $sale['total'];
        }
        return $totalPurchases;
    }

    public function exportPDF($type)
    {
        if ($type === 'products') {
            $this->exportProductsPDF();
        } elseif ($type === 'sales') {
            $this->exportSalesPDF();
        } elseif ($type === 'customers') {
            $this->exportCustomersPDF();
        }
    }

    public function exportXLS($type)
    {
        if ($type === 'products') {
            $this->exportProductsXLS();
        } elseif ($type === 'sales') {
            $this->exportSalesXLS();
        } elseif ($type === 'customers') {
            $this->exportCustomersXLS();
        }
    }

    public function exportHTML($type)
    {
        if ($type === 'products') {
            $this->exportProductsHTML();
        } elseif ($type === 'sales') {
            $this->exportSalesHTML();
        } elseif ($type === 'customers') {
            $this->exportCustomersHTML();
        }
    }

    private function exportProductsPDF()
    {
        $productModel = new ProductModel();
        $products = $productModel->findAll();

        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(40, 10, 'Reporte de Productos');

        $pdf->Ln(10);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(40, 10, 'Nombre', 1);
        $pdf->Cell(40, 10, 'Precio', 1);
        $pdf->Ln();

        $pdf->SetFont('Arial', '', 12);
        foreach ($products as $product) {
            $pdf->Cell(40, 10, $product['name'], 1);
            $pdf->Cell(40, 10, $product['price'], 1);
            $pdf->Ln();
        }

        $pdf->Output('D', 'reporte_productos.pdf');
    }

    private function exportSalesPDF()
    {
        $saleModel = new SaleModel();
        $sales = $saleModel->findAll();

        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(40, 10, 'Reporte de Ventas');

        $pdf->Ln(10);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(40, 10, 'Fecha', 1);
        $pdf->Cell(40, 10, 'Total', 1);
        $pdf->Ln();

        $pdf->SetFont('Arial', '', 12);
        foreach ($sales as $sale) {
            $pdf->Cell(40, 10, $sale['created'], 1);
            $pdf->Cell(40, 10, $sale['total'], 1);
            $pdf->Ln();
        }

        $pdf->Output('D', 'reporte_ventas.pdf');
    }

    private function exportCustomersPDF()
    {
        $clientModel = new ClientModel();
        $clients = $clientModel->findAll();

        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(40, 10, 'Reporte de Clientes');

        $pdf->Ln(10);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(40, 10, 'Nombre', 1);
        $pdf->Cell(40, 10, 'RUC', 1);
        $pdf->Ln();

        $pdf->SetFont('Arial', '', 12);
        foreach ($clients as $client) {
            $pdf->Cell(40, 10, $client['name'], 1);
            $pdf->Cell(40, 10, $client['ruc'], 1);
            $pdf->Ln();
        }

        $pdf->Output('D', 'reporte_clientes.pdf');
    }

    private function exportProductsXLS()
    {
        $productModel = new ProductModel();
        $products = $productModel->findAll();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'Nombre');
        $sheet->setCellValue('B1', 'Precio');

        $row = 2;
        foreach ($products as $product) {
            $sheet->setCellValue('A' . $row, $product['name']);
            $sheet->setCellValue('B' . $row, $product['price']);
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'reporte_productos.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="'.urlencode($filename).'"');
        $writer->save('php://output');
    }

    private function exportSalesXLS()
    {
        $saleModel = new SaleModel();
        $sales = $saleModel->findAll();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'Fecha');
        $sheet->setCellValue('B1', 'Total');

        $row = 2;
        foreach ($sales as $sale) {
            $sheet->setCellValue('A' . $row, $sale['created']);
            $sheet->setCellValue('B' . $row, $sale['total']);
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'reporte_ventas.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="'.urlencode($filename).'"');
        $writer->save('php://output');
    }

    private function exportCustomersXLS()
    {
        $clientModel = new ClientModel();
        $clients = $clientModel->findAll();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'Nombre');
        $sheet->setCellValue('B1', 'RUC');

        $row = 2;
        foreach ($clients as $client) {
            $sheet->setCellValue('A' . $row, $client['name']);
            $sheet->setCellValue('B' . $row, $client['ruc']);
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'reporte_clientes.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="'.urlencode($filename).'"');
        $writer->save('php://output');
    }

    private function exportProductsHTML()
    {
        $productModel = new ProductModel();
        $products = $productModel->findAll();

        echo '<html><body>';
        echo '<h1>Reporte de Productos</h1>';
        echo '<table border="1"><tr><th>Nombre</th><th>Precio</th></tr>';

        foreach ($products as $product) {
            echo '<tr>';
            echo '<td>' . $product['name'] . '</td>';
            echo '<td>' . $product['price'] . '</td>';
            echo '</tr>';
        }

        echo '</table>';
        echo '</body></html>';
    }

    private function exportSalesHTML()
    {
        $saleModel = new SaleModel();
        $sales = $saleModel->findAll();

        echo '<html><body>';
        echo '<h1>Reporte de Ventas</h1>';
        echo '<table border="1"><tr><th>Fecha</th><th>Total</th></tr>';

        foreach ($sales as $sale) {
            echo '<tr>';
            echo '<td>' . $sale['created'] . '</td>';
            echo '<td>' . $sale['total'] . '</td>';
            echo '</tr>';
        }

        echo '</table>';
        echo '</body></html>';
    }

    private function exportCustomersHTML()
    {
        $clientModel = new ClientModel();
        $clients = $clientModel->findAll();

        echo '<html><body>';
        echo '<h1>Reporte de Clientes</h1>';
        echo '<table border="1"><tr><th>Nombre</th><th>RUC</th></tr>';

        foreach ($clients as $client) {
            echo '<tr>';
            echo '<td>' . $client['name'] . '</td>';
            echo '<td>' . $client['ruc'] . '</td>';
            echo '</tr>';
        }

        echo '</table>';
        echo '</body></html>';
    }
}
