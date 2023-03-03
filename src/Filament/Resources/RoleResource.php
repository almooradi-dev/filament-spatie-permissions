<?php

namespace Almooradi\FilamentSpatiePermissions\Filament\Resources;

use Almooradi\FilamentSpatiePermissions\Filament\Resources\RoleResource\Pages\CreateRole;
use Almooradi\FilamentSpatiePermissions\Filament\Resources\RoleResource\Pages\EditRole;
use Almooradi\FilamentSpatiePermissions\Filament\Resources\RoleResource\Pages\ListRoles;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

class RoleResource extends Resource
{
    // TODO: Permissions seeder

    protected static ?string $model = Role::class;

    protected static ?string $navigationGroup = 'Roles & Permissions';

    protected static ?string $navigationIcon = 'heroicon-o-lock-closed';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(1)
                    ->schema([
                        // ...
                        TextInput::make('name')
                            ->required()
                            ->maxLength(191)
                            ->unique(ignoreRecord: true)
                            ->autofocus(),
                        TextInput::make('guard')
                            ->hidden()
                            ->default('web'),
                        CheckboxList::make('permissions')
                            ->relationship('permissions', 'name')
                            ->getOptionLabelFromRecordUsing(fn (Model $record) => str_replace('.', ' → ', $record->name))
                            ->columns(2)
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => ListRoles::route('/'),
            'create' => CreateRole::route('/create'),
            'edit' => EditRole::route('/{record}/edit'),
        ];
    }
}
