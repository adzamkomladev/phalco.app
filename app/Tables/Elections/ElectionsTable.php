<?php

namespace App\Tables\Elections;

use App\Models\Election;
use Hybridly\Refining\Filters\CallbackFilter;
use Hybridly\Refining\Sorts;
use Hybridly\Tables\Columns;
use Hybridly\Tables\Table;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Builder as InternalBuilder;

final class ElectionsTable extends Table
{
    protected string $model = Election::class;

    protected function defineColumns(): array
    {
        return [
            Columns\TextColumn::make('id')->label('#')->visible(false),
            Columns\TextColumn::make('name')
                ->label('Name')
                ->extra((fn(Election $election) => [
                    'id' => $election->id,
                    'creator' => $election->createdBy->name,
                    'logo' => $election->logo,
                ])),
            Columns\TextColumn::make('status')->label('Status'),
            Columns\TextColumn::make('current_stage')->label('Current Stage')
                ->transformValueUsing(fn(Election $election) => 'voting'),
            Columns\TextColumn::make('created_at')->label('Created')
                ->transformValueUsing(fn(Election $election) => $election->created_at->diffForHumans()),
        ];
    }

    protected function defineRefiners(): array
    {
        return [
            Sorts\Sort::make('created_at'),
            CallbackFilter::make(
                name: 'search',
                callback: function (InternalBuilder $builder, mixed $value, string $property) {
                    $builder->whereAny(['name'], 'ilike', "%{$value}%");
                }
            ),
        ];
    }

    protected function defineActions(): array
    {
        return [];
    }

    protected function defineQuery(): Builder
    {
        $selectedOrganizationId = auth()->user()->selected_organization_id;
        return $this->getModel()
            ->query()
            ->select(['id', 'user_id', 'organization_id', 'name', 'status', 'logo', 'created_at'])
            ->with(['createdBy:id,first_name,last_name,selected_organization_id'])
            ->where('organization_id', $selectedOrganizationId);
    }
}
