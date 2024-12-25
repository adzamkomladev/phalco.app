<?php

namespace App\Tables\Audiences;

use App\Models\Audience;
use Hybridly\Refining\Filters\CallbackFilter;
use Hybridly\Refining\Sorts;
use Hybridly\Tables\Columns;
use Hybridly\Tables\Table;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Builder as InternalBuilder;

final class AudiencesTable extends Table
{
    protected string $model = Audience::class;

    public function __construct(public readonly int $organizationId) {}

    protected function defineColumns(): array
    {
        return [
            Columns\TextColumn::make('id')->label('#')->visible(false),
            Columns\TextColumn::make('name')->label('Name')
                ->extra((fn (Audience $audience) => [
                    'id' => $audience->id,
                ])),
            Columns\TextColumn::make('created_by')
                ->label('Created By')
                ->transformValueUsing(fn (Audience $audience) => $audience->createdBy->name)
                ->extra((fn (Audience $audience) => [
                    'avatar' => $audience->createdBy->avatar,
                ])),
            Columns\TextColumn::make('status')->label('Status'),
            Columns\TextColumn::make('total_contacts')->label('Total Contacts')
            // ->transformValueUsing(fn (Audience $audience) => $audience->contacts_count),
            ->transformValueUsing(fn(Audience $audience) => 0),
            Columns\TextColumn::make('description')->label('Description'),
            Columns\TextColumn::make('created_at')->label('Created')
                ->transformValueUsing(fn (Audience $audience) => $audience->created_at->diffForHumans()),
        ];
    }

    protected function defineRefiners(): array
    {
        return [
            Sorts\Sort::make('created_at'),
            CallbackFilter::make(
                name: 'search',
                callback: function (InternalBuilder $builder, mixed $value, string $property) {
                    $builder->whereAny(['name', 'status'], 'ilike', "%{$value}%");
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
        return $this->getModel()
            ->query()
            ->select(['id', 'user_id', 'organization_id', 'name', 'status', 'description', 'created_at'])
            ->with(['createdBy:id,first_name,last_name,avatar,selected_organization_id'])
            // ->withCount('contacts')
            ->where('organization_id', $this->organizationId);
    }
}
