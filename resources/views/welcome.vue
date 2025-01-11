<script setup lang="ts">
import MadeEasyImage1 from "~/resources/svg/welcome/made_easy_1.webp?url";
import MadeEasyImage2 from "~/resources/svg/welcome/made_easy_2.webp?url";
import MadeEasyImage3 from "~/resources/svg/welcome/made-easy_3.svg?url";
import ArrowImage from "~/resources/svg/welcome/made_easy_arrow.svg?url";
import DropletImage from "~/resources/svg/welcome/drop.svg?url";
</script>

<template>
    <body class="bg-gray-100 font-poppins md:text-lg flex flex-col">
        <WelcomeHeader />

        <main
            id="home"
            class="scroll-mt-[9rem] bg-white max-w-[1600px] self-center oveflow-x-hidden"
        >
            <section id="home" class="relative flex _sm:flex-col">
                <div
                    class="sm:basis-1/2 pl-[5%] _sm:px-[8%] sm:pt-10 relative h-fit shrink-0 _sm:text-center z-10"
                >
                    <p
                        class="font-black text-2xl pb-2 sm:text-3xl text-black md:text-4xl lg:text-5xl md:leading-[3rem]"
                    >
                        <SharedAnimationBlurReview :delay="0" :duration="0.67">
                            <p
                                v-motion-fade-visible
                                :delay="100"
                                :duration="360"
                                class="text-wrap font-unbounded"
                            >
                                Election Management made easy
                            </p>
                        </SharedAnimationBlurReview>
                    </p>
                    <div
                        v-motion-fade-visible
                        :delay="100"
                        :duration="360"
                        class=" "
                    >
                        <p
                            class="text-left _sm:text-sm bg-white/80 inline-block"
                            v-motion-fade-visible-once
                            :duration="300"
                            :delay="500"
                        >
                            We handle all voting related tasks for you. We are
                            your helper from the planning to the end of the
                            voting process. From nomination , vetting
                            ,campaigning,team managemnt , team managemment
                            financal managemnt , voting collaton and many more
                        </p>
                    </div>

                    <div class="py-2 sm:pt-10">
                        <router-link :href="route('register')">
                            <button
                                v-motion-pop-visible-once
                                :delay="800"
                                class="p-2 w-full md:w-52 hover:opacity-90 transition-all hover:scale-105 text-white bg-primary-500 rounded-md font-bold"
                            >
                                Get Started
                            </button>
                        </router-link>
                    </div>
                </div>
                <div
                    class="items-end sm:pr-[5%] _sm:px-[8%] col-span-6 md:w-[110%] sticky md:right-0"
                >
                    <div class="grid grid-cols-2 place-items-center">
                        <img
                            v-motion-pop-visible-once
                            :delay="1200"
                            :duration="900"
                            :src="MadeEasyImage3"
                            class="self-right max-h-[40%]"
                        />
                        <img
                            v-motion-pop-visible-once
                            :delay="1000"
                            :duration="900"
                            :src="MadeEasyImage1"
                            class="max-h-[30vh]"
                        />
                    </div>

                    <div class="lg:-mt-10 lg:-ml-20 flex relative md:gap-[5%]">
                        <div>
                            <img
                                v-motion-fade-visible
                                :duration="360"
                                :delay="90"
                                :src="MadeEasyImage2"
                                class="w-[90%] max-h-[70vh]"
                            />
                        </div>

                        <div class="pt-[30%]">
                            <img
                                v-motion-fade-visible
                                :duration="360"
                                :delay="90"
                                :src="DropletImage"
                                class=""
                            />
                        </div>
                    </div>
                </div>
                <div
                    class="absolute w-full h-[25%] left-0 -bottom-0 _md:hidden"
                >
                    <img :src="ArrowImage" class="h-full" />
                </div>
            </section>
            <WelcomeSectionService />
            <WelcomeSectionPricing />
            <WelcomeSectionTrusts />
            <WelcomeSectionFaqs />

            <div class="md:border-t">
                <WelcomeFooter />
            </div>
        </main>
    </body>
</template>
