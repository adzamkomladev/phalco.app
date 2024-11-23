<?php

namespace App\Tables\Finance;

use Bavix\Wallet\Models\Transaction;
use Hybridly\Refining\Filters\CallbackFilter;
use Hybridly\Refining\Sorts;
use Hybridly\Tables\Columns;
use Hybridly\Tables\Table;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Builder as InternalBuilder;

final class TransactionsTable extends Table
{
    protected string $model = Transaction::class;

    public function __construct(public readonly int $organizationId) {}

    protected function defineColumns(): array
    {
        return [
            Columns\TextColumn::make('id')->label('#')->visible(false),
            Columns\TextColumn::make('amount')
                ->label('Amount')
                ->transformValueUsing(fn (Transaction $transaction) => $transaction->amountInt / 100)
                ->extra((fn (Transaction $transaction) => ['id' => $transaction->id])),
            Columns\TextColumn::make('wallet')->label('Wallet')
                ->transformValueUsing(fn (Transaction $transaction) => $transaction->wallet->name)
                ->extra((fn (Transaction $transaction) => ['wallet_id' => $transaction->wallet_id])),
            Columns\TextColumn::make('type')->label('Type')
                ->transformValueUsing(fn (Transaction $transaction) => $transaction->type),
            Columns\TextColumn::make('created')->label('Created')
                ->transformValueUsing(fn (Transaction $transaction) => $transaction->created_at),
        ];
    }

    protected function defineRefiners(): array
    {
        return [
            Sorts\Sort::make('created'),
            CallbackFilter::make(
                name: 'search',
                callback: function (InternalBuilder $builder, mixed $value, string $property) {
                    $builder->whereAny([
                        'type',
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
            ->whereRelation('wallet', 'holder_id', $this->organizationId)
            ->with(['wallet']);
    }
}
