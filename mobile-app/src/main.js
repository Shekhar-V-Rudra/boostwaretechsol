import { App } from '@capacitor/app';
import { StatusBar, Style } from '@capacitor/status-bar';
import { SplashScreen } from '@capacitor/splash-screen';
import { api } from './api';
import { initNavigation } from './navigation';
import { initPortfolio } from './portfolio';
import { initBlog } from './blog';
import { initContact } from './contact';

// Initialize Capacitor
async function initCapacitor() {
    try {
        // Set status bar style
        await StatusBar.setStyle({ style: Style.Dark });
        
        // Hide splash screen
        await SplashScreen.hide();
    } catch (error) {
        console.log('Capacitor not available (running in browser)');
    }
}

// Initialize app
async function init() {
    await initCapacitor();
    initNavigation();
    initPortfolio();
    initBlog();
    initContact();
    initServices();
    
    // Handle app state changes
    App.addListener('appStateChange', ({ isActive }) => {
        console.log('App state changed. Is active?', isActive);
    });
}

// Initialize services
function initServices() {
    const services = [
        { icon: '🌐', title: 'Website Development', desc: 'Custom websites built with modern frameworks' },
        { icon: '📱', title: 'Mobile Apps', desc: 'Native iOS and Android applications' },
        { icon: '🔄', title: 'App Updates', desc: 'Regular updates and maintenance' },
        { icon: '🎨', title: 'UI/UX Design', desc: 'Beautiful and intuitive designs' },
        { icon: '🛒', title: 'E-commerce', desc: 'Complete online stores' },
        { icon: '🔌', title: 'API Development', desc: 'RESTful APIs and backend services' }
    ];
    
    const servicesList = document.getElementById('servicesList');
    if (servicesList) {
        servicesList.innerHTML = services.map(service => `
            <div class="service-item">
                <div class="service-icon-large">${service.icon}</div>
                <h3>${service.title}</h3>
                <p>${service.desc}</p>
            </div>
        `).join('');
    }
}

// Start app
init();
