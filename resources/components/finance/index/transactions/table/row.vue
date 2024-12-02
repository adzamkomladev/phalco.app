<script setup lang="ts">
const props = defineProps<{
    // row: { key: any; value: any; extra: any };
    // columns: any[];
    // findColumn: (name: string) => any;
    key: number;
    row: any;
}>();

// const { key, value, extra } = props.row;
</script>

<template>
    <tr :key="key" class="text-sm">
        <td class="size-px whitespace-nowrap">
            <div class="ps-6 py-3">
                <label for="hs-at-with-checkboxes-1" class="flex">
                    <input
                        type="checkbox"
                        class="shrink-0 border-gray-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-800 dark:border-gray-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                        id="hs-at-with-checkboxes-1"
                    />
                    <span class="sr-only">Checkbox</span>
                </label>
            </div>
        </td>
        <td class="size-px whitespace-nowrap">
            <div class="py-3 ps-6 lg:ps-3 xl:ps-0 pe-6">
                <div class="flex items-center gap-x-3">
                    <img
                        class="inline-block size-[38px] aspect-square rounded-full"
                        :src="'https://picsum.photos/200/300'"
                        alt="Logo"
                    />
                    <div class="grow">
                        <span
                            class="block text-sm font-semibold text-gray-800 dark:text-gray-200"
                        >
                            <!-- {{ value(findColumn("name")) }} -->
                            {{ row.name }}
                        </span>
                        <span class="block text-sm text-gray-600">
                            <!-- {{ extra(findColumn("description")) }} -->
                            {{ row.description }}
                        </span>
                    </div>
                </div>
            </div>
        </td>
        <td class="h-px w-72 whitespace-nowrap">
            <div
                class="px-6 py-3"
                :class="[
                    row.amount >= 0 ? 'text-forest-300' : 'text-crimson-500',
                ]"
            >
                {{ row.amount }}
                <!-- {{ value(findColumn("amount")) }} -->
            </div>
        </td>
        <td class="size-px whitespace-nowrap text-gray-600">
            <div class="px-6 py-3">
                <!-- <SharedTableStatus :status="value(findColumn('status'))" /> -->

                {{ row.reference }}
            </div>
        </td>
        <td class="size-px whitespace-nowrap text-gray-600">
            <div class="px-6 py-3">
                <!-- <SharedTableStatus :status="value(findColumn('status'))" /> -->
                <span
                    :class="[
                        row.status == 'completed'
                            ? 'bg-forest-200 text-forest-700'
                            : 'bg-crimson-100 text-crimson-500',
                        'rounded-full py-1 px-4 text-xs ',
                    ]"
                >
                    {{ row.status }}
                </span>
            </div>
        </td>
        <td class="size-px whitespace-nowrap text-gray-600">
            <!-- <div class="px-6 py-3">{{ value(findColumn("created_at")) }}</div> -->
            {{ row.completed_on }}
        </td>
        <td class="size-px whitespace-nowrap">
            <div class="px-6 py-1.5">
                <a
                    data-hs-overlay="#hs-overlay-create-user"
                    class="inline-flex items-center text-sm font-medium text-primary-600 cursor-pointer gap-x-1 decoration-2 hover:underline dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                >
                </a>
            </div>
        </td>
    </tr>
</template>
