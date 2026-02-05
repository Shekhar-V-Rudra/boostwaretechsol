import { api } from './api';

export function initContact() {
    const form = document.getElementById('contactForm');
    if (!form) return;

    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        
        const formData = new FormData(form);
        const data = {
            name: form.querySelector('input[type="text"]').value,
            email: form.querySelector('input[type="email"]').value,
            phone: form.querySelector('input[type="tel"]').value || null,
            subject: form.querySelectorAll('input[type="text"]')[1].value || null,
            message: form.querySelector('textarea').value
        };

        try {
            await api.submitContact(data);
            alert('Thank you! Your message has been sent successfully.');
            
            // Reset form
            form.reset();
        } catch (error) {
            alert('Failed to send message. Please try again.');
        }
    });
}
