import axios from "axios";

const API_URL = "http://mydev.test/api/";

const api = axios.create({
    baseURL: API_URL,
    headers: {
        "Accept" : "application/json",
        "Content-Type": "application/json",
    },
});

export default api;
