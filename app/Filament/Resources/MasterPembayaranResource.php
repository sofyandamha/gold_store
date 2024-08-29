<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MasterPembayaranResource\Pages;
use App\Filament\Resources\MasterPembayaranResource\RelationManagers;
use App\Models\MasterPembayaran;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MasterPembayaranResource extends Resource
{
    protected static ?string $model = MasterPembayaran::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'List Pembayaran';

    protected static ?string $navigationGroup = 'Master';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('metode_bayar')
                    ->label('Metode Bayar')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('add_fee')
                    ->label('Tambahan Biaya')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('keterangan')
                    ->label('Keterangan')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('metode_bayar')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('add_fee')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('keterangan'),
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
            'index' => Pages\ListMasterPembayarans::route('/'),
            'create' => Pages\CreateMasterPembayaran::route('/create'),
            'edit' => Pages\EditMasterPembayaran::route('/{record}/edit'),
        ];
    }
}
