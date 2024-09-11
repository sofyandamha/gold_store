<?php

namespace App\Filament\Resources\Menu;

use App\Filament\Resources\Menu\PembayaranSupplierResource\Pages;
use App\Filament\Resources\Menu\PembayaranSupplierResource\RelationManagers;
use App\Models\PembayaranSupplier;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Actions\CreateAction;

class PembayaranSupplierResource extends Resource
{
    protected static ?string $model = PembayaranSupplier::class;

    protected static ?string $navigationIcon = 'heroicon-o-credit-card';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('nota')
                    ->label('Nomor Nota')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('tanggal_bayar')
                    ->label('Tanggal Pembayaran')
                    ->native(false)
                    ->required(),
                Forms\Components\Select::make('metode_bayar')
                    ->label('Metode Pembayaran')
                    ->required()
                    ->options([
                        'Uang' => 'Uang',
                        'Emas' => 'Emas',
                    ]),
                Forms\Components\TextInput::make('denda')
                    ->label('Denda')
                    ->required()
                    ->numeric()
                    ->maxLength(20),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('nota')->label('Nomor Nota')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('tanggal_bayar')->label('Tanggal Pemabayaran')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('metode_bayar')->label('Metode Pembayaran')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('denda')->label('Denda'),
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
            'index' => Pages\ListPembayaranSuppliers::route('/'),
            'create' => Pages\CreatePembayaranSupplier::route('/create'),
            'edit' => Pages\EditPembayaranSupplier::route('/{record}/edit'),
        ];
    }

    protected function getCreateFormAction(): \Filament\Actions\Action
{
    return parent::getCreateFormAction()
        ->label('new label')
        ->icon('heroicon-s-plus');
}
}
