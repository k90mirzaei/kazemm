import axios from "axios";

const API_URL = process.env.MIX_APP_URL + "/api";

const api = axios.create({
    baseURL: API_URL,
    headers: {
        "Accept" : "application/json",
        "Content-Type": "application/json",
    },
});

export default api;
