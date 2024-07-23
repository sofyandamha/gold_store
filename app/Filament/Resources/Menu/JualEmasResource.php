<?php

namespace App\Filament\Resources\Menu;

use App\Filament\Resources\Menu\JualEmasResource\Pages;
use App\Filament\Resources\Menu\JualEmasResource\RelationManagers;
use App\Models\JualEmas;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;


class JualEmasResource extends Resource
{
    protected static ?string $model = JualEmas::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('no_trans')
                    ->label('No Transaksi')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(50),
                Forms\Components\Select::make('customer_id')
                    ->label('Customer')
                    ->relationship('customer', 'nm_customer')
                    ->required(),
                Forms\Components\Select::make('masteremas_id')
                    ->label('Kode Barang')
                    ->relationship('masteremas', 'kd_barang')
                    ->required(),
                Forms\Components\TextInput::make('discount')
                    ->label('Diskon')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('metode_pembayaran')
                    ->label('Metode Pembayaran')
                    ->required()
                    ->default('Cash')
                    ->maxLength(255),
                FileUpload::make('bukti_pembayaran')
                    ->label('Bukti Pembayaran')
                    ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('no_trans')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('customer.nm_customer')->label('Customer'),
                Tables\Columns\TextColumn::make('masteremas.kd_barang')->label('Kode Barang'),
                Tables\Columns\TextColumn::make('discount'),
                Tables\Columns\TextColumn::make('metode_pembayaran')->sortable()->searchable(),
                ImageColumn::make('bukti_pembayaran')->square(),

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
            'index' => Pages\ListJualEmas::route('/'),
            'create' => Pages\CreateJualEmas::route('/create'),
            'edit' => Pages\EditJualEmas::route('/{record}/edit'),
        ];
    }
}
