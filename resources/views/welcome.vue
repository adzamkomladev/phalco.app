<script setup lang="ts">

import  imageWelcomeSm from "~/resources/svg/welcome/landing_sm.svg?url"
import imageWelcomeLg from    "~/resources/svg/welcome/landing_lg.svg?url"


</script>

<template>
    <body class="bg-gray-100 md:text-lg flex flex-col ">

        <main id="home" class=" bg-gray-[#F6F6F6] scroll-mt-24 md:bg-white  max-w-[1600px] self-center ">
<LandingHeader />
            
           
            <section
            
                class="md:pl-[8%] scroll-mt-48  grid grid-cols-12 _md:flex flex-col-reverse overflow-hidden"
            >
                <div
                    class="col-span-6 bg-white _md:rounded-t-[3rem] px-8 pt-10 gap-2 flex flex-col"
                >
                    <p
                        class="font-black font-sans text-2xl sm:text-3xl md:block md:w-[130%]"
                    >
                        Election Management made easy
                    </p>

                    <p class="text-gray-700  md:text-pretty md:block _md:w-auto md:w-[120%] lg:w-[130%]">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Cumque itaque exercitationem corporis aliquid quia
                        dolorem ut similique? Deserunt modi tenetur pariatur
                        quam, laboriosam expedita minima nihil reprehenderit non
                        ad atque.
                    </p>

                    <div class="py-2">
                        <button
                            class="p-2 w-full md:w-52 text-white bg-primary-500 rounded-md font-bold"
                        >
                            Get Started
                        </button>
                        <p
                            class="my-4 text-sm md:text-base sm:text-base text-gray-600 font-bold dark:text-neutral-400"
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
                <div class="py-8 col-span-6 ">
           <img :src="imageWelcomeLg" class="_md:hidden md:block float-right" />

          <img :src="imageWelcomeSm" class="md:hidden _md:block w-full p-10" />
                </div>
    </section>



            <LandingSection class="" id="service" title="Our Service" description="Lorem ipsum dolor sit amet consectetur adipisicing
                        >Lorem ipsum dolor sit amet consectetur adipisicing
                        elitLorem ipsum dolor sit amet consectetur adipisicing
                        elit">
                    <LandingServiceShow class="px-8 md:px-[8%]" />

            </LandingSection>

<LandingSection id="contract" class="md:pr-0 " title="About Us" description="Lorem ipsum dolor sit amet consectetur adipisicing
                            elit. Cumque itaque exercitationem corporis aliquin
                            elit. Cumque itaque exercitationem corporis aliquid
                            .">
<LandingAboutRequirement class="md:pl-[8%] _md:pl-0"/>
</LandingSection>

    <LandingSection
   id="pricing"
    title="Pricing"
    description="Lorem ipsum dolor sit amet consectetur adipisicing
                        Lorem ipsum dolor sit amet consectetur adipisicing
                        elitLorem ipsum dolor sit amet consectetur adipisicing
                        elit">

 <LandingPricingShow  class="px-8 md:px-[8%]"/>
            </LandingSection>

            <!-- <section class="p-10 bg-white">
                <div
                    class="bg-community h-72 overflow-hidden bg-right rounded-[2rem] bg-cover bg-no-repeat"
                >
                    <div class="bg-[#0988D090] w-full h-full p-10">
                        <div
                            class="bg-[#0988D0ee] p-8 w-2/3 h-full rounded-3xl"
                        >
                            <p class="text-white">Join our community now</p>
                            <p class="text-white text-3xl font-semibold">
                                Start yor election management today
                            </p>
                            <form>
                                <div class="mb-6 flex pr-14">
                                    <input
                                        type="password"
                                        id="success"
                                        class="bg-green-50 border border-green-500 text-green-900 dark:text-green-400 text-sm rounded-l-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-green-500"
                                        placeholder="Confirm Pin"
                                    />
                                    <button
                                        class="bg-[#0BC81E] bg- px-4 rounded-r-lg text-white font-bold text-lg"
                                    >
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section> -->
             <div class="md:px-[8%]">
                    <LandingFooterShow />

            </div>  
        </main>

    </body>
</template>
