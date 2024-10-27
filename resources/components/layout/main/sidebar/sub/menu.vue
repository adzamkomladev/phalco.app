<script setup lang="ts" >

const isOpen=ref(false);
</script>

<template>
    <li>

<SharedAnimationCollapsible>
<template v-slot:summary>
<button 
@click="isOpen=!isOpen"
                        type="button"
                        class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:hover:bg-neutral-700 dark:text-neutral-200"
                        aria-expanded="true"
                        aria-controls="elections-accordion-child"
                    >
                        
                        Electionsssss
                        <!-- <TrialDropDown/> -->
                        <SharedCommonIcon class="hs-accordion-active:rotate-180 ms-auto" name="chevron"/>

                        
</button>

<div
                        class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 "
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
</template>

</SharedAnimationCollapsible>
</li>

</template>