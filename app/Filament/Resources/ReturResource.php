<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReturResource\Pages;
use App\Filament\Resources\ReturResource\RelationManagers;
use App\Models\Retur;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReturResource extends Resource
{
    protected static ?string $model = Retur::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\Select::make('item_id')
                    ->label('ID Barang')
                    ->relationship('labels', 'item_id')
                    ->required(),
                Forms\Components\TextInput::make('receipt_number')
                    ->label('Nomor Tanda Terima')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('labels.item_id')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('receipt_number'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\Action::make('print')
                    ->label('Cetak')
                    ->icon('heroicon-o-printer')
                    ->action(function ($record) {
                        return redirect()->route('retur.print', [$record->id ]);
                    }),
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
            'index' => Pages\ListReturs::route('/'),
            'create' => Pages\CreateRetur::route('/create'),
            'edit' => Pages\EditRetur::route('/{record}/edit'),
        ];
    }
}
