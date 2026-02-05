import axios from 'axios';

// Configure API base URL
// For development:
// - Android Emulator: 'http://10.0.2.2:8000/api/v1'
// - iOS Simulator: 'http://localhost:8000/api/v1'
// - Physical Device: 'http://YOUR_COMPUTER_IP:8000/api/v1'
// - Production: 'https://your-domain.com/api/v1'
const API_BASE_URL = 'http://192.168.0.102:8002/api/v1'; // Change based on your testing environment

export const api = {
    // Portfolio endpoints
    async getPortfolios(category = null) {
        try {
            let url = `${API_BASE_URL}/portfolios`;
            const params = new URLSearchParams();
            if (category) params.append('category', category);
            params.append('per_page', '50'); // Get more items for mobile
            if (params.toString()) url += '?' + params.toString();
            
            const response = await axios.get(url);
            // Handle both paginated and direct array responses
            if (Array.isArray(response.data.data)) {
                return response.data.data;
            } else if (response.data.data && response.data.data.data) {
                // Paginated response structure
                return response.data.data.data;
            }
            return [];
        } catch (error) {
            console.error('Error fetching portfolios:', error);
            console.error('Error details:', error.response?.data || error.message);
            return [];
        }
    },

    async getPortfolio(id) {
        try {
            const response = await axios.get(`${API_BASE_URL}/portfolios/${id}`);
            return response.data.data;
        } catch (error) {
            console.error('Error fetching portfolio:', error);
            return null;
        }
    },

    async getPortfolioCategories() {
        try {
            const response = await axios.get(`${API_BASE_URL}/portfolios/categories`);
            return response.data.data;
        } catch (error) {
            console.error('Error fetching categories:', error);
            return [];
        }
    },

    // Blog endpoints
    async getBlogs(category = null, search = null) {
        try {
            let url = `${API_BASE_URL}/blogs`;
            const params = new URLSearchParams();
            if (category) params.append('category', category);
            if (search) params.append('search', search);
            params.append('per_page', '50'); // Get more items for mobile
            if (params.toString()) url += '?' + params.toString();
            
            const response = await axios.get(url);
            // Handle both paginated and direct array responses
            if (Array.isArray(response.data.data)) {
                return response.data.data;
            } else if (response.data.data && response.data.data.data) {
                // Paginated response structure
                return response.data.data.data;
            }
            return [];
        } catch (error) {
            console.error('Error fetching blogs:', error);
            console.error('Error details:', error.response?.data || error.message);
            return [];
        }
    },

    async getBlog(slug) {
        try {
            const response = await axios.get(`${API_BASE_URL}/blogs/${slug}`);
            return response.data.data;
        } catch (error) {
            console.error('Error fetching blog:', error);
            return null;
        }
    },

    async getFeaturedBlogs() {
        try {
            const response = await axios.get(`${API_BASE_URL}/blogs/featured`);
            return response.data.data;
        } catch (error) {
            console.error('Error fetching featured blogs:', error);
            return [];
        }
    },

    async getBlogCategories() {
        try {
            const response = await axios.get(`${API_BASE_URL}/blogs/categories`);
            return response.data.data;
        } catch (error) {
            console.error('Error fetching blog categories:', error);
            return [];
        }
    },

    // Contact submission
    async submitContact(data) {
        try {
            const response = await axios.post(`${API_BASE_URL}/contact`, data);
            return response.data;
        } catch (error) {
            console.error('Error submitting contact:', error);
            throw error;
        }
    }
};
