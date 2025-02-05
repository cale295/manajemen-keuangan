<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransactionResource\Pages;
use App\Filament\Resources\TransactionResource\RelationManagers;
use App\Models\Transaction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TransactionResource extends Resource
{
    protected static ?string $model = Transaction::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->label('Judul Transaksi'),
                Forms\Components\Select::make('category_id')
                    ->relationship('category', 'name') // Gantilah dengan relasi yang benar
                    ->required()
                    ->label('Kategori'),
                Forms\Components\Select::make('type')
                    ->options([
                        'income' => 'Pendapatan',
                        'expense' => 'Pengeluaran',
                    ])
                    ->required()
                    ->label('Jenis'),
                Forms\Components\TextInput::make('amount')
                    ->numeric()
                    ->required()
                    ->label('Jumlah'),
                Forms\Components\DatePicker::make('transaction_date')
                    ->required()
                    ->label('Tanggal Transaksi'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul'),
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Kategori'),
                Tables\Columns\TextColumn::make('type')
                    ->label('Jenis'),
                Tables\Columns\TextColumn::make('amount')
                    ->label('Jumlah')
                    ->money('IDR', true),
                Tables\Columns\TextColumn::make('transaction_date')
                    ->label('Tanggal Transaksi'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListTransactions::route('/'),
            'create' => Pages\CreateTransaction::route('/create'),
            'edit' => Pages\EditTransaction::route('/{record}/edit'),
        ];
    }
}
