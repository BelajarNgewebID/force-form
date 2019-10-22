const get = async (url) => {
    let grab = await fetch(url)
    let data = await grab.json()
    return data
}
const bind = (dom, value) => {
    select(dom).innerHTML = value
}
const select = (dom) => {
    return document.querySelector(dom)
}
const createEl = (props) => {
    let el = document.createElement(props.el)
    if(props.attributes !== undefined) {
        props.attributes.forEach(res => {
            el.setAttribute(res[0], res[1])
        })
    }

    if(props.html !== undefined) {
        let val = document.createElement('span')
        val.innerHTML = props.html
        el.appendChild(val)
    }
    select(props.parent).appendChild(el)
}