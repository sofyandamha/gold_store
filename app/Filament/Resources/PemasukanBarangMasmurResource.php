<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PemasukanBarangMasmurResource\Pages;
use App\Filament\Resources\PemasukanBarangMasmurResource\RelationManagers;
use App\Models\PemasukanBarangMasmur;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PemasukanBarangMasmurResource extends Resource
{
    protected static ?string $model = PemasukanBarangMasmur::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\Select::make('supplier_id')
                ->label('Supplier')
                ->relationship('mastersupplier', 'nm_supplier')
                ->required(),

            Forms\Components\TextInput::make('no_certificate')
                ->label('No Certificate')
                ->required(),

            Forms\Components\DatePicker::make('purchase_date')
                ->label('Tanggal Pembelian')
                ->required(),

            // Forms\Components\TextInput::make('real_weight')
            //     ->label('Berat Real')
            //     ->required()
            //     ->numeric()
            //     ->dehydrateStateUsing(fn ($state) => (float) $state) // Pastikan berat adalah float
            //     ->afterStateUpdated(function ($state, callable $get) {
            //         // Hitung modal_weight
            //         $get('modal_weight', $state);
            //     }),

            Forms\Components\TextInput::make('modal_weight')
                ->label('Berat Modal')
                // ->disabled() // Menonaktifkan input karena sama dengan real_weight
                ->numeric(),

            Forms\Components\Select::make('type')
                ->label('Jenis')
                ->options([
                    'ANTM' => 'ANTM',
                    'LOKAL' => 'LOKAL',
                    'UBS' => 'UBS',
                ])
                ->required(),

            Forms\Components\TextInput::make('price_per_gram')
                ->label('Harga Per Gram')
                // ->disabled() // Jika dihitung otomatis, nonaktifkan input
                ->numeric(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('mastersupplier.nm_supplier')->label('Nama Supplier'),
                Tables\Columns\TextColumn::make('no_certificate'),
                Tables\Columns\TextColumn::make('purchase_date'),
                Tables\Columns\TextColumn::make('price_per_gram'),
                Tables\Columns\TextColumn::make('type'),
                Tables\Columns\TextColumn::make('modal_weight'),
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
            'index' => Pages\ListPemasukanBarangMasmurs::route('/'),
            'create' => Pages\CreatePemasukanBarangMasmur::route('/create'),
            'edit' => Pages\EditPemasukanBarangMasmur::route('/{record}/edit'),
        ];
    }
}
