<script setup lang="ts">
import imageWelcomeSm from "~/resources/svg/welcome/landing_sm.svg?url";
import imageWelcomeLg from "~/resources/svg/welcome/landing_lg.svg?url";
</script>

<template>
    <body class="bg-gray-100 md:text-lg flex flex-col">
        <main
            id="home"
            class="bg-[#F6F6F6] scroll-mt-24 md:bg-white max-w-[1600px] self-center"
        >
            <LandingHeader />

            <section
                id="home"
                class="md:pl-[8%] pl-0 scroll-mt-48 grid grid-cols-12 _md:flex flex-col-reverse overflow-hidden"
            >
                <div
                    class="col-span-6 z-10 _md:p-[8%] md:bg-transparent bg-white _md:rounded-t-[3rem] pt-14 gap-2 flex flex-col"
                >
                    <p
                        class="font-black text-3xl md:text-[3.5rem] inline md:leading-[5rem] md:w-[110%]"
                    >
                        <SharedAnimationBlurReview :delay="0" :duration="0.5">
                            Election Management made easy
                        </SharedAnimationBlurReview>
                    </p>
                    <p class="md:w-[82%] lg:w-full">
                        <span
                            class="text-gray-700 inline backdrop-blur-sm bg-[#ffffffaa]"
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
                        <button
                            v-motion-pop-visible-once
                            :delay="800"
                            class="p-2 w-full md:w-52 text-white bg-primary-500 rounded-md font-bold"
                        >
                            Get Started
                        </button>
                        <p
                            class="my-4 text-sm md:text-base sm:text-base text-gray-600 font-bold dark:text-gray-400 md:hidden"
                        >
                            Already have an account ?
                            <router-link
                                class="text-primary-twi decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-blue-500"
                                :href="route('login')"
                            >
                                Login
                            </router-link>
                        </p>
                    </div>
                </div>
                <div
                    class="py-8 items-end col-span-6 md:w-[120%] sticky md:right-0"
                >
                    <img
                        v-motion-pop-visible-once
                        :delay="950"
                        :duration="400"
                        :src="imageWelcomeLg"
                        class="_md:hidden md:block float-right"
                    />

                    <img
                        :src="imageWelcomeSm"
                        class="md:hidden _md:block w-full p-10"
                    />
                </div>
            </section>

            <LandingSection
                class=""
                id="service"
                title="Our Service"
                description="Lorem ipsum dolor sit amet consectetur adipisicing
                        >Lorem ipsum dolor sit amet consectetur adipisicing
                        elitLorem ipsum dolor sit amet consectetur adipisicing
                        elit"
            >
                <LandingServiceShow class="px-[8%]" />
            </LandingSection>
            <LandingSection
                id="pricing"
                title="Pricing"
                description="Lorem ipsum dolor sit amet consectetur adipisicing
                        Lorem ipsum dolor sit amet consectetur adipisicing
                        elitLorem ipsum dolor sit amet consectetur adipisicing
                        elit"
            >
                <LandingPricingShow class="px-8 md:px-[8%]" />
            </LandingSection>
            <LandingSection
                id="About Us"
                class="md:pr-0"
                title="About Us"
                description="Lorem ipsum dolor sit amet consectetur adipisicing
                            elit. Cumque itaque exercitationem corporis aliquin
                            elit. Cumque itaque exercitationem corporis aliquid
                            ."
            >
                <LandingAboutRequirement class="md:pl-[8%] _md:pl-0" />
            </LandingSection>
            <div class="md:border-t">
                <LandingFooterShow />
            </div>
        </main>
    </body>
</template>
