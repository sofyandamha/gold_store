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
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class BeliEmasResource extends Resource
{
    protected static ?string $model = BeliEmas::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('no_trans')
                    ->label('No Transaksi')
                    ->default('TRX-'.Carbon::now()->format('ymdhs')),
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
                FileUpload::make('bukti_pembayaran')
                    ->label('Bukti Pembayaran')
                    ->required(),
                Forms\Components\TextInput::make('berat')
                    ->label('Berat')
                    ->required()
                    ->numeric(),
                Forms\Components\Select::make('kadar_emas')
                    ->label('Kadar Emas')
                    ->default('875')
                    ->native(false)
                    ->options([
                        '99' => '99',
                        '916' => '916',
                        '88' => '88',
                        '875' => '875',
                        '750' => '750',
                        '700' => '700',
                        '420' => '420'
                    ]),
                Forms\Components\Select::make('masterharga_id')
                    ->label('Harga Sekarang')
                    ->relationship(
                        name: 'masterharga',
                        titleAttribute: 'Kategori'
                    )
                    ->getOptionLabelFromRecordUsing(fn (Model $record) => "{$record->category->kategori} ($record->hrg_beli)")
                    ->required(),
                Forms\Components\Select::make('keterangan_berat')
                    ->label('Keterangan Berat')
                    ->default('Emas Saja')
                    ->native(false)
                    ->options([
                        'Emas Saja' => 'Emas Saja',
                        'Permata' => 'Permata',
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('no_trans')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('customer.nm_customer')->label('Customer'),
                Tables\Columns\TextColumn::make('masterharga.category.kategori')->label('Kategori'),
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
