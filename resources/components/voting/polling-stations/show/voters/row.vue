<script setup lang="ts">
const props = defineProps<{
    row: { key: any; value: any; extra: any };
    columns: any[];
    findColumn: (label: string) => any;
}>();

const { key, value, extra } = props.row;
</script>

<template>
    <tr class="text-sm">
        <td class="size-px whitespace-nowrap"></td>
        <td class="size-px w w-full max-w-40 bg-red">
            <div class="py-3 ps-6 lg:ps-3 pe-6">
                <div class="flex items-center gap-x-3">
                    <img
                        class="inline-block size-[38px] rounded-full"
                        :src="extra(findColumn('name'), 'logo')"
                        alt="Logo"
                    />
                    <div class="grow">
                        <span
                            class="block lg:whitespace-nowrap font-semibold text-gray-800 dark:text-gray-200"
                        >
                            {{ value(findColumn("name")) }}
                        </span>
                        <span class="block text-sm text-gray-500">
                            {{ extra(findColumn("name"), "option") }}
                        </span>
                    </div>
                </div>
            </div>
        </td>
        <td
            class="py-3 ps-6 lg:ps-3 pe-6 text-start whitespace-nowrap text-gray-500"
        >
            <div class="font-semibold">
                {{ value(findColumn("voter_id")) }}
            </div>
        </td>
        <td class="whitespace-nowrap text-gray-500">
            <div class="px-6 py-3">
                {{ value(findColumn("contact")) }}
            </div>
        </td>
        <td class="whitespace-nowrap text-gray-500"></td>

        <td class="h-px whitespace-nowrap">
            <div class="px-6 py-3 text-sm w-fit">
                <SharedTableRequestStatus
                    :status="value(findColumn('voted_at'))"
                />
            </div>
        </td>
    </tr>
</template>