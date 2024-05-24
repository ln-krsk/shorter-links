<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Help extends Page
{
    protected static ?int $navigationSort = 4;
    protected static ?string $navigationIcon = 'heroicon-o-information-circle';
    protected static ?string $navigationLabel = 'Hilfe';

    protected static string $view = 'filament.pages.help';
    protected static ?string $title = 'Hilfe und Informationen';
    protected ?string $subheading = 'zur Erstellung von Kurz-Links und zur Verwendung von Tracking- und Analyseparametern';
}
