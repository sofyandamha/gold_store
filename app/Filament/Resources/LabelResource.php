<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LabelResource\Pages;
use App\Filament\Resources\LabelResource\RelationManagers;
use App\Models\Label;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LabelResource extends Resource
{
    protected static ?string $model = Label::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                    Forms\Components\TextInput::make('item_id')
                        ->label('ID Barang')
                        ->required()
                        ->maxLength(12)
                        // ->unique(ignoringRecord: true) // Pastikan ID Barang unik
                        ->reactive()
                        ->afterStateUpdated(function ($state, callable $get) {
                            // Update ID Barang jika kurang dari 12 karakter
                            if (strlen($state) < 12) {
                                $date = now()->format('ym'); // Format tahun dan bulan
                                $itemId = str_pad($state, 6, '0', STR_PAD_LEFT) . $date;
                                // Update state menggunakan closure untuk menyimpan ID Barang
                                $get('item_id', $itemId);
                            }
                        }),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('item_id')
                    ->label('ID Barang'),
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
            'index' => Pages\ListLabels::route('/'),
            'create' => Pages\CreateLabel::route('/create'),
            'edit' => Pages\EditLabel::route('/{record}/edit'),
        ];
    }
}
