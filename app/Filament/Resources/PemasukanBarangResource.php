<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PemasukanBarangResource\Pages;
use App\Filament\Resources\PemasukanBarangResource\RelationManagers;
use App\Models\PemasukanBarang;
use App\Models\PembelianBarang;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Actions\Button;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Tables;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Notifications\Notification;


class PemasukanBarangResource extends Resource
{
    protected static ?string $model = PemasukanBarang::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form

        ->schema([
            Card::make()
                ->schema([
                    Section::make('Pemasukan Barang')
                        ->schema([
                            Grid::make(2)
                            ->schema([
                                Forms\Components\Select::make('no_trans_id')
                                ->label('No Transaksi')
                                ->options(PembelianBarang::all()->pluck('no_trans', 'id'))
                                ->reactive()
                                ->searchable()
                                ->afterStateUpdated(function ($state, callable $get, callable $set) {
                                    // $totalBerat = PembelianBarang::find($state)->berat_real;
                                    if ($state) {
                                        $totalBerat = PembelianBarang::find($state)?->berat_real;
                                    
                                        // Set total berat pembelian secara otomatis
                                        $set('total_berat_pembelian', $totalBerat);
                                        
                                        // Reset total berat pemasukan saat memilih transaksi baru
                                        // $set('error', 'Error'); // Reset untuk menghindari nilai yang tidak diinginkan
                                    }
                                }),

                                Forms\Components\Select::make('print')
                                ->label('Metode Cetak')
                                ->default('Cetak Nanti')
                                ->native(false)
                                ->options([
                                    'Cetak Nanti' => 'Cetak Nanti',
                                    'Cetak Semua' => 'Cetak Semua',
                                    'Cetak Sebagian' => 'Cetak Sebagian',
                                ]),
                            ]),

                            Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('total_berat_pembelian')
                                    ->label('Total Berat Pembelian')
                                    ->disabled(), // Disable agar tidak bisa diubah manual
                                Forms\Components\TextInput::make('total_berat_pemasukan')
                                    ->label('Total Berat Pemasukan')
                                    ->disabled()
                                    ->rules(['required', 'numeric', 'min:0']),
                            ]),
            
                        ]),
                    Section::make('Detail Barang')
                        ->schema([
                            Repeater::make('pemasukanbarangTransaksi')
                                ->label('Detail Pemasukan')
                                ->relationship()
                                ->schema([
                                    Forms\Components\Select::make('category_id')
                                        ->required()
                                        ->relationship('category', 'kategori'),
                                    Forms\Components\TextInput::make('sub_kategori')
                                        ->required(),
                                    Forms\Components\TextInput::make('name')
                                        ->required(),
                                    Forms\Components\TextInput::make('kadar')
                                        ->required(),
                                    Forms\Components\TextInput::make('berat_bersih')
                                        ->required()
                                        // ->numeric()
                                        ->reactive()
                                        ->rules(['numeric', 'min:0'])
                                        ->afterStateUpdated(function ($state, callable $get, callable $set) {
                                            // Ambil semua item dari repeater
                                            $totalPemasukan = array_sum(array_column($get('../../pemasukanbarangTransaksi'), 'berat_bersih'));
                                            $set('../../total_berat_pemasukan', number_format($totalPemasukan, 3, '.', ','));
                                            $totalPembelian = PembelianBarang::find($get('../../no_trans_id'))?->berat_real ?? 0;

                                            // Validasi agar total berat_pemasukan tidak kurang dari atau melebihi total berat_pembelian
                                            if ((float)$totalPemasukan  !==  (float)$totalPembelian) {
                                                $set('../../total_berat_pemasukan', 'Pastikan jumlah sesuai dengan berat total pemasukan');
                                            }
                                        }),
                                        
                                    Forms\Components\TextInput::make('harga_modal')
                                        ->required()
                                        ->rules(['numeric', 'min:0']),
                                ])
                                ->columns(2)
                                ->createItemButtonLabel('Tambah Item'),
                                
                        ]),
                        
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('pemasukanbarangTransaksi.name')->label('Nama'),
                Tables\Columns\TextColumn::make('pemasukanbarangTransaksi.category.kategori')->label('Kategori'),
                Tables\Columns\TextColumn::make('pemasukanbarangTransaksi.sub_kategori')->label('Sub Kategori'),
                Tables\Columns\TextColumn::make('pemasukanbarangTransaksi.kadar')->label('Kadar'),
                Tables\Columns\TextColumn::make('pemasukanbarangTransaksi.berat_bersih')->label('Berat Bersih'),
                Tables\Columns\TextColumn::make('pemasukanbarangTransaksi.harga_modal')->label('Harga Modal'),
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
            'index' => Pages\ListPemasukanBarangs::route('/'),
            'create' => Pages\CreatePemasukanBarang::route('/create'),
            'edit' => Pages\EditPemasukanBarang::route('/{record}/edit'),
        ];
    }

    public function rules(): array
    {
        return [
            '../../total_berat_pemasukan' => [
                'required',
                'numeric',
                'lte:' . ($this->get('../../total_berat_pembelian') ?? 0), // Aturan untuk validasi
            ],
        ];
    }

    
}
