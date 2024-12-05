<?php

namespace App\Tables\Finance;

use App\Models\Payment;
use Hybridly\Refining\Filters\CallbackFilter;
use Hybridly\Refining\Sorts;
use Hybridly\Tables\Columns;
use Hybridly\Tables\Table;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Builder as InternalBuilder;

final class PaymentsTable extends Table
{
    protected string $model = Payment::class;

    public function __construct(public readonly int $organizationId) {}

    protected function defineColumns(): array
    {
        return [
            Columns\TextColumn::make('id')->label('#')->visible(false),
            Columns\TextColumn::make('account')
                ->label('Account')
                ->transformValueUsing(fn(Payment $payment) => $payment->madeBy->name)
                ->extra((fn(Payment $payment) => [
                    'avatar' => $payment->madeBy->avatar,
                    'description' => $payment->description
                ])),
            Columns\TextColumn::make('amount')
                ->label('Amount')
                ->transformValueUsing(fn(Payment $payment) => $payment->amount / 100)
                ->extra((fn(Payment $payment) => ['id' => $payment->id])),
            Columns\TextColumn::make('gateway_reference')->label('Reference'),
            Columns\TextColumn::make('gateway')->label('Type'),
            Columns\TextColumn::make('status')->label('Status'),
            Columns\TextColumn::make('created_at')->label('Created'),
        ];
    }

    protected function defineRefiners(): array
    {
        return [
            Sorts\Sort::make('created_at')->default('desc'),
            CallbackFilter::make(
                name: 'search',
                callback: function (InternalBuilder $builder, mixed $value, string $property) {
                    $builder->whereAny([
                        'status',
                        'reference',
                        'gateway_reference',
                        'gateway',
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
            ->with(['madeBy:id,first_name,last_name,avatar,selected_organization_id'])
            ->where('organization_id', $this->organizationId);
    }
}
