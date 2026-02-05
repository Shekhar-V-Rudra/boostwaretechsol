import { api } from './api';

// Base URL for storage images (without /api/v1)
const STORAGE_BASE_URL = 'http://192.168.0.102:8002';

let currentCategory = 'all';
let blogs = [];

export async function initBlog() {
    await loadBlogs();
    await loadCategories();
}

async function loadBlogs() {
    const list = document.getElementById('blogList');
    if (!list) return;

    list.innerHTML = '<div class="loading">Loading articles...</div>';

    try {
        const response = await api.getBlogs(currentCategory === 'all' ? null : currentCategory);
        // Ensure blogs is an array
        blogs = Array.isArray(response) ? response : (response?.data || []);
        renderBlogs();
    } catch (error) {
        console.error('Error loading blogs:', error);
        list.innerHTML = '<div class="error">Failed to load articles. Please check your connection.</div>';
    }
}

async function loadCategories() {
    const filtersContainer = document.getElementById('blogFilters');
    if (!filtersContainer) return;

    try {
        const categories = await api.getBlogCategories();
        const allCategories = ['all', ...categories];
        
        filtersContainer.innerHTML = allCategories.map(cat => `
            <button class="filter-btn ${currentCategory === cat ? 'active' : ''}" 
                    onclick="filterBlog('${cat}')">
                ${cat.charAt(0).toUpperCase() + cat.slice(1)}
            </button>
        `).join('');
    } catch (error) {
        console.error('Error loading blog categories:', error);
    }
}

function renderBlogs() {
    const list = document.getElementById('blogList');
    if (!list) return;

    if (blogs.length === 0) {
        list.innerHTML = '<div class="empty">No articles found.</div>';
        return;
    }

    list.innerHTML = blogs.map(blog => `
        <div class="blog-card" onclick="viewBlog('${blog.slug}')">
            ${blog.featured_image 
                ? `<div class="blog-image">
                    <img src="${STORAGE_BASE_URL}/storage/${blog.featured_image}" alt="${blog.title}">
                   </div>`
                : ''
            }
            <div class="blog-content">
                <span class="blog-category">${blog.category}</span>
                <h3>${blog.title}</h3>
                ${blog.excerpt 
                    ? `<p>${blog.excerpt}</p>`
                    : `<p>${blog.content.substring(0, 150)}...</p>`
                }
                <div class="blog-meta">
                    <span>${blog.author}</span>
                    <span>•</span>
                    <span>${new Date(blog.published_at).toLocaleDateString()}</span>
                    <span>•</span>
                    <span>${blog.views} views</span>
                </div>
            </div>
        </div>
    `).join('');
}

// Global function for filtering
window.filterBlog = function(category) {
    currentCategory = category;
    loadBlogs();
    loadCategories();
};

// Global function for viewing blog
window.viewBlog = async function(slug) {
    try {
        const blog = await api.getBlog(slug);
        if (blog) {
            // You can implement a modal or detail page here
            alert(`Blog: ${blog.title}\n\n${blog.content.substring(0, 200)}...`);
        }
    } catch (error) {
        alert('Failed to load blog post.');
    }
};
