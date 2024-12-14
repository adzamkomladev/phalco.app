<script setup lang="ts">
useHead({
    title: "Audience Details",
});

const props = defineProps<{
    audience: any;
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

onMounted(() => {
    for (const notification of props.notifications) {
        console.log("notification", notification);
        EchoHub.private(notification.broadcastTopic).listen(
            "Audiences.ContactImported",
            (e) => {
                console.log(e, "djkfdjfkdkf");
            },
        );
    }
});

const table = useTable(props, "contacts");
</script>

<template layout="main">
    <p>Audience details</p>
    <pre>{{ audience }}</pre>
    <div>
        <div
            class="mb-4"
            v-for="(contact, index) in contacts.records"
            :key="index"
        >
            <router-link
                :href="
                    route('audiences.contacts.show', {
                        id: audience.id,
                        contactId: +contact.name?.extra?.id,
                    })
                "
                class="inline-flex items-center text-sm font-medium text-blue-600 cursor-pointer gap-x-1 decoration-2 hover:underline dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
            >
                Details
            </router-link>
            {{ contact }}
        </div>
    </div>
</template>
