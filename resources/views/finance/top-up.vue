<script setup lang="ts">
useHead({
    title: "Top Up Wallet",
});

const props = defineProps<{
    wallet_id: number;
    wallet_name: string;
}>();

console.log(props.wallet_name);

const form = useForm({
    method: "POST",
    url: route("finance.payments.initiate"),
    fields: {
        amount: 0,
        wallet_id: props.wallet_id,
    },
    hooks: {
        success: () => console.log("34jdfkdjfkdjkfjdkfjdjfkjk"),
    },
});
</script>

<template>
    <SharedCommonOverlay :title="'Top Up ' + wallet_name + ' Wallet'" size="xl">
        <div class="mt-5">
            <form @submit.prevent="form.submit">
                <div class="grid sm:grid-cols-12 gap-2 sm:gap-6">
                    <div class="sm:col-span-3">
                        <label
                            for="amount"
                            class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200"
                        >
                            Amount
                        </label>
                    </div>

                    <div class="sm:col-span-9">
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

                <div class="mt-8 flex justify-end gap-x-2">
                    <button
                        type="submit"
                        class="w-3/12 py-2 px-3 items-center gap-x-2 text-sm text-center font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                    >
                        <span
                            v-if="form.processing"
                            class="animate-spin inline-block size-4 border-[3px] border-current border-t-transparent text-white rounded-full"
                            role="status"
                            aria-label="loading"
                        ></span>

                        Make Payment
                    </button>
                </div>
            </form>
        </div>
    </SharedCommonOverlay>
</template>
