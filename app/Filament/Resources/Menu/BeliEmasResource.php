<?php

namespace App\Filament\Resources\Menu;

use App\Filament\Resources\Menu\BeliEmasResource\Pages;
use App\Filament\Resources\Menu\BeliEmasResource\RelationManagers;
use App\Models\BeliEmas;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;

class BeliEmasResource extends Resource
{
    protected static ?string $model = BeliEmas::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('no_trans')
                    ->label('No Transaksi')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('customer_id')
                    ->label('Customer')
                    ->relationship('customer', 'nm_customer')
                    ->required(),
                Forms\Components\Select::make('metode_pembayaran')
                    ->label('Metode Pembayaran')
                    ->default('Cash')
                    ->native(false)
                    ->options([
                        'Cash' => 'Cash/Tunai',
                        'Transfer' => 'Transfer',
                    ]),
                Forms\Components\TextInput::make('bukti_pembayaran')
                    ->label('Bukti Pembayaran')
                    ->maxLength(255),
                Forms\Components\TextInput::make('berat')
                    ->label('Berat')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('kadar_emas')
                    ->label('Kadar Emas')
                    ->required()
                    ->numeric(),
                Forms\Components\Select::make('category_id')
                    ->label('Harga Sekarang')
                    ->relationship('category.harga', 'hrg_beli')
                    ->required(),
                Forms\Components\TextInput::make('keterangan_berat')
                    ->label('Keterangan Berat')
                    ->required()
                    ->numeric()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('no_trans')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('customer.nm_customer')->label('Customer'),
                Tables\Columns\TextColumn::make('category.kategori')->label('Kategori'),
                Tables\Columns\TextColumn::make('berat'),
                Tables\Columns\TextColumn::make('kadar_emas'),
                Tables\Columns\TextColumn::make('keterangan_berat'),
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
            'index' => Pages\ListBeliEmas::route('/'),
            'create' => Pages\CreateBeliEmas::route('/create'),
            'edit' => Pages\EditBeliEmas::route('/{record}/edit'),
        ];
    }
}
