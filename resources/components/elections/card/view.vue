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
    <SharedCommonDropdown>
        <template v-slot:toggle>
            <div
                class="rounded-md border border-gray-300 p-2 gap-4 _sm:gap-2 flex items-center"
            >
                <span class="size-5 bg-forest-500 rounded-md" />
                <span>General Election 2024</span>

                <SharedCommonIcon
                    name="chevron"
                    class="rotate-90 text-gray-300 group-focus-within:-rotate-90"
                />
            </div>
        </template>

        <div
            class="py-8 px-4 max-h-[80vh] shadow rounded-xl border flex flex-col gap-5 bg-white dark:bg-gray-700"
        >
            <div class="text-center">
                <p class="font-bold text-lg capitalize">All elections</p>
                <p class="text-gray-500">Invite and manage members</p>
            </div>
            <div class="flex gap-4 _sm:gap-2">
                <SharedFormSearchInput
                    placeholder="search for election"
                    class="w-full"
                /><SharedFormSubmitButton
                    type="simple"
                    text="Show all"
                    class="whitespace-nowrap text-gray-500 _sm:hidden"
                />
            </div>
            <div
                class="grid sm:grid-cols-2 gap-2 w-52 sm:w-96 overflow-x-hidden overflow-y-auto"
            >
                <div
                    v-for="(elect, index) in elects.slice(1, 5)"
                    :key="index"
                    class="rounded-md border flex flex-col p-2"
                >
                    <div class="flex gap-2">
                        <img
                            :src="elect.logo"
                            class="rounded-full shrink-0 size-10 overflow-hidden"
                        />
                        <div>
                            <p class="font-medium text-ellipsis white">
                                <abbr
                                    :title="
                                        elect.election_name +
                                        ' Loc: ' +
                                        elect.location
                                    "
                                    class="decoration-transparent text-xs"
                                >
                                    {{ elect.election_name }}
                                </abbr>
                            </p>
                            <p class="text-xs font-light text-gray-300">
                                @{{ elect.location }}
                            </p>
                        </div>
                        <div class="w-10">
                            <SharedCommonIcon
                                name="chevron"
                                class="size-full rotate-90"
                            />
                        </div>
                    </div>
                    <div
                        class="px-3 self-end gap-1 bg-[#01D11659] rounded-full flex items-center"
                    >
                        <span
                            class="size-[0.6rem] block bg-forest-500 rounded"
                        />
                        <span class="text-[0.5rem]">{{
                            elect.active ? "Active" : "Inactive"
                        }}</span>
                    </div>
                </div>
            </div>
        </div>
    </SharedCommonDropdown>
</template>

<!-- <SharedFormBaseSelect
        v-if="isNotEmpty"
        v-model="election"
        id="election"
        name="election"
        :options="elections"
    /> -->
