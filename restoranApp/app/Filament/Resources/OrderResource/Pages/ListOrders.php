<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Models\Order;
use PDF;

class ListOrders extends ListRecords
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(), // Tombol New
            Actions\Action::make('cetak_laporan')
            ->label('Cetak Laporan')
            ->icon('heroicon-o-printer')
            ->action(fn() => static::cetakLaporan())
            ->requiresConfirmation()
            ->modalHeading('Cetak Laporan Order')
            ->modalSubheading('Apakah Anda yakin ingin mencetak laporan?'),
            ];
    }
            public static function cetakLaporan()
        {
        // Ambil data pengguna
        $data = \DB::table('orders AS O')
        ->join('customers AS C', 'O.customer_id', '=', 'C.id')
        ->join('menus AS M', 'O.menu_id', '=', 'M.id')
        ->select('C.table_number', 'C.name AS customer_name', 'M.name AS menu_name', 'M.price', 'O.quantity', 'O.status')
        ->get();

        // Load view for printing PDF
        $pdf = \PDF::loadView('laporan.cetak', ['data' => $data]);

        // Stream download PDF
        return response()->streamDownload(fn() => print($pdf->output()), 'laporan-order.pdf');  
 }
}
