import Turbolinks from 'turbolinks';

Turbolinks.start();

document.addEventListener('turbolinks:load', () => {
    const operatorFilter = document.getElementById('operator-filter');

    if (!operatorFilter) {
        return;
    }

    filterOperators(operatorFilter.value);

    operatorFilter.addEventListener('input', event => {
        filterOperators(event.target.value);
    });

    Array.from(document.querySelectorAll('[data-operator] a')).forEach(operatorLink => {
        operatorLink.addEventListener('mouseenter', () => {
            prefetch(operatorLink.href);
        });
    });
});

function filterOperators(search) {
    const operators = Array.from(document.querySelectorAll('[data-operator]'));

    operators.forEach(operator => {
        if (!search) {
            setInactive(operator);
            return;
        }

        if (operator.dataset.operator.indexOf(search) !== -1) {
            setActive(operator);
        } else {
            setInactive(operator);
        }
    });
}

function setActive(operator) {
    operator.classList.add('font-bold');

    prefetch(operator.querySelector('a[href]').href);
}

function setInactive(operator) {
    operator.classList.remove('font-bold');
}

function prefetch(href) {
    if (document.head.querySelector(`link[rel="prefetch"][href="${href}"]`)) {
        return;
    }

    const link = document.createElement('link');
    link.href = href;
    link.rel = 'prefetch';
    link.as = 'fetch';
    document.head.appendChild(link);
}
