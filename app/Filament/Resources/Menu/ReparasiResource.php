<?php

namespace App\Filament\Resources\Menu;

use App\Filament\Resources\Menu\ReparasiResource\Pages;
use App\Filament\Resources\Menu\ReparasiResource\RelationManagers;
use App\Models\Reparasi;
use App\Models\JualEmas;
use Closure;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReparasiResource extends Resource
{
    protected static ?string $model = Reparasi::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('no_nota')
                    ->label('Nomor Nota')
                    ->maxLength(255)
                    ->live(onBlur:true)
                    // ->rule(static function (Forms\Get $get,Forms\Set $set, Forms\Components\Component $component): Closure {
                    //     return static function (string $attribute, $value, Closure $fail) use ($get, $set, $component) {
                    //         $existingCategory = JualEmas::where('no_trans', $get('no_nota'))
                    //             ->first();

                    //         if ($existingCategory && $existingCategory->getKey() !== $component->getRecord()?->getKey()) {
                    //             $type = ucwords($get('no_nota'));
                    //             $fail("Gratis {$type} 1x Cuci");
                    //             $set('biaya_reparasi', 0);
                    //         }

                    //     };
                    // })
                    // ->afterStateUpdated(function (Forms\Contracts\HasForms $livewire, Forms\Components\TextInput $component) {
                    //     $livewire->validateOnly($component->getStatePath());
                    // }),
                    ->afterStateUpdated(function (Forms\Get $get,Forms\Set $set, $state, Forms\Components\TextInput $component) {
                        $no_trans = JualEmas::where('no_trans', $get('no_nota'))->first();
                        $no_nota = Reparasi::where('no_nota', $get('no_nota'))->first();
                        if ($no_trans && !$no_nota) {
                            $set('biaya_reparasi', 0);
                        }
                    }),
                Forms\Components\Select::make('tipe_reparasi')
                    ->label('Tipe Reparasi')
                    ->options([
                        'Cuci' => 'Cuci',
                        'Putus' => 'Putus',
                    ]),
                Forms\Components\TextInput::make('nama_barang')
                    ->label('Nama Barang')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('berat_kotor')
                    ->label('Berat Kotor')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('biaya_reparasi')
                    ->label('Biaya Reparasi')
                    ->numeric(),

                Forms\Components\Select::make('status_diambil')
                    ->label('Status Diambil')
                    ->required()
                    ->options([
                        'Sudah Diambil' => 'Sudah Diambil',
                        'Belum Diambil' => 'Belum Diambil',
                    ]),

                Forms\Components\Select::make('status_pembayaran')
                    ->label('Status Pembayaran')
                    ->required()
                    ->options([
                        'Pending' => 'Pending',
                        'Lunas' => 'Lunas',
                    ]),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('no_nota')->label('No Nota')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('tipe_reparasi')->label('Tipe Reparasi')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('nama_barang')->label('Nama Barang')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('berat_kotor')->label('Berat Kotor'),
                Tables\Columns\BadgeColumn::make('biaya_reparasi')->label('Biaya Reparasi')->color(static function ($state): string {
                    if ($state === 0) {
                        return 'success';
                    }

                    return 'secondary';
                }),
                Tables\Columns\TextColumn::make('status_diambil')->label('Status Diambil')->sortable()->searchable(),
                Tables\Columns\BadgeColumn::make('status_pembayaran')
                ->colors([
                    'warning' => static fn ($state): bool => $state === 'Pending',
                    'success' => static fn ($state): bool => $state === 'Lunas',
                ])
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
            'index' => Pages\ListReparasis::route('/'),
            'create' => Pages\CreateReparasi::route('/create'),
            'edit' => Pages\EditReparasi::route('/{record}/edit'),
        ];
    }
}
