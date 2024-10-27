<script setup lang="ts">

const pollingStationId = useProperty("elections.agentPollingStation.id");
const electionId = useProperty("elections.selected.id");


</script>

<template>
    <nav
        class="hs-accordion-group p-3 w-full flex flex-col flex-wrap h-full"
        data-hs-accordion-always-open
    >
        <div class="flex flex-col justify-between h-full">
            <ul class="flex flex-col space-y-1">

                <li>
                    <router-link
                        class="flex items-center gap-x-3.5 py-2 px-2.5 bg-gray-100 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-700 dark:text-white"
                        :href="route('home')"
                    >
                        <SharedCommonIcon name="home" />
                        Home
                    </router-link>
                </li>
<LayoutMainSidebarSubMenu  />
<LayoutMainSidebarSubMenu class="hs-accordion" />

                <!-- Elections -->
                <li class="hs-accordion" id="elections-accordion">
                    <button
                        type="button"
                        class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:hover:bg-neutral-700 dark:text-neutral-200"
                        aria-expanded="true"
                        aria-controls="elections-accordion-child"
                    >
                        
                        Elections
                        <!-- <TrialDropDown/> -->
                        <SharedCommonIcon class="hs-accordion-active:rotate-180 ms-auto" name="chevron"/>

                        
                    </button>

                    <div
                        id="elections-accordion-child"
                        class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 hidden"
                        role="region"
                        aria-labelledby="elections-accordion"
                    >
                        <ul class="ps-8 pt-1 space-y-1">
                            <li>
                                <router-link
                                    class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-200"
                                    :href="route('elections.index')"
                                >
                                    Dashboard
                                </router-link>
                            </li>
                            <li>
                                <router-link
                                    class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-200"
                                    :href="route('elections.create')"
                                >
                                    New Election
                                </router-link>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Nominations -->
                <li class="hs-accordion" id="nominations-accordion">
                    <button
                        type="button"
                        class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:hover:bg-neutral-700 dark:text-neutral-200"
                        aria-expanded="true"
                        aria-controls="nominations-accordion-child"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            class="lucide lucide-users"
                        >
                            <path
                                d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"
                            />
                            <circle cx="9" cy="7" r="4" />
                            <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                            <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                        </svg>
                        Nominations

                        <svg
                            class="hs-accordion-active:block ms-auto hidden size-4"
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
                            <path d="m18 15-6-6-6 6" />
                        </svg>

                        <svg
                            class="hs-accordion-active:hidden ms-auto block size-4"
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
                            <path d="m6 9 6 6 6-6" />
                        </svg>
                    </button>

                    <div
                        id="nominations-accordion-child"
                        class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 hidden"
                        role="region"
                        aria-labelledby="nominations-accordion"
                    >
                        <ul
                            class="hs-accordion-group ps-8 pt-1 space-y-1"
                            data-hs-accordion-always-open
                        >
                            <li
                                class="hs-accordion"
                                id="nominations-accordion-sub-1"
                            >
                                <button
                                    type="button"
                                    class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:hover:bg-neutral-700 dark:text-neutral-200"
                                    aria-expanded="true"
                                    aria-controls="nominations-accordion-sub-1-child"
                                >
                                    Sub Menu 1

                                    <svg
                                        class="hs-accordion-active:block ms-auto hidden size-4"
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
                                        <path d="m18 15-6-6-6 6" />
                                    </svg>

                                    <svg
                                        class="hs-accordion-active:hidden ms-auto block size-4"
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
                                        <path d="m6 9 6 6 6-6" />
                                    </svg>
                                </button>

                                <div
                                    id="nominations-accordion-sub-1-child"
                                    class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 hidden"
                                    role="region"
                                    aria-labelledby="nominations-accordion-sub-1"
                                >
                                    <ul class="pt-1 space-y-1">
                                        <li>
                                            <a
                                                class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-200"
                                                href="#"
                                            >
                                                Link 1
                                            </a>
                                        </li>
                                        <li>
                                            <a
                                                class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-200"
                                                href="#"
                                            >
                                                Link 2
                                            </a>
                                        </li>
                                        <li>
                                            <a
                                                class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-200"
                                                href="#"
                                            >
                                                Link 3
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li
                                class="hs-accordion"
                                id="nominations-accordion-sub-2"
                            >
                                <button
                                    type="button"
                                    class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:hover:bg-neutral-700 dark:text-neutral-200"
                                    aria-expanded="true"
                                    aria-controls="nominations-accordion-sub-2-child"
                                >
                                    Sub Menu 2

                                    <svg
                                        class="hs-accordion-active:block ms-auto hidden size-4"
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
                                        <path d="m18 15-6-6-6 6" />
                                    </svg>

                                    <svg
                                        class="hs-accordion-active:hidden ms-auto block size-4"
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
                                        <path d="m6 9 6 6 6-6" />
                                    </svg>
                                </button>

                                <div
                                    id="nominations-accordion-sub-2-child"
                                    class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 hidden"
                                    role="region"
                                    aria-labelledby="nominations-accordion-sub-2"
                                >
                                    <ul class="pt-1 space-y-1">
                                        <li>
                                            <a
                                                class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-200"
                                                href="#"
                                            >
                                                Link 1
                                            </a>
                                        </li>
                                        <li>
                                            <a
                                                class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-200"
                                                href="#"
                                            >
                                                Link 2
                                            </a>
                                        </li>
                                        <li>
                                            <a
                                                class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-200"
                                                href="#"
                                            >
                                                Link 3
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Campaigns -->
                <li class="hs-accordion" id="campaigns-accordion">
                    <button
                        type="button"
                        class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:hover:bg-neutral-700 dark:text-neutral-200"
                        aria-expanded="true"
                        aria-controls="campaigns-accordion-child"
                    >
                        <SharedCommonIcon name="campaign_main"/>
                        Campaigns

                        <svg
                            class="hs-accordion-active:block ms-auto hidden size-4"
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
                            <path d="m18 15-6-6-6 6" />
                        </svg>

                        <svg
                            class="hs-accordion-active:hidden ms-auto block size-4"
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
                            <path d="m6 9 6 6 6-6" />
                        </svg>
                    </button>

                    <div
                        id="campaigns-accordion-child"
                        class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 hidden"
                        role="region"
                        aria-labelledby="campaigns-accordion"
                    >
                        <ul class="ps-8 pt-1 space-y-1">
                            <li>
                                <a
                                    class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-200"
                                    href="#"
                                >
                                    Link 1
                                </a>
                            </li>
                            <li>
                                <a
                                    class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-200"
                                    href="#"
                                >
                                    Link 2
                                </a>
                            </li>
                            <li>
                                <a
                                    class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-200"
                                    href="#"
                                >
                                    Link 3
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Audiences -->
                <li class="hs-accordion" id="audiences-accordion">
                    <button
                        type="button"
                        class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:hover:bg-neutral-700 dark:text-neutral-200"
                        aria-expanded="true"
                        aria-controls="audiences-accordion-child"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            class="lucide lucide-person-standing"
                        >
                            <circle cx="12" cy="5" r="1" />
                            <path d="m9 20 3-6 3 6" />
                            <path d="m6 8 6 2 6-2" />
                            <path d="M12 10v4" />
                        </svg>
                        Audiences

                        <svg
                            class="hs-accordion-active:block ms-auto hidden size-4"
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
                            <path d="m18 15-6-6-6 6" />
                        </svg>

                        <svg
                            class="hs-accordion-active:hidden ms-auto block size-4"
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
                            <path d="m6 9 6 6 6-6" />
                        </svg>
                    </button>

                    <div
                        id="audiences-accordion-child"
                        class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 hidden"
                        role="region"
                        aria-labelledby="audiences-accordion"
                    >
                        <ul class="ps-8 pt-1 space-y-1">
                            <li>
                                <a
                                    class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-200"
                                    href="#"
                                >
                                    Link 1
                                </a>
                            </li>
                            <li>
                                <a
                                    class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-200"
                                    href="#"
                                >
                                    Link 2
                                </a>
                            </li>
                            <li>
                                <a
                                    class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-200"
                                    href="#"
                                >
                                    Link 3
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Strategies -->
                <li class="hs-accordion" id="strategies-accordion">
                    <button
                        type="button"
                        class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:hover:bg-neutral-700 dark:text-neutral-200"
                        aria-expanded="true"
                        aria-controls="strategies-accordion-child"
                    >
                        
                        Strategies

                        <svg
                            class="hs-accordion-active:block ms-auto hidden size-4"
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
                            <path d="m18 15-6-6-6 6" />
                        </svg>

                        <svg
                            class="hs-accordion-active:hidden ms-auto block size-4"
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
                            <path d="m6 9 6 6 6-6" />
                        </svg>
                    </button>

                    <div
                        id="strategies-accordion-child"
                        class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 hidden"
                        role="region"
                        aria-labelledby="strategies-accordion"
                    >
                        <ul class="ps-8 pt-1 space-y-1">
                            <li>
                                <a
                                    class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-200"
                                    href="#"
                                >
                                    Link 1
                                </a>
                            </li>
                            <li>
                                <a
                                    class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-200"
                                    href="#"
                                >
                                    Link 2
                                </a>
                            </li>
                            <li>
                                <a
                                    class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-200"
                                    href="#"
                                >
                                    Link 3
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Donations -->
                <li class="hs-accordion" id="donations-accordion">
                    <button
                        type="button"
                        class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:hover:bg-neutral-700 dark:text-neutral-200"
                        aria-expanded="true"
                        aria-controls="donations-accordion-child"
                    >
                        
                        Donations

                        <svg
                            class="hs-accordion-active:block ms-auto hidden size-4"
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
                            <path d="m18 15-6-6-6 6" />
                        </svg>

                        <svg
                            class="hs-accordion-active:hidden ms-auto block size-4"
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
                            <path d="m6 9 6 6 6-6" />
                        </svg>
                    </button>

                    <div
                        id="donations-accordion-child"
                        class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 hidden"
                        role="region"
                        aria-labelledby="donations-accordion"
                    >
                        <ul
                            class="hs-accordion-group ps-8 pt-1 space-y-1"
                            data-hs-accordion-always-open
                        >
                            <li
                                class="hs-accordion"
                                id="donations-accordion-sub-1"
                            >
                                <button
                                    type="button"
                                    class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:hover:bg-neutral-700 dark:text-neutral-200"
                                    aria-expanded="true"
                                    aria-controls="donations-accordion-sub-1-child"
                                >
                                    Sub Menu 1

                                    <svg
                                        class="hs-accordion-active:block ms-auto hidden size-4"
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
                                        <path d="m18 15-6-6-6 6" />
                                    </svg>

                                    <svg
                                        class="hs-accordion-active:hidden ms-auto block size-4"
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
                                        <path d="m6 9 6 6 6-6" />
                                    </svg>
                                </button>

                                <div
                                    id="donations-accordion-sub-1-child"
                                    class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 hidden"
                                    role="region"
                                    aria-labelledby="donations-accordion-sub-1"
                                >
                                    <ul class="pt-1 space-y-1">
                                        <li>
                                            <a
                                                class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-200"
                                                href="#"
                                            >
                                                Link 1
                                            </a>
                                        </li>
                                        <li>
                                            <a
                                                class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-200"
                                                href="#"
                                            >
                                                Link 2
                                            </a>
                                        </li>
                                        <li>
                                            <a
                                                class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-200"
                                                href="#"
                                            >
                                                Link 3
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li
                                class="hs-accordion"
                                id="donations-accordion-sub-2"
                            >
                                <button
                                    type="button"
                                    class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:hover:bg-neutral-700 dark:text-neutral-200"
                                    aria-expanded="true"
                                    aria-controls="donations-accordion-sub-2-child"
                                >
                                    Sub Menu 2

                                    <svg
                                        class="hs-accordion-active:block ms-auto hidden size-4"
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
                                        <path d="m18 15-6-6-6 6" />
                                    </svg>

                                    <svg
                                        class="hs-accordion-active:hidden ms-auto block size-4"
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
                                        <path d="m6 9 6 6 6-6" />
                                    </svg>
                                </button>

                                <div
                                    id="donations-accordion-sub-2-child"
                                    class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 hidden"
                                    role="region"
                                    aria-labelledby="donations-accordion-sub-2"
                                >
                                    <ul class="pt-1 space-y-1">
                                        <li>
                                            <a
                                                class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-200"
                                                href="#"
                                            >
                                                Link 1
                                            </a>
                                        </li>
                                        <li>
                                            <a
                                                class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-200"
                                                href="#"
                                            >
                                                Link 2
                                            </a>
                                        </li>
                                        <li>
                                            <a
                                                class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-200"
                                                href="#"
                                            >
                                                Link 3
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Voting -->
                <li class="hs-accordion" id="voting-accordion">
                    <button
                        type="button"
                        class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:hover:bg-neutral-700 dark:text-neutral-200"
                        aria-expanded="true"
                        aria-controls="voting-accordion-child"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            class="lucide lucide-vote"
                        >
                            <path d="m9 12 2 2 4-4" />
                            <path
                                d="M5 7c0-1.1.9-2 2-2h10a2 2 0 0 1 2 2v12H5V7Z"
                            />
                            <path d="M22 19H2" />
                        </svg>
                        Voting

                        <svg
                            class="hs-accordion-active:block ms-auto hidden size-4"
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
                            <path d="m18 15-6-6-6 6" />
                        </svg>

                        <svg
                            class="hs-accordion-active:hidden ms-auto block size-4"
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
                            <path d="m6 9 6 6 6-6" />
                        </svg>
                    </button>

                    <div
                        id="voting-accordion-child"
                        class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 hidden"
                        role="region"
                        aria-labelledby="voting-accordion"
                    >
                        <ul
                            class="hs-accordion-group ps-8 pt-1 space-y-1"
                            data-hs-accordion-always-open
                        >
                            <li
                                class="hs-accordion"
                                id="voting-accordion-sub-1"
                            >
                                <button
                                    type="button"
                                    class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:hover:bg-neutral-700 dark:text-neutral-200"
                                    aria-expanded="true"
                                    aria-controls="voting-accordion-sub-1-child"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="20"
                                        height="20"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="1"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="lucide lucide-warehouse"
                                    >
                                        <path
                                            d="M22 8.35V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V8.35A2 2 0 0 1 3.26 6.5l8-3.2a2 2 0 0 1 1.48 0l8 3.2A2 2 0 0 1 22 8.35Z"
                                        />
                                        <path d="M6 18h12" />
                                        <path d="M6 14h12" />
                                        <rect
                                            width="12"
                                            height="12"
                                            x="6"
                                            y="10"
                                        />
                                    </svg>
                                    Polling Stations

                                    <svg
                                        class="hs-accordion-active:block ms-auto hidden size-4"
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
                                        <path d="m18 15-6-6-6 6" />
                                    </svg>

                                    <svg
                                        class="hs-accordion-active:hidden ms-auto block size-4"
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
                                        <path d="m6 9 6 6 6-6" />
                                    </svg>
                                </button>

                                <div
                                    id="voting-accordion-sub-1-child"
                                    class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 hidden"
                                    role="region"
                                    aria-labelledby="voting-accordion-sub-1"
                                >
                                    <ul class="pt-1 space-y-1">
                                        <li>
                                            <router-link
                                                class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-200"
                                                :href="
                                                    route(
                                                        'voting.polling-stations.index',
                                                    )
                                                "
                                            >
                                                Dashboard
                                            </router-link>
                                        </li>
                                        <li>
                                            <router-link
                                                class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-200"
                                                :href="
                                                    route(
                                                        'voting.polling-stations.create',
                                                    )
                                                "
                                            >
                                                New Polling Station
                                            </router-link>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li
                                class="hs-accordion"
                                id="voting-accordion-sub-2"
                            >
                                <button
                                    type="button"
                                    class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:hover:bg-neutral-700 dark:text-neutral-200"
                                    aria-expanded="true"
                                    aria-controls="voting-accordion-sub-2-child"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="20"
                                        height="20"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="1"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="lucide lucide-book-user"
                                    >
                                        <path d="M15 13a3 3 0 1 0-6 0" />
                                        <path
                                            d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H19a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20"
                                        />
                                        <circle cx="12" cy="8" r="2" />
                                    </svg>
                                    Agents

                                    <svg
                                        class="hs-accordion-active:block ms-auto hidden size-4"
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
                                        <path d="m18 15-6-6-6 6" />
                                    </svg>

                                    <svg
                                        class="hs-accordion-active:hidden ms-auto block size-4"
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
                                        <path d="m6 9 6 6 6-6" />
                                    </svg>
                                </button>

                                <div
                                    id="voting-accordion-sub-2-child"
                                    class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 hidden"
                                    role="region"
                                    aria-labelledby="voting-accordion-sub-2"
                                >
                                    <ul class="pt-1 space-y-1">
                                        <li>
                                            <router-link
                                                class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-200"
                                                :href="
                                                    route('voting.agents.index')
                                                "
                                            >
                                                Dashboard
                                            </router-link>
                                        </li>
                                        <li>
                                            <router-link
                                                class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-200"
                                                :href="
                                                    route(
                                                        'voting.agents.create',
                                                    )
                                                "
                                            >
                                                New Agent
                                            </router-link>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li
                                class="hs-accordion"
                                id="voting-accordion-sub-3"
                            >
                                <button
                                    type="button"
                                    class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:hover:bg-neutral-700 dark:text-neutral-200"
                                    aria-expanded="true"
                                    aria-controls="voting-accordion-sub-3-child"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="20"
                                        height="20"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="1"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="lucide lucide-scroll-text"
                                    >
                                        <path d="M15 12h-5" />
                                        <path d="M15 8h-5" />
                                        <path d="M19 17V5a2 2 0 0 0-2-2H4" />
                                        <path
                                            d="M8 21h12a2 2 0 0 0 2-2v-1a1 1 0 0 0-1-1H11a1 1 0 0 0-1 1v1a2 2 0 1 1-4 0V5a2 2 0 1 0-4 0v2a1 1 0 0 0 1 1h3"
                                        />
                                    </svg>
                                    Ballots

                                    <svg
                                        class="hs-accordion-active:block ms-auto hidden size-4"
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
                                        <path d="m18 15-6-6-6 6" />
                                    </svg>

                                    <svg
                                        class="hs-accordion-active:hidden ms-auto block size-4"
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
                                        <path d="m6 9 6 6 6-6" />
                                    </svg>
                                </button>

                                <div
                                    id="voting-accordion-sub-3-child"
                                    class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 hidden"
                                    role="region"
                                    aria-labelledby="voting-accordion-sub-3"
                                >
                                    <ul class="pt-1 space-y-1">
                                        <li>
                                            <router-link
                                                class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-200"
                                                :href="
                                                    route(
                                                        'voting.ballots.index',
                                                    )
                                                "
                                            >
                                                Dashboard
                                            </router-link>
                                        </li>
                                        <li>
                                            <router-link
                                                class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-200"
                                                :href="
                                                    route(
                                                        'voting.ballots.create',
                                                    )
                                                "
                                            >
                                                New Ballot
                                            </router-link>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li
                                class="hs-accordion"
                                id="voting-accordion-sub-4"
                            >
                                <button
                                    type="button"
                                    class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:hover:bg-neutral-700 dark:text-neutral-200"
                                    aria-expanded="true"
                                    aria-controls="voting-accordion-sub-4-child"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="20"
                                        height="20"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="1"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="lucide lucide-book-copy"
                                    >
                                        <path d="M2 16V4a2 2 0 0 1 2-2h11" />
                                        <path
                                            d="M22 18H11a2 2 0 1 0 0 4h10.5a.5.5 0 0 0 .5-.5v-15a.5.5 0 0 0-.5-.5H11a2 2 0 0 0-2 2v12"
                                        />
                                        <path d="M5 14H4a2 2 0 1 0 0 4h1" />
                                    </svg>
                                    Requests

                                    <svg
                                        class="hs-accordion-active:block ms-auto hidden size-4"
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
                                        <path d="m18 15-6-6-6 6" />
                                    </svg>

                                    <svg
                                        class="hs-accordion-active:hidden ms-auto block size-4"
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
                                        <path d="m6 9 6 6 6-6" />
                                    </svg>
                                </button>

                                <div
                                    id="voting-accordion-sub-4-child"
                                    class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 hidden"
                                    role="region"
                                    aria-labelledby="voting-accordion-sub-4"
                                >
                                    <ul class="pt-1 space-y-1">
                                        <li>
                                            <router-link
                                                class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-200"
                                                :href="
                                                    route(
                                                        'voting.requests.index',
                                                        {
                                                            election_id:
                                                                electionId,
                                                            polling_station_id:
                                                                pollingStationId,
                                                        },
                                                    )
                                                "
                                            >
                                                Dashboard
                                            </router-link>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Coalitions -->
                <li class="hs-accordion" id="coalitions-accordion">
                    <button
                        type="button"
                        class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:hover:bg-neutral-700 dark:text-neutral-200"
                        aria-expanded="true"
                        aria-controls="coalitions-accordion-child"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            class="lucide lucide-chart-no-axes-combined"
                        >
                            <path d="M12 16v5" />
                            <path d="M16 14v7" />
                            <path d="M20 10v11" />
                            <path
                                d="m22 3-8.646 8.646a.5.5 0 0 1-.708 0L9.354 8.354a.5.5 0 0 0-.707 0L2 15"
                            />
                            <path d="M4 18v3" />
                            <path d="M8 14v7" />
                        </svg>
                        Coalitions

                        <svg
                            class="hs-accordion-active:block ms-auto hidden size-4"
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
                            <path d="m18 15-6-6-6 6" />
                        </svg>

                        <svg
                            class="hs-accordion-active:hidden ms-auto block size-4"
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
                            <path d="m6 9 6 6 6-6" />
                        </svg>
                    </button>

                    <div
                        id="coalitions-accordion-child"
                        class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 hidden"
                        role="region"
                        aria-labelledby="coalitions-accordion"
                    >
                        <ul
                            class="hs-accordion-group ps-8 pt-1 space-y-1"
                            data-hs-accordion-always-open
                        >
                            <li
                                class="hs-accordion"
                                id="coalitions-accordion-sub-1"
                            >
                                <button
                                    type="button"
                                    class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:hover:bg-neutral-700 dark:text-neutral-200"
                                    aria-expanded="true"
                                    aria-controls="coalitions-accordion-sub-1-child"
                                >
                                    Sub Menu 1

                                    <svg
                                        class="hs-accordion-active:block ms-auto hidden size-4"
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
                                        <path d="m18 15-6-6-6 6" />
                                    </svg>

                                    <svg
                                        class="hs-accordion-active:hidden ms-auto block size-4"
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
                                        <path d="m6 9 6 6 6-6" />
                                    </svg>
                                </button>

                                <div
                                    id="coalitions-accordion-sub-1-child"
                                    class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 hidden"
                                    role="region"
                                    aria-labelledby="coalitions-accordion-sub-1"
                                >
                                    <ul class="pt-1 space-y-1">
                                        <li>
                                            <a
                                                class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-200"
                                                href="#"
                                            >
                                                Link 1
                                            </a>
                                        </li>
                                        <li>
                                            <a
                                                class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-200"
                                                href="#"
                                            >
                                                Link 2
                                            </a>
                                        </li>
                                        <li>
                                            <a
                                                class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-200"
                                                href="#"
                                            >
                                                Link 3
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li
                                class="hs-accordion"
                                id="coalitions-accordion-sub-2"
                            >
                                <button
                                    type="button"
                                    class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:hover:bg-neutral-700 dark:text-neutral-200"
                                    aria-expanded="true"
                                    aria-controls="coalitions-accordion-sub-2-child"
                                >
                                    Sub Menu 2

                                    <svg
                                        class="hs-accordion-active:block ms-auto hidden size-4"
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
                                        <path d="m18 15-6-6-6 6" />
                                    </svg>

                                    <svg
                                        class="hs-accordion-active:hidden ms-auto block size-4"
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
                                        <path d="m6 9 6 6 6-6" />
                                    </svg>
                                </button>

                                <div
                                    id="coalitions-accordion-sub-2-child"
                                    class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 hidden"
                                    role="region"
                                    aria-labelledby="coalitions-accordion-sub-2"
                                >
                                    <ul class="pt-1 space-y-1">
                                        <li>
                                            <a
                                                class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-200"
                                                href="#"
                                            >
                                                Link 1
                                            </a>
                                        </li>
                                        <li>
                                            <a
                                                class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-200"
                                                href="#"
                                            >
                                                Link 2
                                            </a>
                                        </li>
                                        <li>
                                            <a
                                                class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-200"
                                                href="#"
                                            >
                                                Link 3
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Finance -->
                <li class="hs-accordion" id="finance-accordion">
                    <button
                        type="button"
                        class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:hover:bg-neutral-700 dark:text-neutral-200"
                        aria-expanded="true"
                        aria-controls="finance-accordion-child"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            class="lucide lucide-badge-cent"
                        >
                            <path
                                d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"
                            />
                            <path d="M12 7v10" />
                            <path d="M15.4 10a4 4 0 1 0 0 4" />
                        </svg>
                        Finance

                        <svg
                            class="hs-accordion-active:block ms-auto hidden size-4"
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
                            <path d="m18 15-6-6-6 6" />
                        </svg>

                        <svg
                            class="hs-accordion-active:hidden ms-auto block size-4"
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
                            <path d="m6 9 6 6 6-6" />
                        </svg>
                    </button>

                    <div
                        id="finance-accordion-child"
                        class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 hidden"
                        role="region"
                        aria-labelledby="finance-accordion"
                    >
                        <ul class="ps-8 pt-1 space-y-1">
                            <li>
                                <a
                                    class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-200"
                                    href="#"
                                >
                                    Link 1
                                </a>
                            </li>
                            <li>
                                <a
                                    class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-200"
                                    href="#"
                                >
                                    Link 2
                                </a>
                            </li>
                            <li>
                                <a
                                    class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-200"
                                    href="#"
                                >
                                    Link 3
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>

            <LayoutMainOrganizationSelector />
        </div>
    </nav>
</template>
