<script setup lang="ts">
const data = useProperty("elections");
const elections =
    data.value?.all?.map((e: App.Data.Elections.ElectionData) => ({
        value: e.id,
        label: e.name,
    })) || [];
const isNotEmpty = computed(() => elections.length !== 0);
const selectedElection = ref<number | null>(data.value?.selected?.id || null);
const loading = ref(false);

watch(
    selectedElection,
    async (newElection: number | null, _: number | null) => {
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
    },
);
</script>

<template>
    <div class="hs-dropdown [--placement:bottom-left] relative inline-flex">
        <button
            id="hs-dropdown-election"
            type="button"
            aria-haspopup="menu"
            aria-expanded="false"
            aria-label="Dropdown"
            class="rounded-md border border-gray-200 dark:border-gray-600 p-2 gap-4 _sm:gap-2 flex justify-between items-center w-48 _sm:w-fit"
        >
            <div class="flex gap-2">
                <span
                    class="size-5 bg-primary-400 dark:bg-primary-600 rounded-md"
                />
                <span>{{
                    elections.find((e) => e.value === selectedElection)
                        ?.label || "Select Election"
                }}</span>
            </div>
            <div class="hs-dropdown-open:opacity-0">
                <SharedCommonIcon
                    name="chevron"
                    class="text-gray-300 dark:text-gray-400 h-4 rotate-180 hs-dropdown-open:rotate-90 group-focus-within:-rotate-90"
                />
            </div>
        </button>
        <div
            class="hs-dropdown-menu divide-y flex flex-col transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-64 bg-white shadow-md rounded-lg mt-2 dark:bg-gray-800 dark:border dark:border-gray-700 dark:divide-gray-700 after:h-4 after:absolute after:-bottom-4 after:start-0 after:w-full before:h-4 before:absolute before:-top-4 before:start-0 before:w-full p-3"
            role="menu"
            aria-orientation="vertical"
            aria-labelledby="hs-dropdown-election"
        >
            <button
                v-for="(election, index) in elections"
                :key="index"
                @click="selectedElection = election.value"
                id="hs-dropdown-election"
                type="button"
                aria-haspopup="menu"
                aria-expanded="false"
                aria-label="Dropdown"
            >
                <div
                    class="rounded-md hover:bg-gray-100 dark:hover:bg-slate-700 my-1 p-2 gap-4 _sm:gap-2 flex items-center"
                >
                    <span
                        :class="[
                            'size-5  rounded-md ',
                            selectedElection === election.value
                                ? 'bg-primary-400'
                                : 'bg-gray-100',
                        ]"
                    />
                    <span>{{ election.label }}</span>
                </div>
            </button>
        </div>
    </div>
</template>
