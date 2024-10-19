<script setup lang="ts">
import imageAboutUs from "~/resources/svg/welcome/about_us.svg?url"
import imageAboutUsBgLg from "~/resources/svg/welcome/about_bg_lg.svg?url"
</script>


<template>
    <article
                    class="py-4 grid grid-cols-10 _md:flex flex-col-reverse"
                >
                    <div class="col-span-5 pl-8">
                        <p class="font-black font-sans text-2xl sm:text-3xl">
                            Requirements For our Users
                        </p>
                        <p>
                            <span class="text-gray-700 lg:w-[115%] block py-4"
                                >Lorem ipsum dolor sit amet , quae beatae ullam
                                tempore ratione repellendus amet dolorem
                                blanditiis, veritatis animi! Modi veritatis
                                placeat cupiditate. .</span
                            >
                        </p>
                        <LandingAboutRequirementLists  />
                      
                            <router-link
                                class="w-fit rounded-full hover:opacity-90 p-2 bg-primary-500 text-white px-8 flex items-center group justify-center gap-4"
                            >
                                <p>Learn more</p>
                                <SharedCommonIcon
                                    name="chevron"
                                    class="h-4 group-hover:opacity-90 duration-500 transition-all group-hover:translate-x-3"
                                />
                            </router-link>
                     
                    </div>

                    <div
                        class="relative overflow-x-hidden md:bg-about-lg    _md:bg-about-sm bg-contain bg-left _md:bg-left bg-no-repeat _md:py-1 flex justify-center  col-span-5"
                    >
                   
                        <img
                            class="transform w-full lg:ml-[15%] md:scale-x-[-1] _md:p-10"
                            :src="imageAboutUs"
                        />
                    </div>
                </article>
</template>