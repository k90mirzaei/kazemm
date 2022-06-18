<template>
  <div id="blogs" class="flex flex-col pb-28 px-4">
    <a class="block w-fit hover:underline" :href="feed?.link">
      <h2 class="text-2xl font-semibold pb-5">My Articles</h2>
    </a>
    <div v-if="articles" class="flex md:flex-row flex-col gap-5">
      <div v-for="(article, index) in articles" :key="index" class="flex-1 flex flex-col rounded-md overflow-hidden border hover:shadow-xl transform duration-500">
        <a class="w-full object-cover" :href="article.link">
          <img class="h-[150px] w-full object-cover" :src="article.thumbnail" alt="">
        </a>
        <a class="block" :href="article.link">
          <h4 class="text-md font-medium leading-tight py-3 px-2">{{ article.title }}</h4>
        </a>
      </div>
    </div>
  </div>
</template>

<script>
import rss from "@/services/rssServices";

export default {
  name: "Blogs",
  data: () => ({
    articles: null,
    feed: null
  }),
  async mounted() {
    const response = await rss(3);
    this.articles = response.items
    this.feed = response.feed
  },
}
</script>