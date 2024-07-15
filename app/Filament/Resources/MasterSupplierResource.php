<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MasterSupplierResource\Pages;
use App\Filament\Resources\MasterSupplierResource\RelationManagers;
use App\Models\MasterSupplier;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MasterSupplierResource extends Resource
{
    protected static ?string $model = MasterSupplier::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Supplier';

    protected static ?string $navigationGroup = 'Master';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('nm_supplier')
                    ->label('Nama Supplier')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('no_hp')
                    ->label('No Hp.')
                    ->required()
                    ->numeric(),
                Forms\Components\TextArea::make('address')
                    ->label('Alamat')
                    ->required()
                    ->maxLength(255)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('nm_supplier')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('no_hp')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('address')->sortable()->searchable(),
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
            'index' => Pages\ListMasterSuppliers::route('/'),
            'create' => Pages\CreateMasterSupplier::route('/create'),
            'edit' => Pages\EditMasterSupplier::route('/{record}/edit'),
        ];
    }
}
