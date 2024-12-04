<script setup lang="ts">
import WithdrawalImage from "~/resources/images/finance/withdrawal.webp?src";

useHead({
    title: "Withdraw From Wallet",
});

const props = defineProps<{
    walletId: number;
    walletName: string;
    methods: App.Data.Finance.PaymentMethodData[];
}>();

const form = useForm({
    method: "POST",
    url: route("finance.payments.initiate"),
    fields: {
        amount: 0,
        wallet_id: props.walletId,
    },
    hooks: {
        success: () => form.reset(),
    },
});

const submitted = ref(false);

</script>

<template>
    <SharedCommonOverlay
        :title="'Withdraw from ' + walletName + ' Wallet'"
        class="max-w-xl w-xl _sm:max-w-full"
    >
        <div
            class="flex flex-row-reverse rounded-3xl bg-secondary-300 dark:bg-gradient-to-r from-secondary-950 to-secondary-800"
        >
            <div class="font-medium pt-10 px-10 basis-1/2 shrink-0 ">
                <p class="text-gray-50 text-lg dark:text-gray-100">
                    Withdrawal from Wallet
                </p>
                <p class="font-normal text-xs dark:text-gray-300 text-gray-100">
                    Select or create a new payment method for the withdrawal
                    process
                </p>
            </div>
            <div class="">
                <img
                    :src="WithdrawalImage"
                    class="w-full _sm:hidden h-52 w-auto"
                />
            </div>
        </div>

        <transition>
            <div class="my-10" v-if="!submitted">
                <form @submit.prevent="form.submit">
                    <div class="">
                        <div class="s">
                            <SharedFormBaseInput
                                v-model="form.fields.amount"
                                :error="form.errors.amount"
                                id="amount"
                                name="amount"
                                type="number"
                                placeholder="Amount to top up"
                                :min="0"
                            />
                        </div>
                    </div>
                    <div class="grid gap-4 pt-5 font-semibold">
                        <div>
                            <p>Select Payment method</p>
                        </div>

                        <div
                            v-for="(method, index) in methods"
                            :key="index"
                            @click.prevent="form.fields.wallet_id= method.id"
                            type="submit"
                          :class="[ form?.fields?.wallet_id===method?.id ?'bg-secondary-400 shaddow text-white':'hover:bg-slate-50 text-gray-700 focus:text-gray-700 bg-white cursor-pointer']"
                            class="w-full  justify-between font-black text-gray-600  transition-all  shadow-card focus:text-white    h-16 _md:h-16 py-2 px-4 flex items-center gap-x-2 text-base xl:text-lg rounded-lg border-2 border-transparent   hover:opacity-90 focus:outline-none  disabled:opacity-50 disabled:pointer-events-none"
                        >
                            <div class="flex gap-4  ">
                               <div class="size-10 rounded-md bg-[#F5F5F5fe] p-[5px]">                        <SharedCommonIcon class="size-full" :name="method.network_code || method.bank_code" />

                               </div>
                                <div class="flex flex-col  text-left">
                                    <span class="font-semi-bold text-sm" :style="''">
                                        {{ method.account_name }}
                                    </span>
                                    <span class="font-thin text-xs  ">
                                        {{ method.account_number }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <SharedCommonCard class="grid gap-4 mt-10">
                        <p class="flex justify-between">
                            <span>Amount</span>
                            <span class="font-thin text-xs">${{form.fields.amount}}</span>
                        </p>
                        <p class="flex justify-between">
                            <span>Withdrawal fee</span>
                            <span class="font-thin text-xs">$0</span>
                        </p>
                        <p class="flex justify-between">
                            <span>Total</span>
                            <span class="font-thin text-xs">${{form.fields.amount}}</span>
                        </p>
                    </SharedCommonCard>

                    <div class="mt-10 flex justify-end gap-x-2">
                        <SharedFormSubmitButton
                            text="Make Payment"
                            :loading="form.processing"
                        />
                    </div>
                </form>
            </div>

            <!-- <FinanceWithdrawConfirm v-else /> -->
        </transition>
    </SharedCommonOverlay>
</template>
