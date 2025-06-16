<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\ProdukDetail;
use Filament\Resources\Resource;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProdukDetailResource\Pages;
use App\Filament\Resources\ProdukDetailResource\RelationManagers;

class ProdukDetailResource extends Resource
{
    protected static ?string $model = ProdukDetail::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getForm()
    {
        return [
            TextInput::make('code')
                ->required()
                ->maxLength(50),
            TextInput::make('name')
                ->required()
                ->maxLength(255),
            TextInput::make('unit')
                ->numeric()
                ->default(null),
            TextInput::make('cost')
                ->numeric()
                ->default(null)
                ->prefix('$'),
            TextInput::make('price')
                ->required()
                ->numeric()
                ->prefix('$'),
            TextInput::make('alert_quantity')
                ->numeric()
                ->default(20.0000),
            FileUpload::make('image')
                ->image(),
            TextInput::make('category_id')
                ->required()
                ->numeric(),
            TextInput::make('subcategory_id')
                ->numeric()
                ->default(null),
            TextInput::make('cf1')
                ->maxLength(255)
                ->default(null),
            TextInput::make('cf2')
                ->maxLength(255)
                ->default(null),
            TextInput::make('cf3')
                ->maxLength(255)
                ->default(null),
            TextInput::make('cf4')
                ->maxLength(255)
                ->default(null),
            TextInput::make('cf5')
                ->maxLength(255)
                ->default(null),
            TextInput::make('cf6')
                ->maxLength(255)
                ->default(null),
            TextInput::make('quantity')
                ->numeric()
                ->default(0.0000),
            TextInput::make('tax_rate')
                ->numeric()
                ->default(null),
            Toggle::make('track_quantity'),
            TextInput::make('details')
                ->maxLength(1000)
                ->default(null),
            TextInput::make('warehouse')
                ->numeric()
                ->default(null),
            TextInput::make('barcode_symbology')
                ->required()
                ->maxLength(55)
                ->default('code128'),
            TextInput::make('file')
                ->maxLength(100)
                ->default(null),
            Textarea::make('product_details')
                ->columnSpanFull(),
            Toggle::make('tax_method'),
            TextInput::make('type')
                ->required()
                ->maxLength(55)
                ->default('standard'),
            TextInput::make('supplier1')
                ->numeric()
                ->default(null),
            TextInput::make('supplier1price')
                ->numeric()
                ->default(null),
            TextInput::make('supplier2')
                ->numeric()
                ->default(null),
            TextInput::make('supplier2price')
                ->numeric()
                ->default(null),
            TextInput::make('supplier3')
                ->numeric()
                ->default(null),
            TextInput::make('supplier3price')
                ->numeric()
                ->default(null),
            TextInput::make('supplier4')
                ->numeric()
                ->default(null),
            TextInput::make('supplier4price')
                ->numeric()
                ->default(null),
            TextInput::make('supplier5')
                ->numeric()
                ->default(null),
            TextInput::make('supplier5price')
                ->numeric()
                ->default(null),
            Toggle::make('promotion'),
            TextInput::make('promo_price')
                ->numeric()
                ->default(null),
            DatePicker::make('start_date'),
            DatePicker::make('end_date'),
            TextInput::make('supplier1_part_no')
                ->maxLength(50)
                ->default(null),
            TextInput::make('supplier2_part_no')
                ->maxLength(50)
                ->default(null),
            TextInput::make('supplier3_part_no')
                ->maxLength(50)
                ->default(null),
            TextInput::make('supplier4_part_no')
                ->maxLength(50)
                ->default(null),
            TextInput::make('supplier5_part_no')
                ->maxLength(50)
                ->default(null),
            TextInput::make('sale_unit')
                ->numeric()
                ->default(null),
            TextInput::make('purchase_unit')
                ->numeric()
                ->default(null),
            TextInput::make('brand')
                ->numeric()
                ->default(null),
        ];
    }

    public static function form(Form $form): Form
    {
        // return $form
        //     ->schema([
        //         TextInput::make('code')
        //             ->required()
        //             ->maxLength(50),
        //         TextInput::make('name')
        //             ->required()
        //             ->maxLength(255),
        //         TextInput::make('unit')
        //             ->numeric()
        //             ->default(null),
        //         TextInput::make('cost')
        //             ->numeric()
        //             ->default(null)
        //             ->prefix('$'),
        //         TextInput::make('price')
        //             ->required()
        //             ->numeric()
        //             ->prefix('$'),
        //         TextInput::make('alert_quantity')
        //             ->numeric()
        //             ->default(20.0000),
        //         FileUpload::make('image')
        //             ->image(),
        //         TextInput::make('category_id')
        //             ->required()
        //             ->numeric(),
        //         TextInput::make('subcategory_id')
        //             ->numeric()
        //             ->default(null),
        //         TextInput::make('cf1')
        //             ->maxLength(255)
        //             ->default(null),
        //         TextInput::make('cf2')
        //             ->maxLength(255)
        //             ->default(null),
        //         TextInput::make('cf3')
        //             ->maxLength(255)
        //             ->default(null),
        //         TextInput::make('cf4')
        //             ->maxLength(255)
        //             ->default(null),
        //         TextInput::make('cf5')
        //             ->maxLength(255)
        //             ->default(null),
        //         TextInput::make('cf6')
        //             ->maxLength(255)
        //             ->default(null),
        //         TextInput::make('quantity')
        //             ->numeric()
        //             ->default(0.0000),
        //         TextInput::make('tax_rate')
        //             ->numeric()
        //             ->default(null),
        //         Toggle::make('track_quantity'),
        //         TextInput::make('details')
        //             ->maxLength(1000)
        //             ->default(null),
        //         TextInput::make('warehouse')
        //             ->numeric()
        //             ->default(null),
        //         TextInput::make('barcode_symbology')
        //             ->required()
        //             ->maxLength(55)
        //             ->default('code128'),
        //         TextInput::make('file')
        //             ->maxLength(100)
        //             ->default(null),
        //         Textarea::make('product_details')
        //             ->columnSpanFull(),
        //         Toggle::make('tax_method'),
        //         TextInput::make('type')
        //             ->required()
        //             ->maxLength(55)
        //             ->default('standard'),
        //         TextInput::make('supplier1')
        //             ->numeric()
        //             ->default(null),
        //         TextInput::make('supplier1price')
        //             ->numeric()
        //             ->default(null),
        //         TextInput::make('supplier2')
        //             ->numeric()
        //             ->default(null),
        //         TextInput::make('supplier2price')
        //             ->numeric()
        //             ->default(null),
        //         TextInput::make('supplier3')
        //             ->numeric()
        //             ->default(null),
        //         TextInput::make('supplier3price')
        //             ->numeric()
        //             ->default(null),
        //         TextInput::make('supplier4')
        //             ->numeric()
        //             ->default(null),
        //         TextInput::make('supplier4price')
        //             ->numeric()
        //             ->default(null),
        //         TextInput::make('supplier5')
        //             ->numeric()
        //             ->default(null),
        //         TextInput::make('supplier5price')
        //             ->numeric()
        //             ->default(null),
        //         Toggle::make('promotion'),
        //         TextInput::make('promo_price')
        //             ->numeric()
        //             ->default(null),
        //         DatePicker::make('start_date'),
        //         DatePicker::make('end_date'),
        //         TextInput::make('supplier1_part_no')
        //             ->maxLength(50)
        //             ->default(null),
        //         TextInput::make('supplier2_part_no')
        //             ->maxLength(50)
        //             ->default(null),
        //         TextInput::make('supplier3_part_no')
        //             ->maxLength(50)
        //             ->default(null),
        //         TextInput::make('supplier4_part_no')
        //             ->maxLength(50)
        //             ->default(null),
        //         TextInput::make('supplier5_part_no')
        //             ->maxLength(50)
        //             ->default(null),
        //         TextInput::make('sale_unit')
        //             ->numeric()
        //             ->default(null),
        //         TextInput::make('purchase_unit')
        //             ->numeric()
        //             ->default(null),
        //         TextInput::make('brand')
        //             ->numeric()
        //             ->default(null),
        //     ]);
        return $form
            ->schema([
                ...self::getForm(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('code')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('unit')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cost')
                    ->money()
                    ->sortable(),
                Tables\Columns\TextColumn::make('price')
                    ->money()
                    ->sortable(),
                Tables\Columns\TextColumn::make('alert_quantity')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('category_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('subcategory_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cf1')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cf2')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cf3')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cf4')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cf5')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cf6')
                    ->searchable(),
                Tables\Columns\TextColumn::make('quantity')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tax_rate')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('track_quantity')
                    ->boolean(),
                Tables\Columns\TextColumn::make('details')
                    ->searchable(),
                Tables\Columns\TextColumn::make('warehouse')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('barcode_symbology')
                    ->searchable(),
                Tables\Columns\TextColumn::make('file')
                    ->searchable(),
                Tables\Columns\IconColumn::make('tax_method')
                    ->boolean(),
                Tables\Columns\TextColumn::make('type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('supplier1')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('supplier1price')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('supplier2')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('supplier2price')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('supplier3')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('supplier3price')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('supplier4')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('supplier4price')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('supplier5')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('supplier5price')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('promotion')
                    ->boolean(),
                Tables\Columns\TextColumn::make('promo_price')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('start_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('end_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('supplier1_part_no')
                    ->searchable(),
                Tables\Columns\TextColumn::make('supplier2_part_no')
                    ->searchable(),
                Tables\Columns\TextColumn::make('supplier3_part_no')
                    ->searchable(),
                Tables\Columns\TextColumn::make('supplier4_part_no')
                    ->searchable(),
                Tables\Columns\TextColumn::make('supplier5_part_no')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sale_unit')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('purchase_unit')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('brand')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->date()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProdukDetails::route('/'),
            // 'create' => Pages\CreateProdukDetail::route('/create'),
            // 'edit' => Pages\EditProdukDetail::route('/{record}/edit'),
        ];
    }
}
