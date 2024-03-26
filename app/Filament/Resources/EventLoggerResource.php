<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventLoggerResource\Pages;
use App\Filament\Resources\EventLoggerResource\RelationManagers;
use App\Models\EventLogger;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EventLoggerResource extends Resource
{
    protected static ?string $model = EventLogger::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            Forms\Components\TextInput::make('id_ralok')
                ->required(),
            Forms\Components\TextInput::make('section')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('event')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('status')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('area')
                ->required()
                ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id_ralok')
                ->searchable(),
                Tables\Columns\TextColumn::make('section'),
                Tables\Columns\TextColumn::make('event'),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('area'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
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
            'index' => Pages\ListEventLoggers::route('/'),
            'create' => Pages\CreateEventLogger::route('/create'),
            'edit' => Pages\EditEventLogger::route('/{record}/edit'),
        ];
    }
}
