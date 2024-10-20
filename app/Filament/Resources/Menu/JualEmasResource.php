<?php

namespace App\Filament\Resources\Menu;

use App\Filament\Resources\Menu\JualEmasResource\Pages;
use App\Filament\Resources\Menu\JualEmasResource\RelationManagers;
use App\Models\JualEmas;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Repeater;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;
use Carbon\Carbon;

class JualEmasResource extends Resource
{
    protected static ?string $model = JualEmas::class;

    protected static ?string $navigationIcon = 'heroicon-o-scale';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                // Repeater::make('jualemas')
                //     ->label('Jual Emas')
                //     ->schema([
                        Forms\Components\TextInput::make('no_trans')
                            ->label('No Transaksi')
                            ->required()
                            ->reactive()
                            ->afterStateUpdated(function ($state, callable $get, callable $set) {
                                // $totalBerat = PembelianBarang::find($state)->berat_real;
                                if ($state) {
                                    $no = JualEmas::orderBy('no_trans', 'desc')->first();

                                    $number = $no ? $no->no_trans + 1 : 0;
                                    $mix = Carbon::now()->format('ymd').$number;
                                    dd($mix);
                                    // Set total berat pembelian secara otomatis
                                    $set('no_trans', (int)$number);
                                    
                                    // Reset total berat pemasukan saat memilih transaksi baru
                                    // $set('error', 'Error'); // Reset untuk menghindari nilai yang tidak diinginkan
                                }
                            }),
                        Forms\Components\Select::make('customer_id')
                            ->label('Customer')
                            ->relationship('customer', 'nm_customer')
                            ->required(),
                        Forms\Components\Select::make('kd_barang')
                            ->label('Kode Barang')
                            ->relationship('masteremas', 'kd_barang')
                            ->required(),
                        Forms\Components\TextInput::make('discount')
                            ->label('Diskon')
                            ->required()
                            ->numeric(),
                        Forms\Components\Select::make('metode_pembayaran')
                            ->label('Metode Pembayaran')
                            ->relationship('masterpembayarans', 'metode_bayar')
                            ->required(),
                        FileUpload::make('bukti_pembayaran')
                            ->label('Bukti Pembayaran'),
                    // ])
                    // ->addActionLabel('Tambah Data')
                    // ->columns(4)
                    // ->columnSpanFull(),



            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('no_trans')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('customer.nm_customer')->label('Customer'),
                Tables\Columns\TextColumn::make('masteremas.kd_barang')->label('Kode Barang'),
                Tables\Columns\TextColumn::make('discount'),
                Tables\Columns\TextColumn::make('metode_pembayaran')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('masterpembayarans.metode_bayar')->label('Metode Pembayaran'),

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
            'index' => Pages\ListJualEmas::route('/'),
            'create' => Pages\CreateJualEmas::route('/create'),
            'edit' => Pages\EditJualEmas::route('/{record}/edit'),
        ];
    }
}
