import './bootstrap';
import Alpine from 'alpinejs';
import NProgress from 'nprogress';
import 'nprogress/nprogress.css';

// Initialize Alpine
window.Alpine = Alpine;
Alpine.start();

// NProgress Configuration
NProgress.configure({ showSpinner: false });

// NProgress Event Listeners for Page Load
window.addEventListener('beforeunload', () => {
    NProgress.start();
});

window.addEventListener('load', () => {
    NProgress.done();
});

// Back To Top Button Logic
const backToTopBtn = document.getElementById('backToTop');
if (backToTopBtn) {
    window.addEventListener('scroll', () => {
        if (window.scrollY > 300) {
            backToTopBtn.classList.remove('opacity-0', 'invisible', 'translate-y-10');
        } else {
            backToTopBtn.classList.add('opacity-0', 'invisible', 'translate-y-10');
        }
    });
}
