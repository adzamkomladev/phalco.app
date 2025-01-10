<script lang="ts" setup></script>

<template>
    <div class="my-10">
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
                    />
                </div>
            </div>
            <div class="grid gap-4 pt-5 font-semibold">
                <div>
                    <p>Select Payment method</p>
                </div>

                <button
                    v-for="l in 3"
                    :key="l"
                    @click.prevent="$emit('select', payment_method)"
                    type="submit"
                    class="w-full justify-between font-black text-gray-600 shadow-card focus:text-white gap-20 border-[#E3E4E6] hover:border-gray-400 h-16 _md:h-16 py-2 px-4 flex items-center gap-x-2 text-base xl:text-lg rounded-lg border-2 border-transparent active:opacity-90 hover:bg-gray-50 hover:opacity-90 focus:outline-none focus:bg-primary-400 disabled:opacity-50 disabled:pointer-events-none"
                >
                    <div class="flex gap-4 items-center">
                        <img class="size-10" :src="WithdrawalImage" />
                        <div class="flex flex-col">
                            <span class="font-semi-bold text-sm"
                                >Komla Azam
                            </span>
                            <span class="font-thin text-xs ml-3"
                                >011222333344444
                            </span>
                        </div>
                    </div>
                </button>
            </div>

            <SharedCommonCard class="grid gap-4 mt-10">
                <p class="flex justify-between">
                    <span>Amount</span>
                    <span class="font-thin text-xs">$789</span>
                </p>
                <p class="flex justify-between">
                    <span>Withdrawal fee</span>
                    <span class="font-thin text-xs">$789</span>
                </p>
                <p class="flex justify-between">
                    <span>Total</span>
                    <span class="font-thin text-xs">$789</span>
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
</template>
