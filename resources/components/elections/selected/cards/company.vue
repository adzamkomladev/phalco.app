<script setup lang="ts"></script>

<template>
    <SharedCommonCard class="divide-y dark:divide-gray-500 gap-2 flex flex-col">
        <div class="flex items-center gap-2">
            <span
                class="rounded-full bg-primary-500 dark:bg-primary-800 w-fit aspect-square p-2 flex items-center justify-center"
            >
                <SharedCommonIcon name="logo" class="text-white" />
            </span>
            <span class="font-bold text-2xl">Phalco</span>
        </div>
        <div
            class="grid text-sm grid-cols-4 xl:grid-cols-5 _xs:divide-y dark:divide-gray-500 _xs:grid-cols-2 gap-6 py-2"
        >
            <div class="grid grid-rows-2 _xs:gap-2 col-span-2">
                <div class="grid grid-cols-2 gap-4 col-span-2">
                    <div class="flex gap-4">
                        <SharedCommonIcon name="location" />
                        <span class="text-gray-500"> Location </span>
                    </div>
                    <div class="">
                        <span class="text-gray-500"> Ghana-Accra </span>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4 col-span-2">
                    <div class="flex gap-4">
                        <SharedCommonIcon
                            name="creament"
                            class="transform scale-y-[-1] size-6"
                        />
                        <span class="text-gray-500"> Status </span>
                    </div>
                    <div class="">
                        <span class="text-gray-500">
                            <SharedTableStatus status="active" />
                        </span>
                    </div>
                </div>
            </div>
            <div class="grid grid-rows-2 _xs:pt-2 col-span-2">
                <div class="grid grid-cols-2 gap-4 col-span-2">
                    <div class="flex gap-4">
                        <SharedCommonIcon name="calendar" />
                        <span class="text-gray-500"> Due date </span>
                    </div>
                    <div class="">
                        <span class="text-gray-500"> dd/mm/yy </span>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4 col-span-2">
                    <div class="flex gap-4">
                        <SharedCommonIcon
                            name="greet"
                            class="transform size-6"
                        />
                        <span class="text-gray-500"> Assignee </span>
                    </div>
                    <div class="">
                        <span class="text-gray-500">
                            <div class="flex items-center gap-x-3">
                                <img
                                    class="inline-block size-[25px] rounded-full"
                                    src="https://images.unsplash.com/photo-1531927557220-a9e23c1e4794?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=320&h=320&q=80"
                                    alt="Avatar"
                                />
                                <div class="grow">
                                    <span
                                        class="block text-xs font-medium text-gray-500 dark:text-neutral-200"
                                        >Dr Samuel</span
                                    >
                                </div>
                            </div>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </SharedCommonCard>
</template>
