<?php

namespace App\Filament\Resources\ProdukDetailResource\Pages;

use App\Filament\Resources\ProdukDetailResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProdukDetail extends CreateRecord
{
    protected static string $resource = ProdukDetailResource::class;

    /**
     * @return array<Action | ActionGroup>
     */
    protected function getFormActions(): array
    {
        return [
            $this->getCreateFormAction(),
            // ...(static::canCreateAnother() ? [$this->getCreateAnotherFormAction()] : []),
            $this->getCancelFormAction(),
        ];
    }
}
