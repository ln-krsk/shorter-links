<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LinkResource\Pages;
use App\Models\Campaign;
use App\Models\Customer;
use App\Models\Link;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use LaraZeus\Qr\Facades\Qr;
use Webbingbrasil\FilamentCopyActions\Tables\CopyableTextColumn;

class LinkResource extends Resource
{
    protected static ?string $model = Link::class;

    protected static ?string $navigationIcon = 'heroicon-o-link';
    protected static ?string $navigationLabel = 'Short Links';
    protected static ?int $navigationSort = 1;
    private static $columns;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('')->schema([
                    TextInput::make('url')->label('Ziel-Link')->required()->prefix('https://'),
                    TextInput::make('short_link')->label('Short Link')->default(Str::random(7))->prefix('https://strange.rs/')->required()->maxLength(30)->alphaNum()->unique(ignoreRecord: true),
                    Select::make('customer_id')->label('Kunde')->options(Customer::all()->pluck('name', 'id'))->afterStateUpdated(function (Set $set, $state) {
                        $set('campaign_id', null);
                    })->live(),
                    Select::make('campaign_id')->label('Kampagne')->relationship(name: 'campaign', titleAttribute: 'name')->options(fn (Get $get): Collection => Campaign::query()->where('customer_id', $get('customer_id'))->pluck('name', 'id'))->required(),
                    TextInput::make('description')->label('Beschreibung'),
                ])->columnSpan(3),
                Section::make('Gültigkeit')->schema([
                    DateTimePicker::make('active_from')->label('gültig von:')->inlineLabel()->seconds(false)->native(false)->minDateWithoutRule(today())->columnSpan(2),
                    DateTimePicker::make('expires_at')->label('gültig bis:')->inlineLabel()->seconds(false)->native(false)->after('active_from')->columnSpan(2),
                    TextInput::make('fallback')->default('https://www.wikipedia.org')->columnSpan(2),
                ])->columnSpan(1),
                Section::make('Analyse Parameter')->schema([
                    Fieldset::make('Google Analytics: UTM-Parameter')->schema([
                        TextInput::make('utm_source')->label('utm_source(*)')->inlineLabel()->placeholder('z.B. newsletter')->requiredWith('utm_medium, utm_campaign, utm_ID, utm_name, utm_term, utm_content'),
                        TextInput::make('utm_medium')->label('utm_medium(*)')->inlineLabel()->placeholder('z.B. email')->requiredWith('utm_source, utm_campaign, utm_ID, utm_name, utm_term, utm_content'),
                        TextInput::make('utm_campaign')->label('utm_campaign')->inlineLabel()->placeholder('z.B. kongress_xy'),
                        TextInput::make('utm_id')->label('utm_ID')->inlineLabel()->placeholder(''),
                        TextInput::make('utm_name')->label('utm_name')->inlineLabel()->placeholder(''),
                        TextInput::make('utm_term')->label('utm_term')->inlineLabel()->placeholder(''),
                        TextInput::make('utm_content')->label('utm_content')->inlineLabel()->placeholder(''),
                    ])->columns()->dehydrated(),
                    TextInput::make('individual_param')->label('Individuelle Parameter')->placeholder('z.B. ref=123')->dehydrated(),
                ])->columnSpan(3),
            ])->columns(4);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('campaign.customer.name')->label('Kunde')->searchable()->sortable(),
                TextColumn::make('campaign.name')->label('Kampagne')->searchable()->sortable(),
                CopyableTextColumn::make('')->label('Short-URL')->default(function ($record) {
                    return $record->assembledShortUrl();
                })->searchable(['domain', 'short_link']),
                TextColumn::make('url')->label('Ziel-Link')->searchable()->sortable()->wrap()->limit(40)->tooltip(function (TextColumn $column): ?string {
                    $state = $column->getState();

                    if (strlen($state) <= $column->getCharacterLimit()) {
                        return null;
                    }

                    // Only render the tooltip if the column content exceeds the length limit.
                    return $state;
                }),

                TextColumn::make('parameter')->label('Parameter')->wrap()->limit(30)->tooltip(function (TextColumn $column): ?string {
                    $state = $column->getState();

                    if (strlen($state) <= $column->getCharacterLimit()) {
                        return null;
                    }

                    return Str::wordWrap($state, 42, ' ', true);
                }),
                TextColumn::make('description')->label('Beschreibung')->searchable()->words(10)->tooltip(function (TextColumn $column): ?string {
                    $state = $column->getState();

                    if (strlen($state) <= $column->getCharacterLimit()) {
                        return null;
                    }

                    return $state;
                }),
                TextColumn::make('fallback')->searchable()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('user.name')->label('Erstellt von')->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('active_from')->label('gültig von')->date()->sortable()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('expires_at')->label('gültig bis')->date()->sortable()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('status')->label('Status')->default(function ($record) {
                    return $record->getStatus();
                })->badge()->color(fn ($state, $record): string => match ($record->getStatus()) {
                    'active' => 'success',
                    'upcoming' => 'warning',
                    'expired' => 'danger',
                }),
                TextColumn::make('redirect_count')->label('Aufrufe')->sortable(),
            ])
            ->filters([
            ])
            ->actions([
                EditAction::make()->label('')->icon('heroicon-o-pencil-square')->color('black'),
                Action::make('qr-action')->label('')->icon('heroicon-o-qr-code')->color('black')
                    ->fillForm(fn (Model $record) => [
                        'qr-options' => Qr::getDefaultOptions(),
                    ])
                    ->form(function ($record) {
                        return Qr::getFormSchema('Shortlink', 'qr-options', 'https://'.$record->assembledShortUrl());
                    }),
                DeleteAction::make()->label(''),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLinks::route('/'),
            'create' => Pages\CreateLink::route('/create'),
            'edit' => Pages\EditLink::route('/{record}/edit'),
            'view' => Pages\ViewLink::route('/{record}'),
        ];
    }
}
