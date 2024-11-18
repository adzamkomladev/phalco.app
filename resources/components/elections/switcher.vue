<script setup lang="ts">
onMounted(() => {
    window.HSStaticMethods.autoInit();
});

const data = useProperty("elections");
const elections =
    data.value?.all?.map((e: App.Data.Elections.ElectionData) => ({
        value: e.id,
        label: e.name,
        logo: e.logo,
    })) || [];
const selectedElectionId = ref<number | null>(data.value?.selected?.id || null);
const loading = ref(false);

watch(
    selectedElectionId,
    async (newElectionId: number | null, _: number | null) => {
        if (newElectionId) {
            loading.value = true;
            try {
                const res = await router.patch(route("elections.switch"), {
                    data: { election_id: newElectionId },
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
            class="rounded-md border border-gray-200 dark:border-gray-600 p-2 gap-4 _sm:gap-2 flex justify-between w-fit items-center _sm:w-fit"
        >
            <div class="flex gap-2">
                <img
                    :src="data.selected?.logo"
                    class="size-5 bg-primary-400 dark:bg-primary-600 rounded-md"
                />
                <p class="max-w-40 w-40 truncate text-left">
                    {{
                        data.selected?.name || "Select Election for us please "
                    }}
                </p>
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
                @click="selectedElectionId = election.value"
                id="hs-dropdown-election"
                type="button"
                aria-haspopup="menu"
                aria-expanded="false"
                aria-label="Dropdown"
            >
                <div
                    :class="[
                        selectedElectionId === election.value
                            ? 'bg-gray-2'
                            : 'hover:bg-gray-1 dark:hover:bg-slate-700',
                    ]"
                    class="rounded-md my-1 p-2 gap-4 _sm:gap-2 flex items-center justify-between"
                >
                    <div class="flex gap-2">
                        <img :src="election.logo" class="size-5 rounded-md" />
                        <span>{{ election.label }}</span>
                    </div>

                    <span
                        v-if="selectedElectionId === election.value"
                        class="self-end"
                    >
                        <SharedCommonIcon
                            name="check"
                            class="size-3 self-end text-forest-300"
                        />
                    </span>
                </div>
            </button>
        </div>
    </div>
</template>
