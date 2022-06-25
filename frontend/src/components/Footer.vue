<template>
  <div id="contact" class="flex flex-col items-center p-8 mb-12 mx-4 bg-blue-500 rounded-xl overflow-hidden shadow-2xl">
    <h2 class="text-white text-2xl font-bold pb-5">Contact Me in Social</h2>
    <p class="text-gray-50 text-lg">Let me know if you are interested in my services and collaboration!</p>
    <div class="flex items-center justify-center gap-10 py-10" >
      <a  :href="'mailto:' + social?.email">
        <img class="w-10 shadow" src="../assets/svg/gmail.svg" alt="email">
      </a>
      <a :href="social?.github">
        <img class="w-10 shadow" src="../assets/svg/github.svg" alt="github">
      </a>
      <a :href="social?.linkedin">
        <img class="w-10 shadow" src="../assets/svg/linkedin.svg" alt="linkedin">
      </a>
      <a :href="social?.twitter">
        <img class="w-10 shadow" src="../assets/svg/twitter.svg" alt="twitter">
      </a>
    </div>
  </div>
</template>

<script>
import socials from "@/services/socials";

export default {
  name: "Footer",
  data: () => ({social: null}),
  mounted() {
    this.social = socials
  }
}
</script>
