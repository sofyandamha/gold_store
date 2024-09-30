<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PembelianBarangResource\Pages;
use App\Filament\Resources\PembelianBarangResource\RelationManagers;
use App\Models\PembelianBarang;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PembelianBarangResource extends Resource
{
    protected static ?string $model = PembelianBarang::class;

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
                Forms\Components\DatePicker::make('jatuh_tempo')
                    ->label('Utang / Jatuh Tempo')
                    ->native(false),
                    // ->displayFormat('dd/mm/YYYY'),
                Forms\Components\TextInput::make('berat_real')
                    ->label('Berat Modal')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('berat_modal')
                    ->label('Berat Modal')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('no_trans')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('jatuh_tempo')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('berat_real'),
                Tables\Columns\TextColumn::make('berat_modal'),
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
            'index' => Pages\ListPembelianBarangs::route('/'),
            'create' => Pages\CreatePembelianBarang::route('/create'),
            'edit' => Pages\EditPembelianBarang::route('/{record}/edit'),
        ];
    }
}
