<?php

namespace App\Filament\Resources\ProdukDetailResource\Pages;

use App\Filament\Resources\ProdukDetailResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\ListRecords;

class ListProdukDetails extends ListRecords
{
    protected static string $resource = ProdukDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
            
        ];
    }
}
