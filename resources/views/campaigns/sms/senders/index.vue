<script setup lang="ts">
import SmsCampaignSenderImage from "@/images/main/sms_campaign_senders.png?src";

useHead({
    title: "SMS Campaigns Senders",
});

const props = defineProps<{
    senders: App.Data.Campaigns.Sms.SenderData[];
}>();
</script>

<template>
    <SharedCommonOverlay
        class="max-w-xl _sm:max-w-full"
        title="SMS Campaigns Senders"
        size="xl"
    >
        <div class="mb-10">
            <div
                class="flex flex-row-reverse rounded-3xl bg-secondary-300 dark:bg-gradient-to-r from-secondary-950 to-secondary-800"
            >
                <div
                    class="font-medium pr-2 place-self-center basis-1/2 shrink-0 grow"
                >
                    <p class="text-gray-50 text-lg dark:text-gray-100">
                        SMS Campaign Senders
                    </p>
                    <p
                        class="font-normal text-xs dark:text-gray-300 text-gray-100"
                    >
                        Add and view senders of SMS campaign here
                    </p>
                </div>
                <div class="h-52 p-5 _xs:size-40 shrink-0">
                    <img :src="SmsCampaignSenderImage" class="h-full w-auto" />
                </div>
            </div>

            <div>
                <div>
                    {{senders}}
                </div>
                <div>
                    <CampaignsSmsSenderForm />
                </div>
            </div>
        </div>
    </SharedCommonOverlay>
</template>
