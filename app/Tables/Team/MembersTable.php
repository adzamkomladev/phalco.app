<?php

namespace App\Tables\Team;

use App\Models\User;
use Hybridly\Refining\Filters\CallbackFilter;
use Hybridly\Refining\Sorts;
use Hybridly\Tables\Columns;
use Hybridly\Tables\Table;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Builder as InternalBuilder;

final class MembersTable extends Table
{
    protected string $model = User::class;

    protected function defineColumns(): array
    {
        return [
            Columns\TextColumn::make('id')->label('#')->visible(false),
            Columns\TextColumn::make('name')
                ->label('Name')
                ->transformValueUsing(fn (User $user) => $user->name)
                ->extra((fn (User $user) => [
                    'id' => $user->id,
                    'email' => $user->email,
                    'avatar' => $user->avatar,
                ])),
            Columns\TextColumn::make('position')->label('Position')
                ->transformValueUsing(fn (User $user) => $user->organizationMemberships->first()->roleTitle)
                ->extra((fn (User $user) => [
                    'role' => $user->organizationMemberships->first()->role->name,
                ])),
            Columns\TextColumn::make('status')->label('Status')
                ->transformValueUsing(fn (User $user) => $user->organizationMemberships->first()->status),
            Columns\TextColumn::make('last_seen')->label('Last Seen')
                ->transformValueUsing(fn (User $user) => $user->organizationMemberships->first()->created_at->diffForHumans()),
            Columns\TextColumn::make('added_on')->label('Added On')
                ->transformValueUsing(fn (User $user) => $user->organizationMemberships->first()->created_at->diffForHumans()),

        ];
    }

    protected function defineRefiners(): array
    {
        return [
            Sorts\Sort::make('id'),
            CallbackFilter::make(
                name: 'search',
                callback: function (InternalBuilder $builder, mixed $value, string $property) {
                    $builder->whereAny([
                        'first_name',
                        'last_name',
                        'email',
                        'phone',
                    ], 'ilike', "%{$value}%");
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
            ->whereRelation('organizationMemberships', 'organization_id', $selectedOrganizationId)
            ->with([
                'organizationMemberships' => fn ($query) => $query->where('organization_id', $selectedOrganizationId),
            ]);
    }
}
