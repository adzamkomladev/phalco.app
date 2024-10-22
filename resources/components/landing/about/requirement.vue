<script setup lang="ts">
import imageAboutUs from "~/resources/svg/welcome/about_us.svg?url";
import imageAboutUsBgLg from "~/resources/svg/welcome/about_bg_lg.svg?url";
</script>

<template>
    <article
        class="py-4 mb-10 text-base grid grid-cols-10 _md:flex flex-col-reverse"
    >
        <div class="col-span-5 p-[8%] md:pr-0 z-10">
            <p
                v-motion-fade-visible
 :delay="100"
            :duration="360"
                class="font-bold text-2xl sm:text-3xl"
            >
                Requirements For our Users
            </p>
            <p class="md:w-[140%] lg:w-[130%] py-4">
                <span
                    v-motion-fade-visible
                   :delay="90"
            :duration="360"
                    class="text-gray-700 inline backdrop-blur-sm bg-[#ffffffaa] leading-8"
                    >Lorem ipsum dolor sit amet , quae beatae ullam tempore
                    ratione repellendus amet dolorem blanditiis, veritatis
                    animi! Modi veritatis placeat cupiditate. .</span
                >
            </p>
            <LandingAboutRequirementLists />
        </div>

        <div
            v-motion-fade-visible
            :delay="90"
            :duration="360"
            class="relative overflow-x-hidden md:bg-about-lg _md:bg-about-sm bg-contain bg-right _md:bg-left bg-no-repeat _md:py-1 flex justify-center md:justify-end col-span-5"
        >
            <img
                class="transform w-full lg:translate-x-10 md:h-[90%] md:absolute md:bottom-0 md:scale-x-[-1] _md:p-10"
                :src="imageAboutUs"
            />
        </div>
    </article>
</template>
