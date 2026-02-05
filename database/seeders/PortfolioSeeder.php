<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Portfolio;
use Carbon\Carbon;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $portfolios = [
            // Web Development Projects
            ['title' => 'E-Commerce Platform', 'description' => 'Full-featured online shopping platform with payment integration, inventory management, and admin dashboard.', 'category' => 'web', 'technologies' => ['Laravel', 'Vue.js', 'MySQL', 'Stripe'], 'client_name' => 'Retail Corp', 'order' => 1, 'is_featured' => true],
            ['title' => 'Corporate Website', 'description' => 'Modern corporate website with CMS, blog, and contact management system.', 'category' => 'web', 'technologies' => ['Laravel', 'Tailwind CSS', 'Alpine.js'], 'client_name' => 'Tech Solutions Inc', 'order' => 2, 'is_featured' => true],
            ['title' => 'Real Estate Portal', 'description' => 'Property listing platform with advanced search, filters, and map integration.', 'category' => 'web', 'technologies' => ['Laravel', 'React', 'PostgreSQL', 'Google Maps API'], 'client_name' => 'PropertyHub', 'order' => 3],
            ['title' => 'Healthcare Management System', 'description' => 'Comprehensive healthcare management system for clinics with appointment scheduling.', 'category' => 'web', 'technologies' => ['Laravel', 'Vue.js', 'MySQL'], 'client_name' => 'MedCare Clinic', 'order' => 4],
            ['title' => 'Learning Management System', 'description' => 'Online education platform with courses, quizzes, and student progress tracking.', 'category' => 'web', 'technologies' => ['Laravel', 'Vue.js', 'MySQL'], 'client_name' => 'EduLearn', 'order' => 5],
            ['title' => 'Restaurant Ordering System', 'description' => 'Online food ordering platform with real-time order tracking and delivery management.', 'category' => 'web', 'technologies' => ['Laravel', 'React', 'MySQL'], 'client_name' => 'FoodExpress', 'order' => 6],
            ['title' => 'Job Portal', 'description' => 'Job board with resume builder, application tracking, and employer dashboard.', 'category' => 'web', 'technologies' => ['Laravel', 'Vue.js', 'PostgreSQL'], 'client_name' => 'CareerHub', 'order' => 7],
            ['title' => 'Event Management Platform', 'description' => 'Event booking and management system with ticketing and payment processing.', 'category' => 'web', 'technologies' => ['Laravel', 'React', 'MySQL'], 'client_name' => 'EventPro', 'order' => 8],
            ['title' => 'Social Media Dashboard', 'description' => 'Analytics dashboard for social media management with scheduling features.', 'category' => 'web', 'technologies' => ['Laravel', 'Vue.js', 'MySQL', 'Twitter API'], 'client_name' => 'SocialPro', 'order' => 9],
            ['title' => 'Inventory Management System', 'description' => 'Complete inventory tracking system with barcode scanning and reporting.', 'category' => 'web', 'technologies' => ['Laravel', 'React', 'MySQL'], 'client_name' => 'Warehouse Solutions', 'order' => 10],
            ['title' => 'Hotel Booking System', 'description' => 'Online hotel reservation platform with availability calendar and payment gateway.', 'category' => 'web', 'technologies' => ['Laravel', 'Vue.js', 'PostgreSQL'], 'client_name' => 'HotelChain', 'order' => 11],
            ['title' => 'Financial Dashboard', 'description' => 'Financial analytics dashboard with charts, reports, and data visualization.', 'category' => 'web', 'technologies' => ['Laravel', 'React', 'Chart.js', 'MySQL'], 'client_name' => 'FinanceCorp', 'order' => 12],
            ['title' => 'Content Management System', 'description' => 'Custom CMS with multi-user support, media library, and SEO tools.', 'category' => 'web', 'technologies' => ['Laravel', 'Vue.js', 'MySQL'], 'client_name' => 'MediaGroup', 'order' => 13],
            ['title' => 'Fitness Tracking App Web', 'description' => 'Web application for fitness tracking with workout plans and progress charts.', 'category' => 'web', 'technologies' => ['Laravel', 'React', 'MySQL'], 'client_name' => 'FitLife', 'order' => 14],
            ['title' => 'Document Management System', 'description' => 'Secure document storage and sharing platform with version control.', 'category' => 'web', 'technologies' => ['Laravel', 'Vue.js', 'PostgreSQL'], 'client_name' => 'DocSecure', 'order' => 15],

            // Mobile App Projects
            ['title' => 'Fitness Mobile App', 'description' => 'iOS and Android fitness app with workout tracking and social features.', 'category' => 'app', 'technologies' => ['React Native', 'Node.js', 'MongoDB'], 'client_name' => 'FitTracker', 'order' => 16, 'is_featured' => true],
            ['title' => 'Food Delivery App', 'description' => 'Mobile app for food ordering with real-time tracking and push notifications.', 'category' => 'app', 'technologies' => ['Flutter', 'Laravel API', 'Firebase'], 'client_name' => 'QuickBite', 'order' => 17, 'is_featured' => true],
            ['title' => 'E-Learning Mobile App', 'description' => 'Educational app with video courses, quizzes, and offline learning support.', 'category' => 'app', 'technologies' => ['React Native', 'Node.js', 'MySQL'], 'client_name' => 'LearnOnGo', 'order' => 18],
            ['title' => 'Social Networking App', 'description' => 'Social media app with messaging, stories, and content sharing features.', 'category' => 'app', 'technologies' => ['Flutter', 'Laravel API', 'WebSocket'], 'client_name' => 'ConnectApp', 'order' => 19],
            ['title' => 'Banking Mobile App', 'description' => 'Secure banking app with transaction history, transfers, and bill payments.', 'category' => 'app', 'technologies' => ['React Native', 'Node.js', 'PostgreSQL'], 'client_name' => 'SecureBank', 'order' => 20],
            ['title' => 'Travel Booking App', 'description' => 'Travel app for booking flights, hotels, and activities with itinerary management.', 'category' => 'app', 'technologies' => ['Flutter', 'Laravel API', 'MySQL'], 'client_name' => 'TravelEasy', 'order' => 21],
            ['title' => 'Healthcare App', 'description' => 'Medical app with appointment booking, prescription management, and telemedicine.', 'category' => 'app', 'technologies' => ['React Native', 'Node.js', 'MongoDB'], 'client_name' => 'HealthCare Plus', 'order' => 22],
            ['title' => 'Shopping Mobile App', 'description' => 'E-commerce mobile app with wishlist, cart, and secure checkout.', 'category' => 'app', 'technologies' => ['Flutter', 'Laravel API', 'MySQL'], 'client_name' => 'ShopEasy', 'order' => 23],
            ['title' => 'Music Streaming App', 'description' => 'Music streaming app with playlists, offline downloads, and recommendations.', 'category' => 'app', 'technologies' => ['React Native', 'Node.js', 'MongoDB'], 'client_name' => 'MusicStream', 'order' => 24],
            ['title' => 'Ride Sharing App', 'description' => 'Uber-like ride sharing app with real-time tracking and payment integration.', 'category' => 'app', 'technologies' => ['Flutter', 'Laravel API', 'Google Maps'], 'client_name' => 'RideShare', 'order' => 25],
            ['title' => 'News Aggregator App', 'description' => 'News app with personalized feeds, categories, and offline reading.', 'category' => 'app', 'technologies' => ['React Native', 'Node.js', 'MySQL'], 'client_name' => 'NewsHub', 'order' => 26],
            ['title' => 'Task Management App', 'description' => 'Productivity app with task lists, reminders, and team collaboration.', 'category' => 'app', 'technologies' => ['Flutter', 'Laravel API', 'PostgreSQL'], 'client_name' => 'TaskMaster', 'order' => 27],
            ['title' => 'Weather App', 'description' => 'Beautiful weather app with forecasts, maps, and weather alerts.', 'category' => 'app', 'technologies' => ['React Native', 'Weather API'], 'client_name' => 'WeatherPro', 'order' => 28],
            ['title' => 'Expense Tracker App', 'description' => 'Personal finance app for tracking expenses, budgets, and financial goals.', 'category' => 'app', 'technologies' => ['Flutter', 'Laravel API', 'MySQL'], 'client_name' => 'ExpenseTracker', 'order' => 29],
            ['title' => 'Photo Editing App', 'description' => 'Mobile photo editor with filters, effects, and sharing capabilities.', 'category' => 'app', 'technologies' => ['React Native', 'Image Processing'], 'client_name' => 'PhotoEdit Pro', 'order' => 30],

            // UI/UX Design Projects
            ['title' => 'SaaS Dashboard Design', 'description' => 'Modern dashboard UI design for SaaS platform with data visualization.', 'category' => 'design', 'technologies' => ['Figma', 'Adobe XD', 'Design System'], 'client_name' => 'SaaS Platform', 'order' => 31, 'is_featured' => true],
            ['title' => 'E-commerce Website Design', 'description' => 'Complete e-commerce website design with product pages and checkout flow.', 'category' => 'design', 'technologies' => ['Figma', 'Adobe Photoshop'], 'client_name' => 'ShopDesign Co', 'order' => 32],
            ['title' => 'Mobile App UI Design', 'description' => 'Beautiful mobile app interface design with user flows and prototypes.', 'category' => 'design', 'technologies' => ['Figma', 'Sketch', 'Principle'], 'client_name' => 'AppDesign Studio', 'order' => 33],
            ['title' => 'Brand Identity Design', 'description' => 'Complete brand identity including logo, color scheme, and style guide.', 'category' => 'design', 'technologies' => ['Adobe Illustrator', 'Figma'], 'client_name' => 'BrandNew Inc', 'order' => 34],
            ['title' => 'Landing Page Design', 'description' => 'High-converting landing page design with A/B testing variants.', 'category' => 'design', 'technologies' => ['Figma', 'Adobe XD'], 'client_name' => 'MarketingPro', 'order' => 35],
            ['title' => 'Admin Panel Design', 'description' => 'Clean and functional admin panel design with component library.', 'category' => 'design', 'technologies' => ['Figma', 'Design System'], 'client_name' => 'AdminDesign', 'order' => 36],
            ['title' => 'Portfolio Website Design', 'description' => 'Creative portfolio website design for creative professionals.', 'category' => 'design', 'technologies' => ['Figma', 'Adobe XD'], 'client_name' => 'CreativePortfolio', 'order' => 37],
            ['title' => 'Healthcare App Design', 'description' => 'User-friendly healthcare app design with accessibility in mind.', 'category' => 'design', 'technologies' => ['Figma', 'Sketch'], 'client_name' => 'HealthDesign', 'order' => 38],
            ['title' => 'Fintech App Design', 'description' => 'Secure and trustworthy fintech app design with intuitive UX.', 'category' => 'design', 'technologies' => ['Figma', 'Adobe XD'], 'client_name' => 'FinTech Design', 'order' => 39],
            ['title' => 'Restaurant Website Design', 'description' => 'Appetizing restaurant website design with menu and reservation system.', 'category' => 'design', 'technologies' => ['Figma', 'Adobe Photoshop'], 'client_name' => 'RestaurantDesign', 'order' => 40],

            // E-commerce Projects
            ['title' => 'WooCommerce Store', 'description' => 'Custom WooCommerce store with product variations and payment gateways.', 'category' => 'ecommerce', 'technologies' => ['WordPress', 'WooCommerce', 'PHP'], 'client_name' => 'ShopStore', 'order' => 41],
            ['title' => 'Magento E-commerce', 'description' => 'Enterprise e-commerce solution with multi-store support and custom modules.', 'category' => 'ecommerce', 'technologies' => ['Magento', 'PHP', 'MySQL'], 'client_name' => 'EnterpriseShop', 'order' => 42],
            ['title' => 'Custom E-commerce Platform', 'description' => 'Bespoke e-commerce platform with advanced features and integrations.', 'category' => 'ecommerce', 'technologies' => ['Laravel', 'Vue.js', 'MySQL'], 'client_name' => 'CustomShop', 'order' => 43],
            ['title' => 'Marketplace Platform', 'description' => 'Multi-vendor marketplace with seller dashboard and commission system.', 'category' => 'ecommerce', 'technologies' => ['Laravel', 'React', 'PostgreSQL'], 'client_name' => 'MarketPlace', 'order' => 44],
            ['title' => 'Subscription E-commerce', 'description' => 'Subscription-based e-commerce with recurring payments and management.', 'category' => 'ecommerce', 'technologies' => ['Laravel', 'Vue.js', 'Stripe'], 'client_name' => 'SubscribeShop', 'order' => 45],

            // Other Projects
            ['title' => 'API Development', 'description' => 'RESTful API development with documentation and authentication.', 'category' => 'other', 'technologies' => ['Laravel', 'API', 'Postman'], 'client_name' => 'APICorp', 'order' => 46],
            ['title' => 'Microservices Architecture', 'description' => 'Microservices-based system with Docker and Kubernetes deployment.', 'category' => 'other', 'technologies' => ['Docker', 'Kubernetes', 'Node.js'], 'client_name' => 'MicroServices Inc', 'order' => 47],
            ['title' => 'Cloud Migration', 'description' => 'Legacy system migration to cloud with AWS infrastructure setup.', 'category' => 'other', 'technologies' => ['AWS', 'Docker', 'CI/CD'], 'client_name' => 'CloudMigrate', 'order' => 48],
            ['title' => 'DevOps Automation', 'description' => 'CI/CD pipeline setup with automated testing and deployment.', 'category' => 'other', 'technologies' => ['GitHub Actions', 'Docker', 'Kubernetes'], 'client_name' => 'DevOpsPro', 'order' => 49],
            ['title' => 'Blockchain Integration', 'description' => 'Blockchain integration for secure transactions and smart contracts.', 'category' => 'other', 'technologies' => ['Blockchain', 'Solidity', 'Web3'], 'client_name' => 'BlockChain Co', 'order' => 50],
            ['title' => 'AI Chatbot Integration', 'description' => 'AI-powered chatbot integration with natural language processing.', 'category' => 'other', 'technologies' => ['AI/ML', 'Python', 'NLP'], 'client_name' => 'AIChat Solutions', 'order' => 51],
            ['title' => 'IoT Dashboard', 'description' => 'IoT device management dashboard with real-time monitoring.', 'category' => 'other', 'technologies' => ['Laravel', 'Vue.js', 'MQTT'], 'client_name' => 'IoT Solutions', 'order' => 52],
        ];

        foreach ($portfolios as $index => $portfolio) {
            Portfolio::create([
                'title' => $portfolio['title'],
                'description' => $portfolio['description'],
                'category' => $portfolio['category'],
                'technologies' => $portfolio['technologies'],
                'client_name' => $portfolio['client_name'],
                'project_date' => Carbon::now()->subMonths(rand(1, 24)),
                'project_url' => 'https://example.com/project-' . ($index + 1),
                'order' => $portfolio['order'],
                'is_featured' => $portfolio['is_featured'] ?? false,
                'is_active' => true,
            ]);
        }
    }
}
