<script setup lang="ts">
import MadeEasyImage1 from "~/resources/svg/welcome/made_easy_1.webp?url";
import MadeEasyImage2 from "~/resources/svg/welcome/made_easy_2.webp?url";
import MadeEasyImage3 from "~/resources/svg/welcome/made-easy_3.svg?url";
import ArrowImage from "~/resources/svg/welcome/made_easy_arrow.svg?url";
</script>

<template>
    <body class="bg-gray-100 md:text-lg flex flex-col">
        <WelcomeHeader />

        <main
            id="home"
            class="scroll-mt-[9rem] bg-white max-w-[1600px] self-center oveflow-x-hidden"
        >
            <section id="home" class="flex _sm:flex-col relative">
                <div
                    class="sm:basis-1/2 pl-[5%] _sm:px-[8%] pt-10 relative h-fit shrink-0 _sm:text-center"
                >
                    <p
                        class="font-black text-2xl _sm:w-[70%] place-self-center pb-2 sm:text-3xl text-black md:text-4xl lg:text-5xl md:leading-[3rem]"
                    >
                        <SharedAnimationBlurReview :delay="0" :duration="0.67">
                            <p
                                v-motion-fade-visible
                                :delay="100"
                                :duration="360"
                                class="text-wrap"
                            >
                                Election Management made easy
                            </p>
                        </SharedAnimationBlurReview>
                    </p>
                    <p
                        v-motion-fade-visible
                        :delay="100"
                        :duration="360"
                        class=" "
                    >
                        <span
                            class=""
                            v-motion-fade-visible-once
                            :duration="300"
                            :delay="500"
                            >Lorem ipsum dolor sit amet , quae beatae ullam
                            tempore ratione repellendus amet dolorem blanditiis,
                            veritatis animi! Modi veritatis placeat cupiditate.
                            ratione repellendus amet dolorem blanditiis,
                            veritatis animi! Modi veritatis placeat cupiditate.
                            .</span
                        >
                    </p>

                    <div class="py-2">
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
                    <div class="absolute left-0 top-[110%] _sm:hidden">
                        <img
                            v-motion-slide-visible
                            :duration="360"
                            :delay="90"
                            :src="ArrowImage"
                            class="h-[15vw]"
                        />
                    </div>
                </div>
                <div
                    class="py-8 items-end sm:pr-[5%] _sm:px-[8%] col-span-6 md:w-[110%] sticky md:right-0"
                >
                    <div class="grid grid-cols-2 place-items-center">
                        <img
                            v-motion-pop-visible-once
                            :delay="1000"
                            :duration="900"
                            :src="MadeEasyImage3"
                            class="self-right"
                        />
                        <img
                            v-motion-pop-visible-once
                            :delay="1000"
                            :duration="900"
                            :src="MadeEasyImage1"
                            class=""
                        />
                    </div>

                    <div class="lg:-mt-10 lg:-ml-20">
                        <img
                            v-motion-fade-visible
                            :duration="360"
                            :delay="90"
                            :src="MadeEasyImage2"
                            class=""
                        />
                    </div>
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
