<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PemasukanBarangResource\Pages;
use App\Filament\Resources\PemasukanBarangResource\RelationManagers;
use App\Models\PemasukanBarang;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PemasukanBarangResource extends Resource
{
    protected static ?string $model = PemasukanBarang::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\Select::make('category_id')
                ->label('Kategori')
                ->required()
                ->relationship('category', 'kategori'), // Asumsi ada relasi dengan model Category

            Forms\Components\TextInput::make('sub_kategori')
                ->label('Sub Kategori')
                ->required(), // Asumsi ada relasi dengan model Subcategory

            Forms\Components\TextInput::make('name')
                ->label('Nama')
                ->required(),

            Forms\Components\TextInput::make('kadar')
                ->label('Kadar Default')
                ->default(875)
                ->numeric()
                ->required(),

            Forms\Components\TextInput::make('berat_bersih')
                ->label('Berat Bersih')
                ->required()
                ->numeric(),

            Forms\Components\TextInput::make('harga_modal')
                ->label('Harga Modal')
                ->disabled() // Menonaktifkan input jika dihitung otomatis
                ->required(),

            // Forms\Components\TextInput::make('purchase_invoice')
            //     ->label('Nota Pembelian')
            //     ->required()
            //     ->dehydrateStateUsing(fn ($state) => json_decode($state)), // Jika Anda ingin menghitung harga modal dari nota pembelian

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('category.kategori')->label('Kategori'),
                Tables\Columns\TextColumn::make('sub_kategori'),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('kadar'),
                Tables\Columns\TextColumn::make('berat_bersih'),
                Tables\Columns\TextColumn::make('harga_modal'),
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
            'index' => Pages\ListPemasukanBarangs::route('/'),
            'create' => Pages\CreatePemasukanBarang::route('/create'),
            'edit' => Pages\EditPemasukanBarang::route('/{record}/edit'),
        ];
    }
}
