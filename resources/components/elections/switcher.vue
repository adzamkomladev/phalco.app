<script setup lang="ts">
const data = useProperty("elections");
const elections =
    data.value?.all?.map((e: App.Data.Elections.ElectionData) => ({
        value: e.id,
        label: e.name,
    })) || [];
const isNotEmpty = computed(() => elections.length !== 0);
const election = ref<number | null>(data.value?.selected?.id || null);
const loading = ref(false);

watch(election, async (newElection: number | null, _: number | null) => {
    if (newElection) {
        loading.value = true;
        try {
            const res = await router.patch(route("elections.switch"), {
                data: { election_id: +newElection },
            });
        } catch (error) {
        } finally {
            loading.value = false;
        }
    }
});

const elects = [
    {
        id: 1,
        election_name: "Presidential Election 2024",
        active: true,
        location: "United States",
        logo: "https://randomuser.me/api/portraits/men/2.jpg",
    },
    {
        id: 2,
        election_name: "City Council Election 2024",
        active: false,
        location: "New York City",
        logo: "https://randomuser.me/api/portraits/men/2.jpg",
    },
    {
        id: 3,
        election_name: "Gubernatorial Election 2024",
        active: true,
        location: "California",
        logo: "https://randomuser.me/api/portraits/men/2.jpg",
    },
    {
        id: 4,
        election_name: "Local School Board Election 2024",
        active: false,
        location: "Chicago",
        logo: "https://randomuser.me/api/portraits/men/2.jpg",
    },
    {
        id: 5,
        election_name: "State Senate Election 2024",
        active: true,
        location: "Texas",
        logo: "https://randomuser.me/api/portraits/men/2.jpg",
    },
];
</script>

<template>
    <!-- <SharedFormBaseSelect
        v-if="isNotEmpty"
        v-model="election"
        id="election"
        name="election"
        :options="elections"
    /> -->
    <div class="hs-dropdown [--placement:bottom-left] relative inline-flex">
        <button
            id="hs-dropdown-account"
            type="button"
            aria-haspopup="menu"
            aria-expanded="false"
            aria-label="Dropdown"
            class="rounded-md border border-gray-300 p-2 gap-4 _sm:gap-2 flex items-center"
        >
            <span class="size-5 bg-forest-500 rounded-md" />
            <span>{{ election }}</span>

            <SharedCommonIcon
                name="chevron"
                class="rotate-90 text-gray-300 group-focus-within:-rotate-90"
            />
        </button>
        <div
            class="hs-dropdown-menu flex flex-col gap-1 transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-64 bg-white shadow-md rounded-lg mt-2 dark:bg-neutral-800 dark:border dark:border-neutral-700 dark:divide-neutral-700 after:h-4 after:absolute after:-bottom-4 after:start-0 after:w-full before:h-4 before:absolute before:-top-4 before:start-0 before:w-full p-3"
            role="menu"
            aria-orientation="vertical"
            aria-labelledby="hs-dropdown-account"
        >
            <div
                v-for="(election, index) in elections"
                :key="index"
                id="hs-dropdown-account"
                type="button"
                aria-haspopup="menu"
                aria-expanded="false"
                aria-label="Dropdown"
                class="rounded-md hover:bg-gray-100 p-2 gap-4 _sm:gap-2 flex items-center"
            >
                <span class="size-5 bg-forest-500 rounded-md" />
                <span>{{ election.label }}</span>
            </div>
        </div>
    </div>
</template>
