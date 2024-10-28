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

    protected function defineColumns(): array
    {
        return [
            Columns\TextColumn::make('id')->label('#')->visible(false),
            Columns\TextColumn::make('amount')
                ->label('Amount')
                ->transformValueUsing(fn (Payment $payment) => $payment->amount / 100)
                ->extra((fn (Payment $payment) => ['id' => $payment->id])),
            Columns\TextColumn::make('reference')->label('Reference')
                ->transformValueUsing(fn (Payment $payment) => $payment->reference),
            Columns\TextColumn::make('gateway_reference')->label('Gateway Reference')
                ->transformValueUsing(fn (Payment $payment) => $payment->gateway_reference),
            Columns\TextColumn::make('gateway')->label('Gateway')
                ->transformValueUsing(fn (Payment $payment) => $payment->gateway),
            Columns\TextColumn::make('status')->label('Status')
                ->transformValueUsing(fn (Payment $payment) => $payment->status),
            Columns\TextColumn::make('created')->label('Created')
                ->transformValueUsing(fn (Payment $payment) => $payment->created_at),
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
        $selectedOrganizationId = auth()->user()->selected_organization_id;

        return $this->getModel()
            ->query()
            ->where('organization_id', $selectedOrganizationId);
    }
}
