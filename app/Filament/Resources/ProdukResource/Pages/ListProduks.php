<?php

namespace App\Filament\Resources\ProdukResource\Pages;

use Filament\Actions;
use App\Models\ProdukDetail;
use Filament\Support\Enums\MaxWidth;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\ProdukResource;
use App\Filament\Resources\ProdukDetailResource;
use App\Models\Gudang;
use App\Models\WarehousesProduk;
use Filament\Forms\Form;

class ListProduks extends ListRecords
{
    protected static string $resource = ProdukResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
            Actions\Action::make('tambahProduk')
                ->requiresConfirmation()
                ->label('Tambah Produk')
                ->icon('heroicon-o-squares-plus')
                ->color('danger')
                ->modalIcon('heroicon-o-squares-plus')
                ->modalIconColor('warning')
                ->color('primary')
                ->modalHeading('Tambah Produk')
                // ->modalDescription('Are you sure you\'d like to delete this post? This cannot be undone.')
                ->modalSubmitActionLabel('Simpan')

                ->cancelParentActions()
                ->closeModalByClickingAway(false)

                ->form(function (Form $form) {
                    return $form
                        ->schema(ProdukDetailResource::getForm())
                        ->columns(3);
                })


                ->action(function (array $data) {
                    // Tambah produk baru
                    ProdukDetail::create($data);

                    // Ambil ID produk berdasarkan kode
                    $produk_id = ProdukDetail::where('code', $data['code'])->get()->first()->id;

                    // Ambil gudang berdasarkan produk_id
                    $gudangs = Gudang::all()->pluck('id', 'name');
                    foreach ($gudangs as $gudang) {
                        WarehousesProduk::create([
                            'product_id' => $produk_id,
                            'warehouse_id' => $gudang,
                            'quantity' => 0,
                            'rack' => 0,
                            'avg_cost' => 0,
                        ]);
                    }

                    dd($produk_id);
                })

                ->modalWidth(MaxWidth::FourExtraLarge)
                ->stickyModalHeader()
            // ->stickyModalFooter()
            ,
        ];
    }
}
