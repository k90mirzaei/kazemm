<template>
  <div class="flex items-center justify-between p-4">
    <router-link :to="{name:'home'}">
      Kazem Mirzaei
    </router-link>
    <div class="flex items-center gap-10">
      <a href="#skills">Skills</a>
      <a href="#blogs">Blogs</a>
      <a href="#contact">Contact</a>
    </div>
  </div>
</template>

<script>
export default {
  name: "Navbar"
}
</script>
