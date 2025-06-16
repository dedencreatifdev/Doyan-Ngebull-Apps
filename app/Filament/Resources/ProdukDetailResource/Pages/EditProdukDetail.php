<?php

namespace App\Filament\Resources\ProdukDetailResource\Pages;

use App\Filament\Resources\ProdukDetailResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProdukDetail extends EditRecord
{
    protected static string $resource = ProdukDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
