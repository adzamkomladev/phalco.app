<script setup lang="ts">
const props = defineProps<{
    row: { key: any; value: any; extra: any };
    columns: any[];
    findColumn: (name: string) => any;
}>();

const { key, value, extra } = props.row;
</script>

<template>
    <tr :key="key" class="text-sm">
        <td class="size-px whitespace-nowrap">
            <!-- <div class="ps-6 py-3">
                <label for="hs-at-with-checkboxes-1" class="flex">
                    <input
                        type="checkbox"
                        class="shrink-0 border-gray-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-800 dark:border-gray-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                        id="hs-at-with-checkboxes-1"
                    />
                    <span class="sr-only">Checkbox</span>
                </label>
            </div> -->
        </td>
        <td class="size-px w-fit max-w-fit">
            <div class="py-3 ps-6 lg:ps-3 pe-6">
                <div class="flex items-center gap-x-3">
                    <img
                        class="inline-block size-[38px] rounded-full"
                        :src="extra(findColumn('name'), 'logo')"
                        alt="Logo"
                    />
                    <div class="">
                        <span
                            class="block lg:whitespace-nowrap font-semibold text-gray-800 dark:text-gray-200"
                        >
                            {{ value(findColumn("name")) }}
                        </span>
                        <span class="block text-sm text-gray-500">
                            {{ extra(findColumn("name"), "creator") }}
                        </span>
                    </div>
                </div>
            </div>
        </td>
        <td class="h-px whitespace-nowrap w-fit">
            <div class="px-6 py-3 text-sm">
                <SharedTableStatus :status="value(findColumn('status'))" />
            </div>
        </td>
        <td class="size-px whitespace-nowrap text-gray-500 w-fit">
            <div class="px-6 py-3">
                {{ value(findColumn("current_stage")) }}
            </div>
        </td>
        <td class="size-px whitespace-nowrap text-gray-500 w-fit">
            <div class="px-6 py-3">{{ value(findColumn("created_at")) }}</div>
        </td>
        <td class="size-px whitespace-nowrap w-fit">
            <div class="px-6 py-1.5 xl:pr-20">
                <router-link
                    :href="
                        route('elections.show', {
                            id: +extra(findColumn('name'), 'id'),
                        })
                    "
                    class="inline-flex items-center text-sm font-medium text-primary-600 cursor-pointer gap-x-1 decoration-2 hover:underline dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                >
                    <SharedTableShowDetail />
                </router-link>
            </div>
        </td>
    </tr>
</template>
