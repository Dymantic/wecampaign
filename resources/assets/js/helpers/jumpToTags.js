import jump from "jump.js"

function jumpToTags(selector) {

    const jumpTags = [].slice.call(document.querySelectorAll(selector));

    jumpTags.forEach(tag => {
        let target = tag.getAttribute('data-jump-target');
        let offset = tag.getAttribute('data-jump-offset') || 0;
        tag.addEventListener('click', ev => {
            console.log(`.${target}`, offset);
            ev.preventDefault();
            jump(target, {offset: offset * -1});
        })
    })
}

export {jumpToTags};