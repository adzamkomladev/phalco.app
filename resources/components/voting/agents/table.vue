<script setup lang="ts">
import { Agent } from "~/resources/interfaces/voting/agents/index.interface";
import NoAgentsFound from "~/resources/svg/main/no_data.svg?src";

const props = defineProps<{
    table: any;
}>();
const emits = defineEmits<{
    (e: "selectAgent", value: Agent): void;
}>();
const selectedAgentId = ref<number | null>(null);

const emitSelectAgent = (agent: Agent) => {
    emits("selectAgent", agent);
    selectedAgentId.value = agent.id;
};
const table = props.table;

const paginator: any = table.paginator;
const prev = computed(() => paginator?.links?.[0]);
const current = computed(() => paginator?.links?.[1]);
const next = computed(() => paginator?.links?.[2]);
const total = ref(paginator?.meta?.total);

const findColumn = (name: string) =>
    table.columns.find((column: any) => column?.name === name)!;
const findFilter = (name: string) =>
    table.filters.find((filter: any) => filter.name === name)!;

const searchFilter = findFilter("search");

const search = useQueryParameter("filters[search]");

const debounceFn = useDebounceFn(
    () =>
        search.value !== ""
            ? searchFilter.apply(search.value)
            : searchFilter.clear(),
    800,
);

watch(search, debounceFn);
</script>
<template>
    <div
        class="overflow-hidden relative h-full flex flex-col bg-white border border-gray-200 shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-700"
    >
        <!-- Header -->
        <div
            class="grid gap-3 px-6 py-4 border-b border-gray-200 md:flex md:justify-between md:items-center dark:border-gray-700"
        >
            <div>
                <h2
                    class="text-xl font-semibold text-gray-800 dark:text-gray-200"
                >
                    Agents
                </h2>
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    All agents for ...
                </p>
            </div>

            <div class="inline-flex gap-x-2">
                <router-link
                    :href="route('voting.agents.create')"
                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-primary-400 border border-transparent rounded-lg cursor-pointer gap-x-2 hover:opacity-90 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                >
                    <svg
                        class="flex-shrink-0 size-3"
                        xmlns="http://www.w3.org/2000/svg"
                        width="16"
                        height="16"
                        viewBox="0 0 16 16"
                        fill="none"
                    >
                        <path
                            d="M2.63452 7.50001L13.6345 7.5M8.13452 13V2"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                        />
                    </svg>
                    Create Agent
                </router-link>
            </div>
        </div>

        <div
            v-if="total > 0"
            class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-neutral-700"
        >
            <!-- Input -->
            <SharedFormSearchInput
                class="sm:col-span-1"
                v-model="search"
                placeholder="Search for agents"
                name="search"
            />
        </div>
        <!-- End Header -->
        <div v-if="table.records.length > 0" class="grow flex flex-col flex-1">
            <!-- Table -->
            <div class="w-full flex-grow overflow-x-auto overflow-y-hidden">
                <table
                    class="w-full divide-y divide-gray-200 dark:divide-gray-700"
                >
                    <thead class="bg-gray-50 dark:bg-slate-800">
                        <tr>
                            <th scope="col" class="py-3 ps-6 text-start">
                                <label
                                    for="hs-at-with-checkboxes-main"
                                    class="flex"
                                >
                                    <input
                                        disabled
                                        type="checkbox"
                                        class="text-primary-600 border-gray-300 rounded shrink-0 focus:ring-primary-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-600 dark:checked:bg-primary-500 dark:checked:border-primary-500 dark:focus:ring-offset-gray-800"
                                        id="hs-at-with-checkboxes-main"
                                    />
                                    <span class="sr-only">Checkbox</span>
                                </label>
                            </th>
                            <SharedTableTh
                                v-for="(col, index) in table.columns"
                                :column="col"
                                :key="index"
                                :index="index"
                                class=""
                            />
                        </tr>
                    </thead>

                    <tbody
                        class="divide-y divide-gray-200 dark:divide-gray-700"
                    >
                        <VotingAgentsRow
                            @select-agent="emitSelectAgent($event)"
                            v-for="row in table.records"
                            :key="row.key"
                            :row="row"
                            :columns="table.columns"
                            :findColumn="findColumn"
                            :selectedId="selectedAgentId"
                        />
                    </tbody>
                </table>
            </div>
            <!-- End Table -->

            <!-- Footer -->
            <div
                class="items-center justify-between gap-3 px-6 py-4 border-t border-gray-200 md:flex md:justify-between md:items-center dark:border-gray-700"
            >
                <div>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        <span
                            class="font-semibold text-gray-800 dark:text-gray-200"
                            >{{ table.records.length }}
                            <span class="font-normal">out of</span>
                            {{ total || 0 }}</span
                        >
                        Agent(s)
                    </p>
                </div>

                <div class="inline-flex gap-x-2">
                    <router-link
                        v-if="prev.url"
                        type="button"
                        :href="prev.url"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-800 bg-white border border-gray-200 rounded-lg shadow-sm gap-x-2 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                    >
                        <svg
                            class="flex-shrink-0 size-4"
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <path d="m15 18-6-6 6-6" />
                        </svg>
                        Prev
                    </router-link>

                    <router-link
                        v-if="next.url"
                        type="button"
                        :href="next.url"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-800 bg-white border border-gray-200 rounded-lg shadow-sm gap-x-2 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                    >
                        Next
                        <svg
                            class="flex-shrink-0 size-4"
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <path d="m9 18 6-6-6-6" />
                        </svg>
                    </router-link>
                </div>
            </div>
        </div>
        <div v-else class="p-5">
            <img
                :src="NoAgentsFound"
                class="h-[50vh] max-h-96 place-self-center"
            />
            <p class="text-black/50 text-center pt-4">
                <template v-if="search">
                    no agent with detail
                    <span class="text-primary-500">{{ search }}</span>
                </template>
                <template v-else> no Agent added! </template>
            </p>
        </div>
        <!-- End Footer -->
    </div>
</template>
