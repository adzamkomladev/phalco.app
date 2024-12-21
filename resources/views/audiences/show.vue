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
}>();

const table = useTable(props, "contacts");
</script>

<template layout="main">
    <div
        class="max-w-[85rem] px-4 text-gray-800 dark:text-gray-300 sm:px-6 lg:px-8 mx-auto"
    >
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">
            {{audience.name}} Audiences
        </h2>
        <p class="text-sm text-gray-600 dark:text-gray-400">
            {{audience.description}}
        </p>

        <div
            class="grid md:grid-cols-5  _md:flex-col py-5 gap-4 sm:gap-6 self-center"
        >
        <div class="col-span-3">
            <AudiencesShowNotification class=""/>
        </div>
                        

            <div class="grid gap-4 sm:gap-6 col-span-2 sm:_md:grid-cols-2  _xs:grid-cols-1 grow md:grid-rows-2">
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
                <AudiencesShowTable :table="table" />
            </div>
        </div>
    </div>
</template>


<!-- </template> -->

<!-- <template layout="main"> -->
    <!-- <p>Audience details</p>
    <pre>{{ audience }}</pre> -->
    <!-- <div>
        <div
            class="mb-4"
            v-for="(contact, index) in contacts.records"
            :key="index"
        >
            <router-link
                :href="
                    route('audiences.contacts.show', {
                        id: audience.id,
                        contactId: +contact.name?.extra.id,
                    })
                "
                class="inline-flex items-center text-sm font-medium text-blue-600 cursor-pointer gap-x-1 decoration-2 hover:underline dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
            >
                Details
            </router-link>
            {{ contact }}
        </div>
    </div> -->