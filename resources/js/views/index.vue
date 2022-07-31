<template>
  <default>
    <Navbar/>
    <Hero/>
    <Skills/>
    <Blogs/>
    <Footer/>
  </default>
</template>

<script>
import Default from "../layouts/default";
import Navbar from "../components/Navbar";
import Hero from "../components/Hero";
import Skills from "../components/Skills";
import Contact from "../components/Contact";
import Footer from "../components/Footer";
import Blogs from "../components/Blogs";

export default {
  name: "index",
  components: {Blogs, Footer, Contact, Skills, Hero, Navbar, Default}
}
</script>
