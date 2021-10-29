const items = document.querySelectorAll('.wrapper-box .item')

const box = document.querySelector('#box')
const section = document.querySelector('#section')
const save = document.getElementById('save')

const onDragOver = event => {
    event.preventDefault()
}

const onDrop = event => {
    const selector = event
        .dataTransfer
        .getData('text')

    save.classList.add('block')

    const draggableElement = document.querySelector(selector)
    const dropzone = event.target
    const input = draggableElement.querySelector('input')

    input.checked = !input.checked

    if (dropzone.classList.contains('item')) {
        dropzone.parentNode.appendChild(draggableElement)
    }
    else {
        dropzone.appendChild(draggableElement)
    }

    event
        .dataTransfer
        .clearData()
};

[section, box].forEach( item => {
    item.addEventListener('dragover', onDragOver)
    item.addEventListener('drop', onDrop)
})

items.forEach(el => {
    el.draggable = true
    el.addEventListener('dblclick', event => {
        const target = event.target
        const input = target.querySelector('input')
        if(target.parentNode.classList.contains('section')) {
            save.classList.add('block')
            input.checked = true
            box.appendChild(target)
        }
        else {
            save.classList.add('block')
            input.checked = false
            section.appendChild(target)
        }

    })
    el.addEventListener('dragstart', event => {
        event
            .dataTransfer
            .setData('text/plain', fullPath(event.target))
    })
})

function fullPath (el) {
    var names = []
    while (el.parentNode) {
        if (el.id) {
            names.unshift('#' + el.id)
            break
        }
        else {
            if (el == el.ownerDocument.documentElement) {
                names.unshift(
                    el.tagName)
            }
            else {
                for (var c = 1, e = el; e.previousElementSibling; e = e.previousElementSibling, c++) {

                }
                names.unshift(el.tagName + ':nth-child(' + c + ')')
            }
            el = el.parentNode
        }
    }
    return names.join(' > ')
}
