<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MasterEmasResource\Pages;
use App\Filament\Resources\MasterEmasResource\RelationManagers;
use App\Models\MasterEmas;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;

class MasterEmasResource extends Resource
{
    protected static ?string $model = MasterEmas::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Emas (Stock)';

    protected static ?string $navigationGroup = 'Master';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('kd_barang')
                    ->label('Kode Barang')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('nm_barang')
                    ->label('Nama Barang')
                    ->required()
                    ->maxLength(255),
                Select::make('category_id')
                    ->label('Kategori')
                    ->relationship('category', 'kategori')
                    ->required(),
                Forms\Components\TextInput::make('berat_modal')
                    ->label('Berat Modal')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('karat')
                    ->label('Karat')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('harga_modal')
                    ->label('Harga Modal')
                    ->required()
                    ->numeric()
                    ->prefix('Rp.'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('kd_barang')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('nm_barang')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('category.kategori'),
                Tables\Columns\TextColumn::make('karat'),
                Tables\Columns\TextColumn::make('berat_modal'),
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
            'index' => Pages\ListMasterEmas::route('/'),
            'create' => Pages\CreateMasterEmas::route('/create'),
            'edit' => Pages\EditMasterEmas::route('/{record}/edit'),
        ];
    }
}
