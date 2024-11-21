<script setup lang="ts">
import TransactionDetalsImage from "~/resources/images/finance/transaction_details.webp?src";

const formatted = useDateFormat(new Date(), "YYYY-MM-DD");

useHead({
    title: "Finance : Tranaction details",
});

const props = defineProps<{
    wallet_id: number;
    wallet_name: string;
}>();

const status = "complete";
console.log(props.wallet_name);
</script>

<template>
    <SharedCommonOverlay
        :title="'Top Up ' + wallet_name + ' Wallet'"
        class="max-w-xl w-xl _sm:max-w-full"
    >
        <div
            class="flex flex-row-reverse _sm:py-5 rounded-3xl bg-secondary-300 dark:bg-gradient-to-r from-secondary-950 to-secondary-800"
        >
            <div class="font-medium sm:pt-10 px-10 basis-1/2 shrink-0 grow">
                <p class="text-gray-50 text-lg dark:text-gray-100">
                    Transacton Details
                </p>
                <p class="font-normal text-xs dark:text-gray-300 text-gray-100">
                    Breakdown of the Transacton on {{ formatted }}
                </p>
            </div>
            <div class="">
                <img
                    :src="TransactionDetalsImage"
                    class="w-full _sm:hidden h-52 w-auto"
                />
            </div>
        </div>

        <div>
            <SharedCommonCard
                class="flex flex-col gap-5 mt-5 text-sm text-gray-800"
            >
                <div class="flex justify-between _xs:flex-col gap-5">
                    <div class="flex gap-4 items-center">
                        <span class="rounded-full size-10">
                            <img :src="TransactionDetalsImage" />
                    
                        </span><div class="">
                            <p class="font-semibold">Phalco</p>
                            <p class="text-gray-700 text-thin text-xs">
                                transaction process
                            </p>
                        </div>
                    </div><div class="_xs:ml-14">
                        <p class="text-gray-500 text-thin text-xs">
                            Amount  Deducted
                        </p>
                        <p class="font-semibold text-lg">-0.00</p>
                    </div>
                </div>

                <div class="flex gap-2 items-center sm:px-16">
                    <FinanceSucess :is-success="true" />
                    <hr class="bg-teal-700 grow" />
                    <FinanceSucess :is-success="true" />
                    <hr class="bg-teal-700 grow" />
                    <FinanceSucess :is-success="false" />
                </div>

                <div class="flex justify-between">
                    <div class="w-32 text-center">
                        <p class="font-medium text-sm">Sending</p>
                        <p class="fnt-thin text-[10px] text-gray-700 text-wrap">
                            Reference Process completed
                        </p>
                    </div>
                    <div class="w-32 text-center">
                        <p class="font-medium text-sm">Authentication</p>
                        <p class="fnt-thin text-[10px] text-gray-700 text-wrap">
                            Confirmation Process completed
                        </p>
                    </div>
                    <div class="w-32 text-center">
                        <p class="font-medium text-sm">Not Sent</p>
                        <p class="fnt-thin text-[10px] text-gray-700 text-wrap">
                            Not enough funds on wallet
                        </p>
                    </div>
                </div>
            </SharedCommonCard>
        </div>

        <SharedCommonCard class="grid text-xs gap-5 mt-5 mb-10">
            <div class="flex justify-between">
                <p>Transaction Number</p>
                <p class="font-semibold">#67798709887</p>
            </div>
            <div class="flex justify-between">
                <p>Status</p>
                <span
                    :class="
                        status.toLowerCase() === 'completed'
                            ? 'bg-forest-535 text-forest-700'
                            : 'bg-crimson-535 text-crimson-200'
                    "
                    class="px-2 py-1 self-center dark:text-forest-100 inline-flex items-center gap-x-1 text-xs font-medium rounded-full"
                >
                    <SharedCommonIcon
                        v-if="status.toLowerCase() === 'completed'"
                        name="check"
                        class="size-4 rounded-full text-white p-[2px] bg-forest"
                    />
                    <SharedCommonIcon
                        v-else
                        name="close"
                        class="size-4 text-white rounded-full bg-crimson"
                    />
                    {{ status }}
                </span>
            </div>
            <div class="flex justify-between">
                <p>Transaction Date</p>
                <p class="font-semibold">
                    {{ useDateFormat(new Date(), "d MMM YYYY-HH:MM A") }}
                </p>
            </div>
            <div class="flex justify-between">
                <p>Recipient</p>
                <p class="font-semibold">Komla Adzam</p>
            </div>
            <div class="flex justify-between">
                <p>Payment method</p>
                <p class="font-semibold">
                    {{ useDateFormat(new Date(), "d MMM YYYY-HH:MM A") }}
                </p>
            </div>
            <div class="flex justify-between">
                <p>Payment Method</p>
                <span class="size-8">
                    <img :src="TransactionDetalsImage" />
                </span>
            </div>

            <div class="grid gap-5 pt-5">
                <p class="font-semibold">Phalco Bank Details</p>
                <div class="flex justify-between">
                    <p>Completed on</p>
                    <p class="font-semibold">4567</p>
                </div>
                <div class="flex justify-between">
                    <p>Completed on</p>
                    <p class="font-semibold">0896875454</p>
                </div>
            </div>
        </SharedCommonCard>
    </SharedCommonOverlay>
</template>
