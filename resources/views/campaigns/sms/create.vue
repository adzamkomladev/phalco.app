<script setup lang="ts">
useHead({
    title: "Create New SMS Campaigns",
});

const props = defineProps<{
    senders: App.Data.Campaigns.Sms.SenderData[];
    audiences: App.Data.Audiences.AudienceData[];
    wallets: App.Data.Finance.WalletData[];
}>();

const senderOptions = props.senders.map(
    ({ id, sender }: App.Data.Campaigns.Sms.SenderData) => ({
        value: id,
        label: sender,
    }),
);

const walletOptions = props.wallets.map(
    ({ id, name }: App.Data.Finance.WalletData) => ({
        value: id,
        label: name,
    }),
);

const audienceOptions = props.audiences.map(
    ({ id, name }: App.Data.Audiences.AudienceData) => ({
        value: id,
        label: name,
    }),
);
</script>

<template layout="main">
    <div
        class="max-w-[90rem] px-4 text-gray-800 dark:text-gray-300 sm:px-6 lg:px-8 mx-auto"
    >
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">
            Create new <span class="text-primary-300">sms</span> Campaign
        </h2>
        <p class="text-sm text-gray-600 dark:text-gray-400">
            Plan SMS campaigns and preview costs instantly
        </p>

        <div class=""></div>
        <div>
            <div>
                <CampaignsSmsCreateForm
                    :sender-options="senderOptions"
                    :audience-options="audienceOptions"
                    :wallet-options="walletOptions"
                />
            </div>
            <div>
                <!-- cost -->
            </div>
        </div>
    </div>
</template>
