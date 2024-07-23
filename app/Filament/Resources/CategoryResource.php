<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;


class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Kategori';
    protected static ?string $navigationGroup = 'Master';



    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\Select::make('klasifikasi')
                    ->label('Klasifikasi')
                    ->native(false)
                    ->options([
                        'Emas Murni' => 'Emas Murni',
                        'Emas Perhiasan' => 'Emas Perhiasan',
                    ]),
                Forms\Components\TextInput::make('kategori')
                    ->label('Kategori')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('keterangan')
                    ->label('Keterangan')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('klasifikasi')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('kategori')->sortable()->searchable(),
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
            'custom' => Pages\CategoryCustom::route('/custom'),

        ];
    }
}
