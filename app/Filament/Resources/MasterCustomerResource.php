<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MasterCustomerResource\Pages;
use App\Filament\Resources\MasterCustomerResource\RelationManagers;
use App\Models\MasterCustomer;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\DatePicker;


class MasterCustomerResource extends Resource
{
    protected static ?string $model = MasterCustomer::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Customer';

    protected static ?string $navigationGroup = 'Master';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('nm_customer')
                    ->label('Nama Customer')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('no_hp')
                    ->label('No Hp.')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('no_hp2')
                    ->label('No Hp (Optional)')
                    ->numeric(),
                Forms\Components\TextInput::make('no_hp3')
                    ->label('No Hp (Optional)')
                    ->numeric(),
                Forms\Components\Textarea::make('address')
                    ->label('Alamat')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('tgl_lahir')
                    ->label('Tanggal Lahir')
                    ->native(false),
                    // ->displayFormat('dd/mm/YYYY'),
                Forms\Components\TextInput::make('bank')
                    ->label('Nama Bank')
                    ->maxLength(50),
                Forms\Components\TextInput::make('atas_nama')
                    ->label('Atas Nama')
                    ->maxLength(100),
                Forms\Components\TextInput::make('no_rekening')
                    ->label('No Rekening')
                    ->required()
                    ->numeric(),
                    Forms\Components\TextInput::make('point_member')
                    ->label('Point Member')
                    ->required()
                    ->numeric()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('nm_customer')->label('Nama Customer')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('no_hp')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('address')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('tgl_lahir')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('no_rekening')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('point_member'),
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
            'index' => Pages\ListMasterCustomers::route('/'),
            'create' => Pages\CreateMasterCustomer::route('/create'),
            'edit' => Pages\EditMasterCustomer::route('/{record}/edit'),
        ];
    }
}
