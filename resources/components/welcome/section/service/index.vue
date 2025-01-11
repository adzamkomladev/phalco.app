<script setup lang="ts">
import FastDecisionImage from "~/resources/svg/welcome/fast_declision.webp?url";
import CampaigningImage from "~/resources/svg/welcome/campaigning.webp?url";
import VotingImage from "~/resources/svg/welcome/voting.webp?url";
import ManagementImage from "~/resources/svg/welcome/management.webp?url";
import StepsImage from "~/resources/svg/welcome/voting_steps.svg?url";
import ObjectsImage from "~/resources/svg/welcome/2_objects.svg?url";
import StarImage from "~/resources/svg/welcome/pricing_star.svg?url";
</script>

<template>
    <section
        id="service"
        class="bg-white py-8 relative flex flex-col gap-8 place-content-center scroll-mt-20"
    >
        <img
            class="_sm:hidden absolute left-[10%] bottom-0"
            :src="ObjectsImage"
        />
        <img
            class="_sm:hidden absolute right-[10%] bottom-0"
            :src="StarImage"
        />

        <div class="flex px-[8%] relative flex-col text-center gap-2 py-4">
            <img
                class="_sm:hidden absolute right-[10%] bottom-1/2"
                :src="ObjectsImage"
            />
            <p
                v-motion-fade-visible
                :duration="300"
                :delay="90"
                class="font-black font-unbounded text-3xl md:text-4xl"
            >
                Our Service
            </p>
            <span
                v-motion-fade-visible
                :duration="360"
                :delay="90"
                class="text-gray-700 block self-center md:text-center lg:w-[50rem] text-balance"
            >
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                eiusmod tempor incididunt ut labore et dolore
            </span>
        </div>

        <div class="grid gap-20">
            <div
                class="flex items-center sm:grid-cols-2 px-[10%] md:px-[15%] even:flex-row-reverse _sm:flex-col"
            >
                <div class="basis-1/2 shrink-0 _sm:px-[10%]">
                    <img
                    v-motion-slide-visible-bottom
                  :duration="300"
                        :delay="90"
                        :src="FastDecisionImage"
                        class="sm:w-[30vw] sm:max-w-72"
                    />
                </div>
                <div
                v-motion-slide-visible-top
                  :duration="500"
                        :delay="90"
                >
                    <p
                        v-motion-fade-visible
                        :duration="300"
                        :delay="90"
                        class="font-black font-unbounded text-3xl md:text-4xl pb-4"
                    >
                        Fast Decisions
                    </p>
                    <p
                        v-motion-fade-visible
                        :duration="360"
                        :delay="90"
                        class="text-gray-700 block text-sm _sm:pr-[10%] sm:text-leftself-center _sm:text-pretty sm:text-justify"
                    >
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore
                        Nisi architecto cupiditate aspernatur, laudantium sunt
                        tempora ullam eaque impedit iste. Quia minus eum
                        excepturi, labore nemo commodi officia magni possimus
                        eligendi.
                    </p>
                    <router-link
                        class="text-secondary-500 group flex items-center gap-2 my-4"
                    >
                        <span class="text-base font-semibold">Learn More</span>
                        <SharedCommonIcon
                            name="arrow_farward"
                            class="transition-all group:hover:transition-y-5 h-4"
                        />
                    </router-link>
                </div>
            </div>
            <div
                class="flex items-center sm:grid-cols-2 px-[10%] md:px-[15%] sm:even:flex-row-reverse _sm:flex-col"
            >
                <div
                
                    class="basis-1/2 relative shrink-0 flex justify-end _sm:px-[10%]"
                >
                    <img
                    v-motion-slide-visible-top
                  :duration="500"
                        :delay="90"
                        :src="CampaigningImage"
                        class="sm:w-[30vw] sm:max-w-72"
                    />

                    <img
                        :src="StepsImage"
                        class="absolute sm:hidden rotate-[270deg] right-0 w-[10%] md:w-[15%] bottom-0"
                    />
                </div>
                <div
                v-motion-slide-visible-bottom
                  :duration="500"
                        :delay="90"
                >
                    <p
                        v-motion-fade-visible
                        :duration="300"
                        :delay="90"
                        class="font-black font-unbounded text-3xl md:text-4xl pb-4"
                    >
                        Campaigning
                    </p>
                    <p
                        v-motion-fade-visible
                        :duration="360"
                        :delay="90"
                        class="text-gray-700 block _sm:pr-[10%] sm:text-leftself-center _sm:text-pretty sm:text-justify"
                    >
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore
                        Nisi architecto cupiditate aspernatur, laudantium sunt
                        tempora ullam eaque impedit iste. Quia minus eum
                        excepturi, labore nemo commodi officia magni possimus
                        eligendi.
                    </p>
                    <router-link
                        class="text-secondary-500 group flex items-center gap-2 my-4"
                    >
                        <span class="text-base font-semibold">Learn More</span>
                        <SharedCommonIcon
                            name="arrow_farward"
                            class="transition-all group:hover:transition-y-5 h-4"
                        />
                    </router-link>
                </div>
            </div>
            <div
            
                class="flex items-center relative sm:grid-cols-2 px-[10%] md:px-[15%] sm:even:flex-row-reverse _sm:flex-col"
            >
                <img
              
                    :src="StepsImage"
                    class="absolute _sm:hidden left-0 w-[10%] md:w-[15%] bottom-0"
                />
                <div class="basis-1/2 shrink-0 _sm:px-[10%]">
                    <img 
                    v-motion-slide-visible-bottom
                  :duration="500"
                        :delay="90"
                    :src="VotingImage" class="sm:w-[30vw] sm:max-w-72" />
                </div>
                <div
                v-motion-slide-visible-top
                  :duration="500"
                        :delay="90"
                >
                    <p
                        v-motion-fade-visible
                        :duration="300"
                        :delay="90"
                        class="font-black font-unbounded text-3xl md:text-4xl pb-4"
                    >
                        Voting
                    </p>
                    <p
                        v-motion-fade-visible
                        :duration="360"
                        :delay="90"
                        class="text-gray-700 block _sm:pr-[10%] sm:text-leftself-center _sm:text-pretty sm:text-justify"
                    >
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore
                        Nisi architecto cupiditate aspernatur, laudantium sunt
                        tempora ullam eaque impedit iste. Quia minus eum
                        excepturi, labore nemo commodi officia magni possimus
                        eligendi.
                    </p>
                    <router-link
                        class="text-secondary-500 group flex items-center gap-2 my-4"
                    >
                        <span class="text-base font-semibold">Learn More</span>
                        <SharedCommonIcon
                            name="arrow_farward"
                            class="transition-all group:hover:transition-y-5 h-4"
                        />
                    </router-link>
                </div>
            </div>
            <div
                class="flex items-center sm:grid-cols-2 px-[10%] md:px-[15%] sm:even:flex-row-reverse _sm:flex-col"
            >
                <div class="basis-1/2 shrink-0 flex justify-end _sm:px-[10%]">
                    <img

                    v-motion-slide-visible-top
                  :duration="500"
                        :delay="90" 

                        :src="ManagementImage"
                        class="sm:w-[30vw] sm:max-w-72"
                    />
                </div>
                <div
                v-motion-slide-visible-bottom
                  :duration="500"
                        :delay="90"
                >
                    <p
                        v-motion-fade-visible
                        :duration="300"
                        :delay="90"
                        class="font-black font-unbounded text-3xl md:text-4xl pb-4"
                    >
                        Management
                    </p>
                    <p
                        v-motion-fade-visible
                        :duration="360"
                        :delay="90"
                        class="text-gray-700 block _sm:pr-[10%] sm:text-leftself-center _sm:text-pretty sm:text-justify"
                    >
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore
                        Nisi architecto cupiditate aspernatur, laudantium sunt
                        tempora ullam eaque impedit iste. Quia minus eum
                        excepturi, labore nemo commodi officia magni possimus
                        eligendi.
                    </p>
                    <router-link
                        class="text-secondary-500 group flex items-center gap-2 my-4"
                    >
                        <span class="text-base font-semibold">Learn More</span>
                        <SharedCommonIcon
                            name="arrow_farward"
                            class="transition-all group:hover:transition-y-5 h-4"
                        />
                    </router-link>
                </div>
            </div>
        </div>

        <span
            v-motion-fade-visible
            :duration="360"
            :delay="90"
            class="text-gray-700 block _sm:pt-10 text-base self-center text-center sm:w-[50%] text-balance"
        >
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
            eiusmod tempor incididunt ut labore et dolore
        </span>
    </section>
</template>
