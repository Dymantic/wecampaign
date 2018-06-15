function manageScroll() {
    let isScrolled = false;

    return () => {
        const top = (window.pageYOffset || document.documentElement.scrollTop)  - (document.documentElement.clientTop || 0);
        const body = document.body;
        if(top > 80 && !isScrolled) {
            isScrolled = true;
            return body.classList.add('scrolled');
        } else if(top <= 80) {
            isScrolled = false;
            body.classList.remove('scrolled');
        }
    }
}

export {manageScroll};