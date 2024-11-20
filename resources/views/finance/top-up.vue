<script setup lang="ts">
import TopUpImage from "~/resources/images/finance/top_up.webp?src";

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
    <SharedCommonOverlay
        :title="'Top Up ' + wallet_name + ' Wallet'"
        class="max-w-xl w-xl _sm:max-w-full"
    >
        <div
            class="flex flex-row-reverse rounded-3xl bg-secondary-300 dark:bg-gradient-to-r from-secondary-950 to-secondary-800"
        >
            <div class="font-medium pt-10 px-10 basis-1/2 shrink-0 grow">
                <p class="text-gray-50 text-lg dark:text-gray-100">
                    Top Up Your Account
                </p>
                <p class="font-normal text-xs dark:text-gray-300 text-gray-100">
                    Select or create a new account for withdwaral purposes
                </p>
            </div>
            <div class="">
                <img :src="TopUpImage" class="w-full _sm:hidden h-52 w-auto" />
            </div>
        </div>

        <div class="mt-10">
            <form @submit.prevent="form.submit">
                <div class="gap-2 sm:gap-6">
                    <div class="">
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

                <div class="mt-10 flex justify-end gap-x-2">
                    <SharedFormSubmitButton text="Top Up" />
                </div>
            </form>
        </div>
    </SharedCommonOverlay>
</template>
