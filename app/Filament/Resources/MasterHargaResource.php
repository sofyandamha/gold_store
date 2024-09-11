<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MasterHargaResource\Pages;
use App\Filament\Resources\MasterHargaResource\RelationManagers;
use App\Models\MasterHarga;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MasterHargaResource extends Resource
{
    protected static ?string $model = MasterHarga::class;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';
    protected static ?string $navigationLabel = 'Harga';

    protected static ?string $navigationGroup = 'Master';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('hrg_jual')
                    ->label('Harga Jual')
                    ->required()
                    ->numeric()
                    ->prefix('Rp.'),
                Forms\Components\TextInput::make('hrg_beli')
                    ->label('Harga Beli')
                    ->required()
                    ->numeric()
                    ->prefix('Rp.'),
                Forms\Components\Select::make('category_id')
                    ->label('Kategori')
                    ->relationship('category', 'kategori')
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('hrg_jual')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('hrg_beli')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('category.kategori')->label('Kategori'),

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
            'index' => Pages\ListMasterHargas::route('/'),
            'create' => Pages\CreateMasterHarga::route('/create'),
            'edit' => Pages\EditMasterHarga::route('/{record}/edit'),
        ];
    }
}
