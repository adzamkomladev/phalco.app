<script setup lang="ts">
import useAudiences from "@/composables/audiences";

useHead({
    title: "Audience Details",
});

const props = defineProps<{
    audience: App.Data.Audiences.AudienceData;
    contacts: Table<{
        id: number;
        name: string;
        phone: string;
        email: string;
        address: string;
        city: string;
        created_at: string;
    }>;
    stats: App.Data.MiniCardStatData[];
    notifications: App.Data.Audiences.Show.NotificationData[];
}>();
const table = useTable(props, "contacts");

const { setupNotifications } = useAudiences();

onMounted(() =>
    setupNotifications(props.notifications, (data) =>
        console.log("Received notification", data),
    ),
);
</script>

<template layout="main">
    <div
        class="max-w-[85rem] px-4 text-gray-800 dark:text-gray-300 sm:px-6 lg:px-8 mx-auto"
    >
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">
            {{ audience.name }} Audiences
        </h2>
        <p class="text-sm text-gray-600 dark:text-gray-400">
            {{ audience.description }}
        </p>

        <div
            class="grid md:grid-cols-5 _md:flex _md:flex-col py-5 gap-4 sm:gap-6 self-center"
        >
            <div class="col-span-3">
                <AudiencesShowNotification class="" />
            </div>

            <div
                class="grid gap-4 sm:gap-6 col-span-2 sm:_md:grid-cols-2 _xs:grid-cols-1 grow md:grid-rows-2"
            >
                <AudiencesShowStatsCard
                    v-for="l in 2"
                    :key="l"
                    :value="32"
                    :description="'Total voters in polling station'"
                />
            </div>
        </div>

        <div class="">
            <div>
                <AudiencesShowTable :audience="audience" :table="table" />
            </div>
        </div>
    </div>
</template>
