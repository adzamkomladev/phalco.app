<script setup lang="ts">
// const props = defineProps<{
//     row: { key: any; value: any; extra: any };
//     columns: any[];
//     findColumn: (label: string) => any;
// }>();

// const { key, value, extra } = props.row;
</script>

<template>
    <div class="flex borde p-2 shadow justify-between m-2 rounded-md">
        <div class="flex items-center gap-x-3">
            <div class="font-bold text-2xl">#1</div>

            <img
                class="inline-block bg-gray-800/5 size-[38px] rounded-full"
                src=""
                alt="Logo"
            />
            <div class="grow">
                <span
                    class="block lg:whitespace-nowrap font-semibold text-gray-800 dark:text-gray-200"
                >
                    Komla adzam
                </span>
                <span class="block text-sm text-gray-500"> NPP </span>
            </div>
        </div>
        <div class="flex items-center max-w-[10%]">
            <img
                src="https://th.bing.com/th/id/R.5dc0aa315b1d9c62e1fb4052caa50bbf?rik=2SjuMfAwfJTGlQ&pid=ImgRaw&r=0"
            />
        </div>
    </div>
</template>
