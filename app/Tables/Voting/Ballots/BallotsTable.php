<?php

namespace App\Tables\Voting\Ballots;

use App\Models\Ballot;
use Hybridly\Refining\Filters\CallbackFilter;
use Hybridly\Refining\Sorts;
use Hybridly\Tables\Columns;
use Hybridly\Tables\Table;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Builder as InternalBuilder;

final class BallotsTable extends Table
{
    protected string $model = Ballot::class;

    public function __construct(public readonly ?int $electionId) {}

    protected function defineColumns(): array
    {
        return [
            Columns\TextColumn::make('id')->label('#')->visible(false),
            Columns\TextColumn::make('position')->label('Position')
                ->extra((fn(Ballot $ballot) => ['id' => $ballot->id])),
            Columns\TextColumn::make('code')->label('Code'),
            Columns\TextColumn::make('options')->label('Ballot Options')
            ->transformValueUsing(fn(Ballot $ballot) => $ballot->options_count ?? 0),
            Columns\TextColumn::make('election')->label('Election')
                ->transformValueUsing(fn(Ballot $ballot) => $ballot->election?->name),
            Columns\TextColumn::make('status')->label('Status'),
            Columns\TextColumn::make('created_at')->label('Created')
                ->transformValueUsing(fn(Ballot $ballot) => $ballot->created_at->diffForHumans()),

        ];
    }

    protected function defineRefiners(): array
    {
        return [
            Sorts\Sort::make('created_at'),
            CallbackFilter::make(
                name: 'search',
                callback: function (InternalBuilder $builder, mixed $value, string $property) {
                    $builder->whereAny([
                        'position',
                        'code',
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
        return $this->getModel()
            ->query()
            ->with('election:id,name')
            ->withCount('options')
        ->where('election_id', $this->electionId);
    }
}
