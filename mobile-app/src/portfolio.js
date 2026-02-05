import { api } from './api';

// Base URL for storage images (without /api/v1)
const STORAGE_BASE_URL = 'http://192.168.0.102:8002';

let currentCategory = 'all';
let portfolios = [];

export async function initPortfolio() {
    await loadPortfolios();
    await loadCategories();
}

async function loadPortfolios() {
    const grid = document.getElementById('portfolioGrid');
    if (!grid) return;

    grid.innerHTML = '<div class="loading">Loading portfolio...</div>';

    try {
        const response = await api.getPortfolios(currentCategory === 'all' ? null : currentCategory);
        // Ensure portfolios is an array
        portfolios = Array.isArray(response) ? response : (response?.data || []);
        renderPortfolios();
    } catch (error) {
        console.error('Error loading portfolios:', error);
        grid.innerHTML = '<div class="error">Failed to load portfolio items. Please check your connection.</div>';
    }
}

async function loadCategories() {
    const filtersContainer = document.getElementById('portfolioFilters');
    if (!filtersContainer) return;

    try {
        const categories = await api.getPortfolioCategories();
        const allCategories = ['all', ...categories];
        
        filtersContainer.innerHTML = allCategories.map(cat => `
            <button class="filter-btn ${currentCategory === cat ? 'active' : ''}" 
                    onclick="filterPortfolio('${cat}')">
                ${cat.charAt(0).toUpperCase() + cat.slice(1)}
            </button>
        `).join('');
    } catch (error) {
        console.error('Error loading categories:', error);
    }
}

function renderPortfolios() {
    const grid = document.getElementById('portfolioGrid');
    if (!grid) return;

    if (portfolios.length === 0) {
        grid.innerHTML = '<div class="empty">No portfolio items found.</div>';
        return;
    }

    grid.innerHTML = portfolios.map(portfolio => `
        <div class="portfolio-card" onclick="viewPortfolio(${portfolio.id})">
            <div class="portfolio-image">
                ${portfolio.thumbnail 
                    ? `<img src="${STORAGE_BASE_URL}/storage/${portfolio.thumbnail}" alt="${portfolio.title}">`
                    : '<div class="placeholder-image">📁</div>'
                }
            </div>
            <div class="portfolio-content">
                <span class="portfolio-category">${portfolio.category}</span>
                <h3>${portfolio.title}</h3>
                <p>${portfolio.description ? portfolio.description.substring(0, 100) + '...' : 'No description available.'}</p>
                ${portfolio.technologies && Array.isArray(portfolio.technologies) && portfolio.technologies.length > 0 
                    ? `<div class="portfolio-tags">
                        ${portfolio.technologies.slice(0, 3).map(tech => `<span>${tech}</span>`).join('')}
                       </div>`
                    : ''
                }
            </div>
        </div>
    `).join('');
}

// Global function for filtering
window.filterPortfolio = function(category) {
    currentCategory = category;
    loadPortfolios();
    loadCategories();
};

// Global function for viewing portfolio
window.viewPortfolio = function(id) {
    // You can implement a modal or detail page here
    alert(`Portfolio ID: ${id}\n\nDetail view coming soon!`);
};
