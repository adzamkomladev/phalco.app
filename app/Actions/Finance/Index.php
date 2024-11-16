<?php

namespace App\Actions\Finance;

use App\Models\Organization;
use App\Tables\Finance\PaymentsTable;
use App\Tables\Finance\TransactionsTable;
use Illuminate\Support\Facades\DB;
use Laravel\Octane\Facades\Octane;
use Lorisleiva\Actions\Concerns\AsAction;

use function Hybridly\view;

class Index
{
    use AsAction;

    public function asController()
    {
        try {
            return view('finance.index', $this->handle(request()->user()->selected_organization_id));
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function handle(int $organizationId)
    {
        $organization = Organization::find($organizationId);

        [
            $main,
            $nominations,
            $donations,
            $totalTransactions,
            $transactionTypes
        ] = Octane::concurrently([
                fn() => [
                'id' => $organization->wallet->id,
                'balance' => ($organization->balanceInt ?? 0) / 100,
            ],
            fn() => [
                'id' => $organization->getWallet('nominations')?->id,
                'balance' => ($organization->getWallet('nominations')?->balanceInt ?? 0) / 100,
            ],
            fn() => [
                'id' => $organization->getWallet('donations')?->id,
                'balance' => ($organization->getWallet('donations')?->balanceInt ?? 0) / 100,
            ],
            fn() => $organization->transactions()->count(),
            fn() => $organization->transactions()
                ->select('type', DB::raw('SUM(amount::integer) as total_sales'))
                ->where('confirmed', true)
                ->whereIn('type', ['deposit', 'withdraw'])
                ->groupBy('type')
                ->get(),
        ]);

        $totalBalance = $main['balance'] + $nominations['balance'] + $donations['balance'];

        return [
            'wallets' => [
                'main' => $main,
                'nominations' => $nominations,
                'donations' => $donations,
            ],
            'stats' => [
                'balance' => $totalBalance,
                'transactions' => $totalTransactions,
                'deposits' => abs($transactionTypes->where('type', 'deposit')->first()?->total_sales ?? 0) / 100,
                'withdrawals' => abs($transactionTypes->where('type', 'withdraw')->first()?->total_sales ?? 0) / 100,
            ],
            'transactions' => TransactionsTable::make(['organizationId' => $organizationId]),
            'payments' => PaymentsTable::make(['organizationId' => $organizationId]),
        ];
    }
}
