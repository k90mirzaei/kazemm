import api from "./apiServices";

const RSS_KEY = process.env.MIX_RSS_API_KEY;
const RSS_URL = process.env.MIX_RSS_URL;
const RSS_API = process.env.MIX_RSS_API

console.log(process.env)

const fetchRss = (count = null) => {
    return api.get(RSS_API, {
        params: {
            rss_url: RSS_URL,
            api_key: RSS_KEY,
            count: count ?? 10
        }
    }).then(response => response?.data)
}

export default fetchRss;
